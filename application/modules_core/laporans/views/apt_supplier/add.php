<div id="real">
  <div id="statusdonor">
    <div><b>::.DATA SUPPLIER OBAT </b> 
    </div>
    <center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
    <?php echo form_open('farmasi/apt_supplier/add'); ?>
    <table width="100%" class="table table-striped">
      <thead>
          <tr> 
              <th colspan="4"> Data detail supplier obat</th>
            </tr>
          </thead>
      <tr>
        <td width="30%">Nama Supplier</td>
        <td>:</td>
        <td><input type="text" class="span3" name="nama_supplier" id="nama_supplier" placeholder="Nama supplier"></td>
        <td><div style="color:red" ><?php echo form_error('nama_supplier'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Alamat Supplier</td>
        <td>:</td>
        <td><input type="text" class="span3" name="alamat_supplier" id="alamat_supplier"  placeholder="Alamat"></td>
        <td><div style="color:red" ><?php echo form_error('alamat_supplier'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Kota</td>
        <td>:</td>
        <td><input type="text" class="span3" name="nama_kota" id="nama_kota"  placeholder="Kota"></td>
        <td><div style="color:red" ><?php echo form_error('nama_kota'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Kode Pos</td>
        <td>:</td>
        <td><input type="text" class="span3" name="kodepos" id="kodepos"  placeholder="Kode Pos" maxlength="5"></td>
        <td><div style="color:red" ><?php echo form_error('kodepos'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Telepon</td>
        <td>:</td>
        <td><input type="text" class="span3" name="telp" id="telp"  placeholder="Telphon" maxlength="13"></td>
        <td><div style="color:red" ><?php echo form_error('telp'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Bank</td>
        <td>:</td>
        <td><input type="text" class="span3" name="bank" id="bank"  placeholder="Bank"></td>
        <td><div style="color:red" ><?php echo form_error('bank'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Bank no</td>
        <td>:</td>
        <td><input type="text" class="span3" name="bank_no" id="bank_no"  placeholder="No Bank"></td>
        <td><div style="color:red" ><?php echo form_error('bank_no'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Bank an</td>
        <td>:</td>
        <td><input type="text" class="span3" name="bank_an" id="bank_an" placeholder="An Bank"></td>
        <td><div style="color:red" ><?php echo form_error('bank_an'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Contact</td>
        <td>:</td>
        <td><input type="text" class="span3" name="cp" id="cp"  placeholder="Contact" maxlength="13"></td>
        <td><div style="color:red" ><?php echo form_error('cp'); ?></div></td>
      </tr>
      <tr>
        <td width="30%">Email</td>
        <td>:</td>
        <td><input type="text" class="span3" name="email" id="email"  placeholder="Email"></td>
        <td><div style="color:red" ><?php echo form_error('email'); ?></div></td>
      </tr>
      
      <tr>
        <td colspan="3">
        <input type="submit" class="btn btn-small btn btn-success" value="Simpan">
        <input type="reset" class="btn btn-small btn btn-success" value="Reset">
        <a href="<?php echo base_url();?>farmasi/apt_supplier" class="btn btn-mini btn-success">Kembali</a>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
      <?php echo form_close(); ?>
</div>
</div>