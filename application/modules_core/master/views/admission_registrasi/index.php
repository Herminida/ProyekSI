<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title></title>

        <script>
                $(document).ready(function(){
                    
                    $("#nama").keyup(function(){
                        
                        var nama = $("#nama").val();

                        $.ajax({
                            type:"POST",
                            url :"<?php base_url();?>admission_registrasi/getall",
                            data: "nama="+nama,
                            success : function (data) {
                                $("#tampilkandata").html(data);
                            }
                            
                        });
                    }); //end of nama
                    
                    $("#nik").keyup(function(){
                        var nik = $("#nik").val();

                        $.ajax({
                            type:"POST",
                            url :"<?php base_url();?>admission_registrasi/getall",
                            data:"nik="+nik,
                            success : function (data) {
                                $("#tampilkandata").html(data);
                            }
                            
                        });
                    });//end of nik
                    
                   $(".daftar").live("click",function(){
                 
                   var id=$(this).attr("id");
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
                   $("#umur_id").val (idumur);
                   //$("#noreg2").val(noreg);
                   $("#nik2").val(nik);
                   $("#nama2").val(nama);
                   $("#sex2").val(sex);
                   $("#alamat2").val(alamat);
                   $("#tgl2").val(tgl);
                   $("#tahun2").val(tahun);
                   $("#tglregistrasi2").val(tglregistrasi);
                   });//end off daftar admission
                });
    </script>
    </head>
        
<body>


<div id="real">
    <div id="statusdonor">
        
        <table class="table">
            <thead>
                <tr>
                    <th colspan="4"><b>::. Input Admission Registrasi</b></th>
                </tr>
            </thead>
          <tr>
                <td>Cari Data Pasien Terlebih Dahulu</td>
                <td  style="width:20%"><input type="text" name="nik" class="input" id="nik" size="10" placeholder="Masukkan NIK..."> </td>
                <td>Atau</td>
                <td><input type="text" name="nama" class="input" id="nama" size="20" placeholder="Masukkan Nama..."></td>
            </tr>

        </table>
        <table class="table table-striped" id="tampilkandata">
                
            </table>
    </div>
</div>

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

    


    <?php echo form_open('loket/admission_registrasi/add','class="form-horizontal"'); ?>
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
            <td><input type="text" name="umur" class="span3" value="<?php echo $tahun ?>" id="tahun2" readonly="readonly"></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('umur'); ?></td> 
        </tr>

        <tr>
            <td>Poly</td>
            <td>:</td>
            <td>
                <select name="id_klinik"  style="width: 255px">
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
                <td colspan="1"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
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

</body>   
</html>
    