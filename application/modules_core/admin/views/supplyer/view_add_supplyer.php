<div class="well">
  <?php if(validation_errors()) { ?>
  <div class="alert alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Terjadi Kesalahan!</h4>
    <?php echo validation_errors(); ?>
  </div>
  <?php } ?>
    <?php echo form_open('supplyer/save','class="form-horizontal"'); ?>
      <div class="control-group">
        <legend>Master Data Supplyer</legend>
      <label class="control-label" for="nama_supplier">Nama</label>
      <div class="controls">
        <input type="text" class="span" name="nama_supplier" id="nama_supplier" value="<?php echo $nama_supplier; ?>" placeholder="Nama Supplyer">
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="alamat_supplier">Alamat</label>
      <div class="controls">
        <input type="text" class="span" name="alamat_supplier" id="alamat_supplier" value="<?php echo $alamat_supplier; ?>" placeholder="Alamat">
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="kodepos">Kode Pos</label>
      <div class="controls">
        <input type="text" class="span" name="kodepos" id="kodepos" value="<?php echo $kodepos; ?>" placeholder="Kode Pos">
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="telp">Telphon</label>
      <div class="controls">
        <input type="text" class="span" name="telp" id="telp" value="<?php echo $telp; ?>" placeholder="Telphon">
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="bank">Bank</label>
      <div class="controls">
        <input type="text" class="span" name="bank" id="bank" value="<?php echo $bank; ?>" placeholder="Bank">
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="bank_no">No Bank</label>
      <div class="controls">
        <input type="text" class="span" name="bank_no" id="bank_no" value="<?php echo $bank_no; ?>" placeholder="No Bank">
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="bank_an">An Bank</label>
      <div class="controls">
        <input type="text" class="span" name="bank_an" id="bank_an" value="<?php echo $bank_an; ?>" placeholder="An Bank">
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="cp">Contact</label>
      <div class="controls">
        <input type="text" class="span" name="cp" id="cp" value="<?php echo $cp; ?>" placeholder="Contact">
      </div>
      </div>

      <div class="control-group">
      <label class="control-label" for="email">Email</label>
      <div class="controls">
        <input type="text" class="span" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email">
      </div>
      </div>

      <input type="hidden" name="id_supplier" value="<?php echo $id_supplier; ?>">
      <input type="hidden" name="st" value="<?php echo $st; ?>">
      <div class="control-group">
      <div class="controls">
        <button type="submit" class="btn btn-small btn  ">Simpan Data</button>
        <button type="reset" class="btn">Reset Data</button>
      </div>
      </div>
    <?php echo form_close(); ?>
  </div>    