<?php
// $server         ="localhost";
// $user           ="root";
// $password       ="";
// $nama_database  ="jadwal";

$server         ="localhost:3306";
$user           ="serverd4_mahmud";
$password       ="kangjr123";
$nama_database  ="serverd4_jadwal";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Database Unreachable" . mysqli_connect_error());
} //else echo "Terkoneksi";

?>