<?php
include '../../config.php';

$id_peminjam=$_GET['id_peminjam'];
$result= mysqli_query($koneksi, "SELECT * FROM peminjam where id_peminjam='$id_peminjam'");

$bio= mysqli_fetch_array($result);
$nama = $bio['nama_peminjam'];
$unitkerja = $bio['unitkerja'];
$no_telp = $bio['no_telp_peminjam'];
// $id=$bio["id"];

// $hp=$bio["hp"];
?>

<title>
    Detail Data Peminjam
</title>

<div class="main">
    <div class="jumbotron"><div class="row">
        <h1 class="pl-5 pb-3"><b>Detail Data Peminjam <?= $nama?></b></h1></div>
        <div class="container row">
            <div class="col-md-6">
            <div class="row">
                    <div class="col">
                        <p class="pl-5">Nama
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" value="<?= $nama; ?>" placeholder="Nama Lengkap" name="nama_peminjam" Required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p class="pl-5">Unit Kerja
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" value="<?= $unitkerja; ?>" placeholder="Unit Kerja" name="unitkerja" Required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p class="pl-5">No.Telp</p>
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" value="<?= $no_telp; ?>" placeholder="No.Telp" name="no_telp_peminjam" Required>
                    </div>
                </div>
                <div class="navbar ml-auto pl-5">
                    <a class="btn btn-primary" href="data_peminjam.php">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
