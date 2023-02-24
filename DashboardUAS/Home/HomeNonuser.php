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
		        			<a class="nav-link" href="#">Profile</a>
		      			</li>
		      			<li class="nav-item">
		        			<a class="nav-link" href="#">Contact Us</a>
		      			</li>
				    </ul>
				    <form class="form-inline my-2 my-lg-0">
				      	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				      	<button class="btn btn-outline-light my-2 my-sm-0" style="margin-right: 7px;" type="submit">Search</button>
				    </form>
				    <div class="icon">
			      		<h5>
			      			<a href="#"><i class="fas fa-shopping-cart" data-toggle="tooltip" title="Keranjang Belanja"></i></a>
			      			<i class="fas fa-envelope" data-toggle="tooltip" title="Pesan"></i>
			      			<i class="fas fa-bell" data-toggle="tooltip" title="Notifikasi"></i>
			      			<a href="../Login/Login.php"><i class="fas fa-sign-in-alt" data-toggle="tooltip" title="Login"></i></a>
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
					<div class="card" style="width: 16rem;">
					  	<img src="Foto/produk1.jpg" class="card-img-top" alt="Cincin">
				  		<div class="card-body">
				    		<h5 class="card-title">Cincin</h5>
				    		<p class="card-text">Cincin Titanium Pria Wanita Gold Emas, Cincin Anti karat - 16.
				    		</p>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star-half text-warning"></i>
				    		<!-- <i class="far fa-star text-warning"></i> --><br>
				    		<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#produk1">Detail</a>
				    		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#produk1">Rp. 20.000</a>
				  		</div>
					</div>
					<div class="card" style="width: 16rem;">
					  	<img src="Foto/produk2.jpg" class="card-img-top" alt="Cincin">
				  		<div class="card-body">
				    		<h5 class="card-title">Anting</h5>
				    		<p class="card-text">Anting Salib Jepit pria/ Anting Jepit Salib Titanium Silver (1 pcs).</p>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star-half text-warning"></i>
				    		<!-- <i class="far fa-star text-warning"></i> --><br>
				    		<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#produk2">Detail</a>
				    		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#produk2">Rp. 12.000</a>
				  		</div>
					</div>
					<div class="card" style="width: 16rem;">
					  	<img src="Foto/produk3.jpg" class="card-img-top" alt="Cincin">
				  		<div class="card-body">
				    		<h5 class="card-title">Cincin</h5>
				    		<p class="card-text">Cincin Pria Titanium Silver / Cincin Pria Wanita Polos Titanium - 17.</p>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star-half text-warning"></i>
				    		<!-- <i class="far fa-star text-warning"></i> --><br>
				    		<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#produk3">Detail</a>
				    		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#produk3">Rp. 9.900</a>
				  		</div>
					</div>
					<div class="card" style="width: 16rem;">
					  	<img src="Foto/ab3.jpeg" class="card-img-top" alt="Cincin">
				  		<div class="card-body">
				    		<h5 class="card-title">Anting</h5>
				    		<p class="card-text">Anting Salib Jepit pria/ Anting Jepit Salib Titanium Silver (1 pcs).</p>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star text-warning"></i>
				    		<i class="fas fa-star-half text-warning"></i>
				    		<!-- <i class="far fa-star text-warning"></i> --><br>
				    		<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#produk1">Detail</button> -->
				    		<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#produk4">Detail</a>
				    		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#produk4">Rp. 13.000</a>
				  		</div>
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
				      	<div class="modal-body">
				        	<div class="row">
		        				<div class="col-md-6">
		        					<img src="Foto/produk1.jpg" width="100%">
		        				</div>
		        				<div class="col-md-6">
		        					<table class="table table-borderless">
		        						<tr>
		        							<th>Nama Produk</th>
		        							<td>Cincin</td>
		        						</tr>
		        						<tr>
		        							<th>Tipe Produk</th>
		        							<td>C12345</td>
		        						</tr>
		        						<tr>
		        							<th>Pengantaran</th>
		        							<td>Standar</td>
		        						</tr>
		        						<tr>
		        							<th>Stock Produk</th>
		        							<td>123pcs</td>
		        						</tr>
		        						<tr>
		        							<th>Rating Produk</th>
		        							<td>
							        			<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star-half text-warning"></i>
		        							</td>
		        						</tr>
		        						<tr>
		        							<th>Harga Produk</th>
		        							<td>Rp. 20.000,00</td>
		        						</tr>
		        					</table>
		        				</div>
		        			</div>
				      	</div>
				      	<div class="modal-footer">
				      		<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
				      		<a href="#" class="btn btn-danger" onclick="validation();">Buy</a>
				      	</div>
			    	</div>
			  	</div>
			</div>
			<div class="modal fade" id="produk2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document" >
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
				      	<div class="modal-body">
				        	<div class="row">
		        				<div class="col-md-6">
		        					<img src="Foto/produk2.jpg" width="100%">
		        				</div>
		        				<div class="col-md-6">
		        					<table class="table table-borderless">
		        						<tr>
		        							<th>Nama Produk</th>
		        							<td>Anting</td>
		        						</tr>
		        						<tr>
		        							<th>Tipe Produk</th>
		        							<td>C12345</td>
		        						</tr>
		        						<tr>
		        							<th>Pengantaran</th>
		        							<td>Standar</td>
		        						</tr>
		        						<tr>
		        							<th>Stock Produk</th>
		        							<td>123pcs</td>
		        						</tr>
		        						<tr>
		        							<th>Rating Produk</th>
		        							<td>
							        			<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star-half text-warning"></i>
		        							</td>
		        						</tr>
		        						<tr>
		        							<th>Harga Produk</th>
		        							<td>Rp. 12.000,00</td>
		        						</tr>
		        					</table>
		        				</div>
		        			</div>
				      	</div>
				      	<div class="modal-footer">
				      		<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
				      		<a href="#" class="btn btn-danger" onclick="validation();">Buy</a>
				      	</div>
			    	</div>
			  	</div>
			</div>
			<div class="modal fade" id="produk3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document" >
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
				      	<div class="modal-body">
				        	<div class="row">
		        				<div class="col-md-6">
		        					<img src="Foto/produk3.jpg" width="100%">
		        				</div>
		        				<div class="col-md-6">
		        					<table class="table table-borderless">
		        						<tr>
		        							<th>Nama Produk</th>
		        							<td>Cincin</td>
		        						</tr>
		        						<tr>
		        							<th>Tipe Produk</th>
		        							<td>C12345</td>
		        						</tr>
		        						<tr>
		        							<th>Pengantaran</th>
		        							<td>Standar</td>
		        						</tr>
		        						<tr>
		        							<th>Stock Produk</th>
		        							<td>123pcs</td>
		        						</tr>
		        						<tr>
		        							<th>Rating Produk</th>
		        							<td>
							        			<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star-half text-warning"></i>
		        							</td>
		        						</tr>
		        						<tr>
		        							<th>Harga Produk</th>
		        							<td>Rp. 9.900,00</td>
		        						</tr>
		        					</table>
		        				</div>
		        			</div>
				      	</div>
				      	<div class="modal-footer">
				      		<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
				      		<a href="#" class="btn btn-danger" onclick="validation();">Buy</a>
				      	</div>
			    	</div>
			  	</div>
			</div>
			<div class="modal fade" id="produk4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document" >
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
				      	<div class="modal-body">
				        	<div class="row">
		        				<div class="col-md-6">
		        					<img src="Foto/ab3.jpeg" width="100%">
		        				</div>
		        				<div class="col-md-6">
		        					<table class="table table-borderless">
		        						<tr>
		        							<th>Nama Produk</th>
		        							<td>Anting</td>
		        						</tr>
		        						<tr>
		        							<th>Tipe Produk</th>
		        							<td>C12345</td>
		        						</tr>
		        						<tr>
		        							<th>Pengantaran</th>
		        							<td>Standar</td>
		        						</tr>
		        						<tr>
		        							<th>Stock Produk</th>
		        							<td>123pcs</td>
		        						</tr>
		        						<tr>
		        							<th>Rating Produk</th>
		        							<td>
							        			<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star text-warning"></i>
									    		<i class="fas fa-star-half text-warning"></i>
		        							</td>
		        						</tr>
		        						<tr>
		        							<th>Harga Produk</th>
		        							<td>Rp. 13.000,00</td>
		        						</tr>
		        					</table>
		        				</div>
		        			</div>
				      	</div>
				      	<div class="modal-footer">
				      		<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
				      		<a href="#" class="btn btn-danger" onclick="validation();">Buy</a>
				      	</div>
			    	</div>
			  	</div>
			</div>
			<div class="small-container">
				<div class="row">
					<img src="Foto/hppyshop.jpeg" style="height: 200px; width: 100%; margin-left: 20px; margin-right: 30px;">
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
  	function validation(){
  		swal.fire("Oops...", "You are not logged in!", "error");
  	}
  </script>
</html>