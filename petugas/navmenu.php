<?php 
session_start(); 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="home.css">
    <title>Lelangku</title>

  </head>
  <body>


<nav class="navbar navbar-expand-lg navbar-light navbar-dark" style="background-color: #424242;">
  <a class="navbar-brand" href="#">Lelangku</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link btn btn-outline-warning" href="../logout.php"><i class="fas fa-sign-in-alt"></i> Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>



<div class="row" id="body-row">
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <ul class="list-group">
            <li class="list-group-item sidebar-separator-title bg-dark text-white d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li>
            <?php if($_SESSION["petugas"]["id_level"] === "1"): ?>
            <li>
                <a href="index.php?page=home" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed"><i class="fas fa-tachometer-alt"></i> Home</span>
              </a>
            </li>
            
            <li>
                <a href="index.php?page=data_petugas" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed"><i class="fas fa-file-alt"></i> Data Petugas</span>
              </a>
            </li>
            <li>
                <a href="index.php?page=data_barang" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed"><i class="fas fa-users"></i> Data Barang</span>
              </a>
            </li>
            <li>
                <a href="index.php?page=data_pembayaran" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed"><i class="fas fa-table"></i>Konfirmai Pembayaran</span>
              </a>
            </li>
          <?php else: ?>
            <li>
                <a href="index.php?page=dashboard" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed"><i class="fas fa-tachometer-alt"></i> Home</span>
              </a>
            </li>
            <li>
                <a href="index.php?page=data_barang" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed"><i class="fas fa-users"></i> Data Barang</span>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
