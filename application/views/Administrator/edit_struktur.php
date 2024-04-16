<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
    <div class="card">
      <div class='header bg-blue'>
        <h2 class="text-light">
          Edit Struktur Organisasi
        </h2>
      </div>
      <div class="body">
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?php echo base_url("administrator/struktur") ?>">Kembali</a>
        <?php foreach($struktur as $data){ ?>
          <?php echo form_open_multipart('administrator/update_struktur');?>
          <div class="form-row">            
            <br>
            <label for="username">Pilih User*</label>
            <div class="username">
              <select name="username" class="form-control">
                <?php foreach ($dataorang as $r){
                  if($data->username == $r->username){
                    echo '<option selected value="'.$r->username.'">'.$r->nama_lengkap.' </option>';}
                    else{
                      echo '<option value="'.$r->username.'">'.$r->nama_lengkap.'</option>';           
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
            <br>

            <div class="form-row">
              <label>Jabatan</label>
              <input type="hidden" name="id_struktur" class="form-control" value="<?=$data->id_struktur; ?>">
              <input type="text" name="jabatan" class="form-control" value="<?=$data->jabatan; ?>">
            </div>
            <br>


            <button type="save" class="btn btn-primary btn-icon-split btn-sm" value="save">
              <span class="icon text-white-50">
                <i class="fas fa-check"></i>
              </span>
              <span class="text">Edit</span> 
            </button>
          </form>
        <?php } ?> 
      </div>
    </div>
  </div>
</div>
