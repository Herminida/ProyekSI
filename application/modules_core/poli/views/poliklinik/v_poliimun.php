    <div class="span9"> <!-- content span -->
      <input type="hidden" id="id_poli" name="id_poli" value='6'>
      <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Imunisasi</a></li>
        <?php $this->load->view('poliklinik/v_row_navtab');?>
        <form name="frmHell" id="frmHell" method="post" action="<?php echo site_url('poli/'.'poliimun/simpan');?>">
         <?php $this->load->view('poliklinik/v_row_antrian');?>
         <?php $this->load->view('poliklinik/v_row_riwayat_perawatan');?>
         <div><br/></div>
         <?php $this->load->view('poliklinik/v_row_riwayat_kesehatan');?>
         <div><hr></div>
         <?php $this->load->view('poliklinik/v_row_FrmPoli');?>
         <div class="row"> <!--label fisik-->
          <div class="labelhr">
            <span class="label">Imunisasi Anak</span>
          </div>
          <div>
            <hr>
          </div>
        </div>
        <div class="well" id="rowFrmImun"><!--pemeriksaan-->
          <table>
            <tr>
              <td><label class="checkbox inline">BCG<input type="checkbox" id="chkBcg" name="chkBcg" value="bcg" <?php //echo pasang_checkbox('chkBcg','bcg',FALSE);?>></label></td>
              <td>&nbsp;</td>
              <td><label class="checkbox inline">CAMPAK<input type="checkbox" id="chkCampak" value="campak"></label></td>
            </tr>
            <tr>
              <td><label class="checkbox inline">HB 0-7<input type="checkbox" id="chkHb7" value="hb7"></label></td>
              <td>&nbsp;</td>
              <td><label class="checkbox inline">HB 8-28<input type="checkbox" id="chkHb8" value="hb8"></label></td>
            </tr>
            <tr>
              <td><label class="checkbox inline">DPT-HB1<input type="checkbox" id="chkDpt1" value="dpt1"></label></td>
              <td>&nbsp;</td>
              <td><label class="checkbox inline">DPT-HB2<input type="checkbox" id="chkDpt2" value="dpt2"></label></td>
              <td>&nbsp;</td>
              <td><label class="checkbox inline">DPT-HB3<input type="checkbox" id="chkDpt3" value="dpt3"></label></td>
            </tr>
            <tr>
              <td><label class="checkbox inline">POL 1<input type="checkbox" id="chkPol1" value="pol1"></label></td>
              <td>&nbsp;</td>
              <td><label class="checkbox inline">POL 2<input type="checkbox" id="chkPol2" value="Pol2"></label></td>
              <td>&nbsp;</td>
              <td><label class="checkbox inline">POL 3<input type="checkbox" id="chkPol3" value="pol3"></label></td>
              <td>&nbsp;</td>
              <td><label class="checkbox inline">POL 4<input type="checkbox" id="chkPol4" value="pol4"></label></td>
            </tr>
          </table>
         <div class="row">
        <div class="labelhr">
          <span class="label">Keterangan</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <div></div> <!--magic fix / label end-->
      <div class="well"><!--utama&sekunder-->
        <table>
          <tr>
            <td><label for="ket">Ket</label></td>
            <td><textarea class="span8" id="ket" rows="3" name="ket"></textarea></td>
          </tr>        
        </table>
      </div>
        </div>
          <button type="submit" id="btnSimpan" class="btn btn-primary btn-small">Simpan</button>
          <button type="button" id="btnReset" class="btn btn-small" onclick="resetlink()">Reset</button>
      </form>
    </div><!--/span9-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
    var imData='';
    $('#rowFrmImun input[type="checkbox"]').change(function(){
      if ($(this).is(':checked')){
        $(this).val('on');
      }else{
        $(this).val('');
      }
    });

    function resetlink(){
     imData='';
     $('#rowFrmImun input').val('');
     $('#rowFrmImun input[type="checkbox"]').prop('checked',false);
     $('#rowFrmImun input[type="checkbox"]').prop('disabled',true);
     $('#rowFrmImun textarea').val('');
     $('#rowFrmImun textarea').prop('disabled',true);
     resetAntrian();
     resetRiwayatKesehatan();
     resetRiwayatPerawatan();
     resetPemeriksaan();
   }

   function updatelink(Data){
    $('#rowFrmImun input').prop('disabled',false);
    $('#rowFrmImun textarea').prop('disabled',false);
    setPemeriksaanDisabled(false);
    getPemeriksaan(sData);
    getPemeriksaanImun(sData);
    updateNavTab(sData.id);
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

  function getPemeriksaanImun(){
    var purl = '<?php echo site_url("poli/poliimun/ajaxpemeriksaan");?>'+'/'+sData.idpemeriksaan;
    console.log(purl);
    $.getJSON(purl,function(idata){
     if (jQuery.isEmptyObject(idata)){
     }else{

        $('#rowFrmImun #ket').val(idata.ket);

        if(idata.bcg=='on'){
          $('#rowFrmImun #chkBcg').prop('checked',true).change();
          $('#rowFrmImun #chkBcg').val('on')
        }

        if(idata.hb0_7=='on'){
          $('#rowFrmImun #chkHb7').prop('checked',true).change();
          $('#rowFrmImun #chkHb7').val('on')
        }

        if(idata.hb8_28=='on'){
          $('#rowFrmImun #chkHb8').prop('checked',true).change();
          $('#rowFrmImun #chkHb8').val('on')
        }

        if(idata.campak=='on'){
          $('#rowFrmImun #chkCampak').prop('checked',true).change();
          $('#rowFrmImun #chkCampak').val('on')
        }

        if(idata.dpt_hb1=='on'){
          $('#rowFrmImun #chkDpt1').prop('checked',true).change();
          $('#rowFrmImun #chkDpt1').val('on')
        }

        if(idata.dpt_hb2=='on'){
          $('#rowFrmImun #chkDpt2').prop('checked',true).change();
          $('#rowFrmImun #chkDpt2').val('on')
        }

        if(idata.dpt_hb3=='on'){
          $('#rowFrmImun #chkDpt3').prop('checked',true).change();
          $('#rowFrmImun #chkDpt3').val('on')
        }


        if(idata.pol1=='on'){
          $('#rowFrmImun #chkPol1').prop('checked',true).change();
          $('#rowFrmImun #chkPol1').val('on')
        }

        if(idata.pol2=='on'){
          $('#rowFrmImun #chkPol2').prop('checked',true).change();
          $('#rowFrmImun #chkPol2').val('on')
        }
        
        if(idata.pol3=='on'){
          $('#rowFrmImun #chkPol3').prop('checked',true).change();
          $('#rowFrmImun #chkPol3').val('on')
        }

        if(idata.pol4=='on'){
          $('#rowFrmImun #chkPol4').prop('checked',true).change();
          $('#rowFrmImun #chkPol4').val('on')
        }

      }
    }
    );
  }

function getSisaAntrian(){
      $.ajax({
            url: '<?php echo site_url('poli/poliimun/ajaxsisaantrian')?>',
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
$(function(){
  jQuery(document).ready(function(){
      getSisaAntrian();
      setInterval("getSisaAntrian()",60000);
    $('a[rel*=facebox]').facebox()

    $('#frmHell').submit(function(){
      $('#btnSimpan').prop('disabled',true);
      data={ket:$('#rowFrmImun #ket').val()
           ,bcg:$('#rowFrmImun #chkBcg').val()
           ,campak:$('#rowFrmImun #chkCampak').val()
           ,hb07:$('#rowFrmImun #chkHb7').val()
           ,hb828:$('#rowFrmImun #chkHb8').val()
           ,dpthb1:$('#rowFrmImun #chkDpt1').val()
           ,dpthb2:$('#rowFrmImun #chkDpt2').val()
           ,dpthb3:$('#rowFrmImun #chkDpt3').val()
           ,pol1:$('#rowFrmImun #chkPol1').val()
           ,pol2:$('#rowFrmImun #chkPol2').val()
           ,pol3:$('#rowFrmImun #chkPol3').val()
           ,pol4:$('#rowFrmImun #chkPol4').val()
           ,idpemeriksaan:sData.idpemeriksaan
           ,register:sData.id
           ,keluhan_utama:$('#frmHell input[name="keluhan_utama"]').val()
           ,keluhan_sekunder:$('#frmHell input[name="keluhan_sekunder"]').val()
           ,respirasi:$('#frmHell input[name="respirasi"]').val()
           ,suhu_badan:$('#frmHell input[name="suhu_badan"]').val()
           ,denyut_nadi:$('#frmHell input[name="denyut_nadi"]').val()
           ,bb:$('#frmHell input[name="bb"]').val()
           ,tb:$('#frmHell input[name="tb"]').val()
           ,fisik:$('#frmHell textarea[name="fisik"]').val()

      }
       $.ajax({
          url: "<?php echo site_url('poli/'.'poliimun/simpan')?>",
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
      console.log(data);
      return false;
    });


    resetlink();
  }) 
     }) 
    </script>