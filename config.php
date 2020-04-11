<?php 
$conn = mysqli_connect("localhost", "root", "", "db_lelang");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data){
    global $conn;
    $nama_lengkap = $data["nama_lengkap"];
    $username = $data["username"];
    $password = $data["password"];
    $password2 = $data["password2"];
    $telp = $data["no_hp"];

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM tb_masyarakat WHERE username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
              alert('Username sudah terdaftar');
          </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai');
             </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO tb_masyarakat 
                  VALUES
                  ('', '$nama_lengkap','$username','$password','$telp')");
    return mysqli_affected_rows($conn);
}

function kirimPenawaran($data){
    global $conn;
    $id_barang = $data["id_barang"];
    $id_user = $data["id_user"];
    $penawaran_harga = $data["penawaran_harga"];
    $tanggal_penawaran = date('Y-m-d h:i:s');
    mysqli_query($conn,"INSERT INTO history_lelang VALUES ('','$id_barang','$id_user','$penawaran_harga','$tanggal_penawaran')");
    return mysqli_affected_rows($conn);
}

function tambahPembayaran($harga_akhir,$id_barang,$id_user){
    global $conn;
    $tgl_lelang = date("Y-m-d");
    mysqli_query($conn,"UPDATE tb_barang SET 
                    status = 'ditutup'
                    WHERE id_barang = '$id_barang'
                    ");

    mysqli_query($conn,"INSERT INTO tb_pembayaran VALUES('','$id_barang','$tgl_lelang','$harga_akhir','$id_user','belum-lunas')");
    return mysqli_affected_rows($conn);
}

function kirimPembayaran($data){
    global $conn;
    $id_pembayaran = $data["id_pembayaran"];

        // upload gambar
    $bukti = upload();
    if (!$bukti) {
        return false;
    }

    mysqli_query($conn,"UPDATE tb_pembayaran SET bukti = '$bukti', status = 'proses' WHERE id_pembayaran = '$id_pembayaran'");
    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    
    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu');
             </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar');
             </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 20000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    // lolos pengecekan,gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'images/bukti/' . $namaFileBaru);
    return $namaFileBaru;

}


function tambahPetugas($data){
    global $conn;
    $nama_petugas = $data["nama_petugas"];
    $username = $data["username"];
    $password = password_hash($data["password"],PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO tb_petugas VALUES ('','$nama_petugas','$username','$password','2')");
    return mysqli_affected_rows($conn);
}

function updatePetugas($data){
    global $conn;
    $nama_petugas = $data["nama_petugas"];
    $username = $data["username"];
    $password = password_hash($data["password"],PASSWORD_DEFAULT);
    $id_petugas = $data["id_petugas"];

    mysqli_query($conn,"UPDATE tb_petugas SET 
                nama_petugas = '$nama_petugas',
                username = '$username',
                password = '$password'
                WHERE id_petugas = '$id_petugas'
        ");
    return mysqli_affected_rows($conn);
}

function tambahBarang($data){
    global $conn;
    $nama_barang = $data["nama_barang"];
    $tanggal_mulai = $data["tanggal_mulai"];
    $tanggal_akhir = $data["tanggal_akhir"];
    $harga_awal = $data["harga_awal"];
    $deskripsi_barang = $data["deskripsi_barang"];

    // upload gambar
    $gambar = uploadBarang();
    if (!$gambar) {
        return false;
    }

    mysqli_query($conn,"INSERT INTO tb_barang VALUES ('','$nama_barang','$tanggal_mulai','$tanggal_akhir','$harga_awal','$deskripsi_barang','dibuka','$gambar')");
    return mysqli_affected_rows($conn);
}

function updateBarang($data){
    global $conn;
    $nama_barang = $data["nama_barang"];
    $tanggal_mulai = $data["tanggal_mulai"];
    $tanggal_akhir = $data["tanggal_akhir"];
    $harga_awal = $data["harga_awal"];
    $deskripsi_barang = $data["deskripsi_barang"];
    $id_barang = $data["id_barang"];
    $gambarLama = $data["gambarLama"];

    if($_FILES["gambar"]["error"] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = uploadBarang();
    }

    mysqli_query($conn,"UPDATE tb_barang SET 
                    nama_barang = '$nama_barang',
                    tanggal_mulai = '$tanggal_mulai',
                    tanggal_akhir = '$tanggal_akhir',
                    harga_awal = '$harga_awal',
                    deskripsi_barang = '$deskripsi_barang',
                    status = 'dibuka',
                    gambar = '$gambar'
                    WHERE id_barang = '$id_barang'
        ");
    return mysqli_affected_rows($conn);
}


function uploadBarang(){
       $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    
    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu');
             </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar');
             </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 20000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    // lolos pengecekan,gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../media/' . $namaFileBaru);
    return $namaFileBaru;

}

