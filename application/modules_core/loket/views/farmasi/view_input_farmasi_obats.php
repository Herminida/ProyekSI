<div class="well">
	<?php  if (validation_errors()) { ?>
		<div class="alert alert-block">
			<button type="button" class="close" data-dismis="alert">x</button>
			<h4>Terjadi Kesalahan</h4>
			<?php echo validation_errors(); ?>
		</div>
	
	<?php } ?>
	<?php echo form_open('farmasi_obats/save','class="form-horizontal"'); ?>
		<div class="control-group">
			<legend>Master Data Obat</legend>
			<label class="control-label" for="nama_obat" >Nama Obat</label>
			<div class="controls">
				<input type="text" class="span3" name="nama_obat" id="nama_obat" value="<?php echo $nama_obat ; ?>" placeholder="Nama Obat"> 
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="obat_jenis_id" >Jenis Obat</label>
			<select  style="width:255px; height:25px; font-size:12px;" name="obat_jenis_id" id="obat_jenis_id">
          		<option value="">-Pilih Jenis Obat-</option> 
					<?php
					foreach($data_obat_jenis->result_array() as $d)
					{
						if($id==$d['id'])
						{
				?>
					<option value="<?php echo $d['id']; ?>" selected="selected"><?php echo $d['nama_obat_jenis']; ?></option>
				<?php
						}
						else
						{
				?>
					<option value="<?php echo $d['id']; ?>"><?php echo $d['nama_obat_jenis']; ?></option>
				<?php
						}
					}
				?>
				</select>
		</div>

		<div class="control-group">
			<label class="control-label" for="satuan_obat">Satuan</label>
			<div class="controls">
				<input type="text" class="span3" name="satuan_obat" id="satuan_obat" value="<?php echo $satuan_obat; ?>" placeholder="Satuan Obat">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="dosis">Dosis</label>
			<div class="controls">
				<input type="text" class="span3" name="dosis" id="dosis" value="<?php echo $dosis; ?>" placeholder="Dosis">
			</div>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="st" value="<?php echo $st; ?>">
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-small btn  " >Simpan Data</button>
				<button type="reset" class="btn" >Reset Data</button>
			</div>
		</div>

	<?php echo form_close();?>
</div>