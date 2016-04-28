<?php
	$host = "ap-cdbr-azure-southeast-b.cloudapp.net";
	$user = "b4f9ee9334206c";
	$password = "6fe349e6";
	$database = "bagstore";
	
	//building connection to database
	$koneksi = mysql_connect($host, $user, $password);
	
	//select database that will be used
	mysql_select_db($database,$koneksi);
	
	//connection success test
	if($koneksi){
		//echo "berhasil koneksi";
	} else {
		echo "gagal koneksi";
	}
?>