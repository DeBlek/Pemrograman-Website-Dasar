<?php 
	include('../db_connect.php');
	$database = new database();
	$database->__construct(); 
	
	// if(isset($_GET['Id_Brng'])){
	// 	$Id = $_GET['Id_Brng'];
	// 	if(isset($_SESSION['Email_Plngn'])){
	// 		$Email_Plngn = $_SESSION['Email_Plngn'];
	// 		$hapus = $database->hapuscartbrg($Id, $Email_Plngn);
	// 		if($hapus){
	// 			header("location: cart1.php");
	// 		}else{
	// 			echo '<div class="alert alert-warning">Gagal Update.</div>';
	// 		}		
	// 	}
	// }

	$Id = $_GET['Id_Brng'];
	$Email_Plngn = $_SESSION['Email_Plngn'];
	$hapus = $database->hapuscartbrg($Id, $Email_Plngn);
	header("location: ../Home/Home.php");
?>