<?php
$host = getenv('DB_HOST') ?: "aws-0-ap-northeast-2.pooler.supabase.com";
$port = getenv('DB_PORT') ?: "6543";
$db   = getenv('DB_NAME') ?: "postgres";
$user = getenv('DB_USER') ?: "postgres.bthbchddiejkfmauywli";
$pass = getenv('DB_PASS') ?: "Kalinacantik31";

try {
    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$db;sslmode=require",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => true,
        ]
    );
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}