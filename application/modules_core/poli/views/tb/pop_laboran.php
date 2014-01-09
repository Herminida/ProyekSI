<script type="text/javascript">
var popLaboran='';
$( function () {
  popTable=$('#tblLaboran').dataTable({
      "sRowSelect": "single",
      "sDom": "frtip",
      "bProcessing": true,
      "bServerSide": true,
      "sServerMethod": "POST",
      "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajax_data_laboran')?>",
      "aoColumns": [
          { "mData": "nip_pegawai" },
          { "mData": "nama_pegawai" },
          { "mData": "nama_jabatan" },
          { "mData": "nama_unit_kerja" },
      ]
  });
  $(document).on('click','#tblLaboran tr', function(){
    popLaboran = popTable.fnGetData( this );
    $('#tblLaboran tr.DTTT_selected').removeClass('DTTT_selected');
    $(this).addClass('DTTT_selected');
  });

  $('#btnPilihLaboran').click(function(){
    if(popLaboran){
      updatelinkLaboran(popLaboran);
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
        <span class="label">Laboran</span>
      </div>
      <div><hr/></div>
    </div>
		<table id="tblLaboran">
        <thead>
          <tr>
            <th>NIP</th>
            <th>Nama Laboran</th>
            <th>Jabatan</th>
            <th>Unit Kerja</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<button type="button" class="btn btn-small btn-primary" id="btnPilihLaboran">Pilih</button>
<button type="button" class="btn btn-small" id="btnCloseLaboran" onclick="$(document).trigger('close.facebox');">Batal</button>
