<?php 
include_once('../db_connect.php');
session_start();

if (!isset($_SESSION['is_login'])) {
	header("Location: ../Login/Login.php");
	exit;
}

if (isset($_POST['buy']))
{

	$database = new database();
	$database->__construct();
	$Id_Brng = $_POST['Id_Brng1'];
	$Quantity = $_POST['quantity'];
	$Pajak = $_POST['Pajak'];
	$Subtotal = $_POST['Subtotal'];

	if(isset($_SESSION['Email_Plngn'])){
		$Email_Plngn = $_SESSION['Email_Plngn'];

		//membuat variabel $id untuk menyimpan id dari GET id di URL

		//query ke database SELECT tabel mahasiswa berdasarkan id = $id
		
		$sql = $database->addcart($Email_Plngn, $Id_Brng, $Pajak, $Quantity, $Subtotal);
		if($sql){
			echo '<script>alert("Berhasil Add To Cart."); document.location="Home.php";</script>';
		}else{
			echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
		}

		//jika hasil query > 0
		
	}

}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<script src="../package/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="../package/dist/sweetalert2.min.css">

	<link rel="stylesheet" type="text/css" href="Home.css">

	<title>E-commerce</title>
</head>
 <body>
 	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light bg-secondary fixed-top">
			<div class="container">
	  			<h3><!-- <i class="fas fa-cart-plus"> --><img src="Foto/lavore.jpeg" height="35px;"></i> LAVORE STORE</h3>
	  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  			</button>   
	  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    		<ul class="navbar-nav ml-auto">
	      			<li class="nav-item active">
	        			<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      			</li>
	      			<li class="nav-item">
	        			<a class="nav-link" href="../Profile/Profile.php">Profile</a>
	      			</li>
	      			<li class="nav-item">
	        			<a class="nav-link" href="../ContactUS/ContactUS.php">Contact Us</a>
	      			</li>
				   </ul>
				   <form class="form-inline my-2 my-lg-0" method="post">
			      	<input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
			      	<button class="btn btn-outline-light my-2 my-sm-0" name="cari" style="margin-right: 7px;" type="submit">Search</button>
				   </form>
				   <div class="icon">
		      		<h5>
		      			<a href="../Cart/cart1.php"><i class="fas fa-shopping-cart" title="Keranjang Belanja"></i></a>
		      			<i class="fas fa-envelope" data-toggle="tooltip" title="Pesan"></i>
		      			<i class="fas fa-bell" data-toggle="modal" data-target="#exampleModalCenter" title="Notifikasi"></i>
		      			<a href="../logoutuser.php" id="tombollogout"><i class="fas fa-sign-in-alt" data-toggle="tooltip" title="Logout"></i></a>
		      		</h5>
			      </div>
			  	</div>
		  	</div>
		</nav>
	</div>
	<div class="row mt-5 no-gutters col-sm-12">
		<div class="col-md-2 bg-light">
			<ul class="list-group list-group-flush pt-4 p-2">
		  		<li class="list-group-item bg-secondary"><i class="fas fa-list"></i> Kategori Produk</li>
		  		<li class="list-group-item"><i class="fas fa-angle-right"></i> Peralatan Elektronik</li>
		  		<li class="list-group-item"><i class="fas fa-angle-right"></i> Fashion</li>
		  		<li class="list-group-item"><i class="fas fa-angle-right"></i> Aksesoris Elektronik</li>
		  		<li class="list-group-item"><i class="fas fa-angle-right"></i> Aksesoris Elektronik Pria</li>
		  		<li class="list-group-item"><i class="fas fa-angle-right"></i> Aksesoris Elektronik Wanita</li>	
			</ul>
		</div>
		<div class="banner col-md-10 pt-4">
			<div id="Slideshow" class="carousel slide" data-ride="carousel">
			 	<ol class="carousel-indicators">
			    	<li data-target="#Slideshow" data-slide-to="0" class="active"></li>
			    	<li data-target="#Slideshow" data-slide-to="1"></li>
			    	<li data-target="#Slideshow" data-slide-to="2"></li>
			  	</ol>
			  	<div class="carousel-inner">
			    	<div class="carousel-item active">
			      		<img class="d-block w-100" src="Foto/lavorestore.webp" style="height: 500px; width: 1150px;" alt="First slide">
			    	</div>
			    	<div class="carousel-item">
			      		<img class="d-block w-100" src="Foto/fashion2.png" style="height: 500px; width: 1150px;" alt="Second slide">
			    	</div>
			    	<div class="carousel-item">
			      		<img class="d-block w-100" src="Foto/fashion3.jpg" style="height: 500px; width: 1150px;" alt="Third slide">
			    	</div>
			    	<div class="carousel-item">
			      		<img class="d-block w-100" src="Foto/fashion5.jpg" style="height: 500px; width: 1150px;" alt="Fourth slide">
			    	</div>
			  	</div>
			  	<a class="carousel-control-prev" href="#Slideshow" role="button" data-slide="prev">
			    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    	<span class="sr-only">Previous</span>
			  	</a>
			  	<a class="carousel-control-next" href="#Slideshow" role="button" data-slide="next">
			    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
			    	<span class="sr-only">Next</span>
			  	</a>
			</div>
			<div class="small-container">
				<div class="row">
					<div class="col-4">
						<img src="Foto/kategori4.jpg" style="width: 100%; height: 300px;">
					</div>
					<div class="col-4">
						<img src="Foto/kategori2.jpg" style="width: 100%; height: 300px;">
					</div>
					<div class="col-4">
						<img src="Foto/kategori1.png" style="width: 100%; height: 300px;">
					</div>
				</div>
			</div>
			
			<div class="produk">
				<h4 class="title">FEATURED PRODUCTS</h4>
				<div class="row">
					<?php 
						$database = new database();
						$database->__construct();
						$sql = $database->tampilbrg();
						while($data = mysqli_fetch_assoc($sql)){
							
						// if(isset($_POST["cari"])){
						// 	$barang = $database->cari($_POST["keyword"]);
						// }
					?>
					<div class="card" style="width: 16rem;">
						
					  	<img src="../img/brg/<?php echo $data["Foto_Brng"]; ?>" class="card-img-top" alt="Cincin">
				  		<div class="card-body">
				  			<form method="post" action="">
					    		<h5 class="card-title"><?php echo $data["Nama_Brng"]; ?></h5>
					    		<p class="card-text"><?php echo $data["Deskripsi_Brng"]; ?></p>
					    		<input type="hidden" name="Id_Brng" value="<?php echo $data["Id_Brng"]; ?>">
					    		<input type="hidden" name="Stock_Brng" value="<?php echo $data["Stock_Brng"]; ?>">
					    		<i class="fas fa-star text-warning"></i>
					    		<i class="fas fa-star text-warning"></i>
					    		<i class="fas fa-star text-warning"></i>
					    		<i class="fas fa-star text-warning"></i>
					    		<i class="fas fa-star-half text-warning"></i><br>
					    		<a id="tomboldetail"  class="btn btn-primary text-white" data-toggle="modal" data-target="#produk1" data-id="<?php echo $data["Id_Brng"]; ?>" data-nama="<?php echo $data["Nama_Brng"]; ?>" data-stock="<?php echo $data["Stock_Brng"]; ?>" data-harga="<?php echo $data["Harga_Brng"]; ?>" data-foto="<?php echo $data["Foto_Brng"]; ?>" data-deskripsi="<?php echo $data["Deskripsi_Brng"]; ?>">Detail</a>
					    		<a class="btn btn-danger text-white">Rp. <?php echo $data["Harga_Brng"]; ?></a>
					    	</form>
				  		</div>
		
					</div>
					<?php
					} 
					?>
					</div>
				</div>
			</div>
			<div class="modal fade" id="produk1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document" >
			    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      		<form method="post" action="" enctype="multipart/form-data">
				      	<div class="modal-body">
			        	<div class="row">
	        				<div class="col-md-6">
	        				<img src="" id="pict" width="100%">
	        				</div>
	        				<div class="col-md-6">	
	        					<table class="table table-borderless">
	        						<tr>
	        							<th>Nama Produk</th>
	        							<td><input type="text" name="Nama_Brng" id="Nama_Brng" readonly="" style="border: none;"></td>
	        						</tr>
	        						<tr>
	        							<th>Tipe Produk</th>
	        							<td><input type="text" name="Id_Brng1" id="Id_Brng" readonly="" style="border: none;"></td>
	        						</tr>	
	        						<tr>
	        							<th>Stock Produk</th>
	        							<td><input type="text" name="Stock_Brng1" id="Stock_Brng" readonly="" style="border: none;"></td>
	        						</tr>
	        						<tr>
	        							<th>Harga Produk</th>
	        							<td>Rp. <input type="text" name="Harga_Brng1" id="Harga_Brng" readonly="" style="border: none;"></td>
	        						</tr>
	        						<tr>
	        							<th>Deskripsi</th>
	        							<td><input type="text" name="Deskripsi_Brng1" id="Deskripsi_Brng" readonly="" style="border: none;"></td>
	        						</tr>
	        						<tr>
	        							<th>Quantity</th>
	        							<td><input type="text" name="quantity" id="quantity" readonly="" style="border: none;"></td>
	        						</tr>
	        						<tr>
	        							<th>Pajak</th>
	        							<td><input type="text" name="Pajak" id="Pajak" readonly="" value="5%" style="border: none;"></td>
	        						</tr>
	        						<tr>
	        							<th>Subtotal</th>
	        							<td><input type="text" name="Subtotal" id="Subtotal" readonly="" style="border: none;"></td>
	        						</tr>
	        					</table>				        					
	        				</div>
	        			</div>
				      	</div>
				      	<div class="modal-footer">
				      		<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
				      		<input type="submit" name="buy" value="Buy" class="btn btn-danger">
				      	</div>
			      	</form>
			    	</div>
			  	</div>
			</div>
			<div class="small-container">
				<div class="row">
					<img src="jumia2.gif" class="img-responsive" style="height: 150px; width: 120%; margin-left: 20px; margin-right: 30px;">
				</div>
			</div>	
		</div>
	</div>
    <footer class="text-white mt-5">
		<div class="row">
			<div class="col-md-3">
				<h5>LAYANAN PELANGGAN</h5>
				<ul>
					<li>Pusat Bantuan</li>
					<li>Cara Pembelian</li>
					<li>Pengiriman</li>
					<li>Cara Pengembalian</li>
				</ul>
			</div>
			<div class="col-md-3">
				<h5>TENTANG KAMI</h5>
				<p>Lavore Store didirikan pada tahun 2020. Yang berletak di kalimantan. LAvore Store menjual produk-produk aksesoris seperti cincin, kalung, anting dan lain-lain. </p>
			</div>
			<div class="col-md-3">
				<h5>MITRA KERJASAMA</h5>
				<ul>
					<li>GOJEK</li>
					<li>JNE</li>
					<li>GRAB</li>
					<li>SI CEPAT</li>
					<li>TIKI</li>
				</ul>
			</div>
			<div class="col-md-3">
				<h5>HUBUNGI KAMI</h5>
				<ul>
					<li>0896-5202-4548</li>
					<li>customer@shop.com</li>
				</ul>
			</div>
			<div class="col-mid-3"></div>
			<div class="col-mid-3"></div>
			<div class="col-mid-3"></div>
			<div class="col-mid-3"></div>
		</div>
	</footer>
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
	<div class="copyright">
		<p>©2021-2022 Lavore Store | All Rights Reserved</p>
	</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--<script type="text/javascript" src="jquery.js"></script> -->

    <script type="text/javascript" src="Home.js"></script>
  </body>
  <script>
  	$(document).on("click", "#tombollogout", function(e){
  		e.preventDefault();
  		var link = $(this).attr('href');
		Swal.fire({
		  title: 'Are you sure?',
		  text: "Do you want to exit?",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Logout'
		}).then((result) => {
		  if (result.isConfirmed) {
		      window.location = link;
		  }
		})
  	});

  	$(document).on("click", "#tomboldetail", function(){
  		let id = $(this).data('id');
  		let nama = $(this).data('nama');
  		let stock = $(this).data('stock');
  		let harga = $(this).data('harga');
  		let foto = $(this).data('foto');
  		let deskripsi = $(this).data('deskripsi');
  		let quantity = 1;
  		let total = 0;

  		$("#Id_Brng").val(id);
  		$("#Nama_Brng").val(nama);
  		$("#Stock_Brng").val(stock);
  		$("#Harga_Brng").val(harga);
  		$("#Deskripsi_Brng").val(deskripsi);
  		$("#quantity").val(quantity);

  		total = quantity*harga;

  		$("#Subtotal").val(total);
  		$("#pict").attr("src", "../img/brg/" + foto);
  	});

  </script>
</html>