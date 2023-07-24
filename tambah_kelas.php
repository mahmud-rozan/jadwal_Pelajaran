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
                        <h1 class="mt-4">Tambah Kelas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="menu_kelas.php">Data Kelas</a></li>
                            <li class="breadcrumb-item active">Tambah Kelas</li>
                        </ol>
                    </div>
                    <div class="card mb-4">
                        <form method="post" action="proses_tambah_kelas.php">
                            <div class="card-body"">
                                <label for="exampleInputEmail1">Kelas</label>
                                <input type="text" class="form-control" name="kelas" placeholder="Masukan nama kelas">
                            </div>
                            <div class="card-body"">
                                
                                <label for="exampleInputEmail1">Tahun / Semester</label>
                                <select name="id_semester" id="" class="form-control">
                                    <option value="">--Pilih Semester--</option>
                                    <?php 
                                        $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                        $semester         = mysqli_query($koneksi, "select * from semester");
                                        while($data= mysqli_fetch_array($semester)){
                                    ?>
                                    <option value="<?php echo $data['id_semester']; ?>"><?php echo $data['tahun'].' '.$data['semester']; ?></option>
                                    <?php } ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>                    
                    </div>
                    </div>
                        
                    </div>

            </div>
        </div>
        
    </body>
</html>