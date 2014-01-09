<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. Hasil Cari Obat</b></div>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
			            <th>Aksi</th>
			            <th>Nama Obat</th>
			            <th>Jenis</th>
			            <th>Satuan</th>
			            <th>Golongan</th>
			            <th>Dosis</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($get_data->result_array() as $data) {
					?>
					<tr>
						<td><?php echo $no ?></td>
						<td>
							<a class="btn btn-small" href="<?php echo base_url();?>farmasi/farmasi_obats/edit/<?php echo $data['id'];?>"><i class="icon icon-wrench"></i></a>
							<a class="btn btn-small" href="<?php echo base_url();?>farmasi/farmasi_obats/delete/<?php echo $data['id'];?>"><i class="icon icon-remove" onclick="return confirm('Anda Yakin Ingin Menghapus <?php echo $data['nama_obat'];?> ?')"></i></a>

						</td>
						<td><?php echo $data['nama_obat'] ?></td>
			            <td><?php echo $data['nama_obat_jenis']; ?></td>
			            <td><?php echo $data['nama_satuan']; ?></td>
			            <td><?php echo $data['nama_golongan']; ?></td>
			            <td><?php echo $data['dosis']; ?></td>
					</tr>
					<?php 
					$no++;
					}
					?>
				</tbody>

			</table>
			<a href="<?php echo base_url();?>farmasi/farmasi_obats" class="btn btn-small">kembali</a>

		</div>
	</div>

</body>
</html>