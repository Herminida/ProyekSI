<div align="center"><h4>Sinkronisasi Absensi Rs Kaliwates Bulan <?php echo $bulan1;?> Tahun <?php echo $tahun1;?> </h4></div><br>
<br>
<table class="table table-bordered" border="1">
	<thead>
		<tr>
			<td rowspan="2" width="5%" ><div align="center">No</div></td><td rowspan="2" width="25%"><div align="center">Nama</div></td><td colspan="31"><div align="center">Tanggal</div></td>
		</tr>
		<tr>
			<?php
				$bulan=date('m');
		    	$tahun=date('Y');  
		        $jumHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
				for ($i=1; $i <=$jumHari ; $i++) { 
					?>
						<td><?php echo $i;?></td>
					<?php
				}
			?>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=0;
			foreach ($data_identitas_pegawai->result_array() as $tampil) {
				$no++;
				$nip_pegawai=$tampil['nip_pegawai'];
			?>
			<tr>
			<td width="5%" ><div align="center"><?php echo $no;?></div></td>
			<td  width="25%"><div align="center"><?php echo $tampil['nama_pegawai'];?></div></td>
				<?php
				for ($i=1; $i <=$jumHari ; $i++) { 
				?>
				<?php
					$coba=$this->db->query("select nip_pegawai from tbl_absensi where nip_pegawai='$nip_pegawai' and day(tanggal_absensi)='$i' and month(tanggal_absensi)='$bulan1' and year(tanggal_absensi)='$tahun1'");
					$hasil="";
					foreach ($coba->result_array() as $key) {
						$hasil=$key['nip_pegawai'];
						}
						?>
						<?php
							if(empty($hasil)){
								?>
									<td bgcolor="red"><div align="center">x</div></td>
								<?php
							}
							else{
								?>
									<td><div align="center">v</div></td>
								<?php
							}
						?>
						<?
					
				?>
				<?
				}
			?>
		</tr>
			<?php
			}
		?>
	</tbody>
</table>