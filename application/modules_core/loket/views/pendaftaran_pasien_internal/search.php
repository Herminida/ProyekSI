<h3>Data Pasien Umum</h3>
<hr>
    <?php
    $confirm=$this->session->flashdata('confirm');
        if(empty($confirm)){

        }
        else{
            ?>
               <div class="alert alert-success">
                    <?php echo $this->session->flashdata('confirm');?>
                </div>
            <?php
        }
    ?>
<table class="table table-striped">
	<thead>
		<tr bgcolor="#D8D8D8">
			<th width="10%">No</th>
			<th width="30%">Nama</th>
			<th width="30%">Alamat</th>
			<th width="40%">Aksi</th>
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
					<td><?php echo $tampil['alamat'];?>, Rt/Rw <?php echo $tampil['rt'];?> / <?php echo $tampil['rw'];?> , <?php echo $tampil['desa'];?></td>
					<td>
						<a href="<?php echo base_url();?>loket/pendaftaran_pasien_internal/edit/<?php echo $tampil['no_identitas'];?>"><button class="btn"><i class="icon icon-pencil"></i> Edit</button></a>
						<a href="<?php echo base_url();?>loket/pendaftaran_pasien_internal/detail/<?php echo $tampil['no_identitas'];?>"><button class="btn"><i class="icon icon-file"></i> Detail</button></a>
						<a href="<?php echo base_url(); ?>loket/pendaftaran_pasien_internal/delete/<?php echo $tampil['id_pasien']; ?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $tampil['nama_lengkap'] ?> ?');"> <button class="btn"><i class="icon icon-remove"></i> Hapus</button></a>
					</td>
				</tr>
			<?php	
		}
		?>
	</tbody>
</table>
    <a href="<?php echo base_url()?>loket/pendaftaran_pasien_internal"><button type="button" class="btn" id="cari"><i class="icon icon-share-alt"></i> Kembali</button></a>
