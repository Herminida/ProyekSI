  <div class="span9"> <!-- content span -->
    <ul class="nav nav-tabs">
      <li class="active">
        <a href="#">Gizi Buruk</a>
      </li>
    </ul>
    <form name="frmHell" id="frmHell" method="post" action="<?php echo site_url('poli/'.'poligiziburuk/simpan');?>">
      <?php $this->load->view('poliklinik/v_row_antrian');?>
      <div class="row">
        <div class="labelhr">
          <span class="label">Keterangan</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
        <div class="row" id="rowFrmGiBur">
       <div class="well span7">
        <table>
          <tr>
            <td><label for="tindak">Tindak Lanjut</label></td>
            <td><input type="text" id="isi" name="tindak" disabled></td>
          </tr>
          <tr>
            <td><label for="status">Status</label></td>
            <td><select class="kecil" id="isi" name="status" disabled>
              <option value="1">Lama</option>
              <option value="2">Baru</option>
            </select>
          </td>
        </tr>
        <tr>
            <input type="hidden" name="idPenyakit" value="">
            <input type="hidden" name="id_sgb" id="id_sgb" value="">
            <input type="hidden" name="idpemeriksaan" id="idpemeriksaan" value="">
          <td><label for="penyerta">Penyakit Penyerta</label></td>
          <td><div class="input-append">
            <input type="text" id="penyerta" name="penyerta" readonly>
            <button class="btn btn-small" type="button" onclick="tampilModalICD()" disabled><i class="icon-search"></i></button>
          </div>
          </td>
        </tr>
      </table>
       <button type="submit" id="btnSimpan" class="btn btn-primary btn-small">Simpan</button>
    <button type="button" id="btnReset" class="btn btn-small" onclick="resetlink()">Reset</button>
    </div><!--/row frm gibur-->
  </div>
<div class="row">
    <div class="labelhr">
      <span class="label">Riwayat Poli</span>
    </div>
    <div>
      <hr>
    </div>
  </div>
  <button ="btn btn-small" type="button" name="btnEdit" id="btnEdit" onclick="edit()">Edit</button>
  <button ="btn btn-small" type="button" name="btnHapus" id="btnHapus" onclick="hapus();">Hapus</button>
  <table class="table datatable" id="tblGiziBuruk">
    <thead>
      <tr>
        <th>Reg</th>
        <th>No. RM</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Penyakit</th>
        <th>Tindak Lanjut</th>
        <th>Status Kasus</th>

      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</form>
</div><!--/span9-->
<div id="modalICD" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
  <table id="tblListICD" name="tblListICD" class="table datatable">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Kelompok</th>
              <th>Sub Kelompok</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
</div>
<div class="modal-header">
<button class="btn" onClick="pilihICD();">Pilih</button>
</div>
</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
    var brData='';
    var sData='';
  function resetlink(){
     
    $('#rowFrmGiBur input[name="idPenyakit"]').val('');
    $('#rowFrmGiBur input[type="hidden"]').val('');
    $('#rowFrmGiBur input[type="text"]').val('');
    $('#rowFrmGiBur input[type="text"]').prop('disabled',true);
    $('#rowFrmGiBur button').prop('disabled',true);
    $('#rowFrmGiBur select').prop('disabled',true);
    resetAntrian();
  }

  function updatelink(Data){
    $('#rowFrmGiBur select').prop('disabled',false);
    $('#rowFrmGiBur input').prop('disabled',false);
    $('#rowFrmGiBur button').prop('disabled',false);
    getPemeriksaanGizi();
  }

  function getPemeriksaanGizi(){
    var purl = '<?php echo site_url("poli/poligiziburuk/ajaxpemeriksaan");?>'+'/'+sData.idpemeriksaan;
    $.getJSON(purl,function(gdata){
       if (jQuery.isEmptyObject(gdata)){
      }else{
        $('#rowFrmGiBur input[name="idPenyakit"]').val(gdata.penyakit);
        $('#rowFrmGiBur input[name="tindak"]').val(gdata.tindak_lanjut);
        $('#rowFrmGiBur input[name="status"]').val(gdata.status_kasus);
        $('#rowFrmGiBur input[name="penyerta"]').val(gdata.nama_penyakit);
        $('#idpemeriksaan').val(gdata.idpemeriksaan);
        $('#rowFrmGiBur #id_sgb').val(gdata.id_sgb);
        
        }
      });
  }

  function tampilModalICD(){
    $('#modalICD').modal({
      backdrop:false
    })
  }

  function pilihICD(){
    $('#rowFrmGiBur input[name="idPenyakit"]').val(icData.id);
    $('#rowFrmGiBur input[name="penyerta"]').val(icData.nama_penyakit);
    $('#modalICD').modal('hide');
  }
  function hapus(){
    if(brData){
  if(confirm('Yakin akan menghapus?')){
  //start hapus
   data={ id:brData.id};
     $.ajax({
            url: "<?php echo site_url('poli/'.'poligiziburuk/hapus')?>",
            data: data,
            method:'post',
            dataType: 'json',

            success: function(obj){
              if(obj.success){
                oTable.fnDeleteRow(oTable.fnGetPosition(row));
                alert('data sudah dihapus');
                resetlink();
              }
            },
          });
brData='';
//end hapus
        };
        }else{
      alert('Silahkan pilih salah satu tindakan');
    }
}

  function edit(){
    if(brData){
    resetlink();

    //$('#frmTindakanMedis select[name="kasus"]').prop("disabled",false);
    console.log(brData);
   $('#rowFrmGiBur input[name="idPenyakit"]').val(brData.penyakit);
        $('#rowFrmGiBur input[name="tindak"]').val(brData.tindak_lanjut);
        $('#rowFrmGiBur input[name="status"]').val(brData.status_kasus);
        $('#rowFrmGiBur input[name="penyerta"]').val(brData.nama_penyakit);
        $('#id_sgb').val(brData.id_sgb);
        $('#register').val(brData.register);
        $('#nik').val(brData.nik);
        $('#nama_anggota').val(brData.nama_anggota);
        $('#umur').val(brData.umur);
        $('#status').val(brData.status);
        $('#no_kk').val(brData.no_kk);
        $('#nama_kk').val(brData.nama_kk);
        $('#alamat').val(brData.alamat);
        $('#wilayah').val(brData.wilayah);
        $('#kunjungan').val(brData.kunjungan);

            $('#rowFrmGiBur select').prop('disabled',false);
    $('#rowFrmGiBur input').prop('disabled',false);
    $('#rowFrmGiBur button').prop('disabled',false);
    }else{
      alert('Silahkan pilih salah satu data');
    }
  }

  $(document).on('click','#tblListICD tr',function () 
  {
    icData = jTable.fnGetData( this );
    $('#tblListICD tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });

  $(document).on('click','#tblGiziBuruk tr',function () 
    {
      brData = oTable.fnGetData( this );
      console.log(brData)
      $('#tblGiziBuruk tr').each(function (){
        $(this).removeClass('DTTT_selected');
      });
      $(this).addClass('DTTT_selected');
      row = $(this).closest("tr").get(0);
    });


 jQuery(document).ready(function($) {
    oTable=$('#tblGiziBuruk').dataTable({
    "sRowSelect": "single",
    "sDom": "trtip",
    "bScrollCollapse": false, 
      //"sScrollY":"200px",
      "bProcessing": true,
      "bServerSide": true,
      "sAjaxSource": "<?php echo site_url('poli/'.'poligiziburuk/ajaxgiziburuk')?>",
      "aoColumns": [
      { "mData": "register" },
      { "mData": "no_rm" },
      { "mData": "nama_anggota" },
      { "mData": "umur" },
      { "mData": "nama_penyakit" },
      { "mData": "tindak_lanjut" },
      { "mData": "statkas" }

     
      ]
    });
   
   jTable=$('#tblListICD').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
      //"sScrollY":"200px",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'popup/ajaxListPenyakit')?>",
        "aoColumns": [
            { "mData": "kode_penyakit" },
            { "mData": "nama_penyakit" },
            { "mData": "nama_subkelompok" }
        ]
  });
  $('a[rel*=facebox]').facebox()

    $('#frmHell').submit(function(){
    $('#btnSimpan').prop('disabled',true);
    var err=false;
    $('#rowFrmGiBur #isi').each(function(){
      if($(this).val()=='') err=true;
    });
    if(err){
      alert('Isian belum lengkap');
      $('#btnSimpan').prop('disabled',false);
    }else{
      var idpem = "";
      if (!sData){
        idpem = $('#idpemeriksaan').val();
      }else{
        idpem = sData.idpemeriksaan;
      }
      data={
        tindak_lanjut:$('#rowFrmGiBur input[name="tindak"]').val()
        ,status_kasus:$('#rowFrmGiBur select').val()
        ,id_penyakit:$('#rowFrmGiBur input[name="idPenyakit"]').val()
        ,idpemeriksaan:idpem
        ,id_sgb: $('#id_sgb').val()
      };
      $.ajax({
        url: "<?php echo site_url('poli/'.'poligiziburuk/simpan')?>",
        data: data,
        method:'post',
        dataType: 'json',
        success: function(obj){
          if(obj.success){
           oTable = $('#tblGiziBuruk').dataTable();
           oTable.fnClearTable();
           alert('data sudah tersimpan');
           resetlink();
           sData="";
           brData="";
           return false;
         }
       },
     });
    }
    return false;
  });

  

   resetlink();
}) 
  </script>
