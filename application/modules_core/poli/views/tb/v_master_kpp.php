<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Master KPP</a></li>
    </ul>

    <form id="frmKpp" class="well">
        <table>
            <tr>
                <td width="100"><label for="kppType">Type</label></td>
                <td><select id="kppType" name="type" class="input-medium">
                    <option>Perujuk</option>
                    <option>Klasifikasi Pasien</option>
                    <option>Tipe Pasien</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="kppNama">Kpp</label></td>
                <td><input type="text" id="kppNama" name="nama" class="input-large"/></td>
            </tr>
            <tr>
                <td><input type="hidden" id="kppId" name="id"/></td>
                <td><button id="kppSimpan" class="btn btn-primary">Simpan</button></td>
            </tr>
        </table>
    </form>

    <button type="button" id="kppTambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="kppUbah" disabled><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="kppHapus" disabled><i class="icon-remove"></i> Hapus</button>

    <table id="tblKpp">
        <thead>
            <th width="50">#</th>
            <th>Nama</th>
            <th>Tipe</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(function(){
    oTable=$('#tblKpp').dataTable({
        "sRowSelect": "single",
        "sDom": "trtip",
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "<?php echo site_url('poli/'.'tb/master_kpp/data')?>",
        "aoColumns": [
            { "mData": "id" },
            { "mData": "nama" },
            { "mData": "type" },
        ]
    });

    $(document).on('click','#tblKpp tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblKpp tr.DTTT_selected').removeClass('DTTT_selected');
        $(this).addClass('DTTT_selected');
        $('#kppUbah,#kppHapus').prop('disabled',false);
    });

    $('#kppTambah').click(function(){
        sData=null;
        $('#tblKpp tr.DTTT_selected').removeClass('DTTT_selected');
        $('#kppId,#kppNama').val('');
        $('#kppUbah,#kppHapus').prop('disabled',true);
    }).click();
    $('#kppUbah').click(function(){
        $('#kppId').val(sData.id);
        $('#kppType').val(sData.type);
        $('#kppNama').val(sData.nama);
    })
    $('#kppHapus').click(function(){
        if(confirm('Yakin akan menghapus?')){
            $.getJSON("<?php echo site_url('poli/'.'tb/master_kpp/hapus')?>/"+sData.id,null,function(obj){
                if(obj.success){
                    alert('data sudah terhapus');
                    $('#kppTambah').click();
                    oTable.fnFilter('');
                }else if(obj.error!=''){
                    alert(obj.error);
                }
            });
        }
    })

    $('#frmKpp').submit(function(){
        data={};
        data['id']=$('#kppId').val();
        data['type']=$('#kppType').val();
        data['nama']=$('#kppNama').val();
        $.ajax({
            url: '<?php echo site_url('poli/'.'tb/master_kpp/simpan')?>',
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                if(obj.success){
                    alert('data Master KPP sudah tersimpan');
                    $('#kppTambah').click();
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