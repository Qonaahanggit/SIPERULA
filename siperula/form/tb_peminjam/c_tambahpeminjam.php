<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['tambah'])){
  
  // membuat variabel untuk menampung data dari form
$id = $_POST['id_peminjam'];
$nama = $_POST['nama_peminjam'];
$unitkerja = $_POST['unitkerja'];
$no_telp = $_POST['no_telp_peminjam'];

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan 
//(id tidak perlu karena dibikin otomatis)

$query = "INSERT INTO peminjam (`id_peminjam`,`nama_peminjam`,`unitkerja`,`no_telp_peminjam`)
          VALUES ('$id','$nama','$unitkerja','$no_telp')";

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
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_peminjam.php';</script>";
    }
  }

  ?>
