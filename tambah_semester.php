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
                   <div class="card mt-2 mb-4">
                       <h1 class="m-2">Tambah Semester</h1>
                       <ol class="breadcrumb m-2">
                           <li class="breadcrumb-item"><a href="menu_semester.php">Data Semester</a></li>
                           <li class="breadcrumb-item active">Tambah Semester</li>
                       </ol>
                   </div>
                   <form method="post" action="proses_tambah_semester.php">
                    <div class="card mb-4">
                        <div class="card-body">
                    <div class="card-body">
                        <label for="exampleInputEmail1">Tahun</label>
                        <input type="text" class="form-control" name="tahun"  placeholder="Masukan tahun ajaran">
                    </div>
				
                    <div class="card-body">
                        <label for="exampleInputEmail1">Semester</label>
                        <select name="semester" id="" class="form-control">
                            <option value="ganjil">ganjil</option>
                            <option value="genap">genap</option>
                        </select>
                    </div>
					<br>
                    <button type="submit" class="btn btn-primary m-3">Tambah</button>
                </form>
                
                            </div>
                        </div>
                        
                    </div>
                </main>
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
