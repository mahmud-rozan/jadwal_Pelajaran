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
    
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
        <div class="content">
                        <h1 class="mt-4">Edit Pelajaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="menu_pelajaran.php">Data Pelajaran</a></li>
                            <li class="breadcrumb-item active">Edit Pelajaran</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php
                                include('koneksi.php');

                                // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                $id_pelajaran = $_GET['id_pelajaran'];
                                $pelajaran = mysqli_query($db, "select * from pelajaran where id_pelajaran='$id_pelajaran'");
                                $pelajaran = mysqli_fetch_array($pelajaran);
                            ?>
                        <form method="post" action="proses_edit_pelajaran.php">
                            <input type="hidden" name="id_pelajaran"  value="<?php echo $id_pelajaran; ?>">
                                <div class="card-body">
                                    <label for="exampleInputEmail1">Pelajaran</label><br>
                                    <input type="text" class="form-control" name="pelajaran" value="<?php echo $pelajaran['pelajaran']; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary m-3">Update</button>
                        </form>
                            </div>
                        </div>
                        
                    </div>
</div>
                </main>
            </div>
        </div>
        
    </body>
</html>