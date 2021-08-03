<?php

$iduser = $_SESSION['id_user'];

$sql = "SELECT * FROM table_user WHERE id_user=$iduser";
$result = $conn->query($sql);
$nomor = 1;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>$nomor</td>
        <td>" . $row['nomor_kartukeluarga'] . "</td>
        <td>" . $row['nomor_ktp'] . "</td>
        <td>" . $row['nama_keluarga'] . "</td>
        <td>" . $row['nomor_hp'] . "</td>
        <td>
            <a class='btn-primary btn' href='php/CRUD.php?aksi=detail'>Detail</a>
            <a class='btn-warning btn' href='php/CRUD.php?aksi=update&data=" . $row['id_user'] . "'>Update</a>
            <a class='btn-danger btn' href='php/CRUD.php?aksi=delete&data=" . $row['id_user'] . "'>Delete</a>
            <button class='btn-danger btn' id='deletebtn'>Delete</button>
        </td>
        </tr>";
        $nomor++;
    }
} else {
    echo "0 results";
}
