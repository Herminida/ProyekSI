  <div class="span9"><!-- content span -->
    <input type="hidden" id="id_poli" name="id_poli" value='1'>
    <form name="frmHell" id="frmHell" method="post" action="<?php echo site_url();?>/polidewasa/simpan">
      <div class="row">
        <ul class="nav nav-tabs" id="tab-link">
          <li class="active">
            <a href="#">Dewasa</a>
          </li>
          <li class="tab disabled"><a class="tab-link" data-popup="diagnosa" href="#">Diagnosa Penyakit</a></li>
          <li class="tab disabled"><a class="tab-link" data-popup="rujukpoli" href="#">Rujuk Poli</a></li>
          <li class="tab disabled"><a class="tab-link" data-popup="tindakanmedis" href="#">Tindakan Medis</a></li>
          <li class="tab disabled"><a class="tab-link" data-popup="resep" href="#">Resep</a></li>
          <li class="tab disabled"><a class="tab-link" data-popup="rujukluar" href="#">Rujuk Luar</a></li>
          <li class="tab disabled"><a class="tab-link" data-popup="rujuklab" href="#">Laboratorium</a></li>
          </ul>
		  <div id="rowFrmAntrian">
          <div class="span7 well">
            <table>
              <tr>
                <td><label for="time_kunjungan">Tgl</label></td>
                <td><input type="text" class="input-small" name="tanggal" id="tanggal" disabled value="<?php echo date('d-m-Y')?>"></td>
              <?php /*  <td><div class="bfh-datepicker" data-format="d-m-y" data-date="22-01-2013">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                   <input type="text" class="input-medium" readonly>
                   <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>
                 </div>
                 <div class="bfh-datepicker-calendar">
                  <table class="calendar table table-bordered">
                    <thead>
                      <tr class="months-header">
                        <th class="month" colspan="4">
                          <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                          <span></span>
                          <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                        </th>
                        <th class="year" colspan="3">
                          <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                          <span></span>
                          <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                        </th>
                      </tr>
                      <tr class="days-header">
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </td> */ ?>
            <td> <!-- karena rujuk tidak reg baru, maka admission_reg ditambah id_pemeriksaan untuk acuan  -->
              
              <input type="hidden" id="idpemeriksaan" name="idpemeriksaan" value=''/>
              <input type="hidden" id="anggota_keluarga_id" name="anggota_keluarga_id" value=''/>
              <input type="hidden" id="validasi_reg" name="validasi_reg" value=''/>
              <input type="hidden" id="no_rm" name="no_rm" value=''/>
              <input type="hidden" id="unit_kerja_id" name="unker" value=''/>
              <input type="hidden" id="kunjungan_jenis" name="kunjungan_jenis" value=''/>

            </td>
            <td><label for="no_kk">No.KK</label></td>
            <td><input type="text" id="no_kk" name="no_kk" autocomplete="off" disabled></td>
          </tr>
          <tr>
            <td><label for="register">Reg</label></td>
            <td><div class="input-append">
              <input type="text" id="register" name="register" autocomplete="off" readonly>
              <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'poli/polidewasa/antrian');?>" rel="facebox"><i class="icon-search"></i></a>
            </div></td>
            <td>&nbsp;</td>
            <td><label for="nama_kk">Nama KK</label></td>
            <td><input type="text" id="nama_kk" name="nama_kk" autocomplete="off" disabled></td>
          </tr>
          <tr>
            <td><label for="nik">Nik</label></td>
            <td><input type="text" id="nik" name="nik" autocomplete="off" disabled></td>
            <td>&nbsp;</td>
            <td><label for="alamat">Alamat</label></td>
            <td><input type="text" id="alamat" name="alamat" autocomplete="off" disabled></td>
          </tr>
          <tr>
            <td><label for="nama_anggota">Nama</label></td>
            <td><input type="text" id="nama_anggota" name="nama_anggota" autocomplete="off" disabled></td>
            <td>&nbsp;</td>
            <td><label for="wilayah">Wilayah</label></td>
            <td><input type="text" id="wilayah" name="wilayah" autocomplete="off" disabled></td>
          </tr>
          <tr>
            <input type="hidden" id="umurtahun" name="umurtahun" autocomplete="off" disabled>
            <td><label for="umur">Umur</label></td>
            <td><input type="text" id="umur" name="umur" autocomplete="off" disabled></td>
            <td>&nbsp;</td>
            <td><label for="kunjungan">Kunjungan</label></td>
            <td><input type="text" id="kunjungan" name="kunjungan" autocomplete="off" disabled></td>
          </tr>
          <tr>
            <td><label for="status">Status Bayar</label></td>
            <td><input type="text" id="status" name="status" autocomplete="off" disabled></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>

      </div>
      <div class="span3">
       <label class="antrian" for="nomor_antrian" id="nomor_antrian" name="nomor_antrian"></label>
     </div>
</div>
   </div><!--/row-->
   <div class="row"> <!--pemeriksaan-->
    <div class="labelhr">
      <span class="label">Riwayat Perawatan</span>
    </div>
    <div>
      <hr>
    </div>
  </div>
  <table class="table table-striped" id="tblRiwayatPerawatan">
    <thead>
      <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>

  <div class="row"> <!--pemeriksaan-->
    <div class="labelhr">
      <span class="label">Riwayat Kesehatan</span>
    </div>
    <div>
      <hr>
    </div>
  </div>
  <table class="table table-striped" id="tblRiwayatKesehatan">
    <thead>
      <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
  <div id="rowFrmPoli">
  <div class="row"> <!--label fisik-->
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
      <td> <label for="keluhan_utama">Keluhan Utama</label></td>
      <td><input type="text" class="span8" id="keluhan_utama" autocomplete="off" name="keluhan_utama" disabled>

      </td>
    </tr>
    <tr>
      <td>   <label for="keluhan_sekunder">Keluhan Sekunder</label></td>
      <td>
        <input type="text" class="span8" id="keluhan_sekunder" autocomplete="off" name="keluhan_sekunder" disabled>

      </td>
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
      <td><input type="text" id="respirasi" name="respirasi" autocomplete="off" disabled></td>
    </tr>
    <tr>
      <td><label for="suhu_badan">Suhu Badan</label></td>
      <td><input type="text" id="suhu_badan" name="suhu_badan" autocomplete="off" disabled></td>
    </tr>
    <tr>
      <td><label for="denyut_nadi">Denyut Nadi</label></td>
      <td><input type="text" id="denyut_nadi" name="denyut_nadi" autocomplete="off" disabled></td>
    </tr>
    <tr>
      <td><label for="bb">BB</label></td>
      <td><input type="text" id="bb" name="bb" onblur="hitbox()" autocomplete="off" disabled></td>
      <td>&nbsp;</td>
      <td><label for="bbtb">BB/TB</label></td>
      <td><input type="text" id="bbtb" name="bbtb" autocomplete="off" disabled></td>
    </tr>
    <tr>
      <td><label for="tb">TB</label></td>
      <td><input type="text" id="tb" name="tb" onblur="hitbox()" autocomplete="off" disabled></td>
      <td>&nbsp;</td>
      <td><label for="bbu">BB/U</label></td>
      <td><input type="text" id="bbu" name="bbu" autocomplete="off" disabled></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td>&nbsp;</td>
      <td><label for="tbu">TB/U</label></td>
      <td><input type="text" id="tbu" name="tbu" autocomplete="off" disabled></td>
    </tr>
  </table>
</div>

<div class="row"> <!--label fisik-->
  <div class="labelhr">
    <span class="label">Fisik</span>
  </div>
  <div>
    <hr>
  </div>
</div>
<div></div> <!--magic fix / label end-->
<div class="well"><!--utama&sekunder-->
  <table disabled>
    <tr>
      <td><label for="hasil">Hasil</label></td>
      <td><textarea class="span8" id="fisik" rows="3" name="fisik" autocomplete="off" disabled></textarea></td>
    </tr>        
  </table>
</div>
</div>
<button type="submit" id="btnSimpan" class="btn btn-small" >Simpan</button>
<button type="reset" id="btnReset"class="btn btn-small" onclick="resetlink()" name="reset">Reset</button>
</form>
</div><!--/span9-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
    $(function(){
      jQuery(document).ready(function() {
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
            url: '<?php echo site_url('poli/'.'poli/polidewasa/simpan')?>',
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
      //$('a.tab-link').unbind();
    });
    
    
    function updatelink(id){
      if(id){
      $("a.tab-link").each(function() {
       var href = '<?php echo site_url('poli/'.'poli/popup');?>/' + $(this).attr('data-popup');
       $(this).attr("href", href + '/'+ id);
       $(this).attr("rel", 'facebox');
     });
      setformdisabled(false);
      $('#tab-link li.disabled').removeClass('disabled');
      $('a.tab-link').unbind();
      $('a.tab-link[rel="facebox"]').facebox();
      if($('#frmHell input[name="validasi_reg"]').val()=='1'){
        getPemeriksaan();
      }
      } 
    };


    function resetlink(){
     $('a.tab-link').attr('href','#').attr('rel','');
      $('#tab-link li.tab').addClass('disabled');
      $('a.tab-link').unbind();
      $('a.tab-link').click(function(){return false;});
      setformdisabled(true);
      var tgl=$('#rowFrmAntrian input[name="tanggal"]').val();
      $('#frmHell input,#frmHell textarea').val('');
      $('#rowFrmAntrian input[name="tanggal"]').val(tgl);
      $('#frmHell label[name="nomor_antrian"]').html('');
      $('#frmHell input[name="tanggal"]').val('<?php echo date("d-m-Y")?>');
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

  function getPemeriksaan(){
    //var reg = $('#frmHell input[name="id_pemeriksaan"]');
    var purl = '<?php echo site_url("poli/poli/polidewasa/ajaxpemeriksaan");?>'+'/'+sData.idpemeriksaan;
    $.getJSON(purl,function(pdata){
       if (jQuery.isEmptyObject(pdata)){

      }else{
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
    
    $('#frmHell input[name="keluhan_utama"]').prop('disabled',stat);
    $('#frmHell input[name="keluhan_sekunder"]').prop('disabled',stat);
    $('#frmHell input[name="respirasi"]').prop('disabled',stat);
    $('#frmHell input[name="suhu_badan"]').prop('disabled',stat);
    $('#frmHell input[name="denyut_nadi"]').prop('disabled',stat);
    $('#frmHell input[name="bb"]').prop('disabled',stat);
    $('#frmHell input[name="tb"]').prop('disabled',stat);
    $('#frmHell textarea[name="fisik"]').prop('disabled',stat);
    $('#btnSimpan').prop('disabled',stat);

  }
  </script>