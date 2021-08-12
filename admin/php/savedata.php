<?php

require_once 'koneksi.php';

$nomorkk = $_POST['nomorbiokk'];
$nomornik = $_POST['nomornik'];
$namalengkap = $_POST['namalengkap'];
$jeniskelamin = $_POST['jeniskelamin'];
$tempatlahir = $_POST['tempatlahir'];
$tanggallahir = $_POST['tanggallahir'];
$agama = $_POST['agama'];
$pendidikan = $_POST['pendidikan'];
$jenispekerjaan = $_POST['jenispekerjaan'];
$statusperkawinan = $_POST['statusperkawinan'];
$statushub = $_POST['statushub'];
$kewarganegaraan = $_POST['kewarganegaraan'];
$namaayah = $_POST['namaayah'];
$namaibu = $_POST['namaibu'];

$sqlBiodata = "INSERT INTO `table_biodata` (nomor_kartukeluarga, nomor_ktp, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir)
            VALUES ('$nomorkk','$nomornik','$namalengkap','$jeniskelamin','$tempatlahir','$tanggallahir')";
if ($conn->query($sqlBiodata) == true) {
    $sqlIndividu = "INSERT INTO `table_dataindividu` (nomor_ktp,agama,pendidikan,jenis_pekerjaan,status_perkawinan)
                    VALUES ('$nomornik','$agama','$pendidikan','$jenispekerjaan','$statusperkawinan')";
    if ($conn->query($sqlIndividu) == true) {
        $sqlStatus = "INSERT INTO `table_status` (nomor_ktp,status_hubungan,kewarganegaraan,nama_ayah,nama_ibu)
                        VALUES ('$nomornik','$statushub','$kewarganegaraan','$namaayah','$namaibu')";
        if ($conn->query($sqlStatus) == true) {
            echo "Sukses Data Diproses";
        } else {
            echo "Data Status Error: " . $sqlStatus . "<br>" . $conn->error;
        }
    } else {
        echo "Data Individu Error: " . $sqlIndividu . "<br>" . $conn->error;
    }
} else {
    echo "Biodata Error: " . $sqlBiodata . "<br>" . $conn->error;
}
