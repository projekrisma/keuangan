<!-- User Info -->
<div class="user-info">
    <div class='image'>
        <?php $usr = $this->Model_app->view_where('users', array('username' => $this->session->username))->row_array();
        if (trim($usr['foto']) == '') {
            $foto = 'blank.png';
        } else {
            $foto = $usr['foto'];
        } ?>
        <img src='<?php echo base_url(); ?>/assets/foto_user/<?php echo $foto; ?>' width='48' height='48' alt='User'>
    </div>
    <div class='info-container'>
        <div class='name' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><?php echo $usr['nama_lengkap'] ?></div>
        <div class='email'><?php echo $usr['email'] ?></div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                <li><a href="<?php echo base_url() . $this->uri->segment(1); ?>/logout"><i class="material-icons">input</i>LogOut</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- #User Info -->

<!-- Menu -->
<div class="menu">

  <?php $username = $this->session->userdata('username');?>
  <!-- INI MENU UNTUK MENGATUR APAKAH ADMIN ATAU USER YANG LOGIN, JADI DISESUAIKAN BERDASARKAN SESSION YANG LOGIN -->
  <ul class="list">
    <?php if ($username == 'admin'):?>
        <li class="header">ADMINISTRATOR</li>
        <?php else :?>
            <li class="header">ANGGOTA ORGANISASI</li>
        <?php endif;?>
    </ul>

    <!-- INI UNTUK SUB MENUNYA. BERDASARKAN YANG LOGIN  -->
    <?php
    $username = $this->session->userdata('username');
    $querySubMenu = "SELECT * FROM `modul` WHERE `username` = '$username' AND `aktif` = 'Y'";
    $subMenu = $this->db->query($querySubMenu)->result_array();?>

    <?php foreach($subMenu as $sm):?>
        <ul class="list">
            <?php if ($username == 'user'){?>
                <li class="active">
                    <a href="<?php echo base_url() ?><?= $sm['link'];?>">
                        <?= $sm['static_content'];?>
                        <span><?= $sm['nama_modul'];?></span>
                    </a>
                </li>
            <?php }else{?>
            <?php };?>
        </ul>           
    <?php endforeach;?>  


    
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">ADMINISTRATOR</li>
            <li class="active">
                <a href="<?php echo base_url() ?>administrator/home">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <?php
            $cek = $this->Model_app->umenu_akses("identitaswebsite", $this->session->id_session);
            if ($cek == 1 or $this->session->level == 'admin') {
                echo "<li>
                <a href='" . base_url() . $this->uri->segment(1) . "/identitaswebsite'>
                <i class='material-icons'>memory</i>
                <span>Identitas Website</span>
                </a>
                </li>";
            }
            ?>
            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">attach_money</i>
                    <span>Modul Keuangan</span>
                </a>
                <ul class="ml-menu">
                    <?php
                    $cek = $this->Model_app->umenu_akses("manajemenkeuangan", $this->session->id_session);
                    if ($cek == 1 or $this->session->level == 'admin') {
                        echo "<li><a href='" . base_url() . $this->uri->segment(1) . "/manajemenkeuangan'><i class='material-icons'>chevron_right</i> Kelola Keuangan</a></li>";
                    }

                    $cek = $this->Model_app->umenu_akses("detailkeuangan", $this->session->id_session);
                    if ($cek == 1 or $this->session->level == 'admin') {
                        echo "<li><a href='" . base_url() . $this->uri->segment(1) . "/laporan'><i class='material-icons'>chevron_right</i> Laporan Keuangan</a></li>";
                    }
                    ?>
                </ul>
            </li>

            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons">person</i>
                    <span>Modul User</span>
                </a>
                <ul class="ml-menu">
                    <?php
                    $cek = $this->Model_app->umenu_akses("manajemenuser", $this->session->id_session);
                    if ($cek == 1 or $this->session->level == 'admin') {
                        echo "<li><a href='" . base_url() . $this->uri->segment(1) . "/manajemenuser'><i class='material-icons'>chevron_right</i> Manajemen User</a></li>";
                    }

                    $cek = $this->Model_app->umenu_akses("manajemenmodul", $this->session->id_session);
                    if ($cek == 1 or $this->session->level == 'admin') {
                        echo "<li><a href='" . base_url() . $this->uri->segment(1) . "/manajemenmodul'><i class='material-icons'>chevron_right</i> Manajemen Modul</a></li>";
                    }
                    ?>
                </ul>
            </li>

        </ul>
    </div>
<!-- #Menu -->