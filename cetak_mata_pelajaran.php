<style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 110px;
            /* margin-left: 20px; */
        }

        .title {
            flex-grow: 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid black;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .button {
            margin-top: 20px;
            text-align: center;
        }

        .button button {
            padding: 10px 20px;
            background-color: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
    <?php
echo '<script>';
echo 'window.print();';
echo '</script>';
?>
<div id="main">
	<div class="content">
    <div class="header">
        <img class="logo" src="foto/kg.png" alt="Logo">
        <div class="title" style="text-align: center;">
            <h3>PEMERINTAHAN KOTA BANDUNG</h3>
            <h3>DINAS PENDIDIKAN</h3>
            <h2>SEKOLAH MENEGAH KEJURUAN NEGRI 5 BANDUNG</h2>
          <p>SMKN 5 BANDUNG Jl. Bojong Koneng No.37A, Sukapada, Kec. Cibeunying Kidul, Kota Bandung, Jawa Barat 40191</p> 
        </div>
    </div>
    <hr style="height: 3px;background-color: black;">
    <h2 style="text-align:center">Jadwal Mata Pelajaran SMKN 5 BANDUNG</h2>
		<!-- <h3 style="text-align:center">Data Jadwal Mata Pelajaran</h3> -->
        <?php                       
                        $koneksi        = mysqli_connect("localhost", "root", "", "jadwal");
                        $get_kelas_now  = mysqli_query($koneksi, "select * from kelas where id_kelas = ".$_GET['id_kelas']);
                        $kelas_now      = mysqli_fetch_array($get_kelas_now);
                        // echo $id_kelas; die; mematikan  
        ?>
                    <h3 class="card-title" style="text-align:center;"><?php echo 'Kelas '.$kelas_now['kelas']; ?></h3>
		<!-- <a href="cetak_mata_pelajaran.php" class="btn btn-danger" target="_blank">Print Data</a> -->
		<!-- <button class="print" onclick="PrintPreview()">Print Preview</button><br> -->
        
        <!-- kondisi -->
        <!-- <?php

        include "koneksi.php";
        $id = $_GET['id_kelas'];
        $sql = mysqli_query($koneksi, "select * from kelas where id_kelas = ".$_GET['id_kelas']);
        
        // $sql = mysqli_query($koneksi, "select max(id_jadwal as maxID from jadwal)");
        $data = mysqli_fetch_array($sql);

        $kode = $data['id_kelas'];

        $kode++;
        $ket = date("Ymd");
        $kodeauto = $ket . sprintf("%03s", $kode);

        echo $kodeauto;

        ?> -->
		
        
        <div class="col-lg-9">
           
            
                
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

                                $get_jam         = mysqli_query($koneksi, "select * from jam");
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
                                    <!-- <form action="proses.php" method="post" id="form_id_<?php echo $j.'_'.$data_jam['id_jam']; ?>"> -->
                                    <form action="">
                                        <input type="hidden" name="id_kelas" value="<?php echo $_GET['id_kelas']; ?>">
                                        <input type="hidden" name="hari" value="<?php echo $hari; ?>">
                                        <input type="hidden" name="id_jam" value="<?php echo $data_jam['id_jam']; ?>">
                                        <?php

                                                $id_kelas = $_GET['id_kelas'];
                                                $id_jam = $data_jam['id_jam'];

                                                // echo $hari;

                                                //tampilkan data jadwal sekarang
                                                $get_jadwal         = mysqli_query($koneksi, 
                                                                        "select * from jadwal 
                                                                        join pelajaran on pelajaran.id_pelajaran = jadwal.id_pelajaran
                                                                        where id_jam='$id_jam' && id_kelas='$id_kelas' && hari='$hari'
                                                                        ");
                                                $data_jadwal         = mysqli_fetch_array($get_jadwal);

                                        ?>
                                        <div class="input-group">
                                        <input type="hidden" name="id_jadwal" value="<?php echo $data_jadwal['id_jadwal']; ?>">
                                        <select disabled  style="border:none;color:black;background-color:white" name="id_pelajaran" style="width: 150px; class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $data_jadwal['pelajaran']; ?>"
                                            onChange="document.getElementById('form_id_<?php echo $j.'_'.$data_jam['id_jam']; ?>').submit();" >
                                            <option value="">--Pilih Mata Kuliah--</option>
                                            <?php

                                                //tampilkan data mata pelajaran
                                                $get_pelajaran         = mysqli_query($koneksi, "select * from pelajaran");
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
                                    <!-- <form action="proses.php" method="post" id="form_id1_<?php echo $j.'_'.$data_jam['id_jam']; ?>"> -->
                                    <form action="">
                                        <input type="hidden" name="id_kelas" value="<?php echo $_GET['id_kelas']; ?>">
                                        <input type="hidden" name="hari" value="<?php echo $hari; ?>">
                                        <input type="hidden" name="id_jam" value="<?php echo $data_jam['id_jam']; ?>">
                                        <input type="hidden" name="id_jadwal" value="<?php echo $data_jadwal['id_jadwal']; ?>">
                                        <?php

                                                $id_kelas = $_GET['id_kelas'];
                                                $id_jam = $data_jam['id_jam'];

                                                // echo $hari;

                                                //tampilkan data ruangan sekarang
                                                $get_jadwal         = mysqli_query($koneksi, 
                                                                        "select * from jadwal 
                                                                        join ruangan on ruangan.id_ruangan = jadwal.id_ruangan
                                                                        where id_jam='$id_jam' && id_kelas='$id_kelas' && hari='$hari'
                                                                        ");
                                                                                        
                                                $data_jadwal         = mysqli_fetch_array($get_jadwal);
                                                // $id_kelas; die;    

                                                // var_dump($data_jadwal); die;
                                        ?>
                                        
                                        <div class="input-group">
                                        <select disabled  style="border:none;color:black;background-color:white" name="id_ruangan" style="width: 150px; class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $data_jadwal['ruangan']; ?>"
                                            onChange="document.getElementById('form_id1_<?php echo $j.'_'.$data_jam['id_jam']; ?>').submit();">
                                            <option value="">--Pilih Ruangan--</option>
                                            <?php

                                                //tampilkan data ruangan
                                                $get_ruangan        = mysqli_query($koneksi, "select * from ruangan");
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

                                    <!-- <form action="proses.php" method="post" id="form_id2_<?php echo $j.'_'.$data_jam['id_jam']; ?>"> -->
                                    <form action="">
                                        <?php
   

                                            $id_kelas = $_GET['id_kelas'];
                                            $id_jam = $data_jam['id_jam'];

                                            //tampilkan data id_jadwal
                                            $get_id_jadwal         = mysqli_query($koneksi, 
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
                                            $get_guru_tooltip         = mysqli_query($koneksi, 
                                            "select * from guru where id_guru = ".$id_jadwal['id_guru']);
                                            $guru_tooltip             = mysqli_fetch_array($get_guru_tooltip);
                                        ?>
                                        <div class="input-group">
                                        <select disabled  style="border:none;color:black;background-color:white" name="id_guru" style="width: 150px; class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $guru_tooltip['nama']; ?>"
                                            onChange="document.getElementById('form_id2_<?php echo $j.'_'.$data_jam['id_jam']; ?>').submit();">
                                            <option value="">--Pilih Guru--</option>
                                            <?php
                                                //tampilkan data guru
                                                $get_guru         = mysqli_query($koneksi, "select * from guru");
                                                while($data_guru= mysqli_fetch_array($get_guru)){
                                            ?>
                                            <option  <?php if($id_jadwal['id_guru'] == $data_guru['id_guru']){ echo "selected"; } ?> value="<?php echo $data_guru['id_guru']; ?>">
                                                <?php echo $data_guru['nama']; ?> 
                                            </option>
                                            <?php } ?>


                                            
                                        </select>
                                        <div>
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
    
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>      -->
						
		</div>
	</div>