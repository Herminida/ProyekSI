<script type="text/javascript">
diData='';
function cariPenyakit(){
  jTable.fnFilter($('#cariPenyakit').val());
}

function hapus(){
  if(diData){
  if(confirm('Yakin akan menghapus?')){
  //start hapus
   data={ idDiag:diData.id_diagnosa};
     $.ajax({
            url: "<?php echo site_url('poli/'.'popup/deleteDiagnosa')?>",
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
diData='';
//end hapus
        };
        }else{
      alert('Silahkan pilih salah satu diagnosa');
    }
}
  function reset(){
    $('#frmDiagnosa input[name="idICD"]').val('');
    $('#frmDiagnosa input[name="idDiagnosa"]').val(diData.id_diagnosa);
    $('#frmDiagnosa input[name="kodeICD"]').val('');
    $('#frmDiagnosa input[name="namaPenyakit"]').val('');
    $('#frmDiagnosa select[name="kasus"]').prop('disabled',true);
    
  }
  function edit(){
    if(diData){
    reset();
    $('#frmDiagnosa input[name="idDiagnosa"]').val(diData.id_diagnosa);
    $('#frmDiagnosa input[name="idICD"]').val(diData.id);
    $('#frmDiagnosa select[name="kasus"]').val(diData.kasus);
    $('#frmDiagnosa select[name="kasus"]').prop("disabled",false);
    $('#frmDiagnosa input[name="kodeICD"]').val(diData.kode_penyakit);
    $('#frmDiagnosa input[name="namaPenyakit"]').val(diData.
      nama_penyakit);
    }else{
      alert('Silahkan pilih salah satu diagnosa');
    }
  }
function tampilModalICD(){
  jTable.fnFilter('');
  $('#modalICD').modal({
    backdrop:false
  })
}
function pilihICD(){
    $('#frmDiagnosa input[name="idICD"]').val(icData.id);
    $('#frmDiagnosa select[name="kasus"]').prop('disabled',false);
    $('#frmDiagnosa input[name="kodeICD"]').val(icData.kode_penyakit);
    $('#frmDiagnosa input[name="namaPenyakit"]').val(icData.nama_penyakit);
    $('#modalICD').modal('hide');

}
$(document).on('click','#tblDiagnosa tr',function () 
  {
    diData = oTable.fnGetData(this);
    $('#tblDiagnosa tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });
 $(document).on('click','#tblListICD tr',function () 
  {
    icData = jTable.fnGetData( this );
    $('#tblListICD tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });
$(document).ready(function(){  
   oTable=$('#tblDiagnosa').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajaxListDiagnosa')?>"+'/'+sData.idpemeriksaan,
        "aoColumns": [
        //id_diagnosa,register,icd,time_diagnosa,kasus,kode_penyakit,nama_penyakit,nama_subkelompok,subkelompok,nama_kelompok,kelompok
            { "mData": "nama_kelompok" },
            { "mData": "nama_subkelompok" },
            { "mData": "kode_penyakit" },
            { "mData": "nama_penyakit" },
            { "mData": "jeniskasus" }
        ]
  });
   var poli_id = $('#id_poli').val(); 
    jTable=$('#tblListICD').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
      //"sScrollY":"200px",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajaxListPenyakit')?>",
        "aoColumns": [
            { "mData": "kode_penyakit" },
            { "mData": "nama_penyakit" },
            { "mData": "nama_subkelompok" }
        ]
  });
    //var j = new FixedHeader(jTable);
  $('#btnDiagnosaSimpan').click(function(){
          data={
                register:sData.idpemeriksaan,
                icd:icData.id,
                kasus:$('#frmDiagnosa select[name="kasus"]').val(),
                idDiag:$('#frmDiagnosa input[name="idDiagnosa"]').val(),
            };
            console.log(data);
          $.ajax({

            url: "<?php echo site_url('poli/'.'popup/simpanDiagnosa')?>",
            data: data,
            method:'post',
            dataType: 'json',
            success: function(data){
              if(data.success){
                alert('data telah disimpan');
                      oTable.fnClearTable(0);
      oTable.fnDraw();
      diData="";
        reset();
              }
            },
          });
        return false;
      });
});
 $(document).ready(function(){
  var reg = $('#frmHell input[name="register"]').val();
  $('#frmDiagnosa input[name="register"]').val(reg);
});
</script>
<div class="span10">
	<form class="well" name="frmDiagnosa" id="frmDiagnosa">
    <input type="hidden" name="idDiagnosa" id="idDiagnosa" value=''>
		<table>
			<tr>
				<td><label for="register">Register</label></td>
				<td><input type="text" class="span3" id="register" name="register"></td>
			</tr>
			<tr>
        <input type="hidden" name="idICD" id="idICD" value=''>
				<td><label for="frmDiagnosaICD">ICD</label></td>
				<td>
          <div class="input-append">
          <input type="text" class="span3" id="kodeICD" name="kodeICD">
          <a class="btn btn-small" type="button"  onclick="tampilModalICD();" data-toggle="modal"><i class="icon-search"></i></a>
        </div>
        </td>
			</tr>
			<tr>
				<td><label for="namaPenyakit">Nama Penyakit</label></td>
				<td><input type="text" class="span3" id="namaPenyakit" name="namaPenyakit"></td>
			</tr>
			<tr>
				<td><label for="kasus">Kasus</label></td>
				<td><select id="kasus" name="kasus" disabled>
					<option value="0">Lama</option>
					<option value="1">Baru</option>
					</select>
				</td>
			</tr>
			</table>
			<button ="btn btn-small" type="button" name="btnDiagnosaSimpan" id="btnDiagnosaSimpan">Simpan</button>
      </form>   
      <button ="btn btn-small" name="btnDiagnosaEdit" id="btnDiagnosaEdit" onclick="edit()">Edit</button>
      <button ="btn btn-small" name="btnDiagnosaHapus" id="btnDiagnosaHapus" onclick="hapus();">Hapus</button>

	<table class="table datatable" id="tblDiagnosa" name="tblDiagnosa" >
          <thead>
            <tr>
              <th>Kelompok</th>
              <th>Sub Kelompok</th>
              <th>Kode</th>
              <th>Nama</th>
              <th>Kasus</th>
            </tr>
          </thead>
          <tbody>
         </tbody>
        </table>
    </div>
<div id="modalICD" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
  <div class="input-append">
<input type="text" id="cariPenyakit">
<button id="btnCariPenyakit" name="btnCariPenyakit" onclick="cariPenyakit();">Cari</button>
</div>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
  <table id="tblListICD" name="tblListICD" class="table datatable">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Kelompok</th>
              <th>Sub Kelompok</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
</div>
<div class="modal-header">
<button class="btn" onClick="pilihICD();">Pilih</button>
</div>