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
                <li><a href="<?php echo base_url('administrator/profil') ?>"><i class="material-icons">person</i>Profile</a></li>
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
    $level = $this->session->userdata('level');
    $querySubMenu = "SELECT * FROM `modul` LEFT JOIN `users` ON `users`.`level` = `modul`.`level` WHERE`modul`.`level` = '$level' AND `modul`.`aktif` = 'Y' GROUP by modul.id_modul";
    $subMenu = $this->db->query($querySubMenu)->result_array();?>

    <div class="menu">
        <?php foreach($subMenu as $sm):?>
            <ul class="list">
                <li class="active">
                    <a href="<?php echo base_url() ?><?= $sm['link'];?>"> <i class='material-icons'>memory</i> <span><?= $sm['nama_modul'];?></span>
                    </a>
                </li>
            </ul>          
        <?php endforeach;?>  
    </div>
</div>