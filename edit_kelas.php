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
                        <div class="card mb-4">
                            <h1 class="mt-4">Edit kelas</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="menu_kelas.php">Data Kelas</a></li>
                                <li class="breadcrumb-item active">Edit Kelas</li>
                            </ol>
                        </div>  
                            <div class="card mb-4">
                            <div class="card-body">
                                <?php
                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id']; // Mengambil ID pengguna dari URL

                                        $koneksi = mysqli_connect("localhost", "root", "", "jadwal");

                                        if (isset($_POST['submit'])) {
                                            $kelas = $_POST['kelas'];
                                            $id_semester = $_POST['id_semester'];

                                            mysqli_query($koneksi, "UPDATE kelas SET kelas='$kelas', id_semester='$id_semester' WHERE id_kelas='$id'") or die(mysqli_error($koneksi));

                                            echo "<script>alert('Data berhasil diupdate.');window.location='menu_kelas.php';</script>";
                                        }

                                        $query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id'");
                                        $data = mysqli_fetch_assoc($query);
                                    }
                                ?>

                                <form method="post" action="">
                                    <div class="card-body">
                                        <label for="exampleInputEmail1">Kelas</label>
                                        <input type="text" class="form-control" name="kelas" placeholder="Masukkan nama kelas" value="<?php echo $data['kelas']; ?>">
                                    </div>
                                    <div class="card-body">
                                        
                                        <label for="exampleInputEmail1">Tahun / Semester</label><br>
                                        <select name="id_semester" required id="" class="form-control">
                                            <option value="">--Pilih Semester--</option>
                                            <?php
                                                $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                                $semester = mysqli_query($koneksi, "SELECT * FROM semester");
                                                while ($semester_data = mysqli_fetch_array($semester)) {
                                                $selected = ($semester_data['id_semester'] == $data['id_semester']) ? 'selected' : '';
                                            ?>
                                            <option value="<?php echo $semester_data['id_semester']; ?>" <?php echo $selected; ?>><?php echo $semester_data['tahun'] . ' ' . $semester_data['semester']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary m-3">Update</button>

                                </form>
                            </div>
                        </div>   
                    </div>
                </main>

            </div>
        </div>
        
    </body>
</html>