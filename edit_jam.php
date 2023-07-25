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
                        <h1 class="mt-4 m-2">Edit jam</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item m-2"><a href="menu_jam.php">Data Jam</a></li>
                            <li class="breadcrumb-item active m-2" >Edit jam</li>
                        </ol>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <?php
                                    include('koneksi.php');
                                    // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                    $id_jam = $_GET['id_jam'];
                                    $jam = mysqli_query($db, "select * from jam where id_jam='$id_jam'");
                                    $jam = mysqli_fetch_array($jam);
                                ?>
                                <form method="post" action="proses_edit_jam.php">
                                    <input type="hidden" name="id_jam" value="<?php echo $id_jam; ?>">
                                    <div class="card-body">
                                        <label for="exampleInputEmail1">Jam</label><br>
                                        <input type="number" class="form-control" name="jam" value="<?php echo $jam['jam']; ?>">
                                    </div>
                                    <div class="card-body">
                                        <label for="exampleInputEmail1">Mulai</label><br>
                                        <input type="time" class="form-control" name="mulai"  value="<?php echo $jam['mulai']; ?>">
                                    </div>
                                    <div class="card-body">
                                        <label for="exampleInputEmail1">Akhir</label><br>
                                        <input type="time" class="form-control" name="akhir"  value="<?php echo $jam['akhir']; ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary m-3">Update</button>
                                </form>
                            </div>
                        
                    </div>
            </div>
        </div>
        
    </body>
</html>