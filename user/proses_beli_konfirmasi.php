<?php
include('../library/koneksi.php');
session_start();

$query_user_id = mysql_query("select id_customer from customer where email = '$_SESSION[user]'");
$ambil_user_id = mysql_fetch_assoc($query_user_id);
$id_customer = $ambil_user_id['id_customer'];
$tanggal_pembelian = date('Y-m-d');
$total_harga= $_SESSION['total_harga'];

$query = mysql_query("insert into nota (tanggal_pembelian, total_harga, id_customer) values ('$tanggal_pembelian', '$total_harga', '$id_customer')");
$query_select = mysql_query("select max(id_transaksi) as id_terakhir from nota");
$ambil_id = mysql_fetch_assoc($query_select);
$id_transaksi = $ambil_id['id_terakhir'];

foreach($_SESSION['pembelian'] as $row){
	$query2 = mysql_query("insert into transaksi values (default,'$row[id_item]','$id_transaksi','$row[jumlah_barang]','$row[harga_satuan]','$row[sub_total_harga]')");
}
			
if($query2){
	echo "<script>window.alert('Pembelian Anda Berhasil diproses'); window.location.href('index.php');</script>";
} else{
	header('location:index.php?menu=index.php');
}
unset($_SESSION['pembelian']);
unset($_SESSION['total_harga']);
header('location:index.php');
