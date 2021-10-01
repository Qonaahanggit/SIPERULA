<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_GET['edit'])){

  // membuat variabel untuk menampung data dari form
$id = $_GET['id_peminjam'];
$nama = $_GET['nama_peminjam'];
$unitkerja = $_GET['unitkerja'];
$no_telp =$_GET['no_telp_peminjam'];

// (id tidak perlu karena dibikin otomatis)
$query = "UPDATE peminjam SET id_peminjam='$id',nama_peminjam='$nama',unitkerja='$unitkerja',no_telp_peminjam='$no_telp'
WHERE id_peminjam='$id'";

$result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Edit Data Peminjam Berhasil.');window.location='data_peminjam.php';</script>";
    }
  }
  ?>