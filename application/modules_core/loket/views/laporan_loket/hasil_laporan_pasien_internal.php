<h4>Nama-nama pasien Rumah Sakit Kaliwates</h4><br>
<?php
	if(isset($pencarian)){
		?>
		<div style="float:right;"><a href="<?php echo base_url()?>loket/laporan_loket/laporan_pasien_internal_excel/<?php echo $pencarian;?>"><button class="btn"><i class="icon icon-file"></i> Export</button></a> || <button class="btn" id="btn-print"> <i class="icon icon-print"></i> Cetak</button></div>
		<?php
	}
	else{
		?>
		<?php
	}
?>

<div align="center" style="font-size:15px;"><b><?php echo $judul;?></b></div><br>
<table class="table table-bordered " border="1" style="height:30px">
	<thead>
		<tr bgcolor="#EFEFEF">
			<td width="5%">NO</td>
			<td width="20%">Nama</td>
			<td width="30%">Alamat</td>
			<td width="20%">Tempat/Tanggal Lahir</td>
			<td width="15%">Telepon</td>
			<td width="10%">Internal</td>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=0;
			foreach ($data_pasien->result_array() as $tampil) {
				$no++;
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $tampil['nama_lengkap'];?></td>
			<td><?php echo $tampil['alamat'];?>,RT/RW <?php echo $tampil['rt'];?>/<?php echo $tampil['rw'];?>, <?php echo $tampil['desa'];?>, <?php echo $tampil['kecamatan'];?>, <?php echo $tampil['kota'];?></td>
			<td><?php echo $tampil['tempat_lahir'];?>/<?php echo $tampil['tanggal_lahir'];?></td>
			<td><?php echo $tampil['no_telepon_rumah'];?>, <?php echo $tampil['no_hp'];?></td>
			<td><?php echo $tampil['nama_jabatan'];?></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
<?php
if($no==0){
	echo "Data tidak ada!";
	}
?>
