<?php
include '../../config.php';

$id_pegawai=$_GET['id_pegawai'];
$result= mysqli_query($koneksi, "SELECT * FROM pegawai where id_pegawai='$id_pegawai'");

$bio= mysqli_fetch_array($result);
$nama = $bio['nama_pegawai'];
$jabatan = $bio['jabatan'];
$no_telp = $bio['no_telp_pegawai'];

// $id=$bio["id"];

// $hp=$bio["hp"];
?>

<title>
    Detail Data pegawai
</title>

<div class="main">
    <div class="jumbotron"><div class="row">
        <h1 class="pl-5 pb-3"><b>Detail Data pegawai <?= $nama?></b></h1></div>
        <div class="container row">
            <div class="col-md-6">
            <div class="row">
                    <div class="col">
                        <p class="pl-5">Nama
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" value="<?= $nama; ?>" placeholder="Nama Lengkap" name="nama_pegawai" Required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p class="pl-5">Jabatan
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" value="<?= $jabatan; ?>" placeholder="Jabatan" name="jabatan" Required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p class="pl-5">No.Telp</p>
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" value="<?= $no_telp; ?>" placeholder="No.Telp" name="no_telp_pegawai" Required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p class="pl-5">Tanda Tangan</p>
                    </div>
                    <div class="col"><b><img src="ttd/<?php echo $ttd_pegawai;?>" name="ttd_pegawai" width="100px" height="100px"></b></p>
                    </div>
                </div>

                <div class="navbar ml-auto pl-5">
                    <a class="btn btn-primary" href="data_pegawai.php">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>


