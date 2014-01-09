<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. DATA MASTER JABATAN</b></div>
			<table class="table">
				<?php echo form_open('master/jabatan/search','class="navbar-form pull-right"'); ?>
				<tr>
					<td width="80%"><a class="btn btn-small" href="<?php echo base_url();?>master/jabatan/add">Tambah Jabatan</a></td>
					<td><input type="text" name="keysearch" placeholder="Masukkan Kata Kunci.."></td>
					<td><button type="submit" class="btn btn-small"><i class="icon icon-search"></i> Cari </button></td>

				</tr>

				<?php echo form_close(); ?>

			</table>
			<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Aksi</th>
						<th>Jabatan</th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					if($jabatan_data->num_rows()>0)
        			{
					foreach ($jabatan_data->result_array() as $tampil) {
					?>
						<tr>
							<td><?php echo $no ?></td>
							<td>
								<a href="<?php echo base_url();?>master/jabatan/edit/<?php echo $tampil['id_jabatan'];?>" class="btn btn-smal"><i class="icon-wrench"></i></a>
								<a href="<?php echo base_url();?>master/jabatan/delete/<?php echo $tampil['id_jabatan'];?>" class="btn btn-small" onclick="return confirm('Anda Yakin Ingin Menghapus <?php echo $tampil['nama_jabatan'];?> ?')" ><i class="icon-remove"></i></a>
							</td>
							<td><?php echo $tampil['nama_jabatan']; ?></td>
							
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
          <td colspan="8">Tidak Ada Data Jabatan</td>
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