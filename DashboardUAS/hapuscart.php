<?php 
	include('db_connect.php');
	$database = new database();
	$database->__construct(); 
	$Id_Brng = $_GET['Id_Brng'];
	$hapus = $database->hapuscartbrg2($Id_Brng);

	header("location: tampilcart.php");
?>
