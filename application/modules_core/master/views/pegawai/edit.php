<html>
<head>
    <title></title>
</head>

</body>
<div id="real">
    <div id="statusdonor">
      
        <?php echo form_open('master/pegawai/edit'); ?>
            <table class="table table-striped">

                <thead>
            <tr>
                <th colspan="4">::. Edit Data Pegawai</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Nama Pegawai</td>
                <td>:</td>
                <td><input type="text" name="nama_pegawai" placeholder="Masukkan Nama Pegawai" value="<?php echo $nama_pegawai; ?>"></td>
                <td style="width:55%; color:red;"><?php echo form_error('nama_pegawai'); ?> </td>
                </tr>

               

                <tr>
                <td>NIP</td>
                <td>:</td>
                <td><input type="text" name="nip_pegawai" placeholder="Masukkan NIP" value="<?php echo $nip_pegawai; ?>"></td>
                <td style="width:55%; color:red;"><?php echo form_error('nip_pegawai'); ?> </td>
                </tr>

                <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>
                    <select style="width:220px" name="fk_jabatan">
                        <option value="">--Pilih Role--</option>
                        <?php
                        foreach($jabatan_data->result_array() as $d)
                        {
                            if($fk_jabatan==$d['id_jabatan'])
                            {
                        ?>
                            <option value="<?php echo $d['id_jabatan']; ?>" selected="selected"><?php echo $d['nama_jabatan']; ?></option>
                        <?php
                            }
                            else
                            {
                        ?>
                            <option value="<?php echo $d['id_jabatan']; ?>"><?php echo $d['nama_jabatan']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </td>
                <td style="width:55%; color:red;"><?php echo form_error('fk_jabatan'); ?> </td>
                </tr>

                <tr>
                <td>Unit Kerja</td>
                <td>:</td>
                <td>
                    <select style="width:220px" name="fk_unit_kerja">
                        <option value="">--Pilih Unit Kerja--</option>
                        <?php
                        foreach($unit_kerja->result_array() as $d)
                        {
                            if($fk_unit_kerja==$d['id_unit_kerja'])
                            {
                        ?>
                            <option value="<?php echo $d['id_unit_kerja']; ?>" selected="selected"><?php echo $d['nama_unit_kerja']; ?></option>
                        <?php
                            }
                            else
                            {
                        ?>
                            <option value="<?php echo $d['id_unit_kerja']; ?>"><?php echo $d['nama_unit_kerja']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </td>
                <td style="width:55%; color:red;"><?php echo form_error('fk_unit_kerja'); ?> </td>
                </tr>

                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>master/pegawai/index" class="btn btn-small">Batal</a>
                </td>
                <td>&nbsp;</td>
            </tr>
                
                
                <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai; ?>" />
                </tbody>
            </table>
            <?php echo form_close(); ?>
        
        </div>
    </div>
</body>
</html>