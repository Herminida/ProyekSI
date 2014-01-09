<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title></title>

        <script>
                $(document).ready(function(){
                    
                    $("#nama_pegawai").keyup(function(){
                        
                        var nama_pegawai = $("#nama_pegawai").val();

                        $.ajax({
                            type:"POST",
                            url :"<?php base_url();?>getall",
                            data: "nip_pegawai="+nip_pegawai+"&nama_pegawai="+nama_pegawai,
                            success : function (data) {
                                $("#tampilkandata").html(data);
                            }
                            
                        });
                    }); //end of nama
                    
                    $("#nip_pegawai").keyup(function(){
                        var nip_pegawai = $("#nip_pegawai").val();

                        $.ajax({
                            type:"POST",
                            url :"<?php base_url();?>getall",
                            data:"nip_pegawai="+nip_pegawai+"&nama_pegawai="+nama_pegawai,
                            success : function (data) {
                                $("#tampilkandata").html(data);
                            }
                            
                        });
                    });//end of nik
                    
                   $(".daftar").live("click",function(){
                 
                   var id_pegawai=$(this).attr("id_pegawai");
                   var nama_pegawai=$(this).attr("nama_pegawai");
                   var nip_pegawai=$(this).attr("nip_pegawai");
                   var fk_unit_kerja=$(this).attr("nama_unit_kerja");
                   
                   $("#id_pegawai2").val(id_pegawai);
                   $("#nama_pegawai2").val(nama_pegawai);
                   $("#nip_pegawai2").val(nip_pegawai);
                   $("#fk_unit_kerja2").val(fk_unit_kerja);
                   
                   });//end off daftar admission

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
        
<body>


<div id="real">
    <div id="statusdonor">
        
        <table class="table">
            <thead>
                <tr>
                    <th colspan="4"><b>::. Input Data Users</b></th>
                </tr>
            </thead>
          <tr>
                <td>Cari Data Pegawai Terlebih Dahulu</td>
                <td  style="width:20%"><input type="text" name="nip_pegawai" class="input" id="nip_pegawai" size="10" placeholder="Masukkan NIP..."> </td>
                <td>Atau</td>
                <td><input type="text" name="nama_pegawai" class="input" id="nama_pegawai" size="20" placeholder="Masukkan Nama..."></td>
            </tr>

        </table>
        <table class="table table-striped" id="tampilkandata">
                
            </table>
    </div>
</div>

<div id="real">
  <div id="statusdonor">

    <?php echo form_open('master/users/add','class="form-horizontal"'); ?>
    <table class="table table-striped">
      <thead></thead>
      <tbody>
        
        <input type="hidden" name="pegawai_id" id="id_pegawai2">
        <tr>
            <td>Nama Pegawai</td>
            <td>:</td>
            <td><input type="text" name="nama" id="nama_pegawai2" class="span3" size="30" readonly="readonly"></td>
            <td style="width:40%; color:red;"><?php echo $this->session->flashdata('nama_pegawai'); ?></td> 
        </tr>

         <tr>
            <td>Unit Kerja</td>
            <td>:</td>
            <td><input type="text" name="fk_unit_kerja" id="fk_unit_kerja2" class="span3" size="30" readonly="readonly"></td>
            <td style="width:40%; color:red;"><?php echo $this->session->flashdata('fk_unit_kerja'); ?></td> 
        </tr>

        <tr>
            <td>NIP/Username</td>
            <td>:</td>
            <td><input type="text" name="username" id="nip_pegawai2" class="span3" size="30" readonly="readonly"></td>
            <td style="width:40%; color:red;"><?php echo $this->session->flashdata('nip_pegawai'); ?></td> 
        </tr>

        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" name="password" placeholder="Masukkan Password" ></td>
            <td style="width:40%; color:red;"><?php echo form_error('password'); ?> </td>
                
        </tr>

        <tr>
            <td>Confirm Password</td>
            <td>:</td>
            <td><input type="password" name="confirm_password" placeholder="Masukkan Confirm Password"></td>
            <td style="width:40%; color:red;"><?php echo form_error('confirm_password'); ?> </td>
                
               
        </tr>

        <tr>
            <td>Group</td>
            <td>:</td>
            <td>
                <select name="users_groups_id" id="users_groups_id" >
                    <option value="">-Pilih Group-</option>
                    <?php 
                        foreach ($users_groups_data->result_array() as $tampil) {
                    ?>
                        <option value="<?php echo $tampil['id']?>"><?php echo $tampil['nama_users_groups']; ?></option>
                    <?php        
                        }
                    ?>
                    
                    </select> 
                </td>
                <td style="width:40%; color:red;"><?php echo form_error('users_groups_id'); ?> </td>
        </tr>

        <tr>
            <td>Operator</td>
            <td>:</td>
            <td>
                <select name="users_operators_id" id="users_operators_id" >
                    <option value="">-Pilih Operator-</option>
                    </select> 
                </td>
                <td style="width:40%; color:red;"><?php echo form_error('users_operators_id'); ?> </td>
        </tr>

        <tr>
            <td>Telp</td>
            <td>:</td>
            <td><input type="text" name="telp" placeholder="Masukkan Telp" maxlength="13"></td>
            <td style="width:40%; color:red;"><?php echo form_error('telp'); ?> </td>
                
               
        </tr>

        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" name="email" placeholder="Masukkan Email"></td>
            <td style="width:40%; color:red;"><?php echo form_error('email'); ?> </td>
                
               
         </tr>

       

        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    </td>
            <td>&nbsp;</td>
                
        </tr>

             
            
            

      </tbody>

    </table>
    <?php echo form_close(); ?>

  </div>
</div>



</body>   
</html>
    