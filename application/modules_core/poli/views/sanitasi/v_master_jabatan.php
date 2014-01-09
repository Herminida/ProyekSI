<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Master Jabatan</a></li>
    </ul>

    <form id="frmJabatan" class="well">
        <table>
            <tr>
                <td><label>Nama Jabatan</label></td>
                <td><input type="text" id="nama" name="nama" class="input-large"/></td>
            </tr>
            <tr>
                <td><input type="hidden" id="id" name="id"/></td>
                <td><button id="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td>
            </tr>
        </table>
    </form>

    <button type="button" id="tambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="ubah" diJabatanled><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="hapus" diJabatanled><i class="icon-remove"></i> Hapus</button>

    <table id="tblJabatan">
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
    oTable=$('#tblJabatan').dataTable({
        "sRowSelect": "single",
        "sDom": "trtip",
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "<?php echo site_url('popli/sanitasi/master_jabatan/data')?>",
        "aoColumns": [
            { "mData": "id_jabatan" },
            { "mData": "nama_jabatan" },
        ]
    });

    $(document).on('click','#tblJabatan tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblJabatan tr.DTTT_selected').removeClass('DTTT_selected');
        $(this).addClass('DTTT_selected');
        $('#ubah,#hapus').prop('diJabatanled',false);
    });

    $('#tambah').click(function(){
        sData=null;
        $('#tblJabatan tr.DTTT_selected').removeClass('DTTT_selected');
        $('#id,#nama').val('');
        $('#ubah,#hapus').prop('diJabatanled',true);
    }).click();
    $('#ubah').click(function(){
        $('#id').val(sData.id_jabatan);
        $('#nama').val(sData.nama_jabatan);
    })
    $('#hapus').click(function(){
        if(confirm('Yakin akan menghapus?')){
            $.getJSON("<?php echo site_url('poli/sanitasi/master_jabatan/hapus')?>/"+sData.id_jabatan,null,function(obj){
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

    $('#frmJabatan').submit(function(){
        data={};
        data['id']=$('#id').val();
        data['nama']=$('#nama').val();
        $.ajax({
            url: '<?php echo site_url('poli/sanitasi/master_jabatan/simpan')?>',
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                if(obj.success){
                    alert('data Master Jabatan sudah tersimpan');
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