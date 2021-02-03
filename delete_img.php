<?php
    include 'koneksi.php';

    if(isset($_GET["file_name"])){

    $sqlcek = $db->prepare("SELECT * FROM `image_data` WHERE file_name=:file_name");
    $sqlcek->bindParam(":file_name", $_GET["file_name"]);
    $sqlcek->execute(); // Eksekusi / Jalankan query
    $data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek

    // Cek apakah file fotonya ada di folder foto
    if(is_file($data["file_path"])) // Jika foto ada
        unlink($data["file_path"]); // Hapus file fotonya yang ada di folder foto


    //delete data
    // Prepared statement untuk menghapus data
    $sql = $db->prepare("DELETE FROM `image_data` WHERE file_name=:file_name");
    $sql->bindParam(":file_name", $_GET["file_name"]);
    $sql->execute(); // Eksekusi/Jalankan query  

    }

    header("location: detailed.php");
?>