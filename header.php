<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
@$us = current( explode( '@', $_SESSION['username'] ) );
require_once "config/database.php";
@$id_user=$_SESSION['id'];
$getKategori = mysqli_query($db,"select * from kategori");
$getuser = mysqli_query($db,"select nama,photo from user where email like '%$us%'");
$datauser=mysqli_fetch_array($getuser);
$photo=$datauser[1];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>MBS CCTV</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="css/custome.css" rel="stylesheet">
  <link href="css/modal.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style2.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
  </style>
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <img src="img/logo.png" alt="" width="170px">
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="" href="index.php">Home</a>
                  </li>
                  <li>
                    <a class="" href="about.php">About Us</a>
                  </li>
                  <li>
                  <div class="dropdown">
                    <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Product
                    </a>
                    <ul class="dropdown-menu">
                      <?php
                        while($dataKategori = mysqli_fetch_array($getKategori)){
                         ?>
                          <li class="dropdown-item" onclick="window.location.href = 'view_product.php?id=<?php echo $dataKategori[0] ?>';"><?php echo $dataKategori['nama']; ?></li><br>
                         <?php 
                        }
                      ?>
                    </ul>
                  </div>
                  </li>
                  <li>
                    <a class="" href="solution.php">Solution</a>
                  </li>
                  <li>
                    <a class="" href="contact.php">Contact</a>
                  </li>
                   <li>
                    <a class="" href="news.php">News</a>
                  </li>
                  <li>
                    <a class="" href="karir.php">Carrer</a>
                  </li>
                  <?php
                    if($us!=""){
                  ?>
                    <li>
                      <a href="#" id="sidebarCollapse"><?php echo $us ?></a>
                    </li>
                  <?php
                  }else{
                  ?>
                  <li>
                    <a href="login.php">Login</a>
                  </li>
                  <li>
                    <a href="daftar.php">Signup</a>
                  </li>
                  <?php
                    }
                  ?>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
            <!-- nav -->
            <nav id="sidebar">
            <div class="sidebar-header">
                <img src="uploads/user/<?php echo $id_user ?>/<?php echo $photo ?>" alt="" title="" style="width: 100px;height: 100px;border-radius: 50%;" />
                <h4 style="color:white;"> <?php echo $datauser['nama']; ?></h4>
            </div>
            <ul class="list-unstyled components">
        <li>
          <a href="profile.php">Atur Profile</a>
        </li>
        <li>
          <a href="logout.php">Logout</a>
        </li>
      </ul>
    </nav>	
        <!-- end nad -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <script>
  
  </script>