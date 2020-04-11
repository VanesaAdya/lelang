<?php 
session_start();
require_once 'config.php';
require_once 'templates/header.php';
$barang = query("SELECT * FROM tb_barang");
 ?>


			<div class="baner">
				<img src="header.jpg" style="width: 100%;height: 500px;">
			</div>

			<div class="container-fluid mt-5">
				<div class="row">
					<div class="col-md-3">
						<div class="card" style="background-image: url(media/blue.jpg);">
			      <div class="card-body">
			      	<div class="row">
			      		<div class="col-md-6">
			      			<i class="fa fa-shopping-bag fa-3x" style="color: #C0C0C0"></i>
			      		</div>
			      		<div class="col-md-6">
			      			<h5 class="card-title">Lelang barang anda sekarang</h5>
			      		</div>
			      	</div>
			      </div>
			    </div>
					</div>

					<div class="col-md-3">
						<div class="card "style="background-image: url(media/brown.jpg);">
			      <div class="card-body">
			      	<div class="row">
			      		<div class="col-md-6">
			      			<i class="fa fa-clock-o fa-3x" style="color: #C0C0C0"></i>
			      		</div>
			      		<div class="col-md-6">
			      			<h5 class="card-title">Lebih cepat lelang</h5>
			      		</div>
			      	</div> 
			      </div>
			    </div>
					</div>

					<div class="col-md-3">
						<div class="card"style="background-image: url(media/grey.jpg);">
			      <div class="card-body">
			      	<div class="row">
			      		<div class="col-md-6">
			      			<i class="fa fa-usd fa-3x"style="color: #C0C0C0"></i>
			      		</div>
			      		<div class="col-md-6">
			      			<h5 class="card-title">Harga dijamin murah</h5>
			      		</div>
			      	</div>
			      </div>
			    </div>
					</div>

					<div class="col-md-3">
						<div class="card"style="background-image: url(media/green.jpg);">
			      <div class="card-body">
			      	<div class="row">
			      		<div class="col-md-6">
			      			<i class="fa fa-truck fa-3x"style="color: #C0C0C0"></i>
			      		</div>
			      		<div class="col-md-6">
			      			<h5 class="card-title">Bisa cod di tempat</h5>
			      		</div>
			      	</div>
			      </div>
			    </div>		
					</div>
				</div>
			</div>
			
			<nav aria-label="breadcrumb" style="margin-top: 50px;">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item active" aria-current="page"><h4>Barang Lelang Baru</h4></li>
			  </ol>
			</nav>

			<div class="container-fluid mb-5">
				<div class="row">
					<?php foreach($barang as $b) : ?>
					<div class="col-md-3">
						<div class="card" style="width: 18rem;">
						  <img src="media/<?php echo $b["gambar"]; ?>" class="card-img-top" alt="...">
						  <div class="card-body">
						    <h5 class="card-title"><?php echo $b["nama_barang"]; ?></h5>
						    <p class="card-text">Rp <?php echo number_format($b["harga_awal"],0,',','.'); ?></p>
						    <?php if($b["status"] === "ditutup") : ?>
							<a href="#" class="btn btn-danger"><i class="fa fa-close"> Penawaran Ditutup</a></i>
						    <?php else: ?>
						    <a href="ikutLelang.php?id=<?php echo $b["id_barang"]; ?>" class="btn btn-primary"><i class="fa fa-mail-forward">Lelang</a></i>
							<?php endif; ?>
						  </div>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
			</div>


 
		
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>