<?php 

include '../../config.php';

function hapus($id_peminjam){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM peminjam WHERE id_peminjam = $id_peminjam");
}

$id_peminjam = $_GET["id_peminjam"];

if (hapus($id_peminjam) > 0 ) {
    echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'data_peminjam.php';
            </script>
        ";
}
else {
    echo "
            <script>
                alert('Data Berhasil Dihapus!');
                document.location.href = 'data_peminjam.php';
            </script>
        ";
}

?>