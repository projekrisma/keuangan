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
      <div class='header bg-dark'>
        <h2 class="text-light">
         Visi Misi Organisasi
       </h2>
     </div>
     <div class="body">      
      <?php echo $this->session->flashdata('visimisi');?>
      <div class="row clearfix">
        <div class="col-sm-12">
          <?php echo form_open_multipart('administrator/add_visimisi');?>

          <div class="form-row">
            <textarea class="form-control" name="isi_visi" placeholder="Isi Visi" required></textarea>
            <br>
          </div>

          <div class="form-row">
            <textarea class="form-control" name="isi_misi" placeholder="Isi Misi" required></textarea>
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
    <div class='header bg-green'>
      <h2 class="text-light">
        Data Visi Misi Organisasi
      </h2>
    </div>
    <div class="body">      
      <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Visi</th>
            <th>Misi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php  $no = 1;
         foreach ($vm as $s):?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $s->isi_visi; ?></td>
            <td><?php echo $s->isi_misi; ?></td>

            <td>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#editvisimisi<?php echo $s->id_visimisi ?>"  class="btn  btn-sm btn-primary">Edit</a>
                 <a onclick="deleteConfirm('<?php echo base_url('Administrator/hapus_vm/'.$s->id_visimisi) ?>')" href="#!" class="btn btn-sm btn-danger"><div>Hapus</div></a>
            </td>
          </tr>
          <!-- Modal edit -->
          <div class="modal fade" id="editvisimisi<?php echo $s->id_visimisi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <h4 class="modal-title" id="exampleModalLabel">Edit Visi Misi</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url().'administrator/edit_visimisi/'.$s->id_visimisi ?>">
                    <div class="form-row">
                      <label>Visi</label>
                      <input type="text" name="isi_visi" class="form-control" value="<?= $s->isi_visi; ?>">
                    </div>
                    <br>

                     <div class="form-row">
                      <label>Misi</label>
                      <input type="text" name="isi_misi" class="form-control" value="<?= $s->isi_misi; ?>">
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
      <div class="modal-body">Data Visi Misi yang dihapus tidak akan bisa dikembalikan lagi.</div>
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