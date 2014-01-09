<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Kartu Identitas Pasien</a></li>
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
          <span class="label">Tgl Penjanjian Konsultasi Dokter</span>
        </div>
        <div class="well">
            <button type="button" id="konsulTambah" class="pull-right"><i class="icon-plus-sign"></i> Tambah</button>
            <table id="tblKonsul" class="table">
                <tbody></tbody>
            </table>
        </div>

        <div class="labellegend">
          <span class="label">Tgl Penjanjian Periksa Dahak Ulang</span>
        </div>
        <div class="well"><div class="row"><div class="span8">
            <button type="button" id="periksaTambah" class="pull-right"><i class="icon-plus-sign"></i> Tambah</button>
            <table id="tblPeriksa" class="table">
                <tbody></tbody>
            </table>
        </div></div></div>

        <div class="well">
            <table>
                <tr>
                    <td width="130"><label for="catatan">Catatan Penting (Dokter/Perawat)</label></td>
                    <td><textarea id="catatan" name="catatan" class="input-xxlarge" row="3"></textarea></td>
                </tr>
            </table>
        </div>

        <input type="hidden" id="id_kip_header" name="id_kip_header"/>
        <button id="btnSimpan" class="btn-primary"><i class="icon-ok icon-white"></i> Simpan</button>
    </form>

    <hr/>
    <button type="button" id="btnTambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="btnUbah" disabled><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="btnHapus" disabled><i class="icon-remove"></i> Hapus</button>

    <table id="tblKip">
        <thead>
            <th>NIK TB</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Umur</th>
            <th>Catatan</th>
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
        "sAjaxSource": "<?php echo site_url('poli/'.'tb/transaksi_kip/data')?>",
        "aoColumns": [
            { "mData": "no_rm_tb" },
            { "mData": "nik" },
            { "mData": "nama_anggota" },
            { "mData": "alamat" },
            { "mData": "umur" },
            { "mData": "catatan" },
            { "mData": "nama_unit_kerja" },
        ]
    });

    $(document).on('click','#tblKip tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblKip tr.DTTT_selected').removeClass('DTTT_selected');
        $(this).addClass('DTTT_selected');
        $('#btnUbah,#btnHapus').prop('disabled',false);
    });

    $('#konsulTambah').click(function(){
        tambahKonsul();
    })//.click();
    $('#periksaTambah').click(function(){
        tambahPeriksa();
    })//.click();
    $(document).on('click','[rel="hapusKonsul"]',function(){
        var delit=$(this).attr('id').split('_')[1];
        $('#konsulRow_'+delit).remove();
    })
    $(document).on('click','[rel="hapusPeriksa"]',function(){
        var delit=$(this).attr('id').split('_')[1];
        $('#periksaRow_'+delit).remove();
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
            $.getJSON("<?php echo site_url('poli/'.'tb/transaksi_kip/hapus')?>/"+sData.id_kip_header,null,function(obj){
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
            url: '<?php echo site_url('poli/'.'tb/transaksi_kip/simpan')?>',
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                console.log(obj);
                if(obj.success){
                    alert('data Kartu Identitas Pasien sudah tersimpan');
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

kid=0;
function tambahKonsul(obj){
    kid++;
    if((typeof obj)==='undefined' || (typeof obj.tahap)==='undefined'){
        obj={'tgl_konsul':'','tahap':'','jml_obat':'','tgl_kembali':''};
    }
    var ti=(obj.tahap=='Intensif')?'selected':'';
    var tl=(obj.tahap=='Lanjutan')?'selected':'';
    var tags = '<tr id="konsulRow_'+kid+'">';
        tags+= '<td><label for="konsulTglKonsul_'+kid+'">Tgl Konsul</label>';
        tags+= '  <div id="konsulPickTglKonsul_'+kid+'" class="bfh-datepicker" data-format="d-m-y" data-date="">';
        tags+= '  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">';
        tags+= '    <input type="text" name="tgl_konsul['+kid+']" id="konsulTglKonsul_'+kid+'" value="'+obj.tgl_konsul+'" class="input-small" readonly>';
        tags+= '    <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>';
        tags+= '  </div><div class="bfh-datepicker-calendar">';
        tags+= '    <table class="calendar table table-bordered"><thead>';
        tags+= '      <tr class="months-header"><th class="month" colspan="4">';
        tags+= '        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>';
        tags+= '        <span></span><a class="next" href="#"><i class="icon-chevron-right"></i></a>';
        tags+= '      </th><th class="year" colspan="3">';
        tags+= '        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>';
        tags+= '        <span></span><a class="next" href="#"><i class="icon-chevron-right"></i></a>';
        tags+= '      </th></tr><tr class="days-header"></tr>';
        tags+= '    </thead><tbody></tbody></table>';
        tags+= '  </div></div>';
        tags+= '</td><td><label for="konsulTahap_'+kid+'">Tahap Pengobatan</label>';
        tags+= '  <select id="konsulTahap_'+kid+'" name="tahap['+kid+']" class="input-medium">';
        tags+= '  <option value="">-- pilih --</option><option '+ti+'>Intensif</option><option '+tl+'>Lanjutan</option></select>';
        tags+= '</td><td><label for="konsulObat_'+kid+'">Jml Obat Diberikan</label>';
        tags+= '  <input type="text" id="konsulObat_'+kid+'" name="jml_obat['+kid+']" value="'+obj.jml_obat+'" class="input-small"/>';
        tags+= '</td><td><label for="konsulTglKembali_'+kid+'">Tgl Kembali</label>';
        tags+= '  <div id="konsulPickTglKembali_'+kid+'" class="bfh-datepicker" data-format="d-m-y" data-date="">';
        tags+= '  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">';
        tags+= '    <input type="text" name="tgl_kembali['+kid+']" id="konsulTglKembali_'+kid+'" value="'+obj.tgl_kembali+'" class="input-small" readonly>';
        tags+= '    <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>';
        tags+= '  </div><div class="bfh-datepicker-calendar">';
        tags+= '    <table class="calendar table table-bordered"><thead>';
        tags+= '      <tr class="months-header"><th class="month" colspan="4">';
        tags+= '        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>';
        tags+= '        <span></span><a class="next" href="#"><i class="icon-chevron-right"></i></a>';
        tags+= '      </th><th class="year" colspan="3">';
        tags+= '        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>';
        tags+= '        <span></span><a class="next" href="#"><i class="icon-chevron-right"></i></a>';
        tags+= '      </th></tr><tr class="days-header"></tr>';
        tags+= '    </thead><tbody></tbody></table>';
        tags+= '  </div></div>';
        tags+= '</td><td><button type="button" id="konsulHapus_'+kid+'" rel="hapusKonsul"><i class="icon-remove"></i><br>Hapus</button>';
        tags+= '</td></tr>';
    $('#tblKonsul > tbody:first').append(tags);
    $('#konsulPickTglKonsul_'+kid).bfhdatepicker($('#konsulPickTglKonsul_'+kid).data());
    $('#konsulPickTglKembali_'+kid).bfhdatepicker($('#konsulPickTglKembali_'+kid).data());
}
function clearKonsul(){
    $('#tblKonsul > tbody:first').children().remove();
}

pid=0;
function tambahPeriksa(obj){
    pid++;
    if((typeof obj)==='undefined' || (typeof obj.bulan)==='undefined'){
        obj={'tgl_pengambilan':'','bulan':''};
    }
    var tags = '<tr id="periksaRow_'+pid+'">';
        tags+= '<td><label for="periksaTglAmbil_'+pid+'">Tgl Kembali</label></td>';
        tags+= '<td><div id="periksaPickTglAmbil_'+pid+'" class="bfh-datepicker" data-format="d-m-y" data-date="">';
        tags+= '  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">';
        tags+= '    <input type="text" name="tgl_pengambilan['+pid+']" id="periksaTglAmbil_'+pid+'" value="'+obj.tgl_pengambilan+'" class="input-small" readonly>';
        tags+= '    <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>';
        tags+= '  </div><div class="bfh-datepicker-calendar">';
        tags+= '    <table class="calendar table table-bordered"><thead>';
        tags+= '      <tr class="months-header"><th class="month" colspan="4">';
        tags+= '        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>';
        tags+= '        <span></span><a class="next" href="#"><i class="icon-chevron-right"></i></a>';
        tags+= '      </th><th class="year" colspan="3">';
        tags+= '        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>';
        tags+= '        <span></span><a class="next" href="#"><i class="icon-chevron-right"></i></a>';
        tags+= '      </th></tr><tr class="days-header"></tr>';
        tags+= '    </thead><tbody></tbody></table>';
        tags+= '  </div></div></td>';
        tags+= '<td width="10">&nbsp;</td><td><label for="periksaBln_'+pid+'">Seminggu Sebelum Akhir Bulan Ke-</label></td>';
        tags+= '<td><input type="text" id="periksaBln_'+pid+'" name="bulan['+pid+']" value="'+obj.bulan+'" class="input-small"/></td>';
        tags+= '<td width="10">&nbsp;</td><td><button type="button" id="periksaHapus_'+pid+'" rel="hapusPeriksa"><i class="icon-remove"></i> Hapus</button></td>';
        tags+= '</tr>';
    $('#tblPeriksa > tbody:first').append(tags);
    $('#periksaPickTglAmbil_'+pid).bfhdatepicker($('#periksaPickTglAmbil_'+pid).data());
}
function clearPeriksa(){
    $('#tblPeriksa > tbody:first').children().remove();
}

function resetlink(){
    sData=null;
    $('#tblKip tr.DTTT_selected').removeClass('DTTT_selected');
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',true);
    $('#btnUbah,#btnHapus').prop('disabled',true);
    $('#rowPasien [name]').val('');
    clearKonsul();
    clearPeriksa();
}

function setkpp(obj){
    resetlink();
    popData=obj;
    updatelink();
}

function updatelink(){
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',false);
    var itungk=0;
    var itungp=0;
    $.getJSON('<?php echo site_url('poli/'.'tb/transaksi_kip/detail_by_rm_tb')?>/'+popData.no_rm_tb,null,function(obj){
        for(var key in obj) {
            $('#frmTransaksi [name="'+key+'"]').val(obj[key]);
        }
        clearKonsul();
        for(var key in obj.konsul) {
            tambahKonsul(obj.konsul[key]);
            itungk++;
        }
        clearPeriksa();
        for(var key in obj.periksa) {
            tambahPeriksa(obj.periksa[key]);
            itungp++;
        }
    }).complete(function(){
        if(itungk==0){tambahKonsul();}
        if(itungp==0){tambahPeriksa();}
    });
    $('#no_rm_tb').val(popData.no_rm_tb)
    $('#nama_anggota').val(popData.nama_anggota)
    $('#alamat_pasien').val(popData.alamat)
    $('#jenis_kelamin').val(popData.jenis_kelamin)
    $('#umur').val(popData.umur)
}
</script>