<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. Data Golongan Obat</b></div>
			<table class="table">
				<?php echo site_url(); ?>
				<?php echo form_open('farmasi/apt_gol/search','class="navbar-form pull-right"'); ?>
				<tr>
					<td width="55%"><a class="btn btn-small btn-success" href="<?php echo base_url();?>farmasi/apt_gol/add">Tambah Gol Obat</a></td>
					<td><input type="text" name="keysearch" placeholder="Masukkan Kata Kunci.."></td>
					<td><button type="submit" class="btn btn-small btn-success"><i class="icon icon-search icon-white"></i>Cari Gol Obat</button></td>

				</tr>

				<?php echo form_close(); ?>

			</table>
			<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
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
					foreach($apt_gol->result_array() as $data) {
					?>
					<tr>
						<td><?php echo $no ?></td>
						<td>
						<a class='btn btn-small btn-success' href="<?php echo base_url(); ?>farmasi/apt_gol/edit/<?php echo $data['id_golongan']; ?>"><i class="icon-wrench icon-white"></i></a>
						<a class='btn btn-small btn-warning' href="<?php echo base_url(); ?>farmasi/apt_gol/delete/<?php echo $data['id_golongan']; ?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $data['nama_golongan'] ?> ?');"><i class="icon-remove"></i></a>
						</td>
						<td><?php echo $data['nama_golongan']; ?></td>
					</tr>
					<?php 
					$no++;
					}
					?>
				</tbody>

			</table>

		</div>
	</div>

	<?php 
$pesan = $this->session->flashdata('message');
				if ($this->session->flashdata('message')){
echo "<script>alert('$pesan')</script>";
				}
			
			?>

</body>
</html>