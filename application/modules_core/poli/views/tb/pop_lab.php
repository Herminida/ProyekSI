<script type="text/javascript">
var popLab='';
$( function () {
  popTable=$('#tblLab').dataTable({
      "sRowSelect": "single",
      "sDom": "frtip",
      "bProcessing": true,
      "bServerSide": true,
      "sServerMethod": "POST",
      "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajax_data_lab')?>",
      "aoColumns": [
          { "mData": "register" },
          { "mData": "no_rm_tb" },
          { "mData": "nama_anggota" },
          { "mData": "nama_unit_kerja" },
          { "mData": "nama_pegawai" },
          { "mData": "diagnosa" },
          { "mData": "tgl_pemeriksaan" },
          { "mData": "hasil_s1" },
          { "mData": "hasil_p" },
          { "mData": "hasil_s2" },
      ]
  });
  $(document).on('click','#tblLab tr', function(){
    popLab = popTable.fnGetData( this );
    $('#tblLab tr.DTTT_selected').removeClass('DTTT_selected');
    $(this).addClass('DTTT_selected');
  });

  $('#btnPilihLab').click(function(){
    if(popLab){
      <?php if(!empty($callback)){
        echo $callback.'(popLab);';
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
        <span class="label">Hasil Lab</span>
      </div>
      <div><hr/></div>
    </div>
		<table id="tblLab">
        <thead>
          <tr>
            <th>Register</th>
            <th>NIK TB</th>
            <th>Nama</th>
            <th>Yankes</th>
            <th>Laboran</th>
            <th>Alasan Pemeriksaan</th>
            <th>Tgl Pemeriksaan</th>
            <th>Hasil S1</th>
            <th>Hasil P</th>
            <th>Hasil S2</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<button type="button" class="btn btn-small btn-primary" id="btnPilihLab">Pilih</button>
<button type="button" class="btn btn-small" id="btnCloseLab" onclick="$(document).trigger('close.facebox');">Batal</button>
