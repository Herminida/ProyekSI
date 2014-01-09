<table class="table table-striped">
	<thead>
		<tr bgcolor="#2183AB" style="color:#ffffff;font-size:14px;">
			<td width="10%">No</td>
			<td width="20%">Kelas Kamar</td>
			<td width="30%">Ruang</td>
			<td width="30%">Aksi</td>
			
		</tr>
	</thead>
	<tbody>
		<?php
			$no=0;
			foreach ($data_kamar->result_array() as $tampil) {
				$no++;
				?><tr>
					<td><?php echo $no;?></td>
					<td><?php echo $tampil['nama_kelas_kamar'];?></td>
					<td><?php echo $tampil['nama_ruang_kamar'];?></td>
					
					<td><button class="btn" data-dismiss="modal" id="daftark" nama_kelas_kamark="<?php echo $tampil['nama_kelas_kamar'];?>"
						nama_ruang_kamark="<?php echo $tampil['nama_ruang_kamar'];?>"
						kelas_kamar_idk="<?php echo $tampil['kelas_kamar_id'];?>"
						statusk="<?php echo $tampil['status'];?>"
						id_ruang_kamark="<?php echo $tampil['id_ruang_kamar'];?>"
						id_ruang_kamar2="<?php echo $tampil['id_ruang_kamar'];?>"
						
						><i class ="icon icon-ok"></i> Pilih</button></td>
				  </tr>
				<?php
			}
		?>
	</tbody>
</table>