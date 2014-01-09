<div id="real">
    <div id="statusdonor">
        <table class="table">
       <!--  <?php echo form_open('loket/list_registrasi/search','class="navbar-form pull-right"'); ?> -->
            <tr>
                <td width="90%"><b>::. DATA LIST REGISTRASI</b></td>
                <!-- <td><input name="keysearch" placeholder="Masukkan kata kunci..."></td>
                <td><button type="submit" class="btn btn-small  "><i class="icon-search  "></i> Cari</button></td> -->
            </tr>
        <?php echo form_close(); ?>
        </table>
        <center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
            <ul>
            
            </ul>
        <table class="table table-striped">
            <thead>
                <tr>
                   <th>No</th> <th>Aksi</th><th>No Registrasi</th><th>Nama Pasien</th><th>Alamat</th><th>Poli</th><th>Cara Bayar</th><th>Nomer Antrian</th>
                </tr>
            </thead>
            <tbody>
            	<?php
            	$no=1;
            	foreach ($list_registrasi->result_array() as $tampil) { ?>
            	<tr>
            		<td><?php echo $no ?></td>
            		<td>
            			<a class="btn btn-small  " href="<?php echo base_url().'loket/list_registrasi/edit/'.$tampil['idpemeriksaan'];?>">Edit</a>
                        <a class="btn btn-small" onclick="javascript:window.open('<?php echo base_url()?>loket/list_registrasi/cetak/<?php echo $tampil['idpemeriksaan']; ?>','mywin','left=20,top=10,width=590,height=600,toolbar=0,resizable=0')"><i class="icon icon-print"></i>Cetak</a>
					</td>
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
            	?>
            
            </tbody>
        </table>

        <div class="pagination pagination-centered">
            <ul>
           
            </ul>
        </div>
    </div>
</div>
<a href="<?php echo base_url();?>loket/admission_registrasi"><button class="btn">Selesai</button></a>