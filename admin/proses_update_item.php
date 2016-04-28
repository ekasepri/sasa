<?php
include('../library/koneksi.php');

$id_item = $_POST['id_item'];
$merk = $_POST['merk'];
$tipe = $_POST['tipe'];
$warna = $_POST['warna'];
$harga = $_POST['harga'];

$query = mysql_query("update item set merk = '$merk', tipe = '$tipe', warna = '$warna', harga = '$harga' where id_item = '$id_item'");
if($query){
	header('location:index.php?menu=item');
} else{
	header('location:index.php?menu=item');
}
