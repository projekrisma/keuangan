      <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

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
                            <li class="active"><a href="<?php echo base_url('User/struktur_organisasi') ?>">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="<?php echo base_url('user/berita') ?>">Berita</a></li>

                    <li><a class="nav-link scrollto" href="<?php echo base_url('user/galeri') ?>">Galeri</a></li>
                    <li><a class="nav-link scrollto" href="<?php echo base_url('user/kontak') ?>">Kontak</a></li>
                    <li><a class="getstarted scrollto" href="<?php echo base_url('Administrator') ?>">Login</a></li>
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

      <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Berita Organisasi</h2>
            <p>Berita Terupdate KTTH KARANG TARUNA TUNAS HARAPAN.</p>
          </div>

          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
              <div class="swiper-slide">                      
                <?php  foreach ($data as $b):?>
                  <div class="testimonial-item">
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      <a href="<?php echo base_url('User/baca_berita/'.$b->id_berita) ?>"><?php echo $b->judul_berita; ?></a> 
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="<?= base_url('assets/berita/').$b->gambar_berita ?>" class="testimonial-img"/>
                    <h3> <?php echo $b->kategori_kegiatan; ?></h3>
                  </div>                                         
              <?php endforeach; ?>
                </div><!-- End testimonial item --> 
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
</section><!-- End Testimonials Section -->