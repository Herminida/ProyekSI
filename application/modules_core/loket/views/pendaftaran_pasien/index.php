        <script>
                $(document).ready(function(){
                    $("#coba").click(function(){
                        $("#tes").hide();
                    });

                    $("#no_identitas").keyup(function(){
                        var no_identitas=$("#no_identitas").val();
                        $("#no_rm").val(no_identitas);
                    });

                    $("#simpan").click(function(){
                        var err=false;
                        var jenis_kelamin=formsimpan.jenis_kelamin[0].checked;
                        var jenis_kelamin2=formsimpan.jenis_kelamin[1].checked;
                        var status_perkawinan=formsimpan.status_perkawinan[0].checked;
                        var status_perkawinan2=formsimpan.status_perkawinan[1].checked;
                        var alamat=$("#alamat").val();
                        var pendidikan=$("#pendidikan").val();
                        var pekerjaan=$("#pekerjaan").val();
                        var agama=$("#agama").val();
                        $("#formsimpan input").each(function(){
                            if($(this).val()==""){
                                if(($(this).attr('id')=="email") ){
                                        err=false;
                                    
                                }else{
                                    err=true;
                                }
                    
                            } 
                        });

                        if(err){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }

                        else if(jenis_kelamin==false && jenis_kelamin2==false ){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }
                        else if(status_perkawinan==false && status_perkawinan2==false ){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }
                        else if(alamat==""){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }
                        else if(pendidikan==""){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }
                        else if(pekerjaan==""){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }
                        else if(agama==""){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }
                        else{
                                $("#formsimpan").submit();
                        }
                    });
                });
    </script>
  
<div id="real">
  <div id="statusdonor">
</pre>
<h3>Pendaftaran Pasien</h3>
    <?php
    $confirm=$this->session->flashdata('confirm');
        if(empty($confirm)){

        }
        else{
            ?>
               <div class="alert alert-success">
                    <?php echo $this->session->flashdata('confirm');?>
                </div>
            <?php
        }
    ?>
    <?php echo form_open('loket/pendaftaran_pasien/add','id="formsimpan"','class="form-horizontal"'); ?>
    <table class="table table-striped">
      <thead></thead>
      <tbody>
       
        
        <tr>
                <td style="width:30%">Tanggal Registrasi</td>
                <td>:</td>
                <td style="width:50%">
                    <script>
                    $(function() {
                        $( "#tanggal_registrasi" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_registrasi" ).change(function() {
                            $( "#tanggal_registrasi" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                        });
                    });
                </script>
                <p><input type="text" name="tanggal_registrasi" id="tanggal_registrasi" class="span3" placeholder="Tanggal Registrasi..." /></p>
                </td>
                <td style="width:30%; color:red;"><?php echo form_error('tanggal_lahir'); ?> </td>
               
            </tr>
        <tr>
            <td>No Identitas</td>
            <td>:</td>
            <td><input type="text" name="no_identitas" id="no_identitas"  class="span3" size="30" placeholder="NIK..."> </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('nik'); ?></td> 
        </tr>
         <tr>
            <td>No RM</td>
            <td>:</td>
            <td><input type="text" name="no_rm" id="no_rm"  class="span3" size="30" placeholder="No RM..." readonly="readonly"> </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('nik'); ?></td> 
        </tr>

        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_pasien"  id="nama_pasien" class="span3" size="30" placeholder="Nama Pasien..." ></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('nama_anggota'); ?></td> 
        </tr>

        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" id="alamat" class="span5" placeholde="Alamat"></textarea></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('alamat'); ?></td> 
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                    <label class="radio">
                      <input type="radio" name="jenis_kelamin" id="sex_laki" value="l">
                      Laki-Laki
                    </label>
                    <label class="radio">
                      <input type="radio" name="jenis_kelamin" id="sex_perempuan" value="p">
                      Perempuan
                    </label>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>
                    <label class="radio">
                      <input type="radio" name="status_perkawinan" id="sex_laki" value="0">
                      Belum Menikah
                    </label>
                    <label class="radio">
                      <input type="radio" name="status_perkawinan" id="sex_perempuan" value="1">
                      Sudah Menikah
                    </label>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>

        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td>:</td>
            <td>
                <script>
                    $(function() {
                        $( "#tanggal_lahir" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_lahir" ).change(function() {
                            $( "#tanggal_lahir" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                        });
                        var yearRange = $( "#tanggal_lahir"  ).datepicker( "option", "yearRange" );
                        $( "#tanggal_lahir"  ).datepicker( "option", "yearRange", "1945:<?php echo date('Y');?>" );
                    });
                </script>
                <input id="tempat_lahir" class="input-medium" name="tempat_lahir" placeholder="Tempat Lahir..."> / <input type="text" class="input-small" name="tanggal_lahir" id="tanggal_lahir"  placeholder="Tanggal Lahir..." />
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('tgl_lahir'); ?></td> 
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>
                    <select name="agama" id="agama" style="width:270px;">
                        <option value="">==Agama==</option>
                        <?php
                            foreach ($agama->result_array() as $tampil) {
                        ?>
                            <option value="<?php echo $tampil['id'];?>"><?php echo $tampil['nama_agama'];?></option>
                        <?php
                            }
                        ?>
                        
                    </select>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td>
                    <select name="pendidikan" id="pendidikan" style="width:270px;">
                        <option value="">==Pendidikan==</option>
                        <?php
                            foreach ($pendidikan->result_array() as $tampil) {
                        ?>
                            <option value="<?php echo $tampil['id'];?>"><?php echo $tampil['nama_pendidikan'];?></option>
                        <?php
                            }
                        ?>
                        
                    </select>                
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>
                    <select name="pekerjaan" id="pekerjaan" style="width:270px;">
                        <option value="">==pekerjaan==</option>
                        <?php
                            foreach ($pekerjaan->result_array() as $tampil) {
                        ?>
                            <option value="<?php echo $tampil['id'];?>"><?php echo $tampil['nama_pekerjaan'];?></option>
                        <?php
                            }
                        ?>
                        
                    </select>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>
        <tr>
            <td>Telepon</td>
            <td>:</td>
            <td>
                <input type="text" name="telepon" id="telepon" placeholder="Telepon" class="span3">
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> <?php echo form_button(array('type'=>'button','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                </td>
                <td>&nbsp;</td>
                
            </tr> 
      </tbody>

    </table>
    <?php echo form_close(); ?>


  </div>
</div>


    