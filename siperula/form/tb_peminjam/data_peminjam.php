<?php
  include "../../config.php";
  include "c_tambahpeminjam.php";
  include "c_editpeminjam.php";
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
        
      $user = mysqli_query($koneksi, "SELECT * FROM peminjam");
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Peminjam</h1>
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
                <br>
                <a data-toggle="modal" data-target="#modal-tambah" class = "btn btn-block btn-secondary" style ="width : 15%">Tambah Data</a> 
                <br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th><center>No</center></th>
                        <th><center>Id Peminjam</center></th>
                        <th><center>Nama Lengkap</center></th>
                        <th><center>Unit Kerja</center></th>
                        <th><center>No.Telp</center></th>
                        <th><center>Aksi</center></th>
                    </tr>
                    </thead>
                  
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($user as $row) : ?>
                              <tr>
                                  <td><center><?= $i ?></center></td>
                                  <td><center><?php echo $row["id_peminjam"] ?></center></td>
                                  <td><center><?php echo $row["nama_peminjam"] ?></center></td>
                                  <td><center><?php echo $row["unitkerja"] ?></center></td>
                                  <td><center><?php echo $row["no_telp_peminjam"] ?></center></td>
                                  <td>
                                  <center>
                                      <a data-toggle="modal" data-target="#modal-edit<?php echo $row['id_peminjam']; ?>" class="btn btn-app"><i class="nav-icon fas fa-edit"></i></a> 
                                      <a href="c_hapuspeminjam.php?id_peminjam=<?= $row["id_peminjam"]; ?>"class="btn btn-app"><i class="fas fa-trash"></i></a>
                                  </center>
                                  </td>
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
  <!--/. wrapper-->

      <!-- Modal Tambah -->
        <div class="modal fade" id="modal-tambah">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

                <form method="post" action="data_peminjam.php">
                    <div class="modal-body">   
                        <div class="form-group">
                            <label>Id Peminjam</label>
                            <input name="id_peminjam" type="text" class="form-control" id="id_peminjam" placeholder="Id Peminjam" required/>
                          </div>

                          <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input name="nama_peminjam" type="text" class="form-control" id="nama_peminjam" placeholder="Nama Lengkap" required/>
                          </div>

                          <div class="form-group">
                            <label>Unit Kerja</label>
                            <input name="unitkerja" type="text" class="form-control" id="unitkerja" placeholder="Unit Kerja" required/>
                          </div>

                          <div class="form-group">
                            <label>No.Telp</label>
                            <input name="no_telp_peminjam" type="text" class="form-control" id="no_telp_peminjam" placeholder="No.Telp" required/>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="tambah">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    <!-- /.modal -->

<!-- Modal Edit -->
<?php $no = 0;
foreach ($user as $row) : $no++; ?>
    <div class="modal fade" id="modal-edit<?php echo $row['id_peminjam']; ?>" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Peminjam</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

                <form role="form" action="c_editpeminjam.php" method="get">
                    <div class="modal-body">
                        <?php
                          $id_peminjam=$row['id_peminjam'];
                          $result= mysqli_query($koneksi, "SELECT * FROM peminjam where id_peminjam='$id_peminjam'");                
                          while ($bio= mysqli_fetch_array($result)) {
                        ?>
                        <div class="form-group">
                          <label>Id Peminjam</label>
                          <input name="id_peminjam" type="text" class="form-control" id="id_peminjam" value="<?php echo $bio['id_peminjam']; ?>" readonly/>
                        </div>

                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input name="nama_peminjam" type="text" class="form-control" id="nama_peminjam" value="<?php echo $bio['nama_peminjam']; ?>" required/>
                        </div>

                        <div class="form-group">
                          <label>Unit Kerja</label>
                          <input name="unitkerja" type="text" class="form-control" id="unitkerja" value="<?php echo $bio['unitkerja']; ?>" required/>
                        </div>

                        <div class="form-group">
                          <label>No.Telp</label>
                          <input name="no_telp_peminjam" type="text" class="form-control" id="no_telp_peminjam" value="<?php echo $bio['no_telp_peminjam']; ?>" required/>
                        </div>

                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="edit">Save</button>
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