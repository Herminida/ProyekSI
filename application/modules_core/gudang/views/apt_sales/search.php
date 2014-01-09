<div id="real">
	<div id="statusdonor">
		<div><b>::. DATA SALES OBAT </b> 
			<b style="float:right; margin-right:130px; color:red;"><?php echo validation_errors(); ?></b>
		</div>
		<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('confirm'); ?></b></center>
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
	           			<a href="<?php echo base_url(); ?>farmasi/apt_sales/edit/<?php echo $dp['id_sales']; ?>" class="btn btn-small"><i class="icon-wrench"></i></a>
	           			<a href="<?php echo base_url(); ?>farmasi/apt_sales/detail/<?php echo $dp['id_sales']; ?>" class="btn btn-small">Detail</a>
	            		<a href="<?php echo base_url(); ?>farmasi/apt_sales/delete/<?php echo $dp['id_sales']; ?>" onClick="return confirm('Apakah anda yakin menghapus data <?php echo $dp['nama_sales']; ?>???');" class="btn btn-small"><i class="icon-remove"></i></a>
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
		<a href="<?php echo base_url();?>farmasi/apt_sales" class="btn btn-small"><div style="font-size:12px">Kembali</div></a>

</div>
</div>