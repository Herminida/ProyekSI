        <script>
                $(document).ready(function(){
                   $("#simpan_rekanan").click(function(){
                        var tanggal_registrasi_rekanan=$("#tanggal_registrasi_rekanan").val();
                        var nama_pasien_rekanan=$("#nama_pasien_rekanan").val();
                        var nama_panggilan_rekanan=$("#nama_panggilan_rekanan").val();
                        var tempat_lahir_rekanan=$("#tempat_lahir_rekanan").val();
                        var tanggal_lahir_rekanan=$("#tanggal_lahir_rekanan").val();
                        var jenis_kelamin=formsimpan_rekanan.jenis_kelamin[0].checked;
                        var jenis_kelamin2=formsimpan_rekanan.jenis_kelamin[1].checked;
                        var alamat_rekanan=$("#alamat_rekanan").val();
                        var rt_rekanan=$("#rt_rekanan").val();
                        var rw_rekanan=$("#rw_rekanan").val();
                        var desa_rekanan=$("#desa_rekanan").val();
                        var kecamatan_rekanan=$("#kecamatan_rekanan").val();
                        var kota_rekanan=$("#kota_rekanan").val();
                        var jenis_identitas=formsimpan_rekanan.jenis_identitas[0].checked;
                        var jenis_identitas2=formsimpan_rekanan.jenis_identitas[1].checked;
                        var jenis_identitas3=formsimpan_rekanan.jenis_identitas[2].checked;
                        var no_identitas_rekanan=$("#no_identitas_rekanan").val();
                        var status_perkawinan=formsimpan_rekanan.status_perkawinan[0].checked;
                        var status_perkawinan2=formsimpan_rekanan.status_perkawinan[1].checked;
                        var status_perkawinan3=formsimpan_rekanan.status_perkawinan[2].checked;
                        var status_perkawinan4=formsimpan_rekanan.status_perkawinan[3].checked;
                        var agama_rekanan=$("#agama_rekanan").val();
                        var pekerjaan_rekanan=$("#pekerjaan_rekanan").val();
                        var pendidikan_rekanan=$("#pendidikan_rekanan").val();
                        var rekanan=$("#rekanan").val();
                        if(tanggal_registrasi_rekanan==""){
                            alert("Tanggal registrasi masih kosong!");
                            $("#tanggal_registrasi_rekanan").focus();
                        }
                        else if(nama_pasien_rekanan==""){
                            alert("Nama Pasien masih kosong!");
                            $("#nama_pasien_rekanan").focus();
                        }
                        else if(nama_panggilan_rekanan==""){
                            alert("Nama Panggilan masih kosong!");
                            $("#nama_panggilan_rekanan").focus();
                        }
                        else if(tempat_lahir_rekanan==""){
                            alert("Tempat Lahir masih kosong!");
                            $("#tempat_lahir_rekanan").focus();
                        }
                        else if(tanggal_lahir_rekanan==""){
                            alert("Tanggal Lahir masih kosong!");
                            $("#tanggal_lahir_rekanan").focus();
                        }
                        else if(jenis_kelamin==false && jenis_kelamin2==false ){
                            alert('Jenis Kelamin masih kosong!');
                        }
                        else if(alamat_rekanan==""){
                            alert("Alamat masih kosong!");
                            $("#alamat_rekanan").focus();
                        }
                        else if(rt_rekanan==""){
                            alert("RT masih kosong!");
                            $("#rt_rekanan").focus();
                        }
                        else if(rw_rekanan==""){
                            alert("RW masih kosong!");
                            $("#rw_rekanan").focus();
                        }
                        else if(desa_rekanan==""){
                            alert("Desa masih kosong!");
                            $("#desa_rekanan").focus();
                        }
                        else if(kecamatan_rekanan==""){
                            alert("Kecamatan masih kosong!");
                            $("#kecamatan_rekanan").focus();
                        }
                        else if(kota_rekanan==""){
                            alert("Kota masih kosong!");
                            $("#kota_rekanan").focus();
                        }
                         else if(jenis_identitas==false && jenis_identitas2==false && jenis_identitas3==false ){
                            alert('Jenis Identitas masih kosong!');
                        }
                        else if(no_identitas_rekanan==""){
                            alert("No Identitas masih kosong!");
                            $("#no_identitas_rekanan").focus();
                        }
                         else if(status_perkawinan==false && status_perkawinan2==false && status_perkawinan3==false && status_perkawinan4==false ){
                            alert('Status Perkawinan masih kosong!');
                        }
                        else if(agama_rekanan==""){
                            alert("agama masih kosong!");
                            $("#agama_rekanan").focus();
                        }
                        else if(pekerjaan_rekanan==""){
                            alert("pekerjaan masih kosong!");
                            $("#pekerjaan_rekanan").focus();
                        }
                        else if(pendidikan_rekanan==""){
                            alert("pendidikan masih kosong!");
                            $("#pendidikan_rekanan").focus();
                        }

                         else if(rekanan==""){
                            alert("Rekanan masih kosong!");
                            $("#rekanan").focus();
                        }
                        else{
                            $("#formsimpan_rekanan").submit();
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
    <?php echo form_open('loket/pendaftaran_pasien_rekanan/add','id="formsimpan_rekanan"','class="form-horizontal"'); ?>
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
                        $( "#tanggal_registrasi_rekanan" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_registrasi_rekanan" ).change(function() {
                            $( "#tanggal_registrasi_rekanan" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                            
                        });
                        $("#tanggal_registrasi_rekanan").val("<?php echo date('Y-m-d');?>");
                    });
                </script>
                <p><input type="text" name="tanggal_registrasi_rekanan" id="tanggal_registrasi_rekanan" class="span3" placeholder="Tanggal Registrasi..." /></p>
                </td>
                <td></td>
                <td></td>
                <td></td>
               
            </tr>
        <tr>
            <td>Nama Lengkap Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_pasien_rekanan"  id="nama_pasien_rekanan" class="span5" size="30" placeholder="Nama Pasien..." ></td>
            <td>Nama Panggilan</td>
            <td>:</td>
            <td><input type="text" name="nama_panggilan_rekanan" id="nama_panggilan_rekanan" placeholder="Nama Panggilan..." class="span3"></td> 
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td>:</td>
            <td>
                <script>
                    $(function() {
                        $( "#tanggal_lahir_rekanan" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_lahir_rekanan" ).change(function() {
                            $( "#tanggal_lahir_rekanan" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                            var date = new Date();
                            var tanggal_lahir_rekanan=$("#tanggal_lahir_rekanan").val()    
                            var yy = date.getYear();  
                            var year = (yy < 1000) ? yy + 1900 : yy;
                            var tahun_lahir = tanggal_lahir_rekanan.substring(0,4)
                            var tanggal_sekarang=year; 
                            var umur=tanggal_sekarang-tahun_lahir;
                            $("#umur_rekanan").val(umur);
                        });
                        var yearRange = $( "#tanggal_lahir_rekanan"  ).datepicker( "option", "yearRange" );
                        $( "#tanggal_lahir_rekanan"  ).datepicker( "option", "yearRange", "1945:<?php echo date('Y');?>" );
                    });
                </script>
                <input id="tempat_lahir_rekanan" class="span3" name="tempat_lahir_rekanan" placeholder="Tempat Lahir..."> / <input type="text" style="width:138px;" name="tanggal_lahir_rekanan" id="tanggal_lahir_rekanan"  placeholder="Tanggal Lahir..." />
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umur_rekanan"  class="span3" size="30" placeholder="Umur..." readonly> Tahun </td>
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
            <td><textarea name="alamat_rekanan" id="alamat_rekanan" class="span5" placeholder="Alamat..."></textarea></td>
            <td>RT / RW</td><td>:</td><td><input type="text" name="rt_rekanan" id="rt_rekanan" placeholder="RT..." class="span1"> / <input type="text" name="rw_rekanan" id="rw_rekanan" placeholder="RW..." class="span1"></td>
        </tr>
        <tr>
            <td>Desa</td>
            <td>:</td>
            <td><input type="text" name="desa_rekanan" id="desa_rekanan"  class="span5" size="30" placeholder="Desa..." > </td>
            <td></td><td></td><td></td>
        </tr>
         <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td><input type="text" name="kecamatan_rekanan" id="kecamatan_rekanan"  class="span5" size="30" placeholder="Kecamatan..." > </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Kota</td>
            <td>:</td>
            <td><input type="text" name="kota_rekanan" id="kota_rekanan"  class="span5" size="30" placeholder="Kota..." > </td>
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
            <td><input type="text" name="no_identitas_rekanan" id="no_identitas_rekanan"  class="span5" size="30" placeholder="No Identitas..."> </td>
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
                    <select name="agama_rekanan" id="agama_rekanan" style="width:270px;">
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
                    <select name="pekerjaan_rekanan" id="pekerjaan_rekanan" style="width:270px;">
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
                    <select name="pendidikan_rekanan" id="pendidikan_rekanan" style="width:270px;">
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
            <td>Rekanan</td>
            <td>:</td>
            <td>
                    <select name="rekanan" id="rekanan" style="width:270px;">
                        <option value="">==Rekanan==</option>
                        <?php
                            foreach ($rekanan->result_array() as $tampil) {
                        ?>
                            <option value="<?php echo $tampil['id_rekanan'];?>-<?php echo $tampil['nama_rekanan'];?>"><?php echo $tampil['nama_rekanan'];?></option>
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
                <td colspan="1"> <?php echo form_button(array('type'=>'button','content'=>'Simpan','name'=>'simpan','id'=>'simpan_rekanan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                <?php echo form_button(array('type'=>'reset','content'=>'Batal','name'=>'simpan','id'=>'batal','value'=>'Batal','class'=>'btn btn-small  '));?>
                </td>
                <td>&nbsp;</td>    
            </tr> 
      </tbody>

    </table>
    <?php echo form_close(); ?>
  </div>
</div>
