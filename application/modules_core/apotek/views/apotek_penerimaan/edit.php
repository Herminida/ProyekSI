<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    
    <script>
        $(document).ready(function() { //pembuka javascript

        	$("#tgl").val(<?php echo $tgl ?>);
              $("#bln").val('<?php echo $bln?>');
              $("#thn").val(<?php echo $thn ?>);

          $("#simpan").hide();
          var count = 0;

          
     
          $("#add_btn").click(function(){ //pembuka add btn
              $("#add_btn").hide();
              $("#simpan").hide();

          var nota = $('#no_nota').val();
          var unit_kerja_id=$('#unit_kerja').val();
          var sumber_id = $('#sumber_id').val();
          var supplier_id = $('#supplier_id').val();
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
          
          else {
              $("#pesan").remove();
          count += 1;

            
            $("#jumlah_"+count).live('click',function(){ //pembuka validasi obat
              var obat=$("#obat_id_"+count).val();
                        $.ajax({
                            type:"POST",
                            url :"<?php base_url();?>farmasi_penerimaan/falidasiobat",
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
          }
        }); //penutup remove item

        }); //penutup add btn

    $(".btn2").live('click',function() {
                var nomor= $(this).attr('nomor');
                var obat=$("#obat_id_"+nomor).val();
                        $.ajax({
                            type:"POST",
                            url :"<?php base_url();?>farmasi_penerimaan/falidasiobatbatal",
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
      
    <?php echo form_open('farmasi/farmasi_penerimaan/save_edit'); ?>
    <table class="table table-striped">

        <thead>
            <tr>
                <th colspan="4">::. Edit Farmasi Penerimaan</th>
            </tr>
        </thead>
        <tbody>
          <input type="hidden" name="id"  value="<?php echo $id ?>" >
          <input type="hidden" name="terima_id" id="terima" value="<?php echo $id ?>" >
          <tr>
            <td>No Nota</td>
            <td>:</td>
            <td><input type="text" name="no_nota" id="no_nota" value="<?php echo $no_nota ?>" placeholder="Masukkan No Nota..." ></td>
            <td id="pesannota" style="width:40%; color:red;" ></td>
          </tr>
          <tr>
            <td>Tanggal Penerimaan</td>
            <td>:</td>
            <td><?php
                            echo "<select name='tgl' id=tgl style=width:60px;>";
                            for($i=1; $i<=31; $i++){
                            if(strlen($i)==1){
                            echo "<option value=$i>$i</option>";
                            }else{
                            echo "<option value=$i>$i</option>";
                            }
                            }
                            echo "</select>";
                        ?>

                        <?php
                            echo "<select name='bln' id=bln style=width:105px;>";
                            $bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",);
                            for($bln=1;$bln<=12; $bln++){
                            if(strlen($bln)==1){
                            echo "<option value=$bln>$bulan[$bln]</option>";
                            }
                            else{
                            echo "<option value=$bln>$bulan[$bln]</option>";
                            }
                            }
                            echo "</select>";
                        ?>
                      
                        <?php
                            echo "<select name='thn' id=thn style=width:83px;>";
                            for($thn=1900; $thn<=date("Y"); $thn++){
                            echo "<option value=$thn>$thn</option>";
                            }
                            echo "</select>"
                        ?>
                  </td>
                  <td style="width:40% "></td>
          </tr>
          
          <tr>
            <td>Tujuan</td>
            <td>:</td>
            <td>
              	<select style="width:250px; height:25px; font-size:12px;" name="unit_kerja_id" id="unit_kerja">
        			<option value="">== Pilih Unit Kerja==</option>

        			<?php
          				foreach ($unit_kerja->result_array() as  $value) {
            			if ($unit_kerja_id==$value['id_unit_kerja']){
        			?>
          				<option value="<?php echo $value['id_unit_kerja']; ?>" selected="selected"><?php echo $value['nama_unit_kerja']; ?></option>
        			<?php
            			}
            			else
            			{
        			?>
          				<option value="<?php echo $value['id_unit_kerja']; ?>"><?php echo $value['nama_unit_kerja']; ?></option>
        			<?php
            			}
          				}
        			?>

      			</select>
            </td>
            <td id="pesan" style="width:40%; color:red;" ></td>
          </tr>

          <tr>
            <td>Sumber</td>
            <td>:</td>
            <td>
              	<select style="width:250px; height:25px; font-size:12px;" name="sumber_id" id="sumber_id">
        			<option value="">== Pilih Sumber==</option>

        			<?php
          				foreach ($apt_sumber->result_array() as  $value) {
            			if ($sumber_id==$value['id_sumber']){
        			?>
          				<option value="<?php echo $value['id_sumber']; ?>" selected="selected"><?php echo $value['nama_sumber']; ?></option>
        			<?php
            			}
            			else
            			{
        			?>
          				<option value="<?php echo $value['id_sumber']; ?>"><?php echo $value['nama_sumber']; ?></option>
        			<?php
            			}
          				}
        			?>

      			</select>
            </td>
            <td id="pesansumber" style="width:40%; color:red;" ></td>
          </tr>

          <tr>
            <td>Supplier</td>
            <td>:</td>
            <td>
              	<select style="width:250px; height:25px; font-size:12px;" name="supplier_id" id="supplier_id">
        			<option value="">== Pilih Supplyer==</option>

        			<?php
          				foreach ($apt_supplier->result_array() as  $value) {
            			if ($supplier_id==$value['id_supplier']){
        			?>
          				<option value="<?php echo $value['id_supplier']; ?>" selected="selected"><?php echo $value['nama_supplier']; ?></option>
        			<?php
            			}
            			else
            			{
        			?>
          				<option value="<?php echo $value['id_supplier']; ?>"><?php echo $value['nama_supplier']; ?></option>
        			<?php
            			}
          				}
        			?>

      			</select>
            </td>
            <td id="pesansupplier" style="width:40%; color:red;" ></td>
          </tr>

        </tbody>
    </table>

  <table class="table table-striped">
        <thead>
        <tr>
          <th>Nama Obat</th><th>Jumlah</th><th>Keterangan</th><th>Aksi</th>
        </tr>
        </thead>
        <tbody id="container">
        <!-- nanti rows nya muncul di sini -->
        <?php
          
            foreach ($detail_farmasi_penerimaan->result_array() as $data) { ?>
            <tr>
              
             
              <td><input type="text" name="obat_id" value=" <?php echo $data['nama_obat'] ?>"></td>
              <td><input type="text" name="jumlah" value=" <?php echo $data['jumlah'] ?>"></td>
              <td><input type="text" name="keterangan" value=" <?php echo $data['keterangan'] ?>">
              	<input type="hidden" name="" value=" <?php echo $data['id2'] ?>">
              </td>
              <td>
              	 <a href="<?php echo base_url();?>farmasi/farmasi_penerimaan/delete_item/<?php echo $data['terima_id']; ?>/<?php echo $data['id']; ?>" class="btn btn-small btn-warning" onclick="return confirm('Apakah Anda Yakin Ingin Mengahapus <?php echo $data['nama_obat']; ?> ?')" >Hapus</a>

              </td>
              
            </tr>

            <?php
            }
            ?>
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