<table class="table table-striped">
	<thead>
    	<tr bgcolor="#DBEAF9">
			<td width="10%">NO</td>
			<td width="40%">Nama</td>
			<td width="30%">Jabatan</td>
			<td width="20%">Aksi</td>
		</tr>
	</thead>
	<tbody>
<?php
	$no="";
	$nama_pegawai="";
	foreach ($pegawai->result_array() as $tampil) {
		$nama_pegawai=$tampil['nama_pegawai'];
		$no++;
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $tampil['nama_pegawai'];?></td>
			<td><?php echo $tampil['nama_jabatan'];?></td>
			<td><button class="btn" id="btn_pilih" data-dismiss="modal" id_pegawai="<?php echo $tampil['id_pegawai'];?>" nama_pegawai="<?php echo $tampil['nama_pegawai'];?>" jabatan="<?php echo $tampil['nama_jabatan'];?>" alamat="<?php echo $tampil['alamat'];?>">Pilih</button></td>
		</tr>	
		<?php
	}
	if ($nama_pegawai==""){
		echo "Data tidak ada!!!";
	}
?>
</tbody>
</table>