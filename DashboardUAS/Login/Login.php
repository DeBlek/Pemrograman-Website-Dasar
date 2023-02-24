<?php 
	session_start();
	include_once('../db_connect.php');
	$database = new database();
	$database->__construct();
	
	if(isset($_SESSION['is_login'])){
		header('location:../Home/Home.php');
	}
 
	// if(isset($_COOKIE['Email_Plngn'])){
	// 	$database->relogin($_COOKIE['Email_Plngn']);
	// 	header('location:../Home/Home.php');
	// }

	if(isset($_POST['Login'])){
		$Email_Plngn = $_POST['Email_Plngn'];
		$Password_Plngn = $_POST['Password_Plngn'];
		if(isset($_POST['remember'])){
			$remember = TRUE;
		}
		else{
			$remember = FALSE;
		}
		if($database->loginuser($Email_Plngn, $Password_Plngn ,$remember)){
			header('location:../Home/Home.php');
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
			<h1>Login</h1>
			<form method = "POST">
				<input type = "email" class = "input_box" id = "Email_Plngn" name = "Email_Plngn" placeholder = "Masukan Email" required="">
				<input type = "password" class = "input_box" id = "Password_Plngn" name = "Password_Plngn" placeholder = "Masukan Password" required=""><br>
				 
				<div class = "button_sign">

					<button type = "Submit" name = "Login" class="btn btn-secondary btn-success"> Login</button>	
				</div>

				<hr>
				<p>Buat akun ? <a href="Sign_Up.php">Sign Up</a></p>
				<a href="changepassword.php">Lupa password</a>
			</form>
		</div>
	</body>
</html>