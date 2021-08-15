<?php
session_start();

include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['usrnm'];
$password = md5($_POST['pwd']);
$loginas = $_POST['selectlogin'];



if ($loginas == "Penduduk") {
    $query = "SELECT * FROM table_user WHERE user_name='$username' and password_user='$password'";
    //menyeleksi data pada tabel user dengan username dan password yang sesuai
    $sqluser = mysqli_query($conn, $query);

    // menghitung jumlah data yang ditemukan
    $cekuser = mysqli_num_rows($sqluser);

    if ($cekuser > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;
        if ($sqluser->num_rows > 0) {
            // output data of each row
            while ($row = $sqluser->fetch_assoc()) {
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['nomor_kartukeluarga'] = $row['nomor_kartukeluarga'];
                $_SESSION['nomor_ktp'] = $row['nomor_ktp'];
            }
        }
        header("location: ../../index.php?task=login-success-user");
    } else {
        header("location: ../../index.php?task=login-failed-user");
    }
} elseif ($loginas == "Admin") {
    $query = "SELECT * FROM table_admin WHERE nama_pengguna='$username' and katasandi_pengguna='$password'";
    // menyeleksi data pada tabel admin dengan username dan password yang sesuai
    $sqladmin = mysqli_query($conn, $query);

    // menghitung jumlah data yang ditemukan
    $cekadmin = mysqli_num_rows($sqladmin);

    if ($cekadmin > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;
        if ($sqladmin->num_rows > 0) {
            // output data of each row
            while ($row = $sqladmin->fetch_assoc()) {
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['identitas_pengguna'] = $row['identitas_pengguna'];
            }
        }
        header("location: ../../index.php?task=login-success-admin");
    } else {
        header("location: ../../index.php?task=login-failed-admin");
    }
} else {
}
