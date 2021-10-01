<?php 

include '../../config.php';

function hapus($id_peralatan){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM peralatan WHERE id_peralatan = $id_peralatan");
}

$id_peralatan = $_GET["id_peralatan"];

if (hapus($id_peralatan) > 0 ) {
    echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'data_peralatan.php';
            </script>
        ";
}
else {
    echo "
            <script>
                alert('Data Berhasil Dihapus!');
                document.location.href = 'data_peralatan.php';
            </script>
        ";
}

?>