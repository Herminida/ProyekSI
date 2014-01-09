    <div class="span9"> <!-- content span -->
      <input type="hidden" id="id_poli" name="id_poli" value='2'>
      <ul class="nav nav-tabs" id="tab-link">
    <li class="active"><a href="#" onclick="return false">IGD</a></li>
    <?php $this->load->view('poliklinik/v_row_navtab');?>

      <form name="frmHell" id="frmHell" method="post" action="<?php echo site_url('poli/'.'poliigd/simpan');?>">
       <?php $this->load->view('poliklinik/v_row_antrian');?>

      <?php $this->load->view('poliklinik/v_row_riwayat_perawatan');?>
      <div><br/></div>

      <?php $this->load->view('poliklinik/v_row_riwayat_kesehatan');?>

      <div><hr></div>

      <?php $this->load->view('poliklinik/v_row_FrmPoli');?>
<button type="submit" id="btnSimpan" class="btn btn-primary btn-small">Simpan</button>
 <button type="button" id="btnReset" class="btn btn-small" onclick="resetlink()">Reset</button>
  </form>
</div><!--/span9-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script type="text/javascript">
   function getSisaAntrian(){
      $.ajax({
            url: '<?php echo site_url('poli/poliigd/ajaxsisaantrian')?>',
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
      
        jQuery('a[rel*=facebox]').facebox();
        $('#frmHell').submit(function(){
        $('#btnSimpan').prop('disabled',true);
        var err=false;
        $('#rowFrmPoli input,#rowFrmPoli textarea').each(function(){
          if($(this).val()=='') err=true;
        });
        if(err){
          alert('Amamnesa, Pemeriksaan, Fisik harus diisi');
          $('#btnSimpan').prop('disabled',false);
        }else{
          data={keluhan_utama:$('#rowFrmPoli input[name="keluhan_utama"]').val()
              ,keluhan_sekunder:$('#rowFrmPoli input[name="keluhan_sekunder"]').val()
              ,respirasi:$('#rowFrmPoli input[name="respirasi"]').val()
              ,suhu_badan:$('#rowFrmPoli input[name="suhu_badan"]').val()
              ,denyut_nadi:$('#rowFrmPoli input[name="denyut_nadi"]').val()
              ,bb:$('#rowFrmPoli input[name="bb"]').val()
              ,tb:$('#rowFrmPoli input[name="tb"]').val()
              ,fisik:$('#rowFrmPoli textarea[name="fisik"]').val()
              ,register:sData.idpemeriksaan
              ,idpemeriksaan:sData.idpemeriksaan
              ,validasi_reg:$('#rowFrmAntrian input[name="validasi_reg"]').val()
            };
          console.log(data);
          $.ajax({
            url: '<?php echo site_url('poli/'.'poliigd/simpan')?>',
            data: data,
            method:'post',
            dataType: 'json',
            success: function(obj){
           //   console.log(obj);
              if(obj.success){
                alert('Data telah disimpan');
                resetlink();
              }
            },
          });
        }
        return false;
      });

      resetlink();
      $('#rowFrmAntrian input[name="tanggal"]').val('<?php echo date("d-m-Y")?>');

      });
    });

    function hitbox(){
      var totbbu=0,tottbu=0,totbbtb=0;
      var boxbb = $('#frmHell input[name="bb"]');
      var boxtb = $('#frmHell input[name="tb"]');
      var boxu  = $('#frmHell input[name="umurtahun"]');
      var bbu   = $('#frmHell input[name="bbu"]');
      var tbu   = $('#frmHell input[name="tbu"]');
      var bbtb  = $('#frmHell input[name="bbtb"]');

      if ((!isNaN(boxbb.val()) && boxbb.val().length != 0)&&(!isNaN(boxtb.val()) && boxtb.val().length != 0)&&(!isNaN(boxu.val()) && boxu.val().length != 0)){
        totbbu = boxbb.val() / boxu.val();
        tottbu = boxtb.val() / boxu.val();
        totbbtb = boxbb.val() / boxtb.val();
        bbu.val(totbbu);
        tbu.val(tottbu);
        bbtb.val(totbbtb);
      }
    }

    function updatelink(sData){
      if(sData.id){
        updateNavTab(sData.id);
        setformdisabled(false);
        updateRiwayatPerawatan(sData.no_rm);
        updateRiwayatKesehatan(sData.no_rm);
        getPemeriksaan();
      }
    };

    function resetlink(){
      resetNavTab();
      setformdisabled(true);
      resetAntrian();
      resetRiwayatPerawatan();
      resetRiwayatKesehatan();
    }

    function getPemeriksaan(){
    var purl = '<?php echo site_url("poli/poliigd/ajaxpemeriksaan");?>'+'/'+sData.idpemeriksaan;
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
    hitbox();
        }
        }
    );
    
  }

    function setformdisabled(stat){
      $('#rowFrmPoli textarea').val('');
      $('#rowFrmPoli input').val('');
      $('#rowFrmPoli input').prop('disabled',stat);
      $('#rowFrmPoli textarea').prop('disabled',stat);
      $('#rowFrmPoli input[name="bbtb"]').prop('disabled',true);
      $('#rowFrmPoli input[name="bbu"]').prop('disabled',true);
      $('#rowFrmPoli input[name="tbu"]').prop('disabled',true);
      $('#btnSimpan').prop('disabled',stat);
    }

</script>