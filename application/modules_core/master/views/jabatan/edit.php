<html>
<head>
    <title></title>
</head>

</body>
<div id="real">
    <div id="statusdonor">
      
        <?php echo form_open('master/jabatan/edit'); ?>
            <table class="table table-striped">

                <thead>
            <tr>
                <th colspan="4">::. Edit Data Jabatan</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><input type="text" name="nama_jabatan" placeholder="Masukkan Jabatan" value="<?php echo $nama_jabatan; ?>"></td>
                <td style="width:55%; color:red;"><?php echo form_error('nama_jabatan'); ?> </td>
                </tr>

               

                

                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>master/jabatan/index" class="btn btn-small">Batal</a>
                </td>
                <td>&nbsp;</td>
            </tr>
                
                
                <input type="hidden" name="id_jabatan" value="<?php echo $id_jabatan; ?>" />
                </tbody>
            </table>
            <?php echo form_close(); ?>
        
        </div>
    </div>
</body>
</html>