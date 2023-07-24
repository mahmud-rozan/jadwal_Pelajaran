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
                    <div class="col-md-12 row">
                        <h1 class="mt-4">Tambah Kelas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tambah Kelas</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <a href="tambah_kelas.php" class="btn btn-primary btn-sm"> Tambah Kelas</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Tahun/Semester</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Tahun/Semester</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                            $no = 1;
                                            $select         = "select * from kelas join semester on semester.id_semester = kelas.id_semester";
                                            $select         = mysqli_query($koneksi, $select);
                                            while($data= mysqli_fetch_array($select)){
                                        ?>
                                        <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['kelas']; ?></td>
                                                <td><?php echo $data['tahun'].' '.$data['semester']; ?></td>
                                                <td>
                                                    <a class="btn btn-success btn-sm" href="edit_kelas.php?id=<?= $data['id_kelas']; ?>"> Edit</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger btn-sm" href="hapus_kelas.php?id_kelas=<?php echo $data['id_kelas']; ?>"> Hapus</a>
                                                </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </body>
</html>