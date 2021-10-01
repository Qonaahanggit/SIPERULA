<?php
include "../../config.php";
$id_verperu = $_GET['id_verperu'];

//query hapus data user berdasarkan id
$query = mysqli_query($koneksi, "DELETE FROM verifikasi_peru WHERE id_verperu='$id_verperu'");
if ($query) {
    echo "<script>alert('Data Berhasil dihapus!'); window.location = 'data_vperu.php'</script>";
} else {
    echo "<script>alert('Data Gagal dihapus!'); window.location ='data_vperu.php' </script>";
}