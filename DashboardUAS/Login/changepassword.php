<?php 
	session_start();
	include_once('../db_connect.php');
	$database = new database();
	$database->__construct();
	
	if(isset($_POST['Login'])){
		$Email_Plngn = $_POST['Email_Plngn'];
		$cekuser = $database->cekuser2($Email_Plngn); 
		$data = mysqli_fetch_array($cekuser);

		if ($data) {
			$Password_Baru = $_POST['Password_Baru'];
			$sql = $database->changepass($data['Email_Plngn'],$data['Password_Plngn'],$Password_Baru);
			echo '<script>alert("Berhasil Ganti password"); document.location="Login.php";</script>';
		}else{
			echo "<script>alert('maaf, Password atau Email anda tidak sesuai!');</script>";
		}
		
	}
?>	
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
		<title>Lavore Store</title>
		<link rel = "shortcut icon" href = "Foto1/logo.jpeg">
		<link rel = "stylesheet" href = "External CSS.css">
	</head>
	
	<body style = "background-color : #636361;">
		<div class = "Login">
			<img src = "Foto1/Logo.png">
			<h1>Ganti Password</h1>
			<form method = "POST">
				<input type = "email" class = "input_box" id = "Email_Plngn" name = "Email_Plngn" placeholder = "Masukan Email">
				<input type = "password" class = "input_box" id = "Password_Baru" name = "Password_Baru" placeholder = "Masukkan Password baru"><br>
				 
				<div class = "button_sign">

					<button type = "Submit" name = "Login" class="btn btn-secondary btn-success"> Save</button>	
				</div>

				<hr>
				<p><a href="Login.php">Kembali</a></p>
			</form>
		</div>
	</body>
</html>