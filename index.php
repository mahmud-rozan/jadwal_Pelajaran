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
        <div class="row text-white">
            <div class="col-xl-3 col-md-6">
            <div class="card bg-info mb-4">
                <div class="">JUMLAH PENGGUNA</div>
                <?php
                    require 'dbconfig.php';

                    $query = "SELECT id FROM users ORDER BY id";
                    $query_run = mysqli_query($connection, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<h1> '.$row.'</h1>';
                ?>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="menu_user.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning mb-4">
                <div class="">JUMLAH GURU</div>
                <?php
                    require 'dbconfig.php';

                    $query = "SELECT id_guru FROM guru ORDER BY id_guru";
                    $query_run = mysqli_query($connection, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<h1> '.$row.'</h1>';
                ?>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="menu_guru.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success mb-4">
                <div class="">JUMLAH PELAJARAN</div>
                <?php
                    require 'dbconfig.php';

                    $query = "SELECT id_pelajaran FROM pelajaran ORDER BY id_pelajaran";
                    $query_run = mysqli_query($connection, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<h1> '.$row.'</h1>';
                ?>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="menu_pelajaran.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger mb-4">
                <div class="">JUMLAH RUANGAN</div>
                <?php
                    require 'dbconfig.php';

                    $query = "SELECT id_ruangan FROM ruangan ORDER BY id_ruangan";
                    $query_run = mysqli_query($connection, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<h1> '.$row.'</h1>';
                ?>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="menu_ruangan.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
         
            
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
       

