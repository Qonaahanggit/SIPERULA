<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['tambah'])){
  
    // membuat variabel untuk menampung data dari form
 
  $id_pera = $_POST['id_pera'];
  $id_pegawai = $_POST['id_pegawai'];
  $tgl_pengembalat = $_POST['tgl_pengembalat'];
  $kondisi_peralatan = $_POST['kondisi_peralatan'];
    
  $lokasi_foto_pengembalat=$_FILES['foto_pengembalat']['tmp_name'];
	$nama_foto_pengembalat=$_FILES['foto_pengembalat']['name'];
	$tipe_foto_pengembalat=$_FILES['foto_pengembalat']['type'];
	$folder="foto/$nama_foto_pengembalat";

  if(!empty($lokasi_foto_pengembalat))
	{
		move_uploaded_file($lokasi_foto_pengembalat,$folder);
	}

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan 
//(id tidak perlu karena dibikin otomatis)

$query = "INSERT INTO pengembalat (`id_pera`,`id_pegawai`,`tgl_pengembalat`,`kondisi_peralatan`,`foto_pengembalat`)
          VALUES ('$id_pera','$id_pegawai','$tgl_pengembalat','$kondisi_peralatan','$nama_foto_pengembalat')";

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
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_pengembalat.php';</script>";
    }

  }

  ?>
