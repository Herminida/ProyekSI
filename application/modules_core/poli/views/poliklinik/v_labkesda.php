    <div class="span9"> <!-- content span -->
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Register Labkesda</a>
          </li>
         </ul>
          <form name="frmHell" id="frmHell">
               <?php $this->load->view('poliklinik/v_row_antrian_labkesda');?>
<div class="row">
  <div class="span7 well">
     <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">Kunjungan Puskesmas</span>
        </div>
        <div>
          <hr>
        </div>
    </div>
      <table>
        <tr>
        <td><label >Puskesmas</label></td>
        <td>
          <select id="id_unit_kerja" name="id_unit_kerja">
            <option value="1">Puskesmas Karang Rejo</option>
            <option value="2">Puskesmas Mamburungan</option>
            <option value="3">Puskesmas Gunung Lingkas</option>
            <option value="4">Puskesmas Juata Laut</option>
            <option value="5">Puskesmas Juata Permai</option>
            <option value="6">Puskesmas Pantai Amal</option>
            <option value="7">Puskesmas Sebengkok</option>
            <option value="8">Dinas Kesehatan Kota Tarakan</option>
          </select>
      </td>
      <td><label >Jenis Kunjungan</label></td>
      <td>
          <select class="kecil" id="id_kunjungan" name="id_kunjungan">
            <option value="1">Lama</option>
            <option value="2">Baru</option>
          </select>
      </td>
</tr>
     </table>
</div>
</div>

<div class="row"> <!--pemeriksaan-->
<div class="span7 well">
  <div class="row">
        <div class="labelhr">
          <span class="label">Pemeriksaan</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <table>
        <tr>
         <tr>
        <td><label class="checkbox">
          <input type="checkbox" id="sedimen" name="sedimen" value="">
          Sedimen
        </label>
      </td>
      <td><label class="checkbox">
        <input type="checkbox" id="urine" name="urine" value="">
        Urine
      </label>
    </td>
    <td><label class="checkbox">
      <input type="checkbox" id="hematologi" name="hematologi" value="">
      Hematologi
    </label>
  </td>
  <td><label class="checkbox">
    <input type="checkbox" id="bakteriologi" name="bakteriologi" value="">
    Bakteriologi
  </label>
</td>
<td><label class="checkbox">
        <input type="checkbox" id="hamil" name="hamil" value="">
        Tes Kehamilan
      </label>
    </td>
<td><label class="checkbox">
  <input type="checkbox" id="chkLainlain" name="chkLainlain">
  Lain-lain
</label>
</td>
</tr>
<tr>
 <td><label for="lainlain">Lain-lain</label></td>
 <td colspan="4"><input class="span3" type="text"  id="lainlain" name="lainlain" disabled></td>
</tr>
<input type="hidden" id="id_lab" name="id_lab" value=''>
     </table>
</div>
</div>
    <button class="btn-primary btn-small" id="btnSimpan" name="btnSimpan" disabled>SIMPAN</button>
    <button type="button" class="btn btn-small" id="btnReset" onclick="resetlink();"  name="btnReset" disabled>RESET</button>
   </form>

<table id="tblLabkesda">
  <thead>
    <tr>
      <th>Register</th>
      <th>Nik</th>
      <th>Nama</th>
      <th>Umur</th>
      <th>Alamat</th>
      <th>Tgl Register</th>
      <th>Status</th>
      <th>Puskesmas</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
</div><!--/span9-->
</div><!--/row-->

</div><!--/.fluid-container-->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
    $('#chkLainlain').change(function(){
     if( $(this).is(':checked') ){
      $('#lainlain').prop('disabled',false);
    }else{
      $('#lainlain').val('');
      $('#lainlain').prop('disabled',true);
    }
  });
    $('#frmHell input[type="checkbox"]').change(function(){
   if( $(this).is(':checked') ){
    $(this).val('on');
   }else{
    $(this).val('');
   }
});

   
  function resetlink(){
    $('#frmHell select').prop('disabled',true);
    $('#frmHell input[type="checkbox"]').prop('disabled',true);
    $('#frmHell input[type="checkbox"]').prop('checked',false).change();
    resetAntrian();
  }

  function updatelink(sData){
    $('#frmHell select').prop('disabled',false);
    $('#frmHell input[type="checkbox"]').prop('disabled',false);
    $('#frmHell #btnSimpan').prop('disabled',false);
    $('#frmHell #btnReset').prop('disabled',false);
    //inisialisasi ulang otable
    oTable=$('#tblLabkesda').dataTable();
    
  }
  function setformdisabled(stat){
    $('#frmHell select').prop('disabled',stat);
    $('#frmHell input[type="checkbox"]').prop('disabled',stat);
    $('#frmHell #btnSimpan').prop('disabled',stat);
    $('#frmHell #btnReset').prop('disabled',stat);
  }
  function edit(a){
       row = $(a).closest("tr").get(0);
       posData = oTable.fnGetData(row);
        console.log(posData);
       //resetlink();
       setformdisabled(false);

         for(var key in posData) {
            $('#frmHell *[name="'+key+'"]').val(posData[key]);
            if(posData['hamil']){
              if(posData['hamil']=='on'){
                $('#hamil').val('on').prop('checked',true)
              }
            }
            if(posData['sedimen']){
              if(posData['sedimen']=='on'){
                $('#sedimen').val('on').prop('checked',true)
              }
            }
            if(posData['urine']){
              if(posData['urine']=='on'){
                $('#urine').val('on').prop('checked',true)
              }
            }
            if(posData['hematologi']){
              if(posData['hematologi']=='on'){
                $('#hematologi').val('on').prop('checked',true)
              }
            }
            if(posData['bakteriologi']){
              if(posData['bakteriologi']=='on'){
                $('#bakteriologi').val('on').prop('checked',true)
              }
            }
            if(posData['lain']){
                $('#lainlain').val(posData['lain']).prop('disabled',false)
                $('#chkLainlain').prop('checked',true)
            }
    }
  }
    function hapus(a){
      if(confirm('Yakin akan menghapus?')){
      row = $(a).closest("tr").get(0);
      posData = oTable.fnGetData(row);
       data={ id_posyandu:posData.id_posyandu};
     $.ajax({
            url: '<?php echo site_url('poli/'.'poliposyandu/hapus')?>',
            data: data,
            method:'post',
            dataType: 'json',

            success: function(obj){
              if(obj.success){
                alert('data sudah dihapus');
              }
            },
          });
      oTable.fnDeleteRow(oTable.fnGetPosition(row));
      posData='';
    }
  }


 jQuery(document).ready(function($) {
  resetlink();
    oTable=$('#tblLabkesda').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'labkesda/ajaxantrian')?>",
        "aoColumns": [
            { "mData": "register_labkesda" },
            { "mData": "no_rm" },
            { "mData": "nama_anggota" },
            { "mData": "umur" },
            { "mData": "alamat" },
            { "mData": "time_lab" },
            { "mData": "kunjungan" },
            { "mData": "nama_unit_kerja" },
            { "mData":"id_lab","mRender":function(data){
                          var edit= '<a onclick=edit(this);>Edit</a>';
                          var hapus= '<a onclick="hapus(this)">Hapus</a>';
                         return edit+'  '+hapus;
                        }}
        ]
  });

 $('#frmHell').submit(function(){
    $('#btnSimpan').prop('disabled',true);
        data={};
        $('#frmHell input,#frmHell select').each(function(){
          data[$(this).attr('name')]=$(this).val();
        });
      $.ajax({
        url: "<?php echo site_url('poli/'.'labkesda/simpan')?>",
        data: data,
        method:'post',
        dataType: 'json',
        success: function(obj){
          if(obj.success){
           alert('data sudah tersimpan');
           oTable.fnClearTable();
           resetlink();
           return false;
         }
       },
     });
    return false;
  });
  $("a[rel=facebox]").facebox();

  });
    

    </script>