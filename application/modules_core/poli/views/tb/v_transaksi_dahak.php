<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Hasil Pemeriksaan Dahak</a></li>
    </ul>

    <form id="frmTransaksi">

        <div class="well" id="rowKpp">
            <table>
                <tr>
                    <td width="100"><label for="no_rm_tb">NIK TB</label></td>
                    <td colspan="4"><div class="input-append pull-left">
                        <input type="text" id="no_rm_tb" name="no_rm_tb" class="input-medium" readonly/>
                        <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'popup/kpp/setkpp')?>" rel="facebox"><i class="icon-search"></i></a>
                    </div></td>
                </tr>
                <tr>
                    <td><label for="nama_anggota">Nama</label></td>
                    <td colspan="4"><input type="text" id="nama_anggota" name="nama_anggota" class="input-medium" readonly/></td>
                </tr>
                <tr>
                    <td><label for="alamat_pasien">Alamat</label></td>
                    <td colspan="4"><input type="text" id="alamat_pasien" name="alamat_pasien" class="input-large" readonly/></td>
                </tr>
                <tr>
                    <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
                    <td><input type="text" id="jenis_kelamin" name="jenis_kelamin" class="input-small" readonly/></td>
                    <td width="20"></td>
                    <td><label for="umur">Umur</label></td>
                    <td><input type="text" id="umur" name="umur" class="input-medium" readonly/></td>
                </tr>
            </table>
        </div>

        <div class="labellegend">
          <span class="label">Hasil Pemeriksaan Dahak</span>
        </div>
        <div class="well"><div class="row"><div class="span7">
            <button type="button" id="hasilTambah" class="pull-right"><i class="icon-plus-sign"></i> Tambah</button>
            <table id="tblHasil" class="table">
                <tbody></tbody>
            </table>
        </div></div></div>

        <input type="hidden" id="id_kpp" name="id_kpp"/>
        <button id="btnSimpan" class="btn-primary"><i class="icon-ok icon-white"></i> Simpan</button>
    </form>

    <hr/>
    <button type="button" id="btnTambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="btnUbah" disabled><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="btnHapus" disabled><i class="icon-remove"></i> Hapus</button>

    <table id="tblKip">
        <thead>
            <th>NIK TB</th>
            <th>Nama</th>
            <th>Nama PMO</th>
            <th>Status PMO</th>
            <th>Unit Kerja</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(function(){
    $('a[rel*=facebox]').facebox();
    oTable=$('#tblKip').dataTable({
        "sRowSelect": "single",
        "sDom": "frtip",
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "<?php echo site_url('poli/'.'tb/transaksi_dahak/data')?>",
        "aoColumns": [
            { "mData": "no_rm_tb" },
            { "mData": "nama_anggota" },
            { "mData": "nama_pmo" },
            { "mData": "status_pmo" },
            { "mData": "nama_unit_kerja" },
        ]
    });

    $(document).on('click','#tblKip tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblKip tr.DTTT_selected').removeClass('DTTT_selected');
        $(this).addClass('DTTT_selected');
        $('#btnUbah,#btnHapus').prop('disabled',false);
    });

    $('#hasilTambah').click(function(){
        tambahHasil();
    })//.click();
    $(document).on('click','[rel="hapusHasil"]',function(){
        var delit=$(this).attr('id').split('_')[1];
        $('#hasilRow_'+delit).remove();
    })

    $('#btnTambah').click(function(){
        resetlink()
    }).click();
    $('#btnUbah').click(function(){
        popData=sData;
        updatelink();
    })
    $('#btnHapus').click(function(){
        if(confirm('Yakin akan menghapus?')){
            $.getJSON("<?php echo site_url('poli/'.'tb/transaksi_dahak/hapus')?>/"+sData.id,null,function(obj){
                if(obj.success){
                    alert('data sudah terhapus');
                    resetlink();
                    oTable.fnFilter('');
                }else if(obj.error!=''){
                    alert(obj.error);
                }
            });
        }
    })

    $('#frmTransaksi').submit(function(){
        data={};
        $('#frmTransaksi [name]').each(function(){
            data[$(this).attr('name')]=$(this).val();
        });
        $.ajax({
            url: '<?php echo site_url('poli/'.'tb/transaksi_dahak/simpan')?>/'+popData.id,
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                console.log(obj);
                if(obj.success){
                    alert('data Hasil Pemeriksaan Dahak sudah tersimpan');
                    resetlink();
                    oTable.fnFilter('');
                }else if(obj.error!=''){
                    alert(obj.error);
                }
            },
        });
        return false;
    });

});

hid=0;
function tambahHasil(obj){
    hid++;
    if((typeof obj)==='undefined' || (typeof obj.bulan)==='undefined'){
        obj={'bulan':'','no_reg':'','bb':'','id_pemeriksaan':''};
    }
    var ti=(obj.tahap=='Intensif')?'selected':'';
    var tl=(obj.tahap=='Lanjutan')?'selected':'';
    var tags = '<tr id="hasilRow_'+hid+'">';
        tags+= '<td><label for="hasilBulan_'+hid+'">Bulan ke</label></td>';
        tags+= '<td><input type="text" id="hasilBulan_'+hid+'" name="bulan['+hid+']" value="'+obj.bulan+'" class="input-small"/></td>';
        tags+= '<td>&nbsp;</td><td><label for="hasilRegister_'+hid+'">Register</label></td>';
        tags+= '<td><div class="input-append pull-left">';
        tags+= '  <input type="text" id="hasilRegister_'+hid+'" name="no_reg['+hid+']" value="'+obj.no_reg+'" class="input-small"/>';
        tags+= '  <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'popup/permohonan')?>/'+hid+'" rel="facebox"><i class="icon-search"></i></a>';
        tags+= '</div></td><td>&nbsp;</td>';
        tags+= '<td><label for="hasilBb_'+hid+'">BB</label></td>';
        tags+= '<td><input type="text" id="hasilBb_'+hid+'" name="bb['+hid+']" value="'+obj.bb+'" class="input-mini"/></td>';
        tags+= '<td><button type="button" id="hasilHapus_'+hid+'" rel="hapusHasil"><i class="icon-remove"></i> Hapus</button>';
        tags+= '<input type="hidden" id="hasilId'+hid+'" name="id_pemeriksaan['+hid+']" value="'+obj.id_pemeriksaan+'"/></td></tr>';
    $('#tblHasil > tbody:first').append(tags);
    $('#hasilRow_'+hid+' a[rel="facebox"]').facebox();
}
function clearHasil(){
    $('#tblHasil > tbody:first').children().remove();
}

function updatelinkPermohonan(obj){
    $('#hasilRegister_'+obj.caller_id).val(obj.register);
}

function resetlink(){
    sData=null;
    $('#tblKip tr.DTTT_selected').removeClass('DTTT_selected');
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',true);
    $('#btnUbah,#btnHapus').prop('disabled',true);
    $('#rowPasien [name]').val('');
    clearHasil();
}

function setkpp(obj){
    resetlink();
    popData=obj;
    updatelink();
}

function updatelink(){
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',false);
    var itung=0;
    $.getJSON('<?php echo site_url('poli/'.'tb/transaksi_dahak/detail_by_kpp')?>/'+popData.id,null,function(obj){
        for(var key in obj) {
            $('#frmTransaksi [name="'+key+'"]').val(obj[key]);
        }
        clearHasil();
        for(var key in obj.hasil) {
            tambahHasil(obj.hasil[key]);
            itung++;
        }
    }).complete(function(){
        if(itung==0){tambahHasil();} 
    });
    $('#no_rm_tb').val(popData.no_rm_tb)
    $('#nama_anggota').val(popData.nama_anggota)
    $('#alamat_pasien').val(popData.alamat)
    $('#jenis_kelamin').val(popData.jenis_kelamin)
    $('#umur').val(popData.umur)
}
</script>