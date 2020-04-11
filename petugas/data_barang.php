<?php  
require_once '../config.php';
$barang = query("SELECT * FROM tb_barang");

?>
<h4 class="ml-3"><i class="fas fa-tachometer-alt mr-2"></i> Data Petugas</h4><hr>

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5">
            <a href="index.php?page=tambahBarang" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Harga</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach($barang as $p) : ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $p["nama_barang"]; ?></td>
                        <td><?php echo $p["tanggal_mulai"]; ?></td>
                        <td><?php echo $p["tanggal_akhir"]; ?></td>
                        <td>Rp.<?php echo number_format($p["harga_awal"],0,',','.'); ?></td>
                        <td>
                            <a href="index.php?page=update_barang&id_barang=<?php echo $p["id_barang"]; ?>" class="btn btn-warning">Update</a>
                            <a href="hapus_barang.php?id_barang=<?php echo $p["id_barang"]; ?>" class="btn btn-danger" onclick="confirm('Apakah anda yakin menghapus')" >Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>    
