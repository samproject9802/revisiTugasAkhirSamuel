<?php

$aksi = $_GET['aksi'];

if ($aksi == "detail") {
    echo "Memanggil Detail";
} elseif ($aksi == "update") {
    echo "Memanggil Update";
} elseif ($aksi == "delete") {
    $age = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
    echo json_encode($age);
}
