<script type="text/javascript">
var sData='';
function pilihAntrian(){
  if(sData){
    resetlink();
  }else{
    alert('klik salah satu baris yang akan dipilih');
    return false;
  }
  // $('#rowFrmAntrian button[name=reset]').click();
  $('#rowFrmAntrian input[name="register"]').val(sData.id);
  $('#rowFrmAntrian input[name="idpemeriksaan"]').val(sData.idpemeriksaan);
  $('#rowFrmAntrian input[name="anggota_keluarga_id"]').val(sData.anggota_keluarga_id);
  $('#rowFrmAntrian input[name="no_rm"]').val(sData.no_rm);
  $('#rowFrmAntrian input[name="validasi_reg"]').val(sData.validasi_reg);
  $('#rowFrmAntrian input[name="nama_anggota"]').val(sData.nama_anggota);
  $('#rowFrmAntrian input[name="nik"]').val(sData.nik);
  $('#rowFrmAntrian input[name="umur"]').val(sData.umur);
  $('#rowFrmAntrian input[name="wilayah"]').val(sData.wilayah);
  $('#rowFrmAntrian input[name="kunjungan_jenis"]').val(sData.kunjungan_jenis);
  $('#rowFrmAntrian input[name="kunjungan"]').val(sData.kunjungan);
  $('#rowFrmAntrian input[name="unit_kerja_id"]').val(sData.unit_kerja_id);
  $('#rowFrmAntrian input[name="wilayah"]').val(sData.nama_unit_kerja);
  $('#rowFrmAntrian input[name="status"]').val(sData.status);
  $('#rowFrmAntrian input[name="umurtahun"]').val(sData.umurtahun);
  $('#rowFrmAntrian input[name="alamat"]').val(sData.alamat);
  $('#rowFrmAntrian input[name="nama_kk"]').val(sData.nama_kk);
  $('#rowFrmAntrian input[name="no_kk"]').val(sData.no_kk);
  $('#rowFrmAntrian label[for="nomor_antrian"]').text(sData.nomor_antrian?sData.nomor_antrian:'');
  $(document).trigger('close.facebox');
  console.log(sData);
  updatelink(sData);
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
            { "mData": "nomor_antrian" },
            { "mData": "no_rm" },
            { "mData": "nama_anggota" },
            { "mData": "umur" },  
            { "mData": "alamat" },
            { "mData": "kunjungan" },
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
  <label class="radio inline">
    <input type="radio" name="filterRadios" id="filterRadios1"  value="0" checked>
    Belum Diperiksa
  </label>
  <label class="radio inline">
    <input type="radio" name="filterRadios" id="filterRadios2"  value="1" >
    Sudah Diperiksa
  </label>
  <label class="radio inline">
    <input type="radio" name="filterRadios" id="filterRadios3"  value="2" >
    Semua
  </label>
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
<button class="btn btn-small btn-primary" id="btnPilihAntrian" onclick="pilihAntrian();">Pilih</button>
<button class="btn btn-small" id="btnCloseAntrian" onclick="$(document).trigger('close.facebox');">Batal</button>
