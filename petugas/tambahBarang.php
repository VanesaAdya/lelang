<?php  
require_once '../config.php';
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // cek apakah tombol submit berhasil ditambahkan atau tidak
    if (tambahBarang($_POST) > 0) {
        echo "<script>
              alert('Data berhasil ditambahkan');
              document.location.href = 'index.php?page=data_barang';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan');
                document.location.href = 'index.php?page=data_barang';
            </script>";
    }

}


?>
<h4 class="ml-3"><i class="fas fa-tachometer-alt mr-2"></i>Tambah Data Barang</h4><hr>

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2 mb-3">
            <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        Form Tambah
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tanggal_mulai" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga Awal</label>
                            <input type="number" name="harga_awal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Barang</label>
                            <textarea class="form-control" name="deskripsi_barang"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Tambah Barang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>    
    


