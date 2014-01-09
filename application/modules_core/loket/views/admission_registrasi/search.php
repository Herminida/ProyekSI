<table class="table table-striped">
	<thead>
		<tr bgcolor="#2183AB" style="color:#ffffff;font-size:14px;">
			<td width="10%">No</td><td width="30%">Nama</td><td width="40%">Alamat</td><td width="20%">Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=0;
			foreach ($data_pasien->result_array() as $tampil) {
				$no++;
				?><tr>
					<td><?php echo $no;?></td>
					<td><?php echo $tampil['nama_anggota'];?></td>
					<td><?php echo $tampil['alamat'];?></td>
					<td><button class="btn" data-dismiss="modal" id="daftar" nama="<?php echo $tampil['nama_anggota'];?>"
						nik="<?php echo $tampil['nik'];?>"
						alamat="<?php echo $tampil['alamat'];?>"
						sex="<?php if($tampil['sex']=='l'){echo "Laki-laki";}else{echo "Perempuan";}?>"
						tgl="<?php echo $tampil['tanggal_lahir'];?>"
						idumur="<?php echo $tampil['umur'];?>"
						id_anggota="<?php echo $tampil['id_pasien'];?>"
						><i class ="icon icon-ok"></i> Pilih</button></td>
				  </tr>
				<?php
			}
		?>
	</tbody>
</table>