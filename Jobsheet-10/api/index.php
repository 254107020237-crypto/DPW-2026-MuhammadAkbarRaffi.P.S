<?php
$root = dirname(__DIR__);
$path = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if ($path === '/' || $path === '') {
    $path = '/index.php';
}

$file = realpath($root . $path);
if ($file !== false && is_dir($file)) {
    $file = realpath($file . '/index.php');
}

// Blokir file yang tidak boleh diakses langsung
$terlarang = ['/api', '/includes', '/sql', '/vercel.json', '/report.md'];
$aman = $file !== false && strpos($file, $root) === 0;
if ($aman) {
    $relatif = str_replace('\\', '/', substr($file, strlen($root)));
    foreach ($terlarang as $t) {
        if (strpos($relatif, $t) === 0) {
            $aman = false;
        }
    }
}

if (!$aman || !is_file($file)) {
    http_response_code(404);
    echo "404 - Halaman tidak ditemukan";
    exit;
}

$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

if ($ext === 'php') {
    // Session disimpan di database, karena Vercel itu serverless
    require $root . '/includes/koneksi.php';

    class DbSessionHandler implements SessionHandlerInterface
    {
        private PDO $pdo;
        public function __construct(PDO $pdo) { $this->pdo = $pdo; }
        public function open(string $path, string $name): bool { return true; }
        public function close(): bool { return true; }
        public function read(string $id): string|false
        {
            $s = $this->pdo->prepare(
                "SELECT data FROM php_sessions WHERE id = :id AND updated_at > now() - interval '1 day'"
            );
            $s->execute(['id' => $id]);
            $data = $s->fetchColumn();
            return $data === false ? '' : $data;
        }
        public function write(string $id, string $data): bool
        {
            $s = $this->pdo->prepare(
                "INSERT INTO php_sessions (id, data, updated_at) VALUES (:id, :data, now())
                 ON CONFLICT (id) DO UPDATE SET data = EXCLUDED.data, updated_at = now()"
            );
            return $s->execute(['id' => $id, 'data' => $data]);
        }
        public function destroy(string $id): bool
        {
            $s = $this->pdo->prepare("DELETE FROM php_sessions WHERE id = :id");
            return $s->execute(['id' => $id]);
        }
        public function gc(int $max): int|false
        {
            return $this->pdo->exec("DELETE FROM php_sessions WHERE updated_at < now() - interval '1 day'");
        }
    }

    session_set_save_handler(new DbSessionHandler($pdo), true);
    session_set_cookie_params([
        'path' => '/',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);

    // Supaya header.php menghitung $base seolah file ini diakses langsung
    $_SERVER['SCRIPT_FILENAME'] = $file;
    $_SERVER['SCRIPT_NAME'] = $relatif;
    chdir(dirname($file));
    require $file;
    exit;
}

$mime = [
    'css' => 'text/css', 'js' => 'application/javascript',
    'png' => 'image/png', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg',
    'gif' => 'image/gif', 'svg' => 'image/svg+xml', 'ico' => 'image/x-icon',
    'webp' => 'image/webp', 'woff2' => 'font/woff2',
];
header('Content-Type: ' . ($mime[$ext] ?? 'application/octet-stream'));
readfile($file);