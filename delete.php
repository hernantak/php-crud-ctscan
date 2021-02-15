<?php
    include 'koneksi.php';

    if(isset($_GET["dataset_id"])){
        $query_dat = $db->prepare("SELECT * FROM `image_data` WHERE dataset_id=:dataset_id");
        $query_dat->bindParam(":dataset_id", $_GET["dataset_id"]);
        $query_dat->execute();

        $value = $query_dat->fetch();
        $temp_path = $value['dataset_id'];

        //delete data
        // Prepared statement untuk menghapus data
        $query = $db->prepare("DELETE FROM `dataset` WHERE dataset_id=:dataset_id");
        $query->bindParam(":dataset_id", $_GET["dataset_id"]);
        // Jalankan Perintah SQL
        $query->execute();

        //delet img
        $sqlcek = $db->prepare("SELECT * FROM `image_data` WHERE dataset_id=:dataset_id");
        $sqlcek->bindParam(":dataset_id", $_GET["dataset_id"]);
        $sqlcek->execute(); // Eksekusi / Jalankan query
        // $data_dat = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek

        while($data = $sqlcek->fetch()){ 
        // Cek apakah file fotonya ada di folder foto
        if(is_file($data["file_path"])) // Jika foto ada
            unlink($data["file_path"]); // Hapus file fotonya yang ada di folder foto

        }

        //delete data
        // Prepared statement untuk menghapus data
        $sql = $db->prepare("DELETE FROM `image_data` WHERE dataset_id=:dataset_id");
        $sql->bindParam(":dataset_id", $_GET["dataset_id"]);
        $sql->execute(); // Eksekusi/Jalankan query  

        $path = 'upload/'.$temp_path;
        rmdir($path);
    }  

    header("location: data.php");
?>