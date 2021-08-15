<?php
require_once 'koneksi.php';

$task = $_POST['task'];

if ($task == "SelectDataPenduduk") {
    $nomorKK = $_POST['nomorIDKK'];

    $dataArr = [];

    $sqlSelect = "SELECT a.nomor_ktp,a.nama_lengkap,a.jenis_kelamin,a.tempat_lahir,a.tanggal_lahir,b.agama,b.pendidikan,b.jenis_pekerjaan,b.status_perkawinan,c.status_hubungan,c.kewarganegaraan,c.nama_ayah,c.nama_ibu FROM `table_biodata` as a
            JOIN `table_dataindividu` as b
            ON a.nomor_ktp = b.nomor_ktp
            JOIN `table_status` as c
            ON a.nomor_ktp = c.nomor_ktp
            WHERE a.nomor_kartukeluarga = '$nomorKK'";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $dataArr[] = $row;
        }
        echo json_encode($dataArr);
    }
} else if ($task == "DeleteDataAnggotaPenduduk") {
    $nomorKK = $_POST['nomorIDKK'];

    $sqlDelete = "SELECT (nomor_ktp) FROM `table_biodata`
                WHERE nomor_kartukeluarga = '$nomorKK'";

    $resultDelete = $conn->query($sqlDelete);

    if ($resultDelete->num_rows > 0) {
        // output data of each row
        while($row = $resultDelete->fetch_assoc()) {
            $sqlDeleteTahap1 = "DELETE FROM `table_status`
                                WHERE nomor_ktp='$row[nomor_ktp]'";
            if ($conn->query($sqlDeleteTahap1) == true) {
                $sqlDeleteTahap2 = "DELETE FROM `table_dataindividu`
                                WHERE nomor_ktp='$row[nomor_ktp]'";
                if ($conn->query($sqlDeleteTahap2) == true) {
                    $sqlDeleteTahap3 = "DELETE FROM `table_biodata`
                                        WHERE nomor_ktp='$row[nomor_ktp]'";
                    if ($conn->query($sqlDeleteTahap3) == true) {
                        echo "Sukses";
                    }
                }
            }
        }
    }

} else if ($task == "DeleteDataWilayah") {
    $nomorKK = $_POST['nomorIDKK'];

    $sqlDeleteTahap4 = "DELETE FROM `table_wilayah`
                        WHERE nomor_kartukeluarga='$nomorKK'";
    if ($conn->query($sqlDeleteTahap4) == true) {
        echo "Sukses";
    }
}

?>