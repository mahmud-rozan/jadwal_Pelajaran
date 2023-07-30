<?php 
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

//cek data
$sql = "SELECT * FROM users WHERE username='$username' ";
$qry = mysqli_query($db,$sql);
$usr = mysqli_fetch_array($qry);

if( 
 $username == $usr['username']
 AND
 $password == $usr['password']
  )
{
 $_SESSION['id']   = $usr['id'];
 $_SESSION['username'] = $usr['username'];
 @$_SESSION['nama']     = @$usr['nama'];
 $_SESSION['level']    = $usr['level'];
 $_SESSION['login']    = 1;
 $pesan = "Login berhasil, selamat datang $username";
} else {
 $pesan = "Login gagal, username atau password anda salah!";
}

?>
<!-- <?php
function countData($table) {
    $db = \Config\Database::connect();
    return $db->table($table)->countAllResult();    
}
?> -->
<script>
 alert('<?php echo $pesan;?>');
 location='index.php';
</script>

<?php

  session_start();
  $role = $_SESSION['level'];

  if($role=="1"){
  header("location: index.php");
  }
  elseif($role=="0"){
  header("location: index_user.php");
  }
  ?>