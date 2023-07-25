<?php
   include('koneksi.php');
   // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $kelas = $_POST['kelas'];
    $id_semester = $_POST['id_semester'];

    $insert =  mysqli_query($db, "insert into kelas set kelas='$kelas', id_semester='$id_semester' ");
    
    
    header('Location: menu_kelas.php');
?>