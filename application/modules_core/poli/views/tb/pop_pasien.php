<script type="text/javascript">
var popData='';
$( function () {
  popTable=$('#tblPasien').dataTable({
      "sRowSelect": "single",
      "sDom": "frtip",
      "bProcessing": true,
      "bServerSide": true,
      "sServerMethod": "POST",
      "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajax_data_pasien')?>",
      "aoColumns": [
          { "mData": "no_rm" },
          { "mData": "nik" },
          { "mData": "nama_anggota" },
          { "mData": "no_kk" },  
          { "mData": "nama_kk" },
      ]
  });
  $(document).on('click','#tblPasien tr', function(){
    popData = popTable.fnGetData( this );
    $('#tblPasien tr.DTTT_selected').removeClass('DTTT_selected');
    $(this).addClass('DTTT_selected');
  });

  $('#btnPilihPasien').click(function(){
    if(popData){
      updatelink();
      $(document).trigger('close.facebox');
    }else{
      alert('klik salah satu baris yang akan dipilih');
    }
    return false;
  })
  resetlink()
});
</script>
<div class="span11">
    <div class="row">
      <div class="labelhr">
        <span class="label">Pasien</span>
      </div>
      <div><hr/></div>
    </div>
		<table id="tblPasien">
        <thead>
          <tr>
            <th>No. RM</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>No. KK</th>
            <th>Nama KK</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<button type="button" class="btn btn-small btn-primary" id="btnPilihPasien">Pilih</button>
<button type="button" class="btn btn-small" id="btnClosePasien" onclick="$(document).trigger('close.facebox');">Batal</button>
