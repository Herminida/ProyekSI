        <script>
                $(document).ready(function(){
                   $("#simpan_umum").click(function(){
                        var tanggal_registrasi=$("#tanggal_registrasi").val();
                        var nama_pasien=$("#nama_pasien").val();
                        var nama_panggilan=$("#nama_panggilan").val();
                        var tempat_lahir=$("#tempat_lahir").val();
                        var tanggal_lahir=$("#tanggal_lahir").val();
                        var jenis_kelamin=formsimpan_umum.jenis_kelamin[0].checked;
                        var jenis_kelamin2=formsimpan_umum.jenis_kelamin[1].checked;
                        var alamat=$("#alamat").val();
                        var rt=$("#rt").val();
                        var rw=$("#rw").val();
                        var desa=$("#desa").val();
                        var kecamatan=$("#kecamatan").val();
                        var kota=$("#kota").val();
                        var jenis_identitas=formsimpan_umum.jenis_identitas[0].checked;
                        var jenis_identitas2=formsimpan_umum.jenis_identitas[1].checked;
                        var jenis_identitas3=formsimpan_umum.jenis_identitas[2].checked;
                        var no_identitas=$("#no_identitas").val();
                        var status_perkawinan=formsimpan_umum.status_perkawinan[0].checked;
                        var status_perkawinan2=formsimpan_umum.status_perkawinan[1].checked;
                        var status_perkawinan3=formsimpan_umum.status_perkawinan[2].checked;
                        var status_perkawinan4=formsimpan_umum.status_perkawinan[3].checked;
                        var agama=$("#agama").val();
                        var pekerjaan=$("#pekerjaan").val();
                        var pendidikan=$("#pendidikan").val();
                        if(tanggal_registrasi==""){
                            alert("Tanggal registrasi masih kosong!");
                            $("#tanggal_registrasi").focus();
                        }
                        else if(nama_pasien==""){
                            alert("Nama Pasien masih kosong!");
                            $("#nama_pasien").focus();
                        }
                        else if(nama_panggilan==""){
                            alert("Nama Panggilan masih kosong!");
                            $("#nama_panggilan").focus();
                        }
                        else if(tempat_lahir==""){
                            alert("Tempat Lahir masih kosong!");
                            $("#tempat_lahir").focus();
                        }
                        else if(tanggal_lahir==""){
                            alert("Tanggal Lahir masih kosong!");
                            $("#tanggal_lahir").focus();
                        }
                        else if(jenis_kelamin==false && jenis_kelamin2==false ){
                            alert('Jenis Kelamin masih kosong!');
                        }
                        else if(alamat==""){
                            alert("Alamat masih kosong!");
                            $("#alamat").focus();
                        }
                        else if(rt==""){
                            alert("RT masih kosong!");
                            $("#rt").focus();
                        }
                        else if(rw==""){
                            alert("RW masih kosong!");
                            $("#rw").focus();
                        }
                        else if(desa==""){
                            alert("Desa masih kosong!");
                            $("#desa").focus();
                        }
                        else if(kecamatan==""){
                            alert("Kecamatan masih kosong!");
                            $("#kecamatan").focus();
                        }
                        else if(kota==""){
                            alert("Kota masih kosong!");
                            $("#kota").focus();
                        }
                         else if(jenis_identitas==false && jenis_identitas2==false && jenis_identitas3==false ){
                            alert('Jenis Identitas masih kosong!');
                        }
                        else if(no_identitas==""){
                            alert("No Identitas masih kosong!");
                            $("#no_identitas").focus();
                        }
                         else if(status_perkawinan==false && status_perkawinan2==false && status_perkawinan3==false && status_perkawinan4==false ){
                            alert('Status Perkawinan masih kosong!');
                        }
                        else if(agama==""){
                            alert("Agama masih kosong!");
                            $("#agama").focus();
                        }
                        else if(pekerjaan==""){
                            alert("Pekerjaan masih kosong!");
                            $("#pekerjaan").focus();
                        }
                        else if(pendidikan==""){
                            alert("Pendidikan masih kosong!");
                            $("#pendidikan").focus();
                        }
                        else{
                            $("#formsimpan_umum").submit();
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
    <?php echo form_open('loket/pendaftaran_pasien/add','id="formsimpan_umum"','class="form-horizontal"'); ?>
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
                        $( "#tanggal_registrasi" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_registrasi" ).change(function() {
                            $( "#tanggal_registrasi" ).datepicker( "option", "dateFormat","yy-mm-dd" );

                        });
                        $("#tanggal_registrasi").val("<?php echo date('Y-m-d');?>");
                    });
                </script>
                <p><input type="text" name="tanggal_registrasi" id="tanggal_registrasi" class="span3" placeholder="Tanggal Registrasi..." /></p>
                </td>
                <td></td>
                <td></td>
                <td></td>
               
            </tr>
        <tr>
            <td>Nama Lengkap Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_pasien"  id="nama_pasien" class="span5" size="30" placeholder="Nama Pasien..." ></td>
            <td>Nama Panggilan</td>
            <td>:</td>
            <td><input type="text" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan..." class="span3"></td> 
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
                            var date = new Date();
                            var tanggal_lahir=$("#tanggal_lahir").val()    
                            var yy = date.getYear();  
                            var year = (yy < 1000) ? yy + 1900 : yy;
                            var tahun_lahir = tanggal_lahir.substring(0,4)
                            var tanggal_sekarang=year; 
                            var umur=tanggal_sekarang-tahun_lahir;
                            $("#umur").val(umur);
                        });
                        var yearRange = $( "#tanggal_lahir"  ).datepicker( "option", "yearRange" );
                        $( "#tanggal_lahir"  ).datepicker( "option", "yearRange", "1945:<?php echo date('Y');?>" );
                    });
                </script>
                <input id="tempat_lahir" class="span3" name="tempat_lahir" placeholder="Tempat Lahir..."> / <input type="text" style="width:138px;" name="tanggal_lahir" id="tanggal_lahir"  placeholder="Tanggal Lahir..." />
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umur"  class="span3" size="30" placeholder="Umur..." readonly> Tahun </td>
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
            <td><textarea name="alamat" id="alamat" class="span5" placeholder="Alamat"></textarea></td>
            <td>RT / RW</td><td>:</td><td><input type="text" name="rt" id="rt" placeholder="RT..." class="span1"> / <input type="text" name="rw" id="rw" placeholder="RW..." class="span1"></td>
        </tr>
        <tr>
            <td>Desa</td>
            <td>:</td>
            <td><input type="text" name="desa" id="desa"  class="span5" size="30" placeholder="Desa..." > </td>
            <td></td><td></td><td></td>
        </tr>
         <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td><input type="text" name="kecamatan" id="kecamatan"  class="span5" size="30" placeholder="Kecamatan..." > </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Kota</td>
            <td>:</td>
            <td><input type="text" name="kota" id="kota"  class="span5" size="30" placeholder="Kota..." > </td>
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
            <td><input type="text" name="no_identitas" id="no_identitas"  class="span5" size="30" placeholder="No Identitas..."> </td>
            <td></td><td>:</td><td></td>
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
            <td></td><td>:</td><td></td>
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
                            <option value="<?php echo $tampil['id'];?>-<?php echo $tampil['nama_agama'];?>"><?php echo $tampil['nama_agama'];?></option>
                        <?php
                            }
                        ?>
                        
                    </select>
            </td>
            <td></td><td>:</td><td></td>
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
                            <option value="<?php echo $tampil['id'];?>-<?php echo $tampil['nama_pekerjaan'];?>"><?php echo $tampil['nama_pekerjaan'];?></option>
                        <?php
                            }
                        ?>
                        
                    </select>
            </td>
            <td></td><td>:</td><td></td>
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
                            <option value="<?php echo $tampil['id'];?>-<?php echo $tampil['nama_pendidikan'];?>"><?php echo $tampil['nama_pendidikan'];?></option>
                        <?php
                            }
                        ?>
                        
                    </select>                
            </td>
            <td></td><td>:</td><td></td>
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> <?php echo form_button(array('type'=>'button','content'=>'Simpan','name'=>'simpan','id'=>'simpan_umum','value'=>'Simpan','class'=>'btn btn-small  '));?>
                <?php echo form_button(array('type'=>'reset','content'=>'Batal','name'=>'simpan','id'=>'batal','value'=>'Batal','class'=>'btn btn-small  '));?>
                </td>
                <td>&nbsp;</td>    
            </tr> 
      </tbody>

    </table>
    <?php echo form_close(); ?>
  </div>
</div>
