<?php  
require_once '../config.php';
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // cek apakah tombol submit berhasil ditambahkan atau tidak
    if (tambahPetugas($_POST) > 0) {
        echo "<script>
              alert('Data berhasil ditambahkan');
              document.location.href = 'index.php?page=data_petugas';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan');
                document.location.href = 'index.php?page=data_petugas';
            </script>";
    }

}


?>
<h4 class="ml-3"><i class="fas fa-tachometer-alt mr-2"></i>Tambah Data Petugas</h4><hr>

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form method="post" action="" autocomplete="off">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        Form Tambah
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Petugas</label>
                            <input type="text" name="nama_petugas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Tambah Petugas</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>    
    


