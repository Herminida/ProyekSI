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
                            alert("alamat_rekanan masih kosong!");
                            $("#alamat_rekanan").focus();
                        }
                        else if(rt_rekanan==""){
                            alert("rt_rekanan masih kosong!");
                            $("#rt_rekanan").focus();
                        }
                        else if(rw_rekanan==""){
                            alert("rw_rekanan masih kosong!");
                            $("#rw_rekanan").focus();
                        }
                        else if(desa_rekanan==""){
                            alert("desa_rekanan masih kosong!");
                            $("#desa_rekanan").focus();
                        }
                        else if(kecamatan_rekanan==""){
                            alert("kecamatan_rekanan masih kosong!");
                            $("#kecamatan_rekanan").focus();
                        }
                        else if(kota_rekanan==""){
                            alert("kota_rekanan masih kosong!");
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
    <h2>Edit Pasien Rekanan</h2>
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
    <?php echo form_open('loket/pendaftaran_pasien_rekanan/edit','id="formsimpan_rekanan"','class="form-horizontal"'); ?>
    <input type="hidden" value="<?php echo $tampil['id_pasien'];?>" name="id_pasien">
            <div style="float:right">
                No RM
                <input type="text" name="no_rm" id="no_rm" value="<?php echo $tampil['no_rm'];?>"  class="span2" size="30"  readonly="readonly">
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
                <p><input type="text" name="tanggal_registrasi_rekanan" value="<?php echo $tampil['tanggal_registrasi'];?>" id="tanggal_registrasi_rekanan" class="span3" placeholder="Tanggal Registrasi..." /></p>
                </td>
                <td></td>
                <td></td>
                <td></td>
               
            </tr>
        <tr>
            <td>Nama Lengkap Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_pasien_rekanan" value="<?php echo $tampil['nama_lengkap'];?>"  id="nama_pasien_rekanan" class="span5" size="30" placeholder="Nama Pasien..." ></td>
            <td>Nama Panggilan</td>
            <td>:</td>
            <td><input type="text" name="nama_panggilan_rekanan" value="<?php echo $tampil['nama_panggilan'];?>" placeholder="Nama Panggilan..." class="span3"></td> 
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
                        $("#tanggal_lahir_rekanan").val('<?php echo $tampil['tanggal_lahir'];?>');
                    });
                </script>
                <input id="tempat_lahir_rekanan" value="<?php echo $tampil['tempat_lahir'];?>" class="span3" name="tempat_lahir_rekanan" placeholder="Tempat Lahir..."> / <input type="text" style="width:138px;" name="tanggal_lahir_rekanan" id="tanggal_lahir_rekanan"  placeholder="Tanggal Lahir..." />
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umur_rekanan" value="<?php echo $tampil['umur'];?>"  class="span3" size="30" placeholder="Umur..." readonly> Tahun </td>
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
            <td><textarea name="alamat_rekanan" id="alamat_rekanan" class="span5" placeholder="Alamat..."><?php echo $tampil['alamat'];?></textarea></td>
            <td>RT / RW</td><td>:</td><td><input type="text" value="<?php echo $tampil['rt'];?>" name="rt_rekanan" id="rt_rekanan" placeholder="RT..." class="span1"> / <input type="text" name="rw_rekanan" value="<?php echo $tampil['rw'];?>" id="rw_rekanan" placeholder="RW..." class="span1"></td>
        </tr>
        <tr>
            <td>Desa</td>
            <td>:</td>
            <td><input type="text" name="desa_rekanan" id="desa_rekanan" value="<?php echo $tampil['desa'];?>"  class="span5" size="30" placeholder="Desa..." > </td>
            <td></td><td></td><td></td>
        </tr>
         <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td><input type="text" name="kecamatan_rekanan" id="kecamatan_rekanan" value="<?php echo $tampil['kecamatan'];?>"  class="span5" size="30" placeholder="Kecamatan..." > </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Kota</td>
            <td>:</td>
            <td><input type="text" name="kota_rekanan" id="kota_rekanan"  value="<?php echo $tampil['kota'];?>" class="span5" size="30" placeholder="Kota..." > </td>
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
            <td><input type="text" name="no_identitas_rekanan" value="<?php echo $tampil['no_identitas'];?>" id="no_identitas_rekanan"  class="span5" size="30" placeholder="No Identitas..."> </td>
            <td></td><td>:</td><td></td>
        </tr>
        <tr>
            <td>Telepon Rumah</td>
            <td>:</td>
            <td>
                <input type="text" name="telepon_rumah" id="telepon_rumah" value="<?php echo $tampil['no_telepon_rumah'];?>" placeholder="Telepon..." class="span5">
            </td>
            <td></td><td></td><td></td> 
        </tr>
        <tr>
            <td>Telepon HP</td>
            <td>:</td>
            <td>
                <input type="text" name="telepon_hp" id="telepon_hp" value="<?php echo $tampil['no_hp'];?>" placeholder="Telepon HP..." class="span5">
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
                    <select name="agama_rekanan" id="agama_rekanan" style="width:270px;">
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
                    <select name="pekerjaan_rekanan" id="pekerjaan_rekanan" style="width:270px;">
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
                    <select name="pendidikan_rekanan" id="pendidikan_rekanan" style="width:270px;">
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
            <td>Rekanan</td>
            <td>:</td>
            <td>
                    <select name="rekanan" id="rekanan" style="width:270px;">
                        <option value="">==Rekanan==</option>
                        <?php
                            foreach ($rekanan->result_array() as $tampil2) {
                                if($tampil['rekanan_id']==$tampil2['id_rekanan']){
                            ?>
                            <option value="<?php echo $tampil2['id_rekanan'];?>-<?php echo $tampil2['nama_rekanan'];?>" selected="selected"><?php echo $tampil2['nama_rekanan'];?></option>
                            <?php
                            }
                            else{
                                ?>
                                <option value="<?php echo $tampil2['id_rekanan'];?>-<?php echo $tampil2['nama_rekanan'];?>"><?php echo $tampil2['nama_rekanan'];?></option>
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
                <td colspan="1"> <?php echo form_button(array('type'=>'button','content'=>'Simpan','name'=>'simpan','id'=>'simpan_rekanan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                <a href="<?php echo base_url();?>loket/pendaftaran_pasien_rekanan"><button type="button" class="btn btn-small">Batal</button></a>
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
