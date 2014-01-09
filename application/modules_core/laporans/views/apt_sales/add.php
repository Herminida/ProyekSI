<div id="real">
    <div id="statusdonor">
        <div><b>::. DATA SALES OBAT </b> 
        </div>
        <table class="table table-striped">
            <thead>
                <th colspan="4">Tambah data sales obat</th>
            </thead>
            <tbody><?php
                echo form_open('farmasi/apt_sales/add');?>
                <tr>
                    <td>Supplier</td>
                    <td>:</td>
                    <td>
                        <select name="supplier_id" style="width:255px; height:25px; font-size:12px;">
                              
                                <option value="">--Silahkan Pilih--</option>
                                <?php
                                    foreach ($data_supplier->result_array() as $hasil ) {
                                        echo "<option value='$hasil[id_supplier]'>$hasil[nama_supplier]</option>";
                                    }
                                ?>
                            </select>
                    </td>
                    <td width="40%"><div style="color:red" ><?php echo form_error('supplier_id'); ?></div></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" class="span3" name="nama_sales" id="inputnama" placeholder="Nama..."></td>
                    <td width="40%"><div style="color:red" ><?php echo form_error('nama_sales'); ?></div></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td>:</td>
                    <td><input type="text" class="span3" name="nama_kota" id="inputnama" placeholder="Kota..."></td>
                    <td width="40%"><div style="color:red" ><?php echo form_error('nama_kota'); ?></div></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input type="text" class="span3" name="alamat_sales" id="inputnama" placeholder="Alamat..."></td>
                    <td width="40%"><div style="color:red" ><?php echo form_error('alamat_sales'); ?></div></td>
                </tr>
                
                <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td><input type="text" class="span3" name="telepon_sales" id="inputnama" maxlength="13" placeholder="Telepon..."></td>
                    <td width="40%"><div style="color:red" ><?php echo form_error('telepon_sales'); ?></div></td>
                </tr>
                <tr>
                    <td>Opsi komisi</td>
                    <td>:</td>
                    <td><select name="opsi_komisi" style="width:255px; height:25px; font-size:12px;">
                              
                                <option value="">--Silahkan Pilih--</option>
                                <option value="Per Faktur">Per Faktur</option>
                                <option value="Per Item">Per Item</option>
                            </select>
                        </td>
                        <td width="40%"><div style="color:red" ><?php echo form_error('opsi_komisi'); ?></div></td>
                </tr>
                <tr>
                    <td>Opsi nominal</td>
                    <td>:</td>
                    <td><select name="opsi_nominal" style="width:255px; height:25px; font-size:12px;">
                              
                                <option value="">--Silahkan Pilih--</option>
                                <option value="Persen">Persen</option>
                                <option value="Nominal">Nominal</option>
                            </select>
                        </td>
                        <td width="40%"><div style="color:red" ><?php echo form_error('opsi_nominal'); ?></div></td>
                </tr>
                 <tr>
                    <td>Jumlah</td>
                    <td>:</td>
                    <td><input type="text" class="span3" name="jumlah" id="inputnama" placeholder="Jumlah..."></td>
                    <td width="40%"><div style="color:red" ><?php echo form_error('jumlah'); ?></div></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <input type="reset" class="btn btn-success" value="Reset">
                        <a href="<?php echo base_url();?>farmasi/apt_sales" class="btn btn-mini  btn-success"><div style="font-size:12px">Batal</div></a>
                    </td>
                </tr>
                <?php
                echo form_close();
                ?>
            </tbody>
        </table>

</div>
</div>