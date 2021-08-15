<?php

session_start();

require_once '../../assets/php/koneksi.php';

$task = $_POST['task'];

if ($task == "insertKuisioner") {
    $dataResult = $_POST['hasilKuis'];

    $sqlInsertResult = "INSERT INTO `table_kuisioner` (nomor_kk,nomor_ktp,result) 
                        VALUES ('$_SESSION[nomor_kartukeluarga]','$_SESSION[nomor_ktp]','$dataResult')";

    if ($conn->query($sqlInsertResult) == TRUE) {
        echo "Sukses";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if ($task == "selectDataKuisioner") {

    $sql = "SELECT (result) FROM `table_kuisioner`
            WHERE nomor_kk='$_SESSION[nomor_kartukeluarga]' AND nomor_ktp='$_SESSION[nomor_ktp]'";
    $result = $conn->query($sql);
    $dataKuisioner = [];

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $dataKuisioner[] = $row;
        }
        echo json_encode($dataKuisioner);
    }

}

?>