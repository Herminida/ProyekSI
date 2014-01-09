<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Form Pengiriman Sedian Untuk Cross Check</a></li>
    </ul>

    <form id="frmTransaksi">

        <div class="well" id="rowKroscek">
            <table>
                <tr>
                    <td width="125"><label for="yankes_nama">Unit Yankes</label></td>
                    <td><div class="input-append pull-left">
                        <input type="text" id="yankes_nama" name="yankes_nama" class="input-medium" readonly/>
                        <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'popup/unitkerja/setyankes')?>" rel="facebox"><i class="icon-search"></i></a>
                    </div></td>
                </tr>
                <tr>
                    <td><label for="tgl_terima">Tgl Diterima</label></td>
                    <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                        <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                           <input type="text" name="tgl_terima" id="tgl_terima" class="input-small" readonly>
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
                    <td><label for="tgl_kirim">Tgl Dikirim</label></td>
                    <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                        <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                           <input type="text" name="tgl_kirim" id="tgl_kirim" class="input-small" readonly>
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
                    <td width="100"><label for="petugas_kab_nama">Petugas Kab</label></td>
                    <td><div class="input-append pull-left">
                        <input type="text" id="petugas_kab_nama" name="petugas_kab_nama" class="input-medium" readonly/>
                        <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'popup/pegawai/setpetugaskab')?>" rel="facebox"><i class="icon-search"></i></a>
                    </div></td>
                </tr>
                <tr>
                    <td width="100"><label for="petugas_kroscek_nama">Petugas Kroscek</label></td>
                    <td><div class="input-append pull-left">
                        <input type="text" id="petugas_kroscek_nama" name="petugas_kroscek_nama" class="input-medium" readonly/>
                        <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'popup/pegawai/setpetugaskroscek')?>" rel="facebox"><i class="icon-search"></i></a>
                    </div></td>
                </tr>
            </table>
            <input type="hidden" id="yankes" name="yankes"/>
            <input type="hidden" id="petugas_kab" name="petugas_kab"/>
            <input type="hidden" id="petugas_kroscek" name="petugas_kroscek"/>
        </div>

        <div class="well" id="rowItem">
            <table>
                <tr>
                    <td width="125"><label for="no_rm_tb">NIK TB</label></td>
                    <td><div class="input-append pull-left">
                        <input type="text" id="no_rm_tb" name="no_rm_tb" class="input-medium" readonly/>
                        <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'popup/kpp/setkpp')?>" rel="facebox"><i class="icon-search"></i></a>
                    </div></td>
                </tr>
                <tr>
                    <td><label for="nama_anggota">Nama</label></td>
                    <td><input type="text" id="nama_anggota" name="nama_anggota" class="input-medium" readonly/></td>
                </tr>
                <tr>
                    <td width="100"><label for="no_identitas_sedian">No Identitas Sedian</label></td>
                    <td><div class="input-append pull-left">
                        <input type="text" id="no_identitas_sedian" name="no_identitas_sedian" class="input-medium" readonly/>
                        <a class="btn btn-small" type="button" id="link_identitas_sedian" href="<?php echo site_url('poli/'.'popup/lab/setlab')?>" rel="facebox"><i class="icon-search"></i></a>
                    </div></td>
                </tr>
            </table>
            <input type="hidden" id="permohonan_lab" name="permohonan_lab"/>
        </div>

        <div class="labellegend">
          <span class="label">Pemeriksaan Lab Pertama</span>
        </div>
        <div class="well" id="rowLabPertama">
            <table>
                <tr>
                    <td width="200"><label for="tgl_pemeriksaan">Tanggal</label></td>
                    <td><div class="input-append">
                       <input type="text" name="tgl_pemeriksaan" id="tgl_pemeriksaan" class="input-small" readonly>
                       <button type="button" class="btn btn-small disabled" type="button"><i class="icon-calendar"></i></button>
                    </div></td>
                </tr>
                <tr>
                    <td><label for="hasil_s1">Hasil Pemeriksaan Sewaktu (S1)</label></td>
                    <td><input type="text" id="hasil_s1" name="hasil_s1" class="input-medium" readonly/></td>
                </tr>
                <tr>
                    <td><label for="hasil_p">Hasil Pemeriksaan Pagi (P)</label></td>
                    <td><input type="text" id="hasil_p" name="hasil_p" class="input-medium" readonly/></td>
                </tr>
                <tr>
                    <td><label for="hasil_s2">Hasil Pemeriksaan Sewaktu (S2)</label></td>
                    <td><input type="text" id="hasil_s2" name="hasil_s2" class="input-medium" readonly/></td>
                </tr>
            </table>
        </div>

        <div class="labellegend">
          <span class="label">Pemeriksaan Lab Kroscek</span>
        </div>
        <div class="well" id="rowLabKroscek">
            <table>
                <tr>
                    <td width="200"><label for="tgl_kroscek">Tanggal</label></td>
                    <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                        <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                           <input type="text" name="tgl_kroscek" id="tgl_kroscek" class="input-small" readonly>
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
                    <td><label for="kroscek_hasil_s1">Hasil Pemeriksaan Sewaktu (S1)</label></td>
                    <td><select id="kroscek_hasil_s1" name="kroscek_hasil_s1" class="input-medium">
                        <option value="">-- pilih --</option><option>1+</option>
                        <option>2+</option><option>3+</option>
                        <option>1-9 BTA</option><option>Negatif</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="kroscek_hasil_p">Hasil Pemeriksaan Pagi (P)</label></td>
                    <td><select id="kroscek_hasil_p" name="kroscek_hasil_p" class="input-medium">
                        <option value="">-- pilih --</option><option>1+</option>
                        <option>2+</option><option>3+</option>
                        <option>1-9 BTA</option><option>Negatif</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="kroscek_hasil_s2">Hasil Pemeriksaan Sewaktu (S2)</label></td>
                    <td><select id="kroscek_hasil_s2" name="kroscek_hasil_s2" class="input-medium">
                        <option value="">-- pilih --</option><option>1+</option>
                        <option>2+</option><option>3+</option>
                        <option>1-9 BTA</option><option>Negatif</option>
                    </select></td>
                </tr>
            </table>
            <input type="hidden" id="id_kroscek_item" name="id_kroscek_item"/>
        </div>

        <div class="well" id="rowKualitas">
            <table>
                <tr>
                    <td width="125"><label for="kualitas_sediaan">Kualitas Sediaan</label></td>
                    <td><select id="kualitas_sediaan" name="kualitas_sediaan" class="input-small">
                        <option value="">-- pilih --</option><option>Baik (B)</option><option>Jelek (J)</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="kualitas_pewarnaan">Kualitas Pewarnaan</label></td>
                    <td><select id="kualitas_pewarnaan" name="kualitas_pewarnaan" class="input-small">
                        <option value="">-- pilih --</option><option>Baik (B)</option><option>Jelek (J)</option>
                    </select></td>
                </tr>
            </table>
        </div>

        <button id="btnSimpan" class="btn-primary"><i class="icon-ok icon-white"></i> Simpan</button>
    </form>

    <hr/>
    <button type="button" id="btnTambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="btnUbah" disabled><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="btnHapus" disabled><i class="icon-remove"></i> Hapus</button>

    <table id="tblKroscek">
        <thead>
            <th>NIK TB</th>
            <th>Nama Pasien</th>
            <th>No Identitas Sediaan</th>
            <th>Tgl Kroscek</th>
            <th>Kroscek Hasil S1</th>
            <th>Kroscek Hasil P</th>
            <th>Kroscek Hasil S2</th>
            <th>Yankes</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(function(){
    $('a[rel*=facebox]').facebox();
    oTable=$('#tblKroscek').dataTable({
        "sRowSelect": "single",
        "sDom": "frtip",
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "<?php echo site_url('poli/'.'tb/transaksi_kroscek/data')?>",
        "aoColumns": [
            { "mData": "no_rm_tb" },
            { "mData": "nama_anggota" },
            { "mData": "no_identitas_sedian" },
            { "mData": "tgl_kroscek" },
            { "mData": "kroscek_hasil_s1" },
            { "mData": "kroscek_hasil_p" },
            { "mData": "kroscek_hasil_s2" },
            { "mData": "yankes" },
        ]
    });

    $(document).on('click','#tblKroscek tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblKroscek tr.DTTT_selected').removeClass('DTTT_selected');
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
            $.getJSON("<?php echo site_url('poli/'.'tb/transaksi_kroscek/hapus')?>/"+sData.id_hasil_lab,null,function(obj){
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
            url: '<?php echo site_url('poli/'.'tb/transaksi_kroscek/simpan')?>',
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                console.log(obj);
                if(obj.success){
                    alert('data Kroscek sudah tersimpan');
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

function setyankes(obj){
    $('#yankes').val(obj.id_unit_kerja);
    $('#yankes_nama').val(obj.nama_unit_kerja+'('+obj.kode_unit_kerja+')');
}
function setpetugaskab(obj){
    $('#petugas_kab').val(obj.id_pegawai);
    $('#petugas_kab_nama').val(obj.nama_pegawai+'('+obj.nip_pegawai+')');
}
function setpetugaskroscek(obj){
    $('#petugas_kroscek').val(obj.id_pegawai);
    $('#petugas_kroscek_nama').val(obj.nama_pegawai+'('+obj.nip_pegawai+')');
}
function setkpp(obj){
    $('#no_rm_tb').val(obj.no_rm_tb);
    $('#nama_anggota').val(obj.nama_anggota);

}
function setlab(obj){
    $('#permohonan_lab').val(obj.permohonan_lab);
    $('#tgl_pemeriksaan').val(obj.tgl_pemeriksaan);
    $('#hasil_s1').val(obj.hasil_s1);
    $('#hasil_p').val(obj.hasil_p);
    $('#hasil_s2').val(obj.hasil_s2);
    popData=obj;
    updatelink();
}

function resetlink(){
    sData=null;
    $('#tblKroscek tr.DTTT_selected').removeClass('DTTT_selected');
    // $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#rowItem [name],#rowLabPertama [name],#rowLabKroscek [name],#rowKualitas [name]').val('');
    $('#rowLabKroscek [name],#rowKualitas [name],#frmTransaksi button').prop('disabled',true);
    $('#tgl_terima,#tgl_kirim').next().prop('disabled',false);
    $('#btnLaboran').unbind().click(function(){return false;}).addClass('disabled');
    $('#btnUbah,#btnHapus').prop('disabled',true);
}

function updatelink(){
    // $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#rowLabPertama [name],#rowLabKroscek [name],#rowKualitas [name]').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',false);
    $.getJSON('<?php echo site_url('poli/'.'tb/transaksi_kroscek/detail_by_permohonan')?>/'+popData.permohonan_lab,null,function(obj){
        for(var key in obj) {
            $('#frmTransaksi [name="'+key+'"]').val(obj[key]);
        }
    }).complete(function(){
        if($('#tgl_pemeriksaan').val()==''){
            for(var key in popData) {
                $('#rowLabPertama [name="'+key+'"]').val(popData[key]);
            }
        }
    });
    $('#no_rm_tb').val(popData.no_rm_tb);
    $('#nama_anggota').val(popData.nama_anggota);
    $('#no_identitas_sedian').val(popData.no_identitas_sedian);
}
</script>