<?php
$host = 'localhost'; // Nama hostnya
$username = 'root'; // Username
$password = 'root'; // Password (Isi jika menggunakan password)
$database = 'skirpsi_db'; // Nama databasenya
$base_url = 'http://localhost/'; // Set Base Url Web

// Koneksi ke MySQL dengan PDO
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>
