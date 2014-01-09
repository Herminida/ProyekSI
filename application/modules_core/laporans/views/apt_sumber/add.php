<div id="real">
  <div id="statusdonor">
    <div><b>::. DATA SUMBER OBAT </b> 
      <b style="float:right; margin-right:130px; color:red;"></b>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th colspan="3">Data sumber Obat</th>
        </tr>
      </thead>
      <tbody>
        <?php echo form_open('farmasi/apt_sumber/add');?>
        <tr>
          <td>Nama sumber </td><td><input type="text" name="nama_sumber" placeholder="nama sumber"></td>
          <td><div style="color:red"><?php echo validation_errors(); ?></div></td>
        </tr>
        <tr>
          <td colspan="3">
              <input type="submit" value="Simpan" class="btn btn-small btn-success">
              <input type="reset" value="Reset" class="btn btn-small btn-success">
              <a href="<?php echo base_url();?>farmasi/apt_sumber" class="btn btn-mini btn-success">Kembali</a>
          </td>
        </tr>
        <?php echo form_close();?>
      </tbody>
  </table>
</div>
</div>