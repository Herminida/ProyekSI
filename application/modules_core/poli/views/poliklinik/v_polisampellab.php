    <div class="span9"> <!-- content span -->
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#" onclick="return false">Pengambilan Sampel</a>
          </li>
         </ul>
          <form name="frmHell" id="frmHell">
               <?php $this->load->view('poliklinik/v_row_antrian');?>
<div class="row">
<div class="span7 well">
     <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">SAMPLING</span>
        </div>
        <div>
          <hr>
        </div>
    </div>
      <table>
        <tr>
        <tr>
            <td><label>JENIS</label></td>
            <td>
              <select class="span3" id="sampling_jenis" name="sampling_jenis" disabled>
                <option value="URINE">URINE</option>
                <option value="DARAH">DARAH</option>
                <option value="WIDAL">WIDAL</option>
              </select>
            </td>
        </tr>
     </table>
</div>
</div>
    <button class="btn-primary btn-small" id="btnSimpan" name="btnSimpan" disabled>SIMPAN</button>
    <button class="btn btn-small" id="btnReset" type="button" onclick="resetlink();"  name="btnReset" disabled>RESET</button>
   </form>
</div><!--/span9-->
</div><!--/row-->

</div><!--/.fluid-container-->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
   
  function resetlink(){
    $('#frmHell select').prop('disabled',true);
    $('#frmHell #btnSimpan').prop('disabled',true);
    $('#frmHell #btReset').prop('disabled',true);
    resetAntrian();
  }

  function updatelink(sData){
    $('#frmHell select').prop('disabled',false);
    $('#frmHell #btnSimpan').prop('disabled',false);
    $('#frmHell #btnReset').prop('disabled',false);
  }


 jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox();

 $('#frmHell').submit(function(){
    $('#btnSimpan').prop('disabled',true);
      data={
        sampling_jenis:$('#frmHell #sampling_jenis').val()
        ,id_lab:sData.id_lab
      };
      $.ajax({
        url: "<?php echo site_url('poli/'.'polisampel/simpan')?>",
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
    return false;
  });

  });
    

    </script>