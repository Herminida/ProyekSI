<html>
    <head>
        <title>
            Halaman Admission
        </title>
        <script src="<?php echo base_url();?>css/js/jquery-1.8.3.js" type="text/javascript"> </script>
        <script>
                $(document).ready(function(){
                    
                    $("#nama").keyup(function(){
                        
                        var nama = $("#nama").val();

                        $.ajax({
                            type:"POST",
                            url :"<?php base_url();?>loket/admission/getall",
                            data: "nik="+nik + "&nama="+nama,
                            success : function (data) {
                                $("#tampilkandata").html(data);
                            }
                            
                        });
                    }); //end of nama
                    
                    $("#nik").keyup(function(){
                        var nik = $("#nik").val();

                        $.ajax({
                            type:"POST",
                            url :"<?php base_url();?>loket/admission/getall",
                            data: "nik="+nik + "&nama="+nama,
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
                   var noreg = $(this).attr("noreg");
                   var tglregistrasi=$(this).attr("tglregistrasi");
                   $("#id2").val (id);
                   $("#noreg2").val(noreg);
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
        
        <table>
                
            <tr>
                <th colspan="3">
                    Cari Anggota
                </th>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><input type="text" name="nik" class="input" id="nik"size="10"> Nama : <input type="text" name="nama" class="input" id="nama"size="20"></td>
                
                
                
            </tr>
           
        </table>
   
        
        <table>
            <div id="tampilkandata"></div>
        </table>
        
        <?php echo form_open('loket/admission/insertadmission'); ?>
        <table>
            <tr>
                <th colspan="3">
                    Admission Bayar
                </th>
            </tr>
           
               
                <input type="hidden" name="id_anggota_kepala_keluarga" id="id2">
                <input type="hidden" name="tgl_registrasi" id="tglregistrasi2">
            
            <tr>
                <td>No Reg</td>
                <td>:</td>
                <td><input type="text" name="noreg" id="noreg2"></td>
            </tr>
            <tr>
                <td>Nik</td>
                <td>:</td>
                <td><input type="text" name="nomer_induk_anggota" id="nik2"></td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td><input type="text" name="nama_Anggota_keluarga" id="nama2"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" id="alamat2"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><input type="text" name="sex" id="sex2" ></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="text" name="tgl_lahir" id="tgl2" > Umur : <input type="text" name="umur" size="3" id="tahun2"></td>
          
            </tr>
            <tr>
                <td>Klink</td>
                <td>:</td>
                <td><select name="id_klinik"  style="width: 165px">
                    <option value="">--Pilih Klinik--</option>
                    <?php
                            foreach ($data_klinik as $k){
                            echo "<option value='$k[id]'>$k[nama_klinik]</option>";	
                            }			
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Cara Bayar</td>
                <td>:</td>
                <td>
                    <select name="id_bayar" style="width: 165px">
                        <option value="">--Pilih Cara Bayar--</option>
                        <?php 
                            foreach ($data_cara_bayar as $d) {
                                echo "<option value='$d[id]]'>$d[cara_bayar]</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                
                <td colspan="3"><input type="submit" value="Simpan"></td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </body>
   
</html>
    