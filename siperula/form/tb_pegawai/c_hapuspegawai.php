<?php 

include '../../config.php';

function hapus($id_pegawai){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai = $id_pegawai");
}

$id_pegawai = $_GET["id_pegawai"];

if (hapus($id_pegawai) > 0 ) {
    echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'data_pegawai.php';
            </script>
        ";
}
else {
    echo "
            <script>
                alert('Data Berhasil Dihapus!');
                document.location.href = 'data_pegawai.php';
            </script>
        ";
}

?>