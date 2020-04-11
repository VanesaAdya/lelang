<?php 
session_start();
require_once 'config.php';
require 'templates/header.php';
$id_pembayaran = $_GET["id_pembayaran"];

$pembayaran = query("SELECT  * FROM tb_pembayaran WHERE id_pembayaran = '$id_pembayaran'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // cek apakah tombol submit berhasil ditambahkan atau tidak
    if (kirimPembayaran($_POST) > 0) {
        echo "<script>
              alert('Data berhasil dikirim');
              document.location.href = 'pembayaran.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal dikirim');
                document.location.href = 'pembayaran.php';
            </script>";
    }

}


?>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-12 mb-3">
			<h3 class="text-center">Kirim Pembayaran</h3>
		</div>
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-header bg-primary text-white text-center">
					Form Pembayaran
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<tr>
							<td>Total Pembayaran</td>
							<td>Rp.<?php echo number_format($pembayaran["harga_akhir"],0,',','.'); ?></td>
						</tr>
					</table>
					<form action="" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id_pembayaran" value="<?php echo $id_pembayaran; ?>">
						<div class="form-group">
							<label>Kirim Bukti Pembayaran</label>
							<input type="file" name="gambar" class="form-control">
						</div>
						<button type="submit" name="submit" class="btn btn-primary">Kirim Pembayaran</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>