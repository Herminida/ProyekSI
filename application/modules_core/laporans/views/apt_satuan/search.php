<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. Hasil Cari Satuan Obat</b></div>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Aksi</th>
						<th>Satuan Obat</th>
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
							<a class="btn btn-small btn-success" href="<?php echo base_url();?>farmasi/apt_satuan/edit/<?php echo $data['id_satuan'];?>"><i class="icon icon-wrench icon-white"></i></a>
							<a class="btn btn-small btn-warning" href="<?php echo base_url();?>farmasi/apt_satuan/delete/<?php echo $data['id_satuan'];?>"><i class="icon icon-remove" onclick="return confirm('Anda Yakin Ingin Menghapus <?php echo $data['nama_satuan'];?> ?')"></i></a>

						</td>
						<td><?php echo $data['nama_satuan']; ?></td>
					</tr>
					<?php 
					$no++;
					}
					?>
				</tbody>

			</table>
			<a href="<?php echo base_url();?>farmasi/apt_satuan" class="btn btn-mini btn-success">kembali</a>

		</div>
	</div>

</body>
</html>