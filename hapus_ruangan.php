<?php
$koneksi = mysqli_connect("localhost", "root", "", "jadwal");

$id = $_GET['id']; // menampung id

// query hapus
$datas = mysqli_query($koneksi, "DELETE FROM ruangan WHERE id_ruangan = '$id'") or die(mysqli_error($koneksi));

// alert dan redirect ke ruang.php
echo "<script>alert('Data berhasil dihapus.');window.location='menu_ruangan.php';</script>";
?>
