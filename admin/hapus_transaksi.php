<?php
include('../library/koneksi.php');

$id = $_GET['id'];

$query = mysql_query("delete from transaksi where id_transaksi = '$id'");
if($query){
	header('location:index.php?menu=transaksi');
} else{
	header('location:index.php?menu=transaksi');
}
