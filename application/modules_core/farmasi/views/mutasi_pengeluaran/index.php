<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    
    <script>
        $(document).ready(function() { //pembuka javascript

          $("#simpan").hide();
          var count = 0;

          
     
          $("#add_btn").click(function(){ //pembuka add btn
              $("#add_btn").hide();
              $("#simpan").hide();

          var nota = $('#no_nota').val();
          var jenismutasi = $('#jenis_mutasi').val();
          var unit_kerja_id=$('#unit_kerja').val();
          var keluar_id = $('#keluar').val();
          var tanggal= $('#tgl').val();
          var bulan=$('#bln').val();
          var tahun=$('#thn').val();
          var tanggal_keluar=tahun+"-"+bulan+"-"+tanggal;
          
          if (nota=="") {
            $("#pesannota").append('Nota Harus Diisi Terlebih Dahulu');
                $("#add_btn").show();
          }
          else if (jenismutasi=="") {
            $("#pesanjenismutasi").append('Jenis Mutasi Harus Dipilih Terlebih Dahulu');
                $("#add_btn").show();
          }
          else if (unit_kerja_id=="") {
            $("#pesan").append('Unit Kerja Harus Dipilih Terlebih Dahulu');
                $("#add_btn").show();
          }
          else {
              $("#pesan").remove();
          count += 1;

            
            $("#jumlah_"+count).live('click',function(){ //pembuka validasi obat
              var obat=$("#obat_id_"+count).val();
                        $.ajax({
                            type:"POST",
                            url :"<?php base_url();?>gudang_pengeluaran/falidasiobat",
                            data: "obat="+obat ,
                            success : function (data) {
                                $("#tampilkandata").html(data);
                            }
                            
                        });
            }); //penutup vaidasi obat


        $("#jumlah_"+count).live('keyup',function(){
            $("#add_btn").show();
            $("#simpan").show();
        });

        
            $("#obat_id_"+count).live('focus',function(){ // pembuka auto complate
               $("#obat_id_"+count).autocomplete({
                minLength: 1,
                source: 
                function(req, add){
                    $.ajax({
                        url: "<?php echo base_url(); ?>farmasi/gudang_pengeluaran/lookup",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:    
                        function(data){
                            if(data.response =="true"){
                                add(data.message);
                            }
                        },
                    });
                },   
            });
           }); //penutup autocomplate

          

          $('#container').append( //pembuka pembuatan konten

               '<tr class="records">'
             
             + '<td><input id="obat_id_'+count+'"  name="obat_id_' + count + '" type="text" style="width:160px;"></td>'
             + '<td><input id="jumlah_' + count + '" name="jumlah_' + count + '" type="text" style="width:160px;"></td>'
             + '<td><input id="keterangan_' + count + '" name="keterangan_' + count + '" type="text" style="width:160px;"></td>'
             + '<td><a class="btn2" nomor="'+count+'" id="remove_item" href="#" ><i class="icon-remove "></i>Delete</a>'
             //+ '<input id="unit_kerja_id_' + count + '" name="unit_kerja_id_' + count + '" type="hidden" value="'+unit_kerja_id+'">'
             + '<input id="keluar_id_' + count + '" name="keluar_id_' + count + '" type="hidden" value="'+keluar_id+'">'
            // + '<input id="hari_' + count + '" name="hari_' + count + '" type="hidden" value="'+tanggal_keluar+'">'
             + '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden"></td></tr>'
          );}


         
          $("#remove_item").live('click', function (ev) {  //pembuka remove item
          if (ev.type == 'click') {
            $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
                         $("#add_btn").show();
                         $("#simpan").show();
          }
        }); //penutup remove item

        }); //penutup add btn

    $(".btn2").live('click',function() {
                var nomor= $(this).attr('nomor');
                var obat=$("#obat_id_"+nomor).val();
                        $.ajax({
                            type:"POST",
                            url :"<?php base_url();?>gudang_pengeluaran/falidasiobatbatal",
                            data: "obat="+obat ,
                            success : function (data) {
                                $("#tampilkandata").html(data);
                            }
                            
                        });
              });
   
    }); //penutup javascript

    </script>
</head>
<body>
  <div id="real">
    <div id="statusdonor">
      <?php 

    if ($id2_pengeluaran_header->num_rows()>0 ) {
        foreach ($id2_pengeluaran_header->result() as $pengeluaranid2) {
            $pengeluaranid3 = $pengeluaranid2->id+1;

        }
            }
    else {
       
            $pengeluaranid3 = date('Ymd').'001';
        
    }

    ?>
    <?php echo form_open('farmasi/mutasi_pengeluaran/save'); ?>
    <table class="table table-striped">

        <thead>
            <tr>
                <th colspan="6">::. Gudang Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
          
          <input type="hidden" name="id"  value="<?php echo $pengeluaranid3 ?>" >
          <input type="hidden" name="keluar_id" id="keluar" value="<?php echo $pengeluaranid3 ?>" >
          <input type="hidden" name="unit_kerja_id"  value="<?php echo $this->session->userdata("id_unit_kerja"); ?>">
          
          <tr>
            <td>No Nota</td>
            <td>:</td>
            <td><input type="text" name="no_nota" id="no_nota" placeholder="Masukkan No Nota..." ></td>
            <td id="pesannota" style="width:40%; color:red;" ></td>
          </tr>
          <tr>
            <td>Tanggal Mutasi</td>
            <td>:</td>
            <td><?php
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
                        echo "<select name='thn' id=thn style=width:75px;>";
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
                  <td style="width:40% "></td>
                  <td>&nbsp;</td>
          </tr>
          <tr>
                    <td>Jenis Mutasi</td>
                    <td>:</td>
                    <td><select name="jenis_mutasi" id="jenis_mutasi" style="width:255px; height:25px; font-size:12px;">
                              
                                <option value="">--Silahkan Pilih--</option>
                                <option value="Retur">Retur</option>
                                <option value="Pemusnahan">Pemusnahan</option>
                            </select>
                      </td>
                     <td id="pesanjenismutasi" style="width:40%; color:red;" ></td>
          </tr>

          <tr>
            <td>Dari</td>
            <td>:</td>
            <td><input type="text"  style="width:250px;" value="<?php echo $this->session->userdata("nama_unit_kerja"); ?>" readonly="readonly">
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>

        </tbody>
    </table>

  <table class="table table-striped">
        <thead>
        <tr>
          <th>Nama Obat</th><th>Jumlah</th><th>Alasam Mutasi</th><th>Aksi</th>
        </tr>
        </thead>
        <tbody id="container">
        <!-- nanti rows nya muncul di sini -->
        </tbody>
        
      </table>
<table width="100%">
<input type="button" class="btn btn-small" name="add_btn" value="Tambah Obat" id="add_btn">
&nbsp;
<input type="submit" name=submit id="simpan" class="btn btn-small" value="Simpan">

</table>
      
   <?php echo form_close (); ?>

</div>
</div>
</body>
</html>