<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $kelas = $_POST['kelas'];
    $semester = $_POST['semester'];
    $id_semester = $_POST['id_semester'];

    $insert =  mysqli_query($db, "update semester set kelas='$kelas', semester='$semester' where id_semester='$id_semester' ");
    
    
    header('Location: menu_kelas.php');         
?>