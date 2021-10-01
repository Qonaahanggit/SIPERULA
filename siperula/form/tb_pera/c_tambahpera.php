<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_POST['tambah'])){
  
    // membuat variabel untuk menampung data dari form
 
  $id_peminjam = $_POST['id_peminjam'];
  $id_peralatan = $_POST['id_peralatan'];
  $id_jenis = $_POST['id_jenis'];
  
  $lokasi_proposal_pera=$_FILES['proposal_pera']['tmp_name'];
	$nama_proposal_pera=$_FILES['proposal_pera']['name'];
	$tipe_proposal_pera=$_FILES['proposal_pera']['type'];
	$folder="proposal/$nama_proposal_pera";

  if(!empty($lokasi_proposal_pera))
	{
		move_uploaded_file($lokasi_proposal_pera,$folder);
	}

  $tgl_pera1 = $_POST['tgl_pera1'];
  $tgl_pera2 = $_POST['tgl_pera2'];
  $keperluan_pera = $_POST['keperluan_pera'];

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan 
//(id tidak perlu karena dibikin otomatis)

$query = "INSERT INTO pera (`id_peminjam`,`id_peralatan`,`id_jenis`,`proposal_pera`,`tgl_pera1`,`tgl_pera2`,`keperluan_pera`)
          VALUES ('$id_peminjam','$id_peralatan','$id_jenis','$nama_proposal_pera','$tgl_pera1','$tgl_pera2','$keperluan_pera')";

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
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_pera.php';</script>";
    }

  }

  ?>
