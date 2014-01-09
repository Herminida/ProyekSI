<h3>Data Appointment</h3>
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
		<tr bgcolor="#F2F2F2">
			<td width="5%">No</td>
			<td width="10%">Nama</td>
			<td width="20%">Alamat</td>
			<td width="10%">Unit Layanan</td>
			<td width="20%">Dokter</td>
			<td width="35%"><div align="center">Aksi</div></td>
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
					<td><?php echo $tampil['nama_anggota'];;?></td>
					<td><?php echo $tampil['alamat'];?></td>
					<td><?php echo $tampil['nama_klinik']?></td>
					<td><?php echo $tampil['nama_dokter'];?></td>
					<td><div align="center">
						<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				            <div class="modal-header">
				              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				              <h3 id="myModalLabel">Data Apointment</h3>
				            </div>
				            <div class="modal-body">
				                <table>
				                	<tr>
				                		<td width="50px">Nama</td><td width="10px">:</td><td width="300px"><?php echo $tampil['nama_anggota'];?></td>
				                	</tr>
				                	<tr>
				                		<td width="50px">Alamat</td><td width="10px">:</td><td width="300px"><?php echo $tampil['alamat'];?></td>
				                	</tr>
				                	<tr>
				                		<td width="50px">Dokter</td><td width="10px">:</td><td width="300px"><?php echo $tampil['nama_dokter'];?></td>
				                	</tr>
				                	<tr>
				                		<td width="50px">Layanan</td><td width="10px">:</td><td width="300px"><?php echo $tampil['nama_klinik'];?></td>
				                	</tr>
				                	<tr>
				                		<td width="50px">Keluhan</td><td width="10px">:</td><td width="300px"><?php echo $tampil['keluhan'];?></td>
				                	</tr>
				                </table>
				            </div>
				            <div class="modal-footer">
				              <button class="btn" data-dismiss="modal">Selesai</button>
				            </div>
				          </div>
				          
				        <a data-toggle="modal" href="#myModal" id="detail" class="btn"><i class="icon icon-search icon-file"></i> Detail</a>
						<a href=""><button class="btn"><i class="icon icon-pencil"></i> Edit</button></a>
						<a href="<?php echo base_url(); ?>loket/appointment/delete/<?php echo $tampil['id_appointment']; ?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $tampil['nama_anggota'] ?> ?');"> <button class="btn"><i class="icon icon-remove"></i> Hapus</button></a>
					</div></td>
				</tr>
				<?php
			}
		?>
	</tbody>
</table>