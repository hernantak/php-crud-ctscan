<?php
    include 'koneksi.php';
    if(!isset($_GET['file_name'])){
        die("Error: Dataset ID Tidak Dimasukkansu");
    }
    $query = $db->prepare("SELECT * FROM `image_data` WHERE file_name = :file_name");
    $query->bindParam(":file_name", $_GET['file_name']);
    $query->execute();
    if($query->rowCount() == 0){
        die("Error: Dataset ID Tidak Ditemukanvv");
    }else{
        $data = $query->fetch();
    }
    if(isset($_POST['submit'])){
        $dataset_name = htmlentities($_POST['dataset_name']);
        $medic_record = htmlentities($_POST['medic_record']);
        // $kelas = htmlentities($_POST['kelas']);
        $query = $db->prepare("UPDATE `dataset` SET `dataset_name`=:dataset_name,`medic_record`=:medic_record WHERE dataset_id=:dataset_id");
        $query->bindParam(":dataset_name", $dataset_name);
        $query->bindParam(":medic_record", $medic_record);
        // $query->bindParam(":kelas", $kelas);
        $query->bindParam(":dataset_id", $_GET['dataset_id']);
        $query->execute();
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CTScan</title>

    <!-- Load File CSS Bootstrap  -->
    <link href="<?php echo $base_url.'css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    body {

    }

    .form-signin {
        max-width: 500px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-signin-heading{
        margin-bottom: 10px;
        text-align: center;
    }
    .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .btn-block {
        display: block;
        width: 25%;
    }
    .btn-cnter-css {
        text-align: -webkit-center;
    }
    .menu-css {
        padding-top: 20px;
        padding-bottom: 60px;
    }
    .btn-css {
        background-color: white;
    }
    .btn-validasi-css {
        display: block;
        width: 100%;
    }
    </style>
</head>
<body>
    <div class="menu-css">
        <button onclick="history.back()" class="btn btn-lg btn-css" type="button"><i class="fas fa-arrow-circle-left"></i> VALIDASI HASIL DATASET CTSCAN <?php echo $data['file_name'] ?></button>
    </div>

    <div class="row">
      <!-- <div style="text-align: center;" class="col-xs-6">Slide Show</div> -->
        <div class="col-xs-6">
          <div class="form-signin">
            <img style="width:640px;height:480px;" 
            src=<?php 
                $url = rawurldecode($data['file_path']);
                echo $url;  
                ?>
            >
          </div>
        </div>
      <div class="col-xs-6">

          <div class="form-signin">



            <form method="post" action="system/login.php">
                <div class="form-group">
                    <label>IMG DATA ID</label>
                    <p style="border-style: ridge; padding: 12px;"><?php echo $data['file_name'] ?></p>
                </div>
                <div class="form-group">
                    <label>HASIL VALIDASI</label>
                    <p style="border-style: ridge; padding: 12px;"><?php 
                    if($data['status'] == NULL){
                        echo "Belum Validasi";
                    } else {
                        echo $data['status']; 
                    }
                    ?></p>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                      <button class="btn btn-lg btn-primary btn-validasi-css" type="submit">VALID</button>  
                    </div>
                    <div class="col-xs-6">
                      <button class="btn btn-lg btn-default btn-validasi-css" type="submit">TIDAK VALID</button>  
                    </div>
                </div>
            </form>
        </div>

      </div>
    </div>

</body>
</html>
