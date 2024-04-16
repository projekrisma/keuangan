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
        DATA KEUANGAN
      </h2>
      <ul class="header-dropdown m-r--5">
        <li class="dropdown">
          <a class='pull-right btn btn-primary btn-sm' href="<?php echo base_url('Administrator/add_keuangan') ?>">Tambahkan Data</a>
        </li>
      </ul>
    </div>
    <div class="body">
      <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="active"><a href="#masuk" data-toggle="tab">PEMASUKAN</a></li>
        <li role="presentation"><a href="#keluar" data-toggle="tab">PENGELUARAN</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane animated flipInX active" id="masuk">
          <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Dari</th>
                <th>Jumlah</th>
                <th>Kwitansi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <?php
              $mlebu = $this->db->query("SELECT status , SUM(jumlah) AS masuk FROM keuangan WHERE status = 'Masuk'")->result_array();
              foreach ($mlebu as $anu) {
                $a = $anu['masuk'];
                $b = number_format($a, 2, ",", ".");
                echo "<tr>
                <th colspan='3'>Jumlah</th>
                <th colspan='3'>Rp. $b</th>   
                </tr>";
              }
              ?>
            </tfoot>
            <tbody>
              <?php  $no = 1;
              foreach ($masuk as $row):
                $tanggal = tgl_indo($row['tgl']);
                $angka = $row['jumlah'];
                $uang = number_format($angka, 2, ",", ".");
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $tanggal ?></td>
                  <td><?php echo $row['tujuan']; ?></td>
                  <td><?php echo $uang ?></td>
                  <td><img src="<?= base_url('assets/img/').$row['gambar_struk'] ?>" class="img-fluid" height="100px" width="100px"/></td>
                  <td><center>
                    <a class='btn btn-success btn-xs' title='Edit Data' href='<?php echo base_url('Administrator/edit_keuanganfix/'.$row['id_keuangan']) ?>'><span class='glyphicon glyphicon-edit'></span></a>
                    <a onclick="deleteConfirm('<?php echo base_url('Administrator/hapus_uangmasuk/'.$row['id_keuangan']) ?>')" href="#!" class='btn btn-danger btn-xs' ><span class='glyphicon glyphicon-remove'></span></a>
                  </center></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div role="tabpanel" class="tab-pane animated flipInX" id="keluar">
          <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keperluan</th>
                <th>Jumlah</th>
                <th>Kwitansi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <?php
              $metu = $this->db->query("SELECT status , SUM(jumlah) AS keluar FROM keuangan WHERE status = 'keluar'")->result_array();
              foreach ($metu as $anu1) {
                $a1 = $anu1['keluar'];
                $b1 = number_format($a1, 2, ",", ".");
                echo "<tr>
                <th colspan='3'>Jumlah</th>
                <th colspan='3'>Rp. $b1</th>   
                </tr>";
              }
              ?>
            </tfoot>
            <tbody>
              <?php
              $no = 1;
              foreach ($keluar as $row1):
                $tanggal = tgl_indo($row1['tgl']);
                $angka = $row1['jumlah'];
                $uang = number_format($angka, 2, ",", ".");?>


                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $tanggal ?></td>
                  <td><?php echo $row1['tujuan']; ?></td>
                  <td><?php echo $uang ?></td>
                  <td><img src="<?= base_url('assets/img/').$row1['gambar_struk'] ?>" class="img-fluid" height="100px" width="100px"/></td>
                  <td><center>
                    <a class='btn btn-success btn-xs' title='Edit Data' href='<?php echo base_url('Administrator/edit_keuanganfix/'.$row1['id_keuangan']) ?>'><span class='glyphicon glyphicon-edit'></span></a>
                    <a onclick="deleteConfirm('<?php echo base_url('Administrator/hapus_uangmasuk/'.$row1['id_keuangan']) ?>')" href="#!" class='btn btn-danger btn-xs' ><span class='glyphicon glyphicon-remove'></span></a>
                  </center></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <center>
        <h1 class="card-inside-title">
          SISA SALDO SAAT INI
          <small>Pemasukan - Pengeluaran</small>
        </h1>
      </center>
      <div class="demo-single-button-dropdowns">
        <?php
        $query = $this->db->query("SELECT ROUND ( SUM(IF(status = 'Masuk', jumlah, 0))-(SUM(IF( status = 'Keluar', jumlah, 0))) ) AS subtotal FROM keuangan");

        foreach ($query->result_array() as $rows) {
          $dwet = $rows['subtotal'];
          $arto = number_format($dwet, 2, ",", ".");
          echo "<center><h2>Rp. $arto</h2></center>";
        }
        ?>
      </div>
    </div>
  </div>
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