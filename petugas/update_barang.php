<?php  
require_once '../config.php';
$id_barang = $_GET["id_barang"];
$barang = query("SELECT * FROM tb_barang WHERE id_barang = '$id_barang'")[0];
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // cek apakah tombol submit berhasil ditambahkan atau tidak
    if (updateBarang($_POST) > 0) {
        echo "<script>
              alert('Data berhasil diupdate');
              document.location.href = 'index.php?page=data_barang';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diupdate');
                document.location.href = 'index.php?page=data_barang';
            </script>";
    }

}


?>
<h4 class="ml-3"><i class="fas fa-tachometer-alt mr-2"></i>Update Data Barang</h4><hr>

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2 mb-3">
            <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="id_barang" value="<?php echo $barang["id_barang"]; ?>">
                <input type="hidden" name="gambarLama" value="<?php echo $barang["gambar"]; ?>">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        Form Update
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" value="<?php echo $barang["nama_barang"] ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-control" value="<?php echo $barang["tanggal_mulai"] ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" value="<?php echo $barang["tanggal_akhir"]; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga Awal</label>
                            <input type="number" name="harga_awal" class="form-control" value="<?php echo $barang["harga_awal"] ?>">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Barang</label>
                            <textarea class="form-control" name="deskripsi_barang"><?php echo $barang["deskripsi_barang"]; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label> <br>
                            <img src="../media/<?php echo $barang["gambar"]; ?>" width="100" height="100">
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Update Barang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>    
    


