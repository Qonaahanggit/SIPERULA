<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['tambah'])){
  
    // membuat variabel untuk menampung data dari form
  $username = $_POST['username'];
  $id = $_POST['id_pegawai'];
  $password = $_POST['password'];
  $level = $_POST['level'];

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan 
//(username tidak perlu karena dibikin otomatis)

$query = "INSERT INTO user (`username`,`id_pegawai`,`password`,`level`)
          VALUES ('$username','$id','$password','$level')";

$result = mysqli_query($koneksi, $query);
    if(!$result)
    {
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
    } 
    else 
    {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_user.php';</script>";
    }

  }

  ?>
