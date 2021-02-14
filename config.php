<?php
$page = (isset($_GET['page']))? $_GET['page'] : '';

if(isset($_SESSION['username'])){ // Jika sudah login
	if($_SESSION['role'] == 'admin'){ // Jika user yang login adalah admin
		// Berikut halaman yang bisa di akses :
		switch($page){
			case 'data': 
			include "views/data.php"; 
			break;

			case 'home': 
			include "views/home.php"; 
			break;

			case 'edit': 
			include "views/edit.php";
			break;

			case 'detailed':
			include "views/detailed.php";
			break;

			case 'download':
			include "system/download.php"; 
			break;

			case 'upload':
			include "views/upload.php";
			break;

			case 'validasi':
			include "views/validasi.php";
			break;

			case 'delete_img':
			include "system/delete_img.php";
			break;

			case 'delete':
			include "system/delete.php";
			break;			

			default: // Ini untuk set default jika isi dari $page tidak ada
			// Set halaman 404 Not Found
			header("HTTP/1.0 404 Not Found");
			echo "<h1>404 Not Found</h1>";
			echo "The page that you have requested could not be foundsadsa.";
			exit();
		}
	}else{ // Jika user yang login adalah operator
		// Berikut halaman yang bisa di akses :
		switch($page){
			case 'data': 
			include "views/data.php"; 
			break;

			case 'home': 
			include "views/home.php"; 
			break;

			case 'detailed':
			include "views/detailed.php";
			break;

			case 'download':
			include "system/download.php";
			break;

			default: // Ini untuk set default jika isi dari $page tidak ada
			// Set halaman 404 Not Found
			header("HTTP/1.0 404 Not Found");
			echo "<h1>404 Not Found</h1>";
			echo "The page that you have requested could not be foundsadsa.";
			exit();
		}
	}
}else // Jika belum login
	include "views/login.php"; // Set default halamannya adalah "login"
?>
