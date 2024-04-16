<?php 
echo 
"
<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
<div class='card'>
<div class='header bg-primary'>
<h2 class='text-white'>
Tambah Modul Website
</h2>
</div>
<div class='body'>";
$attributes = array('class'=>'form-horizontal','role'=>'form');
echo form_open_multipart($this->uri->segment(1).'/tambah_manajemenmodul',$attributes); 
echo "<div class='col-md-12'>
<table class='table table-condensed table-bordered=3'>
<tbody>
<input type='hidden' name='id' value=''>
<tr>
<th width='120px' scope='row'>Nama Modul</th>  
<td><input type='text' class='form-control' name='a' required></td>
</tr>

<tr>
<th scope='row'>Link</th>             
<td style='color:red'><b>".base_url()."administrator/</b> 
<input type='text' class='form-control' name='b' style='width:50%; display:inline-block' required></td>
</tr>

<tr>
<th scope='row'>Publish</th>
<td> 
<select class='form-control text-center' name='c'>
<option value='Y'>Ya</option>
<option value='N'>Tidak</option>
</select>
</td>
</tr> 

<tr>
<th scope='row'>Aktif</th>
<td> 
<select class='form-control text-center' name='d'>
<option value='Y'>Ya</option>
<option value='N'>Tidak</option>
</select>
</td>
</tr> 

<tr>
<th scope='row'>Level</th>
<td> 
<select class='form-control text-center' name='level'>
<option value='admin'>Admin</option>
<option value='user'>User/Anggota</option>
</select>
</td>
</tr> 


</tbody>
</table>
</div>

<div class='box-footer'>
<button type='submit' name='submit' class='btn btn-success'>Tambahkan</button>
<a href='".base_url().$this->uri->segment(1)."/manajemenmodul'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>
</div>

</div></div></div>";
echo form_close();
