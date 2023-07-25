<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $tahun = $_POST['tahun'];
    $semester = $_POST['semester'];
    $status = 0;

    $insert =  mysqli_query($db, "insert into semester set tahun='$tahun', semester='$semester', status='$status'");
    
    
    header('Location: menu_semester.php');
?>