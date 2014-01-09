<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Grafik Hasil Pengobatan Pasien TB</a></li>
    </ul>

    <div class="well" id="rowRange">
        <table>
          <tr>
            <td>Kategori</td>
            <td>
              <select id="mode">
                <option value="Positif">BTA Positif</option>
                <option value="Negatif">BTA Negatif</option>
                <option value="Paru">Ekstra Paru</option>
                <option value="Kambuh">Kambuh</option>
                <option value="Default">Default</option>
                <option value="Gagal">Gagal</option>
                <option value="Kronik">Kronik</option>
                <option value="Lain-lain">Lain-lain</option>
              </select>
            </td>
          </tr>
            <tr>
                <td width="30"><label for="tgl_awal">Tgl</label></td>
                <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                        <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                           <input type="text" name="tgl_awal" id="tgl_awal" class="input-small" readonly>
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
                <td width="40" align="center"><label for="tgl_akhir">s/d:</label></td>
                <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                        <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                           <input type="text" name="tgl_akhir" id="tgl_akhir" class="input-small" readonly>
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
            </tr>
        </table>
    </div>
    <button type="button" id="btnTampilkan" class="btn-primary"><i class="icon-ok icon-white"></i> Tampilkan</button>

    <div id="preview" class="well" style="display:none;">
      <div id="placeholder" style="height:500px;"></div>
    </div>
</div>

<script src="<?php echo base_url()?>resource/js/jquery.flot.min.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript">
$(function(){
    var option={
            bars: { show: true },
            xaxis: {
              ticks: [[0,''], [1.5,'Sembuh'], [3.5,'Pengobatan Lengkap'],[5.5,'Gagal'], [7.5,'Pindah'], [9.5,'Meninggal']]
            },
            grid: {
              backgroundColor: { colors: ["#fff", "#eee"] }
            }
        };
    var data=[{
            label: 'Tipe Pasien',
            data: [[1,3], [5,5], [7,10], [9,0], [11,0]]
        }];
    // $.plot($("#placeholder"),data,option);
    $('#btnTampilkan').click(function(){
        $.ajax({
            url: '<?php echo site_url('poli/tb/laporan_grafik/hasil')?>/'+$('#mode').val()+'/'+$('#tgl_awal').val()+'/'+$('#tgl_akhir').val(),
            method: 'GET',
            dataType: 'json',
            async:'false',
            success: function(response){
                var newdata=[];
                for(var k in response){

                console.log(response);
                    if(k=='sembuh') newdata.push([1,response[k]]);
                    else if(k=='pengobatan_lengkap') newdata.push([3,response[k]]);
                    else if(k=='putus_berobat') newdata.push([5,response[k]]);
                    else if(k=='gagal') newdata.push([7,response[k]]);
                    else if(k=='pindah') newdata.push([9,response[k]]);
                    else if(k=='meninggal') newdata.push([11,response[k]]);
                }
                data[0].data=newdata;
                $('#preview').show();
                $.plot($("#placeholder"),data,option);
            }
        });
    });
    $('#tgl_awal,#tgl_akhir').val('<?php echo date("d-m-Y");?>');
});
</script>