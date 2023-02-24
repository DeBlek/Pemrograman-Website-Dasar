<?php 
	include_once('../db_connect.php');
	$database = new database();
	if(isset($_POST['register'])){
		$Nama_Plngn = $_POST['Nama_Pengguna'];
		$Email_Plngn = $_POST['Email_Pengguna'];
		$Password_Plngn = $_POST['Password'];
		$JK_Plngn = $_POST['Jenis_Kelamin'];
		$TL_Plngn = $_POST['Tanggal_Lahir'];
		$NoTlpn_Plngn = $_POST['Nomor_Telepon'];
		$Alamat_Plngn = $_POST['Alamat'];
		if($database->register($Nama_Plngn, $Email_Plngn, $Password_Plngn, $JK_Plngn, $TL_Plngn, $NoTlpn_Plngn, $Alamat_Plngn))
		{
			header('location: Login.php');
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
		<title> Lavore Store </title>
		<link rel="shortcut icon" href="Foto/Logo.jpeg">
		<link rel="stylesheet" href = "External CSS.css">
	</head>

	<body style = "background-color : #636361;" >
		<div class = "signup">
			<img src = "Foto1/Logo.png">
			<h1> Sign Up </h1>		
			<form method = "post">
				<input type = "text" class = "input_box" id = "Nama_Pengguna" name = "Nama_Pengguna" placeholder = "Nama Anda">
				<input type = "email" class = "input_box" id = "Email_Pengguna" name = "Email_Pengguna" placeholder = "Email Anda">
				<input type = "Password" class = "input_box" id = "Password" name = "Password" placeholder = "Password Anda">				
				<input type = "text" class = "input_box" id = "Jenis_Kelamin" name = "Jenis_Kelamin" placeholder = "Jenis Kelamin Anda">
				<input type = "date" class = "input_box" id = "Tanggal_Lahir" name = "Tanggal_Lahir" placeholder = "Tanggal Lahir Anda">
				<input type = "text" class = "input_box" id = "Nomor_Telepon" name = "Nomor_Telepon" placeholder = "Nomor Telepon Anda">
				<input type = "text" class = "input_box" id = "Alamat" name = "Alamat" placeholder = "Alamat Tempat Tinggal Anda">				
				<div class = "button_sign">
					<button type = "submit" name = "register">Sign Up</button>
				</div>
				<hr>
				<p>Sudah punya akun ? <a href="Login.php">Login</a></p>
			</form>
		</div>
	</body>
</html>