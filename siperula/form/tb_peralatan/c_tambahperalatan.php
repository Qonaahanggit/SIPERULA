<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['tambah'])){
  
    // membuat variabel untuk menampung data dari form
  
  $nama = $_POST['nama_peralatan'];
  $jenis = $_POST['jenis_peralatan'];
  $merk = $_POST['merk_peralatan'];
  
  $lokasi_foto_peralatan=$_FILES['foto_peralatan']['tmp_name'];
	$nama_foto_peralatan=$_FILES['foto_peralatan']['name'];
	$tipe_foto_peralatan=$_FILES['foto_peralatan']['type'];
	$folder="foto/$nama_foto_peralatan";

  if(!empty($lokasi_foto_peralatan))
	{
		move_uploaded_file($lokasi_foto_peralatan,$folder);
	}

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan 
//(id tidak perlu karena dibikin otomatis)

$query = "INSERT INTO peralatan (`nama_peralatan`,`jenis_peralatan`,`merk_peralatan`,`foto_peralatan`)
          VALUES ('$nama','$jenis','$merk','$nama_foto_peralatan')";

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
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_peralatan.php';</script>";
    }

  }

  ?>
