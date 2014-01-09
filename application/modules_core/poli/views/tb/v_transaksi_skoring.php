<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Skoring Gejala dan Pemeriksaan Penunjang</a></li>
    </ul>

    <form id="frmTransaksi">

        <div class="well" id="rowSkoring">
            <table>
                <tr>
                    <td width="200"><label for="no_rm_tb">NIK TB</label></td>
                    <td colspan="4"><div class="input-append pull-left">
                        <input type="text" id="no_rm_tb" name="no_rm_tb" class="input-medium" readonly/>
                        <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'popup/kpp/setkpp')?>" rel="facebox"><i class="icon-search"></i></a>
                    </div></td>
                </tr>
                <tr>
                    <td><label for="no_rm">No RM</label></td>
                    <td colspan="4"><input type="text" id="no_rm" name="no_rm" class="input-medium" readonly/></td>
                </tr>
                <tr>
                    <td><label for="nama_anggota">Nama</label></td>
                    <td colspan="4"><input type="text" id="nama_anggota" name="nama_anggota" class="input-medium" readonly/></td>
                </tr>
                <tr>
                    <td><label for="parut_bcg_skor">Parut BCG</label></td>
                    <td><select id="parut_bcg_skor" name="parut_bcg_skor" class="input-mini">
                        <option value="">-pilih-</option><option>0</option>
                        <option>1</option><option>2</option><option>3</option>
                    </select></td>
                    <td>&nbsp;</td>
                    <td><label for="parut_bcg_desc">Deskripsi</label></td>
                    <td><input type="text" id="parut_bcg_desc" name="parut_bcg_desc" class="input-large"/></td>
                </tr>
                <tr>
                    <td><label for="tuberklin_skor">Uji Tuberklin</label></td>
                    <td><select id="tuberklin_skor" name="tuberklin_skor" class="input-mini">
                        <option value="">-pilih-</option><option>0</option>
                        <option>1</option><option>2</option><option>3</option>
                    </select></td>
                    <td>&nbsp;</td>
                    <td><label for="tuberklin_desc">Deskripsi</label></td>
                    <td><input type="text" id="tuberklin_desc" name="tuberklin_desc" class="input-large"/></td>
                </tr>
                <tr>
                    <td><label for="bb_skor">Berat Badan / Keadaan Gizi</label></td>
                    <td><select id="bb_skor" name="bb_skor" class="input-mini">
                        <option value="">-pilih-</option><option>0</option>
                        <option>1</option><option>2</option><option>3</option>
                    </select></td>
                    <td>&nbsp;</td>
                    <td><label for="bb_desc">Deskripsi</label></td>
                    <td><input type="text" id="bb_desc" name="bb_desc" class="input-large"/></td>
                </tr>
                <tr>
                    <td><label for="demam_tanpa_sebab_skor">Demam Tanpa Sebab</label></td>
                    <td><select id="demam_tanpa_sebab_skor" name="demam_tanpa_sebab_skor" class="input-mini">
                        <option value="">-pilih-</option><option>0</option>
                        <option>1</option><option>2</option><option>3</option>
                    </select></td>
                    <td>&nbsp;</td>
                    <td><label for="demam_tanpa_sebab_desc">Deskripsi</label></td>
                    <td><input type="text" id="demam_tanpa_sebab_desc" name="demam_tanpa_sebab_desc" class="input-large"/></td>
                </tr>
                <tr>
                    <td><label for="batuk_skor">Batuk</label></td>
                    <td><select id="batuk_skor" name="batuk_skor" class="input-mini">
                        <option value="">-pilih-</option><option>0</option>
                        <option>1</option><option>2</option><option>3</option>
                    </select></td>
                    <td>&nbsp;</td>
                    <td><label for="batuk_desc">Deskripsi</label></td>
                    <td><input type="text" id="batuk_desc" name="batuk_desc" class="input-large"/></td>
                </tr>
                <tr>
                    <td><label for="demam_tanpa_pembesaran_skor">Demam Tanpa Pembesaran Kelenjar Limfe, Koli, Aksila, Inguinal</label></td>
                    <td><select id="demam_tanpa_pembesaran_skor" name="demam_tanpa_pembesaran_skor" class="input-mini">
                        <option value="">-pilih-</option><option>0</option>
                        <option>1</option><option>2</option><option>3</option>
                    </select></td>
                    <td>&nbsp;</td>
                    <td><label for="demam_tanpa_pembesaran_desc">Deskripsi</label></td>
                    <td><input type="text" id="demam_tanpa_pembesaran_desc" name="demam_tanpa_pembesaran_desc" class="input-large"/></td>
                </tr>
                <tr>
                    <td><label for="bengkak_tulang_skor">Pembengkakan Tulang / Sendi Panggul, Lutut, Falang</label></td>
                    <td><select id="bengkak_tulang_skor" name="bengkak_tulang_skor" class="input-mini">
                        <option value="">-pilih-</option><option>0</option>
                        <option>1</option><option>2</option><option>3</option>
                    </select></td>
                    <td>&nbsp;</td>
                    <td><label for="bengkak_tulang_desc">Deskripsi</label></td>
                    <td><input type="text" id="bengkak_tulang_desc" name="bengkak_tulang_desc" class="input-large"/></td>
                </tr>
                <tr>
                    <td><label for="foto_toraks_skor">Foto Toraks</label></td>
                    <td><select id="foto_toraks_skor" name="foto_toraks_skor" class="input-mini">
                        <option value="">-pilih-</option><option>0</option>
                        <option>1</option><option>2</option><option>3</option>
                    </select></td>
                    <td>&nbsp;</td>
                    <td><label for="foto_toraks_desc">Deskripsi</label></td>
                    <td><input type="text" id="foto_toraks_desc" name="foto_toraks_desc" class="input-large"/></td>
                </tr>
                <tr>
                    <td><label for="total_skor">Total Skor</label></td>
                    <td colspan="4"><input type="text" id="total_skor" name="total_skor" class="input-small" readonly/></td>
                </tr>
                <tr>
                    <td><label for="ket_hasil">Keterangan Hasil</label></td>
                    <td colspan="4"><textarea id="ket_hasil" name="ket_hasil" class="input-xlarge" rows="3"></textarea></td>
                </tr>
            </table>
        </div>

        <input type="hidden" id="id_skoring" name="id_skoring"/>
        <input type="hidden" id="kpp" name="kpp"/>
        <button id="btnSimpan" class="btn-primary"><i class="icon-ok icon-white"></i> Simpan</button>
    </form>

    <hr/>
    <button type="button" id="btnTambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="btnUbah" disabled><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="btnHapus" disabled><i class="icon-remove"></i> Hapus</button>

    <table id="tblLab">
        <thead>
            <th>RM</th>
            <th>Nama Pasien</th>
            <th>Perujuk</th>
            <th>Tipe Pasien</th>
            <th>No Reg TB 03 UPK</th>
            <th>No Reg TB 03 Kab</th>
            <th>Ket Hasil</th>
            <th>Tgl Reg</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(function(){
    $('a[rel*=facebox]').facebox();
    oTable=$('#tblLab').dataTable({
        "sRowSelect": "single",
        "sDom": "frtip",
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "<?php echo site_url('poli/'.'tb/transaksi_skoring/data')?>",
        "aoColumns": [
            { "mData": "no_rm" },
            { "mData": "nama_anggota" },
            { "mData": "perujuk" },
            { "mData": "tipe_pasien" },
            { "mData": "reg_upk" },
            { "mData": "reg_kab" },
            { "mData": "ket_hasil" },
            { "mData": "tgl" },
        ]
    });

    $(document).on('click','#tblLab tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblLab tr.DTTT_selected').removeClass('DTTT_selected');
        $(this).addClass('DTTT_selected');
        $('#btnUbah,#btnHapus').prop('disabled',false);
    });

    $('#btnTambah').click(function(){
        resetlink()
    }).click();
    $('#btnUbah').click(function(){
        popData=sData;
        updatelink();
    })
    $('#btnHapus').click(function(){
        if(confirm('Yakin akan menghapus?')){
            $.getJSON("<?php echo site_url('poli/'.'tb/transaksi_skoring/hapus')?>/"+sData.id_hasil_lab,null,function(obj){
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
            url: '<?php echo site_url('poli/'.'tb/transaksi_skoring/simpan')?>',
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                console.log(obj);
                if(obj.success){
                    alert('data Skoring sudah tersimpan');
                    resetlink();
                    oTable.fnFilter('');
                }else if(obj.error!=''){
                    alert(obj.error);
                }
            },
        });
        return false;
    });

    $('#parut_bcg_skor,#tuberklin_skor,#bb_skor,#demam_tanpa_sebab_skor,#batuk_skor,#demam_tanpa_pembesaran_skor,#bengkak_tulang_skor,#foto_toraks_skor').change(function(){hitungSkor();});
});

function hitungSkor(){
    $('#total_skor').val(
        parseInt(($('#parut_bcg_skor').val()=='')?0:$('#parut_bcg_skor').val())
        + parseInt(($('#tuberklin_skor').val()=='')?0:$('#tuberklin_skor').val())
        + parseInt(($('#bb_skor').val()=='')?0:$('#bb_skor').val())
        + parseInt(($('#demam_tanpa_sebab_skor').val()=='')?0:$('#demam_tanpa_sebab_skor').val())
        + parseInt(($('#batuk_skor').val()=='')?0:$('#batuk_skor').val())
        + parseInt(($('#demam_tanpa_pembesaran_skor').val()=='')?0:$('#demam_tanpa_pembesaran_skor').val())
        + parseInt(($('#bengkak_tulang_skor').val()=='')?0:$('#bengkak_tulang_skor').val())
        + parseInt(($('#foto_toraks_skor').val()=='')?0:$('#foto_toraks_skor').val())
    );
}

function resetlink(){
    sData=null;
    $('#tblLab tr.DTTT_selected').removeClass('DTTT_selected');
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',true);
    $('#btnLaboran').unbind().click(function(){return false;}).addClass('disabled');
    $('#btnUbah,#btnHapus').prop('disabled',true);
}

function setkpp(obj){
    resetlink();
    popData=obj;
    updatelink();
}

function updatelink(){
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',false);
    $.getJSON('<?php echo site_url('poli/'.'tb/transaksi_skoring/detail_by_kpp')?>/'+popData.id,null,function(obj){
        for(var key in obj) {
            $('#frmTransaksi [name="'+key+'"]').val(obj[key]);
        }
    }).complete(function(){
        hitungSkor();
    });
    $('#no_rm').val(popData.no_rm_tb);
    $('#nama_anggota').val(popData.nama_anggota);
    $('#kpp').val(popData.id);
}
</script>