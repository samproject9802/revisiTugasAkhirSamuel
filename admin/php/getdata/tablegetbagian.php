<?php

include_once 'php/koneksi.php';

$sqlbagian = "SELECT * FROM `table_bagian`";

$statement = $pdo->query($sqlbagian);
while ($rowBagian = $statement->fetch()) {

    $sql = "SELECT a.nama_bagian, b.pertanyaan, b.indikator, b.tipe_pilihan,c.sub_pertanyaan,c.indikator,c.tipe
    FROM table_pertanyaan as b
    LEFT JOIN table_bagian as a ON a.id_bagian = b.id_bagian
    LEFT JOIN table_kuisioner as c ON a.id_bagian=c.id_bagian
    WHERE a.id_bagian = " . $rowBagian['id_bagian'];
    $stmt = $pdo->query($sql);
    $current_cat = null;
    $current_data = null;
    while ($row = $stmt->fetch()) {
        if ($row["nama_bagian"] != $current_cat) {
            $current_cat = $row["nama_bagian"];
            $current_data = $row["pertanyaan"];
            $bagian = explode(" ", $current_cat);
            $nomor = 1;
            echo "
            <thead>
                <tr>
                    <th colspan='3' class='text-center'>$current_cat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>" . $bagian[1] . $nomor++ . "</th>
                    <th>" . $row['pertanyaan'] . "</th>
                    <th>" . $row['indikator'] . "</th>
                </tr>";
        } else if ($row["pertanyaan"] != $current_data) {
            $current_data = $row["pertanyaan"];
            echo "<tbody>
                <tr>
                    <th>" . $bagian[1] . $nomor++ . "</th>
                    <th>$current_data</th>
                    <th>" . $row['indikator'] . "</th>
                </tr>";
        }
        echo "<tr>
                    <th></th>
                    <th>" . $row['sub_pertanyaan'] . "</th>
                    <th></th>
                </tr>
            </tbody>";
    }
}
