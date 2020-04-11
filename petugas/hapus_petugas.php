<?php 
require_once '../config.php';

$id_petugas = $_GET["id_petugas"];
mysqli_query($conn,"DELETE FROM tb_petugas WHERE id_petugas = '$id_petugas'");
echo "<script>
              alert('Data berhasil dihapus');
              document.location.href = 'index.php?page=data_petugas';
            </script>";