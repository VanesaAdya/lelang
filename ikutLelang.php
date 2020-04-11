<?php 
session_start();
require_once 'config.php';
require_once 'templates/header.php';
$id = $_GET["id"];
$id_user = $_SESSION["masyarakat"]["id_user"];
$barang = query("SELECT * FROM tb_barang  WHERE id_barang= '$id'")[0];
$history = query("SELECT * FROM history_lelang WHERE id_barang = '$id' ORDER BY penawaran_harga DESC");
$harga_menang = query("SELECT MAX(penawaran_harga) AS harga_tertinggi FROM history_lelang WHERE id_barang = '$id'")[0];
$harga_tertinggi = $harga_menang["harga_tertinggi"];

if(date("Y-m-d") > $barang["tanggal_akhir"]){
	if (tambahPembayaran($harga_tertinggi,$id,$id_user) > 0) {
			echo "<script>
				alert('Lelang sudah berakhir');
				document.location.href = 'pembayaran.php';
				</script>";
	}else{
			echo "<script>
			alert('Lelang sudah berakhir');
			document.location.href = 'pembayaran.php';
			</script>";
	}
}

if (!isset($_SESSION["login"])) {
	echo "<script>
	alert('Anda harus login');
	document.location.href = 'index.php';
	</script>";
}

if(isset($_POST["submit"])){

	if (kirimPenawaran($_POST) > 0) {
		
            echo "<script>
              alert('Data berhasil dikirim');
              document.location.href= 'ikutLelang.php?id=$id';
             </script>";
	}else{

            echo "<script>
              alert('Data gagal dikirim');
              document.location.href= 'ikutLelang.php?id=$id';
             </script>";
	}

}

 ?>


 <div class="container mt-5">
 	<div class="row">
 		<div class="col-md-6 offset-md-3">
 			<div class="card">
 				<div class="card-header">
 					Kirim Penawaran
 				</div>
 				<div class="card-body">
 					<form method="post" action="">
 						<input type="hidden" name="id_user" value="<?php echo $_SESSION["masyarakat"]["id_user"] ?>">
 						<input type="hidden" name="id_barang" value="<?php echo $barang["id_barang"]; ?>">
 						<table class="table table-striped">
 							<tr>
 								<td>Minimal Penawaran</td>
 								<td>Rp. <?php echo number_format($barang["harga_awal"],0,',','.') ?></td>
 							</tr>
 							<tr>
 								<td>Tanggal Mulai Lelang</td>
 								<td><?php echo $barang["tanggal_mulai"]; ?></td>
 							</tr>
 							 <tr>
 								<td>Tanggal Akhir Lelang</td>
 								<td><?php echo $barang["tanggal_akhir"]; ?></td>
 							</tr>
 						</table>
 						<div class="form-group">
 						<label>Kirim Penawaran</label>
 							<input type="number" name="penawaran_harga" min="<?php echo $barang["harga_awal"] ?>" class="form-control">
 						</div>
 						<button name="submit" type="submit" class="btn btn-primary btn-block">Kirim Penawaran</button>
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>


 <div class="container mt-5">
 	<div class="row">
 		<div class="col-md-12">
 			<h2 class="text-center mb-2">History Penawaran Barang <?php echo $barang["nama_barang"]; ?></h2>
 			<table class="table table-striped">
 				<thead>
 					<tr>
 						<th>No</th>
 						<th>Nama Barang</th>
 						<th>Harga Tawar</th>
 						<th>Tanggal Penawaran</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $nomor = 1;
 						foreach($history as $h) :
 					 ?>
 					<tr>
 						<td><?php echo $nomor++; ?></td>
 						<td><?php echo $barang["nama_barang"]; ?></td>
 						<td>Rp.<?php echo number_format($h["penawaran_harga"],0,',','.'); ?></td>
 						<td><?php echo $h["tanggal_penawaran"]; ?></td>
 					</tr>
 				<?php endforeach; ?>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>