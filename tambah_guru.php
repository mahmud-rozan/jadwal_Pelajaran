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
                        <div class="card mb-4 mt-2">     
                        <h1 class="mt-4 m-2">Tambah Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item m-2"><a href="menu_guru.php">Guru</a></li>
                            <li class="breadcrumb-item active m-2">Tambah Guru</li>
                        </ol>
                        </div>
                        <div class="card mb-4">                        
                        <form method="post" action="proses_tambah_guru.php">
                            <div class="card-body">
                                <label for="exampleInputEmail1">Nama Guru</label><br>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Nama Guru" name="nama">
                            </div>
                            <div class="card-body">
                                <label for="exampleInputEmail1">Jenis Kelamin</label><br>
                                <select name="jk" id="" class="form-control" >
                                    <option value="laki-laki">laki-laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputEmail1">Alamat</label><br>
                                <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary m-3">Tambah</button>
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