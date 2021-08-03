<?php

require_once 'php/koneksi.php';

$sql = "SELECT a.nomor_kartukeluarga, c.nomor_ktp, b.nama_lengkap, c.status_hubungan, 
		(SELECT COUNT(*) 
          FROM table_biodata 
         WHERE nomor_kartukeluarga = a.nomor_kartukeluarga) as jumlah_tanggungan
FROM table_wilayah as a
INNER JOIN table_biodata as b ON a.nomor_kartukeluarga = b.nomor_kartukeluarga
INNER JOIN table_status as c ON b.nomor_ktp = c.nomor_ktp
GROUP BY a.nomor_kartukeluarga";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $nomor = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>$nomor </td>
        <td>" . $row['nomor_kartukeluarga'] . " </td>
        <td>" . $row['nomor_ktp'] . " </td>
        <td>" . $row['nama_lengkap'] . " </td>
        <td>" . $row['status_hubungan'] . " </td>
        <td>" . $row['jumlah_tanggungan'] . " </td>
        <td class = 'btn-group'>
        <button class = 'btn btn-primary'>Detail</button>
        <button class = 'btn btn-warning'>Update</button>
        <button class = 'btn btn-danger'>Delete</button>
        </td>
        </tr>";

        $nomor++;
    }
}
