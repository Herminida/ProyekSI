<div id="real">
	<div id="statusdonor">
		<div><b>::. DATA SALES OBAT </b> 
			<b style="float:right; margin-right:130px; color:red;"><?php echo validation_errors(); ?></b>
		</div>
		<table class="table">
			<?php echo form_open('farmasi/apt_sales/search','class="navbar-form pull-right" ');?>
			<tr>
				<td width="55%"><a class ="btn btn-small btn-success" href="<?php echo base_url().'farmasi/apt_sales/add' ;?>">Tambah Sales Obat</a></td>
				<td><input name="search" placeholder="Masukkan Kata Kunci.."></td>
				<td><button type="submit" class="btn btn-small btn-success"><i class="icon-search icon-white"></i>Cari Sales Obat</button></td>				
			
			</tr>
			<?php echo form_close(); ?>
		</table>
		<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
		<table class="table table-striped">
			<thead>
				<th>No</th>
				<th>Aksi</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Telepon</th>
			</thead>
			<tbody>
				<?php
				$no=0;
				foreach($data_get->result_array() as $dp)
				{ $no ++;
					?>
					<tr>
					<td><?php echo $no; ?></td>
					<td>
	           			<a href="<?php echo base_url(); ?>farmasi/apt_sales/edit/<?php echo $dp['id_sales']; ?>" class="btn btn-small btn-success"><i class="icon-wrench icon-white"></i></a>
	           			<a href="<?php echo base_url(); ?>farmasi/apt_sales/detail/<?php echo $dp['id_sales']; ?>" class="btn btn-mini btn-success">Detail</a>
	            		<a href="<?php echo base_url(); ?>farmasi/apt_sales/delete/<?php echo $dp['id_sales']; ?>" onClick="return confirm('Apakah anda yakin menghapus data <?php echo $dp['nama_sales']; ?>???');" class="btn btn-small btn-warning"><i class="icon-remove"></i></a>
					</td>
					<td><?php echo $dp['nama_sales']; ?></td>
					<td><?php echo $dp['alamat_sales']; ?></td>
					<td><?php echo $dp['telp']; ?></td>
				</tr>
					<?php
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