<?php
include ("app/connection.php");
$koneksi = new database;
$data = $koneksi->session_php();
echo $data;
?>