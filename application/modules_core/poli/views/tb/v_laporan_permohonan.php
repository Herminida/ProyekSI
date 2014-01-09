<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Cetak Formulir Permohonan Laboratorium Untuk Pemeriksaan Dahak</a></li>
    </ul>

    <div class="well" id="rowKpp">
        <table>
            <tr>
                <td width="100"><label for="no_identitas_sedian">No Identitas Sedian</label></td>
                <td><div class="input-append pull-left">
                    <input type="text" id="no_identitas_sedian" name="no_identitas_sedian" class="input-medium" readonly/>
                    <a class="btn btn-small" type="button" id="link_identitas_sedian" href="<?php echo site_url('poli/'.'popup/lab/setlab')?>" rel="facebox"><i class="icon-search"></i></a>
                </div></td>
            </tr>
        </table>
    </div>
    <input type="hidden" id="no_rm_tb" name="no_rm_tb"/>
    <button type="button" id="btnTampilkan" class="btn-primary" disabled><i class="icon-ok icon-white"></i> Tampilkan</button>

    <div class="well" id="btnTool" style="display:none">
        <a class="btn" id="btnPrint" href="#" target="_blank"><i class="icon-print"></i> Print</a>
        <a class="btn" id="btnExcel" href="#"><i class="icon-list-alt"></i> Excel</a>
    </div>

    <div id="preview" class="well" style="display:none;overflow-x:auto;"></div>
</div>

<script type="text/javascript">
$(function(){
    $('a[rel*=facebox]').facebox();
    $('#btnTampilkan').click(function(){
        $('#preview').load('<?php echo site_url('poli/'.'tb/laporan_permohonan/preview_')?>/'+$('#no_rm_tb').val(),function(response,status,xhr){
            $('#btnPrint,#btnExcel').toggleClass('disabled',(response=='')).unbind();
            $('#btnPrint,#btnExcel').click(function(){return (response!='')});
            if(response=='')$(this).html('<span class="text-error">Data tidak ada</span>');
        });
        $('#btnTool,#preview').show();
        $('#btnPrint').attr('href','<?php echo site_url('poli/'.'tb/laporan_permohonan/print_')?>/'+$('#no_rm_tb').val());
        $('#btnExcel').attr('href','<?php echo site_url('poli/'.'tb/laporan_permohonan/excel_')?>/'+$('#no_rm_tb').val());
    });
});

function setlab(obj){
    $('#no_rm_tb').val(obj.no_rm_tb);
    $('#no_identitas_sedian').val(obj.no_identitas_sedian);
    $('#btnTampilkan').prop('disabled',false);
    $('#btnTool,#preview').hide();
}
</script>