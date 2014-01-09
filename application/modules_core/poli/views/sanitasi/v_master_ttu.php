<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Master TTU</a></li>
    </ul>

    <form id="frmTTU" class="well">
        <table>
            <tr>
                <td width="100"><label>Type</label></td>
                <td><select id="kategori" name="kategori" class="input-medium">
                    <option value="Sarana Ibadah">Sarana Ibadah</option>
                    <option value="Sarana Perkantoran">Sarana Perkantoran</option>
                    <option value="Sarana Pendidikan">Sarana Pendidikan</option>
                    <option value="Sarana Lain">Sarana Lain</option>
                </select></td>
            </tr>
            <tr>
                <td><label>Nama TTU</label></td>
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

    <table id="tblTTU">
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
    oTable=$('#tblTTU').dataTable({
        "sRowSelect": "single",
        "sDom": "trtip",
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "<?php echo site_url('poli/sanitasi/master_ttu/data')?>",
        "aoColumns": [
            { "mData": "kategori" },
            { "mData": "nama" },
        ]
    });

    $(document).on('click','#tblTTU tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblTTU tr.DTTT_selected').removeClass('DTTT_selected');
        $(this).addClass('DTTT_selected');
        $('#ubah,#hapus').prop('disabled',false);
    });

    $('#tambah').click(function(){
        sData=null;
        $('#tblTTU tr.DTTT_selected').removeClass('DTTT_selected');
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
            $.getJSON("<?php echo site_url('poli/sanitasi/master_ttu/hapus')?>/"+sData.id,null,function(obj){
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

    $('#frmTTU').submit(function(){
        data={};
        data['id']=$('#id').val();
        data['kategori']=$('#kategori').val();
        data['nama']=$('#nama').val();
        $.ajax({
            url: '<?php echo site_url('poli/sanitasi/master_ttu/simpan')?>',
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                if(obj.success){
                    alert('data Master TTU sudah tersimpan');
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