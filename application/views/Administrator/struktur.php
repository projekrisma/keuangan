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
      <div class='header bg-red'>
        <h2 class="text-light">
         Struktur Organisasi
       </h2>
     </div>
     <div class="body">      
      <?php echo $this->session->flashdata('struktur');?>
      <div class="row clearfix">
        <div class="col-sm-12">
          <?php echo form_open_multipart('administrator/add_struktur');?>
          <div class="form-row">
            <select class="form-control" name="username" style="width: 100%;"required>
              <option> Pilih User </option>
              <?php foreach ($dataorang as $d) { ?>
                <option value="<?php echo $d->username?>" >
                  <?php echo $d->nama_lengkap ?> 
                </option>
              <?php } ?>
            </select>
          </div>
          <br>

          <div class="form-row">
            <input type="text" name="jabatan"  id="jabatan" class="form-control" required placeholder="Jabatan Keorganisasian">
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
    <div class='header bg-red'>
      <h2 class="text-light">
        STRUKTUR ORGANISASI
      </h2>
    </div>
    <div class="body">      
      <table class="table table-bordered table-striped  js-basic-example dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php  $no = 1;
         foreach ($struktur as $s):?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#lihat<?php echo $s->id_struktur ?>"><img src="<?= base_url('assets/foto_user/').$s->foto ?>" class="img-fluid" height="100px" width="100px"/>
              </a> 
            </td>

            <td><?php echo $s->nama_lengkap; ?></td>
            <td><?php echo $s->jabatan; ?></td>

            <td>
              <?php echo anchor('administrator/edit_struktur/'.$s->id_struktur, '<div class="btn btn-sm btn-primary">Edit</div>') ?>
              
              <a onclick="deleteConfirm('<?php echo base_url('Administrator/hapus_struktur/'.$s->id_struktur) ?>')" href="#!" class="btn btn-sm btn-danger"><div>Hapus</div></a>

            </td>
          </tr>

          <!-- modal tampil gamabr -->
          <div class="modal fade" id="lihat<?php echo $s->id_struktur ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-green">
                  <h4 class="modal-title text-white" id="exampleModalLabel">Foto</h4>
                  <button type="button" class="close bg-success" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <img src="<?= base_url('assets/foto_user/').$s->foto ?>" class="img-fluid" width="500px" height="500px" />
                  </div>

                </div>
              </div>
            </div>
          </div>
          <!-- akhir moodel tampil gambar -->
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