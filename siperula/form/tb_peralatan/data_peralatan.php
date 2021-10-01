<?php
  include "../../config.php";

  include "c_tambahperalatan.php";
  include "c_editperalatan.php";
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
  <link rel="stylesheet" href="../css/a.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../AdminLTE/dist/css/adminlte.min.css">


</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php
    
    include "../../AdminLTE/header.php";
    include "../../AdminLTE/sidebar.php";
    
    $user = mysqli_query($koneksi, "SELECT * FROM peralatan");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Peralatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Peralatan</li>
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
                      <th><center>Nama Peralatan</center></th>
                      <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                
                  <tbody>
                    <?php $i = 1; ?>
                    
                    <?php foreach ($user as $row) : ?>
                            <tr>
                                <td><center><?= $i ?></center></td>
                                <td><center><?php echo $row['nama_peralatan']; ?></center></td>
                                <td><center>
                                <a data-toggle ="modal" data-target="#modaldetail<?php echo $row['id_peralatan']; ?>" class ="btn btn-app"><i class="far fa-eye"></i></a>
                                    <a data-toggle ="modal" data-target="#myModal<?php echo $row['id_peralatan']; ?>" class ="btn btn-app"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="c_hapusperalatan.php?id_peralatan=<?= $row["id_peralatan"]; ?>"class ="btn btn-app"><i class="fas fa-trash-alt"></i></a>                                
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
              <h4 class="modal-title">Tambah Data Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method ="post" action ="data_peralatan.php">
            <div class="modal-body">

              <div class="form-group">
                  <label>Nama Peralatan</label>
                  <input name = "nama_peralatan" type="text" class="form-control" id="nama_peralatan" placeholder="Nama Peralatan" required/>
              </div>

              <div class="form-group">
                  <label>Jenis Peralatan</label>
                  <input name = "jenis_peralatan" type="text" class="form-control" id="jenis_peralatan" placeholder="Jenis Peralatan" required/>
              </div>

              <div class="form-group">
                  <label>Merk Peralatan</label>
                  <input name = "merk_peralatan" type="text" class="form-control" id="merk_peralatan" placeholder="Merk Peralatan" required/>
              </div>

                <div class="form-group">
                    <label for="foto_peralatan">Foto Peralatan</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto_peralatan" name="foto_peralatan">
                        <label class="custom-file-label" for="foto_peralatan">Choose file</label>
                    </div>
                    </div>
                    </div>
                </div>

              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name = "tambah">Save changes</button>
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
      <div class="modal fade" id="myModal<?php echo $row['id_peralatan']; ?>" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Peralatan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="c_editperalatan.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <?php
              $id_peralatan=$row['id_peralatan'];
              $result= mysqli_query($koneksi, "SELECT * FROM peralatan where id_peralatan='$id_peralatan'");                
              while ($bio= mysqli_fetch_array($result)) {
            ?>

              <div class="form-group">
                  <label>Nama Peralatan</label>
                  <input name = "nama_peralatan" type="text" class="form-control" value="<?php echo $bio['nama_peralatan']; ?>" placeholder="Nama Peralatan">
              </div>

              <div class="form-group">
                  <label>jenis_peralatan</label>
                  <input name = "jenis_peralatan" type="text" class="form-control" value="<?php echo $bio['jenis_peralatan']; ?>" placeholder="jenis_peralatan">
              </div>

              <div class="form-group">
                  <label>Merk Peralatan</label>
                  <input name = "merk_peralatan" type="text" class="form-control" value="<?php echo $bio['merk_peralatan']; ?>" placeholder="Merk Peralatan">
              </div>

              <div class="form-group">
                  <label>Foto Peralatan</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input type="hidden" name="foto_peralatan" class="form-control" value="<?php echo $bio['foto_peralatan']; ?>">
                        <input type="file" name="foto_peralatan" id="foto_peralatan" class="form-control" />
                    </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name = "edit">Save changes</button>
            </div>

              <?php 
                }
              ?>  
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php endforeach ?>

       <!-- Modal Lihat Detail -->
    <?php $no = 0;
      foreach ($user as $row) : $no++; ?>
      <div class="modal fade" id="modaldetail<?php echo $row['id_peralatan']; ?>">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Detail Data Peralatan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  
                  <div class="modal-body">
                  <?php
                    $id_peralatan=$row['id_peralatan'];
                    $result= mysqli_query($koneksi, "SELECT * FROM peralatan where id_peralatan='$id_peralatan'");                
                    while ($bio= mysqli_fetch_array($result)) {
                  ?>
                  <form>
                  <div class="row text-center">
                    <div class="col-1"></div>
                    <div class="col-1 text-center"></div>
                    <div class="col-3 text-left">
                      <ul>
                        <li class="p-2"><b>Id Peralatan</b></li>
                        <li class="p-2"><b>Nama Peralatan</b></li>
                        <li class="p-2"><b>Jenis</b></li>
                        <li class="p-2"><b>Merk</b></li>
                        <li class="p-2"><b>Foto Peralatan</b></li>
                      </ul>
                    </div>
                    
                    <ul>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                      </ul>

                    <div class="col text-left">
                      <ul>
                        <li class="p-2"><b><?php echo $row['id_peralatan']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['nama_peralatan']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['jenis_peralatan']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['merk_peralatan']; ?></b></li>
                        <li class="p-2"><b><img src="foto/<?php echo $row['foto_peralatan'];?>"width="100px" height="100px"></b></li>
                      </ul>
                    </div>
                  </div>
                  
                  <?php
                    }
                  ?>

                  </div>
                  <div class="modal-footer justify-content-between">
                      <a href="data_pegawai.php" type="submit" class="btn btn-danger" data-dismiss="modal">Tutup</a>
                      </form>
                  </div>
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