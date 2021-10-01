<?php 
  include "../../config.php";

    $id_pegawai=$_GET['id_pegawai'];
    $result= mysqli_query($koneksi, "SELECT * FROM pegawai where id_pegawai='$id_pegawai'");

    $nama = $_POST['nama_pegawai'];
    $jabatan = $_POST['jabatan'];
    $no_telp = $_POST['no_telp_pegawai'];

$query = mysqli_query($koneksi, "INSERT INTO tb_user (username, password, level) VALUES ('$username', '$password', '$levell')");
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'data_user.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'tambah_user.php'</script>";	
}

?>