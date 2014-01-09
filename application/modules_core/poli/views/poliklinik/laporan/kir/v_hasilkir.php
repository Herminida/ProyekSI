<?php
	$this->load->view('poliklinik/laporan/v_headercetak.php'); 

?>
<div id="cetak">
<p>SURAT KETERANGAN KESEHATAN</p>
<p>No: <?php echo($no_kir); ?></p>
<p>Yang bertanda tangan dibawah ini dokter pemeriksa pada puskesmas
menerangkan bahwa:</p>
<p style="padding-left:40px">Nama       &nbsp; &nbsp; &nbsp;: <?php echo($nama_anggota); ?></p>
<p style="padding-left:40px">Tempat &nbsp;&nbsp; : <?php echo($tempat_lahir); ?></p>
<p style="padding-left:40px">Tgl Lahir : <?php echo($tanggal_lahir); ?></p>
<p style="padding-left:40px">Alamat    &nbsp; &nbsp;: <?php echo($alamat); ?></p>
<p>Telah kami periksa dengan hasil <?php echo($hasil); ?></p>
<p>Guna untuk <?php echo($guna); ?></p>
<p>Demikian Surat Keterangan ini kami buat dengan sesungguhnya agar
dipergunakan sesuai dengan mestinya.</p>
<p><br><br>
</p>
<p style="float:right"><?php echo $this->session->userdata('nama_unit_kerja');?>,<?php echo($tgl_kir); ?></p>
<p style="padding-left:760px"><br><br></p>
<p style="padding-left:760px"><br><br></p>
<p style="float:right">Dokter Periksa</p>
<p style="padding-left:760px"><br><br></p>
<p style="float:right"><?php echo $this->session->userdata('nama_pegawai'); ?></p>
</div>
<br><br>
<button class="btn btn-primary" onClick="cetak();">Cetak</button>
</html>