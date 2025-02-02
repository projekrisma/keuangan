<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
    <?php echo $this->session->flashdata('manajemenuser');?>
    <div class="card">
      <div class="header">        
        <h2>
          MANAJEMEN USER
        </h2>

        <ul class="header-dropdown m-r--5">
          <li class="dropdown">
            <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/tambah_manajemenuser'>Tambahkan Data</a>
          </li>
        </ul>
      </div>
      <div class="body">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>Foto</th>
              <th>Blokir</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>Foto</th>
              <th>Blokir</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php 
            $no = 1;
            foreach ($record as $row){
              if ($row['foto'] == ''){ $foto ='blank.png'; }else{ $foto = $row['foto']; }
              echo "<tr><td>$no</td>
              <td>$row[username]</td>
              <td>$row[nama_lengkap]</td>
              <td>$row[email]</td>
              <td><img style='border:1px solid #cecece' width='40px' class='img-circle' src='".base_url()."assets/foto_user/$foto'></td>
              <td>$row[blokir]</td>
              <td>$row[level]</td>
              <td><center>
              <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url().$this->uri->segment(1)."/edit_manajemenuser/$row[username]'><span class='glyphicon glyphicon-edit'></span></a>
              <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url().$this->uri->segment(1)."/delete_manajemenuser/$row[username]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
              </center></td>
              </tr>";
              $no++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>