<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title> ADMIN | BaBeYaGun</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
  <?php
  require('../koneksi.php');

  // Mengambil ID produk dari URL
  if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];
  } else {
    // Jika ID produk tidak ditemukan, kembalikan ke halaman data_penjual.php
    header("Location: data_penjual.php");
    exit();
  }

  // Memeriksa apakah data produk dengan ID yang diberikan ada di database
  $cek_data = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
  $query_cek_data = mysqli_query($db_con, $cek_data);

  if (mysqli_num_rows($query_cek_data) > 0) {
    $data_produk = mysqli_fetch_assoc($query_cek_data);
  } else {
    // Jika data produk dengan ID yang diberikan tidak ditemukan di database, kembalikan ke halaman data_penjual.php
    header("Location: data_penjual.php");
    exit();
  }
  ?>

  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <!--logo start-->
      <a href="data_penjual.php" class="logo">Nice <span class="lite">Admin</span></a>
      <!--logo end-->

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="profile-ava">
                <img alt="" src="images/faisal.jpg">
              </span>
              <span class="username">Kelompok 2</span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="data_penjual.php"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="index.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_table"></i>
              <span>Data</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="data_penjual.php">Produk</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i>Edit Data Produk</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="beranda.php">Home</a></li>
              <li><i class="fa fa-table"></i>Data</li>
              <li><i class="fa fa-th-list"></i>Edit Data</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Edit Data Produk
              </header>
              <div class="panel-body">
                <form role="form" action="data_penjual_edit_db.php?id=<?php echo $id_produk; ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" placeholder="Nama Produk" value="<?php echo $data_produk['nama_produk']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="number" name="harga_produk" class="form-control" id="exampleInputPassword1" placeholder="Harga" value="<?php echo $data_produk['harga']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Unggah Foto</label>
                    <input type="file" name="foto_produk">
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="data_penjual.php" class="btn btn-default">Batal</a>
                </form>
              </div>
            </section>
          </div>
        </div>
      </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>

</body>

</html>
