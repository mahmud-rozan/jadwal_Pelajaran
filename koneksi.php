<?php
$server         ="localhost";
$user           ="root";
$password       ="";
$nama_database  ="jadwal";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Database Unreachable" . mysqli_connect_error());
} //else echo "Terkoneksi";
?>