

        <script>
                $(document).ready(function(){

                    function kosongp() {
                        $("#pendukungp").val("");
                        $("#id_pasienp").val("");
                        $("#id_akunp").val("");
                        $("#nama_lengkapp").val("");
                        $("#no_rmp").val("");
                        $("#umurp").val("");
                        $("#jenis_kelaminp").val("");
                        $("#alamatp").val("");
                        $("#no_hpp").val("");
                        $("#nama_penanggung_jawabp").val("");
                        $("#no_penanggung_jawabp").val("");
                        

                    }

                    $("#simpanp").live("click",function(){

                       
                        var pendukungp = $("#pendukungp").val();
                        var id_pasienp = $("#id_pasienp").val();
                        var tglp = $("#tglp").val();
                        var blnp = $("#blnp").val();
                        var thnp = $("#thnp").val();
                        var nama_lengkapp = $("#nama_lengkapp").val();
                        var no_rmp = $("#no_rmp").val();
                        var umurp = $("#umurp").val();
                        var jenis_kelaminp = $("#jenis_kelaminp").val();
                        var alamatp = $("#alamatp").val();
                        var no_hpp = $("#no_hpp").val();
                        var nama_penanggung_jawabp = $("#nama_penanggung_jawabp").val();
                        var no_penanggung_jawabp = $("#no_penanggung_jawabp").val();
                        /*var hubungan_dengan_pasien = $("#hubungan_dengan_pasien").val();*/

                        var hubungan_dengan_pasienp = $('input:radio[name="hubungan_dengan_pasienp"]:checked').val();
                       

                        var tahunp = thnp+"-"+blnp+"-"+tglp;



                        if (no_rmp=="") {
                            alert('No RM Tidak Boleh Kosong');
                            
                            
                        }
                        else if (nama_penanggung_jawabp=="") {
                        alert('Nama Penanggung Jawab Tidak Boleh Kosong');
                        $("#nama_penanggung_jawabp").focus();
                        
                        }
                         else if (no_penanggung_jawabp=="") {
                        alert('No Penanggung Jawab Tidak Boleh Kosong');
                        $("#no_penanggung_jawabp").focus();

                        
                        }
                       /* else if (hubungan_dengan_pasien!="checked") {
                        alert('Hubungan Dengan Pasien Tidak Boleh Kosong');
                        $("#hubungan_dengan_pasien").focus();
                        
                        }*/
                        else if (pendukungp=="") {
                        alert('Pendukung Tidak Boleh Kosong');
                        $("#pendukungp").focus();
                        
                        }
                        
                        else {

                        $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/tbl_pasien_pendukung/add",
                            data:"pendukungp="+pendukungp+"&id_pasienp="+id_pasienp+"&tahunp="+tahunp+"&nama_lengkapp="+nama_lengkapp+"&no_rmp="+no_rmp+"&umurp="+umurp+"&jenis_kelaminp="+jenis_kelaminp+"&alamatp="+alamatp+"&no_hpp="+no_hpp+"&nama_penanggung_jawabp="+nama_penanggung_jawabp+"&no_penanggung_jawabp="+no_penanggung_jawabp+"&hubungan_dengan_pasienp="+hubungan_dengan_pasienp,
                            success : function (data) {

                                kosongp();
                                alert('Pasien Berhasil Didaftarkan');
                                
                            }


                        });
                    }



                    });

                
                $("#nama_penanggung_jawabp").click(function(){

                    
                    var id_pasienp = $("#id_pasienp").val();
                    var no_rmp = $("#no_rmp").val();
                    var tglp = $("#tglp").val();
                    var blnp = $("#blnp").val();
                    var thnp = $("#thnp").val();
                    var nama_lengkapp = $("#nama_lengkapp").val();

                    var tahunp = thnp+"-"+blnp+"-"+tglp;

                        $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/tbl_pasien_pendukung/cek",
                            data:"id_pasienp="+id_pasienp+"&no_rmp="+no_rmp+"&tahunp="+tahunp,
                            success : function (data) {

                                if (data>0) {
                                    var retVal = confirm("Pasien dengan nama = "+nama_lengkapp+" sudah mendaftar hari ini, Apakah Anda ingin melanjutkan ?");
                                        if( retVal == true ){
                                            $("#nama_penanggung_jawabp").focus();
                                            return true;
                                        }else{
                                            kosong();
                                            alert("Anda memutuskan tidak melanjutkan proses registrasi dengan nama pasien="+nama_lengkapp+" " );
                                            return false;
                                        }
                                }
                                else {
                                    $("#nama_penanggung_jawabp").focus();
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
                    
                    
                    
                   


                   


                    
                   $("#daftarp").live("click",function(){
                 
                   var id_pasien=$(this).attr("id_pasienp");
                   var no_rm=$(this).attr("no_rmp");
                   var nama_lengkap = $(this).attr("nama_lengkapp");
                   var umur = $(this).attr("umurp");
                   var jenis_kelamin = $(this).attr("jenis_kelaminp");
                   var alamat = $(this).attr("alamatp");
                   var no_hp = $(this).attr("no_hpp");
                  
                   //var noreg = $(this).attr("noreg");
                   /*var tglregistrasi=$(this).attr("tglregistrasi");*/
                   $("#no_rmp").val (no_rm);
                   $("#nama_lengkapp").val (nama_lengkap);
                   $("#umurp").val (umur);
                   $("#jenis_kelaminp").val (jenis_kelamin);
                   $("#alamatp").val (alamat);
                   $("#no_hpp").val (no_hp);
                   $("#id_pasienp").val (id_pasien);
                  
                   });//end off daftar admission

                     $("#btn-carip").click(function(){
                        var kata_kunci=$("#kata_kuncip").val();
                        if(kata_kunci==""){
                            alert("Kata kunci tidak boleh kosong!!!");
                            $("#kata_kuncip").focus();
                        }
                        else{
                            $.ajax({
                            type:"POST",
                            url:"<?php echo base_url();?>loket/tbl_pasien_pendukung/cari_pasien",
                            data:"kata_kunci="+kata_kunci,
                            success:function(data){
                                $("#tampil_carip").show();
                                $("#tampil_carip").html(data);
                            }
                        });
                        }
                    });
                    $("#cari_pasienp").click(function(){
                         
                        $("#tampil_carip").hide();
                        $("#kata_kuncip").val("");
                    })
                });
    </script>
  


        <div id="myModalp" class="modal_lebar hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Pencarian Data Pasien</h3>
            </div>
            <div class="modal-body">
                    <div class="input-append">
                        <input class="span2" id="kata_kuncip" type="text">
                        <button class="btn" id="btn-carip" type="button"><i class="icon icon-search"></i> Cari</button>
                    </div>
                    <hr>
                    <div id="tampil_carip"></div>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Batal</button>
            </div>
          </div>
          <div class="bs-docs-example" style="padding-bottom: 24px;">
            <a data-toggle="modal" href="#myModalp" id="cari_pasienp" class="btn btn-primary btn-large" style="float:right; margin-right:20px;"><i class="icon icon-search icon-white"></i> Cari Pasien</a>
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
                      echo "<select name='tgl' id=tglp style=width:60px;>";
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
                        echo "<select name='bln' id=blnp style=width:105px;>";
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
                        echo "<select name='thn' id=thnp style=width:83px;>";
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
            <td><input type="text" name="no_rm" id="no_rmp" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>


        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_lengkap" value="" id="nama_lengkapp" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>

        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umurp" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td>  
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><input type="text" name="jenis_kelamin" id="jenis_kelaminp" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" id="alamatp" value="" class="span3" size="30" readonly="readonly"></td>
           <td ></td> 
        </tr>
        <tr>
            <td>No HP</td>
            <td>:</td>
            <td><input type="text" name="no_hp" id="no_hpp" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>
        <tr>
            <td>Nama Penanggung Jawab</td>
            <td>:</td>
            <td><input type="text" name="nama_penanggung_jawab" id="nama_penanggung_jawabp" value="" class="span3" size="30" ></td>
            <td ></td>  
        </tr>
         <tr>
            <td>No Tlp/Hp Penanggung</td>
            <td>:</td>
            <td><input type="text" name="no_penanggung_jawab" id="no_penanggung_jawabp" value="" class="span3" size="30" maxlength="13" onkeydown="return ( event.ctrlKey || event.altKey 
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
                <input type="radio" id="hubungan_dengan_pasienp" name="hubungan_dengan_pasienp" value="Orang Tua Pasien"  checked="true"/> Orang Tua Pasien
                <input type="radio" id="hubungan_dengan_pasienp" name="hubungan_dengan_pasienp" value="Anak Pasien"  /> Anak Pasien
                <input type="radio" id="hubungan_dengan_pasienp" name="hubungan_dengan_pasienp" value="Teman"  /> Teman</br>
                <input type="radio" id="hubungan_dengan_pasienp" name="hubungan_dengan_pasienp" value="Suami/Istri"  /> Suami/Istri
                <input type="radio" id="hubungan_dengan_pasienp" name="hubungan_dengan_pasienp" value="Keluarga Pasien"  /> Keluarga Pasien
                <input type="radio" id="hubungan_dengan_pasienp" name="hubungan_dengan_pasienp" value="Lain-lain"  /> Lain-lain
            </td>
            <td ></td>  
        </tr>
        <tr>
            <td>Pendukung</td>
            <td>:</td>
             <td>
                <select name="pendukung_id"  id="pendukungp" style="width: 255px">
                    <option value="">--Pilih Pendukung--</option>
                    <?php
                            foreach ($data_pendukung as $k){
                            echo "<option value='$k[id_pendukung]'>$k[nama_pendukung]</option>"; 
                            }           
                    ?>
                    </select>
            </td>
            <td ></td>  
        </tr>



        <input type="hidden" name="pasien_id" id="id_pasienp"  >

      

        

        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> 
                    <button type="submit" value="Simpan" class="btn btn-small" id="simpanp">Simpan</button>
                </td>
                <td>&nbsp;</td>
                
            </tr>



           
            
            

      </tbody>

    </table>
    

  </div>
</div>


    