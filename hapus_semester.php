<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $id_semester = $_GET['id_semester'];

    mysqli_query($db, "delete from semester where id_semester='$id_semester'");
    
    
    header('Location: menu_semester.php');
?>