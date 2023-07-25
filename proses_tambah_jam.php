<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $jam = $_POST['jam'];
    $mulai = $_POST['mulai'];
    $akhir = $_POST['akhir'];

    $insert =  mysqli_query($db, "insert into jam set jam='$jam', mulai='$mulai', akhir='$akhir'");
    
    
    header('Location: menu_jam.php');
?>