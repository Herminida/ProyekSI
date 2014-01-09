<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. Hasil Cari Golongan Obat</b></div>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Aksi</th>
						<th>Golongan Obat</th>
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
							<a class="btn btn-small" href="<?php echo base_url();?>farmasi/apt_gol/edit/<?php echo $data['id_golongan'];?>"><i class="icon icon-wrench"></i></a>
							<a class="btn btn-small" href="<?php echo base_url();?>farmasi/apt_gol/delete/<?php echo $data['id_golongan'];?>"><i class="icon icon-remove" onclick="return confirm('Anda Yakin Ingin Menghapus <?php echo $data['nama_golongan'];?> ?')"></i></a>

						</td>
						<td><?php echo $data['nama_golongan']; ?></td>
					</tr>
					<?php 
					$no++;
					}
					?>
				</tbody>

			</table>
			<a href="<?php echo base_url();?>farmasi/apt_gol" class="btn btn-small">kembali</a>

		</div>
	</div>

</body>
</html>