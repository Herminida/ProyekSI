    <div class="row" id="rowRiwayatKesehatan">
        <div class="labelhr">
          <span class="label">Riwayat Kesehatan :</span>
          <button type="button" href="#modalRiwayatKesehatan" role="button" data-toggle="modal" class="btn btn-small">Tambah</button>
        </div>
        <div><hr></div>
        <div class="span9">
          <table class="table table-striped" id="tabelRiwayatKesehatan">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Alergi Obat</th>
                  <th>Riwayat Kronis Sebelumnya</th>
                  <th>Riwayat Kronis Sekeluarga</th>
                  <th>Waktu</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
          <em class="text-warning">tidak ada data riwayat kesehatan</em>
        </div>
    </div>

<div id="modalRiwayatKesehatan" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalRiwayatKesehatanLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="modalRiwayatKesehatanLabel">Tambah Riwayat</h3>
  </div>
  <div class="modal-body">
    <p>
      <input type="hidden" name="id_alergi" class="input-large">
      <table width="100%">
        <tr><td><label for="alergi_obat">Alergi Obat</label></td><td><input type="text" name="alergi_obat" id="alergi_obat" class="input-large"></td></tr>
        <tr><td><label for="kronis_sebelumnya">Kronis Sebelumnya</label></td><td><input type="text" name="kronis_sebelumnya" id="kronis_sebelumnya" class="input-large"></td></tr>
        <tr><td><label for="kronis_keluarga">Kronis Keluarga</label></td><td><input type="text" name="kronis_keluarga" id="kronis_keluarga" class="input-large"></td></tr>
      </table>
    </p>
  </div>
  <div class="modal-footer">
    <button class="btn btn-small btn-primary" id="btnRiwayatKesehatanSimpan">Simpan</button>
    <button class="btn btn-small" data-dismiss="modal" aria-hidden="true">Batal</button>
  </div>
</div>
<script type="text/javascript">
$(function(){
    // resetRiwayatKesehatan();
    // updateRiwayatKesehatan(4);
    $('#btnRiwayatKesehatanSimpan').click(function(){
        data={};
        $('#modalRiwayatKesehatan input').each(function(){
          data[$(this).attr('name')]=$(this).val();
        });
        data['nama']=sData.nama_anggota;
        data['no_rm']=sData.no_rm;
        // console.log(data);
        $.ajax({
          url: '<?php echo site_url('poli/'.'poliriwayat/simpanalergi')?>',
          data: data,
          method:'post',
          dataType: 'json',
          success: function(obj){
            // console.log(obj);
            if(obj.success){
              alert('data sudah tersimpan');
              updateRiwayatKesehatan();
              $('#modalRiwayatKesehatan').modal('hide')
            }else if(obj.error!=''){
              alert(obj.error);
            }
          },
        });
        return false;
    });
});

function resetRiwayatKesehatan(){
    $('button[href="#modalRiwayatKesehatan"]').prop('disabled',true);
    $('#tabelRiwayatKesehatan').hide().next().show();
    $('#tabelRiwayatKesehatan tbody').html('');
}

function updateRiwayatKesehatan(){
  $('button[href="#modalRiwayatKesehatan"]').prop('disabled',false);
  $('#modalRiwayatKesehatanLabel').html('Tambah Riwayat');
  $.getJSON("<?php echo site_url('poli/'.'poliriwayat/kesehatan')?>/"+sData.no_rm,null,function(obj){
      // console.log(obj);
      var htmltbody='';
      for(var i in obj){
        htmltbody+='<tr><td>'+obj[i].id_alergi
                  +'</td><td>'+obj[i].alergi_obat
                  +'</td><td>'+obj[i].kronis_sebelumnya
                  +'</td><td>'+obj[i].kronis_keluarga
                  +'</td><td>'+obj[i].waktu
                  +'</td><td><a href="#'+obj[i].id_alergi+'" rel="ubah">Ubah</a> <a href="#'+obj[i].id_alergi+'" rel="hapus">Hapus</a>'
                  +'</td></tr>';
      }
      $('#tabelRiwayatKesehatan tbody').html(htmltbody);
      if(htmltbody!=''){
        $('#tabelRiwayatKesehatan').show().next().hide();
        $('#tabelRiwayatKesehatan a[rel="ubah"]').click(function(){
          var kronis_keluarga=$(this).parent().prev().prev();
          var kronis_sebelumnya=kronis_keluarga.prev()
          var alergi_obat=kronis_sebelumnya.prev()
          var id_alergi=$(this).attr('href').replace('#','');
          $('#modalRiwayatKesehatan input[name="id_alergi"]').val(id_alergi);
          $('#modalRiwayatKesehatan input[name="alergi_obat"]').val(alergi_obat.html());
          $('#modalRiwayatKesehatan input[name="kronis_sebelumnya"]').val(kronis_sebelumnya.html());
          $('#modalRiwayatKesehatan input[name="kronis_keluarga"]').val(kronis_keluarga.html());
          $('#modalRiwayatKesehatan').modal('show')
          return false;
        })
        $('#tabelRiwayatKesehatan a[rel="hapus"]').click(function(){
          if(confirm('Yakin akan menghapus?')){
            var id_alergi=$(this).attr('href').replace('#','');
            $.getJSON("<?php echo site_url('poli/'.'poliriwayat/hapusalergi')?>/"+id_alergi,null,function(obj){
              if(obj.success){
                alert('data sudah terhapus');
                updateRiwayatKesehatan();
              }else if(obj.error!=''){
                alert(obj.error);
              }
            });
          }
        })
      }
  });
}
</script>