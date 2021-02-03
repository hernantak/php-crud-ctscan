<?php
  include 'koneksi.php';
  if(!isset($_GET['dataset_id'])){
      die("Error: Dataset ID Tidak Dimasukkan");
  }
  $query = $db->prepare("SELECT * FROM `dataset` WHERE dataset_id = :dataset_id");
  $query->bindParam(":dataset_id", $_GET['dataset_id']);
  $query->execute();
  if($query->rowCount() == 0){
      die("Error: Dataset ID Tidak Ditemukan");
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
      header("location: data.php");
  }
?>

<!DOCTYPE html>
<html>
    <head>
 <title>CRUD PDO Javanet Media </title>
    <meta charset="utf-8">
    </head>
 <body bgcolor="#CCCCCC">
    <h2><p align="center">EDIT DATA</p></h2>
    <form method="post">
 <table width="546" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center">
  <tr>
    <td width="189" height="20"> </td>
    <td width="26"> </td>
    <td width="331"> </td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">DATASET ID</td>
    <td align="center" valign="top">:</td>
    <td valign="middle">
      <input type="text" name="dataset_id" value="<?php echo $data['dataset_id'] ?>" readonly="readonly"> 
    </td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">NAMA DATASET</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input type="text" name="dataset_name" value="<?php echo $data['dataset_name'] ?>">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">NO REKAM MEDIS</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="medic_record" type="text" size="50" value="<?php echo $data['medic_record'] ?>">
    </label></td>
  </tr>

  <tr>
    <td height="42"> </td>
    <td> </td>
    <td><input type="submit" name="submit" value="EDIT"></td>
  </tr>
  </table>
  </form><p align="center"><a href=http://www.javanetmedia.com>www.javanetmedia.com</a></p>
  </body>
</html>