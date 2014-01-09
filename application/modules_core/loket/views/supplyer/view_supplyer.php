<html>
  <head>
    <title>Data Master Obat Supplyer</title>

  



  </head>
  <body>

<h1>Halaman Master Data Supplyer</h1>
  

  <div class="well well-large">
  
  <div class="navbar navbar-inverse">
  
    <div class="container">
     <a href="<?php echo base_url();?>supplyer/add" class="btn btn-small  ">Tambah Supplyer</a>
      
    
    <?php echo form_open("supplyer/search",'class="navbar-form pull-right"'); ?>
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
        <th>Supplyer</th>
        <th>Alamat</th>
        <th>Kabupaten</th>
        <th>Kode Pos</th>
        <th>Telp</th>
        <th>Bank</th>
        <th>No Bank</th>
        <th>Bank An</th>
        <th>Cp</th>
        <th>Email</th>
    
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
          
             <a href="<?php echo base_url(); ?>loket/supplyer/edit/<?php echo $dp['id_supplier']; ?>" class="small-box"><i class="icon-pencil"></i> Edit</a>
              <a href="<?php echo base_url(); ?>loket/supplyer/delete/<?php echo $dp['id_supplier']; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus</a>
            
         
    </td>
    <td><?php echo $dp['nama_supplier']; ?></td>
    <td><?php echo $dp['alamat_supplier']; ?></td>
    <td><?php echo $dp['nama_kabupaten']; ?></td>
    <td><?php echo $dp['kodepos']; ?></td>
    <td><?php echo $dp['telp']; ?></td>
    <td><?php echo $dp['bank']; ?></td>
    <td><?php echo $dp['bank_no']; ?></td>
    <td><?php echo $dp['bank_an']; ?></td>
    <td><?php echo $dp['cp']; ?></td>
    <td><?php echo $dp['email']; ?></td>
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
  
  

</section>
  </div>

  </body>

</html>