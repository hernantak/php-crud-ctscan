<?php
    include 'koneksi.php';

    if(isset($_GET["dataset_id"])){

        //delete data
        // Prepared statement untuk menghapus data
        $query = $db->prepare("DELETE FROM `dataset` WHERE dataset_id=:dataset_id");
        $query->bindParam(":dataset_id", $_GET["dataset_id"]);
        // Jalankan Perintah SQL
        $query->execute();
    }

    // Ambil data NIS
    $dataset_id = $_POST['dataset_id'];

    $sqlcek = $db->prepare("SELECT * FROM image_data WHERE dataset_id=:dataset_id");
    $sqlcek->bindParam(':dataset_id', $dataset_id);
    $sqlcek->execute(); // Eksekusi / Jalankan query
    $data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek

    // Cek apakah file fotonya ada di folder foto
    if(is_file($data["file_path"])) // Jika foto ada
        unlink($data["file_path"]); // Hapus file fotonya yang ada di folder foto

    // Query untuk menghapus data siswa berdasarkan NIS yang dikirim
    $sql = $db->prepare("DELETE FROM image_data WHERE dataset_id=:dataset_id");
    $sql->bindParam(':dataset_id', $dataset_id);
    $sql->execute(); // Eksekusi/Jalankan query    



    header("location: data.php");
?>