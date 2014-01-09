        <script>
                $(document).ready(function(){
                   $("#simpan_ptpn").click(function(){
                        var tanggal_registrasi_ptpn=$("#tanggal_registrasi_ptpn").val();
                        var nama_pasien_ptpn=$("#nama_pasien_ptpn").val();
                        var nama_panggilan_ptpn=$("#nama_panggilan_ptpn").val();
                        var tempat_lahir_ptpn=$("#tempat_lahir_ptpn").val();
                        var tanggal_lahir_ptpn=$("#tanggal_lahir_ptpn").val();
                        var jenis_kelamin=formsimpan_ptpn.jenis_kelamin[0].checked;
                        var jenis_kelamin2=formsimpan_ptpn.jenis_kelamin[1].checked;
                        var alamat_ptpn=$("#alamat_ptpn").val();
                        var rt_ptpn=$("#rt_ptpn").val();
                        var rw_ptpn=$("#rw_ptpn").val();
                        var desa_ptpn=$("#desa_ptpn").val();
                        var kecamatan_ptpn=$("#kecamatan_ptpn").val();
                        var kota_ptpn=$("#kota_ptpn").val();
                        var jenis_identitas=formsimpan_ptpn.jenis_identitas[0].checked;
                        var jenis_identitas2=formsimpan_ptpn.jenis_identitas[1].checked;
                        var jenis_identitas3=formsimpan_ptpn.jenis_identitas[2].checked;
                        var no_identitas_ptpn=$("#no_identitas_ptpn").val();
                        var status_perkawinan=formsimpan_ptpn.status_perkawinan[0].checked;
                        var status_perkawinan2=formsimpan_ptpn.status_perkawinan[1].checked;
                        var status_perkawinan3=formsimpan_ptpn.status_perkawinan[2].checked;
                        var status_perkawinan4=formsimpan_ptpn.status_perkawinan[3].checked;
                        var agama_ptpn=$("#agama_ptpn").val();
                        var pekerjaan_ptpn=$("#pekerjaan_ptpn").val();
                        var pendidikan_ptpn=$("#pendidikan_ptpn").val();
                        var ptpn=$("#ptpn").val();
                        if(tanggal_registrasi_ptpn==""){
                            alert("Tanggal registrasi masih kosong!");
                            $("#tanggal_registrasi_ptpn").focus();
                        }
                        else if(nama_pasien_ptpn==""){
                            alert("Nama Pasien masih kosong!");
                            $("#nama_pasien_ptpn").focus();
                        }
                        else if(nama_panggilan_ptpn==""){
                            alert("Nama Panggilan masih kosong!");
                            $("#nama_panggilan_ptpn").focus();
                        }
                        else if(tempat_lahir_ptpn==""){
                            alert("Tempat Lahir masih kosong!");
                            $("#tempat_lahir_ptpn").focus();
                        }
                        else if(tanggal_lahir_ptpn==""){
                            alert("Tanggal Lahir masih kosong!");
                            $("#tanggal_lahir_ptpn").focus();
                        }
                        else if(jenis_kelamin==false && jenis_kelamin2==false ){
                            alert('Jenis Kelamin masih kosong!');
                        }
                        else if(alamat_ptpn==""){
                            alert("Alamat masih kosong!");
                            $("#alamat_ptpn").focus();
                        }
                        else if(rt_ptpn==""){
                            alert("RT masih kosong!");
                            $("#rt_ptpn").focus();
                        }
                        else if(rw_ptpn==""){
                            alert("RW masih kosong!");
                            $("#rw_ptpn").focus();
                        }
                        else if(desa_ptpn==""){
                            alert("Desa masih kosong!");
                            $("#desa_ptpn").focus();
                        }
                        else if(kecamatan_ptpn==""){
                            alert("Kecamatan masih kosong!");
                            $("#kecamatan_ptpn").focus();
                        }
                        else if(kota_ptpn==""){
                            alert("Kota masih kosong!");
                            $("#kota_ptpn").focus();
                        }
                         else if(jenis_identitas==false && jenis_identitas2==false && jenis_identitas3==false ){
                            alert('Jenis Identitas masih kosong!');
                        }
                        else if(no_identitas_ptpn==""){
                            alert("No Identitas masih kosong!");
                            $("#no_identitas_ptpn").focus();
                        }
                         else if(status_perkawinan==false && status_perkawinan2==false && status_perkawinan3==false && status_perkawinan4==false ){
                            alert('Status Perkawinan masih kosong!');
                        }
                        else if(agama_ptpn==""){
                            alert("agama masih kosong!");
                            $("#agama_ptpn").focus();
                        }
                        else if(pekerjaan_ptpn==""){
                            alert("pekerjaan masih kosong!");
                            $("#pekerjaan_ptpn").focus();
                        }
                        else if(pendidikan_ptpn==""){
                            alert("pendidikan masih kosong!");
                            $("#pendidikan_ptpn").focus();
                        }

                         else if(ptpn==""){
                            alert("ptpn masih kosong!");
                            $("#ptpn").focus();
                        }
                        else{
                            $("#formsimpan_ptpn").submit();
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
    <?php echo form_open('loket/pendaftaran_pasien_ptpn/add','id="formsimpan_ptpn"','class="form-horizontal"'); ?>
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
                        $( "#tanggal_registrasi_ptpn" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_registrasi_ptpn" ).change(function() {
                            $( "#tanggal_registrasi_ptpn" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                            
                        });
                        $("#tanggal_registrasi_ptpn").val("<?php echo date('Y-m-d');?>");
                    });
                </script>
                <p><input type="text" name="tanggal_registrasi_ptpn" id="tanggal_registrasi_ptpn" class="span3" placeholder="Tanggal Registrasi..." /></p>
                </td>
                <td></td>
                <td></td>
                <td></td>
               
            </tr>
        <tr>
            <td>Nama Lengkap Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_pasien_ptpn"  id="nama_pasien_ptpn" class="span5" size="30" placeholder="Nama Pasien..." ></td>
            <td>Nama Panggilan</td>
            <td>:</td>
            <td><input type="text" name="nama_panggilan_ptpn" id="nama_panggilan_ptpn" placeholder="Nama Panggilan..." class="span3"></td> 
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td>:</td>
            <td>
                <script>
                    $(function() {
                        $( "#tanggal_lahir_ptpn" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_lahir_ptpn" ).change(function() {
                            $( "#tanggal_lahir_ptpn" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                            var date = new Date();
                            var tanggal_lahir_ptpn=$("#tanggal_lahir_ptpn").val()    
                            var yy = date.getYear();  
                            var year = (yy < 1000) ? yy + 1900 : yy;
                            var tahun_lahir = tanggal_lahir_ptpn.substring(0,4)
                            var tanggal_sekarang=year; 
                            var umur=tanggal_sekarang-tahun_lahir;
                            $("#umur_ptpn").val(umur);
                        });
                        var yearRange = $( "#tanggal_lahir_ptpn"  ).datepicker( "option", "yearRange" );
                        $( "#tanggal_lahir_ptpn"  ).datepicker( "option", "yearRange", "1945:<?php echo date('Y');?>" );
                    });
                </script>
                <input id="tempat_lahir_ptpn" class="span3" name="tempat_lahir_ptpn" placeholder="Tempat Lahir..."> / <input type="text" style="width:138px;" name="tanggal_lahir_ptpn" id="tanggal_lahir_ptpn"  placeholder="Tanggal Lahir..." />
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umur_ptpn"  class="span3" size="30" placeholder="Umur..." readonly> Tahun </td>
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
            <td><textarea name="alamat_ptpn" id="alamat_ptpn" class="span5" placeholder="Alamat..."></textarea></td>
            <td>RT / RW</td><td>:</td><td><input type="text" name="rt_ptpn" id="rt_ptpn" placeholder="RT..." class="span1"> / <input type="text" name="rw_ptpn" id="rw_ptpn" placeholder="RW..." class="span1"></td>
        </tr>
        <tr>
            <td>Desa</td>
            <td>:</td>
            <td><input type="text" name="desa_ptpn" id="desa_ptpn"  class="span5" size="30" placeholder="Desa..." > </td>
            <td></td><td></td><td></td>
        </tr>
         <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td><input type="text" name="kecamatan_ptpn" id="kecamatan_ptpn"  class="span5" size="30" placeholder="Kecamatan..." > </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Kota</td>
            <td>:</td>
            <td><input type="text" name="kota_ptpn" id="kota_ptpn"  class="span5" size="30" placeholder="Kota..." > </td>
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
            <td><input type="text" name="no_identitas_ptpn" id="no_identitas_ptpn"  class="span5" size="30" placeholder="No Identitas..."> </td>
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
                    <select name="agama_ptpn" id="agama_ptpn" style="width:270px;">
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
                    <select name="pekerjaan_ptpn" id="pekerjaan_ptpn" style="width:270px;">
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
                    <select name="pendidikan_ptpn" id="pendidikan_ptpn" style="width:270px;">
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
            <td>PTPN</td>
            <td>:</td>
            <td>
                    <select name="ptpn" id="ptpn" style="width:270px;">
                        <option value="">==PTPN==</option>
                        <?php
                            foreach ($ptpn->result_array() as $tampil) {
                        ?>
                            <option value="<?php echo $tampil['id_ptpn'];?>-<?php echo $tampil['nama_ptpn'];?>"><?php echo $tampil['nama_ptpn'];?></option>
                        <?php
                            }
                        ?>
                        
                    </select>                
            </td>
            <td></td><td>:</td><td></td>
        </tr>
            <td></td><td></td><td></td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> <?php echo form_button(array('type'=>'button','content'=>'Simpan','name'=>'simpan','id'=>'simpan_ptpn','value'=>'Simpan','class'=>'btn btn-small  '));?>
                <?php echo form_button(array('type'=>'reset','content'=>'Batal','name'=>'simpan','id'=>'batal','value'=>'Batal','class'=>'btn btn-small  '));?>
                </td>
                <td>&nbsp;</td>    
            </tr> 
      </tbody>

    </table>
    <?php echo form_close(); ?>
  </div>
</div>
