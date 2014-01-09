<?php
/**/?>
<div class="span9">
<table>
	<tr>
		<td colspan="2">LAPORAN <?php echo $judul;?></td>
  <tr>
    <tr>
		<td colspan="2">Periode</td>
  </tr>
  <tr>
		<td>
			<label>Dari:</label>
		</td>
		<td>
		<div class="bfh-datepicker" id="dpAwal" data-format="d-m-y" data-date="" sql-date="<?php echo date('Y-m-d')?>">
              <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                 <input type="text" class="input-small" name="tgl_awal" id="tgl_awal" value='<?php echo date('d-m-Y')?>' readonly>
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
        </td>
        <td>
			<label>Sampai:&nbsp;</label>
		</td>
        <td>
        	<div class="bfh-datepicker" id="dpAkhir" data-format="d-m-y" data-date="" sql-date="<?php echo date('Y-m-d')?>">
              <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                 <input type="text" class="input-small" name="tgl_akhir" id="tgl_akhir" value='<?php echo date('d-m-Y')?>' readonly>
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
        </td>
         <td><label >Kelurahan</label></td>
        <td>
          <select id="id_kelurahan" name="id_kelurahan">
             <option value=''>Pilih Kelurahan</option>
          </select>
      </td>
        <td>&nbsp;</td>

        <td valign="top"><button type="button" onclick="tampil();"  class="btn btn-small btn-primary">Tampilkan</button></td>
        <td valign="top"><button type="button" onclick="simpan();" class="btn btn-small" id="btnExport" name="btnExport" disabled>Export</button></td>
  </tr>
</tr>
<tr>
</tr>
</table>
<br/>
<br>
<div id="laporanPrev" class="scrollable" style="height: 768px; overflow-y: auto; overflow-x:auto">
	<?php //$this->load->view($file); ?>
</div>
</div>
<script type="text/javascript">
 $(function(){
      jQuery(document).ready(function() {
        isikelurahan();
        });
      })

function isikelurahan(){
      var items="";
      var purl = '<?php echo site_url("poli/poliposyandu/ajaxKelurahan");?>';
       $.getJSON(purl,function(kdatas){
       if (jQuery.isEmptyObject(kdatas)){
      }else{
        for(var i in kdatas){
          var kel = kdatas[i];
         items+="<option value='"+kel.id_kelurahan+"'>"+kel.nama_kelurahan+"</option>";
       } 
         $("#id_kelurahan option").remove();
         $("#id_kelurahan").append(items); 
        }
        }
    );
    }

function simpan(){
  
          var tgl_awal=$('#dpAwal').attr('sql-date')
          var tgl_akhir=$('#dpAkhir').attr('sql-date')
          var id_kelurahan=$('#id_kelurahan').val()
          var url='<?php echo site_url('poli/'.'laporan/'.$this->uri->segment(3).'/getLaporanRekamExcel'.$this->uri->segment(4).'/');?>'+'/'+tgl_awal+'/'+tgl_akhir+'/'+id_kelurahan
          //console.log(url);
          window.location = url
         //end submit function
         
      }
       
function tampil(){
        $('#laporanPrev').html('');
          data={
            tgl_awal:$('#dpAwal').attr('sql-date'),
            tgl_akhir:$('#dpAkhir').attr('sql-date'),
            id_kelurahan:$('#id_kelurahan').val()
            };
        $.ajax({
          url: '<?php echo site_url('poli/'.'laporan/'. $this->uri->segment(3) .'/getLaporanRekam'.$this->uri->segment(4))?>',
          data:data,
          method:'post',
          dataType: 'html',

          success: function(data){
            if(!data){
              data = 'Data Belum Tersedia';
              $('#btnExport').prop('disabled',true);
            }else
            {
              $('#btnExport').prop('disabled',false);
            }
            $('#laporanPrev').html(data);

          },
        });
         //end submit function
      }
</script>