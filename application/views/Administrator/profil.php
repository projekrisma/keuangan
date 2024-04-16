<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">        
      <h5><?= $this->session->flashdata('message');?> </h5>
      <div class="card">
        <div class='header bg-gradien'>
            <h2 class="text-light">
                PROFIL
            </h2>
        </div>
        <div class="body">
            <div class="row clearfix">
                <div class="col-sm-12">
                  <?php  foreach ($data as $d):?>
                    <div class="box-body box-profile">
                      <div class="form-group center">
                        <table class="table table-user-information">
                          <tbody>
                            <tr>
                              <td>Nama</td>
                              <td>: <?php echo $d->nama_lengkap?></td>
                          </tr>

                          <tr>
                              <td>Jenis Kelamin</td>
                              <td>: <?php echo $d->jk?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?php echo $d->alamat?></td>
                    </tr>

                    <tr>
                        <td>Nomor HP/Wa</td>
                        <td>: <?php echo $d->no_telp?></td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>: <?php echo $d->email?></td>
                    </tr>

                    <tr>
                        <td>Level</td>
                        <td>: <?php echo $d->level?></td>
                    </tr>

                    <tr>
                        <td>Foto</td>
                        <td>: <img src="<?php echo base_url('assets/foto_user/'). $user['foto'];?>" width="100" height="100" alt="User"/></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="<?php echo base_url('administrator/update_profil/')?>" class="btn btn-info waves-effect"><b>Edit Profil</b></a>
        <a href="<?php echo base_url('administrator/home/')?>" class="btn btn-danger waves-effect"><b>Kembali</b></a>
    </div><!-- /.box-body -->                            
<?php endforeach; ?>
</div>
</div>
</div>
</div>
</div>
</div>