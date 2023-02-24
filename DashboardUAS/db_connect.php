<?php 

class database
{
	var $host = "localhost: 3307";
	var $username = "root";
	var $password = "";
	var $database = "uas";
	var $koneksi;

	function __construct()
	{
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
	}

	function register($Nama_Plngn, $Email_Plngn, $Password_Plngn, $JK_Plngn, $TL_Plngn, $NoTlpn_Plngn, $Alamat_Plngn)
	{	
		$regis = mysqli_query($this->koneksi,"insert into tblpelanggan values ('$Nama_Plngn', '$Email_Plngn', '$Password_Plngn', '$JK_Plngn',
		'$TL_Plngn', '$NoTlpn_Plngn', '$Alamat_Plngn')");
		return $regis;
	}

	function loginuser($Email_Plngn, $Password_Plngn ,$remember)
	{
		$query = mysqli_query($this->koneksi,"select * from tblPelanggan where Email_Plngn = '$Email_Plngn'");
		$data_user = $query->fetch_array();
		// if(password_verify($Password_Plngn, $data_user['Password_Plngn'])){	
		if ($Password_Plngn == $data_user['Password_Plngn']){		
			if($remember){
				setcookie('Email_Plngn', $Email_Plngn, time() + (60 * 60 * 24 * 5), '/');
			}
			$_SESSION['Email_Plngn'] = $Email_Plngn;			
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}

	function relogin($Email_Plngn)
	{
		$query = mysqli_query($this->koneksi,"select * from tblPelanggan where Email_Plngn = '$Email_Plngn'");
		$data_user = $query->fetch_array();
		$_SESSION['Email_Plngn'] = $Email_Plngn;		
		$_SESSION['is_login'] = TRUE;
	}

	function loginadmin($email, $password, $remember)
	{
		$query = mysqli_query($this->koneksi, "select * from tbladmin where Email_Admin='$email'");
		$data_user = $query->fetch_array();
		if ($password == $data_user['Password']) 
		{	
			if($remember)
			{
				setcookie('Email_Admin', $email, time() + (60 * 60 * 24 * 5), '/');
			}
			$_SESSION['Email_Admin'] = $email;
			$_SESSION['login'] = TRUE;
			return TRUE;
		}
	}

	function tampiluser()
	{
		$Tampil = mysqli_query($this->koneksi, "select * from tblpelanggan");
		return $Tampil;
	}
	function tampilbrg()
	{
		$Tampil = mysqli_query($this->koneksi, "select * from tblbarang");
		return $Tampil;
	}
	function tampilpesan()
	{
		$Tampil = mysqli_query($this->koneksi, "select * from tblcontactus");
		return $Tampil;
	}
	function tampilcart($Email_Plngn)
	{
		$tampilcart = mysqli_query($this->koneksi, "select tblcart.Pajak,tblcart.Id_Brng, tblcart.Quantity, tblcart.Subtotal, tblbarang.Nama_Brng, tblbarang.Harga_Brng, tblbarang.Foto_Brng, tblbarang.Deskripsi_Brng from tblcart INNER JOIN tblbarang on tblcart.Id_Brng = tblbarang.Id_Brng WHERE Email_Plngn='$Email_Plngn'");
		return $tampilcart;
	}
	function tampilcart2($Email_Plngn)
	{
		$Tampil = mysqli_query($this->koneksi, "select * from tblcart WHERE Email_Plngn='$Email_Plngn'");
		return $Tampil;
	}
	function tampilcart3()
	{
		$Tampil = mysqli_query($this->koneksi, "select * from tblcart");
		return $Tampil;
	}
	function tampilhistory()
	{
		$Tampil = mysqli_query($this->koneksi, "select * from tblcheckout");
		return $Tampil;
	}
	
	function cekpesanan($Email_Plngn)
	{
		$Tampil = mysqli_query($this->koneksi, "select * from tblcheckout WHERE Email_Plngn='$Email_Plngn'");
		return $Tampil;
	}

	function cekuser($Email)
	{
		$cek = mysqli_query($this->koneksi, "select * from tblpelanggan WHERE Email_Plngn='$Email'");
		return $cek;
	}
	function cekuser1($Email)
	{
		$cek = mysqli_query($this->koneksi, "select * from tblcontactus WHERE Email_Plngn='$Email'");
		return $cek;
	}
	function cekuser2($Email)
	{
		$cek = mysqli_query($this->koneksi, "select * from tblpelanggan WHERE Email_Plngn='$Email'");
		return $cek;
	}
	function cekbrg($ID)
	{
		$cekbrg = mysqli_query($this->koneksi, "select * from tblbarang WHERE Id_Brng='$ID'");
		return $cekbrg;
	}
	function cekcart($ID)
	{
		$cekcart = mysqli_query($this->koneksi, "select * from tblcart WHERE Id_Brng='$ID'");
		return $cekcart;
	}
	function tambahuser($Nama_Plngn,$Email_Plngn,$Password_Plngn,$JK_Plngn,$TL_Plngn,$NoTlpn_Plngn,$Alamat_Plngn)
	{
		$tambahuser = mysqli_query($this->koneksi, "INSERT INTO tblpelanggan VALUES('$Nama_Plngn','$Email_Plngn','$Password_Plngn','$JK_Plngn','$TL_Plngn','$NoTlpn_Plngn','$Alamat_Plngn')");
		return $tambahuser;
	}
	function tambahpesan($Email_Plngn,$Pesan){
		$tambah = mysqli_query($this->koneksi, "INSERT INTO tblcontactus VALUES('$Email_Plngn','$Pesan')");
		return $tambah;	
	}
	function tambahbrg($Id_Brng, $Nama_Brng, $Stock_Brng, $Harga_Brng, $Foto_Brng, $Deskripsi_Brng)
	{
		$tambahbrg = mysqli_query($this->koneksi, "INSERT INTO tblbarang VALUES('$Id_Brng', '$Nama_Brng', '$Stock_Brng', '$Harga_Brng', '$Foto_Brng', '$Deskripsi_Brng')");
		return $tambahbrg;
	}
	function addcart($Email_Plngn, $Id_Brng, $Pajak, $Quantity, $Subtotal)
	{
		$cart = mysqli_query($this->koneksi, "INSERT INTO tblcart VALUES('$Email_Plngn', '$Id_Brng', '$Pajak', '$Quantity', '$Subtotal')");
		return $cart;
	}
	function order($Email_Plngn)
	{
		$order = mysqli_query($this->koneksi, "INSERT INTO tblcheckout VALUES('', '$Email_Plngn', 'Pending', CURRENT_TIMESTAMP())");
		return $order;
	}

	function hapususer($Email_Plngn)
	{
		$hapus = mysqli_query($this->koneksi, "DELETE FROM tblpelanggan WHERE Email_Plngn='$Email_Plngn'");
		return $hapus;
	}
	function hapuspesan($Email_Plngn)
	{
		$hapus = mysqli_query($this->koneksi, "DELETE FROM tblcontactus WHERE Email_Plgn='$Email_Plngn'");
		return $hapus;
	}

	function hapusbrg($ID)
	{
		$hapus = mysqli_query($this->koneksi, "DELETE FROM tblbarang WHERE Id_Brng='$ID'");
		return $hapus;
	}

	function hapuscartbrg($ID, $Email_Plngn)
	{
		$hapus = mysqli_query($this->koneksi, "DELETE FROM tblcart WHERE Id_Brng='$ID' AND Email_Plngn='$Email_Plngn'");
		return $hapus;
	}
	function hapuscartbrg2($ID)
	{
		$hapus = mysqli_query($this->koneksi, "DELETE FROM tblcart WHERE Id_Brng='$ID'");
		return $hapus;
	}
	function hapushistory($ID)
	{
		$hapus = mysqli_query($this->koneksi, "DELETE FROM tblcheckout WHERE Id_Pembelian='$ID'");
		return $hapus;
	}

	function editbrg($Id_Brng, $Nama_Brng, $Stock_Brng, $Harga_Brng, $Foto_Brng, $Deskripsi_Brng)
	{
		$edit = mysqli_query($this->koneksi, "UPDATE tblbarang SET Id_Brng='$Id_Brng', Nama_Brng='$Nama_Brng', Stock_Brng='$Stock_Brng', Harga_Brng='$Harga_Brng', Foto_Brng='$Foto_Brng', Deskripsi_Brng='$Deskripsi_Brng' WHERE Id_Brng='$Id_Brng'");
		return $edit;
	}

	function edituser($Nama_Plngn,$Email_Plngn,$Password_Plngn,$JK_Plngn,$TL_Plngn,$NoTlpn_Plngn,$Alamat_Plngn)
	{
		$edit = mysqli_query($this->koneksi, "UPDATE tblpelanggan SET Nama_Plngn='$Nama_Plngn', Email_Plngn='$Email_Plngn', Password_Plngn='$Password_Plngn', JK_Plngn='$JK_Plngn', TL_Plngn='$TL_Plngn', NoTlpn_Plngn='$NoTlpn_Plngn', Alamat_Plngn='$Alamat_Plngn' WHERE Email_Plngn='$Email_Plngn'");
		return $edit;
	}
	function updatecart($Email_Plngn, $Quantity, $Id_Brng, $Harga_Brng)
	{
		$edit = mysqli_query($this->koneksi, "UPDATE tblcart SET Quantity = '$Quantity' , Subtotal = $Harga_Brng*$Quantity WHERE Id_Brng = '$Id_Brng' AND Email_Plngn='$Email_Plngn'");
		return $edit;
	}
	function updatecart2($Email_Plngn, $Quantity, $Id_Brng, $Subtotal, $pajak)
	{
		$edit = mysqli_query($this->koneksi, "UPDATE tblcart SET Quantity = '$Quantity' , Pajak = '$pajak',Id_Brng = '$Id_Brng', Subtotal = $Subtotal, Email_Plngn='$Email_Plngn' WHERE Id_Brng = '$Id_Brng'");
		return $edit;
	}
	function updatehistory($Id_Pembelian, $Progress)
	{
		$edit = mysqli_query($this->koneksi, "UPDATE tblcheckout SET Progress = '$Progress' WHERE Id_Pembelian='$Id_Pembelian'");
		return $edit;
	}
	function changepass($Email_Plngn,$Password_Lama,$Password_Baru)
	{
		$edit = mysqli_query($this->koneksi, "UPDATE tblpelanggan SET Password_Plngn = '$Password_Baru' WHERE Password_Plngn = '$Password_Lama' AND Email_Plngn='$Email_Plngn'");
		return $edit;
	}
	function cari($keyword)
	{
		$query = mysqli_query($this->koneksi, "SELECT * FROM tblbarang WHERE Nama_Brng = '$keyword'");
		return $query;
	}
	// function query($query){
	// 	global $koneksi;
	// 	$result = mysqli_query($koneksi, $query);
	// 	$data = [];
	// 	while($datas = mysqli_fetch_assoc($result)){
	// 		$data[] = $datas;
	// 	}
	// 	return $data;
	// }
}
?>