<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['tambah'])){
  
    // membuat variabel untuk menampung data dari form
  $id_peru = $_POST['id_peru'];
  $id_pegawai = $_POST['id_pegawai'];
  $tgl_verperu = $_POST['tgl_verperu'];
  $status_verperu = $_POST['status_verperu'];

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan 
//(id_peru tidak perlu karena dibikin otomatis)

$query = "INSERT INTO verifikasi_peru (`id_peru`,`id_pegawai`,`tgl_verperu`,`status_verperu`)
          VALUES ('$id_peru','$id_pegawai','$tgl_verperu','$status_verperu')";

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
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_vperu.php';</script>";
    }

  }

  ?>
