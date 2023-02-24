<?php 
include_once('db_connect.php');

if(isset($_POST['tambah'])){
	$database = new database();
	$database->__construct();

	$Email_Plngn	= $_POST['Email_Plngn'];
	$pajak	= $_POST['pajak'];
	$quantity		= $_POST['quantity'];
	$subtotal		= $_POST['subtotal'];
	$Id_Brng	= $_POST['Id_Brng'];

	$cek = $database->cekcart($Id_Brng);
	if(mysqli_num_rows($cek) == 0){
		$sql = $database->addcart($Email_Plngn, $Id_Brng, $pajak, $quantity, $subtotal);

		if($sql){
			echo '<script>alert("Berhasil menambahkan data."); document.location="tampilcart.php";</script>';
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
	$database = new database();
	$database->__construct(); 
	$Email_Plngn	= $_POST['Email_Plngn'];
	$pajak	= $_POST['pajak'];
	$quantity		= $_POST['quantity'];
	$subtotal		= $_POST['subtotal'];
	$Id_Brng	= $_POST['Id_Brng'];

	$sql = $database->updatecart2($Email_Plngn, $quantity, $Id_Brng, $subtotal, $pajak);

	if($sql){
		echo '<script>alert("Berhasil edit data."); document.location="tampilcart.php";</script>';
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
									<label class="control-label" for="Email_Plngn">Email</label>
									<input type="text" name="Email_Plngn" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Id_Brng">Id Barang</label>
									<input type="text" name="Id_Brng" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Pajak">Pajak</label>
									<input type="text" name="pajak" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="quantity">Quantity</label>
									<input type="text" name="quantity" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="subtotal">Subtotal</label>
									<input type="text" name="subtotal" class="form-control" required>
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
									<label class="control-label" for="Email_Plngn">Email</label>
									<input type="text" name="Email_Plngn" class="form-control" id="Email_Plngn" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Id_Brng">Id Barang</label>
									<input type="text" name="Id_Brng" class="form-control" id="Id_Brng" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Pajak">Pajak</label>
									<input type="text" name="pajak" class="form-control" id="pajak" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="quantity">Quantity</label>
									<input type="text" name="quantity" class="form-control" id="quantity" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="subtotal">Subtotal</label>
									<input type="text" name="subtotal" class="form-control" id="subtotal" required>
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
							<th scope="col">Email Pelangan</th>
							<th scope="col">Id Barang</th>
							<th scope="col">Pajak(5%)</th>
							<th scope="col">Quantity</th>
							<th scope="col">Subtotal(Rp)</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include_once('db_connect.php');
						$database = new database();
						$database->__construct();
						$sql = $database->tampilcart3();
						if(mysqli_num_rows($sql) > 0){
							$no = 1;
							while($data = mysqli_fetch_assoc($sql))
							{
								echo '
								<tr>
									<td>'.$no.'</td>
									<td>'.$data['Email_Plngn'].'</td>
									<td>'.$data['Id_Brng'].'</td>
									<td>'.$data['Pajak'].'</td>
									<td>'.$data['Quantity'].'</td>
									<td>'.$data['Subtotal'].'</td>
									<td>		
										<a class="btn btn-success text-white" id="tombolubah" data-toggle="modal" data-target="#edit"  data-email="'.$data['Email_Plngn'].'" data-id="'.$data['Id_Brng'].'" data-pajak="'.$data['Pajak'].'" data-quantity="'.$data['Quantity'].'" data-subtotal="'.$data['Subtotal'].'">Edit</a>
										<a href="hapuscart.php?Id_Brng='.$data['Id_Brng'].'" class="btn btn-secondary btn-danger" id="tombolhapus">Delete</a>
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
  		let email = $(this).data('email');
  		let id = $(this).data('id');
  		let pajak = $(this).data('pajak');
  		let quantity = $(this).data('quantity');
  		let subtotal = $(this).data('subtotal');

  		$("#Email_Plngn").val(email);
  		$("#Id_Brng").val(id);
  		$("#pajak").val(pajak);
  		$("#quantity").val(quantity);
  		$("#subtotal").val(subtotal);
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

	
