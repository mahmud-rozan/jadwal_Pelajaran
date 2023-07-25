<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    $ruangan = $_POST['ruangan'];
    $id_ruangan = $_POST['id_ruangan'];

    $insert =  mysqli_query($db, "update ruangan set ruangan='$ruangan' where id_ruangan = '$id_ruangan' ");
    
    
    header('Location: menu_ruangan.php');
?>