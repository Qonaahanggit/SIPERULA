<?php
  include "../../config.php";

  include "c_tambahpegawai.php";
  include "c_editpegawai.php";
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
    
    $user = mysqli_query($koneksi, "SELECT * FROM pegawai");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
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
                      <th><center>Id Pegawai</center></th>
                      <th><center>Nama Pegawai</center></th>
                      <th><center>Jabatan</center></th>
                      <th><center>No.Telp</center></th>
                      <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                
                  <tbody>
                    <?php $i = 1; ?>
                    
                    <?php foreach ($user as $row) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?php echo $row['id_pegawai']; ?></td>
                                <td><?php echo $row['nama_pegawai']; ?></td>
                                <td><?php echo $row["jabatan"]; ?></td>
                                <td><?php echo $row["no_telp_pegawai"]; ?></td>
                                <td><center>
                                    <a data-toggle ="modal" data-target="#modaldetail<?php echo $row['id_pegawai']; ?>" class ="btn btn-app"><i class="far fa-eye"></i></a>
                                    <a data-toggle ="modal" data-target="#myModal<?php echo $row['id_pegawai']; ?>" class ="btn btn-app"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="c_hapuspegawai.php?id_pegawai=<?= $row["id_pegawai"]; ?>"class ="btn btn-app"><i class="fas fa-trash-alt"></i></a>                                
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
            <form method ="post" action ="data_pegawai.php" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                  <label>Id Pegawai</label>
                  <input name = "id_pegawai" type="text" class="form-control" id="id_pegawai" placeholder="NIP/NPAK" required/>
              </div>

              <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input name = "nama_pegawai" type="text" class="form-control" id="nama_pegawai" placeholder="Nama Lengkap" required/>
              </div>

              <div class="form-group">
                  <label>Jabatan</label>
                  <input name = "jabatan" type="text" class="form-control" id="jabatan" placeholder="Jabatan" required/>
              </div>

              <div class="form-group">
                  <label>No.Telp</label>
                  <input name = "no_telp_pegawai" type="number" class="form-control" id="no_telp_pegawai" placeholder="No.Telp" required/>
              </div>

                <div class="form-group">
                    <label for="ttd_pegawai">Tanda Tangan</label>
                      <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="ttd_pegawai" name="ttd_pegawai">
                            <label class="custom-file-label" for="ttd_pegawai">Choose file</label>
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
      <div class="modal fade" id="myModal<?php echo $row['id_pegawai']; ?>" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="c_editpegawai.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
            <?php
              $id_pegawai=$row['id_pegawai'];
              $result= mysqli_query($koneksi, "SELECT * FROM pegawai where id_pegawai='$id_pegawai'");                
              while ($bio= mysqli_fetch_array($result)) {
            ?>

            <div class="form-group">
                  <label>Id Pegawai</label>
                  <input name = "id_pegawai" type="text" class="form-control" value="<?php echo $bio['id_pegawai']; ?>" placeholder="Id Pegawai" readonly/>
              </div>

              <div class="form-group">
                  <label>Nama Pegawai</label>
                  <input name = "nama_pegawai" type="text" class="form-control" value="<?php echo $bio['nama_pegawai']; ?>" placeholder="Nama Pegawai">
              </div>

              <div class="form-group">
                  <label>Jabatan</label>
                  <input name = "jabatan" type="text" class="form-control" value="<?php echo $bio['jabatan']; ?>" placeholder="Jabatan">
              </div>

              <div class="form-group">
                  <label>No.Telp</label>
                  <input name = "no_telp_pegawai" type="number" class="form-control" value="<?php echo $bio['no_telp_pegawai']; ?>" placeholder="No.Telp">
              </div>

              <div class="form-group">
                  <label>Tanda Tangan</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input type="hidden" name="ttd_pegawai" class="form-control" value="<?php echo $bio['ttd_pegawai']; ?>">
                        <input type="file" name="ttd_pegawai" id="ttd_pegawai" class="form-control" />
                    </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name ="edit">Save changes</button>
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
      <div class="modal fade" id="modaldetail<?php echo $row['id_pegawai']; ?>">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Detail Data Pegawai</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  
                  <div class="modal-body">
                  <?php
                    $id_pegawai=$row['id_pegawai'];
                    $result= mysqli_query($koneksi, "SELECT * FROM pegawai where id_pegawai='$id_pegawai'");                
                    while ($bio= mysqli_fetch_array($result)) {
                  ?>
                  <form>
                  <div class="row text-center">
                    <div class="col-1"></div>
                    <div class="col-1 text-center"></div>
                    <div class="col-3 text-left">
                      <ul>
                        <li class="p-2"><b>Id Pegawai</b></li>
                        <li class="p-2"><b>Nama pegawai</b></li>
                        <li class="p-2"><b>Jabatan</b></li>
                        <li class="p-2"><b>No.Telp</b></li>
                        <li class="p-2"><b>Tanda Tangan</b></li>
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
                        <li class="p-2"><b><?php echo $row['id_pegawai']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['nama_pegawai']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['jabatan']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['no_telp_pegawai']; ?></b></li>
                        <li class="p-2"><b><img src="ttd/<?php echo $row['ttd_pegawai'];?>"width="100px" height="100px"></b></li>
                      </ul>
                    </div>
                  </div>
                  
                  <?php
                    }
                  ?>

                  </div>
                  <div class="modal-footer justify-content-between">
                      <a href="data_pegawai.php" type="submit" class="btn btn-default" data-dismiss="modal">Tutup</a>
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