<div id="real">
	<div id="statusdonor">
		<div><b>::. DATA STATUS ANGGOTA</b> 
			<b style="float:right; margin-right:140px; color:red;"><?php echo validation_errors(); ?></b>
		</div>
		<table class="table">
			<?php echo form_open('sosial_status_anggota/search','class="navbar-form pull-right" ');?>
			<tr>
				<td width="53%"><a class ="btn btn-small  " href="<?php echo base_url().'sosial_status_anggota/add' ;?>">Tambah Status Anggota</a></td>
				<td><input name="keysearch" placeholder="Masukkan Kata Kunci.."></td>
				<td><button type="submit" class="btn btn-small  "><i class="icon-search  "></i>Cari Status Anggota</button></td>				
			
			</tr>
			<?php echo form_close(); ?>
		</table>
		<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
		<table class="table table-striped">
			<thead>
				<th>No</th>
				<th>Aksi</th>
				<th>Status Anggota</th>

			</thead>

			<tbody>

				<?php
				$no = 1;
					foreach($status_anggota->result_array() as $db)
					{
				?>
				<tr>
					<td><?php echo $no ; ?> </td>
					<td>
						<a class='btn btn-small  ' href="<?php echo base_url(); ?>master/sosial_status_anggota/edit/<?php echo $db['id']; ?>"><i class="icon-wrench  "></i></a>
						<a class='btn btn-small  ' href="<?php echo base_url(); ?>master/sosial_status_anggota/delete/<?php echo $db['id']; ?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $db['nama_status_anggota'] ?> ?');"><i class="icon-remove"></i></a>
					</td>
					<td><?php echo $db['nama_status_anggota']; ?></td>
				</tr>
				<?php
				$no++;

					}		
			?>
			</tbody>

		</table>

	</div>

</div>