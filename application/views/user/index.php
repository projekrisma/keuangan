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



        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing section-bg">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>STRUKTUR ORGANISASI</h2>
              <p>Struktur Organisisai Ini terdiri dari pengurus-pengurus inti Organisasi pada Karang Taruna Tunas Harapan Simpang Tolang. Untuk Anggota Organisasi yang sudah memiliki akun silahkan login untuk informasi keuangan organisasi selegkapnya.</p>
          </div>

          <div class="row">

             <?php  foreach ($struktur as $s):?>
              <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="box featured">
                  <h3><?php echo $s->jabatan; ?></h3>
                  <h6><?php echo $s->nama_lengkap; ?></h6>
                  <ul>
                    <img src="<?= base_url('assets/foto_user/').$s->foto ?>" class="img-fluid" alt="" width="150px" height="150px"/>
                </ul>
                <div class="btn-wrap">
                    <a href="<?php echo base_url('User/struktur_detail/'.$s->id_struktur) ?>" class="btn-buy">Detaill</a>
                </div>
            </div>
        </div> 
    <?php endforeach; ?>

</div>

</div>
</section><!-- End Pricing Section -->