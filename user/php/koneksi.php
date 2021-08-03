<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_survey";

$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
