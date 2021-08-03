<?php

$nomorkartukeluarga = $_SESSION['nomor_kartukeluarga'];

$sql = "SELECT * FROM table_biodata WHERE nomor_kartukeluarga='$nomorkartukeluarga'";
$result = $conn->query($sql);
$datauser = [];

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $datauser = $row;
    }
} else {
}
