<div class="well">
  <?php if(validation_errors()) { ?>
  <div class="alert alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Terjadi Kesalahan!</h4>
    <?php echo validation_errors(); ?>
  </div>
  <?php } ?>
    <?php echo form_open('sumber/save','class="form-horizontal"'); ?>
      <div class="control-group">
        <legend>Master Data Supplyer</legend>
      <label class="control-label" for="nama_sumber">Nama Sumber</label>
      <div class="controls">
        <input type="text" class="span3" name="nama_sumber" id="nama_sumber" value="<?php echo $nama_sumber; ?>" placeholder="Nama Sumber">
      </div>
      </div>
      

      <input type="hidden" name="id_sumber" value="<?php echo $id_sumber; ?>">
      <input type="hidden" name="st" value="<?php echo $st; ?>">
      <div class="control-group">
      <div class="controls">
        <button type="submit" class="btn btn-small btn  ">Simpan Data</button>
        <button type="reset" class="btn">Reset Data</button>
      </div>
      </div>
    <?php echo form_close(); ?>
  </div>    