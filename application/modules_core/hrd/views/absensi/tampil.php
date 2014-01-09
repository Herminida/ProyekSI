<table class="table table-striped">
	<thead>
		<tr>
			<td width="10%">NO</td>
			<td width="40%">Nama</td>
			<td width="25%">Jam Masuk</td>
			<td width="25%">Jam Keluar</td>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=0;
			foreach ($data_absensi->result_array() as $tampil) {
				$no++;
		?>
		<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $tampil['nama_pegawai'];?></td>
				<td><?php echo $tampil['jam_masuk'];?></td>
				<td><?php echo $tampil['jam_keluar'];?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>