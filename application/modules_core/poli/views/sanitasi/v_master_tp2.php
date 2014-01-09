<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Master TP2 Pestisida</a></li>
    </ul>

    <form id="frmTP2" class="well">
        <table>
            <tr>
                <td><label>Nama TP2</label></td>
                <td><input type="text" id="nama" name="nama" class="input-large"/></td>
            </tr>
            <tr>
                <td><input type="hidden" id="id" name="id"/></td>
                <td><button id="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td>
            </tr>
        </table>
    </form>

    <button type="button" id="tambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="ubah" diTP2led><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="hapus" diTP2led><i class="icon-remove"></i> Hapus</button>

    <table id="tblTP2">
        <thead>
            <th>Id</th>
            <th>Nama</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(function(){
    oTable=$('#tblTP2').dataTable({
        "sRowSelect": "single",
        "sDom": "trtip",
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "<?php echo site_url('poli/sanitasi/master_tp2/data')?>",
        "aoColumns": [
            { "mData": "id" },
            { "mData": "nama" },
        ]
    });

    $(document).on('click','#tblTP2 tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblTP2 tr.DTTT_selected').removeClass('DTTT_selected');
        $(this).addClass('DTTT_selected');
        $('#ubah,#hapus').prop('diTP2led',false);
    });

    $('#tambah').click(function(){
        sData=null;
        $('#tblTP2 tr.DTTT_selected').removeClass('DTTT_selected');
        $('#id,#nama').val('');
        $('#ubah,#hapus').prop('diTP2led',true);
    }).click();
    $('#ubah').click(function(){
        $('#id').val(sData.id);
        $('#nama').val(sData.nama);
    })
    $('#hapus').click(function(){
        if(confirm('Yakin akan menghapus?')){
            $.getJSON("<?php echo site_url('poli/sanitasi/master_tp2/hapus')?>/"+sData.id,null,function(obj){
                if(obj.success){
                    alert('data sudah terhapus');
                    $('#tambah').click();
                    oTable.fnFilter('');
                }else if(obj.error!=''){
                    alert(obj.error);
                }
            });
        }
    })

    $('#frmTP2').submit(function(){
        data={};
        data['id']=$('#id').val();
        data['nama']=$('#nama').val();
        $.ajax({
            url: '<?php echo site_url('poli/sanitasi/master_tp2/simpan')?>',
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                if(obj.success){
                    alert('data Master TP2 sudah tersimpan');
                    $('#tambah').click();
                    oTable.fnFilter('');
                }else if(obj.error!=''){
                    alert(obj.error);
                }
            },
        });
        return false;
    });
});
</script>