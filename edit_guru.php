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
                       <h1 class="m-2">Edit Guru</h1>
                       <ol class="breadcrumb m-2">
                           <li class="breadcrumb-item"><a href="menu_guru.php">Data Guru</a></li>
                           <li class="breadcrumb-item active">Edit Guru</li>
                       </ol>
                   </div>
                        <div class="card mb-4">
                            <div class="card-body">
                            
                            <?php
                                include('koneksi.php');
                                // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                $id_guru = $_GET['id_guru'];
                                $guru = mysqli_query($db, "select * from guru where id_guru='$id_guru'");
                                $guru = mysqli_fetch_array($guru);
                            ?>
                            <form method="post" action="proses_edit_guru.php">
                                <input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>">
                                <div class="card-body">
                                    <label for="exampleInputEmail1">Nama Guru</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Nama Guru" name="nama" value="<?php echo $guru['nama']; ?>">
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                                    <select name="jk" id="" class="form-control">
                                        <option <?php echo $guru['jk'] == 'laki-laki' ? 'selected':''; ?> value="laki-laki">laki-laki</option>
                                        <option <?php echo $guru['jk'] == 'perempuan' ? 'selected':''; ?> value="perempuan">perempuan</option>
                                    </select>
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputEmail1">Alamat</label>
                                    <textarea name="alamat" id="" cols="30" rows="5" class="form-control"><?php echo $guru['alamat']; ?></textarea>
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