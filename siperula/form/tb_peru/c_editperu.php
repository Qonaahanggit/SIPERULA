<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_GET['edit'])){

  // membuat variabel untuk menampung data dari form
  $id_peru = $_GET['id_peru'];
  $tgl_peru1 = $_GET['tgl_peru1'];
  $tgl_peru2 = $_GET['tgl_peru2'];
  $keperluan_peru = $_GET['keperluan_peru'];

  $nama_file=$_FILES['proposal_peru']['name'];
  $source=$_FILES['proposal_peru']['tmp_name'];
  $folder="proposal/";

if($nama_file != '')
{
	move_uploaded_file($source, $folder.$nama_file);
	$update = mysqli_query($koneksi, "UPDATE peru SET tgl_peru1='$tgl_peru1', tgl_peru2='$tgl_peru2', keperluan_peru='$keperluan_peru', proposal_peru ='$nama_file'
		WHERE id_peru='$id'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah'); window.location = 'data_peru.php'</script>";
	}else {
		echo "<script>alert('Data Gagal di Ubah'); window.location = 'data_peru.php'</script>";
	}
}
else
{
	$update = mysqli_query($koneksi, "UPDATE peru SET tgl_peru1='$tgl_peru1', tgl_peru2='$tgl_peru2', keperluan_peru='$keperluan_peru'
  WHERE id_peru='$id'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah'); window.location = 'data_peru.php'</script>";
	}else{
		echo "<script>alert('Data Gagal di Ubah'); window.location = 'data_peru.php'</script>";
	}
}

  }
  ?>