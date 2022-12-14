<?php include "../config/config.php"; 

$kode           = @$_POST['kode'];
$materi         = @$_POST['materi'];
$materi_file    = @$_POST['materi_file'];
$minggu         = @$_POST['minggu'];
$id             = @$_POST['id'];
// <!-- Upload file -->


if(@$_FILES['materi_file']['name']) {
    $tmp_file = explode(".", $_FILES['materi_file']['name']);
    $materi_file = $kode . $minggu . '.' . $tmp_file[1];
    $new_file = '../materiFile/'.$materi_file;
    move_uploaded_file($_FILES['materi_file']['tmp_name'], $new_file);
    print_r($_FILES);
    echo ("<p>"."berhasil"."</p>");
    
}
else {
    $materi_file = '';
}

if (@$_POST['id']) {
    $id = @$_POST['id'];
    $query = "UPDATE pertemuan SET
        materi          = '$materi'
        WHERE id = '$id'";
    mysqli_query($koneksi, $query);

    header('location:../tampilMateri.php?id='.$id);
}
elseif(@$_GET['id']) {
    $id = @$_GET['id'];
    $query = "DELETE FROM pertemuan WHERE id = '$id'";
    mysqli_query($koneksi, $query);
    header('location:../tampilPertemuan.php?hapus=sukses');
}
else {
    $query = "INSERT INTO pertemuan(kode, materi, minggu,materi_file)
    VALUES ('$kode','$materi', '$minggu','$materi_file')";
    mysqli_query($koneksi, $query);

    header('location:../tampilPertemuan.php?tambah=sukses');
}
?>