<h3>Kelas Kamar</h3>
<hr>
<a href="<?php echo base_url();?>master/kelas_kamar/add"><button class="btn btn-success"><i class="icon icon-plus icon-white"></i> Tambah Kelas Kamar</button></a>
<br><br>
<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
<table class="table table-stripped">
	<thead>
		<tr>
			<th width="10%">No</th>
			<th width="40%" ><div align="center">Nama Kelas</div></th>
			<th width="50%"><div align="center">Aksi</div></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=0;
			foreach ($data_kelas_kamar->result_array() as $tampil) {
			$no++;
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><div align="center"><?php echo $tampil['nama_kelas_kamar'];?></div></td>
			<td>
				<div align="center">
				<a href="<?php echo base_url();?>master/kelas_kamar/edit/<?php echo $tampil['id_kelas_kamar'];?>"><button class="btn"><i class="icon icon-pencil"></i> Edit</button></a>
				<a href="<?php echo base_url();?>master/kelas_kamar/delete/<?php echo $tampil['id_kelas_kamar'];?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $tampil['nama_kelas_kamar'] ?> ?');"><button class="btn"><i class="icon icon-remove"></i> Hapus</button></a>
				</div>
			</td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>