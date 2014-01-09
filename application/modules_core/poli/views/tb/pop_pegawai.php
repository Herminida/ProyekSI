<script type="text/javascript">
var popPegawai='';
$( function () {
  popTable=$('#tblPegawai').dataTable({
      "sRowSelect": "single",
      "sDom": "frtip",
      "bProcessing": true,
      "bServerSide": true,
      "sServerMethod": "POST",
      "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajax_data_pegawai')?>",
      "aoColumns": [
          { "mData": "nip_pegawai" },
          { "mData": "nama_pegawai" },
          { "mData": "nama_jabatan" },
          { "mData": "pangkat" },
          { "mData": "nama_unit_kerja" },
      ]
  });
  $(document).on('click','#tblPegawai tr', function(){
    popPegawai = popTable.fnGetData( this );
    $('#tblPegawai tr.DTTT_selected').removeClass('DTTT_selected');
    $(this).addClass('DTTT_selected');
  });

  $('#btnPilihPegawai').click(function(){
    if(popPegawai){
      <?php if(!empty($callback)){
        echo $callback.'(popPegawai);';
      }?>
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
        <span class="label">Pegawai</span>
      </div>
      <div><hr/></div>
    </div>
		<table id="tblPegawai">
        <thead>
          <tr>
            <th>NIP</th>
            <th>Nama Pegawai</th>
            <th>Jabatan</th>
            <th>Pangkat</th>
            <th>Unit Kerja</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<button type="button" class="btn btn-small btn-primary" id="btnPilihPegawai">Pilih</button>
<button type="button" class="btn btn-small" id="btnClosePegawai" onclick="$(document).trigger('close.facebox');">Batal</button>
