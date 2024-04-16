<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
    <div class="card">
      <div class='header bg-gradien'>
        <h2 class="text-light">
          EDIT MY PROFIL
        </h2>
      </div>
      <div class="body">
        <div class="row clearfix">
          <div class="col-sm-12">
            <?php echo form_open_multipart('administrator/update_profil');?>          
            <div class="card-body">
              <br>
              <div class="form-row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="username" name="username" value="<?php echo $user ['username']; ?>" readonly>
                  <br>
                </div>
              </div>


              <div class="form-row">
                <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $user ['nama_lengkap']; ?>">
                  <?= form_error('nama_lengkap', ' <small class="text-danger" pl-3>', '</small>'); ?>
                  <br>
                </div>
              </div>
              <br>

              <div class="form-row">
                <label for="jk" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $user ['email']; ?>">
                  <?= form_error('email', ' <small class="text-danger" pl-3>', '</small>'); ?>
                  <br>
                </div>
              </div>


              <div class="form-row">
                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="jk" name="jk" value="<?php echo $user ['jk']; ?>">
                  <?= form_error('jk', ' <small class="text-danger" pl-3>', '</small>'); ?>
                  <br>
                </div>
              </div>

              <div class="form-row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $user ['alamat']; ?>">
                  <?= form_error('alamat', ' <small class="text-danger" pl-3>', '</small>'); ?>
                  <br>
                </div>
              </div>



              <div class="form-row">
                <label for="hp" class="col-sm-2 col-form-label">Nomor Hp/Wa</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $user ['no_telp']; ?>">
                  <?= form_error('no_telp', ' <small class="text-danger" pl-3>', '</small>'); ?>
                  <br>
                </div>
              </div>

              <div class="form-row">
                <label class="col-sm-2">Foto</label>
                <div class="col-sm-10">
                  <div class="row">
                    <div class="col-sm-3">
                      <img src="<?= base_url('assets/foto_user/').$user['foto'];?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                      <div class="custom-file form-group">
                        <input type="file" class="custom-file-input form-control" id="foto" name="foto">
                        <label class="custom-file-label" for="foto" name="foto">Pilih Foto</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- button -->
              <a href="<?php echo base_url("administrator/profil") ?>" class="btn btn-danger waves-effect">
                <span class="text">Kembali</span>                    
              </a>
              <button type="submit" class="btn btn-success waves-effect" value="save">
                <span class="text">Simpan</span> 
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
