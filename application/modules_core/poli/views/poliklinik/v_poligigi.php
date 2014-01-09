    <div class="span9"> <!-- content span -->
      <input type="hidden" id="id_poli" name="id_poli" value='5'>
      <ul class="nav nav-tabs" id="tab-link">
    <li class="active"><a href="#" onclick="return false">Gigi</a></li>
    <?php $this->load->view('poliklinik/v_row_navtab');?>

      <form name="frmHell" id="frmHell" method="post" action="<?php echo site_url('poli/'.'poligigi/simpan');?>">
       <?php $this->load->view('poliklinik/v_row_antrian');?>

      <?php $this->load->view('poliklinik/v_row_riwayat_perawatan');?>
      <div><br/></div>

      <?php $this->load->view('poliklinik/v_row_riwayat_kesehatan');?>

      <div><hr></div>
      <?php $this->load->view('poliklinik/v_row_FrmPoli');?>
  <div class="row"> <!--label fisik-->
    <div class="labelhr">
      <span class="label">Pemeriksaan Jaringan Intra Oral</span>
    </div>
    <div>
      <hr>
    </div>
  </div>
  <div id="rowFrmGigi">
  <div class="well"><!--pemeriksaan-->
    <table>
      <tr>
        <td><label>Termal</label></td>
        <td><label class="checkbox">
          <input type="checkbox" id="chkTermal" value="">
          Ada(+)
        </label></td>
      </tr>
      <tr>
        <td><label>Sondase</label></td>
        <td><label class="checkbox">
          <input type="checkbox" id="chkSondase" value="">
          Ada(+)
        </label></td>
      </tr>
      <tr>
        <td><label>Percusi</label></td>
        <td><label class="checkbox">
          <input type="checkbox" id="chkPercusi" value="">
          Ada(+)
        </label></td>
      </tr>
      <tr>
        <td><label>Jaringan Lunak</label></td>
        <td><label class="checkbox">
          <input type="checkbox" id="chkJaringan" value="">
          Ada(+)
        </label></td>
      </tr>
      <tr>
        <td><label>Druk</label></td>
        <td><label class="checkbox">
          <input type="checkbox" id="chkDruk" value="">
          Ada(+)
        </label></td>
      </tr>
      <tr>
        <td><label for="debris">Debris Index</label></td>
        <td><input type="text" id="wajib" name="debris_index"></td>
      </tr>
      <tr>
        <td><label for="calculus">Calculus Index</label></td>
        <td><input type="text" id="wajib" name="calculus_index"></td>
      </tr>
      <tr>
        <td><label for="statusLocal">Status Local</label></td>
        <td><input type="text" id="wajib" name="status_localis"></td>
      </tr>
    </table>
  </div>
  <div class="row">
      <div class="labelhr">
      <span class="label">Pemeriksaan Jaringan Ekstra Oral</span>
    </div>
    <div>
      <hr>
    </div>
  </div>
  <div class="well"><!--utama&sekunder-->
    <table>
      <tr>
        <td><label for="ekstraOral">Ekstra Oral</label></td>
        <td><textarea class="span8" id="wajib" rows="3" name="ekstra_oral"></textarea></td>
        <input type="hidden" id="id_gigi" name="id_gigi" value="">
      </tr>        
    </table>
  </div>
</div>
<button type="submit" id="btnSimpan" class="btn btn-primary btn-small" disabled>Simpan</button>
 <button type="button" id="btnReset" class="btn btn-small" onclick="resetlink()" disabled>Reset</button>
</form>
</div><!--/span9-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 <script type="text/javascript">
  $('#rowFrmGigi input[type="checkbox"]').change(function(){
    if ($(this).is(':checked')){
      $(this).val('on');
    }else{
      $(this).val('');
    }
  });
  function resetlink(){
    $('#rowFrmGigi input').val('');
    $('#rowFrmGigi input').prop('disabled',true);
    $('#rowFrmGigi textarea').prop('disabled',true);
    $('#rowFrmGigi textarea').val('');
    $('#rowFrmGigi input[type="checkbox"]').prop('checked',false);
    resetAntrian();
    resetNavTab();
    resetRiwayatKesehatan();
    resetRiwayatPerawatan();
    resetPemeriksaan();
  }

  function updatelink(sData){
    $('#rowFrmGigi input').prop('disabled',false);
    $('#rowFrmGigi textarea').prop('disabled',false);
    setPemeriksaanDisabled(false);
    updateNavTab(sData.id);
    getPemeriksaan(sData);
    getPemeriksaanGigi(sData);
    updateRiwayatPerawatan();
    updateRiwayatKesehatan();
  }

 function getPemeriksaan(){

    var purl = '<?php echo site_url("poli/polidewasa/ajaxpemeriksaan");?>'+'/'+sData.idpemeriksaan;
    $.getJSON(purl,function(pdata){
       if (jQuery.isEmptyObject(pdata)){
          var purl = '<?php echo site_url("poli/data/getdatabbtbterakhir");?>'+'/'+sData.anggota_keluarga_id+'/'+sData.idpemeriksaan;
        $.getJSON(purl,function(pdata){
          if(jQuery.isEmptyObject(pdata)){
          }else
          {
            $('#frmHell input[name="bb"]').val(pdata.bb);
            $('#frmHell input[name="tb"]').val(pdata.tb);
          }

        });

      }else{
        console.log(pdata);
        $('#frmHell input[name="keluhan_utama"]').val(pdata.keluhan_utama);
        $('#frmHell input[name="keluhan_sekunder"]').val(pdata.keluhan_sekunder);
        $('#frmHell input[name="respirasi"]').val(pdata.respirasi);
        $('#frmHell input[name="suhu_badan"]').val(pdata.suhu_badan);
        $('#frmHell input[name="denyut_nadi"]').val(pdata.denyut_nadi);
        $('#frmHell input[name="bb"]').val(pdata.bb);
        $('#frmHell input[name="tb"]').val(pdata.tb);
        $('#frmHell textarea[name="fisik"]').val(pdata.fisik);
        }
        }
    );
    
  }

  function getPemeriksaanGigi(){
    var purl = '<?php echo site_url("poli/poligigi/ajaxpemeriksaan");?>'+'/'+sData.idpemeriksaan;
    $.getJSON(purl,function(gdata){
       if (jQuery.isEmptyObject(gdata)){
      }else{
        $('#rowFrmGigi input[name="id_gigi"]').val(gdata.id_gigi);
        $('#rowFrmGigi input[name="debris_index"]').val(gdata.debris_indek);
        $('#rowFrmGigi input[name="calculus_index"]').val(gdata.calculus_indek);
        $('#rowFrmGigi input[name="status_localis"]').val(gdata.status_localis);
        $('#rowFrmGigi textarea[name="ekstra_oral"]').val(gdata.ekstra_oral);
        
        if(gdata.jaringan_lunak=='on'){
          $('#rowFrmGigi #chkJaringan').prop('checked',true).change();
          $('#rowFrmGigi #chkJaringan').val('on')
        }

        if(gdata.druk=='on'){
          $('#rowFrmGigi #chkDruk').prop('checked',true).change();
          $('#rowFrmGigi #chkDruk').val('on')
        }

        if(gdata.percusi=='on'){
          $('#rowFrmGigi #chkPercusi').prop('checked',true).change();
          $('#rowFrmGigi #chkPercusi').val('on')
        }

        if(gdata.soundase=='on'){
          $('#rowFrmGigi #chkSondase').prop('checked',true).change();
          $('#rowFrmGigi #chkSondase').val('on')
        }

        if(gdata.termal){
          $('#rowFrmGigi #chkTermal').prop('checked',true).change();
          $('#rowFrmGigi #chkTermal').val('on')
        }
        }
        }
    );
  }

  function getSisaAntrian(){
      $.ajax({
            url: '<?php echo site_url('poli/poligigi/ajaxsisaantrian')?>',
           // data: data,
            method:'post',
            dataType: 'json',
            success: function(obj){
              if(obj.antrian){
                if (obj.antrian != '0' || obj.antrian!=0){
                $('#counter_antrian').text(obj.antrian);
                }else
                {
                  $('#counter_antrian').text("");
                }
              }
            },
          }); 
    }

  jQuery(document).ready(function(){
      getSisaAntrian();
      setInterval("getSisaAntrian()",60000);
  $('a[rel*=facebox]').facebox()

    $('#frmHell').submit(function(){
    $('#btnSimpan').prop('disabled',true);
    var err=false;
    $('#rowFrmGigi #wajib').each(function(){
      if($(this).val()=='') err=true;
    });
    if(err){
      alert('Isian belum lengkap');
      $('#btnSimpan').prop('disabled',false);
    }else{
      data={debris_index:$('#rowFrmGigi input[name="debris_index"]').val()
        ,calculus_index:$('#rowFrmGigi input[name="calculus_index"]').val()
        ,status_localis:$('#rowFrmGigi input[name="status_localis"]').val()
        ,ekstra_oral:$('#rowFrmGigi textarea[name="ekstra_oral"]').val()
        ,validasi_reg:sData.validasi_reg
        ,register:sData.id
        ,idpemeriksaan:sData.idpemeriksaan
        ,jaringan_lunak:$('#rowFrmGigi #chkJaringan').val()
        ,druk:$('#rowFrmGigi #chkDruk').val()
        ,percusi:$('#rowFrmGigi #chkPercusi').val()
        ,soundase:$('#rowFrmGigi #chkSondase').val()
        ,termal:$('#rowFrmGigi #chkTermal').val()
        ,id_gigi:$('#rowFrmGigi input[name="id_gigi"]').val()
        ,keluhan_utama:$('#frmHell input[name="keluhan_utama"]').val()
        ,keluhan_sekunder:$('#frmHell input[name="keluhan_sekunder"]').val()
        ,respirasi:$('#frmHell input[name="respirasi"]').val()
        ,suhu_badan:$('#frmHell input[name="suhu_badan"]').val()
        ,denyut_nadi:$('#frmHell input[name="denyut_nadi"]').val()
        ,bb:$('#frmHell input[name="bb"]').val()
        ,tb:$('#frmHell input[name="tb"]').val()
        ,fisik:$('#frmHell textarea[name="fisik"]').val()
      };
      //console.log(data);
      $.ajax({
        url: "<?php echo site_url('poli/'.'poligigi/simpan')?>",
        data: data,
        method:'post',
        dataType: 'json',
        success: function(obj){
          if(obj.success){
           alert('data sudah tersimpan');
           resetlink();
          
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