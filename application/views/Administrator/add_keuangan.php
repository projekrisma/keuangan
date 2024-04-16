  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
    <div class="card">
      <div class='header bg-blue'>
        <h2 class="text-light">
         Keuangan
       </h2>
     </div>
     <div class="body">      
      <div class="row clearfix">
        <div class="col-sm-12">
          <?php echo form_open_multipart('Administrator/masukkan_keuangan');?>
          <div class="form-row">
            <label>Tanggal</label>
            <input type="date" name="tgl"  id="tgl" class="form-control" required placeholder="Tanggal">
            <br>
          </div>

          <div class="form-row">
            <label>Status</label>
            <select class='form-control show-tick' name='status' >
              <option value=''>-- Please select --</option>
              <option value='Masuk'>PEMASUKAN</option>
              <option value='Keluar'>PENGELUARAN</option>
            </select>
            <br>
          </div>
          <br>
          
          <div class="form-row">
            <label>Tanggal</label>
            <input type="text" name="tujuan"  id="tujuan" class="form-control" required placeholder="Tujuan">
            <br>
          </div>

          <div class="form-row">
            <label>Jumlah</label>
            <input type="text" name="jumlah"  id="jumlah" class="form-control" required placeholder="Ex. 100000">
            <br>
          </div>


          <div class="form-row">
            <div class="row-md-10">
              <label>Struk/Kwitansi</label>
              <div class="custom-file form-control">
                <input type="file" class="custom-file-input" id="gambar_struk" name="gambar_struk">
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
