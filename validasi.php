<?php
    include 'koneksi.php';
    if(!isset($_GET['file_name'])){
        die("[Error] IMG DATA ID tidak ditemukan!");
    }
    $query = $db->prepare("SELECT * FROM `image_data` WHERE file_name = :file_name");
    $query->bindParam(":file_name", $_GET['file_name']);
    $query->execute();
    if($query->rowCount() == 0){?>
        <div id="box-alret">Data Rekaman Kosong</div>
<?php
    } else {
        $data = $query->fetch();
        $url = $data['dataset_id'];
        $back = $data['dataset_id'];
    }

    if(isset($_POST['validasi'])){
        $validate = "Valid";
        $query = $db->prepare("UPDATE `image_data` SET `validate`=:validate WHERE file_name=:file_name");
        $query->bindParam(":validate", $validate);
        $query->bindParam(":file_name", $_GET['file_name']);
        $query->execute();
        header("Refresh:0");
    }

    if(isset($_POST['not'])){
        $validate = "Tidak Valid";
        $query = $db->prepare("UPDATE `image_data` SET `validate`=:validate WHERE file_name=:file_name");
        $query->bindParam(":validate", $validate);
        $query->bindParam(":file_name", $_GET['file_name']);
        $query->execute();
        header("Refresh:0");
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
        padding-bottom: 80px;
    }
    .btn-css {
        background-color: white;
    }
    .btn-validasi-css {
        display: block;
        width: 100%;
    }
    #box-alret{
        background: #f2dede;
        padding: 8px;
        text-align: center;
        font-weight: bold;
    }       
    </style>
</head>
<body>
    <div class="menu-css">
        <button onClick="location.href='detailed.php?dataset_id=<?php echo $url ?>'" class="btn btn-lg btn-css" type="button"><i class="fas fa-arrow-circle-left"></i> VALIDASI HASIL DATASET CTSCAN <?php echo $data['file_name'] ?></button>
    </div>
    <div>
        <div class="col-xs-6">
          <div class="form-signin">
            <img style="    width: 470px;height: 320px;padding-bottom: 10px;" 
                src=<?php 
                $url = rawurldecode($data['file_path']);
                echo $url;?>
            >
            <div>
                <form method="post">
                    <div class="row row-no-gutters" style="margin-top: 5px;">
                        <div class="col-xs-6">
                          <button onClick="location.href='detailed.php?dataset_id=<?php echo $back ?>'" class="btn btn-lg btn-primary btn-validasi-css" type="button">Back</button>
                        </div>
                        <div class="col-xs-6">
                          <button onClick="location.href='detailed.php?dataset_id=<?php echo $back ?>'" class="btn btn-lg btn-default btn-validasi-css" type="button">Next</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      <div class="col-xs-6">
          <div class="form-signin">
            <form method="post">
                <div class="form-group" style="padding-top: 50px;">
                    <label>IMG DATA ID</label>
                    <p style="border-style: ridge; padding: 12px;"><?php echo $data['file_name'] ?></p>
                </div>
                <div class="form-group">
                    <label>HASIL VALIDASI</label>
                    <p style="border-style: ridge; padding: 12px;"><?php 
                    if($data['validate'] == NULL){
                        echo "Belum Validasi";
                    } else {
                        echo $data['validate']; 
                    }?></p>
                </div>
                <div >
                    <div class="col-xs-6">
                      <input value="Valid" name="validasi" class="btn btn-lg btn-primary btn-validasi-css" type="submit"></input>  
                    </div>
                    <div class="col-xs-6">
                      <input value="Tidak Valid" name="not" class="btn btn-lg btn-default btn-validasi-css" type="submit"></input>  
                    </div>
                </div>             
            </form>
        </div>
      </div>
    </div>

</body>
</html>
