<?php

require_once 'koneksi.php';

$user_name = $_POST['usrnm'];
$psw_user1 = md5($_POST['pwd']);
$psw_user2 = md5($_POST['repwd']);
$kk_num = $_POST['familycardnumber'];
$ktp_num = $_POST['idnumber'];
$kk_name = $_POST['fullname'];
$phone = $_POST['phone'];

$sqlChecking = "SELECT a.nomor_kartukeluarga,a.nomor_ktp,a.nama_lengkap,a.jenis_kelamin,a.tempat_lahir,a.tanggal_lahir,b.agama,b.pendidikan,b.jenis_pekerjaan,b.status_perkawinan,c.status_hubungan,c.kewarganegaraan,c.nama_ayah,c.nama_ibu 
                FROM `table_biodata` as a 
                JOIN `table_dataindividu` as b 
                JOIN `table_status` as c
                ON a.nomor_ktp = b.nomor_ktp AND a.nomor_ktp = c.nomor_ktp
                WHERE a.nomor_kartukeluarga='$kk_num' AND a.nomor_ktp='$ktp_num' AND nama_lengkap LIKE '%$kk_name%'";

$resultChecking = $conn->query($sqlChecking);
$data = [];

if ($resultChecking->num_rows > 0) {

  $sql = "SELECT * FROM table_biodata WHERE nomor_kartukeluarga = '$kk_num' AND nomor_ktp = '$ktp_num'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    if ($psw_user1 == $psw_user2) {

      $sql = "INSERT INTO `table_user` (user_name,password_user,nomor_kartukeluarga,nomor_ktp,no_hp) 
              VALUES ('$user_name','$psw_user1','$kk_num','$ktp_num','$phone')";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
}
