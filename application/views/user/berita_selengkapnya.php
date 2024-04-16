<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicon
    ================================================== -->
    <link rel="icon" type="image/png" href="images/favicon.png">

  <!-- CSS
    ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/berita/plugins/bootstrap/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/berita/plugins/fontawesome/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/berita/plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/berita/plugins/slick/slick.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/berita/plugins/slick/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/berita/plugins/colorbox/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/berita/css/style.css">


    <!-- Favicons -->
    <link href="<?= base_url('assets/'); ?>/img/favicon.png" rel="icon">
    <link href="<?= base_url('assets/'); ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/'); ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/'); ?>/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Techie - v4.7.0
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <h class="logo"><a href="#">KTTH</a></h>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="<?php echo base_url('user/index') ?>">Home</a></li>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo base_url('User/sejarah') ?>">Tentang KTTH</a></li>
              <li><a href="<?php echo base_url('User/anggota') ?>">Anggota KTTH</a></li>
              <li><a href="<?php echo base_url('User/struktur_organisasi') ?>">Struktur Organisasi</a></li>
            </ul>
          </li>
         <li><a class="nav-link scrollto active" href="<?php echo base_url('user/berita') ?>">Berita</a></li>
          <li><a class="nav-link scrollto" href="<?php echo base_url('user/galeri') ?>">Galeri</a></li>
          <li><a class="nav-link scrollto" href="<?php echo base_url('user/kontak') ?>">Kontak</a></li>
          <li><a class="getstarted scrollto" href="<?php echo base_url('administrator') ?>">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>KTTH KARANG TARUNA TUNAS HARAPAN</h1>
          <h2>Jorong Simpang Tolang</h2>
          <!-- <div><a href="<?php echo base_url('user/registrasi') ?>" class="btn-get-started scrollto">Login</a></div> -->
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 yuhu.jpeg" data-aos="zoom-in" data-aos-delay="150">
          <img src="<?= base_url('assets/'); ?>/img/portfolio/rr.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>
  <!-- End Hero -->

  <!-- main -->
  <main id="main">
    <!-- ======= end selamat datang ======= -->
    <div class="container-fluid bg-primary ">
      <div class="ts-breaking-news clearfix position-relative">
        <marquee height="20">
          <p class="text-white">SELAMAT DATANG DI WEBSITE RESMI KARANG TARUNA TUNAS HARAPAN JORONG SIMPANG TOLANG || INFORMASI KEGIATAN DAN PEMBUKUAN KEUANGAN || ORGANISASI LADANG PEMBANGUNAN KARAKTER PEMUDA PEMUDI</p>
        </marquee>
      </div>
    </div>

    <!-- ======= end selamat datang ======= -->


    <section id="main-container" class="main-container">
      <div class="container">
        <div class="row">

          <div class="col-lg-8 mb-5 mb-lg-0">
            <?php foreach ($data as $b):?>
            <div class="post">
              <div class="post-media post-image">
                <img loading="lazy" src="<?= base_url('assets/berita/').$b->gambar_berita ?>" class="img-fluid" alt="post-image">
              </div>

              
                <div class="post-body">
                  <div class="entry-header">
                    <div class="post-meta">
                      <span class="post-author">
                        <i class="far fa-user"></i><a href=""> Admin</a>
                      </span>
                      <span class="post-cat">
                        <i class="far fa-folder-open"></i><a href=""> Berita</a>
                      </span>
                      <span class="post-meta-date"><i class="far fa-calendar"></i> <?php echo $b->kategori_kegiatan?></span>
                    </div>
                    <h2 class="entry-title">
                      <a href="news-single.html"><?php echo $b->judul_berita?></a>
                    </h2>
                  </div><!-- header end -->

                  <div class="entry-content">
                    <p><?php echo $b->isi_berita?></p>
                  </div>

                  <div class="post-footer">
                    <a href="<?php echo base_url('User/berita/'.$b->id_berita) ?>" class="btn btn-primary">Kembali</a>
                  </div>
                </div><!-- post-body end -->
              </div><!-- 1st post end -->
              <?php endforeach; ?>


            </div><!-- Content Col end -->

            <div class="col-lg-4">

              <div class="sidebar sidebar-right">
                <div class="widget recent-posts">
                  <h3 class="widget-title">Berita Terbaru</h3>
                  <ul class="list-unstyled">
                    <?php foreach ($recentpost as $s):?>
                      <li class="d-flex align-items-center">
                        <div class="posts-thumb">
                          <a href="#"><img loading="lazy" alt="img" src="<?= base_url('assets/berita/').$s->gambar_berita ?>"></a>
                        </div>
                        <div class="post-info">
                          <h4 class="entry-title">
                            <a href="#"><?php echo $s->judul_berita?></a>
                          </h4>
                        </div>
                      </li><!-- 1st post end-->
                    <?php endforeach; ?>
                  </ul>

                </div><!-- Recent post end -->

                <div class="widget">
                  <h3 class="widget-title">Kategori</h3>
                  <ul class="arrow nav nav-tabs">                      
                    <?php foreach ($kegiatan as $k):?>
                      <li><a href="#"><?php echo $k->kategori_kegiatan?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </div><!-- Categories end -->

              </div><!-- Sidebar end -->
            </div><!-- Sidebar Col end -->

          </div><!-- Main row end -->

        </div><!-- Container end -->
      </section><!-- Main container end -->

      <!-- ======= Footer ======= -->
      <footer id="footer">

        <div class="container">

          <div class="copyright-wrap d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
              <div class="row">
                <div class="col-lg-12 ">
                 <div class="copyright-info">
                <span>Copyright &copy; <script>
                  document.write(new Date().getFullYear())
                </script>, Designed &amp; Developed by <a href="https://themefisher.com">Themefisher</a></span>
              </div>
            </div>


              </div>

            </div>
          </footer><!-- End Footer -->


          <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
          <div id="preloader"></div>

          <!-- Vendor JS Files -->
          <script src="<?= base_url('assets/'); ?>/vendor/purecounter/purecounter.js"></script>
          <script src="<?= base_url('assets/'); ?>/vendor/aos/aos.js"></script>
          <script src="<?= base_url('assets/'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="<?= base_url('assets/'); ?>/vendor/glightbox/js/glightbox.min.js"></script>
          <script src="<?= base_url('assets/'); ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
          <script src="<?= base_url('assets/'); ?>/vendor/swiper/swiper-bundle.min.js"></script>
          <script src="<?= base_url('assets/'); ?>/vendor/php-email-form/validate.js"></script>

          <!-- Template Main JS File -->
          <script src="<?= base_url('assets/'); ?>/js/main.js"></script>


  <!-- Javascript Files
    ================================================== -->

    <!-- initialize jQuery Library -->
    <script src="<?= base_url('assets/'); ?>/berita/plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap jQuery -->
    <script src="<?= base_url('assets/'); ?>/berita/plugins/bootstrap/bootstrap.min.js" defer></script>
    <!-- Slick Carousel -->
    <script src="<?= base_url('assets/'); ?>/berita/plugins/slick/slick.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/berita/plugins/slick/slick-animation.min.js"></script>
    <!-- Color box -->
    <script src="<?= base_url('assets/'); ?>/berita/plugins/colorbox/jquery.colorbox.js"></script>
    <!-- shuffle -->
    <script src="<?= base_url('assets/'); ?>/berita/plugins/shuffle/shuffle.min.js" defer></script>


    <!-- Google Map API Key-->
    <script src="<?= base_url('assets/'); ?>/berita/https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <!-- Google Map Plugin-->
    <script src="<?= base_url('assets/'); ?>/berita/plugins/google-map/map.js" defer></script>

    <!-- Template custom -->
    <script src="<?= base_url('assets/'); ?>/berita/js/script.js"></script>

  </div><!-- Body inner end -->
</body>

</html>