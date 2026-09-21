<?php
$host = "localhost";
$port = "5432";
$db   = "rental_ps"; // DIGANTI: sebelumnya "rental"
$user = "postgres";
$pass = "postgres"; // ganti dengan password PostgreSQL kamu

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
