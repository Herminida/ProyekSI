<div class="well">
	<h1>Halaman Master Data Sales</h1>
		<div class="navbar navbar-inverse">
			<div class="container">
			<a href="<?php echo base_url();?>sales/add" class="btn btn-small  ">Tambah Data Kabupaten</a>
	  		<?php 	$attribut="class='navbar-form pull-right'";
	  				echo form_open('sales/caridata',$attribut) ?>
    				<input type="text"  name="search" id="inputsearch" placeholder="Cari...">
    				<button type="submit" class="btn   "><i class="icon-search  "></i> Cari</button>
    		<?php echo form_close(); ?>
    		</div>
    	</div>
	  	<section>
  			<table class="table table-striped">
    			<thead>
      				<tr>
        				<th>No.</th>
        				<th>Aksi</th>
        				<th>Kabupaten</th>
      				</tr>
    			</thead>
    			<tbody>
					<?php
					$no=$tot;
					
						foreach ($data_get->result_array() as $tampil) {
							$no++;		
					?>
      						<tr>
								<td><?php echo $no;?></td>
								<td>
	           						<a href="<?php echo base_url(); ?>loket/kabupaten/edit/<?php echo $tampil['id_kabupaten']; ?>" class="small-box"><i class="icon-pencil"></i> Edit</a>
	            					<a href="<?php echo base_url(); ?>loket/kabupaten/delete/<?php echo $tampil['id_kabupaten']; ?>" onClick="return confirm('Anda yakin menghapus kabupaten <?php echo $tampil['nama_kabupaten'];?> ???');"><i class="icon-trash"></i> Hapus</a>
								</td>
								<td><?php echo $tampil['nama_kabupaten'];?></td>
      						</tr>
      				<?php
      				}
      				?>
    			</tbody>
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
