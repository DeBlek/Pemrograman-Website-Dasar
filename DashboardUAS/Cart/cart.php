<?php 
session_start();
include_once('../db_connect.php');
if (isset($_POST['updatecart']))
{
  $database = new database();
  $database->__construct();
  $Id_Brng = $_POST['Id_Brng2'];
  $Quantity = $_POST['Quantity2'];
  $Subtotal = $_POST['Subtotal1'];
  $Harga_Brng = $_POST['Harga_Brng'];

  if(isset($_SESSION['Email_Plngn'])){
    $Email_Plngn = $_SESSION['Email_Plngn'];

    //membuat variabel $id untuk menyimpan id dari GET id di URL

    //query ke database SELECT tabel mahasiswa berdasarkan id = $id
    
    $sql = $database->updatecart($Email_Plngn, $Quantity, $Id_Brng, $Subtotal, $Harga_Brng);
    if($sql){
      echo '<script>alert("Berhasil Update Cart."); document.location="Home.php";</script>';
    }else{
      echo '<div class="alert alert-warning">Gagal Update.</div>';
    }

    //jika hasil query > 0
    
  }

}
?>

<!doctype html>

<html lang="en">
  <head>
    <link rel="stylesheet" href="setting.css">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

  </head>
  <body>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-secondary fixed-top">
        <div class="container">
            <h3><!-- <i class="fas fa-cart-plus"> --><img src="Foto/lavore.jpg" height="35px;"></i> LAVORE STORE</h3>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="../Home/Home.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../Profile/Profile.html">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../ContactUS/ContactUS.html">Contact Us</a>
                  </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-light my-2 my-sm-0" style="margin-right: 7px;" type="submit">Search</button>
              </form>
              <div class="icon">
                  <h5>
                    <a href="Cart.html"><i class="fas fa-shopping-cart" data-toggle="tooltip" title="Keranjang Belanja"></i></a>
                    <i class="fas fa-envelope" data-toggle="tooltip" title="Pesan"></i>
                    <i class="fas fa-bell" data-toggle="tooltip" title="Notifikasi"></i>
                    <a href="../Login/Login.html"><i class="fas fa-sign-in-alt" data-toggle="tooltip" title="Login"></i></a>
                  </h5>
                </div>
            </div>
          </div>
      </nav>
    </div>
     <br><br><br>
     <form method="post" action="">
      
    <div class="container">
    
      <section id="cart"> 
      <?php 
        include_once('../db_connect.php');
        $database = new database();
        $database->__construct();
        $Email_Plngn = $_SESSION['Email_Plngn'];
        $sql = $database->tampilcart($Email_Plngn);
        while($data = mysqli_fetch_array($sql)){
          $a = array($data["Subtotal"]); 
      ?>
        <article class="product">
          <header>
            <a class="remove">
              <img src="../img/brg/<?php echo $data["Foto_Brng"]; ?>" alt="Cincin">
  
              <h3>Remove product</h3>
            </a>
          </header>
          <div class="content">
            <input type="hidden" name="Id_Brng2" value="<?php echo $data["Id_Brng"]; ?>">
            <input type="text" name="" value="<?php echo $data["Nama_Brng"]; ?>">
            <?php echo $data["Deskripsi_Brng"]; ?>
          
          </div>
  
          <footer class="content">
            <span class="qt-minus">-</span>
            <span class="qt"><?php echo $data["Quantity"]; ?></span>
            <span class="qt-plus">+</span>
            
            <h2 class="full-price">
              <?php echo $data["Subtotal"]; ?>
            </h2>
  
            <h2 class="price">
              <span><?php echo $data["Harga_Brng"]; ?></span>
            </h2>
          </footer>
        </article>
   <?php
          } 
          ?>
        
  
      </section>
  
    </div>
  
    <footer id="site-footer">
      <div class="container clearfix">
        <div class="left">
          <h2 class="subtotal">Subtotal: Rp. <span><?php echo array_sum($a); ?></span></h2>
          <h3 class="tax">Pajak (5%): Rp. <span><?php echo $data["Pajak"]; ?></span></h3>
          <h3 class="shipping">Pengiriman: Rp. <span>4500</span></h3>
        </div>
  
        <div class="right">
          <h1 class="total">Total: Rp. <span><input type="" name="" style="display: none;">120000</span></h1>
          <a href="#?Quantity=$data[Quantity]" class="btn btn-success"><input type="submit" name="updatecart" value="UpdateCart"></a>
          <a class="btn btn-danger" href="../Checkout/checkout.php">Checkout</a>
        </div>
  
      </div>
    </footer>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="setting.js"></script>
</body>    
</html>