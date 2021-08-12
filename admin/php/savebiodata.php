<?php 

require_once 'koneksi.php';

$dataSerialize = $_POST['dataSerialize'];

$dataSaveArr = json_decode($dataSerialize, true);

$dataSaving = [];

foreach ($dataSaveArr as $value) {
    if($value['name'] == "provinsi"){
        $expItem = explode("-",$value['value']);
        array_push($dataSaving, $expItem[0]);
    } else if ($value['name'] == "kota") {
        $expItem = explode("-",$value['value']);
        array_push($dataSaving, $expItem[0]);
    } else if ($value['name'] == "kecamatan") {
        $expItem = explode("-",$value['value']);
        array_push($dataSaving, $expItem[0]);
    } else if ($value['name'] == "kelurahan") {
        $expItem = explode("-",$value['value']);
        array_push($dataSaving, $expItem[0]);
    } else if ($value['name'] == "rtrw") {
        $expItem = explode("/",$value['value']);
        array_push($dataSaving, $expItem[0]); 
        array_push($dataSaving, $expItem[1]); 
    } else {
        array_push($dataSaving, $value['value']);
    };
}

$sqlWilayah = "INSERT INTO `table_wilayah` (nomor_kartukeluarga,nama_kepalakeluarga,alamat,nama_provinsi,nama_kabupatenkota,nama_kecamatan,nama_desakelurahan,nomorrt,nomorrw,kode_pos) 
            VALUES ('$dataSaving[0]','$dataSaving[1]','$dataSaving[2]','$dataSaving[3]','$dataSaving[4]','$dataSaving[5]','$dataSaving[6]','$dataSaving[7]','$dataSaving[8]','$dataSaving[9]')";

if ($conn->query($sqlWilayah) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlWilayah . "<br>" . $conn->error;
}
?>