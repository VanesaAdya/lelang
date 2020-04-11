<?php  
require_once '../config.php';
// cek apakah tombol submit sudah ditekan atau belum
$id_petugas = $_GET["id_petugas"];
$petugas = query("SELECT * FROM tb_petugas WHERE id_petugas = '$id_petugas'")[0];

if (isset($_POST["submit"])) {
    
    // cek apakah tombol submit berhasil ditambahkan atau tidak
    if (updatePetugas($_POST) > 0) {
        echo "<script>
              alert('Data berhasil diupdate');
              document.location.href = 'index.php?page=data_petugas';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diupdate');
                document.location.href = 'index.php?page=data_petugas';
            </script>";
    }

}

?>
<h4 class="ml-3"><i class="fas fa-tachometer-alt mr-2"></i>Update Data Petugas</h4><hr>

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form method="post" action="" autocomplete="off">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        Form Update
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id_petugas" value="<?php echo $id_petugas; ?>">
                        <div class="form-group">
                            <label>Nama Petugas</label>
                            <input type="text" value="<?php echo $petugas["nama_petugas"]; ?>" name="nama_petugas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="<?php echo $petugas["username"]; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $petugas["password"] ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Update Petugas</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>    
    


