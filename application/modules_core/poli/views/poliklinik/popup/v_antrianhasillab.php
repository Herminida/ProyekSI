<script type="text/javascript">
var sData='';
function pilihAntrian(){
  if(sData){
    resetlink();
  }else{
    alert('klik salah satu baris yang akan dipilih');
    return false;
  }
  $('#rowFrmAntrian input[name="register"]').val(sData.register_labkesda);
  $('#rowFrmAntrian input[name="nama_anggota"]').val(sData.nama_anggota);
  $('#rowFrmAntrian input[name="nik"]').val(sData.nik);
  $('#rowFrmAntrian input[name="umur"]').val(sData.umur);

  updatelink(sData);
  $(document).trigger('close.facebox');
}


$( function () {
  oTable=$('#tblAntrian').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
      //"sScrollY":"200px",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.$source)?>",
        "aoColumns": [
            { "mData": "register_labkesda" },
            { "mData": "no_rm" },
            { "mData": "nama_anggota" },
            { "mData": "umur" },  
            { "mData": "alamat" },
            { "mData": "kunjungan" },
            { "mData": "nama_kk" },
        ]
  });
  $(document).on('click','#tblAntrian tr',function () 
  {
    sData = oTable.fnGetData( this );
    $('#tblAntrian tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
  });

});
</script>
<div class="span12">
		<table class="table datatable" id="tblAntrian" name="tblAntrian">
        <thead>
          <tr>
            <th>Antrian</th>
            <th>No.RM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Jenis Kunjungan</th>
            <th>Nama KK</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="7">Loading</td>
          </tr>
        </tbody>
    </table>
</div>
<button class="btn btn-small btn-primary" id="btnPilihAntrian" onclick="pilihAntrian();">Pilih</button>
<button class="btn btn-small" id="btnCloseAntrian" onclick="$(document).trigger('close.facebox');">Batal</button>
