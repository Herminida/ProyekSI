<html>
  <head>
    <title>Data Master Farmasi Obat</title>

  



  </head>
  <body>

<h1>Halaman Master Farmasi Obat</h1>
  

  <div class="well well-large">
  
  <div class="navbar navbar-inverse">
  
    <div class="container">
     <a href="<?php echo base_url();?>farmasi_obats/add" class="btn btn-small  ">Tambah Obat</a>
      
    
    <?php echo form_open("farmasi_obats/search",'class="navbar-form pull-right"'); ?>
      <input type="text" class="span3" placeholder="Masukkan kata kunci..." name="cari">
      <button type="submit" class="btn btn-small  "><i class="icon-search  "></i> Cari Data</button>
    <?php echo form_close(); ?>
    
    </div>
   
  </div>
  
    <section>
  <table class="table table-striped">
    <thead>
      <tr>
        
        <th>No.</th>
        <th >Aksi</th>
        <th>Obat</th>
        <th>Jenis</th>
        <th>Satuan</th>
        <th>Dosis</th>
        
    
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
          
             <a href="<?php echo base_url(); ?>loket/farmasi_obats/edit/<?php echo $dp['id']; ?>" class="small-box"><i class="icon-pencil"></i> Edit</a>
              <a href="<?php echo base_url(); ?>loket/farmasi_obats/delete/<?php echo $dp['id']; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus</a>
            
         
    </td>
    <td><?php echo $dp['nama_obat']; ?></td>
    <td><?php echo $dp['nama_obat_jenis']; ?></td>
    <td><?php echo $dp['satuan_obat']; ?></td>
    <td><?php echo $dp['dosis']; ?></td>
    
      </tr>
   <?php
      $no++;
      $no2++;
    }
   ?>
    </tbody>
    
  </table>
  <div class="pagination pagination-centered">
    
    <?php
      echo $paginator;
    ?>
    
  </div>
  
  

</section>
  </div>

  </body>

</html>