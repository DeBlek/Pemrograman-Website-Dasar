<?php 
include_once('../db_connect.php');
session_start();

if (!isset($_SESSION['is_login'])) {
  header("Location: ../Login/Login.php");
  exit;
}

if (isset($_POST['submitorder']))
{
  $database = new database();
  $database->__construct();
  $Email  = $_SESSION['Email_Plngn'];
  $date = date("Y-m-d H:i:s");  
    $sql = $database->order($Email);
    if($sql){
      echo '<script>alert("Berhasil Order."); document.location="../Home/Home.php";</script>';
    }else{
      echo '<div class="alert alert-warning">Gagal Order.</div>';
    }
}


if(isset($_SESSION['Email_Plngn'])){
  $database = new database();
  $database->__construct();
  $Email  = $_SESSION['Email_Plngn'];

  //membuat variabel $id untuk menyimpan id dari GET id di URL

  //query ke database SELECT tabel mahasiswa berdasarkan id = $id
  $select = $database->cekuser($Email);

  //jika hasil query = 0 maka muncul pesan error
  if(mysqli_num_rows($select) == 0){
    echo '<div class="alert alert-warning">Email tidak ada dalam database.</div>';
    exit();
  //jika hasil query > 0
  }else{
    //membuat variabel $data dan menyimpan data row dari query
    $data = mysqli_fetch_assoc($select);
  }
}
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="setting1.css">
	<link rel = "shortcut icon" href = "Profile/Foto/logo.jpeg">
</head>

<body>
<h2 style="text-align: center;">Checkout</h2>
<form method="post" action="">
<div class="row">
  <div class="col-75">
    <div class="container">
        <div class="row">
          <div class="col-50">
            <h3>Data Pengiriman</h3>
            <label for="fname"><i class="fa fa-user"></i> Nama Lengkap</label>
            <input type = "text" class = "input_box" disabled="" id = "Nama_Pengguna" name = "Nama_Plngn" value="<?php echo "$data[Nama_Plngn]"; ?>">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type = "text" class = "input_box" disabled id = "Email_Pengguna" name = "Email_Plngn" value="<?php echo "$data[Email_Plngn]"; ?>" >
            <label for="city"><i class="fa fa-institution"></i> Jenis Kelamin</label>
            <input type = "text" class = "input_box" disabled="" id = "Jenis_Kelamin" name = "JK_Plngn" value="<?php echo "$data[JK_Plngn]"; ?>">
            <label for="state">Nomor Handphone</label>
            <input type = "text" class = "input_box" disabled="" id = "Nomor_Telepon" name = "NoTlpn_Plngn" value="<?php echo "$data[NoTlpn_Plngn]"; ?>">
            <label for="adr"><i class="fa fa-address-card"></i> Alamat Lengkap</label>
            <input type = "text" class = "input_box" disabled="" id = "Alamat" name = "Alamat_Plngn" value="<?php echo "$data[Alamat_Plngn]"; ?>">
            <p><span style="color: red;">*Jika ingin mengubah data silahkan kehalaman edit profile</span></p>  <p><b>Transfer ke rekening 6288887799 a/n Rico Gouw</b></p><br>
          </div>
		    </div>
    </div>
  </div>
  <div class="col-12">
    <div class="container">
      <h4>Keranjang <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
      <?php 
        include_once('../db_connect.php');
        $database = new database();
        $database->__construct();
        $Email_Plngn = $_SESSION['Email_Plngn'];
        $sql = $database->tampilcart($Email_Plngn);
        while($data = mysqli_fetch_array($sql)){
          $a;
      ?>
      <p><a href="../Cart/cart1.php"><?php echo $data["Nama_Brng"]; ?></a> <span class="price text-black">Rp. <?php echo $data["Subtotal"]; ?></span></p>

      <?php
        error_reporting(error_reporting() & ~E_NOTICE);
        $a = $a + $data["Subtotal"];
          } 
          ?>
      <hr>
      <p>Pajak(5%) <span class="price" style="color:black"><b>Rp. <?php echo 0.05 * $a; ?></b></span>
      <p>Pengiriman(Rp.4500) <span class="price" style="color:black"><b>Rp. <?php echo '4500'; ?></b></span>
      <p>Total <span class="price" style="color:black"><b>Rp. <?php echo $a + (0.05 * $a) + 4500; ?></b></span></p>
    </div>
  </div>
</div>
<div class="center"><input type="submit" name="submitorder" onclick="myFunction()" class="btn" value="Continue to Checkout" ></div>
<div class="center" style="margin-top:-50px;"><a href="../Cart/cart1.php" class="btn btn-danger">Back to Cart</a></div>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<script>
function myFunction() {
  alert("Thankyou for your order!");
  // window.location.href = "../Home/Home.php"
}
</script>
</html>
