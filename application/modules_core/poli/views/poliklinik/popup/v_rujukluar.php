<div class="span8">
	<form class="well" id="frmRujukLuar" name="frmRujukLuar">
		<table>
			<tr>
				<td><label for="register">Register</label></td>
				<td><input type="text" class="span3" id="register" name="register"></td>
			</tr>

			<tr>
				<td><label for="identitas">Identitas</label></td>
				<td>
          <select id="identitas" name="identitas">
					<option value='1'>Labkesda</option>
          <option value='2'>Rumah Sakit</option>
					</select>
        </td>
			</tr>
    
      <tr>
        <td><label>Dokter Perujuk</label></td>
        <td>
          <select id="dokter_id">

          </select>
         </td>
      </tr>
      <tr>
        <td><label for="ket_rujuk">Rumah Sakit Rujukan</label></td>
        <td><input type="textarea" class="span3" id="ket_rujuk" name="ket_rujuk"></td>
      </tr>
    </table>
<button type="button" onclick="tampil()"class="btn-primary btn-small">Tampilkan</button>
  </form>  
  <button type="button" id="btnCetak" onclick="cetak()"class="btn-primary btn-small">Cetak</button>
  <div id="cetak" >
  </div>
</div>
<script type="text/javascript">
function cetak(){
  $('#cetak').printThis();
}
function tampil(){
        data={};
       $.each(lData,function(key,value) {
          data[key]=value;
        });
        data['kerujuk']=$("#identitas").children("option").filter(":selected").text()
        data['perujuk']=$("#dokter_id").children("option").filter(":selected").text()
        data['rujukan']=$("#ket_rujuk").val()
        $.ajax({
          url: '<?php echo site_url('poli/'.'popup/cetakRujukLuar')?>',
          data: data,
          method:'post',
          dataType: 'html',

          success: function(data){
            $('#cetak').html(data);
            $('#btnCetak').show();
          },
        });
        resetlink()
         //end submit function
      }

function cekDokter(){

    /*console.log($('#dokter_id').val());
    console.log('memulai seting');*/
    
     $.ajax({
            url: "<?php echo site_url('poli/'.'popup/cekDokter')?>"+'/'+sData.idpemeriksaan,
            method:'post',
            async:false,
            dataType: 'json',

            success: function(obj){
                $('#dokter_id').val(obj.dokter);            
                $('#dokter_id').prop('disabled',obj.status);
            },
          });
  }

function isidokter(){
      var items="";
      var data={ klinik_id:sData.klinik_id};
      var purl = '<?php echo site_url("poli/popup/ajaxDokter");?>';
       $.getJSON(purl,data,function(kdatas){
       if (jQuery.isEmptyObject(kdatas)){
      }else{
        for(var i in kdatas){
          var kel = kdatas[i];
         items+="<option value='"+kel.nik_dokter+"'>"+kel.nama_dokter+"</option>";
       } 
         $("#dokter_id option").remove();
         $("#dokter_id").append(items); 
        }
        cekDokter()

        }
    );
    }




$(document).ready(function(){
  isidokter();
  $('#frmRujukLuar input[name="register"]').val(sData.id);
  lData= sData;
  $('#btnCetak').hide();
});
</script>