<h3>Data Detail Pasien</h3>
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
<table>
<tr>
	<td>
		<?php
			foreach ($data_registrasi->result_array() as $tampil) {
				$status=$tampil['status_pernikahan_id'];
				if($status==0){
					$status="Belum Menikah";
				}
				else{
					$status="Sudah Menikah";
				}
				?>
					<table>
						<tr>
							<td width="150px;">Nama</td><td width="10px;">:</td><td width="300px;"><?php echo $tampil['nama_anggota'];?></td>
						</tr>
						<tr>
							<td>NIK</td><td width="10px;">:</td><td><?php echo $tampil['nik'];?></td>
						</tr>
						<tr>
							<td>No RM</td><td width="10px;">:</td><td><?php echo $tampil['no_rm'];?></td>
						</tr>
						<tr>
							<td>Alamat</td><td width="10px;">:</td><td><?php echo $tampil['alamat'];?></td>
						</tr>
						<tr>
							<td>Tempat/Tanggal Lahir</td><td width="10px;">:</td><td><?php echo $tampil['tempat_lahir'];?>/<?php echo $tampil['tanggal_lahir'];?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td><td width="10px;">:</td><td><?php if($tampil['sex']=="l"){echo "Laki-laki";}else{echo "Perempuan";}?></td>
						</tr>
						<tr>
							<td>Pendidikan</td><td width="10px;">:</td><td><?php echo $tampil['nama_pendidikan'];?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td><td width="10px;">:</td><td><?php echo $tampil['nama_pekerjaan'];?></td>
						</tr>
						<tr>
							<td>Agama</td><td width="10px;">:</td><td><?php echo $tampil['nama_agama'];?></td>
						</tr>
						<tr>
							<td>Status Perkawinan</td><td width="10px;">:</td><td><?php echo $status;?></td>
						</tr>
						<tr>
							<td>Telepon</td><td width="10px;">:</td><td><?php echo $tampil['telepon'];?></td>
						</tr>
					</table>
</td>
<td valign="top">
	<div id="print">
		<table border="2" width="400px;">
			<thead>
				<tr>
					<td align="center"><b> Kartu Rumah Sakit</b></td>
				</tr>
				<tr>
					<td>
						<div style="float:right; font-weight:bold; margin-right:20px; font-size:15px;">
							No Rm : <?php echo $tampil['no_rm'];?>
						</div><br>
						<table style="margin-left:10px;">
							<tr>
								<td width="80px">Nama</td><td width="10px" valign="top">:</td><td valign="top"><?php echo $tampil['nama_anggota'];?></td>
							</tr>
							<tr>
								<td width="80px">Tempat/Tanggal Lahir</td><td width="10px" valign="top">:</td><td valign="top"><?php echo $tampil['tempat_lahir'];?>/<?php echo $tampil['tanggal_lahir'];?></td>
							</tr>
							<tr>
								<td width="80px">Alamat</td><td width="10px" valign="top">:</td><td valign="top"><?php echo $tampil['alamat'];?></td>
							</tr>
							<tr>
								<td width="80px">Telepon</td><td width="10px" valign="top">:</td><td valign="top"><?php echo $tampil['telepon'];?></td>
							</tr>
						</table>
					</td>
				</tr>
			</thead>
		</table>
	</div> <!-- Ends of Print -->
	<br>
	<button class="btn" id="btn-print"><i class="icon icon-print"></i> Cetak</button>
	<a href="<?php echo base_url();?>loket/pendaftaran_pasien/add"><button class="btn"><i class="icon icon-ok"></i> Selesai</button></a>
	<br>
</td>
				<?
			}

		?>

</tr>
</table>
<div style="border: solid 1px #999fff; width: 300px; padding: 20px; margin-top:200px;">
	        <div style="font-weight: bold;">Pengaturan Cetak</div>
	        <table>
	          <tbody><tr>
	            <td><input value="popup" name="mode" id="popup" checked="" type="radio"> Dengan Popup</td>
	          </tr>
	          <tr>
	            <td><input value="iframe" name="mode" id="iFrame" type="radio">Dengan IFrame</td>
	          </tr>
	        </tbody></table>
	    </div>
<script type="text/javascript">
$(document).ready(function(){
	$("#btn-print").click(function(){
		var mode = $("input[name='mode']:checked").val();
        var close = mode == "popup" && $("input#closePop").is(":checked")

        var options = { mode : mode, popClose : close };
		$("#print").printArea(options);
	});
	$("input[name='mode']").click(function(){
            if ( $(this).val() == "iframe" ) $("#closePop").attr( "checked", false );
        });
});
</script>
