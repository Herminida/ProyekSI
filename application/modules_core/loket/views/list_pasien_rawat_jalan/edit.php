<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title></title>
    

            <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css" />
            <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap-responsive.min.css" />
     

       

         
            <script src="<?php echo base_url();?>js/jquery-1.8.3.js"></script>

            
            <script type="text/javascript">

            $(document).ready(function(){

               $("#update").live("click",function(){

                     var klinik = $("#klinik").val();
                     var id_pasien_rawat_jalan = $("#id_pasien_rawat_jalan").val();
                     var nama_penanggung_jawab = $("#nama_penanggung_jawab").val();
                     var no_penanggung_jawab = $("#no_penanggung_jawab").val();
                     var hubungan_dengan_pasien = $('input:radio[name="hubungan_dengan_pasien"]:checked').val();

                     $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/list_pasien_rawat_jalan/update",
                            data:"klinik="+klinik+"&id_pasien_rawat_jalan="+id_pasien_rawat_jalan+"&nama_penanggung_jawab="+nama_penanggung_jawab+"&no_penanggung_jawab="+no_penanggung_jawab+"&hubungan_dengan_pasien="+hubungan_dengan_pasien,
                            success : function (data) {

                                alert('Data Berhasil DiUpdate');
                                window.parent.location.reload(true);
                                
                            }


                        });


                });


            });


            </script>
    
       

        <style type="text/css">
#loading {
  position:fixed;
  top:0;
  left:0;
  z-index:9999;
  text-align:center;
  width:100%;
  height:100%;
  padding-top:150px;
  font:bold 50px Calibri,Arial,Sans-Serif;
  color:#000;
  display:none;
  background-color: transparent;
}
</style>
 
<script type="text/javascript">
$(document).ajaxStart(function() {
$( "#loading").show();
});

$(document).ajaxStop(function() {
$( "#loading").hide();
});


</script>



   </head>
    <body>
    <div id="loading" ><img src="<?php echo base_url();?>img/loadingbar.gif" alt="" /></div>

<div id="real">
  <div id="statusdonor">
   
    <table class="table table-striped">
       
            <tr>
                <td width="90%"><b>::. EDIT DATA PASIEN RAWAT JALAN</b></td>
                
            </tr>
        
        </table>

        <table class="table table-striped">
        	<tbody>
        		
        		<tr>
        			<td>Tanggal Registrasi</td>
        			<td>:</td>
        			<td><?php echo $tgl_registrasi ?></td>
        		</tr>
        		<tr>
        			<td>No RM</td>
        			<td>:</td>
        			<td><?php echo $no_rm ?></td>
        		</tr>
        		<tr>
        			<td>Nama Pasien</td>
        			<td>:</td>
        			<td><?php echo $nama_lengkap ?></td>
        		</tr>
        		<tr>
        			<td>Umur</td>
        			<td>:</td>
        			<td><?php echo $umur ?></td>
        		</tr>
        		<tr>
        			<td>Jenis Kelamin</td>
        			<td>:</td>
        			<td><?php echo $jenis_kelamin ?></td>
        		</tr>
        		<tr>
        			<td>Alamat</td>
        			<td>:</td>
        			<td><?php echo $alamat ?></td>
        		</tr>
        		<tr>
        			<td>No Hp</td>
        			<td>:</td>
        			<td><?php echo $no_hp ?></td>
        		</tr>
        		<tr>
        			<td>Nama Penanggung Jawab</td>
        			<td>:</td>
        			<td>
                        <input type="text" name="nama_penannggung_jawab" id="nama_penanggung_jawab" value="<?php echo $nama_penanggung_jawab ?>">
                        </td>
        		</tr>
        		<tr>
        			<td>No Penanggung Jawab</td>
        			<td>:</td>
        			<td>
                        <input type="text" name="nama_penannggung_jawab" id="no_penanggung_jawab" value=" <?php echo $no_penanggung_jawab ?>">
                    </td>
        		</tr>
        		<tr>
        			<td>Hubungan Dengan Pasien</td>
        			<td>:</td>
        			<td>
                        <label class="radio inline">
                        <?php
                            if($hubungan_dengan_pasien=="Orang Tua Pasien"){
                        ?>
                            <input type="radio" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien" value="Orang Tua Pasien" checked>
                            Orang Tua Pasien
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien" value="Orang Tua Pasien" >
                            Orang Tua Pasien
                        <?php
                            }
                        ?>
                    </label>
                    <label class="radio inline">
                        <?php
                            if($hubungan_dengan_pasien=="Anak Pasien"){
                        ?>
                            <input type="radio" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien" value="Anak Pasien" checked>
                            Anak Pasien
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien" value="Anak Pasien" >
                            Anak Pasien
                        <?php
                            }
                        ?>
                    </label>
                    <label class="radio inline">
                        <?php
                            if($hubungan_dengan_pasien=="Teman"){
                        ?>
                            <input type="radio" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien" value="Teman" checked>
                            Teman
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien" value="Teman" >
                            Teman
                        <?php
                            }
                        ?>
                    </label></br>
                    <label class="radio inline">
                        <?php
                            if($hubungan_dengan_pasien=="Suami/Istri"){
                        ?>
                            <input type="radio" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien" value="Suami/Istri" checked>
                            Suami/Istri
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien" value="Suami/Istri" >
                            Suami/Istri
                        <?php
                            }
                        ?>
                    </label>
                    <label class="radio inline">
                        <?php
                            if($hubungan_dengan_pasien=="Keluarga Pasien"){
                        ?>
                            <input type="radio" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien" value="Keluarga Pasien" checked>
                            Keluarga Pasien
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien" value="Keluarga Pasien" >
                            Keluarga Pasien
                        <?php
                            }
                        ?>
                    </label>
                    <label class="radio inline">
                        <?php
                            if($hubungan_dengan_pasien=="Lain-lain"){
                        ?>
                            <input type="radio" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien" value="Lain-lain" checked>
                            Lain-lain
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="hubungan_dengan_pasien" id="hubungan_dengan_pasien" value="Lain-lain" >
                            Lain-lain
                        <?php
                            }
                        ?>
                    </label>
                </td>
        		</tr>
        		<tr>
        			<td>Unit Layanan</td>
        			<td>:</td>
        			<td>
                       <select name="klinik" id="klinik" >
                        <option value="">--Pilih Unit Layanan--</option>
                        <?php 
                            foreach ($data_klinik->result_array() as $d) {
                                if ($klinik_id == $d['id']) {
                        ?>  
                            <option value="<?php echo $d['id']; ?>" selected="selected"><?php echo $d['nama_klinik']; ?></option>
                        <?php 
                                }
                                else {
                        ?>
                            <option value="<?php echo $d['id'];?>"><?php echo $d['nama_klinik'];?></option>  
                        <?php        
                                }
                            }
                        ?>
                        
                    </select>  
                    </td>
        		</tr>

                <input type="hidden" name="id_pasien_rawat_jalan" id="id_pasien_rawat_jalan" value="<?php echo $id_pasien_rawat_jalan?>">

                 <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> 
                    <button type="submit" class="btn btn-small" id="update">Update</button>
                    <!-- <INPUT Type="button" class="btn btn-small" VALUE="Kembali" onClick="history.go(-1);return true;"> -->

                </td>
                <td>&nbsp;</td>
                
                </tr>
        		
        	</tbody>
        </table>
        
        
    </div>
</div>



      
    </div>
  </body>
</html>
