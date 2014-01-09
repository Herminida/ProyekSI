<div class="span9">
    <ul class="nav nav-tabs" id="tab-link">
        <li class="active"><a href="#" onclick="return false">Kartu Pengobatan Pasien</a></li>
    </ul>

        <div class="labellegend">
          <span class="label">Pasien</span>
        </div>
        <div class="well" id="rowPasien">
            <table>
                <tr>
                    <td width="100"><label for="nik">No. NIK</label></td>
                    <td colspan="4"><div class="input-append pull-left">
                            <input type="text" id="nik" name="nik" class="input-medium" readonly/>
                            <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.'popup/pasien')?>" rel="facebox"><i class="icon-search"></i></a>
                        </div>
                        <button type="button" onclick="alert('Pendaftaran pasien baru harap menuju loket')"><i class="icon-plus-sign"></i> Daftar Baru</button>
                    </td>
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

    <form id="frmTransaksi">
        <div class="well">
            <table>
                <tr>
                    <td width="200"><label for="unker">Puskesmas</label></td>
                    <td><select id="unker" name="unker" class="input-large">
                        <option value="">-- pilih --</option>
                        <?php foreach ($unit_kerja as $key => $value) {
                            echo '<option value="'.$value->id_unit_kerja.'">'.$value->nama_unit_kerja.'</option>';
                        }?>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="reg_upk">No Reg TB 03 UPK</label></td>
                    <td><input type="text" id="reg_upk" name="reg_upk" class="input-medium"/></td>
                </tr>
                <tr>
                    <td><label for="reg_kab">No Reg TB 03 Kab</label></td>
                    <td><input type="text" id="reg_kab" name="reg_kab" class="input-medium" /></td>
                </tr>
                <tr>
                    <td><label for="nama_pmo">Nama PMO</label></td>
                    <td><input type="text" id="nama_pmo" name="nama_pmo" class="input-medium"/></td>
                </tr>
                <tr>
                    <td><label for="status_pmo">Status PMO</label></td>
                    <td><select id="status_pmo" name="status_pmo" class="input-large">
                        <option value="">-- pilih --</option>
                        <option value="P">P (Petugas Kesehatan)</option>
                        <option value="K">K (Kader)</option>
                        <option value="TM">TM (Tokoh Masyarakat)</option>
                        <option value="F">F (Family/ Anggota Keluarga)</option>
                        <option value="L">L (Lain-lain)</option>
                        <option value="T">T (Tidak ada PMO)</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="alamat_pmo">Alamat PMO</label></td>
                    <td><textarea id="alamat_pmo" name="alamat_pmo" class="input-large" row="3"></textarea></td>
                </tr>
                <tr>
                    <td><label for="parut_bcg">Parut BCG</label></td>
                    <td><select id="parut_bcg" name="parut_bcg" class="span2">
                        <option value="">-- pilih --</option>
                        <option value="1">Jelas</option>
                        <option value="2">Tidak Ada</option>
                        <option value="3">Meragukan</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="riwayat_pengobatan">Riwayat Pengobatan Sebelumnya</label></td>
                    <td><select id="riwayat_pengobatan" name="riwayat" class="input-large">
                        <option value="">-- pilih --</option>
                        <option value="1">Belum Pernah/ Kurang dari 1 Bln</option>
                        <option value="2">Pernah Diobati Lebih dari 1 Bln</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="catatan">Catatan</label></td>
                    <td><textarea id="catatan" name="catatan" class="input-large" row="3"></textarea></td>
                </tr>
            </table>
        </div>

        <div class="labellegend">
          <span class="label">Dirujuk Oleh</span>
        </div>
        <div class="well">
            <table>
                <tr>
                    <td width="120"><label for="perujuk">Perujuk</label></td>
                    <td><select id="perujuk" name="perujuk" class="input-medium">
                        <option value="">-- pilih --</option>
                        <?php foreach ($master as $key => $value) {
                            if($value->type=='Perujuk') echo '<option>'.$value->nama.'</option>';
                        }?>
                    </select></td>
                </tr>
            </table>
        </div>

        <div class="labellegend">
          <span class="label">Klasifikasi Pasien</span>
        </div>
        <div class="well">
            <table>
                <tr>
                    <td width="120"><label for="klasifikasi">Klasifikasi Pasien</label></td>
                    <td><select id="klasifikasi" name="klasifikasi" class="input-medium">
                        <option value="">-- pilih --</option>
                        <?php foreach ($master as $key => $value) {
                            if($value->type=='Klasifikasi Pasien') echo '<option>'.$value->nama.'</option>';
                        }?>
                    </select></td>
                </tr>
            </table>
        </div>

        <div class="labellegend">
          <span class="label">Tipe Pasien</span>
        </div>
        <div class="well">
            <table>
                <tr>
                    <td width="120"><label for="tipe_pasien">Tipe Pasien</label></td>
                    <td><select id="tipe_pasien" name="tipe_pasien" class="input-medium">
                        <option value="">-- pilih --</option>
                        <?php foreach ($master as $key => $value) {
                            if($value->type=='Tipe Pasien') echo '<option>'.$value->nama.'</option>';
                        }?>
                    </select></td>
                </tr>
            </table>
        </div>

        <div class="labellegend">
          <span class="label">Diisi Khusus Pasien Pindahan</span>
        </div>
        <div class="well">
            <table>
                <tr>
                    <td><label for="pindahan_reg_kab">No Reg TB Kab/ Kota Asal Pasien</label>
                        <input type="text" id="pindahan_reg_kab" name="pindahan_reg_kab" class="input-large"/>
                    </td>
                    <td width="50"></td>
                    <td><label for="pindahan_tgl_berobat">Tgl Mulai Berobat Tempat Asal</label>
                        <div class="bfh-datepicker" data-format="d-m-y" data-date="">
                            <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                               <input type="text" name="pindahan_tgl_berobat" id="pindahan_tgl_berobat" class="input-small" readonly>
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
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="labellegend">
          <span class="label">Pemeriksaan Kontak Serumah</span>
        </div>
        <div class="well">
            <button type="button" id="kontakTambah" class="pull-right"><i class="icon-plus-sign"></i> Tambah</button>
            <table id="tblKontak" class="table">
                <tbody></tbody>
            </table>
        </div>

        <div class="well">
            <table>
                <tr>
                    <td width="150"><label for="tahap_intensif">Tahap Intensif</label></td>
                    <td><select id="tahap_intensif" name="tahap_intensif" class="input-medium">
                        <option value="">-- pilih --</option>
                        <option>Kategori 1</option>
                        <option>Kategori 2</option>
                        <option>Kategori Anak</option>
                        <option>Sisipan</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="jenis_obat">Jenis Obat</label></td>
                    <td><select id="jenis_obat" name="jenis_obat" class="input-medium">
                        <option value="">-- pilih --</option>
                        <option>Kombipak</option>
                        <option>KDT (FDC)</option>
                    </select></td>
                </tr>
            </table>
        </div>

        <div class="labellegend">
          <span class="label">Dosis</span>
        </div>
        <div class="well">
            <button type="button" id="dosisTambah" class="pull-right"><i class="icon-plus-sign"></i> Tambah</button>
            <table id="tblDosis" class="table">
                <tbody></tbody>
            </table>
        </div>

        <div class="labellegend">
          <span class="label">Jadwal Pengobatan</span>
        </div>
        <div class="well"><div class="row">
            <div class="span5">
            <button type="button" id="jadwalTambah" class="pull-right"><i class="icon-plus-sign"></i> Tambah</button>
            <table id="tblJadwal" class="table">
                <tbody></tbody>
            </table>
            </div>
        </div></div>

        <div class="well">
            <table>
                <tr>
                    <td width="150"><label>Hasil Akhir Pengobatan</label></td>
                    <td><label class="radio inherit"><input type="radio" name="hasil_akhir" value="Sembuh"/>Sembuh</label></td>
                    <td>&nbsp;</td>
                    <td><label class="radio inherit"><input type="radio" name="hasil_akhir" value="Pengobatan Lengkap"/>Pengobatan Lengkap</label></td>
                    <td>&nbsp;</td>
                    <td><label class="radio inherit"><input type="radio" name="hasil_akhir" value="Putus Berobat (Default)"/>Putus Berobat (Default)</label></td>
                    <td>&nbsp;</td>
                    <td><label class="radio inherit"><input type="radio" name="hasil_akhir" value="Gagal"/>Gagal</label></td>
                    <td>&nbsp;</td>
                    <td><label class="radio inherit"><input type="radio" name="hasil_akhir" value="Pindah"/>Pindah</label></td>
                    <td>&nbsp;</td>
                    <td><label class="radio inherit"><input type="radio" name="hasil_akhir" value="Meninggal"/>Meninggal</label></td>
                </tr>
                <tr>
                    <td><label for="hasil_ket">Keterangan</label></td>
                    <td colspan="11"><textarea id="hasil_ket" name="hasil_ket" class="input-xlarge" row="3"></textarea></td>
                </tr>
            </table>
        </div>

        <input type="hidden" id="id" name="id"/>
        <input type="hidden" id="no_rm" name="no_rm"/>
        <button id="btnSimpan" class="btn-primary"><i class="icon-ok icon-white"></i> Simpan</button>
    </form>

    <hr/>
    <button type="button" id="btnTambah"><i class="icon-plus-sign"></i> Tambah</button>
    <button type="button" id="btnUbah" disabled><i class="icon-edit"></i> Ubah</button>
    <button type="button" id="btnHapus" disabled><i class="icon-remove"></i> Hapus</button>

    <table id="tblKpp">
        <thead>
            <th>RM</th>
            <th>Nama Pasien</th>
            <th>Perujuk</th>
            <th>Tipe Pasien</th>
            <th>No Reg TB 03 UPK</th>
            <th>No Reg TB 03 Kab</th>
            <th>Tgl Reg</th>
            <th>Unit Kerja</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(function(){
    $('a[rel*=facebox]').facebox();
    oTable=$('#tblKpp').dataTable({
        "sRowSelect": "single",
        "sDom": "frtip",
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "POST",
        "sAjaxSource": "<?php echo site_url('poli/'.'tb/transaksi_kpp/data')?>",
        "aoColumns": [
            { "mData": "no_rm" },
            { "mData": "nama_anggota" },
            { "mData": "perujuk" },
            { "mData": "tipe_pasien" },
            { "mData": "reg_upk" },
            { "mData": "reg_kab" },
            { "mData": "tgl" },
            { "mData": "nama_unit_kerja" },
        ]
    });

    $(document).on('click','#tblKpp tr',function(){
        sData = oTable.fnGetData(this);
        $('#tblKpp tr.DTTT_selected').removeClass('DTTT_selected');
        $(this).addClass('DTTT_selected');
        $('#btnUbah,#btnHapus').prop('disabled',false);
    });

    $('#kontakTambah').click(function(){
        tambahKontak();
    })//.click();
    $('#dosisTambah').click(function(){
        tambahDosis();
    })//.click();
    $('#jadwalTambah').click(function(){
        tambahJadwal();
    })//.click();
    $(document).on('click','[rel="hapusKontak"]',function(){
        var delit=$(this).attr('id').split('_')[1];
        $('#kontakRow_'+delit).remove();
    })
    $(document).on('click','[rel="hapusDosis"]',function(){
        var delit=$(this).attr('id').split('_')[1];
        $('#dosisRow_'+delit).remove();
    })
    $(document).on('click','[rel="hapusJadwal"]',function(){
        var delit=$(this).attr('id').split('_')[1];
        $('#jadwalRow_'+delit).remove();
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
            $.getJSON("<?php echo site_url('poli/'.'tb/transaksi_kpp/hapus')?>/"+sData.id,null,function(obj){
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
            if($(this).attr('type')=='radio'){
                data[$(this).attr('name')]=$('#frmTransaksi [name="'+$(this).attr('name')+'"]:checked').val();
            }else{
                data[$(this).attr('name')]=$(this).val();
            }
        });
        $.ajax({
            url: '<?php echo site_url('poli/'.'tb/transaksi_kpp/simpan')?>',
            data: data, method:'post',dataType: 'json',
            success: function(obj){
                if(obj.success){
                    alert('data Kartu Pengobatan Pasien sudah tersimpan');
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
function tambahKontak(obj){
    kid++;
    if((typeof obj)==='undefined' || (typeof obj.nama)==='undefined'){
        obj={'nama':'','kelamin':'','tgl_lahir':'','tgl_periksa':'','hasil':''};
    }
    var sexl=(obj.kelamin=='l')?'checked':'';
    var sexp=(obj.kelamin=='p')?'checked':'';
    var tags = '<tr id="kontakRow_'+kid+'">';
        tags+= '<td><label for="kontakNama_'+kid+'">Nama</label>';
        tags+= '  <input type="text" id="kontakNama_'+kid+'" name="kontak_nama['+kid+']" value="'+obj.nama+'" class="input-medium"/>';
        tags+= '</td><td><div>Jenis Kelamin</div>';
        tags+= '  <label class="radio inline"><input type="radio" name="kontak_kelamin['+kid+']" value="l" '+sexl+'> L</label>';
        tags+= '  <label class="radio inline"><input type="radio" name="kontak_kelamin['+kid+']" value="p" '+sexp+'> P</label>';
        tags+= '</td><td><label for="kontakTglLahir_'+kid+'">Tgl Lahir</label>';
        tags+= '  <div id="kontakPickTglLahir_'+kid+'" class="bfh-datepicker" data-format="d-m-y" data-date="">';
        tags+= '  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">';
        tags+= '    <input type="text" name="kontak_tgl_lahir['+kid+']" id="kontakTglLahir_'+kid+'" value="'+obj.tgl_lahir+'" class="input-small" readonly>';
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
        tags+= '</td><td><label for="kontakTglPeriksa_'+kid+'">Tgl Periksa</label>';
        tags+= '  <div id="kontakPickTglPeriksa_'+kid+'" class="bfh-datepicker" data-format="d-m-y" data-date="">';
        tags+= '  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">';
        tags+= '    <input type="text" name="kontak_tgl_periksa['+kid+']" id="kontakTglPeriksa_'+kid+'" value="'+obj.tgl_periksa+'" class="input-small" readonly>';
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
        tags+= '</td><td><label for="kontakHasil_'+kid+'">Hasil</label>';
        tags+= '  <input type="text" id="kontakHasil_'+kid+'" name="kontak_hasil['+kid+']" value="'+obj.hasil+'" class="input-medium"/>';
        tags+= '</td><td><button type="button" id="kontakHapus_'+kid+'" rel="hapusKontak"><i class="icon-remove"></i><br>Hapus</button></td>';
        tags+= '</tr>';
    $('#tblKontak > tbody:first').append(tags);
    $('#kontakPickTglLahir_'+kid).bfhdatepicker($('#kontakPickTglLahir_'+kid).data());
    $('#kontakPickTglPeriksa_'+kid).bfhdatepicker($('#kontakPickTglPeriksa_'+kid).data());
}
function clearKontak(){
    $('#tblKontak > tbody:first').children().remove();
}

did=0;
function tambahDosis(obj){
    did++;
    if((typeof obj)==='undefined' || (typeof obj.kdt)==='undefined'){
        obj={'kdt':'','streptomichin':'','katriokmosasol':'','arv':'','lainnya':''};
    }
    var tags = '<tr id="dosisRow_'+did+'">';
        tags+= '<td><label for="dosisKdt_'+did+'">4KDT(FDC) Tblt/hr</label>';
        tags+= '  <input type="text" id="dosisKdt_'+did+'" name="dosis_kdt['+did+']" value="'+obj.kdt+'" class="input-medium"/>';
        tags+= '</td><td><label for="dosisStreptomichin_'+did+'">Streptomichin mg/hr</label>';
        tags+= '  <input type="text" id="dosisStreptomichin_'+did+'" name="dosis_streptomichin['+did+']" value="'+obj.streptomichin+'" class="input-small"/>';
        tags+= '</td><td><label for="dosisKatriokmosasol_'+did+'">Katriokmosasol</label>';
        tags+= '  <input type="text" id="dosisKatriokmosasol_'+did+'" name="dosis_katriokmosasol['+did+']" value="'+obj.katriokmosasol+'" class="input-small"/>';
        tags+= '</td><td><label for="dosisArv_'+did+'">ARV</label>';
        tags+= '  <input type="text" id="dosisArv_'+did+'" name="dosis_arv['+did+']" value="'+obj.arv+'" class="input-small"/>';
        tags+= '</td><td><label for="dosisLainnya_'+did+'">Lainnya</label>';
        tags+= '  <input type="text" id="dosisLainnya_'+did+'" name="dosis_lainnya['+did+']" value="'+obj.lainnya+'" class="input-medium"/>';
        tags+= '</td><td><button type="button" id="dosisHapus_'+did+'" rel="hapusDosis"><i class="icon-remove"></i><br>Hapus</button></td>';
        tags+= '</tr>';
    $('#tblDosis > tbody:first').append(tags);
}
function clearDosis(){
    $('#tblDosis > tbody:first').children().remove();
}

jid=0;
function tambahJadwal(obj){
    jid++;
    if((typeof obj)==='undefined' || (typeof obj.tgl)==='undefined'){
        obj={'tgl':''};
    }
    var tags = '<tr id="jadwalRow_'+jid+'">';
        tags+= '<td width="100"><label for="jadwalTgl_'+jid+'">Tanggal</label></td>';
        tags+= '<td><div id="jadwalPickTgl_'+jid+'" class="bfh-datepicker" data-format="d-m-y" data-date="">';
        tags+= '  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">';
        tags+= '    <input type="text" name="jadwal_tgl['+jid+']" id="jadwalTgl_'+jid+'" value="'+obj.tgl+'" class="input-small" readonly>';
        tags+= '    <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>';
        tags+= '  </div><div class="bfh-datepicker-calendar">';
        tags+= '  <table class="calendar table table-bordered">';
        tags+= '    <thead><tr class="months-header">';
        tags+= '      <th class="month" colspan="4">';
        tags+= '        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>';
        tags+= '        <span></span><a class="next" href="#"><i class="icon-chevron-right"></i></a>';
        tags+= '      </th><th class="year" colspan="3">';
        tags+= '        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>';
        tags+= '        <span></span><a class="next" href="#"><i class="icon-chevron-right"></i></a>';
        tags+= '      </th>';
        tags+= '    </tr><tr class="days-header"></tr>';
        tags+= '    </thead>';
        tags+= '    <tbody></tbody>';
        tags+= '  </table></div>';
        tags+= '</div></td>';
        tags+= '<td width="80"><button type="button" id="jadwalHapus_'+jid+'" rel="hapusJadwal"><i class="icon-remove"></i>Hapus</button></td>';
        tags+= '</tr>';
    $('#tblJadwal > tbody:first').append(tags);
    $('#jadwalPickTgl_'+jid).bfhdatepicker($('#jadwalPickTgl_'+jid).data());
}
function clearJadwal(){
    $('#tblJadwal > tbody:first').children().remove();
}

function resetlink(){
    sData=null;
    $('#tblKpp tr.DTTT_selected').removeClass('DTTT_selected');
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',true).prop('checked',false);
    $('#btnUbah,#btnHapus').prop('disabled',true);
    $('#rowPasien [name]').val('');
    clearKontak();
    clearDosis();
    clearJadwal();
}

function updatelink(){
    $('#nik').val(popData.nik)
    $('#nama_anggota').val(popData.nama_anggota)
    $('#alamat_pasien').val(popData.alamat)
    $('#jenis_kelamin').val(popData.jenis_kelamin)
    $('#umur').val(popData.umur)
    $('#frmTransaksi [name]:not(:radio,:checkbox)').val('');
    $('#frmTransaksi [name],#frmTransaksi button').prop('disabled',false).prop('checked',false);
    var itungk=0;
    var itungd=0;
    var itungj=0;
    $.getJSON('<?php echo site_url('poli/'.'tb/transaksi_kpp/detail_by_rm')?>/'+popData.no_rm,null,function(obj){
        for(var key in obj) {
            if(key!='hasil_akhir'){
                $('#frmTransaksi [name="'+key+'"]').val(obj[key]);
            }else{
                $('#frmTransaksi [name="'+key+'"][value="'+obj[key]+'"]').prop('checked',true);
            }
        }
        clearKontak();
        for(var key in obj.kontak) {
            tambahKontak(obj.kontak[key]);
            itungk++;
        }
        clearDosis();
        for(var key in obj.dosis) {
            tambahDosis(obj.dosis[key]);
            itungd++;
        }
        clearJadwal();
        for(var key in obj.jadwal) {
            tambahJadwal(obj.jadwal[key]);
            itungj++;
        }
    }).complete(function(){
        if(itungk==0){tambahKontak();}
        if(itungd==0){tambahDosis();}
        if(itungj==0){tambahJadwal();}
    });
    $('#no_rm').val(popData.no_rm)
}
</script>