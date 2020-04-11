<?php 
session_start();
require_once 'config.php';
require 'templates/header.php';
$id_user = $_SESSION["masyarakat"]["id_user"];
$pembayaran = query("SELECT  * FROM tb_pembayaran WHERE id_user = '$id_user'");


?>

<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<h3 class="text-center mb-5">Data History Lelang</h3>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Lelang</th>
						<th>Harga Akhir</th>
						<th>Status</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1; ?>
					<?php foreach($pembayaran as $p) : ?>
					<tr>
						<td><?php echo $nomor++; ?></td>
						<td><?php echo $p["tgl_lelang"]; ?></td>
						<td>Rp.<?php echo number_format($p["harga_akhir"]); ?></td>
						<td><?php echo $p["status"]; ?></td>
						<td>
							<?php if($p["status"] === "belum-lunas") : ?>
							<a href="kirimPembayaran.php?id_pembayaran=<?php echo $p["id_pembayaran"]; ?>" class="btn btn-primary">Kirim Pembayaran</a>
							<?php elseif($p["status"] === "proses") : ?>
							<a href="#" class="btn btn-primary">Data Proses...</a>
							<?php else: ?>
							<a href="#" class="btn btn-success">Lunas...</a>
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>