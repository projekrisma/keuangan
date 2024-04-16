<div class="row clearfix">

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
      <?php echo $this->session->flashdata('kegiatan');?> 
    <div class="card">
      <div class='header bg-blue'>
        <h2 class="text-light">
          KATEGORI KEGIATAN ORGANISASI
        </h2>
      </div>
      <div class="body">      
        <div class="row clearfix">
          <div class="col-sm-12">
            <?php echo form_open_multipart('administrator/add_kategorikegiatan');?>

            <div class="form-row">
              <input type="text" name="kategori_kegiatan"  id="kategori_kegiatan" class="form-control" required placeholder="Isi Kategori Kegiatan Organisasi">
              <br>
            </div>

            <button type="submit" class="btn btn-success btn-icon-split btn-sm">
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
        </div>
      </div>
    </div>
  </div>
</div>
</div>



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
  <div class="card">
    <div class='header bg-blue'>
      <h2 class="text-light">
        KATEGORI KEGIATAN ORGANISASI
      </h2>
    </div>
    <div class="body">      
      <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Kategori Kegiatan</th>
            <th>Tambah Berita</th>
            <th>Detail Berita</th>
            <th>Edita Kategori Kegiatan</th>
          </tr>
        </thead>
        <tbody>
         <?php  $no = 1;
         foreach ($kegiatan as $s):?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $s->kategori_kegiatan; ?></td>
            <td> <?php echo anchor('Administrator/add_berita/'.$s->id_kegiatan, '<div class="btn btn-sm btn-primary">Tambah Berita</div>') ?></td>

            <td>
             <?php echo anchor('Administrator/detail_berita/'.$s->id_kegiatan, '<div class="btn btn-sm btn-success">Detail Berita</div>') ?>
            </td>

            <td>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#editkegiatan<?php echo $s->id_kegiatan ?>"  class="btn  btn-sm btn-danger">Edit</a>
            </td>

          </tr>
          <!-- Modal edit Kategori Kegiatan -->
          <div class="modal fade" id="editkegiatan<?php echo $s->id_kegiatan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <h4 class="modal-title" id="exampleModalLabel">Edit Kategori Kegiatan</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url().'administrator/edit_kategorikegiatan/'.$s->id_kegiatan ?>">
                    <div class="form-row">
                      <label>Kategori Kegiatan</label>
                      <input type="text" name="kategori_kegiatan" class="form-control" value="<?= $s->kategori_kegiatan; ?>">
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary btn-icon-split btn-sm" value="save">
                      <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                      </span>
                      <span class="text">Edit</span> 
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Akhir modal edit -->
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
</div>


<script>
  function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
</script>
