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
<div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
        <div class="content"> 
                    <div class="col-md-12 row">
                        <h1 class="mt-4">Data Pelajaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Pelajaran</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <a href="tambah_pelajaran.php" class="btn btn-primary btn-sm"> Tambah Pelajaran</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelajaran</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelajaran</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            include('koneksi.php');
                                            // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                            $no = 1;
                                            $select         = "select * from pelajaran";
                                            $select         = mysqli_query($db, $select);
                                            while($data= mysqli_fetch_array($select)){
                                        ?>
                                        <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['pelajaran']; ?></td>
                                                <td>
                                                    <a class="btn btn-success btn-sm" href="edit_pelajaran.php?id_pelajaran=<?php echo $data['id_pelajaran']; ?>"> Edit</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger btn-sm" href="hapus_pelajaran.php?id_pelajaran=<?php echo $data['id_pelajaran']; ?>"> Hapus</a>
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
