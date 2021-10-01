<?php
include '../../config.php';

$id_peminjam=$_GET['id_peminjam'];
$result= mysqli_query($koneksi, "SELECT * FROM peminjam where id_peminjam='$id_peminjam'");

$bio= mysqli_fetch_array($result);
$id = $bio['id_peminjam'];
$nama = $bio['nama_peminjam'];
$unitkerja = $bio['unitkerja'];
$no_telp = $bio['no_telp_peminjam'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIPERULA PNC</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../AdminLTE/dist/css/AdminLTE.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php
    include "../../AdminLTE/header.php";
    include "../../AdminLTE/sidebar.php";
  ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Peminjam</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Peminjam</h3>
              </div>
              <form action="c_editpeminjam.php" method="post" name="form1" id="form1">
                <div class="card-body">

                <div class="form-group">
                <label>Id Peminjam</label>
                <input name="id_peminjam" type="text" class="form-control" id="id_peminjam" value="<?= $id; ?>" required/>
                </div>

                <div class="form-group">
                <label>Nama Lengkap</label>
                <input name="nama_peminjam" type="text" class="form-control" id="nama_peminjam" value="<?= $nama; ?>" required/>
                </div>

                <div class="form-group">
                <label>Unit Kerja</label>
                <input name="unitkerja" type="text" class="form-control" id="unitkerja" value="<?= $unitkerja; ?>" required/>
                </div>

                <div class="form-group">
                <label>No.Telp</label>
                <input name="no_telp_peminjam" type="text" class="form-control" id="no_telp_peminjam" value="<?= $no_telp; ?>" required/>
                </div>
                
                <div class="card-footer">
                    <button type="submit" value="Simpan" class="btn btn-primary">Simpan</button> &nbsp;
                    <a href="data_peminjam.php" class="btn btn-sm btn-danger">Batal </a>
                </div>
    </form>
            </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
    include "../../AdminLTE/footer.php";
  ?>
  </div>
  <!-- ./wrapper -->         
<!-- jQuery -->
<script src="../../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../AdminLTE/dist/js/AdminLTE.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>                          
