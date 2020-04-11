<?php 
require_once '../config.php';
$barang = mysqli_query($conn,"SELECT * FROM tb_barang");
$jumlahBarang = mysqli_num_rows($barang);

$petugas = mysqli_query($conn,"SELECT * FROM tb_petugas WHERE id_petugas = '2'");
$jumlahPetugas = mysqli_num_rows($petugas);
?>

<h4 class="ml-3"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</h4><hr>
<div class="row text-white">
    <div class="card bg-info" style="width:15rem;">
        <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-file-alt"></i>
            </div>
            <h6 class="card-title">Data Barang</h6>
            <div class="display-4"><?php echo $jumlahBarang ?></div>
            <a href="index.php?page=data_barang"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
        </div>
    </div>
    <div class="card bg-success ml-3" style="width:15rem;">
        <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-sync-alt"></i>
            </div>
            <h6 class="card-title">Data Petugas</h6>
            <div class="display-4"><?php echo $jumlahPetugas; ?></div>
            <a href="index.php?page=data_petugas"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
        </div>
    </div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
