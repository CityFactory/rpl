<?php
session_start();
// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> &mdash; BaBeYaGun</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
  <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
  <meta name="author" content="gettemplates.co" />

  <!-- 
  //////////////////////////////////////////////////////

  FREE HTML5 TEMPLATE 
  DESIGNED & DEVELOPED by FreeHTML5.co

  Website:    http://freehtml5.co/
  Email:      info@freehtml5.co
  Twitter:    http://twitter.com/fh5co
  Facebook:   https://www.facebook.com/fh5co

  //////////////////////////////////////////////////////
   -->

  <!-- Facebook and Twitter integration -->
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="css/icomoon.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="css/bootstrap.css">

  <!-- Flexslider  -->
  <link rel="stylesheet" href="css/flexslider.css">

  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <!-- Theme style  -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Modernizr JS -->
  <script src="js/modernizr-2.6.2.min.js"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>
<body>

<div class="fh5co-loader"></div>
<div id="page">
<nav class="fh5co-nav" role="navigation">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-xs-2">
          <div id="fh5co-logo"><a href="home.php">Babe-Yagun</a></div>
        </div>
        <div class="col-md-9 col-xs-10 text-right">
          <ul class="fh5co-social">
            <li><a href="index.php"><i class="icon-user"></i> Log Out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>                                                   
  <div id="fh5co-services" class="fh5co-bg-section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4 text-center">
          <div class="feature-center animate-box" data-animate-effect="fadeIn">
            <span class="icon">
              <i class="icon-heart"></i>
            </span>
            <h3>Kebersihan</h3>
            <p>Semua Barang Bekas Layak Guna, dipastikan bersih dan sudah melalui proses pembersihkan sebelum diserahkan kepada pihak pedagang cakar</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 text-center">
          <div class="feature-center animate-box" data-animate-effect="fadeIn">
            <span class="icon">
              <i class="icon-wallet"></i>
            </span>
            <h3>Hemat</h3>
            <p>Dengan membeli Barang Bekas Layak Guna, maka akan mempermudah anda dalam mendapatkan barang berkualitas dengan harga yang lebih terjangkau</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 text-center">
          <div class="feature-center animate-box" data-animate-effect="fadeIn">
            <span class="icon">
              <i class="icon-shopping-cart"></i>
            </span>
            <h3>Gratis Jemput Barang</h3>
            <p>Babe Yagun menyediakan gratis pengambilan barang apabila customer sudah menghubungi pihak pedagang cakar</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="fh5co-product">
    <div class="container">
      <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
          <h2>Barang Bekas Layak Guna</h2>
          <p>Silahkan pilih jenis barang bekas yang masih layak guna yang akan anda jual</p>
        </div>
      </div>
      <div class="row">
        <?php
          require('koneksi.php');
          $sql    = "SELECT * FROM produk";
          $query  = mysqli_query($db_con, $sql);
          $whatsappNumbers = array(
            "6285656085376", // Nomor WhatsApp owner Bulukumba
            "6285210225253", // Nomor WhatsApp owner Bone
            "6282274922377",  // Nomor WhatsApp owner Paccerakang
			      "6282190367250", // Nomor WhatsApp owner Maros
            "6282344530443", // Nomor WhatsApp owner Pinrang
            "6281243196922"  // Nomor WhatsApp ketiga Gowa
			
          );
          $counter = 0;
          while ($data = mysqli_fetch_array($query)) {
            $whatsappNumber = $whatsappNumbers[$counter % count($whatsappNumbers)];
        ?>
        <div class="col-md-4 text-center animate-box">
          <div class="product">
            <div class="product-grid" style="background-image:url(images/<?php echo $data["gambar"]; ?>);">
              <div class="inner">
                <p>
                  <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $whatsappNumber; ?>&text=Apakah%20Produk%20Ini%20Masih%20Ada?" class="icon"><i class="icon-eye"></i> Jual Sekarang </a>
                </p>
              </div>
            </div>
            <div class="desc">
              <h3><a href="home.php"><?php echo $data["nama_produk"]; ?></a></h3>
              <span class="price">Rp<?php echo $data["harga"]; ?>,00</span>
            </div>
          </div>
        </div>
        <?php
            $counter++;
          }
        ?>
      </div>
    </div>
  </div>

  <div id="fh5co-testimonial" class="fh5co-bg-section">
    <div class="container">
      <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
          <span>TESTIMONI</span>
          <h2>PIHAK COSTUMER</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="row animate-box">
            <div class="owl-carousel owl-carousel-fullwidth">
              <div class="item">
                <div class="testimony-slide active text-center">
                  <figure>
                    <img src="images/faisal.jpeg" alt="user">
                  </figure>
                  <span>Muhammad Faisal</span>
                  <blockquote>
                    <p>&ldquo;Setelah menggunakan website Babe-Yagun ini, saya mendapatkan menghemat kapasitas lemari karena semua barang yang saya tidak gunakan lagi telah saya jual lewat website ini&rdquo;</p>
                  </blockquote>
                </div>
              </div>
              <div class="item">
                <div class="testimony-slide active text-center">
                  <figure>
                    <img src="images/mirna.jpeg" alt="user">
                  </figure>
                  <span>Mirnawati Rahman</span>
                  <blockquote>
                    <p>&ldquo;dengan menggunakan website ini saya mendapatkan penghasilan tambahan lewat barang barang yang tidak saya perlukan lagi, kalian wajib coba.&rdquo;</p>
                  </blockquote>
                </div>
              </div>
              <div class="item">
                <div class="testimony-slide active text-center">
                  <figure>
                    <img src="images/ghasa.jpeg" alt="user">
                  </figure>
                  <span>Ghasa Maulana Pasaray</span>
                  <blockquote>
                    <p>&ldquo;website ini keren sih, banyak barang barang yang ingin saya buang, malah bernilai jual di website ini.&rdquo;</p>
                  </blockquote>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
    <h2>PIHAK PEDAGANG</h2>
  </div>
  <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
    <div class="fh5co-staff">
      <img src="images/syawal.jpeg" width="350px" height="200px">
      <h3>Syawal udin</h3>
      <strong class="role">Owner Pedagang Bulukumba</strong>
    </div>
  </div>
  <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
    <div class="fh5co-staff">
      <img src="images/milzam.jpeg" width="350px" height="200px">
      <h3>Milzam</h3>
      <strong class="role">Owner Pedagang Pinrang</strong>
    </div>
  </div>
  <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
    <div class="fh5co-staff">
      <img src="images/guido.jpeg" width="350px" height="200px">
      <h3>Guido dokumen</h3>
      <strong class="role">Owner Pedagang Gowa </strong>
    </div>
  </div>
  <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
    <div class="fh5co-staff">
      <img src="images/ardiansyah.jpeg" width="350px" height="200px">
      <h3>Ardiansyah</h3>
      <strong class="role">Owner Pedagang Bone</strong>
    </div>
  </div>
  <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
    <div class="fh5co-staff">
      <img src="images/fitrah.jpeg" width="350px" height="200px">
      <h3>Fitrah Tamvan</h3>
      <strong class="role">Owner Pedagang Maros</strong>
    </div>
  </div>
  <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
    <div class="fh5co-staff">
      <img src="images/jeel.jpeg" width="350px" height="200px">
      <h3>Jayadi</h3>
      <strong class="role">Owner Pedagang Paccerakang</strong>
    </div>
  </div>
</div>
</div>

<div class="gototop js-top">
  <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<!-- countTo -->
<script src="js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<!-- Main -->
<script src="js/main.js"></script>
<style>
body {
    background-color: #C6E6C3;
  }
</style>
</body>
</html>