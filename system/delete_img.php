<?php
    include 'koneksi.php';

    $dataset_id=$_GET['dataset_id'];
    $file_name = $_GET['file_name'];

    $sqlcek = $db->prepare("SELECT * FROM `image_data` WHERE file_name='$file_name' AND dataset_id='$dataset_id'");
    $sqlcek->bindParam(":file_name", $_GET["file_name"]);
    $sqlcek->execute();
    $data = $sqlcek->fetch();

    if(is_file($data["file_path"])) // Jika foto ada
        unlink($data["file_path"]); // Hapus file fotonya yang ada di folder foto

    //delete data
    $sql = $db->prepare("DELETE FROM `image_data` WHERE file_name=:file_name");
    $sql->bindParam(":file_name", $_GET["file_name"]);
    $sql->execute(); 

    header("location: index.php?page=detailed&dataset_id=".$dataset_id);
?>