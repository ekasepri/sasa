<?php
include('../library/koneksi.php');

$id_detail = $_GET['id'];
$queryharga = mysql_query("select total_harga,id_transaksi from transaksi where id_detail = '$id_detail'");
$ambilharga = mysql_fetch_assoc($queryharga);
$queryupdateharga = mysql_query("update nota set total_harga=total_harga-'$ambilharga[total_harga]' where id_transaksi = $ambilharga[id_transaksi]");
$query = mysql_query("delete from transaksi where id_detail = '$id_detail'");
if($query){
	header("location:index.php?menu=lihat_nota&id=$ambilharga[id_transaksi]");
} else{
	header("location:index.php?menu=lihat_nota&id=$ambilharga[id_transaksi]");
}
