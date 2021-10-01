<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['edit'])){

  // membuat variabel untuk menampung data dari form
  $id_pengembaru = $_POST['id_pengembaru'];
  $tgl_pengembaru = $_POST['tgl_pengembaru'];
  $kondisi_ruangan = $_POST['kondisi_ruangan'];

$nama_file=$_FILES['foto_pengembaru']['name'];
$source=$_FILES['foto_pengembaru']['tmp_name'];
$folder="foto/";

if($nama_file != '')
{
	move_uploaded_file($source, $folder.$nama_file);
	$update = mysqli_query($koneksi, "UPDATE pengembaru SET tgl_pengembaru='$tgl_pengembaru', kondisi_ruangan='$kondisi_ruangan', foto_pengembaru ='$nama_file'
		WHERE id_pengembaru='$id_pengembaru'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah'); window.location = 'data_pengembaru.php'</script>";
	}else {
		echo "<script>alert('Data Gagal di Ubah'); window.location = 'data_pengembaru.php'</script>";
	}
}
else
{
	$update = mysqli_query($koneksi, "UPDATE pengembaru SET tgl_pengembaru='$tgl_pengembaru', kondisi_ruangan='$kondisi_ruangan'
  WHERE id_pengembaru='$id_pengembaru'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah'); window.location = 'data_pengembaru.php'</script>";
	}else{
		echo "<script>alert('Data Gagal di Ubah'); window.location = 'data_pengembaru.php'</script>";
	}
}

  }
  ?>