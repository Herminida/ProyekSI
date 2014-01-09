<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Cetak Formulir Rujukan/ Pindah Pasien</a></li>
    </ul>

    <div class="well" id="rowKpp">
        <table>
            <tr>
                <td width="100"><label for="no_rm_tb">NIK TB</label></td>
                <td colspan="4"><div class="input-append pull-left">
                    <input type="text" id="no_rm_tb" name="no_rm_tb" class="input-medium" readonly/>
                    <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'popup/kpp/setkpp')?>" rel="facebox"><i class="icon-search"></i></a>
                </div></td>
            </tr>
        </table>
    </div>
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
        $('#preview').load('<?php echo site_url('poli/'.'tb/laporan_rujukan/preview_')?>/'+$('#no_rm_tb').val(),function(response,status,xhr){
            $('#btnPrint,#btnExcel').toggleClass('disabled',(response=='')).unbind();
            $('#btnPrint,#btnExcel').click(function(){return (response!='')});
            if(response=='')$(this).html('<span class="text-error">Data tidak ada</span>');
        });
        $('#btnTool,#preview').show();
        $('#btnPrint').attr('href','<?php echo site_url('poli/'.'tb/laporan_rujukan/print_')?>/'+$('#no_rm_tb').val());
        $('#btnExcel').attr('href','<?php echo site_url('poli/'.'tb/laporan_rujukan/excel_')?>/'+$('#no_rm_tb').val());
    });
});

function setkpp(obj){
    $('#no_rm_tb').val(obj.no_rm_tb);
    $('#btnTampilkan').prop('disabled',false);
    $('#btnTool,#preview').hide();
}
</script>