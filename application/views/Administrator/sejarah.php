<div class="row clearfix">

  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box-3 bg-dark hover-zoom-effect">
        <div class="content">
          <h4>SEJARAH : <a href="<?php echo base_url('administrator/sejarah') ?>" class="small-box-footer">Klik Disini</a></h4>
        </div>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box-3 bg-dark hover-zoom-effect">
        <div class="content">
          <h4>VISI MISI : <a href="<?php echo base_url('administrator/visi_misi') ?>" class="small-box-footer">Klik Disini</a></h4>
        </div>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box-3 bg-dark hover-zoom-effect">
        <div class="content">
          <h4>STRUKTUR  : <a href="<?php echo base_url('administrator/struktur') ?>" class="small-box-footer">Klik Disini</a></h4>
        </div>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->


  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
    <div class="card">
      <div class='header bg-blue'>
        <h2 class="text-light">
          Sejarah Organisasi
        </h2>
      </div>
      <div class="body">      
        <?php echo $this->session->flashdata('sejarah');?>
        <div class="row clearfix">
          <div class="col-sm-12">
            <?php echo form_open_multipart('administrator/add_sejarah');?>
            <div class="form-row">
              <input type="text" name="judul_sejarah"  id="judul_sejarah" class="form-control" required placeholder="Judul Sejarah">
              <br>
            </div>

            <div class="form-row">
              <textarea class="form-control" name="isi_sejarah" placeholder="Isi Sejarah" required></textarea>
              <br>
            </div>


            <div class="form-row">
              <div class="row-md-10">
                <label>Gambar Sejarah</label>
                <div class="custom-file form-control">
                  <input type="file" class="custom-file-input" id="gambar_sejarah" name="gambar_sejarah">
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
        DATA Sejarah Organisasi
      </h2>
    </div>
    <div class="body">      
      <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Judul</th>
            <th>Isi Sejarah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php  $no = 1;
         foreach ($sejarah as $s):?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td>
              <?php if($s->gambar_sejarah == ' '){?>
                <?php echo $s->gambar_sejarah?>
              <?php } if($s->gambar_sejarah != ''){?>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#lihat<?php echo $s->id_sejarah ?>"><img src="<?= base_url('assets/images/').$s->gambar_sejarah ?>" class="img-fluid" height="100px" width="100px"/>
                </a>
              <?php }?>
            </td>
            <td><?php echo $s->judul_sejarah; ?></td>
            <td><?php echo $s->isi_sejarah; ?></td>

            <td>
                <a></a><?php echo anchor('administrator/edit_sejarah/'.$s->id_sejarah, '<div class="btn  btn-sm  btn-primary">Edit</div>') ?></a>
                <a onclick="deleteConfirm('<?php echo base_url('Administrator/hapus_sejarah/'.$s->id_sejarah) ?>')" href="#!" class="btn btn-sm btn-danger"><div>Hapus</div></a>
            </td>
          </tr>
          <!-- modal tampil gamabr -->
          <div class="modal fade" id="lihat<?php echo $s->id_sejarah ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-green">
                  <h4 class="modal-title text-white" id="exampleModalLabel">Foto Sejarah</h4>
                  <button type="button" class="close bg-success" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <img src="<?= base_url('assets/images/').$s->gambar_sejarah ?>" class="img-fluid" width="500px" height="500px" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- akhir moodel tampil gambar -->
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


<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Kamu yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-icon-split btn-sm" type="button" data-dismiss="modal">
          <span class="icon text-white-50">
            <i class="fas fa-times"></i>
          </span>
          <span class="text">Cancel</span></button>
          <a id="btn-delete" class="btn btn-danger btn-icon-split btn-sm" href="#"><span class="icon text-white-50">
            <i class="fas fa-trash"></i>
          </span>
          <span class="text">Delete</span></a>
        </div>
      </div>
    </div>
  </div>