<html>
<head>
    <title></title>

</head>

</body>
<div id="real">
    <div id="statusdonor">
      
        <?php echo form_open('master/sosial_kelurahan/add'); ?>
            <table class="table table-striped">

                <thead>
            <tr>
                <th colspan="4">::. Input Kelurahan</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td>

                    <select name="id_kecamatan" style="width:205px;">
                        <option value="">--Pilih Kecamatan--</option>
                        <?php
                            foreach($kecamatan->result_array() as $d)
                            {
                                
                        ?>
                                <option value="<?php echo $d['id_kecamatan']; ?>"><?php echo $d['nama_kecamatan']; ?></option>
                        <?php
            
                        }
                        ?>

                    </select>
                   
                </td>
                <td style="width:70%; color:red;"><?php echo form_error('id_kecamatan'); ?> </td>
                
                </tr>


                <tr>
                <td>Kelurahan</td>
                <td>:</td>
                <td><input type="text" name="nama_kelurahan" placeholder="Masukkan Kelurahan" ></td>
                <td style="width:70%; color:red;"><?php echo form_error('nama_kelurahan'); ?> </td>
               
                </tr>

                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>

                <td colspan="2"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>master/sosial_kelurahan/index" class="btn btn-small  ">Batal</a>
                </td>
                <td>&nbsp;</td>
            </tr>
                
                
                <input type="hidden" name="id_kelurahan" value="<?php echo $id_kelurahan; ?>" />
                </tbody>
            </table>
            <?php echo form_close(); ?>
        
        </div>
    </div>
</body>
</html>