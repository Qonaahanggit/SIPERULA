<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_GET['edit'])){

  // membuat variabel untuk menampung data dari form
$id_verperu = $_GET['id_verperu'];
$id_peru = $_GET['id_peru'];
$id_pegawai = $_GET['id_pegawai'];
$tgl_verperu = $_GET['tgl_verperu'];
$tgl_verperu =$_GET['tgl_verperu'];


// (id_verperu tidak perlu karena dibikin otomatis)
$query = "UPDATE verifikasi_peru SET id_peru='$id_peru',id_pegawai='$id_pegawai',tgl_verperu='$tgl_verperu',tgl_verperu='$tgl_verperu'
WHERE id_verperu='$id_verperu'";

$result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Edit Data User Berhasil.');window.location='data_vperu.php';</script>";
    }
  }
  ?>