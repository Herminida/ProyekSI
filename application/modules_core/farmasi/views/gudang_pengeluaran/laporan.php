<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
  <div class="well-big">
    <?php echo form_open('farmasi_pengeluaran'); ?>
  	<legend>Laporan Farmasi Pengeluaran  <div align="right"><input type="submit" class="btn btn-success" name="add_btn" value="Kembali" ></div></legend>
    <?php echo form_close(); ?>

  	<table class="table table-striped">
  		<thead>
      <tr>
        
        <th>No.</th>
        <th>Tanggal Keluar</th>
        <th>Unit Kerja</th>
        <th>Nama Obat</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
    
      </tr>
    </thead>
    <tbody>
  <?php
    $no=$tot+1;
    $no2=1;
    foreach($data_pengeluaran_farmasi->result_array() as $dp)
    {
  ?>
      <tr>
        
    <td ><span class="badge badge-success"><?php echo $no; ?></span></td>
        
    
    <td><?php echo $dp['tanggal_keluar']; ?></td>
    <td><?php echo $dp['nama_unit_kerja']; ?></td>
    <td><?php echo $dp['nama_obat']; ?></td>
    <td><?php echo $dp['jumlah']; ?></td>
    <td><?php echo $dp['keterangan']; ?></td>
    
    
      </tr>
   <?php
     
     $no++;
      $no2++;
    }
   ?>
    </tbody>

	</table>

	<?php
      echo $paginator;
    ?>

   

  	</div>
</body>
</html>