<div class="row clearfix">


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
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
</div>


