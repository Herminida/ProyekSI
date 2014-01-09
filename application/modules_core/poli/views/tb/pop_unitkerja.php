<script type="text/javascript">
var popUnitkerja='';
$( function () {
  popTable=$('#tblUnitkerja').dataTable({
      "sRowSelect": "single",
      "sDom": "frtip",
      "bProcessing": true,
      "bServerSide": true,
      "sServerMethod": "POST",
      "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajax_data_unitkerja')?>",
      "aoColumns": [
          { "mData": "kode_unit_kerja" },
          { "mData": "nama_unit_kerja" },
          { "mData": "alamat" },
          { "mData": "telp" },
          { "mData": "fax" },
          { "mData": "kepala" },
          { "mData": "kode_jabatan" },
          { "mData": "nip" },
      ]
  });
  $(document).on('click','#tblUnitkerja tr', function(){
    popUnitkerja = popTable.fnGetData( this );
    $('#tblUnitkerja tr.DTTT_selected').removeClass('DTTT_selected');
    $(this).addClass('DTTT_selected');
  });

  $('#btnPilihUnitkerja').click(function(){
    if(popUnitkerja){
      <?php if(!empty($callback)){
        echo $callback.'(popUnitkerja);';
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
        <span class="label">Unit Kerja</span>
      </div>
      <div><hr/></div>
    </div>
		<table id="tblUnitkerja">
        <thead>
          <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Fax</th>
            <th>Kepala</th>
            <th>Kode Jabatan</th>
            <th>NIP</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<button type="button" class="btn btn-small btn-primary" id="btnPilihUnitkerja">Pilih</button>
<button type="button" class="btn btn-small" id="btnCloseUnitkerja" onclick="$(document).trigger('close.facebox');">Batal</button>
