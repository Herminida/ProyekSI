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
                        var id_jam_kerja = $("#id_jam_kerja").val();
                        var nama_shift = $("#nama_shift").val();
                        var jam_masuk = $("#jam_masuk").val();
                        var jam_keluar = $("#jam_keluar").val();
                        var jam_keluar_istirahat = $("#jam_keluar_istirahat").val();
                        var jam_masuk_istirahat = $("#jam_masuk_istirahat").val();
                        if (nama_shift=="") {
                            alert("Shift Tidak Boleh Masih Kosong");
                            $("#nama_shift").focus();
                        }
                        if (jam_masuk=="") {
                            alert("Jam Masuk Tidak Boleh Masih Kosong");
                            $("#jam_masuk").focus();
                        }
                        if (jam_keluar=="") {
                            alert("Jam Keluar Tidak Boleh Masih Kosong");
                            $("#jam_keluar").focus();
                        }
                        if (jam_keluar_istirahat=="") {
                            alert("Jam Keluar Istirahat Tidak Boleh Masih Kosong");
                            $("#jam_keluar_istirahat").focus();
                        }
                        if (jam_masuk_istirahat=="") {
                            alert("Jam Masuk Tidak Boleh Masih Kosong");
                            $("#jam_masuk_istirahat").focus();
                        }
                        else {
                        $.ajax({
                                type:"POST",
                                url :"<?php echo base_url();?>hrd/jam_kerja/edit",
                                data:"nama_shift="+nama_shift+"&jam_masuk="+jam_masuk+"&jam_keluar="+jam_keluar+"&jam_keluar_istirahat="+jam_keluar_istirahat+"&jam_masuk_istirahat="+jam_masuk_istirahat+"&id_jam_kerja="+id_jam_kerja,
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
                <td ><b>::. TAMBAH DATA JAM KERJA</b></td>
            </tr>
    </table>
    <?php
        foreach ($data_jam_kerja->result_array() as $tampil) {
    ?>
    <input type="hidden" id="id_jam_kerja" value="<?php echo $tampil['id_jam_kerja']; ?>" >
    <table class="table table-striped">
     	<tbody>
     		<tr>
        			<td>Shift</td>
        			<td>:</td>
        			<td>
                        <select name="nama_shift" id="nama_shift" >
                            <?php
                            foreach ($shift->result_array() as $tampil2) {
                            if($tampil['shift_id']==$tampil2['id_shift']){
                            ?>
                            <option value="<?php echo $tampil2['id_shift'];?>" selected="selected"><?php echo $tampil2['nama_shift'];?></option>
                            <?php
                            }
                            else{
                                ?>
                                <option value="<?php echo $tampil2['id_shift'];?>"><?php echo $tampil2['nama_shift'];?></option>
                                <?php
                            }
                        }
                        ?>   
                            ?>
                        </select> 
              </td>
              <td>&nbsp;</td>
        </tr>
        <tr>
              <td>Jam Masuk</td>
              <td>:</td>
              <td>
                        <input type="text" name="jam_masuk" id="jam_masuk" class="span4" placeholder="Jam Masuk..." value="<?php echo $tampil['jam_masuk']; ?>"> 
              </td>
              <td>&nbsp;</td>
        </tr>
        <tr>
              <td>Jam Keluar</td>
              <td>:</td>
              <td>
                        <input type="text" name="jam_keluar" id="jam_keluar" class="span4" placeholder="Jam Keluar..." value="<?php echo $tampil['jam_keluar']; ?>"> 
              </td>
              <td>&nbsp;</td>
        </tr>
        <tr>
              <td>Jam Keluar Istirahat</td>
              <td>:</td>
              <td>
                        <input type="text" name="jam_keluar_istirahat" id="jam_keluar_istirahat" class="span4" placeholder="Jam Keluar Istirahat..." value="<?php echo $tampil['jam_keluar_istirahat']; ?>"> 
              </td>
              <td>&nbsp;</td>
        </tr>
        <tr>
              <td>Jam Masuk Istirahat</td>
              <td>:</td>
              <td>
                        <input type="text" name="jam_masuk_istirahat" id="jam_masuk_istirahat" class="span4" placeholder="Jam Masuk Istirahat..." value="<?php echo $tampil['jam_masuk_istirahat']; ?>"> 
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
    <?php
      }
    ?>        
    </div>
</div> 
</div>
  </body>
</html>
