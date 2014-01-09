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

  </script>
   <script>
                $(document).ready(function(){
                   $("#simpan_umum").click(function(){
                  var nama_pegawai=$("#nama_pegawai").val();
                  var shift=$("#shift").val();
                  var id_jam_kerja_pegawai=$("#id_jam_kerja_pegawai").val();
                  if(nama_pegawai==""){
                    alert("Nama Pegawai tidak boleh kosong!!!");
                    $("#nama_pegawai").focus();
                  }
                  else if(shift==""){
                    alert("Shift tidak boleh kosong!!!");
                    $("#shift").focus();
                  }
                  else{  
                            $.ajax({
                              type:"POST",
                                url :"<?php echo base_url();?>hrd/jam_kerja_pegawai/edit",
                                data:"id_jam_kerja_pegawai="+id_jam_kerja_pegawai+"&shift="+shift,
                                success : function (data) {
                                   window.parent.location="<?php echo base_url(); ?>hrd/jam_kerja_pegawai";;
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
    <h2>Edit Jam Kerja Pegawai</h2><hr>
    <?php
    foreach ($data_pegawai->result_array() as $tampil) {
    ?>
    <?php echo form_open('hrd/jam_kerja_pegawai/edit','id="formsimpan_umum"','class="form-horizontal"'); ?>
                      <input type="hidden" name="id_jam_kerja_pegawai" id="id_jam_kerja_pegawai" value="<?php echo $tampil['id_jam_kerja_pegawai'];?>">
                      <table>
                        <tr>
                          <td width="150px">Nama Pegawai</td><td>:</td><td><input type="text" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" readonly value="<?php echo $tampil['nama_pegawai'];?>"></td>
                        </tr>
                        <tr>
                          <td width="150px">Shift</td><td>:</td>
                          <td>
                            <select id="shift" name="shift">
                              <option value="">==Silahkan Pilih==</option>
                              <?php
                                foreach ($data_shift->result_array() as $hasil) {
                                if($hasil['id_shift']==$tampil['shift_id']){
                                  ?>
                                  <option value="<?php echo $hasil['id_shift'];?>" selected="selected"><?php echo $hasil['nama_shift'];?></option>
                                  <?php
                                }
                                else{
                                  ?>
                                  <option value="<?php echo $hasil['id_shift'];?>"><?php echo $hasil['nama_shift'];?></option>
                                  <?php                                  
                                }
                                }
                              ?>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td width="150px"></td><td></td><td><?php echo form_button(array('type'=>'button','content'=>'Simpan','name'=>'simpan','id'=>'simpan_umum','value'=>'Simpan','class'=>'btn btn-small  '));?></td>
                        </tr>
                      </table>
                    </form> 
                    <?php
                    }
                    ?>     
    </div>
</div> 
</div>
  </body>
</html>
