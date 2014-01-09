<div class="well">
	    <?php
      		echo $this->session->flashdata('confirm');
    	?>
	<h1>Halaman Master Data Sales</h1>
		<div class="navbar navbar-inverse">
			<div class="container">
			<a href="<?php echo base_url();?>sales/add" class="btn btn-small  ">Tambah Data Sales</a>
	  		<?php 	$attribut="class='navbar-form pull-right'";
	  				echo form_open('sales/caridata',$attribut) ?>
    				<input type="text" class="span3" name="search" id="inputsearch" placeholder="Cari...">
    				<button type="submit" class="btn btn-small  "><i class="icon-search  "></i> Cari</button>
    		<?php echo form_close(); ?>
    		</div>
    	</div>
	  	<section>
  			<table class="table table-striped">
    			<thead>
      				<tr>
        				<th>No.</th>
        				<th width="70px">Aksi</th>
        				<th width="70px">Nama Sales</th>
        				<th>Alamat</th>
        				<th>Kabupaten</th>
        				<th>Telepon</th>
						<th>Opsi Komisi</th>
						<th>Opsi Nominal</th>
						<th>Jumlah Nominal</th>
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
	           						<a href="<?php echo base_url(); ?>loket/sales/edit/<?php echo $dp['id_sales']; ?>" class="small-box"><i class="icon-pencil"></i> Edit</a>
	            					<a href="<?php echo base_url(); ?>loket/sales/delete/<?php echo $dp['id_sales']; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus</a>
								</td>
								<td><?php echo $dp['nama_sales']; ?></td>
								<td><?php echo $dp['alamat_sales']; ?></td>
								<td>Kabupaten</td>
								<td><?php echo $dp['telp']; ?></td>
								<td><?php echo $dp['komisi_opsi']; ?></td>
								<td><?php echo $dp['nominal_opsi']; ?></td>
								<td><?php echo $dp['nominal_jumlah']; ?></td>
      						</tr>
	 				<?php
	 					$no++;
						$no2++;
	 					}
	 				?>
    			</tbody>
    				<?php
    					if (empty($dp['nama_sales'])){
    						echo "Data yang yang cari tidak ada!!!";
    					}
    				?>
  			</table>
	<div class="pagination pagination-centered pagination-large">
		<ul>
			<?php
				echo $paginator;
			?>
		</ul>
	</div>
</section>
</div>
