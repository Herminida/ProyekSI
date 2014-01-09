<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Master TPM</a></li>
    </ul>

    <form id="frmTPM" class="well">
        <table>
            <tr>
                <td width="100"><label>Type</label></td>
                <td><select id="kategori" name="kategori" class="input-medium">
                    <option value="Sarana Non IRTP">Sarana Non IRTP</option>
                    <option value="Sarana IRTP">Sarana IRTP</option>
                </select></td>
            </tr>
            <tr>
                <td><label>Nama TPM</label></td>
                <td><input type="text" id="nama" name="nama" class="input-large"/></td>
            </tr>
            <tr>
                <td><input type="hidden" id="id" name="id"/></td>
                <td><button id="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td>
            </tr>
        </table>
    </form>

    <button type="button" id="tambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="ubah" disabled><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="hapus" disabled><i class="icon-remove"></i> Hapus</button>

    <table id="tblTPM">
        <thead>
            <th>Kategori</th>
            <th>Nama</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(function(){
    oTable=$('#tblTPM').dataTable({
        "sRowSelect": "single",
        "sDom": "trtip",
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "<?php echo site_url('poli/sanitasi/master_tpm/data')?>",
        "aoColumns": [
            { "mData": "kategori" },
            { "mData": "nama" },
        ]
    });

    $(document).on('click','#tblTPM tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblTPM tr.DTTT_selected').removeClass('DTTT_selected');
        $(this).addClass('DTTT_selected');
        $('#ubah,#hapus').prop('disabled',false);
    });

    $('#tambah').click(function(){
        sData=null;
        $('#tblTPM tr.DTTT_selected').removeClass('DTTT_selected');
        $('#id,#nama').val('');
        $('#ubah,#hapus').prop('disabled',true);
    }).click();
    $('#ubah').click(function(){
        $('#id').val(sData.id);
        $('#kategori').val(sData.kategori);
        $('#nama').val(sData.nama);
    })
    $('#hapus').click(function(){
        if(confirm('Yakin akan menghapus?')){
            $.getJSON("<?php echo site_url('poli/sanitasi/master_tpm/hapus')?>/"+sData.id,null,function(obj){
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

    $('#frmTPM').submit(function(){
        data={};
        data['id']=$('#id').val();
        data['kategori']=$('#kategori').val();
        data['nama']=$('#nama').val();
        $.ajax({
            url: '<?php echo site_url('poli/sanitasi/master_tpm/simpan')?>',
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                if(obj.success){
                    alert('data Master TPM sudah tersimpan');
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