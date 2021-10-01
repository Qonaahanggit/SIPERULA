<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['edit'])){

  // membuat variabel untuk menampung data dari form
$id = $_POST['id_pegawai'];
$nama = $_POST['nama_pegawai'];
$jabatan = $_POST['jabatan'];
$no_telp =$_POST['no_telp_pegawai'];

$nama_file=$_FILES['ttd_pegawai']['name'];
$source=$_FILES['ttd_pegawai']['tmp_name'];
$folder="ttd/";

if($nama_file != ''){
	move_uploaded_file($source, $folder.$nama_file);
	$update = mysqli_query($koneksi, "UPDATE pegawai SET nama_pegawai='$nama', jabatan='$jabatan', no_telp_pegawai='$no_telp', ttd_pegawai ='$nama_file'
		WHERE id_pegawai='$id'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah...'); window.location = 'data_pegawai.php'</script>";
	}else {
		echo "<script>alert('Data Gagal di Ubah...'); window.location = 'data_pegawai.php'</script>";
	}
}else{
	$update = mysqli_query($koneksi, "UPDATE pegawai SET nama_pegawai='$nama', jabatan='$jabatan', no_telp_pegawai='$no_telp'
		WHERE id_pegawai='$id'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah...'); window.location = 'data_pegawai.php'</script>";
	}else{
		echo "<script>alert('Data Gagal di Ubah...'); window.location = 'data_pegawai.php'</script>";
	}
}

  }
  ?>