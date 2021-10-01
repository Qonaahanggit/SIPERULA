<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['edit'])){

  // membuat variabel untuk menampung data dari form
  $id_pengembalat = $_POST['id_pengembalat'];
  $tgl_pengembalat = $_POST['tgl_pengembalat'];
  $kondisi_peralatan = $_POST['kondisi_peralatan'];

$nama_file=$_FILES['foto_pengembalat']['name'];
$source=$_FILES['foto_pengembalat']['tmp_name'];
$folder="foto/";

if($nama_file != '')
{
	move_uploaded_file($source, $folder.$nama_file);
	$update = mysqli_query($koneksi, "UPDATE pengembalat SET tgl_pengembalat='$tgl_pengembalat', kondisi_peralatan='$kondisi_peralatan', foto_pengembalat ='$nama_file'
		WHERE id_pengembalat='$id_pengembalat'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah'); window.location = 'data_pengembalat.php'</script>";
	}else {
		echo "<script>alert('Data Gagal di Ubah'); window.location = 'data_pengembalat.php'</script>";
	}
}
else
{
	$update = mysqli_query($koneksi, "UPDATE pengembalat SET tgl_pengembalat='$tgl_pengembalat', kondisi_peralatan='$kondisi_peralatan'
  WHERE id_pengembalat='$id_pengembalat'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah'); window.location = 'data_pengembalat.php'</script>";
	}else{
		echo "<script>alert('Data Gagal di Ubah'); window.location = 'data_pengembalat.php'</script>";
	}
}

  }
  ?>