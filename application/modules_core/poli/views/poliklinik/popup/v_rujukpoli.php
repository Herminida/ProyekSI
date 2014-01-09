<div class="span8">
	<form class="well" id="frmRujukPoli" name="frmRujukPoli">
		<table>
			<tr>
        <input type="hidden" id="dari_poli" name="dari_poli" value=''>
				<td><label for="register">Register</label></td>
				<td><input type="text" class="span3" id="register" name="register"></td>
			</tr>
			<tr>
				<td><label for="intern">Rujuk Intern</label></td>
				<td><select id="intern" name="intern">
          <option value="1">Anak</option>
					<option value="2">IGD</option>
          <option value="3">Dewasa</option>
          <option value="4">Gizi</option>
          <option value="5">Gigi</option>
          <option value="6">Imunisasi</option>
          <option value="7">Kebidanan</option>
          <option value="8">KB</option>
          <option value="10">Lansia</option>
					</select></td>
			</tr>
			<tr>
				<td><label for="ket_rujuk">keterangan</label></td>
				<td><input type="textarea" class="span3" id="ket_rujuk" name="ket_rujuk"></td>
			</tr>
			</table>
			<button id="btnSimpanRujukPoli" class="btn btn-small">Simpan</button>
	</form>		
	
		<table id="tblRujukIntern" class="table table-striped datatable">
          <thead>
            <tr>
              <th>Register</th>
              <th>Poli</th>
              <th>Tgl Register</th>
              <th>Antrian</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            </tr>
          </tbody>
        </table>
</div>

<script type="text/javascript">
 $(document).on('click','#tblRujukLab tr',function () 
  {
    rData = oTable.fnGetData( this );
    $('#tblRujukLab tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });
$(document).ready(function(){
var reg = $('#frmHell input[name="register"]').val();
console.log(reg);
  var registers = sData.id;
   oTable=$('#tblRujukIntern').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
      //"sScrollY":"200px",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajaxRujukPoli')?>"+'/'+registers,
        "aoColumns": [
            { "mData": "id" },
            { "mData": "nama_klinik" },
            { "mData": "tanggal_registrasi" },
            { "mData": "nomor_antrian" }
        ]
  });

var poli_perujuk = $('#id_poli').val();
$('#frmRujukPoli input[name="register"]').val(reg);
$('#frmRujukPoli input[name="dari_poli"]').val(poli_perujuk);
  $('#frmRujukPoli').submit(function(event){
    event.stopPropagation();
    $('#btnSimpanRujukPoli').prop('disabled',true);
          data={
                id:sData.id,
                idpemeriksaan:sData.idpemeriksaan,
                anggota_keluarga_id:sData.anggota_keluarga_id,
                klinik_id:$('#frmRujukPoli #intern').val(),
                bayar_id:sData.bayar_id,
                petugas_id:sData.petugas_id,
                nomor_antrian:sData.nomor_antrian,
                unit_kerja_id:sData.unit_kerja_id,
                kunjungan_jenis:sData.kunjungan_jenis,
                klinik_perujuk_id:poli_perujuk,
                ket_rujuk:$('#frmRujukPoli input[name="ket_rujuk"]').val()
            };
 // console.log(data);            
          $.ajax({
            url: '<?php echo site_url('poli/'.'popup/simpanRujukPoli')?>',
            data: data,
            method:'post',
            dataType: 'json',
            success: function(obj){
              if(obj.success){
                alert('data telah disimpan');
                      oTable.fnClearTable(0);
                      oTable.fnDraw();
                        resetlink();
                         jQuery(document).trigger('close.facebox') ;
        //reset();
              }
            },
          });
          $('#btnSimpanRujukPoli').prop('disabled',false);
        return false;
      });
});
</script>