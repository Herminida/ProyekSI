

        <script>
                $(document).ready(function(){

                    function kosongb() {
                       
                        $("#id_pasienb").val("");
                        $("#id_akunb").val("");
                        $("#nama_lengkapb").val("");
                        $("#no_rmb").val("");
                        $("#umurb").val("");
                        $("#jenis_kelaminb").val("");
                        $("#alamatb").val("");
                        $("#no_hpb").val("");
                        $("#nama_penanggung_jawabb").val("");
                        $("#no_penanggung_jawabb").val("");
                        

                    }

                    $("#simpanb").click(function(){
                        
                        var id_pasienb = $("#id_pasienb").val();
                        var tglb = $("#tglb").val();
                        var blnb = $("#blnb").val();
                        var thnb = $("#thnb").val();
                        var nama_lengkapb = $("#nama_lengkapb").val();
                        var no_rmb = $("#no_rmb").val();
                        var umurb = $("#umurb").val();
                        var jenis_kelaminb = $("#jenis_kelaminb").val();
                        var alamatb = $("#alamatb").val();
                        var no_hpb = $("#no_hpb").val();
                        var nama_penanggung_jawabb = $("#nama_penanggung_jawabb").val();
                        var no_penanggung_jawabb = $("#no_penanggung_jawabb").val();
                        /*var hubungan_dengan_pasien = $("#hubungan_dengan_pasien").val();*/

                        var hubungan_dengan_pasienb = $('input:radio[name="hubungan_dengan_pasienb"]:checked').val();
                       

                        var tahunb = thnb+"-"+blnb+"-"+tglb;



                        if (no_rmb=="") {
                            alert('No RM Tidak Boleh Kosong');
                            
                            
                        }
                        else if (nama_penanggung_jawabb=="") {
                        alert('Nama Penanggung Jawab Tidak Boleh Kosong');
                        $("#nama_penanggung_jawabb").focus();
                        
                        }
                         else if (no_penanggung_jawabb=="") {
                        alert('No Penanggung Jawab Tidak Boleh Kosong');
                        $("#no_penanggung_jawabb").focus();

                        
                        }
                       /* else if (hubungan_dengan_pasien!="checked") {
                        alert('Hubungan Dengan Pasien Tidak Boleh Kosong');
                        $("#hubungan_dengan_pasien").focus();
                        
                        }*/
                        
                         else {

                        $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/tbl_pasien_kebidanan/add",
                            data:"id_pasienb="+id_pasienb+"&tahunb="+tahunb+"&nama_lengkapb="+nama_lengkapb+"&no_rmb="+no_rmb+"&umurb="+umurb+"&jenis_kelaminb="+jenis_kelaminb+"&alamatb="+alamatb+"&no_hpb="+no_hpb+"&nama_penanggung_jawabb="+nama_penanggung_jawabb+"&no_penanggung_jawabb="+no_penanggung_jawabb+"&hubungan_dengan_pasienb="+hubungan_dengan_pasienb,
                            success : function (data) {

                                kosongb();
                                alert('Pasien Berhasil Didaftarkan');
                                
                            }


                        });
                    }



                    });

                
                $("#nama_penanggung_jawabb").click(function(){

                    
                    var id_pasienb = $("#id_pasienb").val();
                    var no_rmb = $("#no_rmb").val();
                    var tglb = $("#tglb").val();
                    var blnb = $("#blnb").val();
                    var thnb = $("#thnb").val();
                    var nama_lengkapb = $("#nama_lengkapb").val();

                    var tahunb = thnb+"-"+blnb+"-"+tglb;

                        $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/tbl_pasien_kebidanan/cek",
                            data:"id_pasienb="+id_pasienb+"&no_rmb="+no_rmb+"&tahunb="+tahunb,
                            success : function (data) {

                                if (data>0) {
                                    var retVal = confirm("Pasien dengan nama = "+nama_lengkapb+" sudah mendaftar hari ini, Apakah Anda ingin melanjutkan ?");
                                        if( retVal == true ){
                                            $("#nama_penanggung_jawabb").focus();
                                            return true;
                                        }else{
                                            kosongb();
                                            alert("Anda memutuskan tidak melanjutkan proses registrasi dengan nama pasien="+nama_lengkapb+" " );
                                            return false;
                                        }
                                }
                                else {
                                    $("#nama_penanggung_jawabb").focus();
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
                    
                    
                    
                   


                   


                    
                   $("#daftarb").live("click",function(){
                 
                   var id_pasien=$(this).attr("id_pasienb");
                   var no_rm=$(this).attr("no_rmb");
                   var nama_lengkap = $(this).attr("nama_lengkapb");
                   var umur = $(this).attr("umurb");
                   var jenis_kelamin = $(this).attr("jenis_kelaminb");
                   var alamat = $(this).attr("alamatb");
                   var no_hp = $(this).attr("no_hpb");
                  
                   //var noreg = $(this).attr("noreg");
                   /*var tglregistrasi=$(this).attr("tglregistrasi");*/
                   $("#no_rmb").val (no_rm);
                   $("#nama_lengkapb").val (nama_lengkap);
                   $("#umurb").val (umur);
                   $("#jenis_kelaminb").val (jenis_kelamin);
                   $("#alamatb").val (alamat);
                   $("#no_hpb").val (no_hp);
                   $("#id_pasienb").val (id_pasien);
                  
                   });//end off daftar admission

                    $("#btn-carib").click(function(){
                        var kata_kunci=$("#kata_kuncib").val();
                        if(kata_kunci==""){
                            alert("Kata kunci tidak boleh kosong!!!");
                        }
                        else{
                            $.ajax({
                            type:"POST",
                            url:"<?php echo base_url();?>loket/tbl_pasien_kebidanan/cari_pasien",
                            data:"kata_kunci="+kata_kunci,
                            success:function(data){
                                $("#tampil_carib").show();
                                $("#tampil_carib").html(data);
                            }
                        });
                        }
                    });
                    $("#cari_pasienb").click(function(){
                       
                        $("#tampil_carib").hide();
                        $("#kata_kuncib").val("");
                    })
                });
    </script>
  


        <div id="myModalb" class="modal_lebar hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Pencarian Data Pasien</h3>
            </div>
            <div class="modal-body">
                    <div class="input-append">
                        <input class="span2" id="kata_kuncib" type="text">
                        <button class="btn" id="btn-carib" type="button"><i class="icon icon-search"></i> Cari</button>
                    </div>
                    <hr>
                    <div id="tampil_carib"></div>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Batal</button>
            </div>
          </div>
          <div class="bs-docs-example" style="padding-bottom: 24px;">
            <a data-toggle="modal" href="#myModalb" id="cari_pasienb" class="btn btn-primary btn-large" style="float:right; margin-right:20px;"><i class="icon icon-search icon-white"></i> Cari Pasien</a>
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
                      echo "<select name='tgl' id=tglb style=width:60px;>";
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
                        echo "<select name='bln' id=blnb style=width:105px;>";
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
                        echo "<select name='thn' id=thnb style=width:83px;>";
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
            <td><input type="text" name="no_rm" id="no_rmb" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>


        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_lengkap" value="" id="nama_lengkapb" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>

        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umurb" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td>  
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><input type="text" name="jenis_kelamin" id="jenis_kelaminb" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" id="alamatb" value="" class="span3" size="30" readonly="readonly"></td>
           <td ></td> 
        </tr>
        <tr>
            <td>No HP</td>
            <td>:</td>
            <td><input type="text" name="no_hp" id="no_hpb" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>
        <tr>
            <td>Nama Penanggung Jawab</td>
            <td>:</td>
            <td><input type="text" name="nama_penanggung_jawab" id="nama_penanggung_jawabb" value="" class="span3" size="30" ></td>
            <td ></td>  
        </tr>
         <tr>
            <td>No Tlp/Hp Penanggung</td>
            <td>:</td>
            <td><input type="text" name="no_penanggung_jawab" id="no_penanggung_jawabb" value="" class="span3" size="30" maxlength="13" onkeydown="return ( event.ctrlKey || event.altKey 
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
                <input type="radio" id="hubungan_dengan_pasienb" name="hubungan_dengan_pasienb" value="Orang Tua Pasien"  checked="true"/> Orang Tua Pasien
                <input type="radio" id="hubungan_dengan_pasienb" name="hubungan_dengan_pasienb" value="Anak Pasien"  /> Anak Pasien
                <input type="radio" id="hubungan_dengan_pasienb" name="hubungan_dengan_pasienb" value="Teman"  /> Teman</br>
                <input type="radio" id="hubungan_dengan_pasienb" name="hubungan_dengan_pasienb" value="Suami/Istri"  /> Suami/Istri
                <input type="radio" id="hubungan_dengan_pasienb" name="hubungan_dengan_pasienb" value="Keluarga Pasien"  /> Keluarga Pasien
                <input type="radio" id="hubungan_dengan_pasienb" name="hubungan_dengan_pasienb" value="Lain-lain"  /> Lain-lain
            </td>
            <td ></td>  
        </tr>
        



        <input type="hidden" name="pasien_id" id="id_pasienb"  >

      

        

        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> 
                    <button type="submit" value="Simpan" class="btn btn-small" id="simpanb">Simpan</button>
                </td>
                <td>&nbsp;</td>
                
            </tr>



           
            
            

      </tbody>

    </table>
    

  </div>
</div>


    