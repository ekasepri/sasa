<?php
include('../library/koneksi.php');

$id = $_GET['id'];

$query = mysql_query("delete from customer where id_customer = '$id'");
if($query){
	header('location:index.php?menu=customer');
} else{
	header('location:index.php?menu=customer');
}
