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
        <?php  $this->load->view('poliklinik/laporan/v_templatejudul');?>
        <?php //$this->load->view('poliklinik/laporan/v_templatefilterpuskesmas');?>
        <td>&nbsp;</td>
        <input type="hidden" value='<?php echo $poli;?>' id="poli" name="poli" >
        <td valign="top"><button type="button" onclick="tampil();"  class="btn btn-small btn-primary">Tampilkan</button></td>
        <td valign="top"><button type="button" onclick="simpan();" class="btn btn-small" id="btnExport" name="btnExport" disabled>Export</button></td>
      </tr>
    </tr>
    <tr>
    </tr>
  </table>
  <br/>
  <br>
  <div id="laporanPrev" style="height:384px;"> <!-- height: 768px; --> 

  </div>
</div>
<script type="text/javascript">
       /* 
        axes: {
              xaxis:{
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: data.label
                }
            }
            */



            function tampil(){
              $('#laporanPrev').html('');
             var jsonurl = '<?php echo site_url("poli/laporan/lap_chart/getGrafikPenyakit");?>';
             data={tgl_awal:$('#dpAwal').attr('sql-date'),tgl_akhir:$('#dpAkhir').attr('sql-date')};

             $.ajax({
               async: false,
               url: jsonurl,
               data:data,
               dataType:"json",
               success: function(data) {
                if($.isEmptyObject(data)){
                 $('#laporanPrev').html('Belum Ada Data');
               }else{
                $.jqplot.config.enablePlugins = true;
                $.jqplot ('laporanPrev', data.data, {
                  title: 'Laporan Grafik 10 Besar Penyakit',
                  seriesDefaults:{
                    renderer:$.jqplot.BarRenderer,
                    pointLabels: { show: true },
                    rendererOptions:{varyBarColor: true, barDirection: 'vertical'},
                  },
                  axesDefaults: {
                    tickRenderer: $.jqplot.CanvasAxisTickRenderer ,

                  },
                  axes: {
                    xaxis:{
                      renderer: $.jqplot.CategoryAxisRenderer,
                ticks: data.label,
                tickOptions: {
                  angle: -30,
                  fontSize: '10pt'
                }


              }
            },
            legend: {
              renderer: $.jqplot.EnhancedLegendRenderer, 
              show: true,
              location: 's',
              rendererOptions:{placement: "outside"}
              

            }

          });
              }
            }
          });
   // return ret;




 }


 </script>