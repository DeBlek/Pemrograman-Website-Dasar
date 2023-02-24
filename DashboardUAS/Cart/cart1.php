<?php 

session_start();
include_once('../db_connect.php');

if (!isset($_SESSION['is_login'])) {
  header("Location: ../Login/Login.php");
  exit;
}

if (isset($_POST['updatecartt']))
{
  $database = new database();
  $database->__construct();
  $Id_Brng = $_POST['Id_Brnggg'];
  // $Quantity = $_SESSION['Quantity'];
  $Harga_Brng = $_POST['Harga_Brnggg'];
  $Quantity = $_POST['Quantity_Brnggg'];
  $Email_Plngn = $_SESSION['Email_Plngn'];

    //membuat variabel $id untuk menyimpan id dari GET id di URL

    //query ke database SELECT tabel mahasiswa berdasarkan id = $id
    
    $sql = $database->updatecart($Email_Plngn, $Quantity, $Id_Brng, $Harga_Brng);
    if($sql){
      echo '<script>alert("Berhasil Update Cart."); document.location="cart1.php";</script>';
    }else{
      echo '<div class="alert alert-warning">Gagal Update.</div>';
    }
}
if (isset($_POST['hapuscart']))
{
  $database = new database();
  $database->__construct();
  $Id_Brng = $_POST['Id_Brnggg'];
  // $Quantity = $_SESSION['Quantity'];
  $Email_Plngn = $_SESSION['Email_Plngn'];

    //membuat variabel $id untuk menyimpan id dari GET id di URL

    //query ke database SELECT tabel mahasiswa berdasarkan id = $id
    
    $hapus = $database->hapuscartbrg($Id_Brng, $Email_Plngn);
    
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
                    <a href="Cart.html"><i class="fas fa-shopping-cart" data-toggle="tooltip" title="Keranjang Belanja"></i></a>
                    <i class="fas fa-envelope" data-toggle="tooltip" title="Pesan"></i>
                    <i class="fas fa-bell" data-toggle="modal" data-target="#exampleModalCenter" title="Notifikasi"></i>
                    <a href="../logoutuser.php"><i class="fas fa-sign-in-alt" data-toggle="tooltip" title="Logout"></i></a>
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
      <p style="color:red;">*Jika ingin Update Quantity barang silahkan tekan button "Edit Quantity"</p> 
        <?php 
        include_once('../db_connect.php');
        $database = new database();
        $database->__construct();
        $Email_Plngn = $_SESSION['Email_Plngn'];
        $sql = $database->tampilcart($Email_Plngn);
        while($data = mysqli_fetch_array($sql)){
        $total = array($data["Subtotal"]);
        $a;
      ?>
        <article class="product">
          <header>
            <a class="">
              <img src="../img/brg/<?php echo $data["Foto_Brng"]; ?>" alt="Cincin">
            </a>
          </header>
  
          <div class="content">
  
            <input type="hidden" name="Id_Brng" value="<?php echo $data["Id_Brng"]; ?>">
            <input type="text" name="" disabled="" value="<?php echo $data["Nama_Brng"]; ?>">
            <?php echo $data["Deskripsi_Brng"]; ?>
  
            <div title="You have selected this product to be shipped in the color yellow." style="top: 0" class="color yellow"></div>
            <div style="top: 43px" class="type small">16</div>
          </div>
  
          <footer class="content">
            <span class="qt-minus">-</span>
            <span class="qt"><?php echo $data["Quantity"];?></span>
            <span class="qt-plus">+</span>
            <a data-id="<?php echo $data["Id_Brng"]; ?>" data-quantity="<?php echo $data["Quantity"]; ?>" data-harga="<?php echo $data["Harga_Brng"]; ?>" id="tombolupdate" data-toggle="modal" data-target="#update" class=" btn btn-success text-white">Edit Quantity</a>
            
            <h2 class="full-price">
             <?php echo $data["Subtotal"]; ?>
            </h2>
  
            <h2 class="price">
              <?php echo $data["Harga_Brng"];?>
            </h2>
          </footer>

          
        </article>
  
        <?php
          error_reporting(error_reporting() & ~E_NOTICE);
          $a = $a + $data["Subtotal"];

          } 
          ?>
  
      </section>

  
    </div>
  
    <footer id="site-footer">
      <div class="container clearfix">
        <div class="left">
          <h2 class="subtotal">Subtotal: Rp. <span style="color:black;"><?php echo $a; ?></span></h2>
          <h3 class="tax">Pajak (5%): Rp. <span><input type="" name="" disabled="" style="border: none; color: black;" value="<?php echo 0.05 * $a; ?>"></span></h3>
          <h3 class="shipping">Pengiriman: Rp. <span style="color:#000000;">4500</span></h3>
        </div>
  
        <div class="right">
          <h1 class="total">Total: Rp. <span><input type="" name="" style="border: none; margin-right:-150px; color: black" value="<?php echo $a + (0.05 * $a) + 4500; ?>"></span></h1>
          <div style="text-align: center;">
          <a class="btn" href="../Checkout/checkout.php">Checkout</a>
          <a href="../Home/Home.php" class="btn btn-danger">Kembali</a> </div>
        </div>
  
      </div>
    </footer>
    </form>
    <form action="" method="post" id="form" enctype="multipart/form-data">
    <div id="update" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Quantity barang</h5>
              <input type="submit" name="hapuscart" class="btn btn-danger" value="Remove Barang">
            </div>
            
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label" for="Id_Brng">ID Barang</label>
                  <input type="text" name="Id_Brnggg" id="Id_Brnggg" readonly="" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="Harga_Brng">Harga Barang</label>
                  <input type="text" name="Harga_Brnggg" readonly="" id="Harga_Brnggg" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="Quantity_Brng">Quantity Barang</label>
                  <input type="text" name="Quantity_Brnggg" id="Quantity_Brnggg" class="form-control" required>
                  <p style="color:red;">*Masukkan Quantity yang anda inginkan diatas!</p>
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" name="updatecartt" class="btn btn-primary" value="Update">

                <a href="cart1.php" class="btn btn-warning">Kembali</a>
              </div>
           
          </div>
        </div>
      </div>
    </form>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="setting.js"></script>
</body>    

  <script>
    $(document).on("click", "#tombolupdate", function(){
      let id = $(this).data('id');
      let harga = $(this).data('harga');
      let quantity = $(this).data('quantity');

      $("#Id_Brnggg").val(id);
      $("#Harga_Brnggg").val(harga);
      $("#Quantity_Brnggg").val(quantity);
    });
    $(document).on("click", "#tombolhapus", function(e){
      e.preventDefault();
      var link = $(this).attr('href');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
          window.location = link;
      }
    })
    });

  </script>
</html>