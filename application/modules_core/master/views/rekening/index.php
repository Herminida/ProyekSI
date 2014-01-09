<h3>rekening</h3>
<hr>
<a href="<?php echo base_url();?>master/rekening/add"><button class="btn btn-success"><i class="icon icon-plus icon-white"></i> Tambah rekening</button></a>
<br><br>
<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
<table class="table table-stripped">
	<thead>
		<tr>
			<th width="10%">No</th>
			<th width="40%" ><div align="center">Nama rekening</div></th>
			<th width="50%"><div align="center">Aksi</div></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=0;
			foreach ($data_rekening->result_array() as $tampil) {
			$no++;
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><div align="center"><?php echo $tampil['nama_rekening'];?></div></td>
			<td>
				<div align="center">
				<a href="<?php echo base_url();?>master/rekening/edit/<?php echo $tampil['id_rekening'];?>"><button class="btn"><i class="icon icon-pencil"></i> Edit</button></a>
				<a href="<?php echo base_url();?>master/rekening/delete/<?php echo $tampil['id_rekening'];?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $tampil['nama_rekening'] ?> ?');"><button class="btn"><i class="icon icon-remove"></i> Hapus</button></a>
				</div>
			</td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>