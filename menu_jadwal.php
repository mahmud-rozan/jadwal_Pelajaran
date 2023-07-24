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
                        <h1 class="mt-4">Jadwal Pelajaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Jadwal Pelajaran</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Lihat</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Lihat</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $koneksi = mysqli_connect("localhost", "root", "", "jadwal");
                                            $no = 1;
                                            $select         = "select * from kelas
                                                                join semester on semester.id_semester = kelas.id_semester
                                                                where semester.status = '1'
                                                            ";
                                            $select         = mysqli_query($koneksi, $select);
                                            while($data= mysqli_fetch_array($select)){
                                        ?>
                                        <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['kelas']; ?></td>
                                                <td>
                                                    <a class="btn btn-success btn-sm" href="detail_jadwal.php?id_kelas=<?php echo $data['id_kelas']; ?>"> Detail</a>
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
