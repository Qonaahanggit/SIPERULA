<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['tambah'])){
  
    // membuat variabel untuk menampung data dari form
  $id = $_POST['id_pegawai'];
  $nama = $_POST['nama_pegawai'];
  $jabatan = $_POST['jabatan'];
  $no_telp = $_POST['no_telp_pegawai'];

  $lokasi_ttd_pegawai=$_FILES['ttd_pegawai']['tmp_name'];
	$nama_ttd_pegawai=$_FILES['ttd_pegawai']['name'];
	$tipe_ttd_pegawai=$_FILES['ttd_pegawai']['type'];
	$folder="ttd/$nama_ttd_pegawai";

  if(!empty($lokasi_ttd_pegawai))
	{
		move_uploaded_file($lokasi_ttd_pegawai,$folder);
	}

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan 
//(id tidak perlu karena dibikin otomatis)

$query = "INSERT INTO pegawai (`id_pegawai`,`nama_pegawai`,`jabatan`,`no_telp_pegawai`,`ttd_pegawai`)
          VALUES ('$id','$nama','$jabatan','$no_telp','$nama_ttd_pegawai')";

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
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_pegawai.php';</script>";
    }

  }

  ?>
