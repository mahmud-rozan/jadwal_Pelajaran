<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $id_pelajaran = $_GET['id_pelajaran'];

    mysqli_query($db, "delete from pelajaran where id_pelajaran='$id_pelajaran'");
    
    
    header('Location: menu_pelajaran.php');
?>