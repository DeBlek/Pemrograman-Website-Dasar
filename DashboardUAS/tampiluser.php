<?php 
include_once('db_connect.php');

if(isset($_POST['tambah'])){
	$database = new database();
	$database->__construct();

	$Nama_Plngn		= $_POST['Nama_Plngn'];
	$Email_Plngn	= $_POST['Email_Plngn'];
	$Password_Plngn	= $_POST['Password_Plngn'];
	$JK_Plngn		= $_POST['JK_Plngn'];
	$TL_Plngn		= $_POST['TL_Plngn'];
	$NoTlpn_Plngn	= $_POST['NoTlpn_Plngn'];
	$Alamat_Plngn	= $_POST['Alamat_Plngn'];

	$cek = $database->cekuser($Email_Plngn);
	if(mysqli_num_rows($cek) == 0){
		$sql = $database->tambahuser($Nama_Plngn,$Email_Plngn,$Password_Plngn,$JK_Plngn,$TL_Plngn,$NoTlpn_Plngn,$Alamat_Plngn);

		if($sql){
			echo '<script>alert("Berhasil menambahkan data."); document.location="tampiluser.php";</script>';
		}else{
			echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
		}
	}else{
		echo '<div class="alert alert-warning">Gagal, Email sudah terdaftar.</div>';
	}
}
?>

<?php
include_once('db_connect.php');
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
		echo '<script>alert("Berhasil menyimpan data."); document.location="tampiluser.php";</script>';
	}else{
		echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
	}
}
?>



<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="index_hover.css">
	<script src="package/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="package/dist/sweetalert2.min.css">
	<title>Dashboard</title>
</head>
  <body>
  	<div class="container-fluid">
	    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
	      <div class="container">
	          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	          </button>

	          <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <h2><i class="fas fa-users-cog"></i></h2>
            	<a href="index.php" class="text-dark"><h2>Admin</h2></a>
	          </div>
	    </nav>
  	</div>
  	<div class="row mt-5 no-gutters col-sm-12">
	    <div class="col-md-2 bg-light">
	      <ul class="list-group list-group-flush pt-4 p-2">
	          <a href="index.php"><li class="list-group-item bg-warning text-dark"><i class="fas fa-tachometer-alt"></i> Dashboard</li></a>
	          <a href="tampiluser.php"><li class="list-group-item text-dark">DATA USER</li></a>
	          <a href="tampilbrg.php"><li class="list-group-item text-dark">BARANG</li></a>
	          <a href="tampilpesan.php"><li class="list-group-item text-dark">ContactUs</li></a>
	          <a href="tampilcart.php"><li class="list-group-item text-dark">Cart</li></a>
          	<a href="tampilhistory.php"><li class="list-group-item text-dark">Order History</li></a>
	          <a href="logoutadmin.php"><li class="list-group-item text-light bg-danger">Logout</li></a>
	      </ul>
	    </div>

	    <div class="banner col-md-10 pt-4">
	    	<center><font size="6">DATA USER</font></center>
			<hr>
			<button class="btn btn-dark right" style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambah">Tambah Data</button>
			<div id="tambah" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
						</div>
						<form action="" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label class="control-label" for="Nama_Plngn">Nama</label>
									<input type="text" name="Nama_Plngn" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Email_Plngn">Email</label>
									<input type="text" name="Email_Plngn" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Password_Plngn">Password</label>
									<input type="text" name="Password_Plngn" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="JK_Plngn">JK User</label>
									<input type="text" name="JK_Plngn" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="TL_Plngn">Tanggal Lahir</label>
									<input type="text" name="TL_Plngn" placeholder="YYYY-MM-DD" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="NoTlpn_Plngn">No.Telp</label>
									<input type="text" name="NoTlpn_Plngn" placeholder="08XXXXXXXXX" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Alamat_Plngn">Alamat</label>
									<input type="text" name="Alamat_Plngn" class="form-control" required>
								</div>
							</div>
							<div class="modal-footer">
				      		<input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
							<a href="tampiluser.php" class="btn btn-warning">Kembali</a>
				      	</div>
						</form>
					</div>
				</div>
			</div>
			<div id="edit" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
						</div>
						<form action="" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label class="control-label" for="Nama_Plngn">Nama</label>
									<input type="text" name="Nama_Plngn" class="form-control" id="Nama_Plngn" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Email_Plngn">Email</label>
									<input type="text" name="Email_Plngn" class="form-control" id="Email_Plngn" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Password_Plngn">Password</label>
									<input type="text" name="Password_Plngn" class="form-control" id="Password_Plngn" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="JK_Plngn">JK User</label>
									<input type="text" name="JK_Plngn" class="form-control" id="JK_Plngn" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="TL_Plngn">Tanggal Lahir</label>
									<input type="text" name="TL_Plngn" class="form-control" id="TL_Plngn" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="NoTlpn_Plngn">No.Telp</label>
									<input type="text" name="NoTlpn_Plngn" class="form-control" id="NoTlpn_Plngn" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Alamat_Plngn">Alamat</label>
									<input type="text" name="Alamat_Plngn" class="form-control" id="Alamat_Plngn" required>
								</div>
							</div>
							<div class="modal-footer">
				      		<input type="submit" name="update" class="btn btn-primary" value="Update">
							<a href="tampil.php" class="btn btn-warning">Kembali</a>
				      	</div>
						</form>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<thead  class="bg-warning">
						<tr>
							<th scope="col">No.</th>
							<th scope="col">Nama</th>
							<th scope="col">Email</th>
							<th scope="col">Password</th>
							<th scope="col">JK</th>
							<th scope="col">Tanggal Lahir</th>
							<th scope="col">Telepon</th>
							<th scope="col">Alamat</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include_once('db_connect.php');
						$database = new database();
						$database->__construct();
						$sql = $database->tampiluser();
						if(mysqli_num_rows($sql) > 0){
							$no = 1;
							while($data = mysqli_fetch_assoc($sql))
							{
								echo '
								<tr>
									<td>'.$no.'</td>
									<td>'.$data['Nama_Plngn'].'</td>
									<td>'.$data['Email_Plngn'].'</td>
									<td>'.$data['Password_Plngn'].'</td>
									<td>'.$data['JK_Plngn'].'</td>
									<td>'.$data['TL_Plngn'].'</td>
									<td>'.$data['NoTlpn_Plngn'].'</td>
									<td>'.$data['Alamat_Plngn'].'</td>
									<td>
										
										<a class="btn btn-success text-white" id="tombolubah" data-toggle="modal" data-target="#edit" data-nama="'.$data['Nama_Plngn'].'" data-email="'.$data['Email_Plngn'].'" data-password="'.$data['Password_Plngn'].'" data-jk="'.$data['JK_Plngn'].'" data-tl="'.$data['TL_Plngn'].'" data-telepon="'.$data['NoTlpn_Plngn'].'" data-alamat="'.$data['Alamat_Plngn'].'">Edit</a>


										
										<a href="hapususer.php?Email_Plngn='.$data['Email_Plngn'].'" class="btn btn-secondary btn-danger" id="tombolhapus">Delete</a>

									</td>
								</tr>
								';
								$no++;
							}
						}else{
							echo '
							<tr>
								<td colspan="9">Tidak ada data.</td>
							</tr>
							';
						}
						?>
					</tbody>
				</table>
			</div>
	    </div>
	</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

  <script>
  	$(document).on("click", "#tombolubah", function(){
  		let nama = $(this).data('nama');
  		let email = $(this).data('email');
  		let password = $(this).data('password');
  		let jk = $(this).data('jk');
  		let tl = $(this).data('tl');
  		let telepon = $(this).data('telepon');
  		let alamat = $(this).data('alamat');

  		$("#Nama_Plngn").val(nama);
  		$("#Email_Plngn").val(email);
  		$("#Password_Plngn").val(password);
  		$("#JK_Plngn").val(jk);
  		$("#TL_Plngn").val(tl);
  		$("#NoTlpn_Plngn").val(telepon);
  		$("#Alamat_Plngn").val(alamat);
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
		  confirmButtonText: 'Delete'
		}).then((result) => {
		  if (result.isConfirmed) {
		      window.location = link;
		  }
		})
  	});
  </script>
</html>

	
