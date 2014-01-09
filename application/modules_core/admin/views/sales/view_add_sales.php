<?php
	if ($st=="add"){
		$nama_sales="";
		$alamat_sales="";
		$kabupaten="";
        $nama_kabbupaten="";
		$telepon="";
		$opsi_komisi="";
		$opsi_nominal="";
		$jumlah="";
        $aksi="adddata";
        $id_sales="";
	}
?>
<?php
    if ($st=="edit"){
    foreach($datasales->result_array() as $tampil){
        $nama_sales=$tampil['nama_sales'];
        $alamat_sales=$tampil['alamat_sales'];
        $kabupaten=$tampil['id_kabupaten'];
        $nama_kabupaten=$tampil['id_kabupaten'];
        $telepon=$tampil['telp'];
        $opsi_komisi=$tampil['komisi_opsi'];
        $opsi_nominal=$tampil['nominal_opsi'];
        $jumlah=$tampil['nominal_jumlah'];
        $aksi="updatedata";
        $id_sales=$id_sales;
}
}
?>
<div class="well">
	<?php if(validation_errors()) { ?>
  		<div class="alert alert-block">
    		<button type="button" class="close" data-dismiss="alert">×</button>
      		<h4>Terjadi Kesalahan!</h4>
    		<?php echo validation_errors(); ?>
  		</div>
  	<?php } ?>
<table style="font-size:14px">
	<tr>
		<td>
			    <?php
			    $attribut=array('class'=>'form-horizontal');
			    echo form_open('sales/'.$aksi,$attribut);
			    ?>
                    <input type="hidden" name="id_sales" id="inputid_sales" placeholder="Nama..." value="<?php echo $id_sales;?>">
    				<div class="control-group">
    					<label class="control-label" for="inputEmail">Nama</label>
    					<div class="controls">
    							<input type="text" class="span3" name="nama_sales" id="inputnama" placeholder="Nama..." value="<?php echo $nama_sales;?>">
    					</div>
    				</div>
    				<div class="control-group">
    					<label class="control-label" for="inputalamat">Alamat</label>
    					<div class="controls">
    						<input type="text" class="span3" name="alamat_sales" id="inputalamat" placeholder="Alamat..." value="<?php echo $alamat_sales; ?>">
    					</div>
    				</div>
    				<div class="control-group">
    					<label class="control-label" for="inputkabupaten">Kabupaten</label>
    					<div class="controls">
    						<select name="kabupaten" style="width:255px; height:25px; font-size:12px;">
                                <?php
                                if (!empty($kabupaten)){
                                    echo "<option value=$kabupaten>$nama_kabupaten</option>";
                                }
                                ?>
    							<option value="">--Silahkan Pilih--</option>
								<option value="1">Kabupaten 1</option>
								<option value="2">Kabupaten 2</option>
							</select>
    					</div>
    				</div>
    				<div class="control-group">
    					<label class="control-label" for="inputtelepon">Telepon</label>
    					<div class="controls">
    						<input type="text" class="span3"  name="telepon" id="inputtelepon" placeholder="Telepon..." value="<?php echo $telepon; ?>">
    					</div>
    				</div>
    				<div class="control-group">
    					<label class="control-label"  for="inputkomisi">Opsi Komisi</label>
    					<div class="controls">
    						<select name="opsi_komisi" style="width:255px; height:25px; font-size:12px;">
                                <?php
                                if (!empty($opsi_komisi)){
                                    echo "<option value='$opsi_komisi'>$opsi_komisi</option>";
                                }
                                ?>
    							<option value="">--Silahkan Pilih--</option>
								<option value="Per Faktur">Per Faktur</option>
								<option value="Per Item">Per Item</option>
							</select>
    					</div>
    				</div>
    				<div class="control-group">
    					<label class="control-label"  for="inputnominal">Opsi Nominal</label>
    					<div class="controls">
    						<select name="opsi_nominal" style="width:255px; height:25px; font-size:12px;">
                                <?php
                                if (!empty($opsi_nominal)){
                                    echo "<option value=$opsi_nominal>$opsi_nominal</option>";
                                }
                                ?>
    							<option value="">--Silahkan Pilih--</option>
								<option value="Persen">Persen</option>
								<option value="Nominal">Nominal</option>
							</select>
    					</div>
    				</div>
    				<div class="control-group">
    					<label class="control-label" for="inputtelepon">Jumlah</label>
    					<div class="controls">
    						<input class="span3" type="text"  name="jumlah" id="inputtelepon" placeholder="Jumlah nominal..." value="<?php echo $jumlah;?>">
    					</div>
    				</div>
    				<div class="control-group">
    					<div class="controls">
    						<button type="submit" class="btn    ">Simpan</button>
    						<a href="<?php echo base_url();?>sales" class="btn   ">Batal</a>
    					</div>
    				</div>
    			<?php
    				echo form_close();
    			?>
		</td>
	</tr>
</table>
</div>