<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">2. Register Laboratorium TB</a></li>
    </ul>

    <div class="labellegend">
      <span class="label">Range</span>
    </div>
    <div class="well" id="rowRange">
        <table>
            <tr>
                <td width="70"><label for="tgl_awal">Tgl Awal</label></td>
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

    <div class="well" id="btnTool" style="display:none">
        <a class="btn" id="btnPrint" href="#" target="_blank"><i class="icon-print"></i> Print</a>
        <a class="btn" id="btnExcel" href="#"><i class="icon-list-alt"></i> Excel</a>
    </div>

    <div id="preview" class="well" style="display:none;overflow-x:auto;"></div>
</div>

<script type="text/javascript">
$(function(){
    $('#btnTampilkan').click(function(){
        $('#preview').load('<?php echo site_url('poli/'.'tb/laporan_2/preview_')?>/'+$('#tgl_awal').val()+'/'+$('#tgl_akhir').val(),function(response,status,xhr){
            $('#btnPrint,#btnExcel').toggleClass('disabled',(response=='')).unbind();
            $('#btnPrint,#btnExcel').click(function(){return (response!='')});
            if(response=='')$(this).html('<span class="text-error">Data tidak ada</span>');
        });
        $('#btnTool,#preview').show();
        $('#btnPrint').attr('href','<?php echo site_url('poli/'.'tb/laporan_2/print_')?>/'+$('#tgl_awal').val()+'/'+$('#tgl_akhir').val());
        $('#btnExcel').attr('href','<?php echo site_url('poli/'.'tb/laporan_2/excel_')?>/'+$('#tgl_awal').val()+'/'+$('#tgl_akhir').val());
    });
    $('#btnPrint').hide();
    $('#tgl_awal,#tgl_akhir').val('<?php echo date("d-m-Y");?>');
});
</script>