<div class="row clearfix">

   <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="info-box-3 bg-dark hover-zoom-effect">
      <div class="content">
        <h4>KELOLA KEUANGAN : <a href="<?php echo base_url('administrator/manajemenkeuangan') ?>" class="small-box-footer">Klik Disini</a></h4>
      </div>
    </div>
  </div><!-- ./col -->

  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="info-box-3 bg-dark hover-zoom-effect">
      <div class="content">
        <h4>LAPORAN KEUANGAN : <a href="<?php echo base_url('administrator/laporan') ?>" class="small-box-footer">Klik Disini</a></h4>
      </div>
    </div>
  </div><!-- ./col -->
</div><!-- /.row -->


  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
          <div class="header bg-primary">
              <h2>
                  LAPORAN KEUANGAN
              </h2>
             <!--  belum berhasil cetak laporan -->
             <!--  <ul class="header-dropdown m-r--5">
                  <li class="dropdown">
                      <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/cetak_laporan' style="margin-right: 10px">Cetak Print</a>
                  </li>
              </ul> -->
          </div>
          <div class="body">
              <div class="row clearfix">
                <div class="col-sm-9">
                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">date_range</i>
                      </span>
                      <div class="form-line" style="border: 1px solid #ddd;border-radius: 5px;padding: 0px 10px;">
                          <input type="month" id="vtanggal" class="form-control date">
                      </div>
                      <br>
                      <span style="font-size: 10px;color: red"><u><i><b>NB:</b> Masukan Bulan dan Tahun yang ingin ditampilkan</i></u></span>
                  </div>
                </div>
                <div class="col-sm-3">
                  <button id="tampil" type="button" class="btn bg-deep-orange waves-effect"><i class="material-icons">search</i> CARI</button>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="row clearfix">
  <div id="tampil_data"></div>
</div>

