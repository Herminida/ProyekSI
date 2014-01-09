<div id="real">
    <div id="statusdonor">
        <?php echo form_open('loket/sosial_kelurahan/edit'); ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="4">::. Edit Kelurahan</th>
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
                            foreach ($kecamatan->result_array() as $d) {
                                if ($id_kecamatan == $d['id_kecamatan']) {
                        ?>  
                            <option value="<?php echo $d['id_kecamatan']; ?>" selected="selected"><?php echo $d['nama_kecamatan']; ?></option>
                        <?php 
                                }
                                else {
                        ?>
                            <option value="<?php echo $d['id_kecamatan'];?>"><?php echo $d['nama_kecamatan'];?></option>  
                        <?php        
                                }
                            }
                        ?>
                        
                    </select>  
                </td>
                <td style="width:70%; color:red;"><?php echo form_error('id_kecamatan'); ?> </td>
                
                </tr>

                <tr><?php echo form_input(array('name'=>'id_kelurahan','value'=>$id_kelurahan,'type'=>'hidden'));?>
                <td>Kelurahan</td>
                <td>:</td>
                <td><input type="text" name="nama_kelurahan" value="<?php echo $nama_kelurahan ?>" placeholder="Masukkan Kelurahan" ></td>
                <td style="width:70%; color:red;"><?php echo form_error('nama_kelurahan'); ?> </td>
               
                </tr>
                
                
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                     <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                     <a href="<?php echo base_url();?>loket/sosial_kelurahan" class="btn btn-small  ">Batal</a>
                
                </td>
                <td>&nbsp;</td>
            </tr>
                </tbody>
            </table>
            
        <?php echo form_close(); ?>
        </div>
    </div>
