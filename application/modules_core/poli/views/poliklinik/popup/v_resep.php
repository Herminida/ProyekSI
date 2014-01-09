<div class="span11">
      <div class="row">
        <div class="labelhr">
          <span class="label">Resep</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
	<form class="well" id="frmResep" name="frmResep">
		<table width="100%">
			<tr>
        <td><label for="frmResepTgl">Tgl</label></td>
        <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
          <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
             <input type="text" id="frmResepTgl" name="frmResepTgl" class="input-small" readonly>
             <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>
          </div>
          <div class="bfh-datepicker-calendar">
            <table class="calendar table table-bordered">
              <thead>
                <tr class="months-header">
                  <th class="month" colspan="4">
                    <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                    <span></span>
                    <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                  </th>
                  <th class="year" colspan="3">
                    <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                    <span></span>
                    <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                  </th>
                </tr>
                <tr class="days-header">
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div></td>
        <td><label>Dokter</label></td>
        <td>
          <select id="dokter_id">

          </select>
         </td>
				<td><label for="frmResepRegister">Register</label></td>
				<td><input type="text" id="frmResepRegister" name="frmResepRegister" class="input-small" readonly></td>
        <!-- <td><label for="frmResepNo">No.Resep</label></td> 
        <td><input type="text" id="frmResepNo" name="frmResepNo" class="input-small" readonly></td>
        <td><label for="frmResepDokter">Dokter</label></td> 
        <td><input type="text" id="frmResepDokter" name="frmResepDokter" readonly></td>-->
			</tr>
    </table>
  </form>
  <!-- <button class="btn btn-small">Buat Resep</button> -->
  <form class="well" id="frmDetilResep" name="frmDetilResep">
    <table>
			<tr>
				<td><label for="frmDetilResepKode">Kode Obat</label></td>
				<td><div class="input-append">
          <input type="text" id="frmDetilResepKode" name="frmDetilResepKode" class="input-small" readonly>
          <input type="hidden" id="frmDetilResepIdItem" name="frmDetilResepIdItem" class="input-small">
          <!-- <button class="btn btn-small" type="button"><i class="icon-search"></i></button> -->
        </div></td>
        <td>&nbsp;</td>
        <td><label for="frmDetilResepNama">Nama Obat</label></td>
        <td><div class="input-append">
          <input type="text" id="frmDetilResepNama" name="frmDetilResepNama" readonly>
          <button class="btn btn-small" type="button" onclick="toggleModal()"><i class="icon-search"></i></button>
        </div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><label for="frmDetilResepJumlah">Jumlah</label></td>
        <td><input type="text" id="frmDetilResepJumlah" name="jumlah" class="span1" disabled></td>
        <td>&nbsp;</td>
        <td><label for="frmDetilResepAturan">Aturan Pakai</label></td>
        <td><input type="text" id="frmDetilResepAturan" name="aturan_pakai" disabled></td>
      </tr>
      <tr>
        <td><label for="frmDetilResepKet">Keterangan</label></td>
        <td colspan="4"><textarea id="frmDetilResepKet" name="keterangan" class="span5" row="3" disabled></textarea></td>
			</tr>
    </table>
    <input type="hidden" name="obat_id" id="obat_id">
    <div class="offset1">
      <button class="btn btn-small btn-primary" id="btnSimpanResep" disabled>Simpan</button>
      <button type="button" class="btn btn-small" id="btnResetResep" onclick="panggilreset();" disabled>Reset</button>
    </div>
  </form>
    <button type="button" onclick="edit()" >Edit</button>
    <button type="button" onclick="hapus()" >Hapus</button>
    <button type="button" onclick="getResepCetak()" >Cetak</button>
    <table id="tblResep" class="table datatable">
      <thead>
        <tr>
          <th>Obat</th>
          <th>Jumlah</th>
          <th>Aturan Pakai</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <tr class="muted"><td colspan="7">Belum ada resep</td></tr>
      </tbody>
      <tfoot>
      </tfoot>
    </table>
<!-- <label for="frmDetilResepTotal">Total Netto</label>
<input type="text" class="span3" id="frmDetilResepTotal" name="frmDetilResepTotal">
<button class="btn btn-small">Simpan</button> -->
</div>
<div id="modalResep" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
  <div class="input-append">
    <input type="text" id="cariObat">
    <button class="btn btn-small" onclick="cariObat()">Cari</button>
  </div>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
  <table id="tblListObat" name="tblListObat" class="table datatable">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama Produk</th>
              <th>Satuan</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
</div>
<div class="modal-header">
<button class="btn" onClick="pilihObat();">Pilih</button>
</div>
</div>
<!-- start modal cetak resep -->
<div id="modalCetakResep" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
  <label>CETAK RESEP</label>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body" id="cetakResep">
  <table id="tblCetakResep" name="tblCetakResep">
    <tr>
      <td colspan=8><?php echo $this->session->userdata('nama_unit_kerja') ?></td>
    </tr>
    <tr>
      <td>No.Resep</td><td>:</td>
      <td id="cno"></td>
      <td>&nbsp;&nbsp;</td>
      <td>Tanggal</td><td>:</td>
      <td id="ctanggal"></td>
      <td>&nbsp;&nbsp;</td>
    <tr>
    <tr>
      <td>Dokter</td><td>:</td>
      <td id="cdok"></td>
    </tr>
    <tr>
      <td>Poli</td><td>:</td>
      <td id="cpoli"></td>
      <td>&nbsp;&nbsp;</td>
      <td></td>
      <td></td>
      <!-- <td>Dokter</td><td>:</td>
      <td id="cdokter"></td> -->
      <td>&nbsp;&nbsp;</td>
    <tr>
      <tr>
      <td>Pasien</td><td>:</td>
      <td id="cpasien"></td>
      <td>&nbsp;&nbsp;</td>
      <td>No.Reg</td><td>:</td>
      <td id="creg"></td>
      <td>&nbsp;&nbsp;</td>
    <tr>
 </table>
 <table class="table">
  <thead>
    <th>Nama Obat</th>
    <th>Dosis</th>
    <th>Ket.</th>
  </thead>
  <tbody id="tblCetakObatResep">

  </tbody>
 </table>
</div>
<div class="modal-header">
<button class="btn btn-primary" onclick="cetakResep()">Cetak</button>
</div>
</div>
<!-- end modal cetak resep -->

<script type="text/javascript">

function cetakResep(){
  $('#cetakResep').printArea();
}

function getResepCetak(){
  var purl = '<?php echo site_url("poli/popup/cetakresep");?>'+'/'+sData.idpemeriksaan;
  var htmlresep ='';
  var ctanggal='';
  var cpasien='';
  var cpoli='';
  var creg='';
  var cno='';
  var cdok='';
  var dataresep='';
    $.getJSON(purl,function(pdata){
       if (jQuery.isEmptyObject(pdata)){
        alert("Belum ada resep");
        return false;
       }else{ 
      $.each( pdata, function( key, value ) {
        ctanggal=pdata[key].tanggal_resep;
        cpasien=pdata[key].nama_anggota;
        cpoli=pdata[key].nama_klinik;
        creg=pdata[key].register;
        cno=pdata[key].no_resep;
        cdok=pdata[key].nama_dokter;
        dataresep={ctanggal:ctanggal,cpasien:cpasien,cpoli:cpoli,creg:creg,cno:cno,cdok:cdok}
        htmlresep += '<tr><td>'+pdata[key].nama_item+'</td><td>'+pdata[key].segma+'</td><td>'+pdata[key].ket_resep+'</td></tr>'
      });
      
        $('#tblCetakObatResep').html(htmlresep)
        $.each(dataresep,function(key,value){
          $('#'+key+'').text(dataresep[key])
        })
        toggleModalCetak()
       } 
      });
  }

    function cekDokter(){

    /*console.log($('#dokter_id').val());
    console.log('memulai seting');*/
    
     $.ajax({
            url: "<?php echo site_url('poli/'.'popup/cekDokter')?>"+'/'+sData.idpemeriksaan,
            method:'post',
            async:false,
            dataType: 'json',

            success: function(obj){
                $('#dokter_id').val(obj.dokter);            
                $('#dokter_id').prop('disabled',obj.status);
            },
          });
  }

function isidokter(){
      var items="";
      var data={ klinik_id:sData.klinik_id};
      var purl = '<?php echo site_url("poli/popup/ajaxDokter");?>';
       $.getJSON(purl,data,function(kdatas){
       if (jQuery.isEmptyObject(kdatas)){
      }else{
        for(var i in kdatas){
          var kel = kdatas[i];
         items+="<option value='"+kel.nik_dokter+"'>"+kel.nama_dokter+"</option>";
       } 
         $("#dokter_id option").remove();
         $("#dokter_id").append(items); 
        }
        cekDokter()

        }
    );
    }

function panggilreset(){
  reset();
}
resData='';
$(function(){
  var tgl=sData.tanggal_registrasi;
  var tglsplit=sData.tanggal_registrasi.split('-');
  if(tglsplit[0].length==4){tgl=tglsplit[2]+'-'+tglsplit[1]+'-'+tglsplit[0];}
  $('#frmResepTgl').val(tgl).next().prop('disabled',true);
  $('#frmResepRegister').val(sData.id);
  $('#frmResepNo').val('(auto)');
  $('#frmResepDokter').val('(auto)');
  $('div.bfh-datepicker').each(function () {
    var $datepicker = $(this)
    $datepicker.bfhdatepicker($datepicker.data())
  })
  //tak disable, ketoke form e ki auto kabeh
  $('#frmResep input').prop('disabled',true);


})

function cariObat(){
    jTable.fnFilter($('#cariObat').val());
  }
  function toggleModal(){
      $('#modalResep').modal({
    backdrop:false
  })
  }

  function toggleModalCetak(){
      $('#modalCetakResep').modal({
    backdrop:false
  })
  }
  function hapus(){
  if (resData){
  if(confirm('Yakin akan menghapus?')){
  //start hapus
   data={ id_detail:resData.id_detail};
     $.ajax({
            url: "<?php echo site_url('poli/'.'popup/deleteResep')?>",
            data: data,
            method:'post',
            dataType: 'json',

            success: function(obj){
              if(obj.success){
                oTable.fnDeleteRow(oTable.fnGetPosition(row));
                alert('data sudah dihapus');
                reset();
              }
            },
          });
resData='';
//end hapus
        };
      }else{
        alert('Silahkan pilih salah satu resep');
      }
}
  function reset(){
    $('#frmDetilResepJumlah').val('').prop('disabled',true);
    $('#frmDetilResepAturan').val('').prop('disabled',true);
    $('#frmDetilResepKet').val('').prop('disabled',true);
    $('#frmDetilResepKode').val('').prop('disabled',true);
    $('#frmDetilResepIdItem').val('').prop('disabled',true);
    $('#frmDetilResepNama').val('').prop('disabled',true);
    $('#obat_id').val('');
    $('#btnSimpanResep').prop('disabled',true);
    $('#btnResetResep').prop('disabled',true);
    $('#dokter_id').prop('disabled',true);
  }

  function pilihObat(){
    $('#frmDetilResepKode').val(tData.kode_item);
    $('#frmDetilResepJumlah').prop('disabled',false);
    $('#frmDetilResepAturan').prop('disabled',false);
    $('#frmDetilResepKet').prop('disabled',false);
    $('#frmDetilResepIdItem').val(tData.id_item);
    $('#frmDetilResepNama').val(tData.nama_item);
    $('#modalResep').modal('hide');
    $('#btnSimpanResep').prop('disabled',false);
    $('#btnResetResep').prop('disabled',false);
    oTable=$('#tblResep').dataTable();
  }

  function edit(){
    reset();
    if (resData){
    $('#frmDetilResepKode').val(resData.kode_item);
    $('#frmDetilResepIdItem').val(resData.id_item);
    $('#frmDetilResepNama').val(resData.nama_item);
    $('#frmDetilResepJumlah').val(resData.jumlah).prop('disabled',false);
    $('#frmDetilResepAturan').val(resData.segma).prop('disabled',false);
    $('#frmDetilResepKet').val(resData.ket_resep).prop('disabled',false);
    $('#obat_id').val(resData.id_detail);
    $('#btnSimpanResep').prop('disabled',false);
    $('#btnResetResep').prop('disabled',false);
    }else{
      alert('Silahkan pilih salah satu detail resep');
    }
  }
  


 $(document).on('click','#tblResep tr',function () 
  {
    resData = oTable.fnGetData( this );
    $('#tblResep tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });
 $(document).on('click','#tblListObat tr',function () 
  {
    tData = jTable.fnGetData( this );
    $('#tblListObat tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });
$(document).ready(function(){  
  isidokter();
   oTable=$('#tblResep').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajaxListResep')?>"+'/'+sData.idpemeriksaan,
        "aoColumns": [
            { "mData": "nama_item" },
            { "mData": "jumlah" },
            { "mData": "segma" },
            { "mData": "ket_resep" }

        ]
  });
   var poli_id = $('#id_poli').val(); 
    jTable=$('#tblListObat').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
      //"sScrollY":"200px",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajaxListObat')?>"+'/'+poli_id,
        "aoColumns": [
            { "mData": "kode_item" },
            { "mData": "nama_item" },
            { "mData": "nama_satuan" }
        ]
  });

  $('#frmDetilResep').submit(function(){
          data={
                idpemeriksaan:sData.idpemeriksaan,
                kode_item:$('#frmDetilResepIdItem').val(),
                jumlah:$('#frmDetilResepJumlah').val(),
                segma:$('#frmDetilResepAturan').val(),
                ket:$('#frmDetilResepKet').val(),
                id_detail:$('#obat_id').val(),
                obat_id:$('#obat_id').val(),
                dokter_id:$('#dokter_id').val(),
            };
          $.ajax({
            url: '<?php echo site_url('poli/'.'popup/simpanDetailResep')?>',
            data: data,
            method:'post',
            dataType: 'json',

            success: function(obj){
               if((obj.success==0)&&(obj.message!='')){
                alert(obj.message);
                reset();
              }else
              {
                reset();
              }
            },
          });
                oTable.fnClearTable();
                  oTable.fnDraw()
        return false;
      });
   //cekDokter()

});
</script>