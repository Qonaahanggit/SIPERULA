<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['tambah'])){
  
    // membuat variabel untuk menampung data dari form

  $nama = $_POST['nama_ruangan'];
  $kapasitas = $_POST['kapasitas_ruangan'];

  $lokasi_foto_ruangan=$_FILES['foto_ruangan']['tmp_name'];
	$nama_foto_ruangan=$_FILES['foto_ruangan']['name'];
	$tipe_foto_ruangan=$_FILES['foto_ruangan']['type'];
	$folder="foto/$nama_foto_ruangan";

  if(!empty($lokasi_foto_ruangan))
	{
		move_uploaded_file($lokasi_foto_ruangan,$folder);
	}

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan 
//(id tidak perlu karena dibikin otomatis)

$query = "INSERT INTO ruangan (`nama_ruangan`,`kapasitas_ruangan`,`foto_ruangan`)
          VALUES ('$nama','$kapasitas','$nama_foto_ruangan')";

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
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_ruangan.php';</script>";
    }

  }

  ?>
