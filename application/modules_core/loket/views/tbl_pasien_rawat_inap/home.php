

        <script>
                $(document).ready(function(){

                    function kosongi() {
                        /*$("#kliniki").val("");*/
                        $("#id_pasieni").val("");
                        $("#id_akuni").val("");
                        $("#nama_lengkapi").val("");
                        $("#no_rmi").val("");
                        $("#umuri").val("");
                        $("#jenis_kelamini").val("");
                        $("#alamati").val("");
                        $("#no_hpi").val("");
                        $("#nama_penanggung_jawabi").val("");
                        $("#no_penanggung_jawabi").val("");
                        $("#nama_kelas_kamark").val("");
                        $("#nama_ruang_kamark").val("");
                        $("#ruang_kamar_id2").val("");
                        

                    }

                    $("#simpani").live("click",function(){

                       
                        /*var kliniki = $("#kliniki").val();*/
                        var id_pasieni = $("#id_pasieni").val();
                        var tgli = $("#tgli").val();
                        var blni = $("#blni").val();
                        var thni = $("#thni").val();
                        var nama_lengkapi = $("#nama_lengkapi").val();
                        var no_rmi = $("#no_rmi").val();
                        var umuri = $("#umuri").val();
                        var jenis_kelamini = $("#jenis_kelamini").val();
                        var alamati = $("#alamati").val();
                        var no_hpi = $("#no_hpi").val();
                        var nama_penanggung_jawabi = $("#nama_penanggung_jawabi").val();
                        var no_penanggung_jawabi = $("#no_penanggung_jawabi").val();
                        /*var hubungan_dengan_pasien = $("#hubungan_dengan_pasien").val();*/

                        var hubungan_dengan_pasieni = $('input:radio[name="hubungan_dengan_pasieni"]:checked').val();
                       

                        var tahuni = thni+"-"+blni+"-"+tgli;
                        var nama_kelas_kamark = $("#nama_kelas_kamark").val();
                        var kelas_kamar_idk = $("#kelas_kamar_idk").val();
                        var nama_ruang_kamark = $("#nama_ruang_kamark").val();
                        var ruang_kamar_idk = $("#ruang_kamar_idk").val();
                        var ruang_kamar_id2 = $("#ruang_kamar_id2").val();
                        var statusk = $("#statusk").val();



                        if (no_rmi=="") {
                            alert('No RM Tidak Boleh Kosong');
                            
                            
                        }
                        else if (nama_penanggung_jawabi=="") {
                        alert('Nama Penanggung Jawab Tidak Boleh Kosong');
                        $("#nama_penanggung_jawabi").focus();
                        
                        }
                         else if (no_penanggung_jawabi=="") {
                        alert('No Penanggung Jawab Tidak Boleh Kosong');
                        $("#no_penanggung_jawabi").focus();

                        
                        }
                       /* else if (hubungan_dengan_pasien!="checked") {
                        alert('Hubungan Dengan Pasien Tidak Boleh Kosong');
                        $("#hubungan_dengan_pasien").focus();
                        
                        }*/
                        /*else if (kliniki=="") {
                        alert('Klinik Tidak Boleh Kosong');
                        $("#kliniki").focus();
                        
                        }*/
                        else if (nama_kelas_kamark=="") {
                        alert('Kelas Kamar Tidak Boleh Kosong');
                        $("#nama_kelas_kamark").focus();
                        
                        }
                        else if (nama_ruang_kamark=="") {
                        alert('Ruang Kamar Tidak Boleh Kosong');
                        $("#nama_kelas_kamark").focus();
                        
                        }
                        
                        else {

                        $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/tbl_pasien_rawat_inap/add",
                            data:"id_pasieni="+id_pasieni+"&tahuni="+tahuni+"&nama_lengkapi="+nama_lengkapi+"&no_rmi="+no_rmi+"&umuri="+umuri+"&jenis_kelamini="+jenis_kelamini+"&alamati="+alamati+"&no_hpi="+no_hpi+"&nama_penanggung_jawabi="+nama_penanggung_jawabi+"&no_penanggung_jawabi="+no_penanggung_jawabi+"&hubungan_dengan_pasieni="+hubungan_dengan_pasieni+"&kelas_kamar_idk="+kelas_kamar_idk+"&nama_kelas_kamark="+nama_kelas_kamark+"&ruang_kamar_idk="+ruang_kamar_idk+"&nama_ruang_kamark="+nama_ruang_kamark+"&ruang_kamar_id2="+ruang_kamar_id2,
                            success : function (data) {



                                kosongi();
                                alert('Pasien Berhasil Didaftarkan');
                                $("#no_penanggung_jawabi").focus();
                                
                            }


                        });
                    }



                    });

                
                $("#nama_penanggung_jawabi").click(function(){

                    
                    var id_pasieni = $("#id_pasieni").val();
                    var no_rmi = $("#no_rmi").val();
                    var nama_lengkapi = $("#nama_lengkapi").val();

                    

                        $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/tbl_pasien_rawat_inap/cek",
                            data:"id_pasieni="+id_pasieni+"&no_rmi="+no_rmi,
                            success : function (data) {

                                 if (data>0) {
                                 
                                            kosongi();
                                            alert("Pasien dengan nama "+nama_lengkapi+" sudah terdaftar di rawat inap " );
                                            $("#cari_pasieni").focus();
                                       
                                }
                                else {
                                    $("#nama_penanggung_jawab").focus();
                                }
                            }
                            


                        });



                });

                
               /* $("#no_penanggung_jawabi").click(function(){

                    var ruang_kamar_id2 = $("#ruang_kamar_id2").val();

                     $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/tbl_pasien_rawat_inap/updatekamarpakai",
                            data:"ruang_kamar_id2="+ruang_kamar_id2,
                            success : function (data) {

                               
                            }


                        });

                });*/

                
                /*$("#no_penanggung_jawab").keyup(function(){

                    var no_penanggung_jawab = $("#no_penanggung_jawab").val();
                    if (isNaN(no_penanggung_jawab.value) == true)
                    {
                    alert("Harus angka");
                    $("#no_penanggung_jawab").focus();
                }


                });*/
                    
                    
                    
                   


                   


                    
                   $("#daftari").live("click",function(){
                 
                   var id_pasien=$(this).attr("id_pasieni");
                   var no_rm=$(this).attr("no_rmi");
                   var nama_lengkap = $(this).attr("nama_lengkapi");
                   var umur = $(this).attr("umuri");
                   var jenis_kelamin = $(this).attr("jenis_kelamini");
                   var alamat = $(this).attr("alamati");
                   var no_hp = $(this).attr("no_hpi");
                  
                   //var noreg = $(this).attr("noreg");
                   /*var tglregistrasi=$(this).attr("tglregistrasi");*/
                   $("#no_rmi").val (no_rm);
                   $("#nama_lengkapi").val (nama_lengkap);
                   $("#umuri").val (umur);
                   $("#jenis_kelamini").val (jenis_kelamin);
                   $("#alamati").val (alamat);
                   $("#no_hpi").val (no_hp);
                   $("#id_pasieni").val (id_pasien);
                  
                   });//pasien


                   $("#daftark").live("click",function(){
                 
                   var id_ruang_kamar=$(this).attr("id_ruang_kamark");
                   var id_ruang_kamar2=$(this).attr("id_ruang_kamar2");
                   var nama_ruang_kamar=$(this).attr("nama_ruang_kamark");
                   var kelas_kamar_id = $(this).attr("kelas_kamar_idk");
                   var nama_kelas_kamar = $(this).attr("nama_kelas_kamark");
                   var status = $(this).attr("statusk");
                   
                  
                   //var noreg = $(this).attr("noreg");
                   /*var tglregistrasi=$(this).attr("tglregistrasi");*/
                   $("#kelas_kamar_idk").val (kelas_kamar_id);
                   $("#nama_kelas_kamark").val (nama_kelas_kamar);
                   $("#ruang_kamar_idk").val (id_ruang_kamar);
                   $("#ruang_kamar_id2").val (id_ruang_kamar2);
                   $("#nama_ruang_kamark").val (nama_ruang_kamar);
                   $("#statusk").val (status);
                  
                   
                  
                   });//kamar pasien

                    $("#btn-carii").click(function(){
                        var kata_kunci=$("#kata_kuncii").val();
                        if(kata_kunci==""){
                            alert("Kata kunci tidak boleh kosong!!!");
                             $("#kata_kuncii").focus();
                        }
                        else{
                            $.ajax({
                            type:"POST",
                            url:"<?php echo base_url();?>loket/tbl_pasien_rawat_inap/cari_pasien",
                            data:"kata_kunci="+kata_kunci,
                            success:function(data){
                                $("#tampil_carii").show();
                                $("#tampil_carii").html(data);
                            }
                        });
                        }
                    });
                    $("#cari_pasieni").click(function(){
                        $("#tampil_carii").hide();
                        $("#kata_kuncii").val("");
                    });

                     $("#cari_pasienk").click(function(){
                         $.ajax({
                            type:"POST",
                            url:"<?php echo base_url();?>loket/tbl_pasien_rawat_inap/get_kamar",
                            data:"",
                            success:function(data){
                                $("#tampil_carik").show();
                                $("#tampil_carik").html(data);
                            }
                        });
                    });
                });
    </script>
  


        <div id="myModali" class="modal_lebar hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Pencarian Data Pasien</h3>
            </div>
            <div class="modal-body">
                    <div class="input-append">
                        <input class="span2" id="kata_kuncii" type="text">
                        <button class="btn" id="btn-carii" type="button"><i class="icon icon-search"></i> Cari</button>
                    </div>
                    <hr>
                    <div id="tampil_carii"></div>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Batal</button>
            </div>
          </div>


          <div class="bs-docs-example" style="padding-bottom: 24px;">
            <a data-toggle="modal" href="#myModali" id="cari_pasieni" class="btn btn-primary btn-large" style="float:right; margin-right:20px;"><i class="icon icon-search icon-white"></i> Cari Pasien</a>
        </div>

        <div id="myModalk" class="modal_lebar hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Pencarian Data Kamar</h3>
            </div>
            <div class="modal-body">
                    
                    <hr>
                    <div id="tampil_carik"></div>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Batal</button>
            </div>
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
                      echo "<select name='tgl' id=tgli style=width:60px;>";
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
                        echo "<select name='bln' id=blni style=width:105px;>";
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
                        echo "<select name='thn' id=thni style=width:83px;>";
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
            <td><input type="text" name="no_rm" id="no_rmi" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>


        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_lengkap" value="" id="nama_lengkapi" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>

        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umuri" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td>  
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><input type="text" name="jenis_kelamin" id="jenis_kelamini" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" id="alamati" value="" class="span3" size="30" readonly="readonly"></td>
           <td ></td> 
        </tr>
        <tr>
            <td>No HP</td>
            <td>:</td>
            <td><input type="text" name="no_hp" id="no_hpi" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>
        
        <tr>
            <td>Nama Penanggung Jawab</td>
            <td>:</td>
            <td><input type="text" name="nama_penanggung_jawab" id="nama_penanggung_jawabi" value="" class="span3" size="30" ></td>
            <td ></td>  
        </tr>
         <tr>
            <td>No Tlp/Hp Penanggung</td>
            <td>:</td>
            <td><input type="text" name="no_penanggung_jawab" id="no_penanggung_jawabi" value="" class="span3" size="30" maxlength="13" onkeydown="return ( event.ctrlKey || event.altKey 
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
                <input type="radio" id="hubungan_dengan_pasieni" name="hubungan_dengan_pasieni" value="Orang Tua Pasien"  checked="true"/> Orang Tua Pasien
                <input type="radio" id="hubungan_dengan_pasieni" name="hubungan_dengan_pasieni" value="Anak Pasien"  /> Anak Pasien
                <input type="radio" id="hubungan_dengan_pasieni" name="hubungan_dengan_pasieni" value="Teman"  /> Teman</br>
                <input type="radio" id="hubungan_dengan_pasieni" name="hubungan_dengan_pasieni" value="Suami/Istri"  /> Suami/Istri
                <input type="radio" id="hubungan_dengan_pasieni" name="hubungan_dengan_pasieni" value="Keluarga Pasien"  /> Keluarga Pasien
                <input type="radio" id="hubungan_dengan_pasieni" name="hubungan_dengan_pasieni" value="Lain-lain"  /> Lain-lain
            </td>
            <td ></td>  
        </tr>
        <!-- <tr>
            <td>Unit Layanan</td>
            <td>:</td>
             <td>
                <select name="klinik_id"  id="kliniki" style="width: 255px">
                    <option value="">--Pilih Klinik--</option>
                    <?php
                            foreach ($admission_klinik as $k){
                            echo "<option value='$k[id]'>$k[nama_klinik]</option>"; 
                            }           
                    ?>
                    </select>
            </td>
            <td ></td>  
        </tr> -->


            <tr>
                <td>Pencarian Kamar</td>
                <td>:</td>
                <td colspan="1"> 
                     <a data-toggle="modal" href="#myModalk" id="cari_pasienk" class="btn btn-primary btn-large" style="float:left; "><i class="icon icon-search icon-white"></i> Cari Kamar</a>
       
                </td>
                <td>&nbsp;</td>
                
            </tr> 

            <tr>
            <td>Kelas Kamar</td>
            <td>:</td>
            <td><input type="text" name="nama_kelas_kamar" id="nama_kelas_kamark" value="" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>


        <tr>
            <td>Ruang Kamar</td>
            <td>:</td>
            <td><input type="text" name="nama_ruang_kamar" value="" id="nama_ruang_kamark" class="span3" size="30" readonly="readonly"></td>
            <td ></td> 
        </tr>
        

      

        

       <!--  <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> 
                    <button type="submit" value="Simpan" class="btn btn-small" id="simpani">Simpan</button>
                </td>
                <td>&nbsp;</td>
                
            </tr> -->

             


        <input type="hidden" name="pasien_id" id="id_pasieni"  >
        <input type="hidden" name="kelas_kamar_id" id="kelas_kamar_idk"  >
        <input type="hidden" name="ruang_kamar_id" id="ruang_kamar_idk"  >
        <input type="hidden" name="id_ruang_kamar" id="ruang_kamar_id2"  >
        <input type="hidden" name="status" id="statusk"  >
       


           

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> 
                    <button type="submit" value="Simpan" class="btn btn-small" id="simpani">Simpan</button>
                </td>
                <td>&nbsp;</td>
                
            </tr>

           
            
            

      </tbody>

    </table>
    

  </div>
</div>


    