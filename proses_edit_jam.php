<?php
    include('koneksi.php');
    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
    echo $jam = $_POST['jam'];
    echo $mulai = $_POST['mulai'];
    echo $akhir = $_POST['akhir'];
    echo $id_jam = $_POST['id_jam'];

    mysqli_query($db, "update jam set jam='$jam', mulai='$mulai', akhir='$akhir' where id_jam='$id_jam' ");
    
    
    header('Location: menu_jam.php');
?>