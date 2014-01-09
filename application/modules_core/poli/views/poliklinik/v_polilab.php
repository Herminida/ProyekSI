    <div class="span9"> <!-- content span -->
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Laboratorium</a>
          </li>
         </ul>
         <form name="frmHell" id="frmHell">
               <?php $this->load->view('poliklinik/v_row_antrian');?>
<div id="frmPeriksa" name="frmPeriksa">
<div class="well">
  <div class="row">
<div class="span4" >
     <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">DD Urine</span>
        </div>
        <div>
          <hr>
        </div>
    </div>
      <table>
        <tr>
            <td><label>BJ</label></td>
            <td><input type="text" id="urine_bj" name="urine_bj"></td>
        </tr>
        <tr>
            <td><label>PH</label></td>
            <td><input type="text" id="urine_ph" name="urine_ph"></td>
        </tr>
        <tr>
            <td><label>Reduksi</label></td>
            <td>
              <select class="span3" id="urine_reduksi" name="urine_reduksi">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">(-) Negative</option>
                <option value="2">(+) Positive 1</option>
                <option value="3">(+) Positive 2</option>
                <option value="4">(+) Positive 3</option>
              </select>
            </td>
        </tr>
        <tr>
            <td><label>Protein</label></td>
            <td>
              <select class="span3" id="urine_protein" name="urine_protein">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">(-) Negative</option>
                <option value="2">(+) Positive 1</option>
                <option value="3">(+) Positive 2</option>
                <option value="4">(+) Positive 3</option>
              </select>
            </td>
        </tr>
      </table>
    </div>
<div class="span4">
    <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">Sedimen Urine</span>
        </div>
        <div>
          <hr>
        </div>
    </div>

      <table>
        <tr>
            <td><label>ERI</label></td>
            <td><input type="text" id="sedimen_eri" name="sedimen_eri"></td>
        </tr>
        <tr>
            <td><label>LEUKO</label></td>
            <td><input type="text" id="sedimen_leuko" name="sedimen_leuko"></td>
        </tr>
        <tr>
            <td><label>SEL EPITEL</label></td>
            <td><input type="text" id="sedimen_epitel" name="sedimen_epitel"></td>
        </tr>
        <tr>
            <td><label>Kristal</label></td>
            <td>
              <select class="span3" id="sedimen_kristal" name="sedimen_kristal">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">Ca Oxdot(+)</option>
                <option value="2">Ca Carbonat(+)</option>
                <option value="3">Tripel Pospat(+)</option>
                <option value="4">Asam Urat(+)</option>
                <option value="5">Negative(-)</option>
              </select>
            </td>
        </tr>
        <tr>
            <td><label>Silinder</label></td>
            <td>
              <select class="span3" id="sedimen_silinder" name="sedimen_silinder">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">(+) Hydin</option>
                <option value="2">(+) Gronulo</option>
                <option value="3">(-) Negative</option>
              </select>
            </td>
        </tr>
        <tr>
            <td><label>Bakteri</label></td>
            <td>
              <select class="span3" id="sedimen_bakteri" name="sedimen_bakteri">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">(-) Negative</option>
                <option value="2">(+) Botong</option>
                <option value="3">(+) Cocus</option>
                <option value="4">(+) Tricomonus V</option>
              </select>
            </td>
        </tr>
      </table>
    </div>
  </div>
</div>

<div class="well">
    <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">HEMATOLOGI</span>
        </div>
        <div>
          <hr>
        </div>
    </div>

      <table>
        <tr>
          <td></td>
          <td></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Nilai Normal</td>

        </tr>
        <tr>
            <td><label>HB</label></td>
            <td><input type="text" id="hematologi_hb" name="hematologi_hb"></td>
            <td><label>g/dl</label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>L=14-18  P=12-16</label></td>
            <td><label>g/dl</label></td>
        </tr>
        <tr>
            <td><label>LED</label></td>
            <td><input type="text" id="hematologi_led" name="hematologi_led"></td>
             <td><label>mm/jam</label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>L=2-12  P=2-210</label></td>
            <td><label>mm/jam</label></td>
        </tr>
        <tr>
            <td><label>LEKOSIT</label></td>
            <td><input type="text" id="hematologi_lekosit" name="hematologi_lekosit"></td>
             <td><label>/cc</label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>4101010-11101010</label></td>
            <td><label>/cc</label></td>
        </tr>
        <tr>
            <td><label>ERITROSIT</label></td>
            <td><input type="text" id="hematologi_eritrosit" name="hematologi_eritrosit"></td>
             <td><label>jt/cc</label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>L=4.5-6.5 P=3.10-6.10</label></td>
            <td><label>jt/cc</label></td>
        </tr>
        <tr>
            <td><label>TROMBOSIT</label></td>
            <td><input type="text" id="hematologi_trombosit" name="hematologi_trombosit"></td>
             <td><label>cc</label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>1510101010-4510101010</label></td>
            <td><label>cc</label></td>
        </tr>
        <tr>
            <td><label>HEMATOKRIT</label></td>
            <td><input type="text" id="hematologi_hematrokit" name="hematologi_hematrokit"></td>
             <td><label>%</label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>L=410-55 P=35-47</label></td>
            <td><label>%</label></td>
        </tr>
      </table>
  </div>
  <div class="well">
    <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">FAECES</span>
        </div>
        <div>
          <hr>
        </div>
    </div>

      <table>
        <tr>
            <td><label>MAKROSKOPIS</label></td>
            <td><input type="text" id="faeces_makroskopis" name="faeces_makroskopis"></td>
        </tr>
        <tr>
            <td><label>MIKROSKOPIS</label></td>
            <td><input type="text" id="faeces_mikroskopis" name="faeces_mikroskopis"></td>
        </tr>
        <tr>
            <td><label>ERY</label></td>
            <td><input type="text" id="faeces_eri" name="faeces_eri"></td>
        </tr>
        <tr>
            <td><label>LEUKO</label></td>
            <td><input type="text" id="faeces_leuko" name="faeces_leuko"></td>
        </tr>
        <tr>
            <td><label>AMUBA</label></td>
            <td>
              <select id="faeces_amuba" name="faeces_amuba">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">(-) Negative</option>
                <option value="2">(+) Positive</option>
              </select>
            </td>
        </tr>
        <tr>
            <td><label>CYSTE</label></td>
            <td>
              <select id="faeces_cyste" name="faeces_cyste">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">(-) Negative</option>
                <option value="2">(+) Positive</option>
              </select>
            </td>
        </tr>
        <tr>
          <td><label>OVS</label></td>
            <td>
              <select id="faeces_ova" name="faeces_ova">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">(-) Negative</option>
                <option value="2">(+) Positive Cacing Tambang</option>
                <option value="3">(+) Positive Cacing Cambuk</option>
                <option value="4">(+) Positive Cacing Gelang</option>
              </select>
            </td>
        </tr>
      </table>
  </div>
  <div class="well">
    <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">MAKROBIOLOGI</span>
        </div>
        <div>
          <hr>
        </div>
    </div>
      <table>
        <tr>
            <td><label>MALARIA</label></td>
            <td>
              <select id="mikro_malaria" name="mikro_malaria">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">(-) Negative</option>
                <option value="2">(+) Positive Falcifarum</option>
                <option value="3">(+) Positive Vivax</option>
                <option value="4">(+) Positive Mix</option>
              </select>
            </td>
        </tr>
        <tr>
            <td><label>PREP.GRAM</label></td>
            <td>
            <select id="mikro_pep_gram" name="mikro_pep_gram">
              <option value="">--Pilih Salah Satu--</option>
                <option value="1">(-) Negative</option>
                <option value="2">(+) Positive</option>
              </select>
            </td>
        </tr>
        <tr>
            <td><label>BTA (SPUTUM)</label></td>
            <td><input type="text" id="mikro_bta" name="mikro_bta"></td>
        </tr>
        <tr>
            <td><label>A</label></td>
            <td><input type="text" id="mikro_a" name="mikro_a"></td>
        </tr>
        <tr>
            <td><label>B</label></td>
            <td><input type="text" id="mikro_b" name="mikro_b"></td>
        </tr>
        <tr>
            <td><label>C</label></td>
            <td><input type="text" id="mikro_c" name="mikro_c"></td>
        </tr>
        <tr>
            <td><label>KOH 110%</label></td>
            <td>
              <select id="mikro_koh" name="mikro_koh">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">(-) Negative</option>
                <option value="2">(+) Positive Condida</option>
              </select>
            </td>
        </tr>
        <?php /*
        <tr>
          <td><label>WIDAL</label></td>
        </tr>
        <tr>
            <td><label>S.THYPI O</label></td>
            <td>
              <select id="sthypio" name="sthypio">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">(-) Negative</option>
                <option value="2">(+) 1/810</option>
                <option value="3">(+) 1/1610</option>
                <option value="4">(+) 1/3210</option>
              </select>
            </td>
        </tr>
        <tr>
            <td><label>S.THYPI H</label></td>
            <td>
              <select id="sthypih" name="sthypih">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">(-) Negative</option>
                <option value="2">(+) 1/810</option>
                <option value="3">(+) 1/1610</option>
                <option value="4">(+) 1/3210</option>
              </select>
            </td>
        </tr>
        */?>
      </table>
  </div>
  <div class="well">
    <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">KIMIA KLINIK</span>
        </div>
        <div>
          <hr>
        </div>
    </div>

      <table>
        <tr>
          <td></td>
          <td></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Nilai Normal</td>

        </tr>
        <tr>
            <td><label>GLUKOSA PUASA</label></td>
            <td><input type="text" id="glukosa_puasa" name="glukosa_puasa"></td>
            <td><label>mg/dl</label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>76-11010</label></td>
            <td><label>mg/dl</label></td>
        </tr>
        <tr>
            <td><label>GLUKOSA 2 JAM PP</label></td>
            <td><input type="text" id="glukosa_2jam" name="glukosa_2jam"></td>
             <td><label>mg/dl</label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>&lt;1210</label></td>
            <td><label>mg/dl</label></td>
        </tr>
      </table>
    </div>
    <div class="well">
    <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">TES KEHAMILAN</span>
        </div>
        <div>
          <hr>
        </div>
    </div>

      <table>
        <tr>
            <td><label>HASIL</label></td>
            <td>
              <select id="tes_hamil" name="tes_hamil">
                <option value="">--Pilih Salah Satu--</option>
                <option value="1">(-) Negative</option>
                <option value="2">(+) Positive</option>
            </td>
        </tr>
     </table>
    </div>
<div class="well">
    <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">LAIN-LAIN</span>
        </div>
        <div>
          <hr>
        </div>
    </div>

      <table>
        <tr>
            <td><label>JENIS PEMERIKSAAN</label></td>
            <td>
            <input type="text" id="lain_pemeriksaan" name="lain_pemeriksaan">             
            </td>
        </tr>
        <tr>
            <td><label>HASIL</label></td>
            <td>
            <input type="text" id="lain_hasil" name="lain_hasil">             
            </td>
        </tr>
        <input type="hidden" id="id_hasil" name="id_hasil" value="">
        <input type="hidden" id="id_lab" name="id_lab" value="">
        <input type="hidden" id="fk_user" name="fk_user" value="">
     </table>
</div>
    <button class="btn-primary btn-small" id="simpan" name="simpan">SIMPAN</button>
    <button class="btn btn-small" type="button" onclick="resetlink();"id="reset" name="reset">RESET</button>
   </form>
 </div>
</div>
</div><!--/span9-->
</div><!--/row-->

</div><!--/.fluid-container-->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">

function updatelink(id){
     $('#frmPeriksa input,#frmPeriksa select,#frmPeriksa button').prop('disabled',false);
/*      $('#frmPeriksa input,#frmPeriksa select').each(function(){
          $('#frmPeriksa *[name="'+key+'"]').val(posData[key]);
        });*/
      for(var key in sData) {
        //console.log(key);
          //console.log(sData[key]);
            $('#frmPeriksa *[name="'+key+'"]').val(sData[key]);
          }
      //updateNavTab(sData.id);
     //getPemeriksaan();
      }


    function resetlink(){

      resetAntrian();
      $('#frmPeriksa input,#frmPeriksa select,#frmPeriksa button').val('');
      $('#frmPeriksa input,#frmPeriksa select,#frmPeriksa button').prop('disabled',true);
      $('#frmHell input[name="tanggal"]').val('<?php echo date("d-m-Y")?>');
    }
      jQuery(document).ready(function() {
       jQuery('a[rel*=facebox]').facebox()
       resetlink();
       $('#frmHell').submit(function(){
        data={};
        $('#frmHell input,#frmHell select').each(function(){
          data[$(this).attr('name')]=$(this).val();
        });
        data['f_lab']=sData.f_lab;
        
        $.ajax({
          url: '<?php echo site_url('poli/'.'polilab/simpan')?>',
          data: data,
          method:'post',
          dataType: 'json',

          success: function(data){
            if(data.success){
              alert('data sudah tersimpan');
              resetlink();
            }else if(data.error!=''){
              alert(data.error);
            }
          },
        });
        resetlink()
        return false;
        //end submit function
      });
    });
   
    </script>