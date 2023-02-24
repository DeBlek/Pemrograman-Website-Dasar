<?php 
	include('db_connect.php');
	$database = new database();
	$database->__construct(); 
	$Email = $_GET['Email_Plngn'];
	$hapus = $database->hapususer($Email);

	header("location: tampiluser.php");
?>
