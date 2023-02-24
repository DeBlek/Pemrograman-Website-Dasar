<?php 
include_once('../db_connect.php');
session_start();


if(isset($_SESSION['Email_Plngn'])){
	$database = new database();
	$database->__construct();
	$Email	= $_SESSION['Email_Plngn'];

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


<!DOCTYPE HTML>
<html>
<head>
	<title>Profile</title>
	<link rel = "shortcut icon" href = "Foto/logo.jpeg">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet"href="External Profile.css">
</head>

<body style = "background-color : #636361;">
	<div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-secondary fixed-top">
        <div class="container">
            <h3><!-- <i class="fas fa-cart-plus"> --><img src="foto/logo.jpeg" height="35px;"></i> LAVORE STORE</h3>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              	<ul class="navbar-nav ml-auto">
	      			<li class="nav-item active">
	        			<a class="nav-link" href="../Home/Home.php">Home <span class="sr-only">(current)</span></a>
	      			</li>
	      			<li class="nav-item">
	        			<a class="nav-link" href="#">Profile</a>
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
<form method="post" action="">
	<div class = "profile">
		<img src = "Foto/user icon.png" class = "profile_img"></img>
		<ul type = "none">
			<li>
				<img src = "foto/user.png" class = "icon_stat"></img>
				<p class = "title_text">Nama</p>
				<input type="text" name="Nama_Plngn" class="form-control" readonly="" value="<?php echo "$data[Nama_Plngn]"; ?>" required><br>
				
			</li>
			<li> 
				<img src = "foto/email.png" class = "icon_stat"></img>
				<p class = "title_text">Email</p>
				<input type="email" name="Email_Plngn" class="form-control" readonly="" value="<?php echo "$data[Email_Plngn]"; ?>" required>
				<br>
			</li>
			<li>
				<img src = "foto/padlock.png" class = "icon_stat"></img>
				<p class = "title_text">Password</p>
				<input type="password" name="Password_Plngn" class="form-control" readonly="" value="<?php echo "$data[Password_Plngn]"; ?>" required><br>
				
			</li>
			<li> 
				<img src = "foto/jenis_kelamin.png" class = "icon_stat"></img>
				<p class = "title_text">Jenis Kelamin</p>
				<input type="text" name="JK_Plngn" class="form-control" readonly="" value="<?php echo "$data[JK_Plngn]"; ?>" required><br>
				
			</li>
			<li>
				<img src = "foto/Date.png" class = "icon_stat"></img>
				<p class = "title_text">Tanggal Lahir</p>
				<input type="text" name="TL_Plngn" class="form-control" readonly="" value="<?php echo "$data[TL_Plngn]"; ?>" required><br>
				
			</li>			
			<li>
				<img src = "foto/handphone.png" class = "icon_stat"></img>
				<p class = "title_text">Nomor Telepon</p>
				<input type="text" name="NoTlpn_Plngn" class="form-control" readonly="" value="<?php echo "$data[NoTlpn_Plngn]"; ?>" required><br>
				
			</li>
			
			<li> 
				<img src = "foto/Alamat.png" class = "icon_stat"></img>
				<p class = "title_text">Alamat</p>
				<input type="text" name="Alamat_Plngn" class="form-control" readonly="" value="<?php echo "$data[Alamat_Plngn]"; ?>" required><br>
				
			</li>
			<li>
				<div class = "button_profile">
					<a href = "Edit_Profile.php"><button type = "button">Edit profile</button></a>
				</div>
			</li>
		</ul>
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
	<script type="text/javascript" src="Home/Home.js"></script>
</body>

</html>