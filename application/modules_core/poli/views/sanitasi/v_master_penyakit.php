<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Master Penyakit</a></li>
    </ul>

    <form id="frmPenyakit" class="well">
        <table>
            <tr>
                <td><label>Nama Penyakit</label></td>
                <td><input type="text" id="nama" name="nama" class="input-large"/></td>
            </tr>
            <tr>
                <td><input type="hidden" id="id" name="id"/></td>
                <td><button id="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td>
            </tr>
        </table>
    </form>

    <button type="button" id="tambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="ubah" diPenyakitled><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="hapus" diPenyakitled><i class="icon-remove"></i> Hapus</button>

    <table id="tblPenyakit">
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
    oTable=$('#tblPenyakit').dataTable({
        "sRowSelect": "single",
        "sDom": "trtip",
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "<?php echo site_url('poli/sanitasi/master_penyakit/data')?>",
        "aoColumns": [
            { "mData": "id" },
            { "mData": "nama" },
        ]
    });

    $(document).on('click','#tblPenyakit tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblPenyakit tr.DTTT_selected').removeClass('DTTT_selected');
        $(this).addClass('DTTT_selected');
        $('#ubah,#hapus').prop('diPenyakitled',false);
    });

    $('#tambah').click(function(){
        sData=null;
        $('#tblPenyakit tr.DTTT_selected').removeClass('DTTT_selected');
        $('#id,#nama').val('');
        $('#ubah,#hapus').prop('diPenyakitled',true);
    }).click();
    $('#ubah').click(function(){
        $('#id').val(sData.id);
        $('#nama').val(sData.nama);
    })
    $('#hapus').click(function(){
        if(confirm('Yakin akan menghapus?')){
            $.getJSON("<?php echo site_url('poli/sanitasi/master_penyakit/hapus')?>/"+sData.id,null,function(obj){
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

    $('#frmPenyakit').submit(function(){
        data={};
        data['id']=$('#id').val();
        data['nama']=$('#nama').val();
        $.ajax({
            url: '<?php echo site_url('poli/sanitasi/master_penyakit/simpan')?>',
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                if(obj.success){
                    alert('data Master Penyakit sudah tersimpan');
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