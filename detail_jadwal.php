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
                            <li class="breadcrumb-item"><a href="menu_jadwal.php">Jadwal</a></li>
                            <li class="breadcrumb-item active">Jadwal Pelajaran</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php
                                include('koneksi.php');
                                // $koneksi        = mysqli_connect("localhost", "root", "", "jadwal");
                                $get_kelas_now  = mysqli_query($db, "select * from kelas where id_kelas = ".$_GET['id_kelas']);
                                $kelas_now      = mysqli_fetch_array($get_kelas_now);
                                // echo $id_kelas; die; mematikan  
                            ?>
                        <h2 class="card-title"><?php echo 'Kelas '.$kelas_now['kelas']; ?></h2>
                            <a href="cetak_mata_pelajaran.php?id_kelas=<?php echo $kelas_now['id_kelas']; ?>" class="print btn btn-danger" target="_blank">Print Data</a>
                            <a href="cetak_mata_pelajaran_preview.php?id_kelas=<?php echo $kelas_now['id_kelas']; ?>" class="print btn btn-danger" >Print Preview</a>
		                <!-- <button class="print" onclick="PrintPreview()">Print Preview</button><br> -->
                        <br>
                        <!-- kondisi -->
                        <?php
                            include "koneksi.php";
                            $id = $_GET['id_kelas'];
                            $sql = mysqli_query($db, "select * from kelas where id_kelas = ".$_GET['id_kelas']);
                            
                            // $sql = mysqli_query($koneksi, "select max(id_jadwal as maxID from jadwal)");
                            $data = mysqli_fetch_array($sql);
                            $kode = $data['id_kelas'];

                            $kode++;
                            $ket = date("Ymd");
                            $kodeauto = $ket . sprintf("%03s", $kode);

                            echo $kodeauto;
                        ?>
                    </div>    
                    </div>
                </div>  
                
                <div class="card mb-4">
                    <div class="card-body">
                <br>
                
                    <?php
                        @session_start();
                        if(@$_SESSION['gagal']){
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Kesalahan! </strong><?php echo $_SESSION['gagal']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php 
                    unset($_SESSION['gagal']);
                } 
                    
                ?>
                <div>
                    <div class="table-responsive">
                        <table class="table table-striped text-center" style="overflow:scroll;">
                            <thead>
                                <tr>
                                    <th>Jam</th>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jumat</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $get_jam         = mysqli_query($db, "select * from jam");
                                    while($data_jam= mysqli_fetch_array($get_jam)){
                                ?>
                                <tr>
                                    <td><?php echo $data_jam['mulai'].'-'.$data_jam['akhir']; ?></td>
                                    <?php for($j=1; $j<=5; $j++){ ?>
                                    <?php 
                                        $hari = '';
                                        if($j==1){
                                            $hari = "senin";
                                        }elseif($j==2){
                                            $hari = "selasa";
                                        }elseif($j==3){
                                            $hari = "rabu";
                                        }elseif($j==4){
                                            $hari = "kamis";
                                        }elseif($j==5){
                                            $hari = "jumat";
                                        }
                                        ?>
                                    <td>
                                        <form action="proses.php" method="post" id="form_id_<?php echo $j.'_'.$data_jam['id_jam']; ?>">
                                            <input type="hidden" name="id_kelas" value="<?php echo $_GET['id_kelas']; ?>">
                                            <input type="hidden" name="hari" value="<?php echo $hari; ?>">
                                            <input type="hidden" name="id_jam" value="<?php echo $data_jam['id_jam']; ?>">
                                            <?php

                                                    $id_kelas = $_GET['id_kelas'];
                                                    $id_jam = $data_jam['id_jam'];

                                                    // echo $hari;

                                                    //tampilkan data jadwal sekarang
                                                    $get_jadwal         = mysqli_query($db, 
                                                                            "select * from jadwal 
                                                                            join pelajaran on pelajaran.id_pelajaran = jadwal.id_pelajaran
                                                                            where id_jam='$id_jam' && id_kelas='$id_kelas' && hari='$hari'
                                                                            ");
                                                    $data_jadwal         = mysqli_fetch_array($get_jadwal);

                                            ?>
                                            <div class="">
                                            <input type="hidden" name="id_jadwal" value="<?php echo $data_jadwal['id_jadwal']; ?>">
                                            <select name="id_pelajaran" style="width: 150px; class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $data_jadwal['pelajaran']; ?>"
                                                onChange="document.getElementById('form_id_<?php echo $j.'_'.$data_jam['id_jam']; ?>').submit();" >
                                                <option value="">--Pilih Mata Kuliah--</option>
                                                <?php

                                                    //tampilkan data mata pelajaran
                                                    $get_pelajaran         = mysqli_query($db, "select * from pelajaran");
                                                    while($data_pelajaran= mysqli_fetch_array($get_pelajaran)){
                                                ?>
                                                
                                                <option
                                                    <?php if($data_jadwal['id_pelajaran'] == $data_pelajaran['id_pelajaran']){ echo "selected"; } ?>
                                                    value="<?php echo $data_pelajaran['id_pelajaran']; ?>">
                                                    <?php echo $data_pelajaran['pelajaran']; ?></option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                        </form>

                                        <!-- ruangan -->
                                        <form action="proses.php" method="post" id="form_id1_<?php echo $j.'_'.$data_jam['id_jam']; ?>">
                                            <input type="hidden" name="id_kelas" value="<?php echo $_GET['id_kelas']; ?>">
                                            <input type="hidden" name="hari" value="<?php echo $hari; ?>">
                                            <input type="hidden" name="id_jam" value="<?php echo $data_jam['id_jam']; ?>">
                                            <input type="hidden" name="id_jadwal" value="<?php echo $data_jadwal['id_jadwal']; ?>">
                                            <?php

                                                    $id_kelas = $_GET['id_kelas'];
                                                    $id_jam = $data_jam['id_jam'];

                                                    // echo $hari;

                                                    //tampilkan data ruangan sekarang
                                                    $get_jadwal         = mysqli_query($db, 
                                                                            "select * from jadwal 
                                                                            join ruangan on ruangan.id_ruangan = jadwal.id_ruangan
                                                                            where id_jam='$id_jam' && id_kelas='$id_kelas' && hari='$hari'
                                                                            ");
                                                                                            
                                                    $data_jadwal         = mysqli_fetch_array($get_jadwal);
                                                    // $id_kelas; die;    

                                                    // var_dump($data_jadwal); die;
                                            ?>
                                            
                                            <div class="">
                                            <select name="id_ruangan"  style="width: 150px; class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $data_jadwal['ruangan']; ?>"
                                                onChange="document.getElementById('form_id1_<?php echo $j.'_'.$data_jam['id_jam']; ?>').submit();">
                                                <option value="">--Pilih Ruangan--</option>
                                                <?php

                                                    //tampilkan data ruangan
                                                    $get_ruangan        = mysqli_query($db, "select * from ruangan");
                                                    while($data_ruangan= mysqli_fetch_array($get_ruangan)){
                                                ?>
                                                <option
                                                    <?php if($data_jadwal['id_ruangan'] == $data_ruangan['id_ruangan']){ echo "selected"; } ?>
                                                    value="<?php echo $data_ruangan['id_ruangan']; ?>">
                                                    <?php echo $data_ruangan['ruangan']; ?></option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                            <!-- <?php var_dump($data_jadwal); ?> -->
                                        </form>

                                        <form action="proses.php" method="post" id="form_id2_<?php echo $j.'_'.$data_jam['id_jam']; ?>">
                                            <?php
    

                                                $id_kelas = $_GET['id_kelas'];
                                                $id_jam = $data_jam['id_jam'];

                                                //tampilkan data id_jadwal
                                                $get_id_jadwal         = mysqli_query($db, 
                                                                        "select * from jadwal 
                                                                        where id_jam='$id_jam' && id_kelas='$id_kelas' && hari='$hari' 
                                                                        ");
                                                $id_jadwal             = mysqli_fetch_array($get_id_jadwal);
                                            ?>
                                            <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal['id_jadwal']; ?>">
                                            <input type="hidden" name="id_jam" value="<?php echo $id_jam; ?>">
                                            <input type="hidden" name="hari" value="<?php echo $hari; ?>">
                                            <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
                                        
                                            <?php
                                                error_reporting(0);
                                                //guru tooltip
                                                $get_guru_tooltip         = mysqli_query($db, 
                                                "select * from guru where id_guru = ".$id_jadwal['id_guru']);
                                                $guru_tooltip             = mysqli_fetch_array($get_guru_tooltip);
                                            ?>
                                            <div class="">
                                            <select name="id_guru" style="width: 150px; class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $guru_tooltip['nama']; ?>"
                                                onChange="document.getElementById('form_id2_<?php echo $j.'_'.$data_jam['id_jam']; ?>').submit();">
                                                <option value="">--Pilih Guru--</option>
                                                <?php
                                                    //tampilkan data guru
                                                    $get_guru         = mysqli_query($db, "select * from guru");
                                                    while($data_guru= mysqli_fetch_array($get_guru)){
                                                ?>
                                                <option  <?php if($id_jadwal['id_guru'] == $data_guru['id_guru']){ echo "selected"; } ?> value="<?php echo $data_guru['id_guru']; ?>">
                                                    <?php echo $data_guru['nama']; ?> 
                                                </option>
                                                <?php } ?>   
                                            </select>   
                                        </form>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>