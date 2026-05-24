<?php
// config/database.php
$host = 'localhost';
$user = 'root';     // ganti dengan user MySQL Anda
$password = '';     // ganti dengan password Anda
$dbname = 'db_crud';

$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Set charset ke UTF-8
$conn->set_charset("utf8");

// Jangan tutup koneksi di sini, karena akan digunakan di file lain
?>
