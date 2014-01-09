<html>
<head>
    <title></title>

    <script>
        $(document).ready(function(){
            $("#kecamatan_id").change(function(){
                var kecamatan_id = $("#kecamatan_id").val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url(); ?>loket/sosial_kepala_keluarga/Get_Kelurahan",
                    data : "kecamatan_id=" + kecamatan_id,
                    success: function(data){
                        $("#kelurahan_id").html(data);
                    }
                });
            });
        });
    </script>

</head>

</body>
<div id="real">

    <div id="statusdonor">
      
        <?php echo form_open('loket/sosial_kepala_keluarga/add'); ?>
            <table class="table table-striped">

                <thead>
            <tr>
                <th colspan="6">::. Input Kepala Keluarga</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>No KK</td>
                <td>:</td>
                <td><input type="text" name="no_kk" placeholder="Masukkan No KK" ></td>
                <td style="width:30%; color:red;"><?php echo form_error('no_kk'); ?> </td>
                <td>&nbsp;</td>
                </tr>

                <tr>
                <td>Nama KK</td>
                <td>:</td>
                <td><input type="text" name="nama_kk" placeholder="Masukkan Nama KK" ></td>
                <td style="width:30%; color:red;"><?php echo form_error('nama_kk'); ?> </td>
                <td>&nbsp;</td>
                </tr>

                <tr>
                <td>Alamat KK</td>
                <td>:</td>
                <td><input type="text" name="alamat" placeholder="Masukkan Alamat KK" ></td>
                <td style="width:30%; color:red;"><?php echo form_error('alamat'); ?> </td>
                <td>&nbsp;</td>
                </tr>

                <tr>
                <td>RT/RW</td>
                <td>:</td>
                <td><input type="text" name="rt" placeholder="RT" style="width:25%;">
                    <input type="text" name="rw" placeholder="RW" style="width:25%;">
                </td>
                <td style="width:20%; color:red;"><?php echo form_error('rt'); ?> <?php echo form_error('rw'); ?>  </td>
                
                </tr>

                <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td>
                    <select name="kecamatan_id" id="kecamatan_id" style="width:205px;">
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
                <td style="width:70%; color:red;"><?php echo form_error('kecamatan_id'); ?> </td>
                <td>&nbsp;</td>
                </tr>

                <tr>
                <td>Kelurahan</td>
                <td>:</td>
                <td><select name="kelurahan_id" id="kelurahan_id" style="width: 205px">
                    <option value="">--Pilih Kelurahan--</option>           
                    </select>
                </td>
                <td style="width:70%; color:red;"><?php echo form_error('kelurahan_id'); ?> </td>
                <td>&nbsp;</td>
            </tr>


            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>loket/sosial_kepala_keluarga" class="btn btn-small  ">Batal</a>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
                
                
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                </tbody>
            </table>
            <?php echo form_close(); ?>
        
        </div>
    </div>
</body>
</html>
