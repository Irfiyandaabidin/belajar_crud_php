<?php
// Panggil file koneksi.php
include 'koneksi.php';

/**
 * Baca data dari form tambah.php
 * [$nim dari form input nim]
 * [$nama description]
 * [$email description]
 * [$telp description]
 * [$tanggal_lahir description]
 * @var [type]
 */

$nim            = @$_POST['nim'];
$nama           = @$_POST['nama'];
$email          = @$_POST['email'];
$telp           = @$_POST['telp'];
$tanggal_lahir  = @$_POST['tanggal_lahir'];


if(@$_POST['id']){
    $id = $_POST['id'];
    // query update data mahasiswa
    $query = "UPDATE mahasiswa SET
        nama = '$nama',
        nim = '$nim',
        email = '$email',
        telp = '$telp',
        tanggal_lahir = '$tanggal_lahir'
        WHERE id = '$id'";
    mysqli_query($koneksi, $query) or die ('Error');

    header('location:tampil.php?update=sukses');
}
elseif (@$_GET['id']) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");

    header('location:tampil.php?delete=sukses');
}
else {
    // query tambah data mahasiswa
    $query = "INSERT INTO mahasiswa (nama, nim, email, telp, tanggal_lahir)
        VALUES ('$nama', '$nim', '$email', '$telp', '$tanggal_lahir')";
    mysqli_query($koneksi, $query) or die("Error");

    header('location:tampil.php?tambah=sukses');
}

?>