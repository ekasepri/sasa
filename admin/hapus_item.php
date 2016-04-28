<?php
include('../library/koneksi.php');

$id = $_GET['id'];

$query = mysql_query("delete from item where id_item = '$id'");
if($query){
	header('location:index.php?menu=item');
} else{
	header('location:index.php?menu=item');
}
