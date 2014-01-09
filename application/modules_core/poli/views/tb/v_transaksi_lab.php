<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Hasil Pemeriksaan Lab</a></li>
    </ul>

    <form id="frmTransaksi">

        <div class="well" id="rowPermohonan">
            <table>
                <tr>
                    <td width="200"><label for="register">Register</label></td>
                    <td><div class="input-append pull-left">
                        <input type="text" id="register" name="register" class="input-medium" readonly/>
                        <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'popup/permohonan')?>" rel="facebox"><i class="icon-search"></i></a>
                    </div></td>
                </tr>
                <tr>
                    <td><label for="no_rm_tb">NIK TB</label></td>
                    <td><input type="text" id="no_rm_tb" name="no_rm_tb" class="input-medium" readonly/></td>
                </tr>
                <tr>
                    <td><label for="nama_anggota">Nama</label></td>
                    <td><input type="text" id="nama_anggota" name="nama_anggota" class="input-medium" readonly/></td>
                </tr>
                <tr>
                    <td><label for="tgl_pemeriksaan">Tanggal Pemeriksaan</label></td>
                    <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                        <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                           <input type="text" name="tgl_pemeriksaan" id="tgl_pemeriksaan" class="input-small" readonly>
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
                <tr>
                    <td><label for="hasil_s1">Hasil Pemeriksaan Sewaktu (S1)</label></td>
                    <td><select id="hasil_s1" name="hasil_s1" class="input-medium">
                        <option value="">-- pilih --</option><option>1+</option>
                        <option>2+</option><option>3+</option>
                        <option>1-9 BTA</option><option>Negatif</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="hasil_p">Hasil Pemeriksaan Page (P)</label></td>
                    <td><select id="hasil_p" name="hasil_p" class="input-medium">
                        <option value="">-- pilih --</option><option>1+</option>
                        <option>2+</option><option>3+</option>
                        <option>1-9 BTA</option><option>Negatif</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="hasil_s2">Hasil Pemeriksaan Sewaktu (S2)</label></td>
                    <td><select id="hasil_s2" name="hasil_s2" class="input-medium">
                        <option value="">-- pilih --</option><option>1+</option>
                        <option>2+</option><option>3+</option>
                        <option>1-9 BTA</option><option>Negatif</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="laboran_display">Diperiksa Oleh (Laboran)</label></td>
                    <td><div class="input-append pull-left">
                        <input type="text" id="laboran_display" name="laboran_display" class="input-large" readonly/>
                        <input type="hidden" id="laboran" name="laboran"/>
                        <a id="btnLaboran" class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'popup/laboran')?>" rel="facebox"><i class="icon-search"></i></a>
                    </div></td>
                </tr>
                <tr>
                    <td><label for="ket_hasil_lab">Keterangan</label></td>
                    <td><textarea id="ket_hasil_lab" name="ket_hasil_lab" class="input-large" rows="3"></textarea></td>
                </tr>
            </table>
        </div>

        <input type="hidden" id="id_hasil_lab" name="id_hasil_lab"/>
        <input type="hidden" id="permohonan_lab" name="permohonan_lab"/>
        <button id="btnSimpan" class="btn-primary"><i class="icon-ok icon-white"></i> Simpan</button>
    </form>

    <hr/>
    <button type="button" id="btnTambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="btnUbah" disabled><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="btnHapus" disabled><i class="icon-remove"></i> Hapus</button>

    <table id="tblLab">
        <thead>
            <th>Register</th>
            <th>NIK TB</th>
            <th>Nama</th>
            <th>Yankes</th>
            <th>Laboran</th>
            <th>Alasan Pemeriksaan</th>
            <th>Tgl Pemeriksaan</th>
            <th>Hasil S1</th>
            <th>Hasil P</th>
            <th>Hasil S2</th>
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
        "sAjaxSource": "<?php echo site_url('poli/'.'tb/transaksi_lab/data')?>",
        "aoColumns": [
            { "mData": "register" },
            { "mData": "no_rm_tb" },
            { "mData": "nama_anggota" },
            { "mData": "nama_unit_kerja" },
            { "mData": "nama_pegawai" },
            { "mData": "diagnosa" },
            { "mData": "tgl_pemeriksaan" },
            { "mData": "hasil_s1" },
            { "mData": "hasil_p" },
            { "mData": "hasil_s2" },
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
        popPermohonan=sData;
        updatelink();
    })
    $('#btnHapus').click(function(){
        if(confirm('Yakin akan menghapus?')){
            $.getJSON("<?php echo site_url('poli/'.'tb/transaksi_lab/hapus')?>/"+sData.id_hasil_lab,null,function(obj){
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
            url: '<?php echo site_url('poli/'.'tb/transaksi_lab/simpan')?>',
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

function updatelinkLaboran(obj){
    $('#laboran_display').val(obj.nip_pegawai+'/'+obj.nama_pegawai);
    $('#laboran').val(obj.id_pegawai);
}

function resetlink(){
    sData=null;
    $('#tblLab tr.DTTT_selected').removeClass('DTTT_selected');
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',true);
    $('#btnLaboran').unbind().click(function(){return false;}).addClass('disabled');
    $('#btnUbah,#btnHapus').prop('disabled',true);
}

function updatelink(){
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',false);
    $('#btnLaboran').removeClass('disabled').facebox();
    $.getJSON('<?php echo site_url('poli/'.'tb/transaksi_lab/detail_by_permohonan')?>/'+popPermohonan.id_permohonan_lab,null,function(obj){
        for(var key in obj) {
            $('#frmTransaksi [name="'+key+'"]').val(obj[key]);
        }
        if(obj.nip_pegawai){$('#laboran_display').val(obj.nip_pegawai+'/'+obj.nama_pegawai);}
    });
    $('#register').val(popPermohonan.register);
    $('#no_rm_tb').val(popPermohonan.no_rm_tb);
    $('#nama_anggota').val(popPermohonan.nama_anggota);
    $('#permohonan_lab').val(popPermohonan.id_permohonan_lab);
}
function updatelinkPermohonan(obj){
    updatelink();
}
</script>