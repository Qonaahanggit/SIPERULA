<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_GET['edit'])){

  // membuat variabel untuk menampung data dari form
$id_verpera = $_GET['id_verpera'];
$id_pera = $_GET['id_pera'];
$id_pegawai = $_GET['id_pegawai'];
$tgl_verpera = $_GET['tgl_verpera'];
$tgl_verpera =$_GET['tgl_verpera'];


// (id_verpera tidak perlu karena dibikin otomatis)
$query = "UPDATE verifikasi_pera SET id_pera='$id_pera',id_pegawai='$id_pegawai',tgl_verpera='$tgl_verpera',tgl_verpera='$tgl_verpera'
WHERE id_verpera='$id_verpera'";

$result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Edit Data User Berhasil.');window.location='data_vpera.php';</script>";
    }
  }
  ?>