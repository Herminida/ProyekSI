<div class="preview-frame">
    <table class="preview" width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
            <td width="101">Nama</td>
            <td width="505">: <?php echo $source['nama_anggota'];?></td>
            <td width="64">Pengirim</td>
            <td width="514">: <?php echo $source['nama_unit_kerja'];?></td>
        </tr>
        <tr>
            <td>Jen Kel </td>
            <td>: <?php echo $source['sex'];?></td>
            <td>Tanggal</td>
            <td>: <?php echo date('d-m-Y',strtotime($source['time_lab']));?></td>
        </tr>
        <tr>
            <td>Umur </td>
            <td>: <?php echo $source['umur'];?></td>
            <td rowspan="2" valign="top">Alamat</td>
            <td rowspan="2" valign="top">: <?php echo $source['alamat'].', '.$source['nama_kelurahan'].', '.$source['nama_kecamatan'];?></td>
        </tr>
        <tr>
            <td>Nomor Lab </td>
            <td>: <?php echo $source['register_labkesda'];?></td>
        </tr>
        <tr>
          <td>No KK </td>
          <td>: <?php echo $source['no_kk'];?></td>
          <td valign="top">Bayar</td>
          <td valign="top">: <?php echo $source['cara_bayar'];?></td>
        </tr>
  </table>
    <br>
    <table class="preview" width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td width="50%" valign="top">
            <table class="preview" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr bgcolor="#CCCCCC">
                <td colspan="3"><strong>Urine</strong></td>
              </tr>
              <tr>
                <td width="10">&nbsp;</td>
                        <td width="80">Bj</td>
                        <td>: <?php echo $source['urine_bj'];?>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                        <td>Ph</td>
                        <td>: <?php echo $source['urine_ph'];?>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                        <td>Reduksi</td>
                        <td>: <?php negpos($source['urine_reduksi']);?>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                        <td>Protein</td>
                        <td>: <?php negpos($source['urine_protein']);?>&nbsp;</td>
              </tr>
            </table>
                <br>
                <table class="preview" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr bgcolor="#CCCCCC">
                    <td colspan="3"><strong>Sedimen</strong></td>
                  </tr>
                  <tr>
                    <td width="10">&nbsp;</td>
                    <td width="80">Eri</td>
                    <td>: <?php echo $source['sedimen_eri'];?>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>Leuko</td>
                    <td>: <?php echo $source['sedimen_leuko'];?>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>Sel Epitel </td>
                    <td>: <?php echo $source['sedimen_epitel'];?>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>Kristal</td>
                    <td>: <?php kristal($source['sedimen_kristal']);?>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>Silinder</td>
                    <td>: <?php silinder($source['sedimen_silinder']);?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>Bakteri</td>
                    <td>: <?php bakteri($source['sedimen_bakteri']);?></td>
                  </tr>
                </table>
          <br>
          <table class="preview" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="90">Tes Kehamilan </td>
              <td>: <?php negpospolos($source['tes_hamil']);?></td>
            </tr>
          </table>
          <br>
          <table class="preview" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr bgcolor="#CCCCCC">
              <td colspan="3"><strong>Faeces</strong></td>
            </tr>
            <tr>
              <td width="10">&nbsp;</td>
              <td width="80">Makroskopis</td>
              <td>: <?php echo $source['faeces_makroskopis'];?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Mikroskopis</td>
              <td>: <?php echo $source['faeces_mikroskopis'];?>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Ery</td>
              <td>: <?php echo $source['faeces_eri'];?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Leuko</td>
              <td>: <?php echo $source['faeces_leuko'];?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Amuba</td>
              <td>: <?php negpospolos($source['faeces_amuba']);?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Cyste</td>
              <td>: <?php negpospolos($source['faeces_cyste']);?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Ova</td>
              <td>: <?php ova($source['faeces_ova']);?></td>
            </tr>
          </table></td>
            <td width="2%" valign="top">&nbsp;</td>
          <td valign="top">Hematologi
              <table width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#000000" class="preview">
              
              <tr bgcolor="#CCCCCC">
                <td width="30%"><div align="center"><strong>Parameter</strong></div></td>
                <td width="30%"><div align="center"><strong>Hasil</strong></div></td>
                <td><div align="center"><strong>Nilai Normal </strong></div></td>
              </tr>
              <tr>
                <td>Hb</td>
                <td align="center" width="30%"><?php echo $source['hematologi_hb'];?>&nbsp;</td>
                <td align="center">L=14-8&nbsp; P = 12-16 g/dl </td>
              </tr>
              <tr>
                <td>LED</td>
                <td align="center"><?php echo $source['hematologi_led'];?> &nbsp;</td>
                <td align="center">L=2-12&nbsp; P = 2-20 mn/jam</td>
              </tr>
              <tr>
                <td>Lekosit</td>
                <td align="center"><?php echo $source['hematologi_lekosit'];?>&nbsp;</td>
                <td align="center">4.000 - 11.000 /cc </td>
              </tr>
              <tr>
                <td>Eritrosit</td>
                <td align="center"><?php echo $source['hematologi_eritrosit'];?>&nbsp;</td>
                <td align="center">L = 4.5-6.5 &nbsp;P = 3.0-6.0 juta/cc &nbsp;</td>
              </tr>
              <tr>
                <td>Trombosit</td>
                <td align="center"><?php echo $source['hematologi_trombosit'];?>&nbsp;</td>
                <td align="center">150.000 - 450.000 /cc&nbsp;</td>
              </tr>
              <tr>
                <td>Hematokrit</td>
                <td align="center"><?php echo $source['hematologi_hematrokit'];?>&nbsp;</td>
                <td align="center">L = 40 - 55 &nbsp;P = 35 - 47</td>
              </tr>
              
            </table>
          <br>
          <table class="preview" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr bgcolor="#CCCCCC">
              <td colspan="3"><strong>Mikrobiologi</strong></td>
            </tr>
            <tr>
              <td width="10">&nbsp;</td>
              <td width="100">Malaria</td>
              <td>: <?php malaria($source['mikro_malaria']) ;?>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Prep Gram </td>
              <td>: <?php negpospolos($source['mikro_pep_gram']);?>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>BTA (Sputum)  </td>
              <td>: <?php echo $source['mikro_bta'];?>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>A</td>
              <td>: <?php echo $source['mikro_a'];?>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>B</td>
              <td>: <?php echo $source['mikro_b'];?>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>C</td>
              <td>: <?php echo $source['mikro_c'];?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Koh (100%) </td>
              <td>: <?php koh($source['mikro_koh']);?></td>
            </tr>
          </table>
          <br>
          Kimia Klinik
          <table width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#000000" class="preview">
            <tr bgcolor="#CCCCCC">
              <td width="30%"><div align="center"><strong>Parameter</strong></div></td>
              <td width="30%"><div align="center"><strong>Hasil</strong></div></td>
              <td><div align="center"><strong>Nilai Normal </strong></div></td>
            </tr>
            <tr>
              <td>Glukosa Puasa </td>
              <td align="center" width="30%"><?php echo $source['glukosa_puasa'];?>&nbsp;</td>
              <td align="center">76 - 100 mg/dl </td>
            </tr>
            <tr>
              <td>Glukosa 2 Jam PP </td>
              <td align="center"><?php echo $source['glukosa_2jam'];?>&nbsp;</td>
              <td align="center">&lt; 120 mg/dl </td>
            </tr>
          </table>
          <br>
          <table class="preview" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="50%">Lain-lain  : <?php echo $source['lain_pemeriksaan'];?></td>
              <td>Hasil : <?php echo $source['lain_hasil'];?></td>
            </tr>
          </table></td>
        </tr>
    </table>
    <br>
</div>

<?php

function koh($case){
  switch ($case) {
    case 1:
    echo '(-) Negative';
    break;
    
    case 2:
    echo '(+) Positive Condida';
    break;
  }
}
/*
  opsi untuk hasil dengan pilihan negative atau positive saja
*/
function negpospolos($case){
  switch ($case) {
    case 1:
    echo '(-) Negative';
    break;
    
    case 2:
    echo '(+) Positive';
    break;
  }
}

function negpos($case){
  switch ($case) {
    case 1:
    echo '(-) Negative';
    break;
    
    case 2:
    echo '(+) Positive 1';
    break;

    case 3:
    echo '(+) Positive 2';
    break;

    case 4:
    echo '(+) Positive 3';
    break;

     }
}
function kristal($case){
  switch ($case) {
    case 1:
    echo '(+) Ca Oxdot';
    break;
    
    case 2:
    echo '(+) Ca Carbonat';
    break;

    case 3:
    echo '(+) Tripel Pospat';
    break;

    case 4:
    echo '(+) Asam Urat';
    break;

    case 5:
    echo '(-) Negative';
    break;
     }

}

function silinder($case){

 switch ($case) {
    case 1:
    echo '(+) Hydin';
    break;
    
    case 2:
    echo '(+) Gronulo';
    break;

    case 3:
    echo '(-) Negative';
    break;
     }

}

function bakteri($case){
  switch ($case) {
    case 1:
    echo '(-) Negative';
    break;
    
    case 2:
    echo '(+) Botong';
    break;

    case 3:
    echo '(+) Cocus';
    break;

    case 4:
    echo '(+) Tricomonus';
    break;
     }

}

function ova($case){
  switch ($case) {
    case 1:
    echo '(-) Negative';
    break;
    
    case 2:
    echo '(+) Positive Cacing Tambang';
    break;

    case 3:
    echo '(+) Positive Cacing Cambuk';
    break;

    case 4:
    echo '(+) ositive Cacing Gelang';
    break;

     }
}

function malaria($case){
  switch ($case) {
    case 1:
    echo '(-) Negative';
    break;
    
    case 2:
    echo '(+) Positive Falcifarum';
    break;

    case 3:
    echo '(+) Positive Vivax';
    break;

    case 4:
    echo '(+) Positive Mix';
    break;

     }
}


?>