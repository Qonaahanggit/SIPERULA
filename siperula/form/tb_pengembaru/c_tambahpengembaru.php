<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['tambah'])){
  
    // membuat variabel untuk menampung data dari form
 
  $id_peru = $_POST['id_peru'];
  $id_pegawai = $_POST['id_pegawai'];
  $tgl_pengembaru = $_POST['tgl_pengembaru'];
  $kondisi_ruangan = $_POST['kondisi_ruangan'];
    
  $lokasi_foto_pengembaru=$_FILES['foto_pengembaru']['tmp_name'];
	$nama_foto_pengembaru=$_FILES['foto_pengembaru']['name'];
	$tipe_foto_pengembaru=$_FILES['foto_pengembaru']['type'];
	$folder="foto/$nama_foto_pengembaru";

  if(!empty($lokasi_foto_pengembaru))
	{
		move_uploaded_file($lokasi_foto_pengembaru,$folder);
	}

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan 
//(id tidak perlu karena dibikin otomatis)

$query = "INSERT INTO pengembaru (`id_peru`,`id_pegawai`,`tgl_pengembaru`,`kondisi_ruangan`,`foto_pengembaru`)
          VALUES ('$id_peru','$id_pegawai','$tgl_pengembaru','$kondisi_ruangan','$nama_foto_pengembaru')";

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
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_pengembaru.php';</script>";
    }

  }

  ?>
