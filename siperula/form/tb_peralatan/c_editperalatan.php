<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['edit'])){

  // membuat variabel untuk menampung data dari form
$id = $_POST['id_peralatan'];
$nama = $_POST['nama_peralatan'];
$merk = $_POST['merk_peralatan'];
$jenis =$_POST['jenis_peralatan'];

$nama_file=$_FILES['foto_peralatan']['name'];
$source=$_FILES['foto_peralatan']['tmp_name'];
$folder="foto/";

if($nama_file != '')
{
	move_uploaded_file($source, $folder.$nama_file);
	$update = mysqli_query($koneksi, "UPDATE peralatan SET nama_peralatan='$nama', merk_peralatan='$merk', jenis_peralatan='$jenis', foto_peralatan ='$nama_file'
		WHERE id_peralatan='$id'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah'); window.location = 'data_peralatan.php'</script>";
	}else {
		echo "<script>alert('Data Gagal di Ubah'); window.location = 'data_peralatan.php'</script>";
	}
}
else
{
	$update = mysqli_query($koneksi, "UPDATE peralatan SET nama_peralatan='$nama', merk_peralatan='$merk', jenis_peralatan='$jenis'
  WHERE id_peralatan='$id'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah'); window.location = 'data_peralatan.php'</script>";
	}else{
		echo "<script>alert('Data Gagal di Ubah'); window.location = 'data_peralatan.php'</script>";
	}
}

  }

?>