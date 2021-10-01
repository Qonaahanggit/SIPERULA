<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['edit'])){

  // membuat variabel untuk menampung data dari form
$id = $_POST['id_ruangan'];
$nama = $_POST['nama_ruangan'];
$kapasitas = $_POST['kapasitas_ruangan'];

$nama_file=$_FILES['foto_ruangan']['name'];
$source=$_FILES['foto_ruangan']['tmp_name'];
$folder="foto/";

if($nama_file != '')
{
	move_uploaded_file($source, $folder.$nama_file);
	$update = mysqli_query($koneksi, "UPDATE ruangan SET nama_ruangan='$nama', kapasitas_ruangan='$kapasitas', foto_ruangan ='$nama_file'
		WHERE id_ruangan='$id'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah'); window.location = 'data_ruangan.php'</script>";
	}else {
		echo "<script>alert('Data Gagal di Ubah'); window.location = 'data_ruangan.php'</script>";
	}
}
else
{
	$update = mysqli_query($koneksi, "UPDATE ruangan SET nama_ruangan='$nama', kapasitas_ruangan='$kapasitas'
  WHERE id_ruangan='$id'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah'); window.location = 'data_ruangan.php'</script>";
	}else{
		echo "<script>alert('Data Gagal di Ubah'); window.location = 'data_ruangan.php'</script>";
	}
}

  }
  ?>