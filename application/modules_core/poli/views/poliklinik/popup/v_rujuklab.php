  <div class="span8">
  	<form class="well" id="frmRujukLab" name="frmRujukLab">
  		<table>
  			<tr>
          <input type="hidden" id="id_lab" name="id_lab" value=''>
  				<td><label for="register">Register</label></td>
  				<td colspan="4"><input class="span3" type="text" id="register" name="register" readonly></td>
       </tr>
       <tr>
        <td><label class="checkbox">
          <input type="checkbox" id="sedimen" value="">
          Sedimen
        </label>
      </td>
      <td><label class="checkbox">
        <input type="checkbox" id="urine" value="">
        Urine
      </label>
    </td>
    <td><label class="checkbox">
      <input type="checkbox" id="hematologi" value="">
      Hematologi
    </label>
  </td>
  <td><label class="checkbox">
    <input type="checkbox" id="bakteriologi" value="">
    Bakteriologi
  </label>
</td>
<td><label class="checkbox">
        <input type="checkbox" id="hamil" value="">
        Tes Kehamilan
      </label>
    </td>
<td><label class="checkbox">
  <input type="checkbox" id="chkLainlain">
  Lain-lain
</label>
</td>
</tr>
<tr>
 <td><label for="lainlain">Lain-lain</label></td>
 <td colspan="4"><input class="span3" type="text"  id="lainlain" name="lainlain" disabled></td>
</tr>
</table>
<button class="btn btn-small" id="btnSimpan" name="btnSimpan">Simpan</button> 
</form>   
<button class="btn btn-small" id="btnEdit" name="btnEdit" onClick="edit();">Edit</button> 
<button class="btn btn-small" id="btnDelete" name="btnDelete" onClick="hapus();">Hapus</button> 
<table class="table datatable" id="tblRujukLab" name="tblRujukLab">
        <thead>
          <tr>
            <th>Sedimen</th>
            <th>Urine</th>
            <th>Hematologi</th>
            <th>Bakteriologi</th>
            <th>Tes Hamil</th>
            <th>Lain-Lain</th>
            <th>Waktu</th>
            <th style="display:none;">id</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="7">Loading</td>
          </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
var row='';

function hapus(){
   data={ id_lab:lData.id_lab};
     $.ajax({
            url: '<?php echo site_url('poli/'.'popup/deleteRujukLab')?>',
            data: data,
            method:'post',
            dataType: 'json',

            success: function(obj){
              if(obj.success){
                alert('data sudah dihapus');
              }
            },
          });
oTable.fnDeleteRow(oTable.fnGetPosition(row));
lData='';
}
  function reset(){
    $('#frmRujukLab input[name="id_lab"]').val('');
    $('#frmRujukLab input[name="lainlain"]').val('');
    $('#frmRujukLab input[type="checkbox"]').prop('checked',false).change();
  }
  function edit(){
    reset();
  $('#frmRujukLab input[name="id_lab"]').val(lData.id_lab);
  if (lData.sedimen=="on")$('#frmRujukLab #sedimen').prop('checked',true).change();
  if (lData.urine=="on")$('#frmRujukLab #urine').prop('checked',true).change();
  if (lData.hematologi=="on")$('#frmRujukLab #hematologi').prop('checked',true).change();
  if (lData.bakteriologi=="on")$('#frmRujukLab #bakteriologi').prop('checked',true).change();
  if (lData.tes_hamil=="on")$('#frmRujukLab #hamil').prop('checked',true).change();
  if (!(lData.lain=='')){
    $('#frmRujukLab #chkLainlain').prop('checked',true).change();
    $('#frmRujukLab input[name="lainlain"]').val(lData.lain);
  }
  //$('#frmRujukLab input[name="register"]').val(lData.id);

  }
  $(document).on('click','#tblRujukLab tr',function () 
  {
    lData = oTable.fnGetData( this );
    $('#tblRujukLab tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });
$(document).ready(function(){
  oTable=$('#tblRujukLab').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
      //"sScrollY":"200px",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.$source)?>",
        "aoColumns": [
            { "mData": "sedimen" },
            { "mData": "urine" },
            { "mData": "hematologi" },
            { "mData": "bakteriologi" },  
            { "mData": "tes_hamil" },
            { "mData": "lain" },
            { "mData": "time_lab" }
        ]
  });
/*
  var reg = $('#frmHell input[name="register"]').val();
  var unker = $('#frmHell input[name="unker"]').val();
  var dari_poli = $('#frmHell input[name="id_poli"]').val();
  var no_rm = $('#frmHell input[name="no_rm"]').val();
  */
  var dari_poli = $('#id_poli').val();
  $('#frmRujukLab input[name="register"]').val(sData.id);
  $('#frmRujukLab').submit(function(){
          data={
              sedimen:$('#frmRujukLab #sedimen').val()
              ,unker:sData.unker
              ,no_rm:sData.no_rm
              ,bayar_id:sData.bayar_id
              ,unit_kerja_id:sData.unit_kerja_id
              ,unker:sData.unit_kerja_id
              ,petugas_id:sData.petugas_id
              ,dari_poli:$('#id_poli').val()
              ,anggota_keluarga_id:sData.anggota_keluarga_id
              ,register:$('#frmRujukLab input[name="register"]').val()
              ,idpemeriksaan:sData.idpemeriksaan
              ,urine:$('#frmRujukLab #urine').val()
              ,hematologi:$('#frmRujukLab #hematologi').val()
              ,bakteriologi:$('#frmRujukLab #bakteriologi').val()
              ,hamil:$('#frmRujukLab #hamil').val()
              ,lainlain:$('#frmRujukLab input[name="lainlain"]').val()
              ,id_lab:$('#frmRujukLab input[name="id_lab"]').val()
            };
            console.log(data);
          $.ajax({
            url: '<?php echo site_url('poli/'.'popup/simpanRujukLab')?>',
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
        return false;
      });
  $('#chkLainlain').change(function(){
   if( $(this).is(':checked') ){
    $('#frmRujukLab input[name="lainlain"]').prop('disabled',false);
   }else{
    $('#frmRujukLab input[name="lainlain"]').val('');
    $('#frmRujukLab input[name="lainlain"]').prop('disabled',true);
   }
});

  $('#frmRujukLab input[type="checkbox"]').change(function(){
   if( $(this).is(':checked') ){
    $(this).val('on');
   }else{
    $(this).val('');
   }
});
});



</script>