<script type="text/javascript">
$(document).ready(function(){
	$("#cari").click(function(){
		var kata_kunci=$("#kata_kunci").val();
		if(kata_kunci==""){
			alert("Kata kunci masih kosong!");
			$("#kata_kunci").focus();
		}
		else{
			$("#frm_cari").submit();
		}
	});
});
</script>



<h3>Data Pasien PTPN</h3>
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
<form class="form-inline" id="frm_cari" style="float:right;" action="<?php echo base_url()?>loket/pendaftaran_pasien_ptpn/search" method="post">
    <input type="text" name="kata_kunci" id="kata_kunci" class="input-medium" placeholder="Kata kunci...">
    <button type="button" class="btn" id="cari"><i class="icon icon-search"></i> Cari</button>
</form>
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
						<a href="<?php echo base_url();?>loket/pendaftaran_pasien_ptpn/edit/<?php echo $tampil['no_identitas'];?>"><button class="btn"><i class="icon icon-pencil"></i> Edit</button></a>
						<a href="<?php echo base_url();?>loket/pendaftaran_pasien_ptpn/detail/<?php echo $tampil['no_identitas'];?>"><button class="btn"><i class="icon icon-file"></i> Detail</button></a>
						<a href="<?php echo base_url(); ?>loket/pendaftaran_pasien_ptpn/delete/<?php echo $tampil['id_pasien']; ?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $tampil['nama_lengkap'] ?> ?');"> <button class="btn"><i class="icon icon-remove"></i> Hapus</button></a>
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
           