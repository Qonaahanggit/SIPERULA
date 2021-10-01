<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_GET['edit'])){

  // membuat variabel untuk menampung data dari form
$username = $_GET['username'];
$password = $_GET['password'];
$level =$_GET['level'];


// (username tidak perlu karena dibikin otomatis)
$query = "UPDATE user SET password='$password',level='$level'
WHERE username='$username'";

$result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Edit Data User Berhasil.');window.location='data_user.php';</script>";
    }
  }
  ?>