    <div id="rowFrmPoli">
      <div class="row">
        <div class="labelhr">
          <span class="label">Anamnesa</span>
        </div>
        <div>
          <hr>
        </div>
      </div>

      <div class="well">
        <table>
          <tr>
            <td><label for="keluhan_utama">Keluhan Utama</label></td>
            <td><input type="text" class="span8" id="keluhan_utama" name="keluhan_utama"></td>
          </tr>
          <tr>
            <td><label for="keluhan_sekunder">Keluhan Sekunder</label></td>
            <td><input type="text" class="span8" id="keluhan_sekunder" name="keluhan_sekunder"></td>
          </tr>
        </table>
      </div>

      <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">Pemeriksaan</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <div></div> <!--magic fix-->
      <div class="well"><!--pemeriksaan-->
        <table>
          <tr>
            <td><label for="respirasi">Respirasi</label></td>
            <td><input type="text" id="respirasi" name="respirasi"></td>
            <td>menit</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><label for="suhu_badan">Suhu Badan</label></td>
            <td><input type="text" id="suhu_badan" name="suhu_badan"></td>
            <td>&deg;C</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><label for="denyut_nadi">Denyut Nadi</label></td>
            <td><input type="text" id="denyut_nadi" name="denyut_nadi"></td>
            <td>/mnt</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><label for="bb">BB</label></td>
            <td><input type="text" id="bb" name="bb" onblur="hitbox()"></td>
            <td>Kg</td>
            <td><label for="bbtb">BB/TB</label></td>
            <td><input type="text" id="bbtb" name="bbtb" readonly></td>
          </tr>
          <tr>
            <td><label for="tb">TB</label></td>
            <td><input type="text" id="tb" name="tb" onblur="hitbox()"></td>
            <td>Cm</td>
            <td><label for="bbu">BB/U</label></td>
            <td><input type="text" id="bbu" name="bbu" readonly></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>&nbsp;</td>
            <td><label for="tbu">TB/U</label></td>
            <td><input type="text" id="tbu" name="tbu" readonly></td>
          </tr>
        </table>
      </div>

      <div class="row">
        <div class="labelhr">
          <span class="label">Fisik</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <div></div> <!--magic fix / label end-->
      <div class="well"><!--utama&sekunder-->
        <table>
          <tr>
            <td><label for="fisik">Hasil</label></td>
            <td><textarea class="span8" id="fisik" rows="3" name="fisik"></textarea></td>
          </tr>        
        </table>
      </div>
    </div>
    
  <script type="text/javascript">

    function resetPemeriksaan(){
      $('#rowFrmPoli input').val('');
      $('#rowFrmPoli textarea').val('');
      setPemeriksaanDisabled(true);
    }

    function setPemeriksaanDisabled(status){
      $('#rowFrmPoli input').prop('disabled',status);
      $('#rowFrmPoli textarea').prop('disabled',status);
      $('#btnSimpan').prop('disabled',status);
      $('#btnReset').prop('disabled',status);
    }



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

</script>