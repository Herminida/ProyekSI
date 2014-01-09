<div id="real">
	<div id="statusdonor">
		<div><b>::. HASIL CARI LIST REGISTRASI</b> </div>

		<table class="table table-striped">
			<thead>
				<th>No</th> <th>Aksi</th><th>No Registrasi</th><th>Nama Pasien</th><th>Alamat</th><th>Poli</th><th>Cara Bayar</th><th>Nomer Antrian</th>
                

			</thead>

			<tbody>

				<?php
				$no = 1;
				if($get_data->num_rows()>0)
				{
					foreach($get_data->result_array() as $tampil)
					{
				?>
				
				<tr>
					<td><?php echo $no ; ?> </td>
					
					<td>Detail</td>
            		<td><?php echo $tampil['id_reg'] ?></td>
            		<td><?php echo $tampil['nama_anggota'] ?></td>
            		<td><?php echo $tampil['alamat'] ?></td>
            		<td><?php echo $tampil['nama_klinik'] ?></td>
            		<td><?php echo $tampil['cara_bayar'] ?></td>
            		<td><?php echo $tampil['nomor_antrian'] ?></td>

					
			
					
					
					
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

	<a href="<?php echo base_url();?>loket/list_registrasi" class="btn btn-small ">Kembali</a>
                

	</div>

</div>


