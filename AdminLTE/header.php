<?php
require_once "../config/database.php";
session_start();
@$username = current( explode( '@', $_SESSION['username'] ) );
if($username==""){
  header("Location: ../login.php");
  return;
}
$s=mysqli_query($db,"select * from site");
$a=mysqli_query($db,"select m.gambar from media m join admin a on m.id=a.id_image where email='$username'");
while($d=mysqli_fetch_array($a)){
  $gambar=$d[0];
}
$getJmlPesan=mysqli_query($db,"select count(*) from msg where status=0");
$dataJmlPesan = mysqli_fetch_array($getJmlPesan);
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- costume css -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- data table -->
  <link rel="stylesheet" type="text/css" href="../node_modules/datatables.net-dt/css/jquery.datatables.min.css"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini" syle="position:fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MBS CCTV</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <!--  <img src="uploads/user/<?php echo $gambar?>" class="user-image" alt="User Image">
               --><span class="hidden-xs"><?php echo @$_SESSION['username'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  <?php echo @$_SESSION['username'] ?>
                </p>
                <img src="uploads/user/<?php echo $gambar?>" class="img-circle" alt="User Image">
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
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
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     <!--  <div class="user-panel">
        <div class="pull-left image">
          <img src="uploads/user/<?php echo $id_user ?>/<?php echo $photo ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo @$_SESSION['username'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cc"></i> <span>Site</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
            while ($site = mysqli_fetch_array($s)){
              $link=$site[0];
              ?>
            <li><a href="data.php?id=<?php echo $link;?> "><i class="fa fa-circle-o"></i><?php echo $site[1];?></a>
            </li>
            <?php
          }
          ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cc"></i> <span>Update Tampilan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_carausel.php"><i class="fa fa-circle-o"></i> Carausel</a></li>
            <li><a href="data_patner.php"><i class="fa fa-circle-o"></i> Partnership</a></li>
            <li><a href="post.php"><i class="fa fa-circle-o"></i>Post</a></li>
            <li><a href="data_profil.php"><i class="fa fa-circle-o"></i>Profil Perusahaan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cc"></i> <span>Maintenance Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="kategori_produk.php"><i class="fa fa-circle-o"></i> Kategori</a></li>
            <li><a href="data_produk.php"><i class="fa fa-circle-o"></i> Tambah Produk</a></li>
            <li><a href="data_produk_list.php"><i class="fa fa-circle-o"></i> Data Produk</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cc"></i> <span>Pengunjung</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="pesan.php"><i class="fa fa-envelope-o"></i>Pesan</a></li> -->
            <li>
              <a href="pesan.php">
                <span>Pesan</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-red"><?php echo $dataJmlPesan[0] ?></small>
                </span>
              </a>
            </li>
            <li><a href="pengunjung.php"><i class="fa fa-user"></i>Data Pengunjung</a></li>
            <!-- <li><a href="post.php"><i class="fa fa-circle-o"></i>Post</a></li>
            <li><a href="data_profil.php"><i class="fa fa-circle-o"></i>Profil Perusahaan</a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Administrator</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_site.php"><i class="fa fa-circle-o"></i>Site</a></li>
            <li><a href="datauser.php"><i class="fa fa-circle-o"></i> User</a></li>
           <!--  <li><a href="data_iklan.php"><i class="fa fa-circle-o"></i> Data Iklan Berjalan</a></li> -->
          </ul>
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="laporan_pelanggan.php"><i class="fa fa-circle-o"></i> Laporan Pelanggan</a></li>
            <li><a href="laporan_studio.php"><i class="fa fa-circle-o"></i> Laporan Studio</a></li>
            <li><a href="laporan_iklan.php"><i class="fa fa-circle-o"></i> Laporan Iklan</a></li>
            <li><a href="laporan_pembayaran.php"><i class="fa fa-circle-o"></i> Laporan Pembayaran</a></li>
          </ul>
        </li> -->
      </ul>

        
    </section>
    <!-- /.sidebar -->
  </aside>