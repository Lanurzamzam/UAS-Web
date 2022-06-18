<?php
 error_reporting(0);
session_start();

if(empty($_SESSION['ad'])){
     echo "<script>
          location.replace('../index.php')</script>";
  } else{
    $id=$_SESSION['ad'];
  }
?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pemesanan Tiket Bis Jakarta</title>
    <link rel="shortcut icon" href="../assets/images/icon.png"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/font awesome/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../assets/plugins/font awesome/ionicons.min.css">
     <!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap.css">

    <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/plugins/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/plugins/dist/css/skins/_all-skins.min.css">
   
  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
    
    <div class="wrapper">
          <div class="logo">
            <img src="../assets/images/logo.webp" alt="" style="width: 65px;height: 50px;padding: 0px 0px 0px 0px;margin:0px 0px 0px 45px"> PO NPM PADANG
        </div>
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Adm</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
     
              <!-- User Account: style can be found in dropdown.less -->
                       <?php 
                         include '../config/koneksi.php';
                         
                         

                                 $query4=mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE kd_admin='$id'");
                                $q=mysqli_fetch_array($query4);
                               
                                ?>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../assets/images/users/<?php echo $q['foto']; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $q['nama']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../assets/images/users/<?php echo $q['foto']; ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $q['nama']; ?>
                      <small>Admin</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                 
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                        <a href="home.php?p=profil-admin" class="btn btn-default btn-flat"><i class="fa fa-user"> Profil</i></a>
                    </div>
                    <div class="pull-right">
                        <a href="../logout/logout.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"> Keluar</i></a>
                    </div>
                  </li>
                </ul>
              </li>

              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="margin-top: 60px;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../assets/images/users/<?php echo $q['foto']; ?>" class="img-rounded" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $q['nama']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li class="treeview">
              <a href="home.php?p=homeAdmin">
                <i class="glyphicon glyphicon-th-large"></i> <span>Beranda</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Pesanan Tiket</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="home.php?p=list-pemesanan-menunggu-pengecekan"><i class="fa fa-circle-o"></i> Menunggu Pengecekan</a></li>
                <li><a href="home.php?p=list-pemesanan-menunggu-pembayaran"><i class="fa fa-circle-o"></i> Menunggu pembayaran</a></li>
                <li><a href="home.php?p=list-pemesanan-sukses"><i class="fa fa-circle-o"></i> Pemesanan Sukses</a></li>
                 <li><a href="home.php?p=list-pemesanan-cancel"><i class="fa fa-circle-o"></i> Pemesanan Cancel</a></li>
                
              </ul>
            </li>
     
             <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>Penjualan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
             
              <li><a href="home.php?p=lap-tiket-hari"><i class="fa fa-circle-o"></i>Penjualan Tiket Hari</a></li>
              <li><a href="home.php?p=lap-tiket-bulan"><i class="fa fa-circle-o"></i>Penjualan Tiket Bulan</a></li>
              <li><a href="home.php?p=lap-tiket-tahun"><i class="fa fa-circle-o"></i>Penjulan Tiket Tahunan</a></li>
              <li><a href="home.php?p=laporan-pemesanan"><i class="fa fa-circle-o"></i>Semua Penjualan Tiket</a></li>
            
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-ticket"></i>
                <span>Tiket</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="home.php?p=list-tiket"><i class="fa fa-circle-o"></i>List Tiket </a></li>
            
              </ul>
            </li>
         
            <li class="treeview">
              <a href="#">
                <i class="fa fa-exchange"></i>
                <span>Keberangkatan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="home.php?p=tambah-keberangkatan"><i class="fa fa-circle-o"></i> Tambah Keberangkatan</a></li>
              <li><a href="home.php?p=list-keberangkatan"><i class="fa fa-circle-o"></i> List Keberangkatan</a></li>
                
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Member</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="home.php?p=list-member"><i class="fa fa-circle-o"></i> List Member</a></li>
                <li><a href="home.php?p=laporan-member"><i class="fa fa-circle-o"></i> Laporan Member</a></li>
                
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-arrow-left"></i>
                <span>Tujuan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="home.php?p=tambah-tujuan"><i class="fa fa-circle-o"></i> Tambah Tujuan</a></li>
                <li><a href="home.php?p=list-tujuan"><i class="fa fa-circle-o"></i> List Tujuan</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-clock-o"></i>
                <span>Jadwal</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="home.php?p=tambah-jadwal"><i class="fa fa-circle-o"></i> Tambah Jadwal</a></li>
                <li><a href="home.php?p=list-jadwal"><i class="fa fa-circle-o"></i> List Jadwal</a></li>
               
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-bus"></i>
                <span>Mobil</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="home.php?p=tambah-mobil"><i class="fa fa-circle-o"></i> Tambah Mobil</a></li>
                <li><a href="home.php?p=list-mobil"><i class="fa fa-circle-o"></i> List Mobil</a></li>
               
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Sopir</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="home.php?p=tambah-sopir"><i class="fa fa-circle-o"></i> Tambah Sopir</a></li>
                <li><a href="home.php?p=list-sopir"><i class="fa fa-circle-o"></i> List Sopir</a></li>
               
              </ul>
            </li>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Kursi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="home.php?p=tambah-kursi"><i class="fa fa-circle-o"></i> Tambah Kursi</a></li>
                <li><a href="home.php?p=list-kursi"><i class="fa fa-circle-o"></i> List Kursi</a></li>
               
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      
        <?php
            $page_dir='pages';
            if(!empty($_GET['p'])){
                $page=scandir($page_dir,0);
                unset($page[0],$page[1]);
                $p=$_GET['p'];
                if(in_array($p.'.php',$page)){
                    include($page_dir.'/'.$p.'.php');
                }
                else{
                    include ($page_dir.'/404-page.php');
                }
            }
            else{
                 include ($page_dir.'/homeAdmin.php');
            }
            ?>
     
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b> 
        </div>
        <strong>Universitas Pembangunan Jaya &copy; <?php echo date('Y'); ?></strong>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark" style="top:50px;">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
         
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
  
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
     <script src="../assets/js/jquery-nopen.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="../assets/js/bootstrap.min.js"></script>
     <!-- DataTables -->

     <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- Slimscroll -->
    <script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/plugins/dist/js/app.min.js"></script>
  
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/plugins/dist/js/demo.js"></script>

    <script>
      $(function () {
        $("#example1").DataTable({
          "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
            "sEmptyTable": "Tidak ada data di database",
            "sProcessing":   "Sedang memproses...",
    "sLengthMenu":   "Tampilkan _MENU_ entri",
    "sZeroRecords":  "Tidak ditemukan data yang sesuai",
    "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    "sInfoPostFix":  "",
    "sSearch":       "Cari:",
    "sUrl":          "",
    "oPaginate": {
        "sFirst":    "Pertama",
        "sPrevious": "Sebelumnya",
        "sNext":     "Selanjutnya",
        "sLast":     "Terakhir"
    }
        }
        });
        $('#example2').DataTable({
             
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

  </body>
</html>
