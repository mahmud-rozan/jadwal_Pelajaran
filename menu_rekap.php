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
                        <h1 class="mt-4">Rekap Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Rekap Guru</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                         <!-- tambah table jam, pelajaran, ruangan -->
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Guru</th>
                                            <th>Jam</th> 
                                            <th>Hari</th> 
                                            <th>Pelajaran</th>
                                            <th>Ruangan</th> 
                                            <th>kelas</th>                                            
                                        </tr>
                                    </thead>                                   
                                    <tbody>
                                        <?php
                                            $host = 'localhost';
                                            $username = 'root';
                                            $password = '';
                                            $database = 'jadwal';
                                            $conn = mysqli_connect($host, $username, $password, $database);
                                            $no = 1;
                                            $query = "SELECT *
                                            FROM jadwal
                                            LEFT JOIN guru ON jadwal.id_guru = guru.id_guru
                                            LEFT JOIN kelas ON jadwal.id_kelas = kelas.id_kelas
                                            LEFT JOIN jam ON jadwal.id_jam = jam.id_jam
                                            LEFT JOIN ruangan ON jadwal.id_ruangan = ruangan.id_ruangan
                                            LEFT JOIN pelajaran ON jadwal.id_pelajaran = pelajaran.id_pelajaran";

                                                        $result = mysqli_query($conn, $query);

                                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>    
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo $row['jam']; ?></td>
                                            <td><?php echo $row['hari']; ?></td>
                                            <td><?php echo $row['pelajaran']; ?></td>
                                            <td><?php echo $row['ruangan']; ?></td>
                                            <td><a href="detail_jadwal.php?id_kelas=<?php echo $row['id_kelas']; ?>"><?php echo $row['kelas']; ?></a></td> 
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
</html>