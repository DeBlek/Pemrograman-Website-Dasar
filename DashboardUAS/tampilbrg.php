<?php 
include_once('db_connect.php');

if(isset($_POST['tambah'])){
	$database = new database();
	$database->__construct();

	$Id_Brng		= $_POST['Id_Brng'];
	$Nama_Brng		= $_POST['Nama_Brng'];
	$Stock_Brng		= $_POST['Stock_Brng'];
	$Harga_Brng		= $_POST['Harga_Brng'];
	$Deskripsi_Brng	= $_POST['Deskripsi_Brng'];
	$extensi = explode(".", $_FILES['Foto_Brng']['name']);
	$Foto_Brng = "brg-".round(microtime(true)).".".end($extensi);
	$sumber = $_FILES['Foto_Brng']['tmp_name'];
	$target = "img/brg/";
	$upload = move_uploaded_file($sumber, $target.$Foto_Brng);
	if ($upload) {
		$brg = $database->tambahbrg($Id_Brng, $Nama_Brng, $Stock_Brng, $Harga_Brng, $Foto_Brng, $Deskripsi_Brng);
		header("location: tampilbrg.php");
	}else{
		echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
	}
}
?>

<?php
include_once('db_connect.php');
if(isset($_POST['edit'])){
	$Id_Brng		= $_POST['Id_Brng'];
	$Nama_Brng		= $_POST['Nama_Brng'];
	$Stock_Brng		= $_POST['Stock_Brng'];
	$Harga_Brng		= $_POST['Harga_Brng'];
	$Deskripsi_Brng	= $_POST['Deskripsi_Brng'];
	$database = new database();
	$database->__construct(); 

	$extensi = explode(".", $_FILES['Foto_Brng']['name']);
	$Foto_Brng = "brg-".round(microtime(true)).".".end($extensi);
	$sumber = $_FILES['Foto_Brng']['tmp_name'];
	$target = "img/brg/";
	$upload = move_uploaded_file($sumber, $target.$Foto_Brng);

	if ($upload) {
		$brg = $database->editbrg($Id_Brng, $Nama_Brng, $Stock_Brng, $Harga_Brng, $Foto_Brng, $Deskripsi_Brng);
		header("location: tampilbrg.php");
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
						<form action="" method="post" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="form-group">
									<label class="control-label" for="Id_Brng">ID Barang</label>
									<input type="text" name="Id_Brng" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Nama_Brng">Nama Barang</label>
									<input type="text" name="Nama_Brng" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Stock_Brng">Stock Barang</label>
									<input type="text" name="Stock_Brng" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Harga_Brng">Harga Barang</label>
									<input type="text" name="Harga_Brng" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Foto_Brng">Foto Barang</label>
									<input type="file" name="Foto_Brng" id="Foto_Brng" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Deskripsi_Brng">Deskripsi</label>
									<input type="text" name="Deskripsi_Brng" class="form-control" required>
								</div>
							</div>
							<div class="modal-footer">
				      		<input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
							<a href="tampilbrg.php" class="btn btn-warning">Kembali</a>
				      	</div>
						</form>
					</div>
				</div>
			</div>
			<div id="edit" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
						</div>
						<form action="" method="post" id="form" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="form-group">
									<label class="control-label" for="Id_Brng">ID Barang</label>
									<input type="text" name="Id_Brng" id="Id_Brng" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Nama_Brng">Nama Barang</label>
									<input type="text" name="Nama_Brng" id="Nama_Brng" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Stock_Brng">Stock Barang</label>
									<input type="text" name="Stock_Brng" id="Stock_Brng" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Harga_Brng">Harga Barang</label>
									<input type="text" name="Harga_Brng" id="Harga_Brng" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="Foto_Brng">Foto Barang</label>
									<div style="padding-bottom: 5px">
										<img src="" width="80px" id="pict">
									</div>
									<input type="file" name="Foto_Brng" id="Foto_Brng" class="form-control">
								</div>
								<div class="form-group">
									<label class="control-label" for="Deskripsi_Brng">Deskripsi</label>
									<input type="text" name="Deskripsi_Brng" id="Deskripsi_Brng" class="form-control" required>
								</div>
							</div>
							<div class="modal-footer">
					      		<input type="submit" name="edit" class="btn btn-primary" value="Update">
								<a href="tampilbrg.php" class="btn btn-warning">Kembali</a>
					      	</div>
						</form>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<thead class="bg-warning">
						<tr>
							<th scope="col">No.</th>
							<th scope="col">ID Barang</th>
							<th scope="col">Nama Barang</th>
							<th scope="col">Stock Barang</th>
							<th scope="col">Harga Barang</th>
							<th scope="col">Foto Barang</th>
							<th scope="col">Deskripsi Barang</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include_once('db_connect.php');
						$database = new database();
						$database->__construct();
						$sql = $database->tampilbrg();
						if(mysqli_num_rows($sql) > 0){
							$no = 1;
							while($data = mysqli_fetch_assoc($sql))
							{
								echo '
								<tr>
									<td>'.$no.'</td>
									<td>'.$data['Id_Brng'].'</td>
									<td>'.$data['Nama_Brng'].'</td>
									<td>'.$data['Stock_Brng'].'</td>
									<td>'.$data['Harga_Brng'].'</td>
									<td align="center">
										<img src="img/brg/'.$data['Foto_Brng'].'" width="70px;">
									</td>
									<td>'.$data['Deskripsi_Brng'].'</td>
									<td>
										
										<a class="btn btn-success text-white" id="tombolubah" data-toggle="modal" data-target="#edit" data-id="'.$data['Id_Brng'].'" data-nama="'.$data['Nama_Brng'].'" data-stock="'.$data['Stock_Brng'].'" data-harga="'.$data['Harga_Brng'].'" data-foto="'.$data['Foto_Brng'].'" data-deskripsi="'.$data['Deskripsi_Brng'].'">Edit</a>


										
										<a href="hapusbrg.php?Id_Brng='.$data['Id_Brng'].'" class="btn btn-secondary btn-danger" id="tombolhapus">Delete</a>

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
  		let id = $(this).data('id');
  		let nama = $(this).data('nama');
  		let stock = $(this).data('stock');
  		let harga = $(this).data('harga');
  		let foto = $(this).data('foto');
  		let deskripsi = $(this).data('deskripsi');

  		$("#Id_Brng").val(id);
  		$("#Nama_Brng").val(nama);
  		$("#Stock_Brng").val(stock);
  		$("#Harga_Brng").val(harga);
  		$("#Deskripsi_Brng").val(deskripsi);
  		$("#pict").attr("src", "img/brg/" + foto);
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

	
