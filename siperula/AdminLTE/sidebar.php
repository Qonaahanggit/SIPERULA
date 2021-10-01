<?php
  include 'script.html';
  include 'reel.html';
  ?>
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
     <img src="../../AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">SIPERULA</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="../../AdminLTE/dist/img/concon.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">Qona'ah Anggit</a>
       </div>
     </div>

     <!-- SidebarSearch Form -->
     <div class="form-inline">
       <div class="input-group" data-widget="sidebar-search">
         <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
         <div class="input-group-append">
           <button class="btn btn-sidebar">
             <i class="fas fa-search fa-fw"></i>
           </button>
         </div>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../form/tb_ruangan/data_ruangan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Ruangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../form/tb_peralatan/data_peralatan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Peralatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../form/tb_peminjam/data_peminjam.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Peminjam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../form/tb_pegawai/data_pegawai.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../form/tb_jenis/data_jenis.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jenis</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
           <a href="../../form/tb_user/data_user.php" class="nav-link">
             <i class="fas fa-users"></i>
             <p>
               Data User
             </p>
           </a>
         </li>

         <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Pengajuan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../form/tb_peru/data_peru.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peminjaman Ruangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../form/tb_pera/data_pera.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peminjaman Peralatan</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Pengembalian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../form/tb_pengembaru/data_pengembaru.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengembalian Ruangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../form/tb_pengembalat/data_pengembalat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengembalian Peralatan</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
              Verifikasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../form/tb_vperu/data_vperu.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peminjaman Ruangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../form/tb_vpera/data_vpera.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peminjaman Peralatan</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->

   </div>
   <!-- /.sidebar -->
 </aside>