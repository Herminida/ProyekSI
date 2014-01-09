<script type="text/javascript">


function test(){
$('.frmHell input[name="register"]').val('something');
$(document).trigger('close.facebox');
}
  

$(document).ready( function () {
  $('#tblAntrian').dataTable({
    
    "oTableTools": {
      "sRowSelect": "single"
    },
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
            { "mData": "id","bVisible":false }
        ]
  });
} );
</script>
<div class="span12">
		<table class="table datatable" id="tblAntrian" name="tblAntrian">
          <thead>
            <th>Antrian</th>
            <th>No.RM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Jenis Kunjungan</th>
            <th>Nama KK</th>
            <th style="display:none;">id</th>
          </thead>
    </table>
</div>
<btn class="btn btn-small" name="btnDiagnosaSimpan" id="btnDiagnosaSimpan" onclick='test();' >Pilih</a>