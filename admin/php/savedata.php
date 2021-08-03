<?php

require_once 'koneksi.php';

$nomorkk = $_POST['nomorkk'];
$namakepalakeluarga = $_POST['namakepalakeluarga'];
$alamat = $_POST['alamat'];
$provinsi = explode("-", $_POST['provinsi']);
$kota = explode("-", $_POST['kota']);
$kecamatan = explode("-", $_POST['kecamatan']);
$kelurahan = explode("-", $_POST['kelurahan']);
$rtrw = explode("/", $_POST['rtrw']);
$kodepos = $_POST['kodepos'];
$nomorkkbio = $_POST['nomorkkbio'];
$nonik = $_POST['nomornik'];
$namalengkap = $_POST['namalengkap'];
$jeniskelamin = $_POST['jeniskelamin'];
$tempatlahir = $_POST['tempatlahir'];
$tanggallahir = $_POST['tanggallahir'];
$nonikdataind = $_POST['nonikdataind'];
$agama = $_POST['agama'];
$pendidikan = $_POST['pendidikan'];
$jenispekerjaan = $_POST['jenispekerjaan'];
$statusperkawinan = $_POST['statusperkawinan'];
$nonikdatastat = $_POST['nonikdatastat'];
$statushub = $_POST['statushub'];
$kewarganegaraan = $_POST['kewarganegaraan'];
$namaayah = $_POST['namaayah'];
$namaibu = $_POST['namaibu'];

$sqlwilayah = "INSERT INTO `table_wilayah` VALUES ('$nomorkk', '$namakepalakeluarga', '$alamat', '" . $rtrw[0] . "', '" . $rtrw[1] . "', '" . $kelurahan[0] . "', '" . $kecamatan[0] . "', '" . $kota[0] . "', '$kodepos', '" . $provinsi[0] . "')";

if ($conn->query($sqlwilayah) === TRUE) {
    $sqlbiodata = "INSERT INTO `table_biodata` VALUES ('','$nomorkkbio', '$nonik', '$namalengkap', '$jeniskelamin', '$tempatlahir', '$tanggallahir', '')";
    if ($conn->query($sqlbiodata) === TRUE) {
        $sqldataindividu = "INSERT INTO `table_dataindividu` VALUES ('$nonikdataind', '$agama', '$pendidikan', '$jenispekerjaan', '$statusperkawinan')";
        if ($conn->query($sqldataindividu) === TRUE) {
            $sqldatastatus = "INSERT INTO `table_status` VALUES ('$nonikdatastat', '$statushub', '$kewarganegaraan', '$namaayah', '$namaibu')";
            if ($conn->query($sqldatastatus) === TRUE) {
            }
        }
    }
}
