<?php 

include '../../config.php';

function hapus($id_pera){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM pera WHERE id_pera = $id_pera");
}

$id_pera = $_GET["id_pera"];

if (hapus($id_pera) > 0 ) {
    echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'data_pera.php';
            </script>
        ";
}
else {
    echo "
            <script>
                alert('Data Berhasil Dihapus!');
                document.location.href = 'data_pera.php';
            </script>
        ";
}

?>