<?php
$alamat        = @$_POST['alamat'];
$email         = @$_POST['email'];
$foto          = @$_POST['foto'];
$jenis_kelamin = @$_POST['jenis_kelamin'];
$kode_anggota  = @$_POST['kode_anggota'];
$nama          = @$_POST['nama'];
$telp          = @$_POST['telp'];

include 'koneksi.php';

if(@$_POST['id_anggota']){
    $id_anggota = $_POST['id_anggota'];

    if(@$_FILES['foto']['name']) {
        $tmp_foto = explode(".",$_FILES['foto']['name']);
        
        $foto = $kode_anggota. '.' . $tmp_foto[1];
        $new_foto = 'foto/'.$foto;
        move_uploaded_file($_FILES['foto']['tmp_name'], $new_foto);
    }

    else {
        $foto = '';
    };


    $query = "UPDATE anggota SET
        alamat          = '$alamat',
        email           = '$email',
        foto            = '$foto',
        jenis_kelamin   = '$jenis_kelamin',
        kode_anggota    = '$kode_anggota',
        nama            = '$nama',
        telp            = '$telp'
        WHERE id_anggota = '$id_anggota'";
    mysqli_query($koneksi, $query) or die ('Error');

    header('location:anggota.php?update=sukses');
}
elseif (@$_GET['id_anggota']) {
    $id_anggota = $_GET['id_anggota'];
    mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota='$id_anggota'");

    header('location:anggota.php?delete=sukses');
}
else{
    $query = "INSERT INTO anggota (alamat, email, foto, jenis_kelamin, kode_anggota, nama, telp)
        VALUES ('$alamat', '$email', '$foto', '$jenis_kelamin', '$kode_anggota', '$nama', '$telp')";
    mysqli_query($koneksi, $query) or die('Error');

    header('location:anggota.php?tambah=sukses');
}

print_r($_FILES)
?>