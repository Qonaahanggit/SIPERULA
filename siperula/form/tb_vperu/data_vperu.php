<?php
  include "../../config.php";

  include "c_tambahvperu.php";
  include "c_editvperu.php";
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
  <!-- DataTables -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../AdminLTE/dist/css/adminlte.min.css">


</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php
    
    include "../../AdminLTE/header.php";
    include "../../AdminLTE/sidebar.php";
    
    $user = mysqli_query($koneksi, "SELECT * FROM verifikasi_peru INNER JOIN pegawai ON verifikasi_peru.id_pegawai=pegawai.id_pegawai");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Verifikasi Peminjaman Ruangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Verifikasi Peminjaman Ruangan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a data-toggle ="modal" data-target ="#modal-tambah" class = "btn btn-block btn-secondary" style ="width : 15%">Tambah Data</a> 
              <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th><center>No</center></th>
                      <th><center>Id Peminjaman Ruangan</center></th>
                      <th><center>Nama Pegawai</center></th>
                      <th><center>Tanggal Verifikasi</center></th>
                      <th><center>Status Verifikasi</center></th>
                      <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                
                  <tbody>
                    <?php $i = 1; ?>
                    
                    <?php foreach ($user as $row) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?php echo $row['id_peru']; ?></td>
                                <td><?php echo $row['nama_pegawai']; ?></td>
                                <td><?php echo $row["tgl_verperu"]; ?></td>
                                <td><?php echo $row["status_verperu"]; ?></td>
                                <td><center>
                                    <a data-toggle ="modal" data-target="#myModal<?php echo $row['id_verperu']; ?>" class ="btn btn-app"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="c_hapusverperu.php?id_verperu=<?= $row["id_verperu"]; ?>"class ="btn btn-app"><i class="fas fa-trash-alt"></i></a>                                
                                </td></center>
                            </tr>
                        <?php $i++ ; ?>
 
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

<!-- /.Modals Tambah --> 
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Verifikasi Peminjaman Ruangan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method ="post" action ="data_vperu.php">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Id Peminjaman Ruangan</label>
                        <input name = "id_peru" type="text" class="form-control" id="id_peru" placeholder="Id Peminjaman Ruangan" required/>
                    </div>

                    <div class="form-group">
                    <label for="exampleSelectRounded0">Nama Pegawai</label>
                    <select type="text" class="form-control" aria-describedby="emailHelp" name="id_pegawai" id="id_pegawai">
                      <option> Silahkan Pilih</option>
                        <?php $tb_pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai ");
                          foreach ($tb_pegawai as $dtg) : 
                        ?>
                      <option value="<?php echo $dtg['id_pegawai'] ?>" nama_pegawai="<?php echo $dtg['nama_pegawai'] ?>"><?php echo $dtg['nama_pegawai'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Verifikasi</label>
                        <input name = "tgl_verperu" type="date" class="form-control" id="tgl_verperu" placeholder="Tanggal Verifikasi" required/>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectRounded0">Status Verifikasi</label>
                        <select class="custom-select rounded-0" id="status_verperu"name="status_verperu" required>
                            <option> ---- Pilih Salah Satu ---- </option>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Tidak Disetujui">Tidak Disetujui</option>
                        </select>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name = "tambah">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

       <!-- / modal edit  -->
<?php $no = 0;
foreach ($user as $row) : $no++; ?>
    <div class="modal fade" id="myModal<?php echo $row['id_verperu']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Verifikasi Peminjaman Ruangan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="c_editvperu.php" method="get">
                    <div class="modal-body">
                        <?php
                        $id_verperu=$row['id_verperu'];
                        $result= mysqli_query($koneksi, "SELECT * FROM verifikasi_peru where id_verperu='$id_verperu'");                
                        while ($bio= mysqli_fetch_array($result)) {
                        ?>

                        <div class="form-group">
                            <label>Id Verifikasi Peminjaman Ruangan</label>
                            <input name = "id_verperu" type="text" class="form-control" value="<?php echo $bio['id_verperu']; ?>" placeholder="Id Verifikasi Peminjaman Ruangan" readonly />
                        </div>

                        <div class="form-group">
                            <label>Tanggal Verifikasi</label>
                            <input name = "tgl_verperu" type="text" class="form-control" value="<?php echo $bio['tgl_verperu']; ?>" placeholder="Tanggal Verifikasi">
                        </div>

                        <div class="form-group">
                        <label for="exampleSelectRounded0">Status Verifikasi</label>
                        <select class="custom-select rounded-0" id="status_verperu"name="Status Verifikasi" required>
                            <option><?php echo $bio['status_verperu']; ?></option>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Tidak Disetujui">Tidak Disetujui</option>
                        </select>
                    </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name = "edit">Save changes</button>
                            </div>

                        <?php 
                            }
                        ?> 
                    </div> 
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach ?>

<?php
include "../../AdminLTE/footer.php"
?>

</div>

<!-- jQuery -->
<script src="../../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../../AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>