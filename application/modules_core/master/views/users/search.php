<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. Hasil Cari User</b></div>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Aksi</th>
						<th>Nama</th>
						<th>Unit Kerja</th>
						<th>Group</th>
						<th>Operator</th>
						<th>Telp</th>
						<th>Email</th>
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
								<a href="<?php echo base_url();?>master/users/edit/<?php echo $tampil['id'];?>" class="btn btn-small"><i class="icon-wrench"></i></a>
								<a href="<?php echo base_url();?>master/users/delete/<?php echo $tampil['id'];?>" class="btn btn-small" onclick="return confirm('Anda Yakin Ingin Menghapus <?php echo $tampil['nama'];?> ?')" ><i class="icon-remove"></i></a>
							</td>
							<td><?php echo $tampil['nama']; ?></td>
							<td><?php echo $tampil['nama_unit_kerja']; ?></td>
							<td><?php echo $tampil['nama_users_groups']; ?></td>
							<td><?php echo $tampil['nama_users_operators']; ?></td>
							<td><?php echo $tampil['telp']; ?></td>
							<td><?php echo $tampil['email']; ?></td>
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
          <td colspan="8">Data User Tidak Ditemukan</td>
        </tr>
          <?php
        }
      ?>
					
				</tbody>

			</table>
			<a href="<?php echo base_url();?>master/users" class="btn btn-small">kembali</a>

		</div>
	</div>

</body>
</html>