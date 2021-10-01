<?php 

include '../../config.php';

function hapus($id_peru){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM peru WHERE id_peru = $id_peru");
}

$id_peru = $_GET["id_peru"];

if (hapus($id_peru) > 0 ) {
    echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'data_peru.php';
            </script>
        ";
}
else {
    echo "
            <script>
                alert('Data Berhasil Dihapus!');
                document.location.href = 'data_peru.php';
            </script>
        ";
}

?>