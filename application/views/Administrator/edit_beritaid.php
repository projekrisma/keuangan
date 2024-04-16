<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
    <div class="card">
      <div class='header bg-blue'>
        <h2 class="text-light">
          Edit Berita
        </h2>
      </div>
      <div class="body">
        <?php foreach($beritaid as $data){ ?>
          <?php echo form_open_multipart('administrator/update_beritaid');?>
          <div class="form-row">            
            <br>
            <label for="id_kegiatan">Kategori Kegiatan*</label>
            <div class="id_kegiatan">
              <select name="id_kegiatan" class="form-control">
                <?php foreach ($kegiatan as $r){
                  if($data->id_kegiatan == $r->id_kegiatan){
                    echo '<option selected value="'.$r->id_kegiatan.'">'.$r->kategori_kegiatan.' </option>';}
                    else{
                      echo '<option value="'.$r->id_kegiatan.'">'.$r->kategori_kegiatan.'</option>';           
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
            <br>

            <div class="form-row">
              <label>Judul Berita</label>
              <input type="text" name="judul_berita" class="form-control" value="<?= $data->judul_berita; ?>">
              <input type="hidden" name="id_berita" class="form-control" value="<?= $data->id_berita; ?>">
            </div>
            <br>

            <div class="form-row">
              <label>Isi Berita</label>
              <textarea class="form-control" name="isi_berita" placeholder="Isi Berita" required><?= $data->isi_berita; ?></textarea>
            </div>
            <br>

            <div class="form-row row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/berita/') . $data->gambar_berita?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="gambar_berita">
                      <label class="custom-file-label" for="gambar_berita">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
