<div class="row clearfix">

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
    <div class="card">
      <div class='header bg-dark'>
        <h2 class="text-light">
         Aset Organisasi
       </h2>
     </div>
     <div class="body">      
      <?php echo $this->session->flashdata('aset');?>
      <div class="row clearfix">
        <div class="col-sm-12">
          <?php echo form_open_multipart('administrator/add_aset');?>

           <div class="form-row">
            <input type="text" class="form-control" name="nm_aset" placeholder="Nama Aset" required>
            <br>
          </div>

          <div class="form-row">
            <input type="number" class="form-control" name="jml_aset" placeholder="Jumlah Aset" required>
            <br>
          </div>
          
          <div class="form-row">
            <input type="number" class="form-control" name="harga_beli" placeholder="Harga Beli Aset" required>
            <br>
          </div>
          
           <div class="form-row">
            <input type="number" class="form-control" name="harga_jual" placeholder="Harga Jual Aset" required>
            <br>
          </div>
          
          <div class="form-row">
            <input type="text" class="form-control" name="keterangan" placeholder="Kondisi Aset" required>
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
        Data  Aset Organisasi
      </h2>
    </div>
    <div class="body">      
      <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Aset</th>
            <th>Jumlah</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php  $no = 1;
         foreach ($aset as $s):?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $s->nm_aset; ?></td>
            <td><?php echo $s->jml_aset; ?></td>
            <td><?php echo number_format($s->harga_beli, 0,',', '.') ?></td>
            <td><?php echo number_format($s->harga_jual, 0,',', '.') ?> </td>
            <td><?php echo $s->keterangan; ?></td>

            <td>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#editaset<?php echo $s->id_aset ?>"  class="btn  btn-sm btn-primary">Edit</a>
                 <a onclick="deleteConfirm('<?php echo base_url('Administrator/hapus_aset/'.$s->id_aset) ?>')" href="#!" class="btn btn-sm btn-danger"><div>Hapus</div></a>
            </td>
          </tr>
          <!-- Modal edit -->
          <div class="modal fade" id="editaset<?php echo $s->id_aset ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <h4 class="modal-title" id="exampleModalLabel">Edit Aset</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url().'administrator/edit_aset/'.$s->id_aset ?>">
                    <div class="form-row">
                      <label>Nama Aset</label>
                      <input type="text" name="nm_aset" class="form-control" value="<?= $s->nm_aset; ?>">
                    </div>
                    <br>

                     <div class="form-row">
                      <label>Jumlah Aset</label>
                      <input type="text" name="jml_aset" class="form-control" value="<?= $s->jml_aset; ?>">
                    </div>
                    <br>
                    
                     <div class="form-row">
                      <label>Harga Beli</label>
                      <input type="text" name="harga_beli" class="form-control" value="<?php echo number_format($s->harga_beli, 0,',', '.') ?>">
                    </div>
                    <br>
                    
                    <div class="form-row">
                      <label>Harga Jual</label>
                      <input type="text" name="harga_jual" class="form-control" value="<?php echo number_format($s->harga_jual, 0,',', '.') ?>">
                    </div>
                    <br>
                    
                    <div class="form-row">
                      <label>Keterangan</label>
                      <input type="text" name="keterangan" class="form-control" value="<?= $s->keterangan; ?>">
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
      <div class="modal-body">Data Aset yang dihapus tidak akan bisa dikembalikan lagi.</div>
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