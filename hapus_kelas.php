<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $id_kelas = $_GET['id_kelas'];

    mysqli_query($db, "delete from kelas where id_kelas='$id_kelas'");
    
    
    header('Location: menu_kelas.php');
?>