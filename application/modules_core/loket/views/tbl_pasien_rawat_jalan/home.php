

        <script>
                $(document).ready(function(){

                    function kosong() {
                        $("#klinik").val("");
                        $("#id_pasien").val("");
                        $("#id_akun").val("");
                        $("#nama_lengkap").val("");
                        $("#no_rm").val("");
                        $("#umur").val("");
                        $("#jenis_kelamin").val("");
                        $("#alamat").val("");
                        $("#no_hp").val("");
                        $("#nama_penanggung_jawab").val("");
                        $("#no_penanggung_jawab").val("");
                        

                    }

                    $("#simpan").live("click",function(){

                       
                        var klinik = $("#klinik").val();
                        var id_pasien = $("#id_pasien").val();
                        var tgl = $("#tgl").val();
                        var bln = $("#bln").val();
                        var thn = $("#thn").val();
                        var nama_lengkap = $("#nama_lengkap").val();
                        var no_rm = $("#no_rm").val();
                        var umur = $("#umur").val();
                        var jenis_kelamin = $("#jenis_kelamin").val();
                        var alamat = $("#alamat").val();
                        var no_hp = $("#no_hp").val();
                        var nama_penanggung_jawab = $("#nama_penanggung_jawab").val();
                        var no_penanggung_jawab = $("#no_penanggung_jawab").val();
                        /*var hubungan_dengan_pasien = $("#hubungan_dengan_pasien").val();*/

                        var hubungan_dengan_pasien = $('input:radio[name="hubungan_dengan_pasien"]:checked').val();
                       

                        var tahun = thn+"-"+bln+"-"+tgl;



                        if (no_rm=="") {
                            alert('No RM Tidak Boleh Kosong');
                            
                            
                        }
                        else if (nama_penanggung_jawab=="") {
                        alert('Nama Penanggung Jawab Tidak Boleh Kosong');
                        $("#nama_penanggung_jawab").focus();
                        
                        }
                         else if (no_penanggung_jawab=="") {
                        alert('No Penanggung Jawab Tidak Boleh Kosong');
                        $("#no_penanggung_jawab").focus();

                        
                        }
                       /* else if (hubungan_dengan_pasien!="checked") {
                        alert('Hubungan Dengan Pasien Tidak Boleh Kosong');
                        $("#hubungan_dengan_pasien").focus();
                        
                        }*/
                        else if (klinik=="") {
                        alert('Klinik Tidak Boleh Kosong');
                        $("#klinik").focus();
                        
                        }
                        
                        else {

                        $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/tbl_pasien_rawat_jalan/add",
                            data:"klinik="+klinik+"&id_pasien="+id_pasien+"&tahun="+tahun+"&nama_lengkap="+nama_lengkap+"&no_rm="+no_rm+"&umur="+umur+"&jenis_kelamin="+jenis_kelamin+"&alamat="+alamat+"&no_hp="+no_hp+"&nama_penanggung_jawab="+nama_penanggung_jawab+"&no_penanggung_jawab="+no_penanggung_jawab+"&hubungan_dengan_pasien="+hubungan_dengan_pasien,
                            success : function (data) {

                                kosong();
                                alert('Pasien Berhasil Didaftarkan');
                                
                            }


                        });
                    }



                    });

                
                $("#nama_penanggung_jawab").click(function(){

                    
                    var id_pasien = $("#id_pasien").val();
                    var no_rm = $("#no_rm").val();
                    var tgl = $("#tgl").val();
                    var bln = $("#bln").val();
                    var thn = $("#thn").val();
                    var nama_lengkap = $("#nama_lengkap").val();

                    var tahun = thn+"-"+bln+"-"+tgl;

                        $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/tbl_pasien_rawat_jalan/cek",
                            data:"id_pasien="+id_pasien+"&no_rm="+no_rm+"&tahun="+tahun,
                            success : function (data) {

                                if (data>0) {
                                    var retVal = confirm("Pasien dengan nama = "+nama_lengkap+" sudah mendaftar hari ini, Apakah Anda ingin melanjutkan ?");
                                        if( retVal == true ){
                                            $("#nama_penanggung_jawab").focus();
                                            return true;
                                        }else{
                                            kosong();
                                            alert("Anda memutuskan tidak melanjutkan proses registrasi dengan nama pasien="+nama_lengkap+" " );
                                            return false;
                                        }
                                }
                                else {
                                    $("#nama_penanggung_jawab").focus();
                                }
                            }


                        });



                });

                
                /*$("#no_penanggung_jawab").keyup(function(){

                    var no_penanggung_jawab = $("#no_penanggung_jawab").val();
                    if (isNaN(no_penanggung_jawab.value) == true)
                    {
                    alert("Harus angka");
                    $("#no_penanggung_jawab").focus();
                }


                });*/
                    
                    
                    
                   


                   


                    
                   $("#daftar").live("click",function(){
                 
                   var id_pasien=$(this).attr("id_pasien");
                   var no_rm=$(this).attr("no_rm");
                   var nama_lengkap = $(this).attr("nama_lengkap");
                   var umur = $(this).attr("umur");
                   var jenis_kelamin = $(this).attr("jenis_kelamin");
                   var alamat = $(this).attr("alamat");
                   var no_hp = $(this).attr("no_hp");
                  
                   //var noreg = $(this).attr("noreg");
                   /*var tglregistrasi=$(this).attr("tglregistrasi");*/
                   $("#no_rm").val (no_rm);
                   $("#nama_lengkap").val (nama_lengkap);
                   $("#umur").val (umur);
                   $("#jenis_kelamin").val (jenis_kelamin);
                   $("#alamat").val (alamat);
                   $("#no_hp").val (no_hp);
                   $("#id_pasien").val (id_pasien);
                  
                   });//end off daftar admission

                    $("#btn-cari").click(function(){
                        var kata_kunci=$("#kata_kunci").val();
                        if(kata_kunci==""){
                            alert("Kata kunci tidak boleh kosong!!!");
                        }
                        else{
                            $.ajax({
                            type:"POST",
                            url:"<?php echo base_url();?>loket/tbl_pasien_rawat_jalan/cari_pasien",
                            data:"kata_kunci="+kata_kunci,
                            success:function(data){
                                $("#tampil_cari").show();
                                $("#tampil_cari").html(data);
                            }
                        });
                        }
                    });
                    $("#cari_pasien").click(function(){
                        $("#tampil_cari").hide();
                        $("#kata_kunci").val("");
                    })
                });
    </script>
  


        <div id="myModal" class="modal_lebar hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Pencarian Data Pasien</h3>
            </div>
            <div class="modal-body">
                    <div class="input-append">
                        <input class="span2" id="kata_kunci" type="text">
                        <button class="btn" id="btn-cari" type="button"><i class="icon icon-search"></i> Cari</button>
                    </div>
                    <hr>
                    <div id="tampil_cari"></div>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Batal</button>
            </div>
          </div>
          <div class="bs-docs-example" style="padding-bottom: 24px;">
            <a data-toggle="modal" href="#myModal" id="cari_pasien" class="btn btn-primary btn-large" style="float:right; margin-right:20px;"><i class="icon icon-search icon-white"></i> Cari Pasien</a>
        </div>

<div id="real">
  <div id="statusdonor">
    

    


   
    <table class="table table-striped">
      <thead></thead>
      <tbody>
       
        
        <tr>
                <td style="width:30%">Tanggal Registrasi</td>
                <td>:</td>
                <td style="width:50%">
                    <?php
                      echo "<select name='tgl' id=tgl style=width:60px;>";
                        for($i=1; $i<=31; $i++){
                        if($i==date('d')){
                            if(strlen($i)==1){
                            echo "<option selected=selected value=0$i>0$i</option>";
                            }else{
                            echo "<option selected=selected value=$i>$i</option>";
                            }

                        }else {
                            if(strlen($i)==1){
                            echo "<option value=0$i>0$i</option>";
                            }else{
                            echo "<option value=$i>$i</option>";
                            }

                        }
                      }
                        echo "</select>";
                    ?>

                    <?php
                        echo "<select name='bln' id=bln style=width:105px;>";
                        $bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",);
                    for($bln=1;$bln<=12; $bln++){

                        if($bln==date('m')){
                            if(strlen($bln)==1){
                            echo "<option selected=selected value=0$bln>$bulan[$bln]</option>";
                            }else{
                            echo "<option selected=selected value=$bln>$bulan[$bln]</option>";
                            }

                        }else {
                            if(strlen($bln)==1){
                            echo "<option value=0$bln>$bulan[$bln]</option>";
                            }else{
                            echo "<option value=$bln>$bulan[$bln]</option>";
                            }
                              
                        }
                    }

                        echo "</select>";
                    ?>
                      
                    <?php
                        echo "<select name='thn' id=thn style=width:83px;>";
                    for($thn=1900; $thn<=date("Y"); $thn++){

                        if($thn==date('Y')){
                            
                            echo "<option selected=selected value=$thn>$thn</option>";

                        }else {
                            echo "<option value=$thn>$thn</option>";
                        
                        }
                    }
                        echo "</select>"
                    ?>
                </td>
                 <td ></td> 
               
            </tr>

       


        <tr>
            <td>No RM</td>
            <td>:</td>
            <td><input type="text" name="no_rm" id="no_rm" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>


        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_lengkap" value="" id="nama_lengkap" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>

        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umur" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td>  
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><input type="text" name="jenis_kelamin" id="jenis_kelamin" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" id="alamat" value="" class="span3" size="30" readonly="readonly"></td>
           <td ></td> 
        </tr>
        <tr>
            <td>No HP</td>
            <td>:</td>
            <td><input type="text" name="no_hp" id="no_hp" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>
        <tr>
            <td>Nama Penanggung Jawab</td>
            <td>:</td>
            <td><input type="text" name="nama_penanggung_jawab" id="nama_penanggung_jawab" value="" class="span3" size="30" ></td>
            <td ></td>  
        </tr>
         <tr>
            <td>No Tlp/Hp Penanggung</td>
            <td>:</td>
            <td><input type="text" name="no_penanggung_jawab" id="no_penanggung_jawab" value="" class="span3" size="30" maxlength="13" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" ></td>
            <td ></td>  
        </tr>
        <tr>
            <td>Hubungan Dengan Pasien</td>
            <td>:</td>
            <td>
                <input type="radio" id="hubungan_dengan_pasien" name="hubungan_dengan_pasien" value="Orang Tua Pasien"  checked="true"/> Orang Tua Pasien
                <input type="radio" id="hubungan_dengan_pasien" name="hubungan_dengan_pasien" value="Anak Pasien"  /> Anak Pasien
                <input type="radio" id="hubungan_dengan_pasien" name="hubungan_dengan_pasien" value="Teman"  /> Teman</br>
                <input type="radio" id="hubungan_dengan_pasien" name="hubungan_dengan_pasien" value="Suami/Istri"  /> Suami/Istri
                <input type="radio" id="hubungan_dengan_pasien" name="hubungan_dengan_pasien" value="Keluarga Pasien"  /> Keluarga Pasien
                <input type="radio" id="hubungan_dengan_pasien" name="hubungan_dengan_pasien" value="Lain-lain"  /> Lain-lain
            </td>
            <td ></td>  
        </tr>
        <tr>
            <td>Unit Layanan</td>
            <td>:</td>
             <td>
                <select name="klinik_id"  id="klinik" style="width: 255px">
                    <option value="">--Pilih Klinik--</option>
                    <?php
                            foreach ($admission_klinik as $k){
                            echo "<option value='$k[id]'>$k[nama_klinik]</option>"; 
                            }           
                    ?>
                    </select>
            </td>
            <td ></td>  
        </tr>



        <input type="hidden" name="pasien_id" id="id_pasien"  >

      

        

        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> 
                    <button type="submit" value="Simpan" class="btn btn-small" id="simpan">Simpan</button>
                </td>
                <td>&nbsp;</td>
                
            </tr>



           
            
            

      </tbody>

    </table>
    

  </div>
</div>


    