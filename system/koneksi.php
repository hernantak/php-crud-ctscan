<?php
    $host = 'localhost'; // Nama hostnya
    $username = 'root'; // Username
    $password = ''; // Password (Isi jika menggunakan password)
    $database = 'database_name'; // Nama databasenya
    $base_url = 'http://localhost/'; // Set Base Url Web

    // Koneksi ke MySQL dengan PDO
    $db = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>
