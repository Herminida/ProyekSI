<div class="span8">
		<form class="well" id="frmTindakanMedis" name="frmTindakanMedis">
		<table>
			<tr>
				<td><label for="register">Register</label></td>
				<td><input type="text" class="span3" id="register" name="register" readonly></td>
        <input type="hidden" id="idPemeriksaan" name="idPemeriksaan" value=''>
			</tr>
			<tr>
        <input type="hidden" id="idTindakan" name="idTindakan" value=''>
        <input type="hidden" id="produk" name="produk" value=''>
				<td><label for="jenisTindakan">Jenis</label></td>
				<td><input type="text" id="jenisTindakan" name="jenisTindakan" readonly>
                        <a class="btn btn-small" type="button" onclick="toggleModal();" data-toggle="modal"><i class="icon-search"></i></a>
				</td>
			</tr>
      <tr>
        <td><label for="qtt_produk">Qtt</label></td>
        <td><input type="text" class="span3" id="qtt_produk" name="qtt_produk" ></td>
      </tr>
			</table>
			<button id="btnSubmit" class="btn btn-small">Simpan</button>
	</form>
  <button ="btn btn-small" name="btnDiagnosaEdit" id="btnTindakanEdit" onclick="edit()">Edit</button>
  <button ="btn btn-small" name="btnDiagnosaHapus" id="btnTindakanHapus" onclick="hapus();">Hapus</button>
			<table id="tblTindakanMedis" name="tblTindakanMedis" class="table datatable">
          <thead>
            <tr>
              <th>Produk</th>
              <th>Qtt</th>
              <th>Waktu Tindakan</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
    </div>
    <!-- Modal -->
<div id="modalTindakan" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
  <div class="input-append">
    <input type="text" id="cariTindakan">
    <button class="btn btn-small" onclick="cariTindakan()">Cari</button>
  </div>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
  <table id="tblListTindakan" name="tblListTindakan" class="table datatable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Produk</th>
              <th>Kelompok</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
</div>
<div class="modal-header">
<button class="btn" onClick="pilihTindakan();">Pilih</button>
</div>
</div>
  <script type="text/javascript">
  mData='';
  function cariTindakan(){
    jTable.fnFilter($('#cariTindakan').val());
  }
  function toggleModal(){
      $('#modalTindakan').modal({
    backdrop:false
  })
  }
  function hapus(){
    if(mData){
  if(confirm('Yakin akan menghapus?')){
  //start hapus
   data={ id:mData.id};
     $.ajax({
            url: "<?php echo site_url('poli/'.'popup/deleteTindakanMedis')?>",
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
mData='';
//end hapus
        };
        }else{
      alert('Silahkan pilih salah satu tindakan');
    }
}
  function reset(){
    $('#frmTindakanMedis input[name="idTindakan"]').val('');
    $('#frmTindakanMedis input[name="produk"]').val('');
    $('#frmTindakanMedis input[name="jenisTindakan"]').val('');
    $('#frmTindakanMedis input[name="qtt_produk"]').val('');
  }

  function pilihTindakan(){
    $('#frmTindakanMedis input[name="produk"]').val(tData.id);
    $('#frmTindakanMedis input[name="jenisTindakan"]').val(tData.namatindakan);
    $('#modalTindakan').modal('hide');
  }

  function edit(){
    if(mData){
    reset();
    //$('#frmTindakanMedis select[name="kasus"]').prop("disabled",false);
    $('#frmTindakanMedis input[name="idTindakan"]').val(mData.id);
    $('#frmTindakanMedis input[name="produk"]').val(mData.produk);
    $('#frmTindakanMedis input[name="jenisTindakan"]').val(mData.namatindakan);
    $('#frmTindakanMedis input[name="qtt_produk"]').val(mData.qtt_produk);
    }else{
      alert('Silahkan pilih salah satu tindakan');
    }
  }
  


 $(document).on('click','#tblTindakanMedis tr',function () 
  {
    mData = oTable.fnGetData( this );
    $('#tblTindakanMedis tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });
 $(document).on('click','#tblListTindakan tr',function () 
  {
    tData = jTable.fnGetData( this );
    $('#tblListTindakan tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });
$(document).ready(function(){  
   oTable=$('#tblTindakanMedis').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajaxTindakanPasien')?>"+'/'+sData.idpemeriksaan,
        "aoColumns": [
            { "mData": "namatindakan" },
            { "mData": "qtt_produk" },
            { "mData": "time_tindakan" }
        ]
  });
   var poli_id = $('#id_poli').val(); 
    jTable=$('#tblListTindakan').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
      //"sScrollY":"200px",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajaxTindakanKlinik')?>"+'/'+poli_id,
        "aoColumns": [
            { "mData": "id" },
            { "mData": "namatindakan" },
            { "mData": "tindakan_kelompok" }
        ]
  });
var reg = $('#frmHell input[name="register"]').val();
$('#frmTindakanMedis input[name="register"]').val(reg);
  $('#frmTindakanMedis').submit(function(){
    $('#btnSubmit').prop('disabled',true)
          data={
                id:$('#idTindakan').val(),
                qtt_produk:$('#qtt_produk').val(),
                produk:$('#produk').val(),
                register:sData.idpemeriksaan
            };
          $.ajax({
            url: '<?php echo site_url('poli/'.'popup/simpanTindakanMedis')?>',
            data: data,
            method:'post',
            dataType: 'json',

            success: function(obj){
              if(obj.success){
                alert('data telah disimpan');
                      oTable.fnClearTable(0);
                oTable.fnDraw();
                reset();
              }
            },
          });
          $('#btnSubmit').prop('disabled',false)
        return false;
      });
});
</script>