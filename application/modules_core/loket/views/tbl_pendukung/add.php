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

                $("#simpan").live('click',function(){

                    var nama_pendukung = $("#nama_pendukung").val();

                    if (nama_pendukung=="") {
                        alert("Data Tidak Boleh Masih Kosong");
                        $("#nama_pendukung").focus();

                    }
                    else {

                    $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/tbl_pendukung/add",
                            data:"nama_pendukung="+nama_pendukung,
                            success : function (data) {

                                
                                window.parent.location.reload(true);
                        
                                
                            }


                        });
                }

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
                <td ><b>::. TAMBAH DATA MASTER PENDUKUNG</b></td>
                
            </tr>
        
        </table>

        <table class="table table-striped">
        	<tbody>
        		
        		<tr>
        			<td>Nama Pendukung</td>
        			<td>:</td>
        			<td>
                        <input type="text" name="nama_pendukung" id="nama_pendukung"> 
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
