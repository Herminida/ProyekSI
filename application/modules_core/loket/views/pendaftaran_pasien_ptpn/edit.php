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
                            alert("alamat_ptpn masih kosong!");
                            $("#alamat_ptpn").focus();
                        }
                        else if(rt_ptpn==""){
                            alert("rt_ptpn masih kosong!");
                            $("#rt_ptpn").focus();
                        }
                        else if(rw_ptpn==""){
                            alert("rw_ptpn masih kosong!");
                            $("#rw_ptpn").focus();
                        }
                        else if(desa_ptpn==""){
                            alert("desa_ptpn masih kosong!");
                            $("#desa_ptpn").focus();
                        }
                        else if(kecamatan_ptpn==""){
                            alert("kecamatan_ptpn masih kosong!");
                            $("#kecamatan_ptpn").focus();
                        }
                        else if(kota_ptpn==""){
                            alert("kota_ptpn masih kosong!");
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
    <h2>Edit Pasien PTPN</h2>
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
    <?php echo form_open('loket/pendaftaran_pasien_ptpn/edit','id="formsimpan_ptpn"','class="form-horizontal"'); ?>
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
                <p><input type="text" name="tanggal_registrasi_ptpn" value="<?php echo $tampil['tanggal_registrasi'];?>" id="tanggal_registrasi_ptpn" class="span3" placeholder="Tanggal Registrasi..." /></p>
                </td>
                <td></td>
                <td></td>
                <td></td>
               
            </tr>
        <tr>
            <td>Nama Lengkap Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_pasien_ptpn" value="<?php echo $tampil['nama_lengkap'];?>"  id="nama_pasien_ptpn" class="span5" size="30" placeholder="Nama Pasien..." ></td>
            <td>Nama Panggilan</td>
            <td>:</td>
            <td><input type="text" name="nama_panggilan_ptpn" value="<?php echo $tampil['nama_panggilan'];?>" placeholder="Nama Panggilan..." class="span3"></td> 
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
                        $("#tanggal_lahir_ptpn").val('<?php echo $tampil['tanggal_lahir'];?>');
                    });
                </script>
                <input id="tempat_lahir_ptpn" value="<?php echo $tampil['tempat_lahir'];?>" class="span3" name="tempat_lahir_ptpn" placeholder="Tempat Lahir..."> / <input type="text" style="width:138px;" name="tanggal_lahir_ptpn" id="tanggal_lahir_ptpn"  placeholder="Tanggal Lahir..."  />
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umur_ptpn" value="<?php echo $tampil['umur'];?>"  class="span3" size="30" placeholder="Umur..." readonly> Tahun </td>
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
            <td><textarea name="alamat_ptpn" id="alamat_ptpn" class="span5" placeholder="Alamat..."><?php echo $tampil['alamat'];?></textarea></td>
            <td>RT / RW</td><td>:</td><td><input type="text" value="<?php echo $tampil['rt'];?>" name="rt_ptpn" id="rt_ptpn" placeholder="RT..." class="span1"> / <input type="text" name="rw_ptpn" value="<?php echo $tampil['rw'];?>" id="rw_ptpn" placeholder="RW..." class="span1"></td>
        </tr>
        <tr>
            <td>Desa</td>
            <td>:</td>
            <td><input type="text" name="desa_ptpn" id="desa_ptpn" value="<?php echo $tampil['desa'];?>"  class="span5" size="30" placeholder="Desa..." > </td>
            <td></td><td></td><td></td>
        </tr>
         <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td><input type="text" name="kecamatan_ptpn" id="kecamatan_ptpn" value="<?php echo $tampil['kecamatan'];?>"  class="span5" size="30" placeholder="Kecamatan..." > </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td>Kota</td>
            <td>:</td>
            <td><input type="text" name="kota_ptpn" id="kota_ptpn"  value="<?php echo $tampil['kota'];?>" class="span5" size="30" placeholder="Kota..." > </td>
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
            <td><input type="text" name="no_identitas_ptpn" value="<?php echo $tampil['no_identitas'];?>" id="no_identitas_ptpn"  class="span5" size="30" placeholder="No Identitas..."> </td>
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
                    <select name="agama_ptpn" id="agama_ptpn" style="width:270px;">
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
                    <select name="pekerjaan_ptpn" id="pekerjaan_ptpn" style="width:270px;">
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
                    <select name="pendidikan_ptpn" id="pendidikan_ptpn" style="width:270px;">
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
            <td>PTPN</td>
            <td>:</td>
            <td>
                    <select name="ptpn" id="ptpn" style="width:270px;">
                        <option value="">==PTPN==</option>
                        <?php
                            foreach ($ptpn->result_array() as $tampil2) {
                                if($tampil['ptpn_id']==$tampil2['id_ptpn']){
                            ?>
                            <option value="<?php echo $tampil2['id_ptpn'];?>-<?php echo $tampil2['nama_ptpn'];?>" selected="selected"><?php echo $tampil2['nama_ptpn'];?></option>
                            <?php
                            }
                            else{
                                ?>
                                <option value="<?php echo $tampil2['id_ptpn'];?>-<?php echo $tampil2['nama_ptpn'];?>"><?php echo $tampil2['nama_ptpn'];?></option>
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
                <td colspan="1"> <?php echo form_button(array('type'=>'button','content'=>'Simpan','name'=>'simpan','id'=>'simpan_ptpn','value'=>'Simpan','class'=>'btn btn-small  '));?>
                <a href="<?php echo base_url();?>loket/pendaftaran_pasien_ptpn"><button type="button" class="btn btn-small">Batal</button></a>
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
