<?php 

include '../../config.php';

function hapus($id_pengembalat){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM pengembalat WHERE id_pengembalat = $id_pengembalat");
}

$id_pengembalat = $_GET["id_pengembalat"];

if (hapus($id_pengembalat) > 0 ) {
    echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'data_pengembalat.php';
            </script>
        ";
}
else {
    echo "
            <script>
                alert('Data Berhasil Dihapus!');
                document.location.href = 'data_pengembalat.php';
            </script>
        ";
}

?>