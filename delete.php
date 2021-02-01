<?php
    include 'koneksi.php';

    if(isset($_GET["dataset_id"])){
        // Prepared statement untuk menghapus data
        $query = $db->prepare("DELETE FROM `dataset` WHERE dataset_id=:dataset_id");
        $query->bindParam(":dataset_id", $_GET["dataset_id"]);
        // Jalankan Perintah SQL
        $query->execute();
        // Alihkan ke data.php
        header("location: data.php");
    }
?>