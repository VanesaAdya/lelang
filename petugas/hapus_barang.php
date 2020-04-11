<?php 
require_once '../config.php';

$id_barang = $_GET["id_barang"];
mysqli_query($conn,"DELETE FROM tb_barang WHERE id_barang = '$id_barang'");
echo "<script>
              alert('Data berhasil dihapus');
              document.location.href = 'index.php?page=data_barang';
            </script>";