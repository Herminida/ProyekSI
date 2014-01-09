<table class="table table-striped">
	<thead>
		<tr bgcolor="#2183AB" style="color:#ffffff;font-size:14px;">
			<td width="10%">No</td><td width="30%">Nama</td><td width="40%">Jabatan</td><td width="20%">Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=0;
			foreach ($data_pegawai->result_array() as $tampil) {
				$no++;
				?><tr>
					<td><?php echo $no;?></td>
					<td><?php echo $tampil['nama_pegawai'];?></td>
					<td><?php echo $tampil['nama_jabatan'];?></td>
					<td><button class="btn"  id="pilih" nama="<?php echo $tampil['nama_pegawai'];?>"
						id_pegawai="<?php echo $tampil['id_pegawai'];?>"
						><i class ="icon icon-ok"></i> Pilih</button></td>
				  </tr>
				<?php
			}
		?>
	</tbody>
</table>