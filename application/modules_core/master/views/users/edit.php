<html>
<head>
    <title></title>

       <script>
                $(document).ready(function(){

                   $("#users_groups_id").change(function(){
                        var users_groups_id = $("#users_groups_id").val();
                            $.ajax({
                            type : "POST",
                            url  : "<?php echo base_url(); ?>master/users/Get_Operators",
                            data : "users_groups_id=" + users_groups_id,
                            success: function(data){
                            $("#users_operators_id").html(data);
                            }
                        });
                    });

                });
    </script>
</head>

</body>
<div id="real">
    <div id="statusdonor">
      
        <?php echo form_open('master/users/edit'); ?>
            <table class="table table-striped">

                <thead>
            <tr>
                <th colspan="4">::. Edit Data User</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" placeholder="Masukkan Nama" value="<?php echo $nama; ?>" readonly="readonly"></td>
                <td> &nbsp;</td>
                </tr>

               

                <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" placeholder="Masukkan Username" value="<?php echo $username; ?>" readonly="readonly"></td>
                <td> &nbsp;</td>
                </tr>

                <tr>
                <td>Password</td>
                <td>:</td>
                <td style="width:75%"><input type="password" name="password">*Kosongkan saja jika tidak diganti</td>
                <td style="width:55%; color:red;"><?php echo form_error('password'); ?> </td>
                </tr>

                <tr>
                <td>Group</td>
                <td>:</td>
                <td>
                    <select style="width:220px" name="users_groups_id" id="users_groups_id">
                        <option value="">--Pilih Group--</option>
                        <?php
                        foreach($users_groups_data->result_array() as $d)
                        {
                            if($users_groups_id==$d['id'])
                            {
                        ?>
                            <option value="<?php echo $d['id']; ?>" selected="selected"><?php echo $d['nama_users_groups']; ?></option>
                        <?php
                            }
                            else
                            {
                        ?>
                            <option value="<?php echo $d['id']; ?>"><?php echo $d['nama_users_groups']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </td>
                <td style="width:55%; color:red;"><?php echo form_error('users_groups_id'); ?> </td>
                </tr>

                <tr>
                <td>Operator</td>
                <td>:</td>
                <td>
                    <select style="width:220px" name="users_operators_id" id="users_operators_id">
                        <option value="">--Pilih Operator--</option>
                        <?php
                        foreach($users_operators_data->result_array() as $d)
                        {
                            if($users_operators_id==$d['idoperators'])
                            {
                        ?>
                            <option value="<?php echo $d['idoperators']; ?>" selected="selected"><?php echo $d['nama_users_operators']; ?></option>
                        <?php
                            }
                            else
                            {
                        ?>
                            <option value="<?php echo $d['idoperators']; ?>"><?php echo $d['nama_users_operators']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </td>
                <td style="width:55%; color:red;"><?php echo form_error('users_operators_id'); ?> </td>
                </tr>

                
                
                <tr>
                <td>Telp</td>
                <td>:</td>
                <td><input type="text" name="telp" placeholder="Masukkan Telp" value="<?php echo $telp; ?>"></td>
                <td style="width:55%; color:red;"><?php echo form_error('telp'); ?> </td>
                </tr>

                <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="email" placeholder="Masukkan Email" value="<?php echo $email; ?>"></td>
                <td style="width:55%; color:red;"><?php echo form_error('email'); ?> </td>
                </tr>


                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>master/users/index" class="btn btn-small">Batal</a>
                </td>
                <td>&nbsp;</td>
            </tr>
                
                
                <input type="hidden" name="pegawai_id" value="<?php echo $pegawai_id; ?>" />
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                </tbody>
            </table>
            <?php echo form_close(); ?>
        
        </div>
    </div>
</body>
</html>