<?php
  include "../../config.php";

  include "c_tambahpera.php";
  include "c_editpera.php";
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
    
    $user = mysqli_query($koneksi, "SELECT * FROM pera INNER JOIN peminjam ON pera.id_peminjam=peminjam.id_peminjam
    INNER JOIN peralatan ON pera.id_peralatan=peralatan.id_peralatan INNER JOIN jenis ON pera.id_jenis=jenis.id_jenis");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Peminjaman Peralatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Peminjaman Peralatan</li>
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
                      <th><center>Nama Peminjam</center></th>
                      <th><center>Nama Peralatan</center></th>
                      <th><center>Tanggal Peminjaman</center></th>
                      <th><center>Tanggal Pengembalian</center></th>
                      <th><center>Keperluan</center></th>
                      <th><center>Proposal</center></th>
                      <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                
                  <tbody>
                    <?php $i = 1; ?>
                    
                    <?php foreach ($user as $row) : ?>
                            <tr>
                                <td><center><?= $i ?></center></td>
                                <td><?php echo $row['nama_peminjam']; ?></td>
                                <td><?php echo $row['nama_peralatan']; ?></td>
                                <td><?php echo $row['tgl_pera1']; ?></td>
                                <td><?php echo $row['tgl_pera2']; ?></td>
                                <td><?php echo $row['keperluan_pera']; ?></td>
                                <td><a target="_blank" href="$lokasi_proposal_pera"></a><?php echo $row['proposal_pera']; ?></td>
                                <td><center>
                                    <a data-toggle ="modal" data-target="#modaldetail<?php echo $row['id_pera']; ?>" class ="btn btn-app"><i class="far fa-eye"></i></a>
                                    <a data-toggle ="modal" data-target="#myModal<?php echo $row['id_pera']; ?>" class ="btn btn-app"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="c_hapuspera.php?id_pera=<?= $row["id_pera"]; ?>"class ="btn btn-app"><i class="fas fa-trash-alt"></i></a>                                
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
              <h4 class="modal-title">Tambah Data Peminjaman Peralatan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method ="post" action ="data_pera.php" enctype="multipart/form-data">
            <div class="modal-body">
             
              <div class="form-row">
                <div class="form-group col-12">
                    <label for="exampleSelectRounded0">Nama Peminjam</label>
                    <select type="text" class="form-control" aria-describedby="emailHelp" name="id_peminjam" id="id_peminjam">
                      <option> Silahkan Pilih</option>
                        <?php $tb_peminjam = mysqli_query($koneksi, "SELECT * FROM peminjam ");
                          foreach ($tb_peminjam as $dtg) : 
                        ?>
                      <option value="<?php echo $dtg['id_peminjam'] ?>" nama_peminjam="<?php echo $dtg['nama_peminjam'] ?>"><?php echo $dtg['nama_peminjam'] ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                </div>  

                <div class="form-row">
                  <div class="form-group col-6">
                    <label for="exampleSelectRounded0">Nama Peralatan</label>
                    <select type="text" class="form-control" aria-describedby="emailHelp" name="id_peralatan" id="id_peralatan">
                      <option> Silahkan Pilih</option>
                        <?php $tb_peralatan = mysqli_query($koneksi, "SELECT * FROM peralatan ");
                          foreach ($tb_peralatan as $dtg) : 
                        ?>
                      <option value="<?php echo $dtg['id_peralatan'] ?>" nama_peralatan="<?php echo $dtg['nama_peralatan'] ?>"><?php echo $dtg['nama_peralatan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-6">
                    <label for="exampleSelectRounded0">Jenis Peminjaman</label>
                    <select type="text" class="form-control" aria-describedby="emailHelp" name="id_jenis" id="id_jenis">
                      <option> Silahkan Pilih</option>
                        <?php $tb_jenis = mysqli_query($koneksi, "SELECT * FROM jenis ");
                          foreach ($tb_jenis as $dtg) : 
                        ?>
                      <option value="<?php echo $dtg['id_jenis'] ?>" jenis="<?php echo $dtg['jenis'] ?>"><?php echo $dtg['jenis'] ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-6">
                      <label>Tanggal Peminjaman</label>
                      <input name = "tgl_pera1" type="date" class="form-control" id="tgl_pera1" placeholder="Tanggal Peminjaman" required/>
                  </div>
                  <div class="form-group col-6">
                      <label>Tanggal Pengembalian</label>
                      <input name = "tgl_pera2" type="date" class="form-control" id="tgl_pera2" placeholder="Tanggal Pengembalian" required/>
                  </div>
                </div>

                  <div class="form-group col-12">
                      <label>Keperluan</label>
                      <input name = "keperluan_pera" type="text" class="form-control" id="keperluan_pera" placeholder="Keperluan" required/>
                  </div>
                  <div class="form-group col-12">
                        <label for="proposal_pera">Proposal</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="proposal_pera" name="proposal_pera">
                                <label class="custom-file-label" for="proposal_pera">Choose file</label>
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
      <div class="modal fade" id="myModal<?php echo $row['id_pera']; ?>" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Peminjaman Peralatan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="c_editpera.php" method="get" enctype="multipart/form-data">
            <div class="modal-body">
            <?php
              $id_pera=$row['id_pera'];
              $result= mysqli_query($koneksi, "SELECT * FROM pera where id_pera='$id_pera'");                
              while ($bio= mysqli_fetch_array($result)) {
            ?>

              <div class="form-group" hidden>
                  <label>Id Peminjaman Peralatan</label>
                  <input name = "id_pera" type="text" class="form-control" value="<?php echo $bio['id_pera']; ?>" placeholder="Id Peminjaman Peralatan">
              </div>

              <div class="form-group">
                  <label>Tanggal Peminjaman</label>
                  <input name = "tgl_pera1" type="date" class="form-control" value="<?php echo $bio['tgl_pera1']; ?>" placeholder="Tanggal Peminjaman">
              </div>
              <div class="form-group">
                  <label>Tanggal Pengembalian</label>
                  <input name = "tgl_pera2" type="date" class="form-control" value="<?php echo $bio['tgl_pera2']; ?>" placeholder="Tanggal Pengembalian">
              </div>

              <div class="form-group">
                  <label>Keperluan</label>
                  <input name = "keperluan_pera" type="text" class="form-control" value="<?php echo $bio['keperluan_pera']; ?>" placeholder="Keperluan">
              </div>
              <div class="form-group">
                    <label>Proposal</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input name="proposal_pera" type="file" value="<?php echo $bio['proposal_pera']; ?>">
                        <label class="custom-file-label" for="proposal_pera">Choose file</label>
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
      <div class="modal fade" id="modaldetail<?php echo $row['id_pera']; ?>">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Detail Data Peminjaman Peralatan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  
                  <div class="modal-body">
                  <?php
                    $id_pera=$row['id_pera'];
                    $result= mysqli_query($koneksi, "SELECT * FROM pera where id_pera='$id_pera'");                
                    while ($bio= mysqli_fetch_array($result)) {
                  ?>
                  <form>
                  <div class="row text-center">
                    <div class="col-1"></div>
                    <div class="col-1 text-center"></div>
                    <div class="col-4 text-left">
                      <ul>
                        <li class="p-2"><b>Id Peminjaman Peralatan</b></li>
                        <li class="p-2"><b>Nama Peminjam</b></li>
                        <li class="p-2"><b>Nama Peralatan</b></li>
                        <li class="p-2"><b>Jenis Peminjaman</b></li>
                        <li class="p-2"><b>Tanggal Peminjaman</b></li>
                        <li class="p-2"><b>Tanggal Pengembalian</b></li>
                        <li class="p-2"><b>Keperluan</b></li>
                        <li class="p-2"><b>Proposal</b></li>
                      </ul>
                    </div>
                    
                    <ul>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                        <li class="p-2"><b>:</b></li>
                      </ul>

                    <div class="col text-left">
                      <ul>
                        <li class="p-2"><b><?php echo $row['id_pera']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['nama_peminjam']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['nama_peralatan']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['jenis']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['tgl_pera1']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['tgl_pera2']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['keperluan_pera']; ?></b></li>
                        <li class="p-2"><b><?php echo $row['proposal_pera']; ?></b></li>
                      </ul>
                    </div>
                  </div>
                  
                  <?php
                    }
                  ?>

                  </div>
                  <div class="modal-footer justify-content-between">
                      <a href="data_pera.php" type="submit" class="btn btn-danger" data-dismiss="modal">Close</a>
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
    $("#id_peminjam").on("change", function(){
      var nama_peminjam = $("#id_peminjam option:selected").attr("nama_peminjam");
      $("#nama_peminjam").val(nama_peminjam);
    });

  });

</script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#id_peraalatan").on("change", function(){
      var nama_peralatan = $("#id_peraalatan option:selected").attr("nama_peralatan");
      $("#nama_peralatan").val(nama_peralatan);
    });

  });

</script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#id_jenis").on("change", function(){
      var jenis = $("#id_jenis option:selected").attr("jenis");
      $("#jenis").val(jenis);
    });

  });

</script>

</body>
</html>