<?php 

include '../../config.php';

function hapus($id_ruangan){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM ruangan WHERE id_ruangan = $id_ruangan");
}

$id_ruangan = $_GET["id_ruangan"];

if (hapus($id_ruangan) > 0 ) {
    echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'data_ruangan.php';
            </script>
        ";
}
else {
    echo "
            <script>
                alert('Data Berhasil Dihapus!');
                document.location.href = 'data_ruangan.php';
            </script>
        ";
}

?>