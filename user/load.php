<?php
if($_GET["menu"]){
	include_once($_GET["menu"].".php");
}
if(empty($_GET["menu"])){
	include_once("beranda.php");
}
?>