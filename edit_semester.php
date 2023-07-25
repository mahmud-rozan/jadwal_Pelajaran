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
                   <div class="card mt-2 mb-4">
                       <h1 class="m-2">Edit Semester</h1>
                       <ol class="breadcrumb m-2">
                           <li class="breadcrumb-item"><a href="menu_semester.php">Data Semester</a></li>
                           <li class="breadcrumb-item active">Edit Semester</li>
                       </ol>
                   </div>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php
                                 include('koneksi.php');

                                // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                $id_semester = $_GET['id_semester'];
                                $semester = mysqli_query($db, "select * from semester where id_semester='$id_semester'");
                                $semester = mysqli_fetch_array($semester);
                            ?>
                            <form method="post" action="proses_edit_semester.php">
                                <input type="hidden" name="id_semester" value="<?php echo $id_semester; ?>">
                                <div class="card-body">
                                    <label for="exampleInputEmail1">Tahun</label>
                                    <input type="text" class="form-control" name="tahun" value="<?php echo $semester['tahun']; ?>">
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputEmail1">Semester</label>
                                    <select name="semester" id="" class="form-control">
                                        <option <?php echo $semester['semester'] == 'ganjil' ? 'selected' : ''; ?> value="ganjil">ganjil</option>
                                        <option <?php echo $semester['semester'] == 'genap' ? 'selected' : ''; ?> value="genap">genap</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary m-3">update</button>
                            </form>
                           
                            </div>
                        </div>
                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
    </body>
</html>
<?php 
    // include('navigasi_admin.php');
    if(!isset($_SESSION)){
        session_start();
    }
    if (empty($_SESSION['username'])) {
        header('Location:login.php');
    }
?>
