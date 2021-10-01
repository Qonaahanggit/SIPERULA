<?php
include "../../config.php";
$id_verpera = $_GET['id_verpera'];

//query hapus data user berdasarkan id
$query = mysqli_query($koneksi, "DELETE FROM verifikasi_pera WHERE id_verpera='$id_verpera'");
if ($query) {
    echo "<script>alert('Data Berhasil dihapus!'); window.location = 'data_vpera.php'</script>";
} else {
    echo "<script>alert('Data Gagal dihapus!'); window.location ='data_vpera.php' </script>";
}