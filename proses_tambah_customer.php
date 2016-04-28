<?php
include('library/koneksi.php');

$email = $_POST['email'];
$pass = $_POST['pass'];
$address = $_POST['address'];
$no_telp = $_POST['no_telp'];
$nama = $_POST['nama'];

$query = mysql_query("insert into customer (nama, alamat, no_telp, email, password) values ('$nama', '$address', '$no_telp', '$email', '$pass')");
if($query){
	header('location:index.php');
} else{
	header('location:register.php');
}
