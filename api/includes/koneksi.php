<?php
// Mengambil variabel lingkungan (Environment Variables) dari Vercel
$host     = getenv('DB_HOST') ?: 'aws-0-ap-south-1.pooler.supabase.com'; // Ganti dengan Host Supabase Anda
$port     = getenv('DB_PORT') ?: '6543';
$dbname   = getenv('DB_NAME') ?: 'postgres';
$user     = getenv('DB_USER') ?: 'postgres.skrfnclqkknzplzjivql';
$password = getenv('DB_PASS') ?: 'MuhLatif180906';

try {
    // PASTI KAN FORMAT DSN: pgsql:host=...;port=...;dbname=...
    // Perhatikan penggunaan titik koma (;) sebagai pemisah
    $dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";
    
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>