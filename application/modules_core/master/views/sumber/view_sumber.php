<html>
	<head>
		<title>Data Master Obat Supplyer</title>

	



	</head>
	<body>

<h1>Halaman Master Data Sumber</h1>
	

	<div class="well">
	
	<div class="navbar navbar-inverse">
	
		<div class="container">
		 <a href="<?php echo base_url();?>sumber/add" class="btn btn-small  ">Tambah Sumber</a>
		  
		
		<?php echo form_open("sumber/search",'class="navbar-form pull-right"'); ?>
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
        <th>Sumber</th>
		
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
	        
	           <a href="<?php echo base_url(); ?>loket/sumber/edit/<?php echo $dp['id_sumber']; ?>" class="small-box"><i class="icon-pencil"></i> Edit</a>
	            <a href="<?php echo base_url(); ?>loket/sumber/delete/<?php echo $dp['id_sumber']; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus</a>
	          
	       
		</td>
		<td><?php echo $dp['nama_sumber']; ?></td>
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