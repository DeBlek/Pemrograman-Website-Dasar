<?php 
	include('db_connect.php');
	$database = new database();
	$database->__construct(); 
	$Id_Pembelian = $_GET['Id_Pembelian'];
	$hapus = $database->hapushistory($Id_Pembelian);

	header("location: tampilhistory.php");
?>
