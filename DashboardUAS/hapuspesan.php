<?php 
	include('db_connect.php');
	$database = new database();
	$database->__construct(); 
	$Email = $_GET['Email_Plgn'];
	$hapus = $database->hapuspesan($Email);

	header("location: tampilpesan.php");
?>
