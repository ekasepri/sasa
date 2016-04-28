<?php
include('../library/koneksi.php');

$merk = $_POST['merk'];
$tipe = $_POST['tipe'];
$warna = $_POST['warna'];
$harga = $_POST['harga'];

$query = mysql_query("insert into item (merk, tipe, warna, harga) values ('$merk', '$tipe', '$warna', '$harga')");
if($query){
	header('location:index.php?menu=item');
} else{
	header('location:index.php?menu=item');
}
