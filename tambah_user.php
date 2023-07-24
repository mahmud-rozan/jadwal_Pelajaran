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
                    <div class="card mb-4 mt-3" >
                        <h1 class="mt-4 m-2">Tambah User</h1>
                        <ol class="breadcrumb m-2">
                            <li class="breadcrumb-item"><a href="menu_user.php">Informasi User</a></li>
                            <li class="breadcrumb-item active">Tambah User</li>
                        </ol>
                    </div>
                    <div class="card mb-4">
                            <div class="card-body">
                            <form action="" method="post" role="form" enctype="multipart/form-data" action="aksi_login.php" id="login-form">
                                <div class="card-body">
                                    <label>Nama</label><br>
                                    <input type="text" name="name" required="" class="form-control" placeholder="Nama">
                                </div>
                                <div class="card-body">
                                    <label>Username</label><br>
                                    <input type="text" name="username" required="" class="form-control" placeholder="Username">
                                </div>
                                <div class="card-body">
                                    <label>Password</label><br>
                                    <input type="password" name="password" required="" class="form-control" value="" placeholder="Password">
                                </div>	
                                <input hidden type="level" name="level" value="0" class="form-control"><br>
                                 <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
                            </form>
                            <?php
                                include('koneksi.php');
                                $msg = "";
                                //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                                if (isset($_POST['submit'])) {
                                    //menampung data dari inputan
                                    
                                    $name = $_POST['name'];
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    $level = $_POST['level'];
                                    extract($_POST);
                    
                                    $datas = mysqli_query($db, "insert into users (name,username,password,level)values('$name', '$username', '$password', '$level')") or die(mysqli_error($db));
                                    echo "<script>alert('data berhasil disimpan.');window.location='menu_user.php';</script>";
                                }
                            ?>
                            </div>
                        </div>
                        
                    </div>

            </div>
        </div>
        
    </body>
</html>

