<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
    <div class="card">
      <div class='header bg-blue'>
        <h2 class="text-light">
          Edit Sejarah Organisasi
        </h2>
      </div>
        <div class="body">
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?php echo base_url("administrator/sejarah") ?>">Kembali</a>
        <br>
        <?php foreach($edit_sejarah as $data){ ?>
          <?php echo form_open_multipart('administrator/update_sejarah');?>
          <div class="form-row">
            <label>Judul Sejarah</label>
            <input type="hidden" name="id_sejarah" class="form-control" value="<?= $data->id_sejarah; ?>">
            <input type="text" name="judul_sejarah" class="form-control" value="<?= $data->judul_sejarah; ?>">
          </div>
          <br>

          <div class="form-row">
            <label>Isi sejarah</label>
            <textarea class="form-control" name="isi_sejarah" placeholder="Isi Sejarah" required><?= $data->isi_sejarah; ?></textarea>
          </div>
          <br>
          
          <div class="form-row row">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/images/') . $data->gambar_sejarah?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gambar_sejarah">
                    <label class="custom-file-label" for="gambar_sejarah">Choose file</label>
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
