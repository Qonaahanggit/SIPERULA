<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_GET['edit'])){

  // membuat variabel untuk menampung data dari form
$id = $_GET['id_jenis'];
$jenis = $_GET['jenis'];

// (id tidak perlu karena dibikin otomatis)
$query = "UPDATE jenis SET id_jenis='$id',jenis='$jenis' WHERE id_jenis='$id'";

$result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Edit Data Jenis Berhasil.');window.location='data_jenis.php';</script>";
    }
  }
  ?>