<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_kuisioner";

$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
