<table class="table table-striped">
	<thead>
		<tr bgcolor="#2183AB" style="color:#ffffff;font-size:14px;">
			<td width="10%">No</td>
			<td width="20%">No RM</td>
			<td width="30%">Nama</td>
			<td width="30%">Alamat</td>
			<td width="10%">Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=0;
			foreach ($data_pasien->result_array() as $tampil) {
				$no++;
				?><tr>
					<td><?php echo $no;?></td>
					<td><?php echo $tampil['no_rm'];?></td>
					<td><?php echo $tampil['nama_lengkap'];?></td>
					<td><?php echo $tampil['alamat'];?></td>
					<td><button class="btn" data-dismiss="modal" id="daftarb" nama_lengkapb="<?php echo $tampil['nama_lengkap'];?>"
						no_rmb="<?php echo $tampil['no_rm'];?>"
						alamatb="<?php echo $tampil['alamat'];?>"
						jenis_kelaminb="<?php echo $tampil['jenis_kelamin'];?>"
						no_hpb="<?php echo $tampil['no_hp'];?>"
						umurb="<?php echo $tampil['umur'];?>"
						id_pasienb="<?php echo $tampil['id_pasien'];?>"
						><i class ="icon icon-ok"></i> Pilih</button></td>
				  </tr>
				<?php
			}
		?>
	</tbody>
</table>