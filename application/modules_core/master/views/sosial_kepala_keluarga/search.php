<div id="real">
	<div id="statusdonor">
		<div><b>::. HASIL CARI KEPALA KELUARGA </b> </div>

		<table class="table table-striped">
			<thead>
				<th>No</th>
				<th>Aksi</th>
				<th>No KK</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>RT/RW</th>

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
						<a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_anggota_keluarga/add/<?php echo $db['id']; ?>/<?php echo $db['no_kk'];?>"><i class="icon-plus-sign  "></i>Akk</a>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_kepala_keluarga/edit/<?php echo $db['id']; ?>/<?php echo $db['no_kk'];?>"><i class="icon-wrench"></i></a>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_kepala_keluarga/delete/<?php echo $db['id']; ?>/<?php echo $db['no_kk'];?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $db['nama_kk']?> ?');"><i class="icon-remove"></i></a>
                        <a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_kepala_keluarga/detail/<?php echo $db['id']; ?>/<?php echo $db['no_kk'];?>">Detail</a>
                       
					

					</td>

					
			
					
					<td><?php echo $db['no_kk']; ?></td>
					<td><?php echo $db['nama_kk']; ?></td>
					<td><?php echo $db['alamat']; ?></td>
					<td><?php echo $db['rt']; ?>/<?php echo $db['rw']; ?></td>
					
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

	<a href="<?php echo base_url();?>loket/sosial_kepala_keluarga" class="btn btn-small  ">Kembali</a>
                

	</div>

</div>


