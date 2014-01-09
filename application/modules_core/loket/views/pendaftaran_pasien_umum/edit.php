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
    <h2>Edit Pasien Umum</h2>
    <hr>
<?php
foreach ($data_pasien->result_array() as $tampil) {
?>
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
    <?php echo form_open('loket/pendaftaran_pasien/edit','id="formsimpan_umum"','class="form-horizontal"'); ?>
    <input type="hidden" value="<?php echo $tampil['id_pasien'];?>" name="id_pasien">
            <div style="float:right">
                No RM
                <input type="text" name="no_rm" id="no_rm" value="<?php echo date('Y-m')?>/00001"  class="span2" size="30"  readonly="readonly">
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
                    });
                </script>
                <p><input type="text" name="tanggal_registrasi" id="tanggal_registrasi" value="<?php echo $tampil['tanggal_registrasi'];?>" class="span3" placeholder="Tanggal Registrasi..." /></p>
                </td>
                <td></td>
                <td></td>
                <td></td>
               
            </tr>
        <tr>
            <td>Nama Lengkap Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_pasien"  id="nama_pasien" value="<?php echo $tampil['nama_lengkap'];?>" class="span5" size="30" placeholder="Nama Pasien..." ></td>
            <td>Nama Panggilan</td>
            <td>:</td>
            <td><input type="text" name="nama_panggilan" value="<?php echo $tampil['nama_panggilan'];?>" placeholder="Nama Panggilan..." class="span3"></td> 
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
                         $("#tanggal_lahir").val("<?php echo $tampil['tanggal_lahir'];?>");
                    });
                </script>
                <input id="tempat_lahir" class="span3" value="<?php echo $tampil['tempat_lahir'];?>" name="tempat_lahir" placeholder="Tempat Lahir..."> / <input type="text" style="width:138px;" value="<?php echo $tampil['tanggal_lahir'];?>" name="tanggal_lahir" id="tanggal_lahir"  placeholder="Tanggal Lahir..." />
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umur" value="<?php echo $tampil['umur'];?>"  class="span3" size="30" placeholder="Umur..." readonly> Tahun </td>
            <td></td><td></td><td></td>
        </tr>
         <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                    <label class="radio inline">
                        <?php
                            if($tampil['jenis_kelamin']=="l"){
                        ?>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="l" checked>
                            Laki Laki
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="l" >
                            Laki Laki
                        <?php
                            }
                        ?>
                    </label>
                    <label class="radio inline">
                        <?php
                            if($tampil['jenis_kelamin']=="p"){
                        ?>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="p" checked>
                            Perempuan
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="p" >
                            Perempuan
                        <?php
                            }
                        ?>
                    </label>
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" id="alamat" class="span5" placeholder="Alamat"><?php echo $tampil['alamat'];?></textarea></td>
            <td>RT / RW</td><td>:</td><td><input type="text" name="rt" id="rt" placeholder="RT..." class="span1" value="<?php echo $tampil['rt'];?>"> / <input type="text" name="rw" id="rw" placeholder="RW..." class="span1" value="<?php echo $tampil['rw'];?>"></td>
        </tr>
        <tr>
            <td>Desa</td>
            <td>:</td>
            <td><input type="text" name="desa" id="desa" value="<?php echo $tampil['desa'];?>"  class="span5" size="30" placeholder="Desa..." > </td>
            <td></td><td></td><td></td>
        </tr>
         <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td><input type="text" name="kecamatan" id="kecamatan"  class="span5" value="<?php echo $tampil['kecamatan'];?>" size="30" placeholder="Kecamatan..." > </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Kota</td>
            <td>:</td>
            <td><input type="text" name="kota" id="kota" value="<?php echo $tampil['kota'];?>"  class="span5" size="30" placeholder="Kota..." > </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Jenis Identitas</td>
            <td>:</td>
            <td colspan="4">    
                 <label class="radio inline">
                        <?php
                            if($tampil['jenis_identitas']=="SIM"){
                        ?>
                            <input type="radio" name="jenis_identitas" id="sim" value="SIM" checked>
                            SIM
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="jenis_identitas" id="sim" value="SIM" >
                            SIM
                        <?php
                            }
                        ?>
                    </label>
                    <label class="radio inline">
                        <?php
                            if($tampil['jenis_identitas']=="KTP"){
                        ?>
                            <input type="radio" name="jenis_identitas" id="ktp" value="KTP" checked>
                            KTP
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="jenis_identitas" id="ktp" value="KTP" >
                            KTP
                        <?php
                            }
                        ?>
                    </label>
                    <label class="radio inline">
                        <?php
                            if($tampil['jenis_identitas']=="Paspor"){
                        ?>
                            <input type="radio" name="jenis_identitas" id="paspor" value="Paspor" checked>
                            Paspor
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="jenis_identitas" id="paspor" value="Paspor" >
                            Paspor
                        <?php
                            }
                        ?>
                    </label>                    
            </td>
        </tr>
        <tr>
            <td>No Identitas</td>
            <td>:</td>
            <td><input type="text" name="no_identitas" value="<?php echo $tampil['no_identitas'];?>" id="no_identitas"  class="span5" size="30" placeholder="No Identitas..."> </td>
            <td></td><td>:</td><td></td>
        </tr>
        <tr>
            <td>Telepon Rumah</td>
            <td>:</td>
            <td>
                <input type="text" name="telepon_rumah" value="<?php echo $tampil['no_telepon_rumah'];?>" id="telepon_rumah" placeholder="Telepon..." class="span5">
            </td>
            <td></td><td></td><td></td> 
        </tr>
        <tr>
            <td>Telepon HP</td>
            <td>:</td>
            <td>
                <input type="text" value="<?php echo $tampil['no_hp'];?>" name="telepon_hp" id="telepon_hp" placeholder="Telepon HP..." class="span5">
            </td>
            <td></td><td></td><td></td> 
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>
                    <label class="radio inline">
                        <?php
                            if($tampil['status_pernikahan']=="belum menikah"){
                        ?>
                            <input type="radio" name="status_perkawinan" id="belum menikah" value="belum menikah" checked>
                            Belum Menikah
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="status_perkawinan" id="belum menikah" value="belum menikah" >
                            Belum Menikah
                        <?php
                            }
                        ?>
                    </label>
                     <label class="radio inline">
                        <?php
                            if($tampil['status_pernikahan']=="sudah menikah"){
                        ?>
                            <input type="radio" name="status_perkawinan" id="belum menikah" value="sudah menikah" checked>
                            Sudah Menikah
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="status_perkawinan" id="belum menikah" value="sudah menikah" >
                            Sudah Menikah 
                        <?php
                            }
                        ?>
                    </label>
                     <label class="radio inline">
                        <?php
                            if($tampil['status_pernikahan']=="janda"){
                        ?>
                            <input type="radio" name="status_perkawinan" id="belum menikah" value="janda " checked>
                            Janda
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="status_perkawinan" id="belum menikah" value="janda " >
                            Janda
                        <?php
                            }
                        ?>
                    </label>
                     <label class="radio inline">
                        <?php
                            if($tampil['status_pernikahan']=="duda"){
                        ?>
                            <input type="radio" name="status_perkawinan" id="belum menikah" value="duda" checked>
                            Duda
                        <?php
                            }
                            else{
                        ?>
                            <input type="radio" name="status_perkawinan" id="belum menikah" value="duda" >
                            Duda
                        <?php
                            }
                        ?>
                    </label>
            </td>
            <td></td><td>:</td><td></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>
                    <select name="agama" id="agama" style="width:270px;">
                        <?php
                            foreach ($agama->result_array() as $tampil1) {
                            if($tampil['agama_id']==$tampil1['id']){
                            ?>
                            <option value="<?php echo $tampil1['id'];?>-<?php echo $tampil1['nama_agama'];?>" selected="selected"><?php echo $tampil1['nama_agama'];?></option>
                            <?php
                            }
                            else{
                                ?>
                                <option value="<?php echo $tampil1['id'];?>-<?php echo $tampil1['nama_agama'];?>"><?php echo $tampil1['nama_agama'];?></option>
                                <?php
                            }
                        ?>               
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
                        <?php
                            foreach ($pekerjaan->result_array() as $tampil2) {
                                if($tampil['pekerjaan_id']==$tampil2['id']){
                            ?>
                            <option value="<?php echo $tampil2['id'];?>-<?php echo $tampil2['nama_pekerjaan'];?>" selected="selected"><?php echo $tampil2['nama_pekerjaan'];?></option>
                            <?php
                            }
                            else{
                                ?>
                                <option value="<?php echo $tampil2['id'];?>-<?php echo $tampil2['nama_pekerjaan'];?>"><?php echo $tampil2['nama_pekerjaan'];?></option>
                                <?php
                            }
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
                        <?php
                            foreach ($pendidikan->result_array() as $tampil2) {
                                if($tampil['pendidikan_id']==$tampil2['id']){
                            ?>
                            <option value="<?php echo $tampil2['id'];?>-<?php echo $tampil2['nama_pendidikan'];?>" selected="selected"><?php echo $tampil2['nama_pendidikan'];?></option>
                            <?php
                            }
                            else{
                                ?>
                                <option value="<?php echo $tampil2['id'];?>-<?php echo $tampil2['nama_pendidikan'];?>"><?php echo $tampil2['nama_pendidikan'];?></option>
                                <?php
                            }
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
                    <a href="<?php echo base_url();?>loket/pendaftaran_pasien"><button type="button" class="btn btn-small">Batal</button></a>
                </td>
                <td>&nbsp;</td>    
            </tr> 
      </tbody>

    </table>
    <?php echo form_close(); ?>
<?php
}
?>
  </div>
</div>
