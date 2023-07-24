<?php 
session_start();
if(isset($_SESSION["username"])){
}else{
	echo header("location:login.php");
	
}

// include('template/top.php');

$level = $_SESSION['level'];
if($level == 1) { include "template/navigasi_admin.php"; }
if($level == 0) { include "template/navigasi_user.php"; }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4 mt-4">
        <div class="content">

        <div class="card mb-4">
            <div class="card-body">
                
                <div id="profile">
                    <center>
                        <h1>Selamat Datang Di Website Jadwal Mata Pelajaran</h1>
                        <marquee  padding:5px; color: #fff;>SMKN 5 BANDUNG Jl. Bojong Koneng No.37A, Sukapada, Kec. Cibeunying Kidul, Kota Bandung, Jawa Barat 40191</marquee>
                        <hr/>
                        <?php 
                            $nama     = $_SESSION['nama'];
                            $username = $_SESSION['username'];

                            echo "Selamat Datang $nama $username ";
                        ?>
                        <hr/>
                    </center>
                </div>
                <ol class="breadcrumb mb-4">
                 <li class="breadcrumb-item active">Dashboard</li>
                </ol>
        
         
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="assets/demo/chart-area-demo.js"></script>
            <script src="assets/demo/chart-bar-demo.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
            <script src="js/datatables-simple-demo.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
        </body>
    </html>
       

