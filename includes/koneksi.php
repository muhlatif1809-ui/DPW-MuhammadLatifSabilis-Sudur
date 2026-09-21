<?php
$host = getenv('host');
$port = getenv('port');
$dbname = getenv('database');
$user = getenv('user');
$password = getenv('password'); // perlu ditambahkan dulu di Vercel

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}