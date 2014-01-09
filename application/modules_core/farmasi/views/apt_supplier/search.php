<div id="real">
  <div id="statusdonor">
    <div><b>::. DATA SUPPLIER OBAT </b> 
      <b style="float:right; margin-right:130px; color:red;"><?php echo validation_errors(); ?></b>
    </div>
    
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
      <a href="<?php echo base_url(); ?>farmasi/apt_supplier/delete/<?php echo $dp['id_supplier']; ?>" class="btn btn-small" onClick="return confirm('Anda yakin menghapus data <?php echo $dp['nama_supplier'];?>???');"><i class="icon-remove"></i></a>
                  
         
    </td>
    <td><?php echo $dp['nama_supplier']; ?></td>
    <td><?php echo $dp['alamat_supplier']; ?></td>
    <td><?php echo $dp['cp']; ?></td>
    
      </tr>
   <?php
      $no++;
      $no2++;
      $nama=$dp['nama_supplier'];
    }
   ?>
    </tbody>
    
  </table>
  <?php
      if (empty($nama)){
          echo "Data tidak ada";
        }
  ?><br>
  <a href="<?php echo base_url();?>farmasi/apt_supplier" class="btn btn-small">Kembali</a>
  <div class="pagination pagination-centered">
    <ul>
    <?php
      echo $paginator;
    ?>
    </ul>
  </div>

    
</div>
</div>