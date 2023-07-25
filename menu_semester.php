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
        <div id="layoutSidenav">
           
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="col-md-12 row">
                        <h1 class="mt-4">Data Semsester</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Semsester</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <a href="tambah_semester.php" class="btn btn-primary btn-sm"> Tambah Semester</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Semester</th>
                                            <th>Status</th>
                                            <th>Ganti</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                            <th>Tahun</th>
                                            <th>Semester</th>
                                            <th>Status</th>
                                            <th>Ganti</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            include('koneksi.php');
                                            // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                            $no = 1;
                                            $select         = "select * from semester";
                                            $select         = mysqli_query($db, $select);
                                            while($data= mysqli_fetch_array($select)){
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['tahun']; ?></td>
                                            <td><?php echo $data['semester']; ?></td>
                                            <td><?php echo $data['status']==1? 'aktif': 'tidak aktif'; ?></td>
                                            <td>
                                                <a href="proses_status_semester.php?id_semester=<?php echo $data['id_semester']; ?>&status=<?php echo $data['status']; ?>" class="btn btn-outline btn-sm btn-info">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock-fill"
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z" />
                                                        <path fill-rule="evenodd"
                                                            d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z" />
                                                    </svg>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="edit_semester.php?id_semester=<?php echo $data['id_semester']; ?>" > Edit</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-sm" href="hapus_semester.php?id_semester=<?php echo $data['id_semester']; ?>" > Hapus</a>
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