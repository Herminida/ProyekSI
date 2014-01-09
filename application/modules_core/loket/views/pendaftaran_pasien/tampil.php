<h3>Data Pasien</h3>
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
					<td><?php echo $tampil['nama_anggota'];?></td>
					<td><?php echo $tampil['alamat'];?></td>
					<td>
						<a href="<?php echo base_url();?>loket/pendaftaran_pasien/edit/<?php echo $tampil['nik'];?>"><button class="btn"><i class="icon icon-pencil"></i> Edit</button></a>
						<a href="<?php echo base_url();?>loket/pendaftaran_pasien/detail/<?php echo $tampil['nik'];?>"><button class="btn"><i class="icon icon-file"></i> Detail</button></a>
						<a href="<?php echo base_url(); ?>loket/pendaftaran_pasien/delete/<?php echo $tampil['id_pasien']; ?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $tampil['nama_anggota'] ?> ?');"> <button class="btn"><i class="icon icon-remove"></i> Hapus</button></a>
					</td>
				</tr>
			<?php	
		}
		?>
	</tbody>
</table>

            <?php
              echo $paginator;
            ?>
           