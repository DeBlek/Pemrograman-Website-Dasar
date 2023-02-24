<?php 
session_start();
include_once('db_connect.php');
$database = new database();
$database->__construct();

if(isset($_SESSION['login']))
{
    header('location:index.php');
}
 
if(isset($_POST['login']))
{
    $email = $_POST['Email_Admin'];
    $password = $_POST['Password'];
    if(isset($_POST['remember']))
    {
      $remember = TRUE;
    }
    else
    {
      $remember = FALSE;
    }
    $loginn = $database->loginadmin($email,$password,$remember);
    if($loginn)
      ?>
    {
      <script src="package/dist/sweetalert2.min.js"></script>
      <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
      <script>
      Swal.fire({
          title: 'success',
          text: "Selamat, login berhasil!",
          icon: 'success'
        }).then((result) => {
              window.location = 'index.php';
        })
      </script>
    }
    <?php
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <title>َLogin</title>
    <link rel="stylesheet" href="LoginAdminn/style.css">
  </head>
  <body>

<form class="box" action="" method="post" onSubmit="return validasi()">
  <h1>Login Admin</h1>
  <input type="text" name="Email_Admin" id="Email_Admin" placeholder="Email">
  <input type="password" name="Password" id="Password" placeholder="Password">
  <input type="submit" name="login" value="Login">
</form>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

  <script type="text/javascript">
	function validasi() {
		var email = document.getElementById("Email_Admin").value;
		var password = document.getElementById("Password").value;		
		if (email != "" && password!="") {
			return true;
		}else{
			alert('email dan Password harus di isi !');
			return false;
		}
	}
 
</script>
</html>
