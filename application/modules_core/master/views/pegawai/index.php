<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. DATA PEGAWAI</b></div>
			<table class="table">
				<?php echo form_open('master/pegawai/search','class="navbar-form pull-right"'); ?>
				<tr>
					<td width="80%"><a class="btn btn-small" href="<?php echo base_url();?>master/pegawai/add">Tambah Pegawai</a></td>
					<td><input type="text" name="keysearch" placeholder="Masukkan Kata Kunci.."></td>
					<td><button type="submit" class="btn btn-small"><i class="icon icon-search"></i> Cari</button></td>

				</tr>

				<?php echo form_close(); ?>

			</table>
			<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Aksi</th>
						<th>Nama Pegawai</th>
						<th>NIP</th>
						<th>Jabatan</th>
						<th>Unit Kerja</th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					if($pegawai_data->num_rows()>0)
        			{
					foreach ($pegawai_data->result_array() as $tampil) {
					?>
						<tr>
							<td><?php echo $no ?></td>
							<td>
								<a href="<?php echo base_url();?>master/pegawai/edit/<?php echo $tampil['id_pegawai'];?>" class="btn btn-small"><i class="icon-wrench"></i></a>
								<a href="<?php echo base_url();?>master/pegawai/delete/<?php echo $tampil['id_pegawai'];?>" class="btn btn-small" onclick="return confirm('Anda Yakin Ingin Menghapus <?php echo $tampil['nama_pegawai'];?> ?')" ><i class="icon-remove"></i></a>
							</td>
							<td><?php echo $tampil['nama_pegawai']; ?></td>
							<td><?php echo $tampil['nip_pegawai']; ?></td>
							<td><?php echo $tampil['nama_jabatan']; ?></td>
							<td><?php echo $tampil['nama_unit_kerja']; ?></td>
							
						</tr>
					<?php
					$no++;	
					}
					?>
					<?php
       
          

        }
        else
        {
          ?>
          
        <tr style="text-align:center;">
          <td colspan="8">Tidak Ada Data Pegawai</td>
        </tr>
          <?php
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