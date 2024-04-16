<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
      <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?php echo base_url("Administrator/kegiatan") ?>">Kembali</a>
      <br><br>
    <div class="card">
      <div class='header bg-blue'>
        <h2 class="text-light">
          BERITA KEGIATAN ORGANISASI
        </h2>
      </div>
      <div class="body">      
        <?php echo $this->session->flashdata('berita');?>
        <div class="row clearfix">
          <div class="col-sm-12">            
            <?php foreach ($data as $data):?>
              <?php echo form_open_multipart('Administrator/tambahkan_berita');?>
              <input  type="hidden" name="id_kegiatan"  value="<?php echo $data->id_kegiatan ?>">

               <div class="form-row">
                <label class="form-row">Kategori Kegiatan *</label>
                <input type="text" name="kategori_kegiatan"  id="kategori_kegiatan" value="<?php echo $data->kategori_kegiatan ?>" class="form-control" readonly>
                <br>
              </div>

              <div class="form-row">
                <input type="text" name="judul_berita"  id="judul_berita" class="form-control" required placeholder="Judul Berita">
                <br>
              </div>

              <div class="form-row">
                <textarea class="form-control" name="isi_berita" placeholder="Isi Berita" required></textarea>
                <br>
              </div>


              <div class="form-row">
                <div class="row-md-10">
                  <label>Gambar Berita</label>
                  <div class="custom-file form-control">
                    <input type="file" class="custom-file-input" id="gambar_berita" name="gambar_berita">
                  </div>                        
                </div>
              </div>
              <br>

              <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
                </span>
                <span class="text">Simpan</span>                       
              </button>

              <button type="reset" class="btn btn-danger btn-icon-split btn-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-times"></i>
                </span>
                <span class="text">Batal</span>                       
              </button>
            </form>             
          <?php endforeach; ?>   
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<script>
  function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
</script>
