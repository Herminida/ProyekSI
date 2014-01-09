<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. Hasil Cari Group</b></div>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Aksi</th>
						<th>Group</th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					if($search_data->num_rows()>0)
        			{
					foreach ($search_data->result_array() as $tampil) {
					?>
						<tr>
							<td><?php echo $no ?></td>
							<td>
								<a href="<?php echo base_url();?>master/users_groups/edit/<?php echo $tampil['id'];?>" class="btn btn-small"><i class="icon-wrench"></i></a>
								<a href="<?php echo base_url();?>master/users_groups/delete/<?php echo $tampil['id'];?>" class="btn btn-small" onclick="return confirm('Anda Yakin Ingin Menghapus <?php echo $tampil['nama_users_groups'];?> ?')" ><i class="icon-remove"></i></a>
							</td>
							<td><?php echo $tampil['nama_users_groups']; ?></td>
							
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
          <td colspan="8">Data Group Tidak Ditemukan</td>
        </tr>
          <?php
        }
      ?>
					
				</tbody>

			</table>
			<a href="<?php echo base_url();?>master/users_groups" class="btn btn-small">kembali</a>

		</div>
	</div>

</body>
</html>