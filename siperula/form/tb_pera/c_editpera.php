<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../config.php';
if(isset($_GET['edit'])){

  // membuat variabel untuk menampung data dari form
  $id_pera = $_GET['id_pera'];
  $tgl_pera1 = $_GET['tgl_pera1'];
  $tgl_pera2 = $_GET['tgl_pera2'];
  $keperluan_pera = $_GET['keperluan_pera'];

  $lokasi_proposal_pera=$_FILES['proposal_pera']['tmp_name'];
  $nama_proposal_pera=$_FILES['proposal_pera']['name'];
  $tipe_proposal_pera=$_FILES['proposal_pera']['type'];
  $folder="proposal/$nama_proposal_pera";

  if(!empty($lokasi_proposal_pera))
	{
		move_uploaded_file($lokasi_proposal_pera,$folder);
	}

// (id tidak perlu karena dibikin otomatis)
$query = "UPDATE pera SET id_pera='$id_pera',tgl_pera1='$tgl_pera1',tgl_pera2='$tgl_pera1', 
keperluan_pera='$keperluan_pera',proposal_pera='$nama_proposal_pera'
WHERE id_pera='$id_pera'";

$result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Edit Data Berhasil.');window.location='data_pera.php';</script>";
    }
  }
  ?>