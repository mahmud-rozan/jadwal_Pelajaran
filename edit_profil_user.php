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

<html lang="en">
<div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
        <div class="content">
                    <div class="col-md-12 row">
                            <h1 class="mt-4">Edit Account</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Account</li>
                            </ol>
                        </div>

                       <div class="card mb-4">
                           <div class="card-body">  
                                <?php
                                    $id = $_GET['id']; // Mengambil ID pengguna dari URL

                                    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");

                                    if (isset($_POST['submit'])) {
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];
                                        $name = $_POST['name'];

                                        mysqli_query($koneksi, "UPDATE users SET name='$name', username='$username', password='$password' WHERE id='$id'") or die(mysqli_error($koneksi));

                                        echo "<script>alert('Data berhasil diupdate.');window.location='index.php';</script>";
                                    }

                                    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
                                    $data = mysqli_fetch_assoc($query);

                                ?> 
                                <form method="post" action="">
                                    <div class="card-body">
                                        <label for="exampleInputEmail1">Nama </label><br>
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
                                    <br>
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                            </div>
                       </div>
                                </div>
                                </div>

                                </main>
                                </div>


