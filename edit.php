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

      header("location: data.php");
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
    <link href="css/all.css" rel="stylesheet">

  <style>
    .form-css {
        max-width: 500px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-css .form-css-heading{
        margin-bottom: 10px;
        text-align: center;
    }
    .form-css .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }
    .form-css .form-control:focus {
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
    .btn-edit-css {
      display: block;
      width: 100%;
      margin-top: 45px;
    }        
  </style>
  </head>
 <body>
  <div class="menu-css">
    <button onClick="location.href='data.php'" class="btn btn-lg btn-css" type="button"><i class="fas fa-arrow-circle-left"></i> EDIT DATASET</button>
  </div>
    <div class="container">
        <div class="form-css">  
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
              <input class="btn btn-lg btn-primary btn-edit-css" type="submit" name="submit" value="EDIT">
            </div>
        </form>
      </div>
    </div>
  </body>
</html>