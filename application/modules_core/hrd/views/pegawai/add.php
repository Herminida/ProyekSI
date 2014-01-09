<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title></title>
    

            <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css" />
            <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap-responsive.min.css" />
     

       

         
            <script src="<?php echo base_url();?>js/jquery-1.8.3.js"></script>
            <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script><!-- tooltips -->
      

            
            <script type="text/javascript">

            $(document).ready(function(){

              function kosong() {
                        
                        $("#nip_pegawai").val("");
                       
                        

                    }

                /*$("#simpan").live('click',function(){

                    var nip_pegawai = $("#nip_pegawai").val();
                    var nama_pegawai = $("#nama_pegawai").val();
                    var tempat_lahir = $("#tempat_lahir").val();
                    var status = $("#status").val();
                    var jenis_kelamin = $("#jenis_kelamin").val();
                    var agama = $("#agama").val();
                    var alamat = $("#alamat").val();
                    var email = $("#email").val();
                    var telepon = $("#telepon").val();
                    var fk_jabatan = $("#fk_jabatan").val();
                    var userfile = $("#userfile").val();
                    var tgl = $("#tgl").val();
                    var bln = $("#bln").val();
                    var thn = $("#thn").val();
                    var tahun = thn+"-"+bln+"-"+tgl;

                    if (nip_pegawai=="") {
                        alert("Nip Tidak Boleh Masih Kosong");
                        $("#nip_pegawai").focus();

                    }
                     else if (nama_pegawai=="") {
                        alert("Nama Pegawai Tidak Boleh Masih Kosong");
                        $("#nama_pegawai").focus();

                    }
                    else if (tempat_lahir=="") {
                        alert("Tempat Lahir Tidak Boleh Masih Kosong");
                        $("#tempat_lahir").focus();

                    }
                    else if (agama=="") {
                        alert("Agama Tidak Boleh Masih Kosong");
                        $("#agama").focus();

                    }
                    else if (alamat=="") {
                        alert("Alamat Tidak Boleh Masih Kosong");
                        $("#alamat").focus();

                    }
                    else if (telepon=="") {
                        alert("Telepon Tidak Boleh Masih Kosong");
                        $("#telepon").focus();

                    }
                    else if (fk_jabatan=="") {
                        alert("Jabatan Tidak Boleh Masih Kosong");
                        $("#fk_jabatan").focus();

                    }
                    else {

                     $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>hrd/pegawai/add",
                            data:"nama_pegawai="+nama_pegawai+"&nip_pegawai="+nip_pegawai+"&fk_jabatan="+fk_jabatan+"&status="+status+"&jenis_kelamin="+jenis_kelamin+"&tempat_lahir="+tempat_lahir+"&tahun="+tahun+"&agama="+agama+"&email="+email+"&telepon="+telepon+"&userfile="+userfile,
                            success : function (data) {


                                
                                alert('Data Pegawai Berhasil Disimpan');
                                 window.parent.location.reload(true);
                                
                                
                            }


                        });
                }

                });*/

            
             $("#nama_pegawai").live('click',function(){

                    
                    var nip_pegawai = $("#nip_pegawai").val();
                   

                        $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>hrd/pegawai/cek",
                            data:"nip_pegawai="+nip_pegawai,
                            success : function (data) {

                                if (data>0) {
                                  alert("NIP Sudah Ada");
                                  $("#nip_pegawai").focus();
                                }
                                else {
                                    $("#nama_pegawai").focus();
                                }
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
                <td ><b>::. TAMBAH DATA MASTER PEGAWAI</b></td>
                
            </tr>
        
        </table>

<!-- <div class="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Lorem ipsum!</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vitae tristique erat.
              </div> -->


        <?php if(validation_errors()) { ?>
  <div class="alert">
    <a class="close" data-dismiss="alert">×</a>
      <h4>Terjadi Kesalahan!</h4>
    <?php echo validation_errors(); ?>
  </div>
  <?php } ?>
  <?php echo form_open_multipart('hrd/pegawai/add','class="form-horizontal"'); ?>

        <table class="table table-striped">
          <tbody>
            
            <tr>
              <td>NIP</td>
              <td>:</td>
              <td>
                        <input type="text" name="nip_pegawai" id="nip_pegawai" placeholder="Nip Pegawai..."> 
                    </td>
                     <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Nama Lengkap Pegawai</td>
              <td>:</td>
              <td>
                        <input type="text" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai..."> 
                    </td>
                     <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Status</td>
              <td>:</td>
              <td>
                      <input type="radio" id="status" name="status" value="Belum Menikah"  checked="true"/> Belum Menikah
                      <input type="radio" id="status" name="status" value="Sudah Menikah"  /> Sudah Menikah
                      <input type="radio" id="status" name="status" value="Janda"  /> Janda
                      <input type="radio" id="status" name="status" value="Duda"  /> Duda
                    </td>
                     <td>&nbsp;</td>
            </tr>
            <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="L"  checked="true"/> Laki-laki
                <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="P"  /> Perempuan
                
            </td>
            <td ></td>  
        </tr>
            <tr>
              <td>Tempat/Tanggal Lahir</td>
              <td>:</td>
              <td>
                        <input id="tempat_lahir"  name="tempat_lahir" placeholder="Tempat Lahir..."> / 
                        <?php
                      echo "<select name='tgl' id=tgl style=width:60px;>";
                        for($i=1; $i<=31; $i++){
                        if($i==date('d')){
                            if(strlen($i)==1){
                            echo "<option selected=selected value=0$i>0$i</option>";
                            }else{
                            echo "<option selected=selected value=$i>$i</option>";
                            }

                        }else {
                            if(strlen($i)==1){
                            echo "<option value=0$i>0$i</option>";
                            }else{
                            echo "<option value=$i>$i</option>";
                            }

                        }
                      }
                        echo "</select>";
                    ?>

                    <?php
                        echo "<select name='bln' id=bln style=width:105px;>";
                        $bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",);
                    for($bln=1;$bln<=12; $bln++){

                        if($bln==date('m')){
                            if(strlen($bln)==1){
                            echo "<option selected=selected value=0$bln>$bulan[$bln]</option>";
                            }else{
                            echo "<option selected=selected value=$bln>$bulan[$bln]</option>";
                            }

                        }else {
                            if(strlen($bln)==1){
                            echo "<option value=0$bln>$bulan[$bln]</option>";
                            }else{
                            echo "<option value=$bln>$bulan[$bln]</option>";
                            }
                              
                        }
                    }

                        echo "</select>";
                    ?>
                      
                    <?php
                        echo "<select name='thn' id=thn style=width:83px;>";
                    for($thn=1900; $thn<=date("Y"); $thn++){

                        if($thn==date('Y')){
                            
                            echo "<option selected=selected value=$thn>$thn</option>";

                        }else {
                            echo "<option value=$thn>$thn</option>";
                        
                        }
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
                                
                        ?>
                            <option value="<?php echo $d['id'];?>"><?php echo $d['nama_agama'];?></option>  
                        <?php        
                                
                            }
                        ?>
                        
                    </select>  
                       
                    </td>
                     <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td>
                         <input type="text" name="alamat" class="span3" id="alamat" placeholder="Alamat...">
                    </td>
                     <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td>
                        <input type="text" name="email"  id="email" placeholder="Email...">
                    </td>
                     <td>&nbsp;</td>
            </tr>
            <tr>
            <td>No Tlp/Hp Pegawai</td>
            <td>:</td>
            <td><input type="text" name="telepon" id="telepon" value=""  placeholder="No Tlp/Hp Pegawai..." size="30" maxlength="13" onkeydown="return ( event.ctrlKey || event.altKey 
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
                                
                        ?>
                            <option value="<?php echo $d['id_jabatan'];?>"><?php echo $d['nama_jabatan'];?></option>  
                        <?php        
                                
                            }
                        ?>
                        
                    </select>
                        
                    </td>
                     <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Foto</td>
              <td>:</td>
              <td>
               <input type="file" name="userfile" id="userfile"/>
                        
                    </td>
                     <td>&nbsp;</td>
            </tr>
            

                 <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> 
                    <button type="submit" class="btn btn-small" id="simpan">Simpan</button>
                    <!-- <INPUT Type="button" class="btn btn-small" VALUE="Kembali" onClick="history.go(-1);return true;"> -->

                </td>
                <td>&nbsp;</td>
                
                </tr>
            
          </tbody>
        </table>
        <?php echo form_close(); ?>
        
    </div>
</div>


 
      
      
     
      
     
      
     
     
  

      
    </div>
  </body>
</html>
