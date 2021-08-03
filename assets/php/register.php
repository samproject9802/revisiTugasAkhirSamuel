<?php

require_once 'koneksi.php';

$user_name = $_POST['usrnm'];
$psw_user1 = md5($_POST['pwd']);
$psw_user2 = md5($_POST['repwd']);
$kk_num = $_POST['familycardnumber'];
$ktp_num = $_POST['idnumber'];
$kk_name = $_POST['fullname'];
$phone = $_POST['phone'];

$sql = "SELECT * FROM table_biodata WHERE nomor_kartukeluarga = '$kk_num' AND nomor_ktp = '$ktp_num'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  if ($psw_user1 == $psw_user2) {

    $sql = "INSERT INTO table_user VALUES ('', '$user_name','$psw_user1','$kk_num','$phone')";

    if ($conn->query($sql) === TRUE) {
      header("Location: ../index.php");
    }
  }
} else {
  echo "<script>alert('Data tidak ditemukan')</script>";
}

mysqli_close($conn);
