<div class="span9"> <!-- content span -->
  <input type="hidden" id="id_poli" name="id_poli" value='8'>
  <ul class="nav nav-tabs" id="tab-link">
    <li class="active"><a href="#" onclick="return false">KB</a></li>
    <?php $this->load->view('poliklinik/v_row_navtab');?>

    <form name="frmHell" id="frmHell" method="post">
      <?php $this->load->view('poliklinik/v_row_antrian');?>
    </form>

      <?php $this->load->view('poliklinik/v_row_riwayat_perawatan');?>
      <div><br/></div>

      <?php $this->load->view('poliklinik/v_row_riwayat_kesehatan');?>

      <div><br/></div>


  <div class="row"> <!--label fisik-->
    <div class="labelhr">
      <span class="label label-info" id="labelKBbaru">KB BARU</span>
    </div>
    <div>
      <hr>
    </div>
  </div>

  <form name="frmKBbaru" id="frmKBbaru" method="post">
    <input type="hidden" name="id">
    <div class="well">
      <table>
        <tr>
          <td width="40"></td>
          <td width="50"></td>
          <td width="60"></td>
          <td width="115"></td>
          <td width=""></td>
          <td width="15"></td>
          <td width=""></td>
          <td width=""></td>
        </tr>
        <tr>
          <td colspan="5"><b>Tempat Pelayanan KB</b></td>
          <td>&nbsp;</td>
          <td align="right"><label for="no_seri">No.Seri Kartu</label></td>
          <td><input type="text" id="no_seri" name="no_seri"></td>
        </tr>
        <tr><td>&nbsp;</td>
          <td colspan="2"><label for="nama">Nama</label></td>
          <td colspan="2"><input type="text" id="nama" name="nama" readonly></td>
        </tr>
        <tr><td>&nbsp;</td>
          <td colspan="2"><label for="kode">Kode</label></td>
          <td colspan="2"><input type="text" id="kode" name="kode" readonly></td>
        </tr>
        <tr>
          <td colspan="3"><label for="nama_peserta">Nama Peserta KB</label></td>
          <td colspan="2"><input type="text" id="nama_peserta" name="nama_peserta" readonly></td>
          <td>&nbsp;</td>
          <td><label for="umur_peserta">Umur Peserta KB</label></td>
          <td><input type="text" id="umur_peserta" name="umur_peserta" readonly></td>
        </tr>
        <tr>
          <td colspan="3"><label for="nama_pasangan">Nama Suami/Istri</label></td>
          <td colspan="2"><input type="text" id="nama_pasangan" name="nama_pasangan" readonly></td>
          <td>&nbsp;</td>
          <td><label>Pendidikan Suami & Istri</label></td>
          <td><input type="text" id="pendidikan_suami" name="pendidikan_suami" class="input-small" readonly>
            : <input type="text" id="pendidikan_istri" name="pendidikan_istri" class="input-small" readonly>
          </td>
        </tr>
        <tr>
          <td colspan="3"><label for="alamat">Alamat</label></td>
          <td colspan="2"><input type="text" id="alamat" name="alamat" readonly></td>
          <td>&nbsp;</td>
          <td><label>Pekerjaan Suami & Istri</label></td>
          <td><input type="text" id="pekerjaan_suami" name="pekerjaan_suami" class="input-small" readonly>
            : <input type="text" id="pekerjaan_istri" name="pekerjaan_istri" class="input-small" readonly>
          </td>
        </tr>
        <tr><td colspan="8"><hr/></td></tr>
        <tr>
          <td colspan="3"><label>Jumlah Anak Hidup</label></td>
          <td colspan="2">L=<input type="text" id="anak_hidup_l" name="anak_hidup_l" class="input-mini">
            P=<input type="text" id="anak_hidup_p" name="anak_hidup_p" class="input-mini">
          </td>
          <td>&nbsp;</td>
          <td><label>Umur Anak Terkecil</label></td>
          <td><input type="text" id="umur_anak_terkecil" name="umur_anak_terkecil"></td>
        </tr>
        <tr>
          <td colspan="3"><label for="status_peserta">Status Peserta KB</label></td>
          <td colspan="2">
            <select id="status_peserta" name="status_peserta" class="input-medium">
              <option value="1">Baru Pertama Kali</option>
              <option value="2">Sesudah Bersalin/ Keguguran sebelumnya</option>
              <option value="3">Pindah Pelayanan, ganti cara</option>
              <option value="4">Pindah tempat, cara sama</option>
              <option value="5">Tempat pelayanan tetap, ganti cara</option>
            </select>
          </td>
          <td>&nbsp;</td>
          <td><label for="kb_terakhir">Cara KB Terakhir</label></td>
          <td>
            <select id="kb_terakhir" name="kb_terakhir" class="input-small">
              <option value="1">IUD</option>
              <option value="2">Kondom</option>
              <option value="3">Implant</option>
              <option value="4">Suntikan</option>
              <option value="5">Pil</option>
            </select>
          </td>
        </tr>
        <tr><td colspan="8"><hr/></td></tr>
        <tr>
          <td colspan="8"><strong>Sekarang untuk menentukan alat kontrasepsi yang digunakan calon peserta KB</strong></td>
        </tr>
        <tr>
          <td align="right"><label>A.</label></td>
          <td colspan="2"><label for="keadaan_umum">1.Keadaan Umum</label></td>
          <td colspan="2">
            <select id="keadaan_umum" name="keadaan_umum" class="input-small">
              <option value="1">Baik</option>
              <option value="2">Sedang</option>
              <option value="3">Kurang</option>
            </select>
          </td>
          <td>&nbsp;</td>
          <td><label for="tekanan_darah">2.Tekanan Darah</label></td>
          <td><input type="text" id="tekanan_darah" name="tekanan_darah" class="input-mini">mmhg</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><label for="hamil">3.Hamil/Diduga</label></td>
          <td colspan="2">
            <select id="hamil" name="hamil" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
          <td>&nbsp;</td>
          <td><label for="haid_terakhir">4.Haid Terakhir</label></td>
          <td>
            <div class="bfh-datepicker" data-format="d-m-y" data-date="">
              <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                 <input type="text" class="input-small" name="haid_terakhir" id="haid_terakhir" readonly>
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
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><label for="berat_badan">5.Berat Badan</label></td>
          <td colspan="2"><input type="text" id="berat_badan" name="berat_badan" class="input-mini">Kg</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="4"><b>6.Keadaan Peserta KB</b></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><label for="sakit_kuning">a.Sakit Kuning</label></td>
          <td>
            <select id="sakit_kuning" name="sakit_kuning" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><label for="pendarahan_vagina">b.Pendarahan pervaginahan yg tdk diketahui sebabnya</label></td>
          <td>
            <select id="pendarahan_vagina" name="pendarahan_vagina" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td><label>c.Tumor</label></td>
          <td><label for="tumor_payudara">1.Payudara</label></td>
          <td>
            <select id="tumor_payudara" name="tumor_payudara" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td><label for="tumor_rahim">2.Rahim</label></td>
          <td>
            <select id="tumor_rahim" name="tumor_rahim" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td><label for="tumor_indung_telur">3.Indung Telur</label></td>
          <td>
            <select id="tumor_indung_telur" name="tumor_indung_telur" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td><label for="tumor_tertis">4.Tertis</label></td>
          <td>
            <select id="tumor_tertis" name="tumor_tertis" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td><label for="tumor_orchifis">5.Radang Orchifis</label></td>
          <td>
            <select id="tumor_orchifis" name="tumor_orchifis" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><label for="hiv">d.IMS/HIV/AIDS</label></td>
          <td>
            <select id="hiv" name="hiv" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="6"><b>7. Sebelum dilakukan Pemasangan IUD atau MOW dilakukan pemeriksaan dalam</b></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><label for="posisi_rahim">a. Posisi Rahim</label></td>
          <td>
            <select id="posisi_rahim" name="posisi_rahim" class="input-small">
              <option value="1">Retrofleksi</option>
              <option value="2">Antefleksi</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><label for="tanda_radang">b. Tanda2 Radang</label></td>
          <td>
            <select id="tanda_radang" name="tanda_radang" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><label for="tumor_ginekologi">c. Tumor/keganasan ginekologi</label></td>
          <td>
            <select id="tumor_ginekologi" name="tumor_ginekologi" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="6"><b>8. Pemeriksaan Tambahan (khusus untuk calon MOP & MOW)</b></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><label for="tanda_diabetes">a. Tanda2 Diabetes</label></td>
          <td>
            <select id="tanda_diabetes" name="tanda_diabetes" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="2"><label for="kelainan_darah">b. Kelainan Pembekuan Darah</label></td>
          <td>
            <select id="kelainan_darah" name="kelainan_darah" class="input-mini">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
        </tr>
        <tr>
          <td align="right"><label>B.</label></td>
          <td colspan="3"><label for="kontrasepsi_boleh">1. Alat kontrasepsi yang boleh digunakan</label></td>
          <td>
            <select id="kontrasepsi_boleh" name="kontrasepsi_boleh" class="input-small">
              <option value="1">IUD</option>
              <option value="2">MOW</option>
              <option value="3">MOP</option>
              <option value="4">Kondom</option>
              <option value="5">Implant</option>
              <option value="6">Suntikan</option>
              <option value="7">Pil</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan=3""><label for="konseling">2. Konseling dengan menggunakan ABPK</label></td>
          <td>
            <select id="konseling" name="konseling" class="input-mini">
              <option value="1">Ya</option>
              <option value="0">Tidak</option>
            </select>
          </td>
        </tr>
        <tr><td colspan="8"><hr/></td></tr>
        <tr>
          <td colspan="4"><label for="kontrasepsi_diberikan">Alat kontrasepi yang diberikan</label></td>
          <td>
            <select id="kontrasepsi_diberikan" name="kontrasepsi_diberikan" class="input-small">
              <option value="1">IUD</option>
              <option value="2">MOW</option>
              <option value="3">MOP</option>
              <option value="4">Kondom</option>
              <option value="5">Implant</option>
              <option value="6">Suntikan</option>
              <option value="7">Pil</option>
              <option value="8">Obat Vaginal</option>
            </select>
          </td>
          <td>&nbsp;</td>
          <td><label for="tgl_dilayani">Tanggal Dilayani</label></td>
          <td>
            <div class="bfh-datepicker" data-format="d-m-y" data-date="">
              <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                 <input type="text" class="input-small" name="tgl_dilayani" id="tgl_dilayani" readonly>
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
        <tr>
          <td colspan="3"><label for="tgl_dipesan">Tanggal dipesan kembali</label></td>
          <td colspan="2">
            <div class="bfh-datepicker" data-format="d-m-y" data-date="">
              <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                 <input type="text" class="input-small" name="tgl_dipesan" id="tgl_dipesan" readonly>
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
          <td>&nbsp;</td>
          <td><label for="tgl_dilepas">Tgl Dilepas<br>(khusus Implant & IUD)</label></td>
          <td>
            <div class="bfh-datepicker" data-format="d-m-y" data-date="">
              <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                 <input type="text" class="input-small" name="tgl_dilepas" id="tgl_dilepas" readonly>
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
    <button class="btn btn-small btn-primary" name="simpan">Simpan</button>
    <button type="button" class="btn btn-small" name="reset">Reset</button>
  </form>


  <div class="row"> <!--label fisik-->
    <div class="labelhr">
      <span class="label label-info" id="labelKBulang">KUNJUNGAN ULANG</span>
    </div>
    <div>
      <hr>
    </div>
  </div>

  <form name="frmKBulang" id="frmKBulang" method="post">
    <input type="hidden" name="id">
    <div class="well">
      <table>
        <tr>
          <td width="40"></td>
          <td width="50"></td>
          <td width="60"></td>
          <td width="115"></td>
          <td width=""></td>
          <td width="15"></td>
          <td width=""></td>
          <td width=""></td>
        </tr>
        <tr>
          <td colspan="5"><b>Tempat Pelayanan KB</b></td>
          <td>&nbsp;</td>
          <td align="right"><label for="no_seri">No.Seri Kartu</label></td>
          <td><input type="text" id="no_seri" name="no_seri"></td>
        </tr>
        <tr><td>&nbsp;</td>
          <td colspan="2"><label for="nama">Nama</label></td>
          <td colspan="2"><input type="text" id="nama" name="nama" readonly></td>
        </tr>
        <tr><td>&nbsp;</td>
          <td colspan="2"><label for="kode">Kode</label></td>
          <td colspan="2"><input type="text" id="kode" name="kode" readonly></td>
        </tr>
        <tr>
          <td colspan="3"><label for="nama_peserta">Nama Peserta KB</label></td>
          <td colspan="2"><input type="text" id="nama_peserta" name="nama_peserta" readonly></td>
          <td>&nbsp;</td>
          <td><label for="umur_peserta">Umur Peserta KB</label></td>
          <td><input type="text" id="umur_peserta" name="umur_peserta" readonly></td>
        </tr>
        <tr>
          <td colspan="3"><label for="nama_pasangan">Nama Suami/Istri</label></td>
          <td colspan="2"><input type="text" id="nama_pasangan" name="nama_pasangan" readonly></td>
          <td>&nbsp;</td>
          <td><label>Pendidikan Suami & Istri</label></td>
          <td><input type="text" id="pendidikan_suami" name="pendidikan_suami" class="input-small" readonly>
            : <input type="text" id="pendidikan_istri" name="pendidikan_istri" class="input-small" readonly>
          </td>
        </tr>
        <tr>
          <td colspan="3"><label for="alamat">Alamat</label></td>
          <td colspan="2"><input type="text" id="alamat" name="alamat" readonly></td>
          <td>&nbsp;</td>
          <td><label>Pekerjaan Suami & Istri</label></td>
          <td><input type="text" id="pekerjaan_suami" name="pekerjaan_suami" class="input-small" readonly>
            : <input type="text" id="pekerjaan_istri" name="pekerjaan_istri" class="input-small" readonly>
          </td>
        </tr>
        <tr><td colspan="8"><hr/></td></tr>
        <tr>
          <td colspan="3"><label>Jumlah Anak Hidup</label></td>
          <td colspan="2">L=<input type="text" id="anak_hidup_l" name="anak_hidup_l" class="input-mini">
            P=<input type="text" id="anak_hidup_p" name="anak_hidup_p" class="input-mini">
          </td>
          <td>&nbsp;</td>
          <td><label>Umur Anak Terkecil</label></td>
          <td><input type="text" id="umur_anak_terkecil" name="umur_anak_terkecil"></td>
        </tr>
        <tr>
          <td colspan="3"><label for="status_peserta">Status Peserta KB</label></td>
          <td colspan="2">
            <select id="status_peserta" name="status_peserta" class="input-medium">
              <option value="1">Baru Pertama Kali</option>
              <option value="2">Sesudah Bersalin/ Keguguran sebelumnya</option>
              <option value="3">Pindah Pelayanan, ganti cara</option>
              <option value="4">Pindah tempat, cara sama</option>
              <option value="5">Tempat pelayanan tetap, ganti cara</option>
            </select>
          </td>
          <td>&nbsp;</td>
          <td><label for="kb_terakhir">Cara KB Terakhir</label></td>
          <td>
            <select id="kb_terakhir" name="kb_terakhir" class="input-small">
              <option value="1">IUD</option>
              <option value="2">Kondom</option>
              <option value="3">Implant</option>
              <option value="4">Suntikan</option>
              <option value="5">Pil</option>
            </select>
          </td>
        </tr>
        <tr><td colspan="8"><hr/></td></tr>
        <tr>
          <td colspan="3"><label for="tgl_datang">Tanggal Datang</label></td>
          <td colspan="2">
            <div class="bfh-datepicker" data-format="d-m-y" data-date="">
              <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                 <input type="text" class="input-small" name="tgl_datang" id="tgl_datang" readonly>
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
          <td>&nbsp;</td>
          <td><label for="haid_terakhir">Haid Terakhir</label></td>
          <td>
            <div class="bfh-datepicker" data-format="d-m-y" data-date="">
              <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                 <input type="text" class="input-small" name="haid_terakhir" id="haid_terakhir" readonly>
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
        <tr>
          <td colspan="3"><label for="bb">Berat Badan</label></td>
          <td colspan="2"><input type="text" id="bb" name="bb" class="input-mini">Kg</td>
          <td>&nbsp;</td>
          <td><label for="pp_test">PP Test</label></td>
          <td><input type="text" id="pp_test" name="pp_test"></td>
        </tr>
        <tr>
          <td colspan="3"><label for="tekanan_darah">Tekanan Darah</label></td>
          <td colspan="2"><input type="text" id="tekanan_darah" name="tekanan_darah" class="input-mini">mmhg</td>
          <td>&nbsp;</td>
          <td><label for="hasil">Hasil</label></td>
          <td>
            <select id="hasil" name="hasil" class="input-small">
              <option value="1">Positif</option>
              <option value="0" selected>Negatif</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="4"><label for="efek_samping">Efek samping Akibat Penggunaan Kontrasepsi</label></td>
          <td>
            <select id="efek_samping" name="efek_samping" class="input-mini">
              <option value="1">Ada</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
          <td>&nbsp;</td>
          <td colspan="2"><label for="efek_samping_ket">jk ada <input type="text" id="efek_samping_ket" name="efek_samping_ket" class="input-xlarge"></label></td>
        </tr>
        <tr>
          <td colspan="4"><label for="efek_komplikasi">Efek Komplikasi Akibat Penggunaan Kontrasepsi</label></td>
          <td>
            <select id="efek_komplikasi" name="efek_komplikasi" class="input-mini">
              <option value="1">Ada</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
          <td>&nbsp;</td>
          <td colspan="2"><label for="efek_komplikasi_ket">jk ada <input type="text" id="efek_komplikasi_ket" name="efek_komplikasi_ket" class="input-xlarge"></label></td>
        </tr>
        <tr>
          <td colspan="4"><label for="tindakan">Pemeriksaan Tindakan</label></td>
          <td>
            <select id="tindakan" name="tindakan" class="input-mini">
              <option value="1">Ada</option>
              <option value="0" selected>Tidak</option>
            </select>
          </td>
          <td>&nbsp;</td>
          <td colspan="2"><label for="tindakan_ket">jk ada <input type="text" id="tindakan_ket" name="tindakan_ket" class="input-xlarge"></label></td>
        </tr>
        <tr>
          <td colspan="3"><label for="tgl_kembali">Tanggal Kembali</label></td>
          <td>
            <div class="bfh-datepicker" data-format="d-m-y" data-date="">
              <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                 <input type="text" class="input-small" name="tgl_kembali" id="tgl_kembali" readonly>
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
    <button class="btn btn-small btn-primary" name="simpan">Simpan</button>
    <button type="button" class="btn btn-small" name="reset">Reset</button>
  </form>
  
</div><!--/span9-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript">
   function getSisaAntrian(){
      $.ajax({
            url: '<?php echo site_url('poli/polikb/ajaxsisaantrian')?>',
           // data: data,
            method:'post',
            dataType: 'json',
            success: function(obj){
              if(obj.antrian){
                if (obj.antrian != '0' || obj.antrian!=0){
                $('#counter_antrian').text(obj.antrian);
                }else
                {
                  $('#counter_antrian').text("");
                }
              }
            },
          }); 
    }
$(function(){
  jQuery(document).ready(function(){
      getSisaAntrian();
      setInterval("getSisaAntrian()",60000);
        jQuery('a[rel*=facebox]').facebox();
      });
      $('#labelKBbaru').click(function(){$('#frmKBbaru').slideToggle()})
      $('#labelKBulang').click(function(){$('#frmKBulang').slideToggle()})
      $('#frmKBbaru button[name="reset"]').click(function(){
        updateFrmKBbaru();
        return false;
      })
      $('#frmKBulang button[name="reset"]').click(function(){
        updateFrmKBulang();
        return false;
      })

      resetlink();

      $('#frmKBbaru').submit(function(){
        data={};
        $('#frmKBbaru input,#frmKBbaru select').each(function(){
          data[$(this).attr('name')]=$(this).val();
        });
        data['validasi_reg']=sData.validasi_reg;
        data['no_rm']=sData.no_rm;
        data['register']=sData.idpemeriksaan;
        // console.log(data);
        $.ajax({
          url: '<?php echo site_url('poli/'.'polikb/simpan')?>',
          data: data,
          method:'post',
          dataType: 'json',
          success: function(obj){
            // console.log(obj);
            if(obj.success){
              alert('data sudah tersimpan');
              updateFrmKBbaru();
            }else if(obj.error!=''){
              alert(obj.error);
            }
          },
        });
        return false;
      });

      $('#frmKBulang').submit(function(){
        data={};
        $('#frmKBulang input,#frmKBulang select').each(function(){
          data[$(this).attr('name')]=$(this).val();
        });
        data['validasi_reg']=sData.validasi_reg;
        data['no_rm']=sData.no_rm;
        data['register']=sData.idpemeriksaan;
        // console.log(data);
        $.ajax({
          url: '<?php echo site_url('poli/'.'polikb/simpanulang')?>',
          data: data,
          method:'post',
          dataType: 'json',
          success: function(obj){
            // console.log(obj);
            if(obj.success){
              alert('data sudah tersimpan');
              updateFrmKBulang();
            }else if(obj.error!=''){
              alert(obj.error);
            }
          },
        });
        return false;
      });

    });

    function updateFrmKBbaru(){
      $('#frmKBbaru input').val('');
      if(sData.id){
        $('#frmKBbaru input[name="kode"]').val(sData.no_rm);
        $('#frmKBbaru input[name="nama_peserta"]').val(sData.nama_anggota);
        $('#frmKBbaru input[name="umur_peserta"]').val(sData.umur);
        $('#frmKBbaru input[name="alamat"]').val(sData.alamat+', '+sData.nama_kelurahan+', '+sData.nama_kecamatan);
        $.getJSON("<?php echo site_url('poli/'.'polikb/getkb')?>/"+sData.no_rm+'/'+sData.idpemeriksaan,null,function(obj){
          // console.log(obj);
          for(var key in obj) {
            $('#frmKBbaru input[name="'+key+'"],#frmKBbaru select[name="'+key+'"]').val(obj[key]);
          }
        });
      }
    }

    function updateFrmKBulang(){
      $('#frmKBulang input').val('');
      if(sData.id){
        $('#frmKBulang input[name="kode"]').val(sData.no_rm);
        $('#frmKBulang input[name="nama_peserta"]').val(sData.nama_anggota);
        $('#frmKBulang input[name="umur_peserta"]').val(sData.umur);
        $('#frmKBulang input[name="alamat"]').val(sData.alamat+', '+sData.nama_kelurahan+', '+sData.nama_kecamatan);
        $.getJSON("<?php echo site_url('poli/'.'polikb/getkbulang')?>/"+sData.no_rm+'/'+sData.idpemeriksaan,null,function(obj){
          // console.log(obj);
          for(var key in obj) {
            $('#frmKBulang input[name="'+key+'"],#frmKBulang select[name="'+key+'"]').val(obj[key]);
          }
        });
      }
    }

    function updatelink(){
      // console.log(sData)
      if(sData.id){
        setformdisabled(false);
      }
      updateNavTab();
      updateRiwayatPerawatan();
      updateRiwayatKesehatan();
      updateFrmKBbaru()
      updateFrmKBulang()
    };

    function resetlink(){
      resetNavTab();
      setformdisabled(true);
      resetAntrian();
      resetRiwayatPerawatan();
      resetRiwayatKesehatan();
      $('#frmKBbaru input').val('');
      $('#frmKBulang input').val('');
    }

    function setformdisabled(stat){
      $('#frmKBbaru input').prop('disabled',stat);
      $('#frmKBbaru select').prop('disabled',stat);
      $('#frmKBbaru button').prop('disabled',stat);
      $('#frmKBulang input').prop('disabled',stat);
      $('#frmKBulang select').prop('disabled',stat);
      $('#frmKBulang button').prop('disabled',stat);
    }
</script>