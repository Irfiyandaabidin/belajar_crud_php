<?php
include 'header.php';
include 'koneksi.php';
$id_anggota            = @$_POST['id_anggota'];
$id_buku               = @$_POST['id_buku'];
$tanggal_kembali       = @$_POST['tanggal_kembali'];
$tanggal_kembali_asli  = @$_POST['tanggal_kembali_asli'];
$tanggal_pinjam        = @$_POST['tanggal_pinjam'];

if(@$_POST['id_transaksi']) {
    $id_transaksi = $_POST['id_transaksi'];
    $query = "UPDATE transaksi SET
        id_anggota              = '$id_anggota',
        id_buku                 = '$id_buku',
        tanggal_kembali         = '$tanggal_kembali',
        tanggal_kembali_asli    = '$tanggal_kembali_asli',
        tanggal_pinjam          = '$tanggal_pinjam'
        WHERE id_transaksi      = '$id_transaksi'";
    mysqli_query($koneksi, $query);

    header('location:transaksi.php?update=sukses');
}
elseif (@$_GET['id_transaksi']) {
    $id_transaksi = $_GET['id_transaksi'];
    mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");

    header('location:transaksi.php?delete=sukses');
}
else {
    $query = "INSERT INTO transaksi (id_anggota, id_buku, tanggal_kembali, tanggal_kembali_asli, tanggal_pinjam)
    VALUES ('$id_anggota', '$id_buku', '$tanggal_kembali', '$tanggal_kembali_asli', '$tanggal_pinjam')";
    mysqli_query($koneksi, $query);

    header('location:transaksi.php?tambah=sukses');
}

include 'footer.php';
?>