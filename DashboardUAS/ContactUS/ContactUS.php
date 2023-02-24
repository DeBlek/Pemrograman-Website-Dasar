<?php 
session_start();

if (!isset($_SESSION['is_login'])) {
  header("Location: ../Login/Login.php");
  exit;
}
include_once('../db_connect.php');
if(isset($_POST['submit'])){
  $database = new database();
  $database->__construct();

  $Email_Plngn   = $_SESSION['Email_Plngn'];
  $Pesan = $_POST['Pesan'];
  
    $sql = $database->tambahpesan($Email_Plngn,$Pesan);
    if($sql){
      echo '<script>alert("Berhasil mengirim pesan."); document.location="ContactUS.php";</script>';
    }else{
      echo '<div class="alert alert-warning">Gagal mengirim pesan.</div>';
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



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="ContactUS.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    

    <title>Contact Us</title>
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
                    <a class="nav-link" href="../Profile/Profile.php">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../ContactUS/ContactUS.php">Contact Us</a>
                  </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-light my-2 my-sm-0" style="margin-right: 7px;" type="submit">Search</button>
              </form>
              <div class="icon">
                <h5>
                  <a href="../Cart/cart1.php"><i class="fas fa-shopping-cart" data-toggle="tooltip" title="Keranjang Belanja"></i></a>
                  <i class="fas fa-envelope" data-toggle="tooltip" title="Pesan"></i>
                  <i class="fas fa-bell" data-toggle="modal" data-target="#exampleModalCenter" title="Notifikasi"></i>
                  <a href="../logoutuser.php"><i class="fas fa-sign-in-alt" data-toggle="tooltip" title="Logout"></i></a>
                </h5>
                </div>
            </div>
          </div>
      </nav>
    </div>
    <div class="container container1">
      <h2 class="heading">Contact Us</h2>
      <p style="text-align: center;">We are always here to help. If your have requirements/queries abaout our services:</p>
      <p style="text-align: center; margin-top: -20px;">fill up the contact form below and we'll do our best to reply within 24 hours alternatively simply pickup the phone and give us a call.</p>
      <br>
      <div class="row">
        <div class="col-md-6">
          <form method="post" action="">
            <input type="Email" name="Email_Plngn" disabled value="<?php echo "$data[Email_Plngn]"; ?>" class="form-control">
            <br>
            <input type="Text" name="text" required="" placeholder="your name" class="form-control">
            <br>
            <textarea rows="6" class="form-control" name="Pesan" placeholder="Message" required=""></textarea>
            <center>
              <input style= "margin-top: 6px;" type="submit" name="submit" class="btn btn-primary" value="Submit">
            </center>
          </form>
        </div>
        <div class="col-md-1">
          
        </div>
        <div class="col-md-5">
          <br>
          <p><i class="fa fa-map-marker"></i><span>12 Selengkang, Kab. Sekadau, Indonesia.</span></p>
          <p><i class="fa fa-phone"></i><span>+62 8965 2024 548</span></p>
          <p><i class="fa fa-envelope"></i><span>LavoreStore@gmail.com</span></p><hr>
          <div class="media">
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#"><i class="fab fa-youtube"></i></a></li>
              <li><a href="#"><i class="fab fa-telegram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Check Pesanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <div class="modal-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
          <thead class="bg-secondary text-white">
            <tr>
              <th>Id Pesanan</th>
              <th>Email</th>
              <th>Progress</th>
              <th>Tanggal Pesanan</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $database = new database();
              $database->__construct();
              $Email_Plngn = $_SESSION['Email_Plngn'];
              $sql = $database->cekpesanan($Email_Plngn);
              while($data = mysqli_fetch_assoc($sql))
              {
            ?>
            <tr>
              <td><?php echo $data["Id_Pembelian"]; ?></td>
              <td><?php echo $data["Email_Plngn"]; ?></td>
              <td><?php echo $data["Progress"]; ?></td>
              <td><?php echo $data["Tanggal"]; ?></td>
            </tr>
            <?php
            } 
            ?>
          </tbody>
        </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="ContactUS.js"></script>
  </body>
</html>