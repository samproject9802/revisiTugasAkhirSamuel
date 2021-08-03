<?php

session_start();
$_SESSION = [];
session_unset();
session_destroy();

if (!isset($_SESSION['login'])) {
    header("Location: ../../index.php");
    exit;
} else {
    echo 'Gagal';
}
