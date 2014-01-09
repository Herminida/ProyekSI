<div id="real">
	<div id="statusdonor">
		<div><b>::. DATA AGAMA </b> 
			<b style="float:right; margin-right:130px; color:red;"><?php echo validation_errors(); ?></b>
		</div>
		<table class="table">
			<?php echo form_open('loket/sosial_agama/search','class="navbar-form pull-right" ');?>
			<tr>
				<td width="60%"><a class ="btn btn-small  " href="<?php echo base_url().'loket/sosial_agama/add' ;?>">Tambah Agama</a></td>
				<td><input name="keysearch" placeholder="Masukkan Kata Kunci.."></td>
				<td><button type="submit" class="btn btn-small  "><i class="icon-search  "></i>Cari Agama</button></td>				
			
			</tr>
			<?php echo form_close(); ?>
		</table>
		<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
		<table class="table table-striped">
			<thead>
				<th>No</th>
				<th>Aksi</th>
				<th>Agama</th>

			</thead>

			<tbody>

				<?php
				$no = 1;
					foreach($agama->result_array() as $db)
					{
				?>
				<tr>
					<td><?php echo $no ; ?> </td>
					<td>
						<a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_agama/edit/<?php echo $db['id']; ?>"><i class="icon-wrench  "></i></a>
						<a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_agama/delete/<?php echo $db['id']; ?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $db['nama_agama'] ?> ?');"><i class="icon-remove"></i></a>
					</td>
					<td><?php echo $db['nama_agama']; ?></td>
				</tr>
				<?php
				$no++;

					}		
			?>
			</tbody>
		</table>

</div>
</div>

<?php 
$pesan = $this->session->flashdata('message');
				if ($this->session->flashdata('message')){
echo "<script>alert('$pesan')</script>";
				}
			
			?>