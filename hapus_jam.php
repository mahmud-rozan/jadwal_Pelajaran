<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $id_jam = $_GET['id_jam'];

    mysqli_query($db, "delete from jam where id_jam='$id_jam'");
    
    
    header('Location: menu_jam.php');
?>