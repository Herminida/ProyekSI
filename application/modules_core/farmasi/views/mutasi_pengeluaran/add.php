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
          
          var keluar_id = $('#keluar').val();
          var tanggal= $('#tgl').val();
          var bulan=$('#bln').val();
          var tahun=$('#thn').val();
          var tanggal_keluar=tahun+"-"+bulan+"-"+tanggal;
          
          if (nota=="") {
            $("#pesannota").append('Nota Harus Diisi Terlebih Dahulu');
                $("#add_btn").show();
          }
         
          else {
              $("#pesan").remove();
          count += 1;

            
            $("#jumlah_"+count).live('click',function(){ //pembuka validasi obat
              var obat=$("#obat_id_"+count).val();
                        $.ajax({
                            type:"POST",
                            url :"<?php base_url();?>mutasi_pengeluaran/falidasiobat",
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
                        url: "<?php echo base_url(); ?>farmasi/mutasi_pengeluaran/lookup",
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
             + '<td><a class="btn2" nomor="'+count+'" id="remove_item" href="#" ><i class="icon-remove"></i>Delete</a>'
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
                            url :"<?php base_url();?>mutasi_pengeluaran/falidasiobatbatal",
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
      
    <?php echo form_open('farmasi/mutasi_pengeluaran/save_add'); ?>
    <?php foreach ($mutasi_pengeluaran_header->result_array() as $data) { ?>
    <table class="table">

        
        <tbody>
          
          <input type="hidden" name="id"  value="<?php echo $data['id'] ; ?>" >
          <input type="hidden" name="keluar_id" id="keluar" value="<?php echo $data['id'] ?>" >
          <tr>
                <td>No Nota</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['no_nota'];
                  ?>
                </td>
                
            </tr>

            <tr>
                <td>Tanggal Mutasi</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['tanggal'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Jenis Mutasi</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['jenis_mutasi'];
                  ?>
                </td>
              
               
            </tr>

             <tr>
                <td>Dari</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['nama_unit_kerja'];
                  ?>
                </td>
              
               
            </tr>

          

           <?php
      }
      ?>

        </tbody>
    </table>

  <table class="table table-striped">
        <thead>
        <tr>
          <th>Nama Obat</th><th>Jumlah</th><th>Alasan Mutasi</th><th>Aksi</th>
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