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
            function cekEdit(){

              if($('#id_gaji').val()!=''){
                $('#nilai_gaji').val($('#jml').val());
                $('#nama_gaji').val($('#gaji').val());
                $('#nama_jabatan').val($('#jabatan').val());
              }
            }

            function isiGaji(){
              var isi;
             $.ajax({
                url:'<?php echo base_url();?>hrd/gaji_jabatan/getListGaji',
                type:'post',
                async:false,
                dataType:'json'
              }).done(function(data) {
                   for (var key in data)
                  {
                     isi='<option value="'+data[key].id_gaji+'">'+data[key].nama_gaji+'</option>';
                     $('#nama_gaji').append(isi);
                   
                  }
              });
            }

            function isiJabatan(){
              var isi;
             $.ajax({
                url:'<?php echo base_url();?>hrd/gaji_jabatan/getListJabatan',
                type:'post',
                async:false,
                dataType:'json'
              }).done(function(data) {
                   for (var key in data)
                  {
                     isi='<option value="'+data[key].id_jabatan+'">'+data[key].nama_jabatan+'</option>';
                     $('#nama_jabatan').append(isi);
                   
                  }
              });
            }

            $(document).ready(function(){

                $("#simpan").live('click',function(){

                    var nilai_gaji = $("#nilai_gaji").val();

                    if (nilai_gaji=="") {
                        alert("Data Tidak Boleh Masih Kosong");
                        $("#nilai_gaji").focus();

                    }
                    else {

                      var data={
                                  id_gaji_jabatan:$('#id_gaji').val(),
                                  id_gaji:$('#nama_gaji').val(),
                                  id_jabatan:$('#nama_jabatan').val(),
                                  nilai_gaji:$('#nilai_gaji').val()


                               }
                    $.ajax({
                            type:"post",
                            url :"<?php echo base_url();?>hrd/gaji_jabatan/add",
                            data:data,
                            success : function (data) {

                                
                                window.parent.location.reload(true);
                        
                                
                            }


                        });
                }

                });

              
                isiGaji();
                isiJabatan();
                cekEdit();
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
                <td ><b>::. TAMBAH DATA MASTER GAJI BERDASAR JABATAN</b></td>
                
            </tr>
        
        </table>
        <input type="hidden" id="id_gaji" name="id_gaji" value="<?php
         if(!empty($id_gaji))
        {
          echo $id_gaji;
        }else
        {
          echo '';
        }
        ;
        ?>">
        <input type="hidden" id="jabatan" name="jabatan" value="<?php
         if(!empty($nama_jabatan))
        {
          echo $nama_jabatan;
        }else
        {
          echo '';
        }
        ;
        ?>">
        <input type="hidden" id="gaji" name="gaji" value="<?php
         if(!empty($nama_gaji))
        {
          echo $nama_gaji;
        }else
        {
          echo '';
        }
        ;
        ?>">
        <input type="hidden" id="jml" name="jml" value="<?php
         if(!empty($nilai_gaji))
        {
          echo $nilai_gaji;
        }else
        {
          echo '';
        }
        ;
        ?>">
        <table class="table table-striped">
        	<tbody>
        		
        		<tr>
        			<td>Nama Gaji</td>
        			<td>:</td>
        			<td>
                        <select name="nama_gaji" id="nama_gaji"> 
                        </select>
                    </td>
                     <td>&nbsp;</td>
        		</tr>
              <tr>
              <td>Nama Jabatan</td>
              <td>:</td>
              <td>
                        <select name="nama_jabatan" id="nama_jabatan"> 
                        </select>
                    </td>
                     <td>&nbsp;</td>
            </tr>
            </tr>
              <tr>
              <td>Nilai Gaji</td>
              <td>:</td>
              <td>
                        <input type="text" name="nilai_gaji" id="nilai_gaji"> 
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
        
        
    </div>
</div>



      
    </div>
  </body>
</html>
