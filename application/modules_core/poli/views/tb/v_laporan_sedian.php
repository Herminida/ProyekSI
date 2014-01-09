<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Cetak Formulir Pengiriman Sedian Untuk Cross Check</a></li>
    </ul>

    <div class="well" id="rowKpp">
        <table>
            <tr>
                <td width="100"><label for="unit_kerja">Puskesmas</label></td>
                <td colspan="4"><select id="unit_kerja" name="unit_kerja">
                    <?php foreach ($puskesmas as $val){
                        echo '<option value="'.$val->id_unit_kerja.'">'.$val->nama_unit_kerja.'</option>';
                    }?>
                </select></td>
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
        $('#preview').load('<?php echo site_url('poli/'.'tb/laporan_sedian/preview_')?>/'+$('#unit_kerja').val(),function(response,status,xhr){
            $('#btnPrint,#btnExcel').toggleClass('disabled',(response=='')).unbind();
            $('#btnPrint,#btnExcel').click(function(){return (response!='')});
            if(response=='')$(this).html('<span class="text-error">Data tidak ada</span>');
        });
        $('#btnTool,#preview').show();
        $('#btnPrint').attr('href','<?php echo site_url('poli/'.'tb/laporan_sedian/print_')?>/'+$('#unit_kerja').val());
        $('#btnExcel').attr('href','<?php echo site_url('poli/'.'tb/laporan_sedian/excel_')?>/'+$('#unit_kerja').val());
    });
    $('#unit_kerja').change(function(){
        $('#btnTool,#preview').hide();
    });
});
</script>