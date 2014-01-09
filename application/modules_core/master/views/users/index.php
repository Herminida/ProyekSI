<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. Data User Management</b></div>
			<table class="table">
				<?php echo form_open('master/users/search','class="navbar-form pull-right"'); ?>
				<tr>
					<td width="80%"><a class="btn btn-small" href="<?php echo base_url();?>master/users/add">Tambah User</a></td>
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
						<th colspan="2" width="12%">Aksi</th>
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
					if($users_data->num_rows()>0)
        			{
					foreach ($users_data->result_array() as $tampil) {
					?>
						<tr>
							<td><?php echo $no ?></td>
							<td colspan="2">
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
          <td colspan="8">Tidak Ada Data User</td>
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