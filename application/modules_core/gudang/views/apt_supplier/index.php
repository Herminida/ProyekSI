<div id="real">
  <div id="statusdonor">
    <div><b>::. DATA SUPPLIER OBAT </b> 
      <b style="float:right; margin-right:130px; color:red;"><?php echo validation_errors(); ?></b>
    </div>
    <table class="table">
      <?php echo form_open("farmasi/apt_supplier/search",'class="navbar-form pull-right"'); ?>
      <tr>
        <td width="80%"><a href="<?php echo base_url();?>farmasi/apt_supplier/add" class="btn btn-small">Tambah supplier</a></td>
        <td><input type="text" class="span3" placeholder="Masukkan kata kunci..." name="cari"></td>
        <td><button type="submit" class="btn btn-small"><i class="icon-search"></i> Cari</button></td>
      </tr>
    </table>
    <center><b style=" margin-right:130px; color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
    <table class="table table-striped">
    <thead>
      <tr>
        
        <th>No.</th>
        <th>Aksi</th>
        <th>Nama supplier</th>
        <th>Alamat</th>
        <th>Contact</th>

    
      </tr>
    </thead>
    <tbody>
  <?php
    $no=$tot+1;
    $no2=1;
    foreach($data_get->result_array() as $dp)
    {
  ?>
      <tr>
        
    <td><?php echo $no; ?></td>
        
    <td>
          
      <a href="<?php echo base_url(); ?>farmasi/apt_supplier/edit/<?php echo $dp['id_supplier']; ?>" class="btn btn-small"><i class="icon-wrench"></i></a>
      <a href="<?php echo base_url(); ?>farmasi/apt_supplier/detail/<?php echo $dp['id_supplier']; ?>" class="btn btn-small">Detail</a>
      <a href="<?php echo base_url(); ?>farmasi/apt_supplier/delete/<?php echo $dp['id_supplier']; ?>" class="btn btn-small" onClick="return confirm('Anda yakin menghapus data <?php echo $dp['nama_supplier'];?> Karena Akan Mempengaruhi Data Lain???');"><i class="icon-remove"></i></a>
                  
         
    </td>
    <td><?php echo $dp['nama_supplier']; ?></td>
    <td><?php echo $dp['alamat_supplier']; ?></td>
    <td><?php echo $dp['cp']; ?></td>
    
      </tr>
   <?php
      $no++;
      $no2++;
    }
   ?>
    </tbody>
    
  </table>
  <div class="pagination pagination-centered">
    <ul>
    <?php
      echo $paginator;
    ?>
    </ul>
  </div>

    
</div>
</div>
<?php 
$pesan = $this->session->flashdata('message');
        if ($this->session->flashdata('message')){
echo "<script>alert('$pesan')</script>";
        }
      
      ?>