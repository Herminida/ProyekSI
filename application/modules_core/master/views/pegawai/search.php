<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. Hasil Cari Pegawai</b></div>

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
					if($get_data->num_rows()>0)
        			{
					foreach ($get_data->result_array() as $tampil) {
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
          <td colspan="8">Data Pegawai Tidak Ditemukan</td>
        </tr>
          <?php
        }
      ?>
					
				</tbody>

			</table>
			<a href="<?php echo base_url();?>master/pegawai" class="btn btn-small">kembali</a>

		</div>
	</div>

</body>
</html>