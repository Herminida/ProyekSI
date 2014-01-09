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

               

               $("#tgl").val(<?php echo $tgl ?>);
              $("#bln").val('<?php echo $bln?>');
              $("#thn").val(<?php echo $thn ?>);

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
                <td ><b>::. EDIT DATA PEGAWAI RS KALIWATES JEMBER</b></td>
                
            </tr>
        
        </table>
        <?php if(validation_errors()) { ?>
  <div class="alert alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Terjadi Kesalahan!</h4>
    <?php echo validation_errors(); ?>
  </div>
  <?php } ?>
  <?php echo form_open_multipart('hrd/pegawai/edit','class="form-horizontal"'); ?>

        <table class="table table-striped">
        	<tbody>
        		
        		<tr>
        			<td>NIP Pegawai</td>
        			<td>:</td>
        			<td>
                        <input type="text" name="nip_pegawai" id="nip_pegawai" value="<?php echo $nip_pegawai ?>"> 
                    </td>
                     <td>&nbsp;</td>
        		</tr>
            <tr>
              <td>Nama Lengkap Pegawai</td>
              <td>:</td>
              <td>
                        <input type="text" name="nama_pegawai" id="nama_pegawai" value="<?php echo $nama_pegawai ?>"> 
                    </td>
                     <td>&nbsp;</td>
            </tr>
             <tr>
              <td>Status</td>
              <td>:</td>
              <td>
                       <label class="radio inline">
                        <?php
                            if($status=="Belum Menikah"){
                        ?>
                            <input type="radio" name="status" id="status" value="Belum Menikah" checked>
                            Belum Menikah
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="status" id="status" value="Belum Menikah" >
                            Belum Menikah
                        <?php
                            }
                        ?>
                    </label>
                    <label class="radio inline">
                        <?php
                            if($status=="Sudah Menikah"){
                        ?>
                            <input type="radio" name="status" id="status" value="Sudah Menikah" checked>
                            Sudah Menikah
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="status" id="status" value="Sudah Menikah" >
                            Sudah Menikah
                        <?php
                            }
                        ?>
                    </label>
                     <label class="radio inline">
                        <?php
                            if($status=="Janda"){
                        ?>
                            <input type="radio" name="status" id="status" value="Janda" checked>
                            Janda
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="status" id="status" value="Janda" >
                            Janda
                        <?php
                            }
                        ?>
                    </label>
                    <label class="radio inline">
                        <?php
                            if($status=="Duda"){
                        ?>
                            <input type="radio" name="status" id="status" value="Duda" checked>
                            Duda
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="status" id="status" value="Duda" >
                            Duda
                        <?php
                            }
                        ?>
                    </label>
                    </td>
                     <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>:</td>
              <td>
                       <label class="radio inline">
                        <?php
                            if($jenis_kelamin=="L"){
                        ?>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" checked>
                            Laki-laki
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" >
                            Laki-laki
                        <?php
                            }
                        ?>
                    </label>
                    <label class="radio inline">
                        <?php
                            if($jenis_kelamin=="P"){
                        ?>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" checked>
                            Perempuan
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" >
                            Perempuan
                        <?php
                            }
                        ?>
                    </label>
                    
                   
                    </td>
                     <td>&nbsp;</td>
            </tr>
             <tr>
              <td>Tempat/Tanggal Lahir</td>
              <td>:</td>
              <td>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $tempat_lahir ?>">
                        <?php
                            echo "<select name='tgl' id=tgl style=width:60px;>";
                            for($i=1; $i<=31; $i++){
                            if(strlen($i)==1){
                            echo "<option value=$i>$i</option>";
                            }else{
                            echo "<option value=$i>$i</option>";
                            }
                            }
                            echo "</select>";
                        ?>

                        <?php
                            echo "<select name='bln' id=bln style=width:105px;>";
                            $bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",);
                            for($bln=1;$bln<=12; $bln++){
                            if(strlen($bln)==1){
                            echo "<option value=$bln>$bulan[$bln]</option>";
                            }
                            else{
                            echo "<option value=$bln>$bulan[$bln]</option>";
                            }
                            }
                            echo "</select>";
                        ?>
                      
                        <?php
                            echo "<select name='thn' id=thn style=width:83px;>";
                            for($thn=1900; $thn<=date("Y"); $thn++){
                            echo "<option value=$thn>$thn</option>";
                            }
                            echo "</select>"
                        ?>
           
                    </td>
                     <td>&nbsp;</td>
            </tr>
           <tr>
              <td>Agama</td>
              <td>:</td>
              <td>
                       <select name="agama_id" id="agama" >
                        <option value="">--Pilih Agama--</option>
                        <?php 
                            foreach ($data_agama->result_array() as $d) {
                                if ($agama_id == $d['id']) {
                        ?>  
                            <option value="<?php echo $d['id']; ?>" selected="selected"><?php echo $d['nama_agama']; ?></option>
                        <?php 
                                }
                                else {
                        ?>
                            <option value="<?php echo $d['id'];?>"><?php echo $d['nama_agama'];?></option>  
                        <?php        
                                }
                            }
                        ?>
                        
                    </select>  
                    </td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td>
                        <input type="text" name="alamat" id="alamat" class="span3" value="<?php echo $alamat ?>"> 
                    </td>
                     <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td>
                        <input type="text" name="email"  id="email" value="<?php echo $email ?>">
                    </td>
                     <td>&nbsp;</td>
            </tr>
            <tr>
            <td>No Tlp/Hp Pegawai</td>
            <td>:</td>
            <td><input type="text" name="telepon" id="telepon" value="<?php echo $telepon ?>"  placeholder="No Tlp/Hp Pegawai..." size="30" maxlength="13" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" ></td>
            <td ></td>  
        </tr>
        <tr>
              <td>Jabatan</td>
              <td>:</td>
              <td>
                       <select name="fk_jabatan" id="fk_jabatan" >
                        <option value="">--Pilih Jabatan--</option>
                        <?php 
                            foreach ($data_jabatan->result_array() as $d) {
                                if ($fk_jabatan == $d['id_jabatan']) {
                        ?>  
                            <option value="<?php echo $d['id_jabatan']; ?>" selected="selected"><?php echo $d['nama_jabatan']; ?></option>
                        <?php 
                                }
                                else {
                        ?>
                            <option value="<?php echo $d['id_jabatan'];?>"><?php echo $d['nama_jabatan'];?></option>  
                        <?php        
                                }
                            }
                        ?>
                        
                    </select>  
                    </td>
            </tr>
            <tr>
              <td>Foto</td>
              <td>:</td>
              <td>
               <input type="file" name="userfile" id="userfile"/>
                        
                    </td>
                     <td>&nbsp;</td>
            </tr>

            <input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $id_pegawai ?>" >
        		

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
