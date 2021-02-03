<?php
    include 'koneksi.php';
    if(!isset($_GET['dataset_id'])){
        die("Error: Dataset ID Tidak Dimasukkans");
    }
    $query = $db->prepare("SELECT * FROM `image_data` WHERE dataset_id = :dataset_id");
    $query->bindParam(":dataset_id", $_GET['dataset_id']);
    $query->execute();
    if($query->rowCount() == 0){
        die("[Info] Gambar Kosong!");
    }else{
        $data = $query->fetch();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CTScan</title>

        <!-- Load File bootstrap.min.css yang ada difolder css -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you viewDetailed the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
        .align-middle{
            vertical-align: middle !important;
        }
        .menu-css {
            padding-top: 20px;
            padding-bottom: 60px;
        }
        .btn-css {
            background-color: white;
        }
        </style>
    </head>
    <body>
         <div class="menu-css">
            <button onClick="location.href='data.php'" class="btn btn-lg btn-css" type="button"><i class="fas fa-arrow-circle-left"></i> DATASET ID <?php echo $data['dataset_id'] ?></button>
        </div>
        
        <div style="padding: 0 15px;">
            <div id="pesan-sukses" class="alert alert-success"></div>
            <div id="viewDetailed"><?php include "viewDetailed.php"; ?></div>
        </div>
        
        <!-- Load File jquery.min.js yang ada difolder js -->
        <script src="js/jquery.min.js"></script>
        
        <!-- Load File bootstrap.min.js yang ada difolder js -->
        <script src="js/bootstrap.min.js"></script>
        
        <!-- Load file ajax.js yang ada di folder js -->
        <script src="js/ajax.js"></script>
    </body>
</html>

