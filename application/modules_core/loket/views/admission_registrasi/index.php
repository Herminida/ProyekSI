

        <script>
                $(document).ready(function(){

                    $("#simpan").click(function(){
                        var klinik = $("#klinik").val();
                        var idanggota = $("#id2").val();
                        var tgl = $("#tgl").val();
                        var bln = $("#bln").val();
                        var thn = $("#thn").val();
                        var nama1 = $("#nama2").val();

                        var tahun = thn+"-"+bln+"-"+tgl;

                        $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/admission_registrasi/cek",
                            data:"klinik="+klinik+"&idanggota="+idanggota+"&tahun="+tahun,
                            success : function (data) {

                                if (data>0) {
                                    var retVal = confirm("Pasien dengan nama = "+nama1+" sudah mendaftar hari ini, Apakah Anda ingin melanjutkan ?");
                                        if( retVal == true ){
                                            $("#formsimpan").submit();
                                            return true;
                                        }else{
                                            alert("Anda tidak jadi melanjutkan proses registrasi dengan nama pasien="+nama1+" " );
                                            return false;
                                        }
                                }
                                else {
                                    $("#formsimpan").submit();
                                }
                            }


                        });



                    });
                    
                    
                    
                    $("#nik").keyup(function(){
                        var nik = $("#nik").val();
                        var nama = $("#nama").val();

                        $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>loket/admission_registrasi/getall",
                            data:"nik="+nik+"&nama="+nama,
                            success : function (data) {

                                $("#tampilkandata").html(data);
                            }
                            
                        });
                    });//end of nik


                    $("#nama").keyup(function(){
                                            
                        var nama = $("#nama").val();
                        var nik = $("#nik").val();

                            $.ajax({
                                    type:"POST",
                                    url :"<?php echo base_url();?>loket/admission_registrasi/getall",
                                    data: "nama="+nama+"&nik="+nik,
                                        success : function (data) {
                                                $("#tampilkandata").html(data);
                                                }
                                                
                                    });
                    }); //end of nama


                    
                   $("#daftar").live("click",function(){
                 
                   var id=$(this).attr("id_anggota");
                   var nik=$(this).attr("nik");
                   var nama = $(this).attr("nama");
                   var sex = $(this).attr("sex");
                   var alamat = $(this).attr("alamat");
                   var tgl = $(this).attr("tgl");
                   var tahun = $(this).attr("tahun");
                   var idumur = $(this).attr("idumur");
                   //var noreg = $(this).attr("noreg");
                   var tglregistrasi=$(this).attr("tglregistrasi");
                   $("#id2").val (id);
                   $("#umur").val (idumur);
                   //$("#noreg2").val(noreg);
                   $("#nik2").val(nik);
                   $("#nama2").val(nama);
                   $("#sex2").val(sex);
                   $("#alamat2").val(alamat);
                   $("#tgl2").val(tgl);
                   $("#tahun2").val(tahun);
                   $("#tglregistrasi2").val(tglregistrasi);
                   });//end off daftar admission

                    $("#btn-cari").click(function(){
                        var kata_kunci=$("#kata_kunci").val();
                        if(kata_kunci==""){
                            alert("Kata kunci tidak boleh kosong!!!");
                        }
                        else{
                            $.ajax({
                            type:"POST",
                            url:"<?php echo base_url();?>loket/admission_registrasi/cari_pasien",
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
  

<!-- 
<div id="real">
    <div id="statusdonor">
        
        <table class="table">
            <thead>
                <tr>
                    <th colspan="4"><b>::. Input Admission Registrasi</b></th>
                </tr>
            </thead>
          <tr>
                <td>Cari Data Pasien Terlebih Dahulu Berdasarkan Nik atau Nama</td>
                <td  style="width:40%"><input type="text" name="nik" class="span5"  id="nik" size="10" placeholder="Masukkan NIK atau Nama..."> </td>
                <!-- <td>Atau</td>
                <td><input type="text" name="nama" class="input" id="nama" size="20" placeholder="Masukkan Nama..."></td> -->
           <!-- </tr>

        </table>
        <table class="table table-striped" id="tampilkandata">
                
            </table>
    </div>
</div> -->
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
<h3>Pendaftaran </h3>
<div id="real">
  <div id="statusdonor">
    <?php 
    if ($anggotas->num_rows()>0 ) {

        foreach ($anggotas->result() as $data) {
            $nikid=$data->nik;
            $nama_anggotaid=$data->anggota_id;
            $nama_anggota=$data->nama_anggota;
            $alamatid=$data->alamat;
            $sexid=$data->sex;
            $tanggalid=$data->tanggal;
            $tanggalid2=$data->tanggal_lahir;
            
            $tahun = $data->umur;

        }
    }else{

            $nikid="";
            $nama_anggota="";
            $nama_anggotaid="";
            $alamatid="";
            $sexid="";
            $tanggalid="";
            $tanggalid2="";

            $tahun = "";
            

    }
    ?>  

    <?php 

    if ($reg->num_rows()>0 ) {
        foreach ($reg->result() as $reg2) {
            $noreg = $reg2->id+1;

        }
            }
    else {
        $noreg = date('Ymd').'00001';
    }

    ?>

    


    <?php echo form_open('loket/admission_registrasi/add','id="formsimpan"','class="form-horizontal"'); ?>
    <table class="table table-striped">
      <thead></thead>
      <tbody>
       
        <input type="hidden" name="umur_id" value="<?php if(isset($umurs)){echo $umurs;}; ?>" id="umur_id">
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
                <td style="width:30%; color:red;"><?php echo form_error('tanggal_lahir'); ?> </td>
               
            </tr>

        <!-- <tr>
            <td>Unit Kerja</td>
            <td>:</td>
            <td><input type="text" name="" value="<?php echo $this->session->userdata("nama_unit_kerja"); ?>" class="span3" size="30" readonly="readonly"></td> 
            <td style="width:50%;"></td>
        </tr>
        <tr>
            <td>No Reg</td>
            <td>:</td>
            <td><input type="text" name="noreg" value="<?php echo $noreg ?>" class="span3" size="30" readonly="readonly"></td> 
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('noreg'); ?></td>
        </tr> -->


        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><input type="text" name="nik" id="nik2" value="<?php echo $nikid ?>" class="span3" size="30" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('nik'); ?></td> 
        </tr>

        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_anggota" value="<?php echo $nama_anggota ?>" id="nama2" class="span3" size="30" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('nama_anggota'); ?></td> 
        </tr>

        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" id="alamat2" value="<?php echo $alamatid ?>" class="span3" size="30" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('alamat'); ?></td> 
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><input type="text" name="sex" id="sex2" value="<?php echo $sexid ?>" class="span3" size="30" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>

        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><input type="text" name="tgl_lahir" id="tgl2" value="<?php echo $tanggalid ?>" class="span3" size="30" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('tgl_lahir'); ?></td> 
        </tr>

        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" id="umur" class="span3" value="<?php echo $tahun ?>" id="tahun2" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('umur'); ?></td> 
        </tr>

        <tr>
            <td>Poly</td>
            <td>:</td>
            <td>
                <select name="id_klinik"  id="klinik" style="width: 255px">
                    <option value="">--Pilih Klinik--</option>
                    <?php
                            foreach ($admission_klinik as $k){
                            echo "<option value='$k[id]'>$k[nama_klinik]</option>"; 
                            }           
                    ?>
                    </select>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('id_klinik'); ?></td> 
        </tr>

        <tr>
            <td>Cara Bayar</td>
            <td>:</td>
            <td>
                <select name="id_bayar" style="width: 255px">
                        <option value="">--Pilih Cara Bayar--</option>
                        <?php 
                            foreach ($admission_bayar as $d) {
                                echo "<option value='$d[id]'>$d[cara_bayar]</option>";
                            }
                        ?>
                    </select>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('id_bayar'); ?></td>  
        </tr>

        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> <?php echo form_button(array('type'=>'button','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                </td>
                <td>&nbsp;</td>
                
            </tr>

            <input type="hidden" name="id_anggota_keluarga" id="id2" value="<?php echo $nama_anggotaid ?>" >
            <input type="hidden" name="noreg" value="<?php echo $noreg ?>">
            <input type="hidden" name="unit_kerja_id"  value="<?php echo $this->session->userdata("id_unit_kerja"); ?>" >
            
            

      </tbody>

    </table>
    <?php echo form_close(); ?>

  </div>
</div>


    