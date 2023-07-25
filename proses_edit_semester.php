<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $tahun = $_POST['tahun'];
    $semester = $_POST['semester'];
    $id_semester = $_POST['id_semester'];

    $insert =  mysqli_query($db, "update semester set tahun='$tahun', semester='$semester' where id_semester='$id_semester' ");
    
    
    header('Location: menu_semester.php');
?>