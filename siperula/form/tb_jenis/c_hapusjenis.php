<?php 

include '../../config.php';

function hapus($id_jenis){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM jenis WHERE id_jenis = $id_jenis");
}

$id_jenis = $_GET["id_jenis"];

if (hapus($id_jenis) > 0 ) {
    echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'data_jenis.php';
            </script>
        ";
}
else {
    echo "
            <script>
                alert('Data Berhasil Dihapus!');
                document.location.href = 'data_jenis.php';
            </script>
        ";
}

?>