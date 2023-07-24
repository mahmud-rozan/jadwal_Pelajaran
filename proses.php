<?php
    
    // error_reporting(0);
    session_start();

    $koneksi = mysqli_connect("localhost", "root", "", "jadwal");

    $id_jadwal      = $_POST['id_jadwal'];
    $id_guru        = @$_POST['id_guru'];
    $id_kelas       = $_POST['id_kelas'];
    $id_jam         = $_POST['id_jam'];
    $id_pelajaran   = @$_POST['id_pelajaran'];
    $id_ruangan     = @$_POST['id_ruangan'];
    $hari           = $_POST['hari'];


    //mengecek pelajaran dan proses insert
    if(!empty($id_pelajaran)){

        if($id_jadwal){

            mysqli_query($koneksi, "update jadwal set 
                id_pelajaran='$id_pelajaran'
                where id_jadwal='$id_jadwal'
            ");
            
        }else{

            mysqli_query($koneksi, "insert into jadwal set 
                id_pelajaran='$id_pelajaran', 
                id_jam='$id_jam', 
                hari='$hari', 
                id_kelas='$id_kelas' 
            ");

        }
    }

    //mengecek ruangan dan proses insert
    if(!empty($id_ruangan)){


        $select         = "SELECT kelas.kelas, semester.tahun, semester.semester FROM jadwal 
                            JOIN kelas on kelas.id_kelas = jadwal.id_kelas
                            JOIN semester on semester.id_semester = kelas.id_semester
                            WHERE id_ruangan='$id_ruangan' && id_jam='$id_jam' && hari='$hari' && semester.status='1'
                            ";
        $select         = mysqli_query($koneksi, $select);
        $select         = mysqli_fetch_array($select);


        //cek apakah ruangan dipakai atau tidak
        if($select != null){
            
            $_SESSION["gagal"] = 'Ruangan Sudah Digunakan di Kelas '.$select['kelas'].' '.$select['tahun'].' '.$select['semester'];

        }else{


            if($id_jadwal){
    
                mysqli_query($koneksi, "update jadwal set 
                    id_ruangan='$id_ruangan'
                    where id_jadwal='$id_jadwal'
                ");
    
            }else{
    
                mysqli_query($koneksi, "insert into jadwal set 
                    id_ruangan='$id_ruangan', 
                    id_jam='$id_jam', 
                    hari='$hari', 
                    id_kelas='$id_kelas' 
                ");
    
            }
        }

    }

    //mengecek guru dan proses insert
    if(!empty($id_guru)){


        $select         = "SELECT kelas.kelas, semester.tahun, semester.semester FROM jadwal 
                            JOIN kelas on kelas.id_kelas = jadwal.id_kelas
                            JOIN semester on semester.id_semester = kelas.id_semester
                            WHERE id_guru='$id_guru' && id_jam='$id_jam' && hari='$hari' && semester.status='1'
                            ";
        $select         = mysqli_query($koneksi, $select);
        $select         = mysqli_fetch_array($select);


        //cek apakah ruangan dipakai atau tidak
        if($select != null){
            
            $_SESSION["gagal"] = 'Guru Sudah Mengajar di Kelas '.$select['kelas'].' '.$select['tahun'].' '.$select['semester'];

        }else{


            if($id_jadwal){
    
                mysqli_query($koneksi, "update jadwal set 
                    id_guru='$id_guru'
                    where id_jadwal='$id_jadwal'
                ");
    
            }else{
    
                mysqli_query($koneksi, "insert into jadwal set 
                    id_guru='$id_guru', 
                    id_jam='$id_jam', 
                    hari='$hari', 
                    id_kelas='$id_kelas' 
                ");
    
            }
        }

    }

    header('Location: detail_jadwal.php?id_kelas='.$id_kelas);   
?>