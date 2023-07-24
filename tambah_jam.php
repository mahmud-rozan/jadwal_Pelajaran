<?php 
session_start();
if(isset($_SESSION["username"])){
}else{
	echo header("location:login.php");
	
}

// include;

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
        <title>Tables - SB Admin</title>
        
    </head>
    <body>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
        <div class="content">
                    <div class="card mb-4 mt-2"> 
                        <h1 class="mt-4 m-2">Tambah jam</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item m-2"><a href="menu_jam.php">Data Jam</a></li>
                            <li class="breadcrumb-item active m-2" >Tambah jam</li>
                        </ol>
                    </div>
                    <div class="card mb-4">
                        <form method="post" action="proses_tambah_jam.php">
                            <div class="card-body">
                                <label for="exampleInputEmail1">Jam</label>
                                <input type="number" class="form-control" name="jam">
                            </div>
                            <div class="card-body">
                                <label for="exampleInputEmail1">Mulai</label>
                                <input type="time" class="form-control" name="mulai">
                            </div>
                            <div class="card-body">
                                <label for="exampleInputEmail1">akhir</label>
                                <input type="time" class="form-control" name="akhir">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary m-3">Tambah</button>
                        </form>
                    </div>
                </div>
                        
            </div>
        </div>
        
    </body>
</html>
