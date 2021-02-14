<?php
$page = (isset($_GET['page']))? $_GET['page'] : '';

if(isset($_SESSION['username'])){ // Jika sudah login
	if($_SESSION['role'] == 'admin'){ // Jika user yang login adalah admin
		// Berikut halaman yang bisa di akses :
		switch($page){
			case 'data': // $page == login (jika isi dari $page adalah home)
			include "views/data.php"; // load file login.php yang ada di folder views
			break;

			case 'home': // $page == home (jika isi dari $page adalah home)
			include "views/home.php"; // load file home.php yang ada di folder views
			break;

			case 'edit': // $page == berita (jika isi dari $page adalah berita)
			include "views/edit.php"; // load file berita.php yang ada di folder views
			break;

			case 'detailed': // $page == pengguna (jika isi dari $page adalah pengguna)
			include "views/detailed.php"; // load file pengguna.php yang ada di folder views
			break;

			case 'download': // $page == kontak (jika isi dari $page adalah kontak)
			include "system/download.php"; // load file kontak.php yang ada di folder views
			break;

			case 'upload': // $page == kontak (jika isi dari $page adalah kontak)
			include "views/upload.php"; // load file kontak.php yang ada di folder views
			break;

			case 'validasi': // $page == kontak (jika isi dari $page adalah kontak)
			include "views/validasi.php"; // load file kontak.php yang ada di folder views
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
			case 'login': // $page == login (jika isi dari $page adalah home)
			include "views/login.php"; // load file login.php yang ada di folder views
			break;

			case 'home': // $page == home (jika isi dari $page adalah home)
			include "views/home.php"; // load file home.php yang ada di folder views
			break;

			case 'berita': // $page == berita (jika isi dari $page adalah berita)
			include "views/berita.php"; // load file berita.php yang ada di folder views
			break;

			case 'kontak': // $page == kontak (jika isi dari $page adalah kontak)
			include "views/kontak.php"; // load file kontak.php yang ada di folder views
			break;

			default: // Ini untuk set default jika isi dari $page tidak ada
			// Set halaman 404 Not Found
			header("HTTP/1.0 404 Not Found");
			echo "<h1>404 Not Found</h1>";
			echo "The page that you have requested could not be found.";
			exit();
		}
	}
}else // Jika belum login
	include "views/login.php"; // Set default halamannya adalah "login"
?>
