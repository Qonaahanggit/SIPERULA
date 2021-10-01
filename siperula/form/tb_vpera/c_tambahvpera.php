<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['tambah'])){
  
    // membuat variabel untuk menampung data dari form
  $id_pera = $_POST['id_pera'];
  $id_pegawai = $_POST['id_pegawai'];
  $tgl_verpera = $_POST['tgl_verpera'];
  $status_verpera = $_POST['status_verpera'];

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan 
//(id_pera tidak perlu karena dibikin otomatis)

$query = "INSERT INTO verifikasi_pera (`id_pera`,`id_pegawai`,`tgl_verpera`,`status_verpera`)
          VALUES ('$id_pera','$id_pegawai','$tgl_verpera','$status_verpera')";

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
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_vpera.php';</script>";
    }

  }

  ?>
