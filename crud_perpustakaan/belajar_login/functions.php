<?php

require '../koneksi.php';
function registrasi($data) {
    global $koneksi;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    if($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
                </script>";
                return false;
    }
}

?>