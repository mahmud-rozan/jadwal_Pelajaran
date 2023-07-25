<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $ruangan = $_POST['ruangan'];

    $insert =  mysqli_query($db, "insert into ruangan set ruangan='$ruangan' ");
    
    
    header('Location: menu_ruangan.php');
?>