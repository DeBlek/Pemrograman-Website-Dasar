<?php
include_once('../db_connect.php');
session_start();

if(isset($_POST['update'])){
	$Nama_Plngn		= $_POST['Nama_Plngn'];
	$Email_Plngn	= $_POST['Email_Plngn'];
	$Password_Plngn	= $_POST['Password_Plngn'];
	$JK_Plngn		= $_POST['JK_Plngn'];
	$TL_Plngn		= $_POST['TL_Plngn'];
	$NoTlpn_Plngn	= $_POST['NoTlpn_Plngn'];
	$Alamat_Plngn	= $_POST['Alamat_Plngn'];
	$database = new database();
	$database->__construct(); 

	$sql = $database->edituser($Nama_Plngn,$Email_Plngn,$Password_Plngn,$JK_Plngn,$TL_Plngn,$NoTlpn_Plngn,$Alamat_Plngn);

	if($sql){
		echo '<script>alert("Berhasil menyimpan data."); document.location="../Home/Home.php";</script>';
	}else{
		echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
	}
}
if(isset($_SESSION['Email_Plngn'])){
	$database = new database();
	$database->__construct();
	$Email	= $_SESSION['Email_Plngn'];
	$select = $database->cekuser($Email);
	if(mysqli_num_rows($select) == 0){
		echo '<div class="alert alert-warning">Email tidak ada dalam database.</div>';
		exit();
	}else{
		$data = mysqli_fetch_assoc($select);
	}
}
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Lavore Strore</title>
		<link rel = "shortcut icon" href = "foto/logo.jpeg">
		<link rel = "stylesheet" href = "Edit_Profile CSS.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	</head>
	
	<body style = "background-color : #636361;">
	
		<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light bg-secondary fixed-top">
			<div class="container">
	  			<h3><!-- <i class="fas fa-cart-plus"> --><img src="Foto/logo.jpeg" height="35px;"></i> LAVORE STORE</h3>
	  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  			</button>

	  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    		<ul class="navbar-nav ml-auto">
		      			<li class="nav-item active">
		        			<a class="nav-link" href="../Home/Home.php">Home <span class="sr-only">(current)</span></a>
		      			</li>
		      			<li class="nav-item">
		        			<a class="nav-link" href="Profile.php">Profile</a>
		      			</li>
		      			<li class="nav-item">
		        			<a class="nav-link" href="../ContacUS/ContactUS.php">Contact Us</a>
		      			</li>
				    </ul>
				    <form class="form-inline my-2 my-lg-0">
				      	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				      	<button class="btn btn-outline-light my-2 my-sm-0" style="margin-right: 7px;" type="submit">Search</button>
				    </form>
				    <div class="icon">
			      		<h5>
			      			<a href="../Cart/cart1.php" style="color: black;"><i class="fas fa-shopping-cart" data-toggle="tooltip" title="Keranjang Belanja"></i></a>
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
		<div class = "Edit">
			<div class = "input_data">	
				<ul type = "none">
					<li>
						<img src = "Foto/user icon.png"></img>
						<br>
						<input type = "file" id = "profile_img" accept = "image/*"></input>	
						<label for = "profile_img">Edit image</label>
						<br>
					</li>
					<li>
						<input type = "text" placeholder = "Nama Pelanggan" style="color: black;" name="Nama_Plngn" value="<?php echo "$data[Nama_Plngn]"; ?>"></input>
						<br>
						<hr>
					</li>
					<li>
						<input type = "email" placeholder = "Email" style="color: black;" name="Email_Plngn" value="<?php echo "$data[Email_Plngn]"; ?>"></input>
						<br>
						<hr>
					</li>
					<li>
						<input type = "password" placeholder = "Password" style="color: black;" name="Password_Plngn" value="<?php echo "$data[Password_Plngn]"; ?>"></input>
						<br>
						<hr>
					</li>
					<li>
						<input type = "text" placeholder = "Jenis Kelamin" style="color: black;" name="JK_Plngn" value="<?php echo "$data[JK_Plngn]"; ?>"></input>
						<br>
						<hr>
					</li>
					<li>
						<input type = "date" placeholder = "Tanggal Lahir" style="color: black;" name="TL_Plngn" value="<?php echo "$data[TL_Plngn]"; ?>"></input>
						<br>
						<hr>
					</li>
					<li>
						<input type = "text" placeholder = "Nomor Telepon" style="color: black;" name="NoTlpn_Plngn" value="<?php echo "$data[NoTlpn_Plngn]"; ?>"></input>
						<br>
						<hr>
					</li>					
					<li> 
						<input type = "text" placeholder = "Alamat Lengkap" style="color: black;" name="Alamat_Plngn" value="<?php echo "$data[Alamat_Plngn]"; ?>"></input>
						<br>
						<hr>
					</li>
					<li>
						<button type="submit"><a href="Profile.php" style="text-decoration:none; color: white;">Kembali</a></button>
						<button name="update" type="submit">Selesai</button>
					</li>
				</ul>
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
	<script type="text/javascript" src="Home/Home.js"></script>
	</body>
</html>