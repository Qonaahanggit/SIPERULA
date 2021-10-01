<?php
  include "../../config.php";

  include "c_tambahuser.php";
  include "c_edituser.php";
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
    
    $user = mysqli_query($koneksi, "SELECT * FROM user INNER JOIN pegawai ON user.id_pegawai = pegawai.id_pegawai");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
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
                      <th><center>Nama Pegawai</center></th>
                      <th><center>Level</center></th>
                      <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                
                  <tbody>
                    <?php $i = 1; ?>
                    
                    <?php foreach ($user as $row) : ?>
                            <tr>
                                <td><center><?= $i ?></center></td>
                                <td><?php echo $row['nama_pegawai']; ?></td>
                                <td><?php echo $row['level']; ?></td>
                                <td><center>
                                    <a data-toggle ="modal" data-target="#modaldetail<?php echo $row['username']; ?>" class ="btn btn-app"><i class="far fa-eye"></i></a>
                                    <a data-toggle ="modal" data-target="#myModal<?php echo $row['username']; ?>" class ="btn btn-app"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="c_hapususer.php?username=<?= $row["username"]; ?>"class ="btn btn-app"><i class="fas fa-trash-alt"></i></a>                                
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
              <h4 class="modal-title">Tambah Data User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method ="post" action ="data_user.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input name = "username" type="text" class="form-control" id="username" placeholder="Username" required/>
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
                        <label>Password</label>
                        <input name = "password" type="text" class="form-control" id="password" placeholder="Password" required/>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectRounded0">Level</label>
                        <select class="custom-select rounded-0" id="level"name="level" required>
                            <option> ---- Pilih Salah Satu ---- </option>
                            <option value="BAAK">BAAK</option>
                            <option value="BAUP">BAUP</option>
                            <option value="Wakil Direktur III">Wakil Direktur III</option>
                            <option value="SATGAS COVID-19">SATGAS COVID-19</option>
                        </select>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    <div class="modal fade" id="myModal<?php echo $row['username']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="c_edituser.php" method="get">
                    <div class="modal-body">
                        <?php
                        $username=$row['username'];
                        $result= mysqli_query($koneksi, "SELECT * FROM user where username='$username'");                
                        while ($bio= mysqli_fetch_array($result)) {
                        ?>

                        <div class="form-group">
                            <label>Username</label>
                            <input name = "username" type="text" class="form-control" value="<?php echo $bio['username']; ?>" placeholder="Username" readonly />
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input name = "password" type="text" class="form-control" value="<?php echo $bio['password']; ?>" placeholder="password">
                        </div>

                        <div class="form-group">
                        <label for="exampleSelectRounded0">Level</label>
                        <select class="custom-select rounded-0" id="level"name="level" required>
                            <option><?php echo $bio['level']; ?></option>
                            <option value="BAAK">BAAK</option>
                            <option value="BAUP">BAUP</option>
                            <option value="Wakil Direktur III">Wakil Direktur III</option>
                            <option value="SATGAS COVID-19">SATGAS COVID-19</option>
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

<!-- Modal Lihat Detail -->
<?php $no = 0;
      foreach ($user as $row) : $no++; ?>
      <div class="modal fade" id="modaldetail<?php echo $row['username']; ?>">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Detail Data User</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  
                  <div class="modal-body">
                  <?php
                    $username=$row['username'];
                    $result= mysqli_query($koneksi, "SELECT * FROM user where username='$username'");                
                    while ($bio= mysqli_fetch_array($result)) {
                  ?>
                  <form>
                  <div class="row text-center">
                    <div class="col-1"></div>
                    <div class="col-1 text-center"></div>
                    <div class="col-3 text-left">
                      <ul>
                        <li class="p-2"><b>Username</b></li>
                        <li class="p-2"><b>Nama Pegawai</b></li>
                        <li class="p-2"><b>Password</b></li>
                        <li class="p-2"><b>Level</b></li>
                      </ul>
                    </div>
                    
                    <ul>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                      </ul>

                    <div class="col text-left">
                      <ul>
                        <li class="p-2"><b><?php echo $row['username']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['nama_pegawai']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['password']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['level']; ?></b></li>
                      </ul>
                    </div>
                  </div>
                  
                  <?php
                    }
                  ?>

                  </div>
                  <div class="modal-footer justify-content-between">
                      <a href="data_peru.php" type="submit" class="btn btn-danger" data-dismiss="modal">Close</a>
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

<script type="text/javascript">
  $(document).ready(function(){
    $("#id_pegawai").on("change", function(){
      var nama_pegawai = $("#id_pegawai option:selected").attr("nama_pegawai");
      $("#nama_pegawai").val(nama_pegawai);
    });

  });

</script>


</body>
</html>