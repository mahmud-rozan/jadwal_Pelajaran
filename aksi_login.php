<?php 
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

//cek data
$sql = "SELECT * FROM users WHERE username='$username'";
$qry = mysqli_query($db, $sql);
$usr = mysqli_fetch_array($qry);

if (
    $username == $usr['username'] &&
    $password == $usr['password']
) {
    $_SESSION['id'] = $usr['id'];
    $_SESSION['username'] = $usr['username'];
    @$_SESSION['nama'] = @$usr['nama'];
    $_SESSION['level'] = $usr['level'];
    $_SESSION['login'] = 1;
    
    if ($_SESSION['level'] == 1) {
        echo "<script>alert('Login berhasil, selamat datang $username'); window.location='index.php';</script>";
    } elseif ($_SESSION['level'] == 0) {
        echo "<script>alert('Login berhasil, selamat datang $username'); window.location='index_user.php';</script>";
    }
} else {
    echo "<script>alert('Login gagal, username atau password anda salah!'); window.location='login.php';</script>";
}
?>

<?php
function countData($table) {
    $db = \Config\Database::connect();
    return $db->table($table)->countAllResult();    
}
?> 