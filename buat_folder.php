<?php
	$folder_name = "testt";
	$lagi = "aaa";
	$url = "upload/".$lagi."/".$folder_name;
	$path = "upload/aaa/kkk";
	mkdir($url,0777,true);
	chmod($url, 0777);
	echo $url;
?>