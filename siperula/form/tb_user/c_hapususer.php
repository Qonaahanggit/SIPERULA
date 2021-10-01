<?php
include "../../config.php";
$username = $_GET['username'];

//query hapus data user berdasarkan id
$query = mysqli_query($koneksi, "DELETE FROM user WHERE username='$username'");
if ($query) {
    echo "<script>alert('Data Berhasil dihapus!'); window.location = 'data_user.php'</script>";
} else {
    echo "<script>alert('Data Gagal dihapus!'); window.location ='data_user.php' </script>";
}