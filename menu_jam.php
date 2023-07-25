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
                        <h1 class="mt-4">Data Jam</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Jam</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <a href="tambah_jam.php" class="btn btn-primary btn-sm"> Tambah Jam</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jam</th>
                                            <th>Mulai</th>
                                            <th>Akhir</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Jam</th>
                                            <th>Mulai</th>
                                            <th>Akhir</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            include('koneksi.php');
                                            // $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                            $no = 1;
                                            $select         = "select * from jam";
                                            $select         = mysqli_query($db, $select);
                                            while($data= mysqli_fetch_array($select)){
                                        ?>
                                        <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['jam']; ?></td>
                                                <td><?php echo $data['mulai']; ?></td>
                                                <td><?php echo $data['akhir']; ?></td>
                                                <td>
                                                    <a class="btn btn-success btn-sm" href="edit_jam.php?id_jam=<?php echo $data['id_jam']; ?>"> Edit</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger btn-sm" href="hapus_jam.php?id_jam=<?php echo $data['id_jam']; ?>"> Hapus</a>
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
