        <script>
                $(document).ready(function(){
                   $("#simpan_internal").click(function(){
                        var tanggal_registrasi_internal=$("#tanggal_registrasi_internal").val();
                        var nama_pasien_internal=$("#nama_pasien_internal").val();
                        var nama_panggilan_internal=$("#nama_panggilan_internal").val();
                        var tempat_lahir_internal=$("#tempat_lahir_internal").val();
                        var tanggal_lahir_internal=$("#tanggal_lahir_internal").val();
                        var jenis_kelamin=formsimpan_internal.jenis_kelamin[0].checked;
                        var jenis_kelamin2=formsimpan_internal.jenis_kelamin[1].checked;
                        var alamat_internal=$("#alamat_internal").val();
                        var rt_internal=$("#rt_internal").val();
                        var rw_internal=$("#rw_internal").val();
                        var desa_internal=$("#desa_internal").val();
                        var kecamatan_internal=$("#kecamatan_internal").val();
                        var kota_internal=$("#kota_internal").val();
                        var jenis_identitas=formsimpan_internal.jenis_identitas[0].checked;
                        var jenis_identitas2=formsimpan_internal.jenis_identitas[1].checked;
                        var jenis_identitas3=formsimpan_internal.jenis_identitas[2].checked;
                        var no_identitas_internal=$("#no_identitas_internal").val();
                        var status_perkawinan=formsimpan_internal.status_perkawinan[0].checked;
                        var status_perkawinan2=formsimpan_internal.status_perkawinan[1].checked;
                        var status_perkawinan3=formsimpan_internal.status_perkawinan[2].checked;
                        var status_perkawinan4=formsimpan_internal.status_perkawinan[3].checked;
                        var agama_internal=$("#agama_internal").val();
                        var pekerjaan_internal=$("#pekerjaan_internal").val();
                        var pendidikan_internal=$("#pendidikan_internal").val();
                        var internal=$("#internal").val();
                        if(tanggal_registrasi_internal==""){
                            alert("Tanggal registrasi masih kosong!");
                            $("#tanggal_registrasi_internal").focus();
                        }
                        else if(nama_pasien_internal==""){
                            alert("Nama Pasien masih kosong!");
                            $("#nama_pasien_internal").focus();
                        }
                        else if(nama_panggilan_internal==""){
                            alert("Nama Panggilan masih kosong!");
                            $("#nama_panggilan_internal").focus();
                        }
                        else if(tempat_lahir_internal==""){
                            alert("Tempat Lahir masih kosong!");
                            $("#tempat_lahir_internal").focus();
                        }
                        else if(tanggal_lahir_internal==""){
                            alert("Tanggal Lahir masih kosong!");
                            $("#tanggal_lahir_internal").focus();
                        }
                        else if(jenis_kelamin==false && jenis_kelamin2==false ){
                            alert('Jenis Kelamin masih kosong!');
                        }
                        else if(alamat_internal==""){
                            alert("Alamat masih kosong!");
                            $("#alamat_internal").focus();
                        }
                        else if(rt_internal==""){
                            alert("RT masih kosong!");
                            $("#rt_internal").focus();
                        }
                        else if(rw_internal==""){
                            alert("RW masih kosong!");
                            $("#rw_internal").focus();
                        }
                        else if(desa_internal==""){
                            alert("Desa masih kosong!");
                            $("#desa_internal").focus();
                        }
                        else if(kecamatan_internal==""){
                            alert("Kecamatan masih kosong!");
                            $("#kecamatan_internal").focus();
                        }
                        else if(kota_internal==""){
                            alert("Kota masih kosong!");
                            $("#kota_internal").focus();
                        }
                         else if(jenis_identitas==false && jenis_identitas2==false && jenis_identitas3==false ){
                            alert('Jenis Identitas masih kosong!');
                        }
                        else if(no_identitas_internal==""){
                            alert("No Identitas masih kosong!");
                            $("#no_identitas_internal").focus();
                        }
                         else if(status_perkawinan==false && status_perkawinan2==false && status_perkawinan3==false && status_perkawinan4==false ){
                            alert('Status Perkawinan masih kosong!');
                        }
                        else if(agama_internal==""){
                            alert("agama masih kosong!");
                            $("#agama_internal").focus();
                        }
                        else if(pekerjaan_internal==""){
                            alert("pekerjaan masih kosong!");
                            $("#pekerjaan_internal").focus();
                        }
                        else if(pendidikan_internal==""){
                            alert("pendidikan masih kosong!");
                            $("#pendidikan_internal").focus();
                        }

                         else if(internal==""){
                            alert("internal masih kosong!");
                            $("#internal").focus();
                        }
                        else{
                            $("#formsimpan_internal").submit();
                        }
                   });
                });
    </script>
  
<div id="real">
  <div id="statusdonor">
</pre>
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
    <?php echo form_open('loket/pendaftaran_pasien_internal/add','id="formsimpan_internal"','class="form-horizontal"'); ?>
<div style="float:right">
                <?php
                    foreach ($id_pasien->result_array() as $key) {
                        $max_no_rm=$key['no_rm'];
                    }
                    if(!isset($max_no_rm)){
                        $max_no_rm=("/00000");
                    }
                    $no_rm=explode("/",$max_no_rm);
                    $no_rm_sekarang=$no_rm[1]+1;
                    $newRM = sprintf("%05s",$no_rm_sekarang);
                ?>
                No RM
                <input type="text" name="no_rm" id="no_rm" value="<?php echo date('Y-m')?>/<?php echo $newRM;?>"  class="span2" size="30"  readonly="readonly">
            </div><br><br>
    <table class="table table-striped">
      <thead></thead>
      <tbody>
       
        
        <tr>
                <td style="width:30%">Tanggal Registrasi</td>
                <td>:</td>
                <td style="width:50%">
                    <script>
                    $(function() {
                        $( "#tanggal_registrasi_internal" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_registrasi_internal" ).change(function() {
                            $( "#tanggal_registrasi_internal" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                            
                        });
                        $("#tanggal_registrasi_internal").val("<?php echo date('Y-m-d');?>");
                    });
                </script>
                <p><input type="text" name="tanggal_registrasi_internal" id="tanggal_registrasi_internal" class="span3" placeholder="Tanggal Registrasi..." /></p>
                </td>
                <td></td>
                <td></td>
                <td></td>
               
            </tr>
        <tr>
            <td>Nama Lengkap Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_pasien_internal"  id="nama_pasien_internal" class="span5" size="30" placeholder="Nama Pasien..." ></td>
            <td>Nama Panggilan</td>
            <td>:</td>
            <td><input type="text" name="nama_panggilan_internal" id="nama_panggilan_internal" placeholder="Nama Panggilan..." class="span3"></td> 
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td>:</td>
            <td>
                <script>
                    $(function() {
                        $( "#tanggal_lahir_internal" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_lahir_internal" ).change(function() {
                            $( "#tanggal_lahir_internal" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                            var date = new Date();
                            var tanggal_lahir_internal=$("#tanggal_lahir_internal").val()    
                            var yy = date.getYear();  
                            var year = (yy < 1000) ? yy + 1900 : yy;
                            var tahun_lahir = tanggal_lahir_internal.substring(0,4)
                            var tanggal_sekarang=year; 
                            var umur=tanggal_sekarang-tahun_lahir;
                            $("#umur_internal").val(umur);
                        });
                        var yearRange = $( "#tanggal_lahir_internal"  ).datepicker( "option", "yearRange" );
                        $( "#tanggal_lahir_internal"  ).datepicker( "option", "yearRange", "1945:<?php echo date('Y');?>" );
                    });
                </script>
                <input id="tempat_lahir_internal" class="span3" name="tempat_lahir_internal" placeholder="Tempat Lahir..."> / <input type="text" style="width:138px;" name="tanggal_lahir_internal" id="tanggal_lahir_internal"  placeholder="Tanggal Lahir..." />
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umur_internal"  class="span3" size="30" placeholder="Umur..." readonly> Tahun </td>
            <td></td><td></td><td></td>
        </tr>
         <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                    <label class="radio inline">
                      <input type="radio" name="jenis_kelamin" id="sex_laki" value="l">
                      Laki-Laki
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="jenis_kelamin" id="sex_perempuan" value="p">
                      Perempuan
                    </label>
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat_internal" id="alamat_internal" class="span5" placeholder="Alamat..."></textarea></td>
            <td>RT / RW</td><td>:</td><td><input type="text" name="rt_internal" id="rt_internal" placeholder="RT..." class="span1"> / <input type="text" name="rw_internal" id="rw_internal" placeholder="RW..." class="span1"></td>
        </tr>
        <tr>
            <td>Desa</td>
            <td>:</td>
            <td><input type="text" name="desa_internal" id="desa_internal"  class="span5" size="30" placeholder="Desa..." > </td>
            <td></td><td></td><td></td>
        </tr>
         <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td><input type="text" name="kecamatan_internal" id="kecamatan_internal"  class="span5" size="30" placeholder="Kecamatan..." > </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Kota</td>
            <td>:</td>
            <td><input type="text" name="kota_internal" id="kota_internal"  class="span5" size="30" placeholder="Kota..." > </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Jenis Identitas</td>
            <td>:</td>
            <td colspan="4">    
                <label class="radio inline">
                <input type="radio" name="jenis_identitas" id="sim" value="SIM"> SIM
                </label>
                <label class="radio inline">
                <input type="radio" name="jenis_identitas" id="ktp" value="KTP"> KTP
                </label>
                <label class="radio inline">
                <input type="radio" name="jenis_identitas" id="paspor" value="Passpor">Passpor
                </label>                    
            </td>
        </tr>
        <tr>
            <td>No Identitas</td>
            <td>:</td>
            <td><input type="text" name="no_identitas_internal" id="no_identitas_internal"  class="span5" size="30" placeholder="No Identitas..."> </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Telepon Rumah</td>
            <td>:</td>
            <td>
                <input type="text" name="telepon_rumah" id="telepon_rumah" placeholder="Telepon..." class="span5">
            </td>
            <td></td><td></td><td></td> 
        </tr>
        <tr>
            <td>Telepon HP</td>
            <td>:</td>
            <td>
                <input type="text" name="telepon_hp" id="telepon_hp" placeholder="Telepon HP..." class="span5">
            </td>
            <td></td><td></td><td></td> 
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>
                    <label class="radio inline">
                      <input type="radio" name="status_perkawinan" id="belum menikah" value="belum menikah">
                      Belum Menikah
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="status_perkawinan" id="sudah menikah" value="sudah menikah">
                      Sudah Menikah
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="status_perkawinan" id="janda" value="janda">
                      Janda
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="status_perkawinan" id="duda" value="duda">
                      Duda
                    </label>
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>
                    <select name="agama_internal" id="agama_internal" style="width:270px;">
                        <option value="">==Agama==</option>
                        <?php
                            foreach ($agama->result_array() as $tampil) {
                        ?>
                            <option value="<?php echo $tampil['id'];?>-<?php echo $tampil['nama_agama'];?>"><?php echo $tampil['nama_agama'];?></option>
                        <?php
                            }
                        ?>
                        
                    </select>
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>
                    <select name="pekerjaan_internal" id="pekerjaan_internal" style="width:270px;">
                        <option value="">==Pekerjaan==</option>
                        <?php
                            foreach ($pekerjaan->result_array() as $tampil) {
                        ?>
                            <option value="<?php echo $tampil['id'];?>-<?php echo $tampil['nama_pekerjaan'];?>"><?php echo $tampil['nama_pekerjaan'];?></option>
                        <?php
                            }
                        ?>
                        
                    </select>
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td>
                    <select name="pendidikan_internal" id="pendidikan_internal" style="width:270px;">
                        <option value="">==Pendidikan==</option>
                        <?php
                            foreach ($pendidikan->result_array() as $tampil) {
                        ?>
                            <option value="<?php echo $tampil['id'];?>-<?php echo $tampil['nama_pendidikan'];?>"><?php echo $tampil['nama_pendidikan'];?></option>
                        <?php
                            }
                        ?>
                        
                    </select>                
            </td>
            <td></td><td></td><td></td>
        </tr>
                <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>
                    <select name="jabatan" id="jabatan" style="width:270px;">
                        <option value="">==Jabatan==</option>
                        <?php
                            foreach ($jabatan->result_array() as $tampil) {
                        ?>
                            <option value="<?php echo $tampil['id_jabatan'];?>-<?php echo $tampil['nama_jabatan'];?>"><?php echo $tampil['nama_jabatan'];?></option>
                        <?php
                            }
                        ?>
                        
                    </select>                
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> <?php echo form_button(array('type'=>'button','content'=>'Simpan','name'=>'simpan','id'=>'simpan_internal','value'=>'Simpan','class'=>'btn btn-small  '));?>
                <?php echo form_button(array('type'=>'reset','content'=>'Batal','name'=>'simpan','id'=>'batal','value'=>'Batal','class'=>'btn btn-small  '));?>
                </td>
                <td>&nbsp;</td>    
            </tr> 
      </tbody>

    </table>
    <?php echo form_close(); ?>
  </div>
</div>
