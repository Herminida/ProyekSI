<div id="real">
  <div id="statusdonor">
    <div><b>::.DATA SUPPLIER OBAT </b> 
    </div>
    <center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
    <?php echo form_open('farmasi/apt_supplier/edit'); ?>
    <table width="100%" class="table table-striped">
      <thead>
          <tr> 
              <th colspan="4"> Data detail supplier obat</th>
            </tr>
          </thead>
      <tr>
        <td width="30%">Nama Supplier</td>
        <td>:</td>
        <td><input type="text" class="span3" name="nama_supplier" id="nama_supplier" value="<?php echo $nama_supplier; ?>" placeholder="Nama supplier"></td>
        <td><div style="color:red" ><?php echo form_error('nama_supplier'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Alamat Supplier</td>
        <td>:</td>
        <td><input type="text" class="span3" name="alamat_supplier" id="alamat_supplier" value="<?php echo $alamat_supplier; ?>" placeholder="Alamat"></td>
        <td><div style="color:red" ><?php echo form_error('alamat_supplier'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Kota</td>
        <td>:</td>
        <td><input type="text" class="span3" name="nama_kota" id="nama_kota" value="<?php echo $nama_kota; ?>" placeholder="Alamat"></td>
        <td><div style="color:red" ><?php echo form_error('nama_kota'); ?></div></td>
      </tr>
      
      <tr>
        <td width="30%">Kode Pos</td>
        <td>:</td>
        <td><input type="text" class="span3" name="kodepos" id="kodepos" maxlength="5" value="<?php echo $kodepos; ?>" placeholder="Kode Pos"></td>
        <td><div style="color:red" ><?php echo form_error('kodepos'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Telepon</td>
        <td>:</td>
        <td><input type="text" class="span3" name="telp" id="telp" maxlength="13" value="<?php echo $telp; ?>" placeholder="Telphon"></td>
        <td><div style="color:red" ><?php echo form_error('telp'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Bank</td>
        <td>:</td>
        <td><input type="text" class="span3" name="bank" id="bank" value="<?php echo $bank; ?>" placeholder="Bank"></td>
        <td><div style="color:red" ><?php echo form_error('bank'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Bank no</td>
        <td>:</td>
        <td><input type="text" class="span3" name="bank_no" id="bank_no" value="<?php echo $bank_no; ?>" placeholder="No Bank"></td>
        <td><div style="color:red" ><?php echo form_error('bank_no'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Bank an</td>
        <td>:</td>
        <td><input type="text" class="span3" name="bank_an" id="bank_an" value="<?php echo $bank_an; ?>" placeholder="An Bank"></td>
        <td><div style="color:red" ><?php echo form_error('bank_an'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Contact</td>
        <td>:</td>
        <td><input type="text" class="span3" name="cp" id="cp" maxlength="13" value="<?php echo $cp; ?>" placeholder="Contact"></td>
        <td><div style="color:red" ><?php echo form_error('cp'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Email</td>
        <td>:</td>
        <td><input type="text" class="span3" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email"></td>
        <td><div style="color:red" ><?php echo form_error('email'); ?></div></td>
      </tr>
      
      <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                  <a href="<?php echo base_url();?>farmasi/apt_supplier" class="btn btn-small">Kembali</a>
        </td>
      </tr>
      <input type="hidden" name="id_supplier" value="<?php echo $id_supplier; ?>">
    </table>
      <?php echo form_close(); ?>
</div>
</div>