<?php
  include 'koneksi.php';
  if(!isset($_GET['dataset_id'])){
      die("[Error] Dataset ID Tidak Dimasukkan");
  }
  $query = $db->prepare("SELECT * FROM `dataset` WHERE dataset_id = :dataset_id");
  $query->bindParam(":dataset_id", $_GET['dataset_id']);
  $query->execute();
  if($query->rowCount() == 0){
      die("[Error] Dataset ID Tidak Ditemukan");
  }else{
      $data = $query->fetch();
  }
  if(isset($_POST['submit'])){
      $dataset_name = htmlentities($_POST['dataset_name']);
      $medic_record = htmlentities($_POST['medic_record']);
      $query = $db->prepare("UPDATE `dataset` SET `dataset_name`=:dataset_name,`medic_record`=:medic_record WHERE dataset_id=:dataset_id");
      $query->bindParam(":dataset_name", $dataset_name);
      $query->bindParam(":medic_record", $medic_record);
      $query->bindParam(":dataset_id", $_GET['dataset_id']);
      $query->execute();
      header("location: index.php?page=data");
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>CTScan</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">  
    <link href="<?php echo $base_url.'css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">      
  <style>
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
  </style>
  </head>
 <body>
  <div class="menu-css">
    <button onClick="location.href='data.php'" class="btn btn-lg btn-css" type="button"><i class="fas fa-arrow-circle-left"></i> EDIT DATASET</button>
  </div>
    <div class="container">
        <div class="form-signin">  
          <form method="post">
            <div class="form-group">
              <label>NAMA DATASET</label>
              <input class="form-control" type="text" name="dataset_name" value="<?php echo $data['dataset_name'] ?>">
            </div>
            <div class="form-group">
              <label>NOMOR REKAM MEDIS</label>
              <input class="form-control" name="medic_record" type="text" size="50" value="<?php echo $data['medic_record'] ?>">
            </div>
            <div class="btn-cnter-css">
              <input type="submit" name="submit" value="EDIT">
            </div>
        </form>
      </div>
    </div>
  </body>
</html>