<?php 
require_once '../config.php';
$id_pembayaran = $_GET["id_pembayaran"];

mysqli_query($conn,"UPDATE tb_pembayaran SET status = 'lunas' WHERE id_pembayaran = '$id_pembayaran'");
	echo "<script>
				alert('Konfirmasi Pembayaran');
				document.location.href = 'data_pembayaran.php';
				</script>";