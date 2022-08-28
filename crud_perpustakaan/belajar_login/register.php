<?php
require '../koneksi.php';

if(isset($_POST["register"])) {
    if(registrasi($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan!');
                </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}

function registrasi($data) {
    global $koneksi;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi,$data["password2"]);

    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah ada')
                </script>";
                return false;
    }

    if($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
                </script>";
                return false;
    }
    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT );

    // tambahkan user baru ke database
    $query = "INSERT INTO users VALUES ('', '$username', '$password')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="post">
        <ul>
            <li>
                <input type="hidden" name="id">
            </li>
            <li>
                <label for="username"> Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>
</body>
</html>