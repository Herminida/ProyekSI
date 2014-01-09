	<div id="real">
		<div id="statusdonor">
			<div><b>::. DATA MASTER JAM KERJA</b></div><br><hr>
			<table>
				<tr>
					<td width="80%"><a class="btn small-box" rel="group" href="<?php echo base_url();?>hrd/jam_kerja/add">Tambah jam_kerja</a></td>
				</tr>
			</table>
			<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
			<table class="table table-stripped">
				<thead>
					<tr bgcolor="#F1F1F1">
						<td width="10%">NO</td>
						<td width="15%">Shift</td>
						<td width="10%">Jam Masuk</td>
						<td width="10%">Jam Pulang</td>
						<td width="15%">Jam Keluar Istirahat</td>
						<td width="15%">Jam Masuk Istirahat</td>
						<td width="40%">Aksi</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=0;
						foreach ($jam_kerja->result_array() as $tampil) {
							$no++;
					?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $tampil['nama_shift'];?></td>
						<td><?php echo $tampil['jam_masuk'];?></td>
						<td><?php echo $tampil['jam_keluar'];?></td>
						<td><?php echo $tampil['jam_keluar_istirahat'];?></td>
						<td><?php echo $tampil['jam_masuk_istirahat'];?></td>
						<td>
							<a class="btn small-box" rel="group" href="<?php echo base_url();?>hrd/jam_kerja/edit/<?php echo $tampil['id_jam_kerja'];?>"><i class="icon icon-pencil"></i> Edit</a>
							<a href="<?php echo base_url();?>hrd/jam_kerja/delete/<?php echo $tampil['id_jam_kerja'];?>"><button class="btn"><i class="icon icon-remove"></i> Delete</button></a>
						</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>

		</div>
	</div>

	