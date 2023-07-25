<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $id_guru = $_GET['id_guru'];

    mysqli_query($db, "delete from guru where id_guru='$id_guru'");
    
    
    header('Location: menu_guru.php');
?>