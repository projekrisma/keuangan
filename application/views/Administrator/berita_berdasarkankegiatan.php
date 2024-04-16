
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
  <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?php echo base_url("Administrator/kegiatan") ?>">Kembali</a>
  <br><br>
  <div class="card">
    <div class='header bg-blue'>
      <h2 class="text-light">
        Kumpulan Berita Berdasarkan Kegiatan
      </h2>
       <ul class="header-dropdown m-r--5">
        <li class="dropdown">
          <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url() .$this->uri->segment(1); ?>/kegiatan'>Kembali</a>
        </li>
      </ul>
    </div>
    <div class="body">      
      <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Kategori Kegiatan</th>
            <th>Judul Berita</th>
            <th>Isi Berita</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php  $no = 1;
         foreach ($data as $s):?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $s->kategori_kegiatan; ?></td>
            <td><?php echo $s->judul_berita; ?></td>
            <td><?php echo $s->isi_berita; ?></td>
      
            <td>
             <?php echo anchor('administrator/edit_beritaid/'.$s->id_berita, '<div class="btn btn-sm btn-primary">Edit Berita</div>') ?>

             <a onclick="deleteConfirm('<?php echo base_url('administrator/hapus_beritaid/'.$s->id_berita) ?>')" href="#!" class="btn btn-sm btn-danger"><div>Hapus Berita</div></a>

            </td>
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