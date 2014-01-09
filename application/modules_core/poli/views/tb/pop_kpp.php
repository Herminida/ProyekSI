<script type="text/javascript">
var popKpp='';
$( function () {
  popTable=$('#tblKpp').dataTable({
      "sRowSelect": "single",
      "sDom": "frtip",
      "bProcessing": true,
      "bServerSide": true,
      "sServerMethod": "POST",
      "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajax_data_kpp')?>",
      "aoColumns": [
          { "mData": "no_rm_tb" },
          { "mData": "nama_anggota" },
          { "mData": "perujuk" },  
          { "mData": "tipe_pasien" },
          { "mData": "reg_upk" },
          { "mData": "reg_kab" },
          { "mData": "tgl" },
      ]
  });
  $(document).on('click','#tblKpp tr', function(){
    popKpp = popTable.fnGetData( this );
    $('#tblKpp tr.DTTT_selected').removeClass('DTTT_selected');
    $(this).addClass('DTTT_selected');
  });

  $('#btnPilihKpp').click(function(){
    if(popKpp){
      <?php if(!empty($callback)){
        echo $callback.'(popKpp);';
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
        <span class="label">Kartu Pengobatan Pasien (KPP)</span>
      </div>
      <div><hr/></div>
    </div>
		<table id="tblKpp">
        <thead>
          <tr>
            <th>RM TB</th>
            <th>Nama</th>
            <th>Perujuk</th>
            <th>Tipe Pasien</th>
            <th>No Reg TB 03 UPK</th>
            <th>No Reg TB 03 Kab</th>
            <th>Tgl Reg</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<button type="button" class="btn btn-small btn-primary" id="btnPilihKpp">Pilih</button>
<button type="button" class="btn btn-small" id="btnCloseKpp" onclick="$(document).trigger('close.facebox');">Batal</button>
