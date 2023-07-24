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
                        <h1 class="mt-4">Data User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data User</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body" >
                            <a href="tambah_user.php" class="btn btn-primary btn-sm"> Tambah User</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            
                                            <th>Level</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            
                                            <th>Level</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        //untuk meinclude kan koneksi
                                        include('koneksi.php');
                                        $no = 1;
                                            //jika kita klik cari, maka yang tampil query cari ini
                                            if(isset($_GET['kata_cari'])) {
                                                //menampung variabel kata_cari dari form pencarian
                                                $kata_cari = $_GET['kata_cari'];

                                                //jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
                                                //jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
                                                $query = "SELECT * FROM users WHERE username like '%".$kata_cari."%' OR name like '%".$kata_cari."%' OR id like '%".$kata_cari."%' ORDER BY id ASC";
                                            } else {
                                                //jika tidak ada pencarian, default yang dijalankan query ini
                                                $query = "SELECT * FROM users ORDER BY id ASC";
                                            }
                                            

                                            $result = mysqli_query($db, $query);

                                            if(!$result) {
                                                die("Query Error : ".mysqli_errno($db)." - ".mysqli_error($db));
                                            }
                                            //kalau ini melakukan foreach atau perulangan
                                            while ($row = mysqli_fetch_assoc($result)) { 
                                            ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['username']; //untuk menampilkan nama ?></td>

                                                <td><?= $row['level']; ?></td>
                                                <td>
                                                <div class="col">
                                                    <a class="btn btn-success btn-sm" href="edit_user.php? id=<?= $row['id']; ?>" >Edit</a>    
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger btn-sm" href="hapus_user.php?id=<?= $row['id']; ?>"  onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
                                                </td>
                                                <?php $no++; } ?>                
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </footer>
            </div>
        </div>
        
    </body>
</html>
