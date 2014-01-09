<table class="table table-striped">
	<thead>
		<tr bgcolor="#2183AB" style="color:#ffffff;font-size:14px;">
			<td width="10%">No</td>
			<td width="20%">Nama Tunjangan</td>
			<td width="30%">Aksi</td>
			
		</tr>
	</thead>
	<tbody>
		<?php
			$no=0;
			foreach ($data_tunjangan->result_array() as $tampil) {
				$no++;
				?><tr>
					<td><?php echo $no;?></td>
					<td><?php echo $tampil['nama_tunjangan'];?></td>
					
					
					<td><button class="btn" data-dismiss="modal" id="daftark" nama_tunjangan="<?php echo $tampil['nama_tunjangan'];?>"
						id="<?php echo $tampil['id'];?>"
						
						><i class ="icon icon-ok"></i> Pilih</button></td>
				  </tr>
				<?php
			}
		?>
	</tbody>
</table>