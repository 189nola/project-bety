<?php
$host = 'localhost:3306';
$db_user = 'root';
$db_pass = '';
$db_name = 'food';

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

if (!$conn) {
  die("Koneksi database gagal: " . mysqli_connect_error());
}
?>