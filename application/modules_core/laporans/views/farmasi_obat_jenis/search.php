<div id="real">
	<div id="statusdonor">
		<div><b>::. HASIL CARI JENIS OBAT </b> </div>

		<table class="table table-striped">
			<thead>
				<th>No</th>
				<th>Aksi</th>
				<th>Jenis Obat</th>

			</thead>

			<tbody>

				<?php
				$no = 1;
				if($get_data->num_rows()>0)
				{
					foreach($get_data->result_array() as $db)
					{
				?>
				
				<tr>
					<td><?php echo $no ; ?> </td>
					<td>
						<a class='btn btn-small btn-success' href="<?php echo base_url(); ?>farmasi/farmasi_obat_jenis/edit/<?php echo $db['id']; ?>"><i class="icon-wrench icon-white"></i></a>
						<a class='btn btn-small btn-warning' href="<?php echo base_url(); ?>farmasi/farmasi_obat_jenis/delete/<?php echo $db['id']; ?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $db['nama_obat_jenis'] ?> ?');"><i class="icon-remove"></i></a>
					

					</td>

					
			
					
					<td><?php echo $db['nama_obat_jenis']; ?></td>
				</tr>

				


				<?php
				$no++;

					}

				}
				else
				{
					?>
					
				<tr style="text-align:center;">
					<td colspan="6">Tidak Ada Data Yang ditemukan</td>
				</tr>
					<?php
				}
			?>


			</tbody>

		</table>

	<a href="<?php echo base_url();?>farmasi/farmasi_obat_jenis" class="btn btn-mini btn-success">Kembali</a>
                

	</div>

</div>


