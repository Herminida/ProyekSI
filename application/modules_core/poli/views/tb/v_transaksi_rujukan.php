<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Form Rujukan / Pindah Pasien</a></li>
    </ul>

    <form id="frmTransaksi">

        <div class="well" id="rowPermohonan">
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
                    <td><input type="text" id="nama_anggota" name="nama_anggota" class="input-medium" readonly/></td>
                </tr>
                <tr>
                    <td><label for="nama_instansi">Instansi Tujuan</label></td>
                    <td><input type="text" id="nama_instansi" name="nama_instansi" class="input-medium"/></td>
                </tr>
                <tr>
                    <td><label for="telp_instansi">Telp Instansi</label></td>
                    <td><input type="text" id="telp_instansi" name="telp_instansi" class="input-medium"/></td>
                </tr>
                <tr>
                    <td><label for="tgl_rujukan">Tanggal</label></td>
                    <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                        <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                           <input type="text" name="tgl_rujukan" id="tgl_rujukan" class="input-small" readonly>
                           <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>
                        </div>
                        <div class="bfh-datepicker-calendar">
                          <table class="calendar table table-bordered">
                            <thead>
                              <tr class="months-header">
                                <th class="month" colspan="4">
                                  <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                  <span></span>
                                  <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                                </th>
                                <th class="year" colspan="3">
                                  <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                  <span></span>
                                  <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                                </th>
                              </tr>
                              <tr class="days-header">
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                    </div></td>
                </tr>
            </table>
        </div>

        <input type="hidden" id="id_rujukan" name="id_rujukan"/>
        <input type="hidden" id="kpp" name="kpp"/>
        <input type="hidden" id="unker" name="unker"/>
        <button id="btnSimpan" class="btn-primary"><i class="icon-ok icon-white"></i> Simpan</button>
    </form>

    <hr/>
    <button type="button" id="btnTambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="btnUbah" disabled><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="btnHapus" disabled><i class="icon-remove"></i> Hapus</button>

    <table id="tblRujukan">
        <thead>
            <th>RM TB</th>
            <th>Nama Pasien</th>
            <th>Umur</th>
            <th>Instansi Tujuan</th>
            <th>Telp Instansi</th>
            <th>Tanggal</th>
            <th>Unker</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(function(){
    $('a[rel*=facebox]').facebox();
    oTable=$('#tblRujukan').dataTable({
        "sRowSelect": "single",
        "sDom": "frtip",
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "<?php echo site_url('poli/'.'tb/transaksi_rujukan/data')?>",
        "aoColumns": [
            { "mData": "no_rm_tb" },
            { "mData": "nama_anggota" },
            { "mData": "umur" },
            { "mData": "nama_instansi" },
            { "mData": "telp_instansi" },
            { "mData": "tgl_rujukan" },
            { "mData": "nama_unit_kerja" },
        ]
    });

    $(document).on('click','#tblRujukan tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblRujukan tr.DTTT_selected').removeClass('DTTT_selected');
        $(this).addClass('DTTT_selected');
        $('#btnUbah,#btnHapus').prop('disabled',false);
    });

    $('#btnTambah').click(function(){
        resetlink()
    }).click();
    $('#btnUbah').click(function(){
        $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
        $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',false);
        for(var key in sData) {
            $('#frmTransaksi [name="'+key+'"]').val(sData[key]);
        }
    })
    $('#btnHapus').click(function(){
        if(confirm('Yakin akan menghapus?')){
            $.getJSON("<?php echo site_url('poli/'.'tb/transaksi_rujukan/hapus')?>/"+sData.id_rujukan,null,function(obj){
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
            url: '<?php echo site_url('poli/'.'tb/transaksi_rujukan/simpan')?>',
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                console.log(obj);
                if(obj.success){
                    alert('data Rujukan / Pindah Pasien sudah tersimpan');
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

function updatelinkRujukanoran(obj){
    $('#laboran_display').val(obj.nip_pegawai+'/'+obj.nama_pegawai);
    $('#laboran').val(obj.id_pegawai);
}

function resetlink(){
    sData=null;
    $('#tblRujukan tr.DTTT_selected').removeClass('DTTT_selected');
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',true);
    $('#btnUbah,#btnHapus').prop('disabled',true);
}

function updatelink(){
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',false);
    $.getJSON('<?php echo site_url('poli/'.'tb/transaksi_rujukan/detail_by_kpp')?>/'+popRujukan.id,null,function(obj){
        for(var key in obj) {
            $('#frmTransaksi [name="'+key+'"]').val(obj[key]);
        }
    });
    $('#no_rm_tb').val(popRujukan.no_rm_tb);
    $('#nama_anggota').val(popRujukan.nama_anggota);
    $('#kpp').val(popRujukan.id);
    $('#unker').val(popRujukan.unker);
}
function setkpp(obj){
    popRujukan=obj
    updatelink();
}
</script>