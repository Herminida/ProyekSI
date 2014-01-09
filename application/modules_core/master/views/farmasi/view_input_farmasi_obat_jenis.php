<div class="well">
	<?php  if (validation_errors()) { ?>
		<div class="alert alert-block">
			<button type="button" class="close" data-dismis="alert">x</button>
			<h4>Terjadi Kesalahan</h4>
			<?php echo validation_errors(); ?>
		</div>
	
	<?php } ?>
	<?php echo form_open('farmasi_obat_jenis/save','class="form-horizontal"'); ?>
		<div class="control-group">
			<legend>Master Data Jenis Obat</legend>
			<label class="control-label" for="nama_obat_jenis" >Nama Jenis Obat</label>
			<div class="controls">
				<input type="text" class="span3" name="nama_obat_jenis" id="nama_obat_jenis" value="<?php echo $nama_obat_jenis ; ?>" placeholder="Jenis Obat"> 
			</div>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="st" value="<?php echo $st; ?>">
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-small btn  ">Simpan Data</button>
				<button type="reset" class="btn btn-small btn  " >Reset Data</button>
				<?php echo form_close();?>
				<?php echo form_open('farmasi_obat_jenis'); ?>
				<button type="submit" class="btn btn-small btn  ">Batal</button>
				<?php echo form_close();?>
			</div>
		</div>
</div>