<script type="text/javascript">
var popPermohonan='';
$( function () {
  popTable=$('#tblPermohonan').dataTable({
      "sRowSelect": "single",
      "sDom": "frtip",
      "bProcessing": true,
      "bServerSide": true,
      "sServerMethod": "POST",
      "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajax_data_permohonan')?>",
      "aoColumns": [
          { "mData": "register" },
          { "mData": "no_rm_tb" },
          { "mData": "id_permohonan_lab" },  
          { "mData": "nama_anggota" },
          { "mData": "nama_unit_kerja" },
          { "mData": "diagnosa" },
      ]
  });
  $(document).on('click','#tblPermohonan tr', function(){
    popPermohonan = popTable.fnGetData( this );
    $('#tblPermohonan tr.DTTT_selected').removeClass('DTTT_selected');
    $(this).addClass('DTTT_selected');
  });

  $('#btnPilihPermohonan').click(function(){
    if(popPermohonan){
      popPermohonan['caller_id']='<?php echo $caller_id?>';
      updatelinkPermohonan(popPermohonan);
      $(document).trigger('close.facebox');
    }else{
      alert('klik salah satu baris yang akan dipilih');
    }
    return false;
  })
});
</script>
<div class="span11">
    <div class="row">
      <div class="labelhr">
        <span class="label">Permohonan Lab</span>
      </div>
      <div><hr/></div>
    </div>
		<table id="tblPermohonan">
        <thead>
          <tr>
            <th>Register</th>
            <th>NIK TB</th>
            <th>Reg Lab</th>
            <th>Nama Pasien</th>
            <th>Yankes</th>
            <th>Alasan Pemeriksaan</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<button type="button" class="btn btn-small btn-primary" id="btnPilihPermohonan">Pilih</button>
<button type="button" class="btn btn-small" id="btnClosePermohonan" onclick="$(document).trigger('close.facebox');">Batal</button>
