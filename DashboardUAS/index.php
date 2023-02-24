<?php 
session_start();
if(! isset($_SESSION['login']))
{
  header('location:loginadmin.php');
  exit;
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
            <a href="index.php" class="text-dark" style="text-decoration: none;"><h2>Admin</h2></a>
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
      <center><h2>Data Admin Lavore Store</h2></center><br>
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
          <thead class="bg-warning">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1.</td>
              <td>Welly</td>
              <td>Wellycen@gmail.com</td>
            </tr>
            <tr>
              <td>2.</td>
              <td>Rico</td>
              <td>Rico@gmail.com</td>
            </tr>
            <tr>
              <td>3.</td>
              <td>Jericho</td>
              <td>Jericho@gmail.com</td>
            </tr>
          </tbody>
        </table>
      </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--<script type="text/javascript" src="jquery.js"></script> -->

    <script type="text/javascript" src="Home.js"></script>
  </body>
</html>