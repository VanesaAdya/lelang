<!DOCTYPE html>
<html>
	<head>
		<title>Web Programming</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="form.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
			
 			
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Bantuan</a>
      </li>
      <?php if(isset($_SESSION["login"])) : ?>
          <li class="nav-item">
        <a class="nav-link" href="logout.php"><?php echo $_SESSION["masyarakat"]["nama_lengkap"] ?></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="pembayaran.php">History Saya</a>
      </li>
  <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      	<?php else: ?>
  <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      	<?php endif; ?>
     
    </ul>
  </div>
</nav>