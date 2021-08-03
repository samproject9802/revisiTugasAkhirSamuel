<?php

require_once "../koneksi.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `table_survey` WHERE id_survey=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    }
} else echo "noob";
