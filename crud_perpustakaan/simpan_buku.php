<?php
$kode_buku      = @$_POST['kode_buku'];
$judul          = @$_POST['judul'];
$keterangan     = @$_POST['keterangan'];
$pengarang      = @$_POST['pengarang'];
$penerbit       = @$_POST['penerbit'];
$tahun          = @$_POST['tahun'];

include 'koneksi.php';

if(@$_POST['id_buku']) {
    $id_buku = $_POST['id_buku'];
    $query = "UPDATE buku SET
        judul       = '$judul',
        kode_buku   = '$kode_buku',
        pengarang   = '$pengarang',
        penerbit    = '$penerbit',
        tahun       = '$tahun',
        keterangan  = '$keterangan'
        WHERE id_buku = '$id_buku'";
    mysqli_query($koneksi, $query) ;

    header('location:buku.php?update=sukses');
}
elseif (@$_GET['id_buku']) {
    $id_buku = $_GET['id_buku'];
    mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='$id_buku'");

    header('location:buku.php?delete=sukses');
}
else {
    $query = "INSERT INTO buku (judul, kode_buku, pengarang, penerbit, tahun, keterangan)
        VALUES ('$judul', '$kode_buku', '$pengarang', '$penerbit', $tahun, '$keterangan')";
    mysqli_query($koneksi, $query);
    
    header('location:buku.php?tambah=sukses');
}
?>