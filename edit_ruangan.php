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
                    <div class="col-md-12 row">
                        <h1 class="mt-4">Edit Ruangan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="menu_ruangan.php">Data Ruangan</a></li>
                            <li class="breadcrumb-item active">Edit Ruangan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php
                                 include('koneksi.php');

                                // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                $id_ruangan = $_GET['id_ruang']; 

                                $ruangan = mysqli_query($db, "SELECT * FROM ruangan WHERE id_ruangan='$id_ruangan'");
                                $ruangan = mysqli_fetch_array($ruangan);
                            ?>    
                            <form method="post" action="proses_edit_ruangan.php">
                                <input type="hidden" name="id_ruangan" value="<?php echo $ruangan['id_ruangan']; ?>">
                                <div class="card-body">
                                    <label for="exampleInputEmail1">Ruangan</label><br>
                                    <input type="text" class="form-control" name="ruangan" value="<?php echo $ruangan['ruangan']; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary m-3">Update</button>
                            </form>

                            <?php
                            if (isset($_POST['submit'])) {
                                $id_ruangan = $_POST['id_ruangan'];
                                $ruangan = $_POST['ruangan'];

                                mysqli_query($db, "UPDATE ruangan SET ruangan='$ruangan' WHERE id_ruangan='$id_ruangan'") or die(mysqli_error($koneksi));

                                echo "<script>alert('Data berhasil diupdate.');window.location='admin_ruangan.php';</script>";
                            }
                            ?>
                            </div>
                        </div>
                        
                    </div>
                
            </div>
        </div>
        
    </body>
</html>