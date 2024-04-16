<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
    <div class="card">
      <div class='header bg-blue'>
        <h2 class="text-light">
          Edit Keuangan Masuk
        </h2>
      </div>
      <div class="body">
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?php echo base_url("Administrator/manajemenkeuangan") ?>">Kembali</a>
        <br>

        <?php foreach($edit_uangmasuk as $data){ ?>
          <?php echo form_open_multipart('Administrator/update_keuangan');?>

          <div class="form-row">
            <label>Tanggal</label>
            <input type="date" name="tgl" class="form-control" value="<?= $data->tgl; ?>">
          </div>
          <br>

          <div class="form-row">
            <label>Status</label>
            <select class='form-control show-tick' name='status' >";
              <?php if ($data->status == 'keluar') {
                echo "<option  value='keluar'>--- PENGELUARAN ---</option>";
              } else {
                echo "<option  value='masuk'>--- PEMASUKAN ---</option>";
              }?>
              <option value='Masuk'>PEMASUKAN</option>
              <option value='Keluar'>PENGELUARAN</option>

            </select>
          </div>
          <br>


          <div class="form-row">
            <label>Tujuan</label>
            <input type="hidden" name="id_keuangan" class="form-control" value="<?= $data->id_keuangan; ?>">
            <input type="hidden" name="username" class="form-control" value="<?= $data->username; ?>">
            <input type="text" name="tujuan" class="form-control" value="<?= $data->tujuan; ?>">
          </div>
          <br>

            <div class="form-row">
            <label>Jumlah</label>
            <input type="text" name="jumlah" class="form-control" value="<?= $data->jumlah; ?>">
          </div>
          <br>

          
          <div class="form-row row">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/') . $data->gambar_struk?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gambar_struk">
                    <label class="custom-file-label" for="gambar_struk">Choose file</label>
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
