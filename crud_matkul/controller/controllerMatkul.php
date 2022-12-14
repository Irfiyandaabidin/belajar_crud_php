<?php include "../config/config.php"; 

$nama_matkul    = @$_POST['nama_matkul'];
$deskripsi      = @$_POST['deskripsi'];

// Update
if (@$_POST['kode']) {
    $kode = $_POST['kode'];
    $query = "UPDATE mata_kuliah SET 
        nama_matkul = '$nama_matkul',
        deskripsi   = '$deskripsi'
        WHERE kode = '$kode'";
    mysqli_query($koneksi, $query);
    header('location:../?update=sukses');
}
// Delete
elseif (@$_GET['kode']) {
    $kode = $_GET['kode'];
    mysqli_query($koneksi, "DELETE FROM mata_kuliah WHERE kode = '$kode'");
    header('location:../?hapus=sukses');
}
// Tambah
else {
    $query = "INSERT INTO mata_kuliah (nama_matkul, deskripsi) VALUES ('$nama_matkul', '$deskripsi')";
    
    mysqli_query($koneksi, $query);
    header('location:../?tambah=sukses');
}
?>