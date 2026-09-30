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
    // Supaya header.php menghitung $base seolah file ini diakses langsung
    $_SERVER['SCRIPT_FILENAME'] = $file;
    $_SERVER['SCRIPT_NAME'] = str_replace('\\', '/', substr($file, strlen($root)));

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