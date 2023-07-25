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
                       <h1 class="mt-4 m-2">Edit User</h1>
                       <ol class="breadcrumb m-2">
                           <li class="breadcrumb-item"><a href="menu_user.php">Informasi User</a></li>
                           <li class="breadcrumb-item active">Edit User</li>
                       </ol>
                   </div>
                        <div class="card mb-4">
                            <div class="card-body">
                            <form action="" method="post" role="form" enctype="multipart/form-data" action="aksi_login.php" id="login-form">
                            <?php
                                $id = $_GET['id']; // Mengambil ID pengguna dari URL

                                include('koneksi.php');
                                // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");

                                if (isset($_POST['submit'])) {
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    $name = $_POST['name'];
                                    $level = $_POST['level'];

                                    mysqli_query($db, "UPDATE users SET name='$name', username='$username', password='$password', level='$level' WHERE id='$id'") or die(mysqli_error($koneksi));

                                    echo "<script>alert('Data berhasil diupdate.');window.location='menu_user.php';</script>";
                                }

                                $query = mysqli_query($db, "SELECT * FROM users WHERE id='$id'");
                                $data = mysqli_fetch_assoc($query);

                            ?> 
                            <form method="post" action="">
                                <div class="card-body">
                                    <label for="exampleInputEmail1">Nama </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Nama Pengguna" name="name" value="<?php echo $data['name']; ?>">
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputEmail1">Username</label><br>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Ganti username" name="username" value="<?php echo $data['username']; ?>">
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputEmail1">Password</label><br>
                                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Ganti password" name="password" value="<?php echo $data['password']; ?>">
                                </div>
                                <div class="card-body">
                                    <select class="form-select" name="level" id="level">
                                        <option value="-1">Pilih Role</option>
                                        <option value="0" <?php if ($data['level'] == 0) echo 'selected'; ?>>User</option>
                                        <option value="1" <?php if ($data['level'] == 1) echo 'selected'; ?>>Admin</option>
                                    </select>
                                </div>
                                <!-- <input hidden type="level" name="level" value="0" class="form-control"><br> -->
                                 <button type="submit" class="btn btn-primary m-3" name="submit" value="simpan">Update</button>

                            </form>
                       
                            </div>
                        </div>
                    </div>   
                    </div>
            </div>
        </div>
        
    </body>
</html>
