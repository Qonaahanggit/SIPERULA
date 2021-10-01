<?php 

include '../../config.php';

function hapus($id_pengembaru){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM pengembaru WHERE id_pengembaru = $id_pengembaru");
}

$id_pengembaru = $_GET["id_pengembaru"];

if (hapus($id_pengembaru) > 0 ) {
    echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'data_pengembaru.php';
            </script>
        ";
}
else {
    echo "
            <script>
                alert('Data Berhasil Dihapus!');
                document.location.href = 'data_pengembaru.php';
            </script>
        ";
}

?>