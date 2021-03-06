<?php
  include 'koneksi.php';

  //dataset_id
  $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

  function generate_string($input, $strength = 16) {
      $input_length = strlen($input);
      $random_string = '';
      for($i = 0; $i < $strength; $i++) {
          $random_character = $input[mt_rand(0, $input_length - 1)];
          $random_string .= $random_character;
      }
   
      return $random_string;
  }

  if(isset($_POST['submit'])){
    //data
    $dataset_id = generate_string($permitted_chars, 20);
    $dataset_name = htmlentities($_POST['dataset_name']);
    $medic_record = htmlentities($_POST['medic_record']);
    $created_date = date("Y-m-d");

    //data
    $query = $db->prepare("INSERT INTO `dataset`(`dataset_id`,`dataset_name`,`medic_record`,`created_date`)
    VALUES (:dataset_id,:dataset_name,:medic_record,:created_date)");
    $query->bindParam(":dataset_id", $dataset_id);
    $query->bindParam(":dataset_name", $dataset_name);
    $query->bindParam(":medic_record", $medic_record);
    $query->bindParam(":created_date", $created_date);
    $query->execute();

    $query_dat = $db->prepare("SELECT * FROM dataset WHERE dataset_id=:dataset_id");
    $query_dat->bindParam(":dataset_id", $dataset_id);
    $query_dat->execute();

    $value = $query_dat->fetch();

    //data image
    $temp_folder = $value['dataset_id'];
    $folder_name = 'upload/'.$temp_folder;
    mkdir($folder_name,0777,true);
    chmod($folder_name, 0777);

    $countfiles = count($_FILES['files']['name']);
    $validate = NULL;
    $created_at = $created_date;
    $updated_at = $created_date;

    // Prepared statement
    $query_img = "INSERT INTO image_data (file_name,file_path, validate, dataset_id,created_at,updated_at) VALUES(?,?,?,?,?,?)";
    $statement  = $db->prepare($query_img);  
    // Loop all files
    for($i=0;$i<$countfiles;$i++){
      // File name
      $filename = $_FILES['files']['name'][$i];
      // Get extension
      $ext = end((explode(".", $filename)));
      // Valid image extension
      $valid_ext = array("png","jpeg","jpg");
      if(in_array($ext, $valid_ext)){
        // Upload file
        if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$folder_name.'/'.$filename)){
          // Execute query
          $statement->execute(array($filename,$folder_name.'/'.$filename,$validate,$dataset_id,$created_at,$updated_at));
        }
      }
    }

    header("location: data.php");
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
    <link href="css/all.css" rel="stylesheet">

    <style>
      body {
      }
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
      .btn-upload-css {
        display: block;
        width: 100%;
        margin-top: 45px;
      }         
    </style>  
  </head>  
  <body>
    <div class="menu-css">
      <button onClick="location.href='index.php'" class="btn btn-lg btn-css" type="submit"><i class="fas fa-arrow-circle-left"></i> UPLOAD DATA CTSCAN</button>
    </div>
    <div class="container">
      <div class="form-css">
        <form method="post" action='' enctype='multipart/form-data'>
          <div class="form-group">
              <label style="display: block !important;">NAMA DATASET</label>
              <input class="form-control" type="text" name="dataset_name">
          </div>
          <div class="form-group">
              <label style="display: block !important;">NOMOR REKAM MEDIS</label>
              <input class="form-control" type="text" name="medic_record">
          </div>            
          <div class="form-group">
              <label style="display: block !important;">FILES</label>
              <input type='file' name='files[]' multiple />
          </div>                       
          <div class="btn-cnter-css">
            <input class="btn btn-lg btn-primary btn-upload-css" type='submit' value='Upload' name='submit' />
            <input class="btn btn-lg btn-primary btn-upload-css" style="margin-top: 15px;" type='submit' value='Upload Otomatis' name='' />
          </div>        
        </form>
      </div>
    </div>

  <!-- Load File jquery.min.js yang ada difolder js -->
  <script src="js/jquery.min.js"></script>
  <!-- Load File bootstrap.min.js yang ada difolder js -->
  <script src="js/bootstrap.min.js"></script>

  </body>
</html>