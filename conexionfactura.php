<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facturas";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
?>