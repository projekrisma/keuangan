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
                    <li><a href="<?php echo base_url('user/index') ?>">Home</a></li>
                    <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link scrollto" <?php echo base_url('User/sejarah') ?>">Tentang KTTH</a></li>
                            <li><a href="<?php echo base_url('User/anggota') ?>">Anggota KTTH</a></li>
                            <li><a href="<?php echo base_url('User/struktur_organisasi') ?>">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="<?php echo base_url('user/berita') ?>">Berita</a></li>

                    <li><a class="nav-link scrollto active" href="<?php echo base_url('user/galeri') ?>">Galeri</a></li>
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
                    <div><a href="#about" class="btn-get-started scrollto">Daftar</a></div>
                </div>
                <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
                    <img src="<?= base_url('assets/'); ?>/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Galeri</h2>
                    <p>Album dari pemuda pemudi Jorong Simpang Tolang Lama. Ini adalah salah satu dokumentasi atas semua kegiatan yang dilakukan pemuda pemudi Jorong Simpang Tolang. Semoga warga Masyarakat senantiasa dalam kebersamaan, kemakmuran, dan kesejahteraan. </p>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">                            
                            <li data-filter="*" class="filter-active">All</li>
                            <?php  foreach ($kegiatan as $k):?>
                                 
                                    <a href="<?php echo base_url('User/galeriid/'.$k->id_kegiatan) ?>" class="btn btn-sm btn-primary"><?php echo $k->kategori_kegiatan; ?></a>
                                
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="row portfolio-container">
                        <?php  foreach ($berita as $b):?>
                            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-wrap">
                                    <img src="<?= base_url('assets/berita/').$b->gambar_berita ?>" class="testimonial-img"/>
                                    <div class="portfolio-info">
                                        <h4><?php echo $b->judul_berita; ?></h4>
                                        <p><?php echo $b->kategori_kegiatan; ?></p>
                                    </div>
                                    <div class="portfolio-links">
                                        <a href="<?= base_url('assets/berita/').$b->gambar_berita ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                                        
                                    </div>
                                </div>
                            </div>                            
                        <?php endforeach; ?>
                    </div>
                </section><!-- End Portfolio Section -->




        </main><!-- End #main -->