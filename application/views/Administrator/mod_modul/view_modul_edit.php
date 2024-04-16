<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
  <div class='card'>
    <div class='header bg-primary'>
      <h2 class='text-light'>
        Edit Modul Website
      </h2>
    </div>
    <div class='body'>
      <div class='col-md-12'>
        <?php foreach($data as $rows){ ?>          
          <form method="post" action="<?php echo base_url().'administrator/update_modul' ?>">
            <table class='table table-condensed table-bordered'>
              <tbody>
                <input type='hidden' name='id_modul' value='<?php echo $rows->id_modul ?>'>
                <input type='hidden' class='form-control' name='level' value='<?php echo $rows->level ?>'>
                

                <tr>
                  <th width='120px' scope='row'>Nama Modul</th>   
                  <td><input type='text' class='form-control' name='nama_modul' value='<?php echo $rows->nama_modul ?>' required></td>
                </tr>

                <tr>
                  <th scope='row'>Link</th>                       
                  <td> 
                    <input type='text' class='form-control' name='link' value='<?php echo $rows->link ?>' required></td>
                  </tr>

                  <tr>
                    <th scope='row'>Publish</th>                       
                    <td> 
                      <input type='text' class='form-control' name='publish' value='<?php echo $rows->publish ?>' required></td>
                    </tr>

                    <tr>
                      <th scope='row'>Aktif</th>                       
                      <td> 
                        <input type='text' class='form-control' name='aktif' value='<?php echo $rows->aktif ?>' required></td>
                      </tr>

                      <tr>
                        <th scope='row'>Level</th>                       
                        <td> 
                          <input type='text' class='form-control' name='level' value='<?php echo $rows->level ?>' required></td>
                        </tr>
                      </tbody>
                    </table>                             
                  <?php } ?> 
                </div>

                <div class='box-footer'>
                  <button type='submit' name='submit' class='btn btn-info'>Update</button>
                  <a href='<?php echo base_url('administrator/manajemenmodul') ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                </div>
              </div></div></div>

