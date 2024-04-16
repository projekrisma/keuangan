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



        <!-- ======= About Section ======= -->
        <section id="services" class="services section-bg">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>BERITA </h2>
              <p>............................................................................................................</p>
            </div>

            <section id="about" class="about">
              <div class="container">
                <div class="row">
                  <?php  foreach ($bacaberita as $s):?>   
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                      <img src="<?= base_url('assets/berita/').$s->gambar_berita ?>" class="img-fluid" alt=""/>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                      <br>

                      <h3><?php echo $s->judul_berita; ?></h3>
                      <ul>
                        <p><?php echo $s->isi_berita; ?></p>
                      </ul>
                      <a href="<?php echo base_url('User') ?>" class="read-more">Kembali <i class="bi bi-long-arrow-right"></i></a>
                    </div>              
                  <?php endforeach; ?>
                </div>          
              </div>
            </section><!-- End About Section -->

          </div>
        </section>

