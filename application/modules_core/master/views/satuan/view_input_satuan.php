<div class="well">
	<?php  if (validation_errors()) { ?>
		<div class="alert alert-block">
			<button type="button" class="close" data-dismis="alert">x</button>
			<h4>Terjadi Kesalahan</h4>
			<?php echo validation_errors(); ?>
		</div>
	
	<?php } ?>
	<?php echo form_open('satuan/save','class="form-horizontal"'); ?>
		<div class="control-group">
			<legend>Master Data Satuan Obat</legend>
			<label class="control-label" for="nama_satuan" >Satuan Obat</label>
			<div class="controls">
				<input type="text" class="span3" name="nama_satuan" id="nama_satuan" value="<?php echo $nama_satuan ; ?>" placeholder="Satuan Obat"> 
			</div>
		</div>
		
		<input type="hidden" name="id_satuan" value="<?php echo $id_satuan; ?>">
        <input type="hidden" name="st" value="<?php echo $st; ?>">
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-small btn  ">Simpan Data</button>
				<button type="reset" class="btn" >Reset Data</button>
			</div>
		</div>

	<?php echo form_close();?>
</div>