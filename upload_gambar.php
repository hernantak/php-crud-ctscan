<?php
	include "koneksi.php";
	
	if(isset($_POST['submit'])){

		// Count total files
		$countfiles = count($_FILES['files']['name']);
		
		// Prepared statement
		$query_img = "INSERT INTO image_data (file_name,file_path) VALUES(?,?)";

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
			   	if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'upload/'.$filename)){

			   		// Execute query
					$statement->execute(array($filename,'upload/'.$filename));

				}
      		}
		   	
		}
		echo "File upload successfully";
	}	

?>


<!DOCTYPE html>
<html>
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<title>Upload Multiple Image files to the Database using PDO - PHP</title>
	</head>
	<body>
		<form method='post' action='' enctype='multipart/form-data'>
			<input type='file' name='files[]' multiple />
			<input type='submit' value='Submit' name='submit' />
		</form>

	</body>
</html>