<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['tambah'])){
  
    // membuat variabel untuk menampung data dari form
 
  $id_peminjam = $_POST['id_peminjam'];
  $id_ruangan = $_POST['id_ruangan'];
  $id_jenis = $_POST['id_jenis'];
  
  $lokasi_proposal_peru=$_FILES['proposal_peru']['tmp_name'];
	$nama_proposal_peru=$_FILES['proposal_peru']['name'];
	$tipe_proposal_peru=$_FILES['proposal_peru']['type'];
	$folder="proposal/$nama_proposal_peru";

  if(!empty($lokasi_proposal_peru))
	{
		move_uploaded_file($lokasi_proposal_peru,$folder);
	}

  $tgl_peru1 = $_POST['tgl_peru1'];
  $tgl_peru2 = $_POST['tgl_peru2'];
  $keperluan_peru = $_POST['keperluan_peru'];

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan 
//(id tidak perlu karena dibikin otomatis)

$query = "INSERT INTO peru (`id_peminjam`,`id_ruangan`,`id_jenis`,`proposal_peru`,`tgl_peru1`,`tgl_peru2`,`keperluan_peru`)
          VALUES ('$id_peminjam','$id_ruangan','$id_jenis','$nama_proposal_peru','$tgl_peru1','$tgl_peru2','$keperluan_peru')";

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
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_peru.php';</script>";
    }

  }

  ?>
