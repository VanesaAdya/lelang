<?php  
require_once '../config.php';
$petugas = query("SELECT * FROM tb_petugas WHERE id_level = '2'");

?>
<h4 class="ml-3"><i class="fas fa-tachometer-alt mr-2"></i> Data Petugas</h4><hr>

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5">
            <a href="index.php?page=tambahPetugas" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach($petugas as $p) : ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $p["nama_petugas"]; ?></td>
                        <td><?php echo $p["username"]; ?></td>
                        <td>
                            <a href="index.php?page=update_petugas&id_petugas=<?php echo $p["id_petugas"]; ?>" class="btn btn-warning">Update</a>
                            <a href="hapus_petugas.php?id_petugas=<?php echo $p["id_petugas"]; ?>" class="btn btn-danger" onclick="confirm('Apakah anda yakin menghapus')" >Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
