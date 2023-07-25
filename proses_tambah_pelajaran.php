<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $pelajaran = $_POST['pelajaran'];

    $insert =  mysqli_query($db, "insert into pelajaran set pelajaran='$pelajaran' ");
    
    
    header('Location: menu_pelajaran.php');
?>