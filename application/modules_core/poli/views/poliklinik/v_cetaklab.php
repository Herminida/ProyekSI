    <div class="span9"> <!-- content span -->
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Cetak Hasil Lab</a>
          </li>
         </ul>
        <div class="span7">
          <form class="well" id="frmHasiLab">
            <div id="rowFrmAntrian">
            <table>
              <tr>
                <td><label for="register">Reg</label></td>
                <td><div class="input-append">
                  <input type="text" id="register" name="register" readonly>
                  <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.$this->uri->segment(2).'/antrianhasil');?>" rel="facebox"><i class="icon-search"></i></a>
                </div></td>
                
              </tr>
              <tr>
                <td><label for="nik">NIK</label></td>
                <td><input type="text" id="nik" name="nik" readonly></td>
                
                
              </tr>
              <tr>
                <td><label for="nama_anggota">Nama Pasien</label></td>
                <td><input type="text" id="nama_anggota" name="nama_anggota" readonly></td>
                
              </tr>
              <tr>
                <td><label for="umur">Umur</label></td>
                <td><input type="text" id="umur" name="umur" readonly></td>
                
            </table>
          </div>
                    </div>
                           </div>
<button class="btn-primary btn-small" type="button" id="btnSimpan" onclick="tampil();" >Tampilkan</button>
       <button class="btn btn-small" type="button" onclick="resetall();" id="btnReset" >Reset</button>
         </form>
<!--/row-->
<button class="btn-primary btn-small" id="btnCetak" onclick="cetak()">Cetak</button>
<div id="cetak">
</div>
 </div><!--/span9-->
 
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
    function cetak(){
  $('#cetak').printArea();
}
function resetall(){
  $('#frmHasiLab input').val('');
  $('#cetak').html('');
  $('#btnCetak').hide();
}
function tampil(){
        data={};
       $.each(lData,function(key,value) {
          data[key]=value;
        });
        $.ajax({
          url: '<?php echo site_url('poli/'.'polilab/cetakhasillab')?>',
          data: data,
          method:'post',
          dataType: 'html',

          success: function(data){
            $('#cetak').html(data);
            $('#btnCetak').show();
          },
        });
        //resetlink()
        return false;
         //end submit function
      }
    function resetlink(){
        $('#btnSimpan').prop('disabled',true);
      $('#btnReset').prop('disabled',true);
    }
    function updatelink(sData){
      lData = sData
      console.log('update');
      $('#btnSimpan').prop('disabled',false);
      $('#btnReset').prop('disabled',false); 
    }
    $(function(){
      jQuery(document).ready(function() {
        jQuery('a[rel*=facebox]').facebox();
        resetlink();
        $('#btnCetak').hide();
      });
    });
    </script>
    