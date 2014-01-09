<div id="real">
	<div id="statusdonor">
		<div><b>::. DATA SATUAN OBAT </b> 
			<b style="float:right; margin-right:130px; color:red;"><?php echo validation_errors(); ?></b>
		</div>
		<table class="table">
			<?php echo form_open('farmasi/apt_satuan/search','class="navbar-form pull-right" ');?>
			<tr>
				<td width="80%"><a class ="btn btn-smalls" href="<?php echo base_url().'farmasi/apt_satuan/add' ;?>">Tambah Satuan Obat</a></td>
				<td><input name="keysearch" placeholder="Masukkan Kata Kunci.."></td>
				<td><button type="submit" class="btn btn-small"><i class="icon-search"></i> Cari</button></td>				
			
			</tr>
			<?php echo form_close(); ?>
		</table>
		<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
		<table class="table table-striped">
			<thead>
				<th>No</th>
				<th>Aksi</th>
				<th>Satuan Obat</th>

			</thead>

			<tbody>

				<?php
				$no = 1;
					foreach($apt_satuan->result_array() as $db)
					{
				?>
				<tr>
					<td><?php echo $no ; ?> </td>
					<td>
						<a class='btn btn-small' href="<?php echo base_url(); ?>farmasi/apt_satuan/edit/<?php echo $db['id_satuan']; ?>"><i class="icon-wrench"></i></a>
						<a class='btn btn-small' href="<?php echo base_url(); ?>farmasi/apt_satuan/delete/<?php echo $db['id_satuan']; ?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $db['nama_satuan'] ?> ?');"><i class="icon-remove"></i></a>
					</td>
					<td><?php echo $db['nama_satuan']; ?></td>
					
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