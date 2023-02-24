<?php 
	include('db_connect.php');
	$database = new database();
	$database->__construct(); 
	$Id = $_GET['Id_Brng'];
	$hapus = $database->hapusbrg($Id);

	header("location: tampilbrg.php");
?>
