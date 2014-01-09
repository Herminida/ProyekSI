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
          var unit_kerja_id=$('#unit_kerja').val();
          var sumber_id = $('#sumber_id').val();
          var supplier_id = $('#supplier_id').val();
          var sales_id = $('#sales_id').val();
          var terima_id = $('#terima').val();
          var tanggal= $('#tgl').val();
          var bulan=$('#bln').val();
          var tahun=$('#thn').val();
          var tanggal_penerimaan=tahun+"-"+bulan+"-"+tanggal;
          
          if (nota==""){
            $("#pesannota").append('Nota Harus Diisi Terlebih dahulu');
                $("#add_btn").show();
          }
          else if (unit_kerja_id=="") {
            $("#pesan").append('Unit Kerja Harus Dipilih Terlebih Dahulu');
                $("#add_btn").show();
          }
          else if (sumber_id=="") {
            $("#pesansumber").append('Sumber Harus Dipilih Terlebih Dahulu');
                $("#add_btn").show();

          }
          else if (supplier_id=="") {
            $("#pesansupplier").append('Supplyer Harus Dipilih Terlebih Dahulu');
                $("#add_btn").show();

          }
          else if (sales_id=="") {
            $("#pesansales").append('Sales Harus Dipilih Terlebih Dahulu');
                $("#add_btn").show();

          }
          
          else {
              $("#pesan").remove();
          count += 1;

            
            $("#jumlah_"+count).live('click',function(){ //pembuka validasi obat
              var obat=$("#obat_id_"+count).val();
                        $.ajax({
                            type:"POST",
                            url: "<?php echo base_url(); ?>farmasi/farmasi_penerimaan/falidasiobat",
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
                        url: "<?php echo base_url(); ?>farmasi/farmasi_penerimaan/lookup",
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
             
             + '<td><input id="obat_id_'+count+'"  name="obat_id_' + count + '" type="text"></td>'
             + '<td><input id="jumlah_' + count + '" name="jumlah_' + count + '" type="text"></td>'
             + '<td><input id="keterangan_' + count + '" name="keterangan_' + count + '" type="text"></td>'
             + '<td><a class="btn2" nomor="'+count+'" id="remove_item" href="#" ><i class="icon-remove"></i>Delete</a>'
             //+ '<input id="unit_kerja_id_' + count + '" name="unit_kerja_id_' + count + '" type="hidden" value="'+unit_kerja_id+'">'
             //+ '<input id="sumber_id_' + count + '" name="sumber_id_' + count + '" type="hidden" value="'+sumber_id+'">'
             //+ '<input id="supplier_id_' + count + '" name="supplier_id_' + count + '" type="hidden" value="'+supplier_id+'">'
             + '<input id="terima_id_' + count + '" name="terima_id_' + count + '" type="hidden" value="'+terima_id+'">'
             //+ '<input id="hari_' + count + '" name="hari_' + count + '" type="hidden" value="'+tanggal_penerimaan+'">'
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
                            url: "<?php echo base_url(); ?>farmasi/farmasi_penerimaan/falidasiobatbatal",
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
      <?php echo form_open('farmasi/farmasi_penerimaan/save_add');?>

      <?php foreach ($farmasi_penerimaan_header->result_array() as $data) { ?>
         
      <table class="table">
          
          <tbody>
             <input type="hidden" name="id"  value="<?php echo $data['id'] ; ?>" >
             <input type="hidden" name="terima_id" id="terima" value="<?php echo $data['id'] ?>" >
             <input type="hidden" name="tanggal_terima" value="<?php echo $data['tanggal_terima'] ?>" >
             <input type="hidden" name="sales" value="<?php echo $data['sales_id'] ?>" >
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
                <td>Tanggal Terima</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['tanggal'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Sumber</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['nama_sumber'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Supplier</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['nama_supplier'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Sales</td>
                <td>:</td>
                <td>
                  <?php
                    echo $data['nama_sales'];
                  ?>
                </td>
              
               
            </tr>

          </tbody>

         </table>
     


       

      

      <?php
      }
      ?>


     <table class="table table-striped">
        <thead>
        <tr>
          <th>Nama Obat</th><th>Jumlah</th><th>Keterangan</th><th>Aksi</th>
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