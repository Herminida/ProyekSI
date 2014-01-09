<div id="real">
  <div id="statusdonor">
    <div><b>::. DATA SUMBER OBAT </b> 
      <b style="float:right; margin-right:130px; color:red;"></b>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th colspan="4">Data sumber Obat</th>
        </tr>
      </thead>
      <tbody>
        <?php echo form_open('farmasi/apt_sumber/edit');?>
        <tr>
          <td>Nama sumber </td>
          <td>:</td>
          <td><input type="text" name="nama_sumber" value="<?php echo $nama_sumber;?>" placeholder="nama sumber">
          <input type="hidden" name="id_sumber" value="<?php echo $id_sumber;?>" placeholder="nama sumber"></td>
          <td style="width:60%; color:red"><?php echo form_error('nama_sumber'); ?></td>
        </tr>
       <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                   <a href="<?php echo base_url();?>farmasi/apt_sumber" class="btn btn-small">Batal</a>
          </td>
                <td>&nbsp;</td>
            </tr>
        <?php echo form_close();?>
      </tbody>
  </table>
</div>
</div>