<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<?php echo form_open('farmasi/apt_gol/edit');?>
			<table class="table table-striped">
				<thead>
					<tr><th colspan="4">::.Edit Golongan Obat</th></tr>
				</thead>
				<tbody>
					<tr>
						<td>Golongan Obat</td>
						<td>:</td>
						<td>
							<input type="text" name="nama_golongan" value="<?php echo $nama_golongan;?>" placeholder="Masukkan Gol Obat">
						</td>
						<td style="width:50%; color:red"><?php echo form_error('nama_golongan'); ?></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<?php echo form_submit(array('name'=>'simpan','value'=>'Simpan','class'=>'btn btn-small btn-success')); ?>
							<?php echo form_reset(array('name'=>'reset','value'=>'Reset','class'=>'btn btn-small btn-success')); ?>
							<a href="<?php echo base_url();?>farmasi/apt_gol/index" class="btn btn-mini btn-success">Batal</a>

						</td>
					</tr>
				</tbody>
				<input type="hidden" name="id_golongan" value="<?php echo $id_golongan ?>">
			</table>
			<?php echo form_close();?>
		</div>
	</div>

</body>
</html>