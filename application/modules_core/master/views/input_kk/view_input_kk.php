<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Kecamatan</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/layout1.css" type="text/css" />
<script src="<?php echo base_url() ?>css/js/jquery-1.9.0.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $("#id_kecamatan").change(function(){
            var id_kecamatan = $("#id_kecamatan").val();
            $.ajax({
               type : "POST",
               url  : "<?php echo base_url(); ?>loket/input_kk/getKelurahan",
               data : "id_kecamatan=" + id_kecamatan,
               success: function(data){
                   $("#id_kelurahan").html(data);
               }
            });
        });
    });
</script>
</head>
<body>
<div id="container">
        <?php echo form_open('input_kk/addinsert');?>
        <table>
            <tr>
                <th colspan="3">Input Kepala Keluarga</th>
            </tr>
            <tr>
                <td>No KK</td>
                <td>:</td>
                <td> <?php echo form_input(array('name'=>'no_kk','id'=>'no_kk','value'=>''));?></td>
            </tr>
            <tr>
                <td>Nama KK</td>
                <td>:</td>
                <td> <?php echo form_input(array('name'=>'nama_kk','id'=>'nama_kk','value'=>''));?></td>
            </tr>
            <tr>
                <td>Alamat KK</td>
                <td>:</td>
                <td> <?php echo form_input(array('name'=>'alamat','id'=>'alamat','value'=>''));?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>RT : <?php echo form_input(array('name'=>'rt','id'=>'rt','value'=>'','size'=>2));?> 
                    RW :  <?php echo form_input(array('name'=>'rw','id'=>'rw','value'=>'','size'=>2));?>
                </td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td><select name="id_kecamatan" id="id_kecamatan" style="width: 200px">
                    <option value="">--Pilih Kecamatan--</option>
                    <?php
                            foreach ($kecamatan as $k){
                            echo "<option value='$k[id_kecamatan]'>$k[nama_kecamatan]</option>";	
                            }			
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kelurahan</td>
                <td>:</td>
                <td><select name="id_kelurahan" id="id_kelurahan" style="width: 200px">
                    <option value="">--Pilih Kelurahan--</option>        	
                    </select>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan'));?>
                     <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Batal'));?>
                </td>
            </tr>
        </table>
        <?php echo form_close();?>
</div>
</body>
</html>