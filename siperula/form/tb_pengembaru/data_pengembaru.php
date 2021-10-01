<?php
  include "../../config.php";

  include "c_tambahpengembaru.php";
  include "c_editpengembaru.php";
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
    
    $user = mysqli_query($koneksi, "SELECT * FROM pengembaru INNER JOIN pegawai ON pengembaru.id_pegawai=pegawai.id_pegawai");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pengembalian Ruangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pengembalian Ruangan</li>
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
                      <th><center>Tanggal Pengembalian</center></th>
                      <th><center>Kondisi Ruangan</center></th>
                      <th><center>Foto Ruangan</center></th>
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
                                <td><?php echo $row['tgl_pengembaru']; ?></td>
                                <td><?php echo $row['kondisi_ruangan']; ?></td>
                                <td><img src="foto/<?php echo $row['foto_pengembaru'];?>"width="100px" height="100px"></td>
                                <td><center>
                                    <a data-toggle ="modal" data-target="#modaldetail<?php echo $row['id_pengembaru']; ?>" class ="btn btn-app"><i class="far fa-eye"></i></a>
                                    <a data-toggle ="modal" data-target="#myModal<?php echo $row['id_pengembaru']; ?>" class ="btn btn-app"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="c_hapuspengembaru.php?id_pengembaru=<?= $row["id_pengembaru"]; ?>"class ="btn btn-app"><i class="fas fa-trash-alt"></i></a>                                
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
              <h4 class="modal-title">Tambah Data Pengembalian Ruangan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method ="post" action ="data_pengembaru.php" enctype="multipart/form-data">
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
                  <label>Tanggal Pengembalian</label>
                  <input name = "tgl_pengembaru" type="date" class="form-control" id="tgl_pengembaru" placeholder="Tanggal Pengembalian" required/>
                </div>
                <div class="form-group">
                    <label>Kondisi Ruangan</label>
                    <input name = "kondisi_ruangan" type="text" class="form-control" id="kondisi_ruangan" placeholder="Kondisi Ruangan" required/>
                </div>
                <div class="form-group">
                        <label for="foto_pengembaru">Foto Ruangan</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto_pengembaru" name="foto_pengembaru">
                                <label class="custom-file-label" for="foto_pengembaru">Choose file</label>
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
      <div class="modal fade" id="myModal<?php echo $row['id_pengembaru']; ?>" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Pengembalian Ruangan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="c_editpengembaru.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <?php
              $id_pengembaru=$row['id_pengembaru'];
              $result= mysqli_query($koneksi, "SELECT * FROM pengembaru where id_pengembaru='$id_pengembaru'");                
              while ($bio= mysqli_fetch_array($result)) {
            ?>

            <div class="form-group">
                  <label>Id Pengembalian Ruangan</label>
                  <input name = "id_pengembaru" type="text" class="form-control" value="<?php echo $bio['id_pengembaru']; ?>" placeholder="Id Peminjaman Ruangan" readonly/>
              </div>
              <div class="form-group">
                  <label>Tanggal Pengembalian</label>
                  <input name = "tgl_pengembaru" type="date" class="form-control" value="<?php echo $bio['tgl_pengembaru']; ?>" placeholder="Tanggal Pengembalian">
              </div>
              <div class="form-group">
                  <label>Kondisi Ruangan</label>
                  <input name = "kondisi_ruangan" type="text" class="form-control" value="<?php echo $bio['kondisi_ruangan']; ?>" placeholder="Kondisi Ruangan">
              </div>
              <div class="form-group">
                    <label>Foto Ruangan</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input type="hidden" name="foto_pengembaru" class="form-control" value="<?php echo $bio['foto_pengembaru']; ?>">
                        <input type="file" name="foto_pengembaru" id="foto_pengembaru" class="form-control" />
                    </div>
                    </div>
                </div>
              </div>
              
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
      <div class="modal fade" id="modaldetail<?php echo $row['id_pengembaru']; ?>">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Detail Data Pengembalian Ruangan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  
                  <div class="modal-body">
                  <?php
                    $id_pengembaru=$row['id_pengembaru'];
                    $result= mysqli_query($koneksi, "SELECT * FROM pengembaru where id_pengembaru='$id_pengembaru'");                
                    while ($bio= mysqli_fetch_array($result)) {
                  ?>
                  <form>
                  <div class="row text-center">
                    <div class="col-1"></div>
                    <div class="col-1 text-center"></div>
                    <div class="col-4 text-left">
                      <ul>
                        <li class="p-1"><b>Id Pengembalian Ruangan</b></li>
                        <li class="p-1"><b>Id Peminjaman Ruangan</b></li>
                        <li class="p-1"><b>Nama Pegawai</b></li>
                        <li class="p-1"><b>Tanggal Pengembalian</b></li>
                        <li class="p-1"><b>Kondisi Ruangan</b></li>
                        <li class="p-1"><b>Foto Ruangan</b></li>
                      </ul>
                    </div>
                    
                    <ul>
                        <li class="p-1"><b>:</b></li>
                        <li class="p-1"><b>:</b></li>
                        <li class="p-1"><b>:</b></li>
                        <li class="p-1"><b>:</b></li>
                        <li class="p-1"><b>:</b></li>
                        <li class="p-1"><b>:</b></li>
                    </ul>

                    <div class="col text-left">
                      <ul>
                        <li class="p-1"><b><?php echo $row['id_pengembaru']; ?></b></li>
                        <li class="p-1"><b><?php echo $row['id_peru']; ?></b></li>
                        <li class="p-1"><b><?php echo $row['nama_pegawai']; ?></b></li>
                        <li class="p-1"><b><?php echo $row['tgl_pengembaru']; ?></b></li>
                        <li class="p-1"><b><?php echo $row['kondisi_ruangan']; ?></b></li>
                        <li class="p-2"><b><img src="foto/<?php echo $row['foto_pengembaru'];?>"width="100px" height="100px"></b></li>
                      </ul>
                    </div>
                  </div>
                  
                  <?php
                    }
                  ?>

                  </div>
                  <div class="modal-footer justify-content-between">
                      <a href="data_pegawai.php" type="submit" class="btn btn-default" data-dismiss="modal">Close</a>
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