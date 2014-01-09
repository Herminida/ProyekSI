<script type="text/javascript">
var sData='';
function pilihAntrian(){
  // console.log(sData);
  //resetlink();
  $('#frmHell button[name=reset]').click();
  //$('#frmHell input[name="register2"]').val(sData.no_rm);
  $('#frmHell input[name="register"]').val(sData.no_rm);
  $('#frmHell input[name="validasi_reg"]').val(sData.validasi_reg);
  $('#frmHell input[name="nama_anggota"]').val(sData.nama_anggota);
  $('#frmHell input[name="nik"]').val(sData.nik);
  $('#frmHell input[name="umur"]').val(sData.umur);
  $('#frmHell input[name="umurtahun"]').val(sData.umurtahun);
  $('#frmHell input[name="alamat"]').val(sData.alamat);
  $('#frmHell input[name="nama_kk"]').val(sData.nama_kk);
  $('#frmHell input[name="no_kk"]').val(sData.nama_kk);
  $('#frmHell label[for="nomor_antrian"]').text(sData.nomor_antrian?sData.nomor_antrian:'');
  $(document).trigger('close.facebox');
  updatelink(sData.no_rm);
}


  //    $("#example tbody").click(function(event) {
  //   $(oTable.fnSettings().aoData).each(function (){
  //     $(this.nTr).removeClass('row_selected');
  //   });
  //   $(event.target.parentNode).addClass('row_selected');
  // });

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
            { "mData": "nomor_antrian" },
            { "mData": "no_rm" },
            { "mData": "nama_anggota" },
            { "mData": "umur" },  
            { "mData": "alamat" },
            { "mData": "kunjungan_jenis" },
            { "mData": "nama_kk" },
            { "mData": "id","bVisible":false },
            { "mData": "validasi_reg","bVisible":false }
        ]
  });
  $(".span12 input:radio").change(function(i){
     oTable.fnFilter(this.value,8);
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
     <input type="text" name="search" id="search">
     <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'polidewasa/antrian');?>" rel="facebox"><i class="icon-search"></i></a>
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
<button class="btn btn-small" id="btnPilihAntrian" onclick="pilihAntrian();">Pilih</button>
<button class="btn btn-small" id="btnCloseAntrian" onclick="$(document).trigger('close.facebox');">Batal</button>
s