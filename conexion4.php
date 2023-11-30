<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_exportar";
// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);
// establecer el juego de caracteres utf8
mysqli_set_charset($conn,"utf8mb4");
// Chequear conexión
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}
?>