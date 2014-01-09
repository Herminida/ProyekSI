  <div class="span9"> <!-- content span -->
    <input type="hidden" id="id_poli" name="id_poli" value='7'>
    <ul class="nav nav-tabs" id="tab-link">
    <li class="active"><a href="#" onclick="return false">KIA</a></li>
    <?php $this->load->view('poliklinik/v_row_navtab');?>

    <form name="frmHell" id="frmHell" method="post">
      <?php $this->load->view('poliklinik/v_row_antrian');?>
    </form>

      <?php $this->load->view('poliklinik/v_row_riwayat_perawatan');?>
      <div><br/></div>

      <?php $this->load->view('poliklinik/v_row_riwayat_kesehatan');?>

      <div><hr></div>


  <div class="row">
    <div class="labelhr">
      <span class="label label-info" id="labelKunjunganBaru">Kunjungan Baru</span>
    </div>
    <div><hr></div>
  </div>

    <div id="rowKunjunganBaru">
        <form id="frmKunjunganBaru">
          <div class="well">
            <table>
              <tr>
                <td></td>
                <td></td>
                <td width="20"></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td><label for="reg">Reg</label></td>
                <td><input type="text" class="input-small" id="reg" name="reg" readonly disabled></td>
                <td>&nbsp;</td>
                <td><label for="no_urut">Nomor Urut</label></td>
                <td><input type="text" id="no_urut" name="no_urut" readonly disabled></td>
              </tr>
              <tr>
                <td><label for="tgl_kia">Tgl Terima Buku KIA</label></td>
                <td><div class="bfh-datepicker" data-format="d-m-y" data-date="">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                     <input type="text" class="input-small" id="tgl_kia" name="tgl_kia" readonly value="<?php echo date('d-m-Y')?>">
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
                <td>&nbsp;</td>
                <td><label for="puskesmas">Tempat Pelayanan</label></td>
                <td><input type="text" id="puskesmas" name="puskesmas" disabled></td>
              </tr>
              <tr>
                <td><label for="nama_anggota">Nama</label></td>
                <td><input type="text" id="nama_anggota" name="nama_anggota" readonly disabled></td>
              </tr>
              <tr>
                <td><label for="tempat_tgl_lahir">Tempat/Tanggal Lahir</label></td>
                <td colspan="4"><input type="text" id="tempat_tgl_lahir" name="tempat_tgl_lahir" class="input-xlarge" readonly disabled></td>
              </tr>
              <tr>
                <td><label for="agama">Agama</label></td>
                <td><input type="text" id="agama" name="agama" readonly disabled></td>
                  <td>&nbsp;</td>
                <td><label for="pendidikan">Pendidikan</label></td>
                <td><input type="text" id="pendidikan" name="pendidikan" readonly disabled></td>
              </tr> 
              <tr>
                <td><label for="gol_darah">Gol. Darah  </label></td>
                <td><input type="text" id="gol_darah" name="gol_darah" readonly disabled></td>
                  <td>&nbsp;</td>
                <td><label for="pekerjaan">Pekerjaan</label></td>
                <td><input type="text" id="pekerjaan" name="pekerjaan" readonly disabled></td>
              </tr> 
              <tr>
                <td><label for="nama_suami">Nama Suami</label></td>
                <td><input type="text" id="nama_suami" name="nama_suami" readonly disabled></td>
              </tr>
              <tr>
                <td><label for="tempat_tgl_lahir_suami">Tempat/Tanggal Lahir</label></td>
                <td colspan="4"><input type="text" id="tempat_tgl_lahir_suami" name="tempat_tgl_lahir_suami" class="input-xlarge" readonly disabled></td>
              </tr>
              <tr>
                <td><label for="pekerjaan_suami">Pekerjaan</label></td>
                <td><input type="text" id="pekerjaan_suami" name="pekerjaan_suami" readonly disabled></td>
                  <td>&nbsp;</td>
                <td><label for="pendidikan_suami">Pendidikan</label></td>
                <td><input type="text" id="pendidikan_suami" name="pendidikan_suami" readonly disabled></td>
              </tr>
              <tr>
                <td><label for="alamat">Alamat Rumah</label></td>
                <td><input type="text" id="alamat" name="alamat" readonly disabled></td>
                <td>&nbsp;</td>
                <td><label for="kelurahan">Kelurahan</label></td>
                <td><input type="text" id="kelurahan" name="kelurahan" readonly disabled></td>
              </tr>
              <tr>
                <td><label for="kecamatan">Kecamatan</label></td>
                <td><input type="text" id="kecamatan" name="kecamatan" readonly disabled></td>
              </tr>
            </table>
          </div>
          <input type="hidden" name="id_kia" id="id_kia">
          <button type="submit" class="btn btn-small btn-primary" name="simpan">Simpan</button>
          <!-- <button type="button" class="btn btn-small" name="reset">Reset</button> -->
        </form>
    </div>


  <div class="row">
    <div class="labelhr">
      <span class="label label-info" id="labelPengamatanKehamilan">Pengamatan Kehamilan</span>
    </div>
    <div><hr></div>
  </div>

    <div id="rowPengamatanKehamilan">
        <form id="frmPengamatanKehamilan">
          <div class="well">
            <table>
              <tr>
                <td width="30"></td>
                <td></td>
                <td width="30"></td>
                <td width="30"></td>
                <td></td>
                <td width="10"></td>
                <td></td>
                <td width="30"></td>
                <td></td>
              </tr>
              <tr>
                <td colspan="5"><b>Anamnesa</b></td>
                <td></td>
                <td colspan="3"><b>Riwayat Obsteri</b></td>
              </tr>
              <tr>
                <td colspan="4"><label for="hpht">Hari Pertama Haid Terakhir</label></td>
                <td><div class="bfh-datepicker" data-format="d-m-y" data-date="22-01-2013">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                     <input type="text" class="input-small" id="hpht" name="hpht" readonly>
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
                <td></td>
                <td colspan="3" align="right">
                  G:<input type="text" class="span1" name="g">
                  P:<input type="text" class="span1" name="p">
                  A:<input type="text" class="span1" name="a">
                  M:<input type="text" class="span1" name="m">
                </td>
              </tr>
              <tr>
                <td colspan="4"><label for="htp">Hari Taksiran Persalinan</label></td>
                <td><div class="bfh-datepicker" data-format="d-m-y" data-date="22-01-2013">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                     <input type="text" class="input-small" id="htp" name="htp" readonly>
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
                <td></td>
                <td colspan="2"><label for="jml_anak_hidup">Jumlah Anak Hidup</label></td>
                <td><input type="text" id="jml_anak_hidup" name="jml_anak_hidup" class="input-mini" disabled></td>
              </tr>
              <tr>
                <td colspan="4"><label for="kehamilan_sekarang">Kehamilan Sekarang</label></td>
                <td><input type="text" id="kehamilan_sekarang" name="kehamilan_sekarang" disabled></td>
                <td></td>
                <td colspan="2"><label for="jml_lahir_mati">Jumlah Lahir Mati</label></td>
                <td><input type="text" id="jml_lahir_mati" name="jml_lahir_mati" class="input-mini" disabled></td>
              </tr>
              <tr>
                <td><label for="lila">LILA</label></td>
                <td><input type="text" id="lila" name="lila" class="span1" disabled>cm</td>
                <td></td>
                <td><label for="tb">TB</label></td>
                <td><input type="text" id="tb" name="tb" class="span1" disabled>cm</td>
                <td></td>
                <td colspan="2"><label for="jarak_persalinan">Jarak Persalinan Terakhir</label></td>
                <td><input type="text" id="jarak_persalinan" name="jarak_persalinan" disabled></td>
              </tr>
              <tr>
                <td colspan="3"><label for="riwayat_ibu">Riwayat Penyakit Ibu</label></td>
                <td colspan="2"><input type="text" id="riwayat_ibu" name="riwayat_ibu" class="input-large" disabled></td>
                <td></td>
                <td colspan="2"><label for="persalinan">Persalinan Terakhir</label></td>
                <td><select id="persalinan" name="persalinan" class="input-small" disabled>
                  <option value="1">Spontan</option>
                  <option value="2">Bantuan</option>
                </select></td>
              </tr>
              <tr>
                <td colspan="3"><label for="riwayat_alergi">Riwayat Alergi</label></td>
                <td colspan="2"><input type="text" id="riwayat_alergi" name="riwayat_alergi" class="input-large" disabled></td>
                <td></td>
                <td colspan="2"><label for="persalinan_bantuan">Jika Bantuan Sebutkan</label></td>
                <td><select id="persalinan_bantuan" name="persalinan_bantuan" class="input-small" disabled>
                  <option value="1">Nakes</option>
                  <option value="2">Non Nakes</option>
                </select></td>
              </tr> 
              <tr>
                <td colspan="2"><label for="keluhan_utama">Keluhan Utama</label></td>
                <td colspan="3"><input type="text" id="keluhan_utama" name="keluhan_utama" class="input-large" disabled></td>
                <td></td>
                <td colspan="2"><label for="kontrasepsi">Penggunaan Kontrasepsi<br>Sebelum Kehamilan ini</label></td>
                <td><select id="kontrasepsi" name="kontrasepsi" class="input-small" disabled>
                  <option value="1">IUD</option>
                  <option value="2">Kondom</option>
                  <option value="3">Implant</option>
                  <option value="4">Suntikan</option>
                  <option value="5">Pil</option>
                </select></td>
              </tr> 
              <tr><td colspan="9"><hr/></td></tr>
              <tr>
                <td colspan="5"><b>Resiko Tinggi</b></td>
                <td></td>
                <td colspan="3"><b>Rujuk</b></td>
              </tr>
              <tr>
                <td colspan="2"><label for="resiko_tgl">Ditemukan Tanggal</label></td>
                <td colspan="3"><div class="bfh-datepicker" data-format="d-m-y" data-date="22-01-2013">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                     <input type="text" class="input-small" id="resiko_tgl" name="resiko_tgl" readonly>
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
                <td></td>
                <td><label for="rujuk_tgl">Dirujuk Tanggal</label></td>
                <td colspan="2"><div class="bfh-datepicker" data-format="d-m-y" data-date="22-01-2013">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                     <input type="text" id="rujuk_tgl" name="rujuk_tgl" class="input-small" readonly>
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
                <td colspan="2" rowspan="2"><label for="resiko_jenis">Jenis Resiko</label></td>
                <td colspan="3" rowspan="2"><textarea id="resiko_jenis" name="resiko_jenis" row="4" class="input-large" disabled></textarea></td>
                <td rowspan="2"></td>
                <td><label for="rujuk_ke">Dirujuk Ke</label></td>
                <td colspan="2"><input type="text" id="rujuk_ke" name="rujuk_ke" disabled></td>
              </tr> 
              <tr>
                <td><label for="tindakan_sementara">Tindakan Sementara</label></td>
                <td colspan="2"><textarea id="tindakan_sementara" name="tindakan_sementara" row="2" class="input-large" disabled></textarea></td>
              </tr> 
            </table>
          </div>
          <input type="hidden" name="id_pengamatan_kehamilan" id="id_pengamatan_kehamilan">
          <button type="submit" class="btn btn-small btn-primary" name="simpan">Simpan</button>
          <!-- <button type="button" class="btn btn-small" name="reset">Reset</button> -->
        </form>
    </div>


  <div class="row">
    <div class="labelhr">
      <span class="label label-info" id="labelPemeriksaanAntenatal">Pemeriksaan Antenatal</span>
    </div>
    <div><hr></div>
  </div>

    <div id="rowPemeriksaanAntenatal">
        <table id="tblPemeriksaanAntenatal" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>NO</th>
              <th>Tanggal</th>
              <th>Keluhan</th>
              <th>BB (Kg)</th>
              <th>Umur Kehamilan (mgg)</th>
              <th>Tinggi Fundus (cm)</th>
              <th>Letak Janin Kep/Su/Li</th>
              <th>Denyut Jantung Janin /mnt</th>
              <th>Kaki Bengkak (-/+)</th>
              <th>LAB</th>
              <th>Tindakan (Terapi:TT/FE), Rujukan, Umpan Balik</th>
              <th>Saran</th>
              <th>Tanggal Kembali</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <form id="frmPemeriksaanAntenatal">
          <div class="well">
            <table>
              <tr>
                <td></td>
                <td></td>
                <td width="20"></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td><label for="tgl_periksa">Tanggal</label></td>
                <td><div class="bfh-datepicker" data-format="d-m-y" data-date="22-01-2013">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                     <input type="text" class="input-small" id="tgl_periksa" name="tgl_periksa" readonly>
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
                <td><label for="keluhan_sekarang">Keluhan Sekarang</label></td>
                <td colspan="4"><input type="text" id="keluhan_sekarang" name="keluhan_sekarang" class="input-xlarge" disabled></td>
              </tr> 
              <tr>
                <td><label for="bb">BB</label></td>
                <td><input type="text" id="bb" name="bb" class="input-small" disabled>Kg</td>
                <td>&nbsp;</td>
                <td><label for="umur_kehamilan">Umur Kehamilan</label></td>
                <td><input type="text" id="umur_kehamilan" name="umur_kehamilan" class="input-small" disabled>mgg</td>
              </tr> 
              <tr>
                <td><label for="fundus">Tinggi Fundus</label></td>
                <td><input type="text" id="fundus" name="fundus" class="input-small" disabled>cm</td>
                <td>&nbsp;</td>
                <td><label for="letak_janin">Letak Janin Kep/Su/Li</label></td>
                <td><input type="text" id="letak_janin" name="letak_janin" disabled></td>
              </tr> 
              <tr>
                <td><label for="denyut_jantung_janin">Denyut Jantung Janin</label></td>
                <td><input type="text" id="denyut_jantung_janin" name="denyut_jantung_janin" class="input-small" disabled>/mnt</td>
                <td>&nbsp;</td>
                <td><label for="kaki_bengkak">Kaki Bengkak</label></td>
                <td><input type="text" id="kaki_bengkak" name="kaki_bengkak" class="input-small" disabled></td>
              </tr> 
              <tr>
                <td><label for="hasil_lab">Hasil Lab</label></td>
                <td><input type="text" id="hasil_lab" name="hasil_lab" disabled></td>
              </tr> 
              <tr>
                <td><label for="terapi_tt">Terapi TT</label></td>
                <td><select name="terapi_tt" id="terapi_tt" class="input-small" disabled>
                  <option value="1">TT 1</option>
                  <option value="2">TT 2</option>
                  <option value="3">TT 3</option>
                  <option value="4">TT 4</option>
                  <option value="5">TT 5</option>
                </select></td>
                <td>&nbsp;</td>
                <td><label for="terapi_fe">Terapi Fe</label></td>
                <td><select name="terapi_fe" id="terapi_fe" class="input-small" disabled>
                  <option value="1">Fe 1</option>
                  <option value="2">Fe 2</option>
                  <option value="3">Fe 3</option>
                </select></td>
              </tr> 
              <tr>
                <td><label for="saran">Saran</label></td>
                <td colspan="4"><input type="text" id="saran" name="saran" classs="input-large" disabled></td>
              </tr> 
              <tr>
                <td><label for="tgl_kembali">Tanggal Kembali</label></td>
                <td><div class="bfh-datepicker" data-format="d-m-y" data-date="22-01-2013">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                     <input type="text" class="input-small" id="tgl_kembali" name="tgl_kembali" readonly>
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
          <input type="hidden" name="id_antenatal" id="id_antenatal">
          <button type="submit" class="btn btn-small btn-primary" name="simpan">Simpan</button>
          <!-- <button type="button" class="btn btn-small" name="reset">Reset</button> -->
        </form>
    </div>


  <div class="row">
    <div class="labelhr">
      <span class="label label-info" id="labelPemantauanPersalinan">Pemantauan Persalinan</span>
    </div>
    <div><hr></div>
  </div>

    <div id="rowPemantauanPersalinan">
        <table id="tblPemantauanPersalinan" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th rowspan="2">NO</th>
              <th rowspan="2">Tgl</th>
              <th rowspan="2">Jam</th>
              <th rowspan="2">Tekanan Darah</th>
              <th rowspan="2">Nadi</th>
              <th rowspan="2">Nafas</th>
              <th rowspan="2">Suhu</th>
              <th colspan="4" style="text-align:center;">HIS</th>
              <th colspan="2" style="text-align:center;">DJJ</th>
              <th rowspan="2">Hasil Pemeriksaan Dalam</th>
              <th rowspan="2">Aksi</th>
            </tr>
            <tr>
              <th>(+/-)</th>
              <th>Frek</th>
              <th>Lama</th>
              <th>Kuat</th>
              <th>Frek</th>
              <th>Teratur</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <form id="frmPemantauanPersalinan">
          <div class="well">
            <table>
              <tr>
                <td></td>
                <td></td>
                <td width="20"></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td><label for="tgl_persalinan">Tanggal</label></td>
                <td><div class="bfh-datepicker" data-format="d-m-y" data-date="22-01-2013">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                    <input type="text" class="input-small" id="tgl_persalinan" name="tgl_persalinan" readonly>
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
                <td>&nbsp;</td>
                <td><label for="jam_persalinan">Jam</label></td>
                <td><div class="bfh-timepicker">
                  <div class="input-append bfh-timepicker-toggle" data-toggle="bfh-timepicker">
                    <input type="text" class="input-small" id="jam_persalinan" name="jam_persalinan" readonly>
                    <button class="btn btn-small" type="button"><i class="icon-time"></i></button>
                  </div>
                  <div class="bfh-timepicker-popover">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="hour">
                            <a class="next" href="#"><i class="icon-chevron-up"></i></a><br>
                            <input type="text" class="input-mini" readonly><br>
                            <a class="previous" href="#"><i class="icon-chevron-down"></i></a>
                          </td>
                          <td class="separator">:</td>
                          <td class="minute">
                            <a class="next" href="#"><i class="icon-chevron-up"></i></a><br>
                            <input type="text" class="input-mini" readonly><br>
                            <a class="previous" href="#"><i class="icon-chevron-down"></i></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div></td>
              </tr>
              <tr>
                <td><label for="tekanan_darah">Tekanan Darah</label></td>
                <td><input type="text" id="tekanan_darah" name="tekanan_darah" disabled></td>
                <td></td>
                <td><label for="nadi">Nadi</label></td>
                <td><input type="text" id="nadi" name="nadi" disabled>/mnt</td>
              </tr>
              <tr> 
                <td><label for="nafas">Nafas</label></td>
                <td><input type="text" id="nafas" name="nafas" disabled></td>
                <td></td>
                <td><label for="suhu">Suhu</label></td>
                <td><input type="text" id="suhu" name="suhu" disabled>C</td>
              </tr>
              <tr>
                <td><label for="his">HIS (+/-)</label></td>
                <td><input type="text" id="his" name="his" disabled></td>
                <td></td>
                <td><label for="his_frek">HIS Frek</label></td>
                <td><input type="text" id="his_frek" name="his_frek" disabled></td>
              </tr> 
              <tr>
                <td><label for="his_lama">HIS Lama</label></td>
                <td><input type="text" id="his_lama" name="his_lama" disabled></td>
                <td></td>
                <td><label for="his_kuat">HIS Kuat</label></td>
                <td><input type="text" id="his_kuat" name="his_kuat" disabled></td>
              </tr> 
              <tr>
                <td><label for="djj_frek">DJJ Frek</label></td>
                <td><input type="text" id="djj_frek" name="djj_frek" disabled></td>
                <td></td>
                <td><label for="djj_teratur">DJJ Teratur</label></td>
                <td><input type="text" id="djj_teratur" name="djj_teratur" disabled></td>
              </tr> 
              <tr>
                <td><label for="hasil_pemeriksaan">Hasil Periksa Dalam</label></td>
                <td colspan="4"><input type="text" id="hasil_pemeriksaan" name="hasil_pemeriksaan" class="input-xlarge" disabled></td>
              </tr> 
            </table>
          </div>
          <input type="hidden" name="id_persalinan" id="id_persalinan">
          <button type="submit" class="btn btn-small btn-primary" name="simpan">Simpan</button>
          <!-- <button type="button" class="btn btn-small" name="reset">Reset</button> -->
        </form>
    </div>


  <div class="row">
    <div class="labelhr">
      <span class="label label-info" id="labelPengamatanNifas">PengamatanNifas</span>
    </div>
    <div><hr></div>
  </div>

    <div id="rowPengamatanNifas">
        <table id="tblPengamatanNifas" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Jam</th>
              <th>Anamnesa</th>
              <th>Tekanan Darah (mmhg)</th>
              <th>Nadi (/mnt)</th>
              <th>Nafas (/mnt)</th>
              <th>Suhu (c)</th>
              <th>Kontraksi Rahim</th>
              <th>Pendarahan</th>
              <th>Lochia</th>
              <th>BAB</th>
              <th>BAK</th>
              <th>Menyusui Dini</th>
              <th>Terapi & Tindakan</th>
              <th>Vit A</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <form id="frmPengamatanNifas">
          <div class="well">
            <table>
              <tr>
                <td></td>
                <td></td>
                <td width="20"></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td><label for="tgl">Tanggal</label></td>
                <td><div class="bfh-datepicker" data-format="d-m-y" data-date="22-01-2013">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                     <input type="text" class="tgl" id="tgl" name="tgl" class="input-small" readonly>
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
                  </div></div>
                </td>
                <td>&nbsp;</td>
                <td><label for="jam">Jam</label></td>
                <td><div class="bfh-timepicker">
                  <div class="input-append bfh-timepicker-toggle" data-toggle="bfh-timepicker">
                    <input type="text" class="input-small" id="jam" name="jam" readonly>
                    <button class="btn btn-small" type="button"><i class="icon-time"></i></button>
                  </div>
                  <div class="bfh-timepicker-popover">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="hour">
                            <a class="next" href="#"><i class="icon-chevron-up"></i></a><br>
                            <input type="text" class="input-mini" readonly><br>
                            <a class="previous" href="#"><i class="icon-chevron-down"></i></a>
                          </td>
                          <td class="separator">:</td>
                          <td class="minute">
                            <a class="next" href="#"><i class="icon-chevron-up"></i></a><br>
                            <input type="text" class="input-mini" readonly><br>
                            <a class="previous" href="#"><i class="icon-chevron-down"></i></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div></td>
              </tr>
              <tr>
                <td><label>Anamanesa</label></td>
                <td><textarea id="anamnesa" name="anamnesa" row="3" class="input-large"></textarea></td>
              </tr>
              <tr>
                <td><label for="tekanan_darah">Tekanan Darah</label></td>
                <td><input type="text" id="tekanan_darah" name="tekanan_darah" disabled> /mmhg</td>
                <td></td>
                <td><label for="nadi">Nadi</label></td>
                <td><input type="text" id="nadi" name="nadi" disabled> /mnt</td>
              </tr>
              <tr> 
                <td><label for="nafas">Nafas</label></td>
                <td><input type="text" id="nafas" name="nafas" disabled> /mnt</td>
                <td></td>
                <td><label for="suhu">Suhu</label></td>
                <td><input type="text" id="suhu" name="suhu" class=""input-mini disabled> C</td>
              </tr>
              <tr>
                <td><label for="kontraksi_rahim">Kontraksi Rahim</label></td>
                <td><input type="text" id="kontraksi_rahim" name="kontraksi_rahim" disabled></td>
              </tr> 
              <tr>
                <td><label for="pendarahan">Pendarahan</label></td>
                <td><input type="text" id="pendarahan" name="pendarahan" disabled></td>
              </tr> 
              <tr>
                <td><label for="lochia">Lochia</label></td>
                <td><input type="text" id="lochia" name="lochia" disabled></td>
              </tr> 
              <tr>
                <td><label for="bab">BAB</label></td>
                <td><input type="text" id="bab" name="bab" disabled></td>
              </tr> 
              <tr>
                <td><label for="bak">BAK</label></td>
                <td><input type="text" id="bak" name="bak" disabled></td>
              </tr> 
              <tr>
                <td><label for="menyusui_dini">Menyusui Dini</label></td>
                <td><input type="text" id="menyusui_dini" name="menyusui_dini" disabled></td>
              </tr> 
              <tr>
                <td><label for="tindakan">Terapi & Tindakan</label></td>
                <td><input type="text" id="tindakan" name="tindakan" disabled></td>
                <td></td>
                <td><label for="vit_a">Vit A</label></td>
                <td><input type="text" id="vit_a" name="vit_a" disabled></td>
              </tr> 
            </table>
          </div>
          <input type="hidden" name="id_nifas" id="id_nifas">
          <button type="submit" class="btn btn-small btn-primary" name="simpan">Simpan</button>
          <!-- <button type="button" class="btn btn-small" name="reset">Reset</button> -->
        </form>
        <button type="button" class="btn-primary btn-medium" name="btnSelesai" id="btnSelesai" onclick="selesai()" disabled>Selesai Semua Pemeriksaan</button>
    </div>


</div><!--/span9-->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
   function getSisaAntrian(){
      $.ajax({
            url: '<?php echo site_url('poli/polibidan/ajaxsisaantrian')?>',
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
      $('#labelKunjunganBaru').click(function(){$('#rowKunjunganBaru').slideToggle()})
      $('#labelPengamatanKehamilan').click(function(){$('#rowPengamatanKehamilan').slideToggle()})
      $('#labelPemeriksaanAntenatal').click(function(){$('#rowPemeriksaanAntenatal').slideToggle()})
      $('#labelPemantauanPersalinan').click(function(){$('#rowPemantauanPersalinan').slideToggle()})
      $('#labelPengamatanNifas').click(function(){$('#rowPengamatanNifas').slideToggle()})

      $('#frmKunjunganBaru').submit(function(){
        $('#frmKunjunganBaru button').prop('disabled',true);
        data={id_kia:$('#frmKunjunganBaru input[name="id_kia"]').val()
            ,no_rm:sData.no_rm
            ,puskesmas:$('#frmKunjunganBaru input[name="puskesmas"]').val()
            ,tgl_kia:$('#frmKunjunganBaru input[name="tgl_kia"]').val()
          };
        // console.log(data);
        $.ajax({
          url: '<?php echo site_url('poli/'.'polibidan/simpankia')?>',
          data: data,
          method:'post',
          dataType: 'json',
          success: function(obj){
            console.log(obj);
            if(obj.success){
              alert('data Kunjungan telah disimpan');
              updateFrmKunjunganBaru();
            }else if(obj.error!=''){
              alert(obj.error);
            }
          },
        });
        $('#frmKunjunganBaru button').prop('disabled',false);
        return false;
      });

      $('#frmPengamatanKehamilan').submit(function(){
        data={};
        $('#frmPengamatanKehamilan input,#frmPengamatanKehamilan select,#frmPengamatanKehamilan textarea').each(function(){
          data[$(this).attr('name')]=$(this).val();
        });
        data['register']=sData.idpemeriksaan;
        data['validasi_reg']=sData.validasi_reg;
        // console.log(data);
        $.ajax({
          url: '<?php echo site_url('poli/'.'polibidan/simpankehamilan')?>',
          data: data,
          method:'post',
          dataType: 'json',
          success: function(obj){
            // console.log(obj);
            if(obj.success){
              alert('data Pengamatan Kehamilan sudah tersimpan');
              updateFrmPengamatanKehamilan();
            }else if(obj.error!=''){
              alert(obj.error);
            }
          },
        });
        return false;
      });

      $('#frmPemeriksaanAntenatal').submit(function(){
        data={};
        $('#frmPemeriksaanAntenatal input,#frmPemeriksaanAntenatal select').each(function(){
          data[$(this).attr('name')]=$(this).val();
        });
        data['no_rm']=sData.no_rm;
        data['register']=sData.idpemeriksaan;
        data['validasi_reg']=sData.validasi_reg;
        // console.log(data);
        $.ajax({
          url: '<?php echo site_url('poli/'.'polibidan/simpanantenatal')?>',
          data: data,
          method:'post',
          dataType: 'json',
          success: function(obj){
            // console.log(obj);
            if(obj.success){
              alert('data Pemeriksaan Antenatal sudah tersimpan');
              updateTblPemeriksaanAntenatal();
            }else if(obj.error!=''){
              alert(obj.error);
            }
          },
        });
        return false;
      });

      $('#frmPemantauanPersalinan').submit(function(){
        data={};
        $('#frmPemantauanPersalinan input').each(function(){
          data[$(this).attr('name')]=$(this).val();
        });
        data['no_rm']=sData.no_rm;
        data['register']=sData.idpemeriksaan;
        data['validasi_reg']=sData.validasi_reg;
        // console.log(data);
        $.ajax({
          url: '<?php echo site_url('poli/'.'polibidan/simpanpersalinan')?>',
          data: data,
          method:'post',
          dataType: 'json',
          success: function(obj){
            // console.log(obj);
            if(obj.success){
              alert('data Pemantauan Persalinan sudah tersimpan');
              updateTblPemantauanPersalinan();
            }else if(obj.error!=''){
              alert(obj.error);
            }
          },
        });
        return false;
      });

      $('#frmPengamatanNifas').submit(function(){
        data={};
        $('#frmPengamatanNifas input,#frmPengamatanNifas textarea').each(function(){
          data[$(this).attr('name')]=$(this).val();
        });
        data['no_rm']=sData.no_rm;
        data['register']=sData.idpemeriksaan;
        data['validasi_reg']=sData.validasi_reg;
        // console.log(data);
        $.ajax({
          url: '<?php echo site_url('poli/'.'polibidan/simpannifas')?>',
          data: data,
          method:'post',
          dataType: 'json',
          success: function(obj){
            // console.log(obj);
            if(obj.success){
              alert('data Pengamatan Nifas sudah tersimpan');
              updateTblPengamatanNifas();
            }else if(obj.error!=''){
              alert(obj.error);
            }
          },
        });
        return false;
      });

      resetlink();

    });

    function selesai(){  data={};
        data['idpemeriksaan']=sData.idpemeriksaan;
        // console.log(data);
        $.ajax({
          url: '<?php echo site_url('poli/'.'polibidan/selesaibidan')?>',
          data: data,
          method:'post',
          dataType: 'json',
          success: function(obj){
            // console.log(obj);
            if(obj.success){
              alert('Pemeriksaan tersimpan');
              resetlink();
            }else if(obj.error!=''){
              alert(obj.error);
            }
          },
        });
        return false;

    }

    function updateFrmKunjunganBaru(){
      $('#frmKunjunganBaru input').val('');
      if(sData.id){
        $('#frmKunjunganBaru input[name="reg"]').val(sData.no_rm);
        $('#frmKunjunganBaru input[name="tgl_kia"]').val('<?php echo date('d-m-Y')?>');
        $.getJSON("<?php echo site_url('poli/'.'polibidan/getkia')?>/"+sData.no_rm,null,function(obj){
        console.log(obj);
            if(obj){
              if(obj.id_kia){
                $('#frmKunjunganBaru input[name="id_kia"]').val(obj.id_kia);
                $('#frmKunjunganBaru input[name="no_urut"]').val(sData.idpemeriksaan);
                $('#frmKunjunganBaru input[name="tgl_kia"]').val(obj.tgl_kia);
              }
              $('#frmKunjunganBaru input[name="puskesmas"]').val(obj.puskesmas);
              $('#frmKunjunganBaru input[name="nama_anggota"]').val(obj.nama_anggota);
              $('#frmKunjunganBaru input[name="tempat_tgl_lahir"]').val(obj.tempat_lahir+' / '+obj.tanggal_lahir);
              $('#frmKunjunganBaru input[name="agama"]').val(obj.nama_agama);
              $('#frmKunjunganBaru input[name="pendidikan"]').val(obj.nama_pendidikan);
              $('#frmKunjunganBaru input[name="pekerjaan"]').val(obj.nama_pekerjaan);
              $('#frmKunjunganBaru input[name="nama_suami"]').val(obj.nama_kk);
              $('#frmKunjunganBaru input[name="alamat"]').val(obj.alamat);
              $('#frmKunjunganBaru input[name="kelurahan"]').val(obj.nama_kelurahan);
              $('#frmKunjunganBaru input[name="kecamatan"]').val(obj.nama_kecamatan);
            }
        });
      }
    }

    function updateFrmPengamatanKehamilan(){
      $('#frmPengamatanKehamilan input,#frmPengamatanKehamilan textarea').val('');
      if(sData.id){
        $.getJSON("<?php echo site_url('poli/'.'polibidan/getkehamilan')?>/"+sData.idpemeriksaan,null,function(obj){
          for(var key in obj) {
            $('#frmPengamatanKehamilan *[name="'+key+'"]').val(obj[key]);
          }
        });
      }
    }

    var objAntenatal;
    function updateTblPemeriksaanAntenatal(){
      $('#tblPemeriksaanAntenatal tbody').html('');
      $('#frmPemeriksaanAntenatal input').val('');
      objAntenatal={};
      if(sData.id){
        $.getJSON("<?php echo site_url('poli/'.'polibidan/getantenatal')?>/"+sData.no_rm,null,function(obj){
          // console.log(obj);
          var no=0;
          for(var key in obj) {
            objAntenatal[obj[key].id_antenatal]=obj[key];
            no++;
            $('#tblPemeriksaanAntenatal tbody').append('<tr><td>'+no+'</td>'
              +'<td>'+obj[key].tgl_periksa+'</td>'
              +'<td>'+obj[key].keluhan_sekarang+'</td>'
              +'<td>'+obj[key].bb+'</td>'
              +'<td>'+obj[key].umur_kehamilan+'</td>'
              +'<td>'+obj[key].fundus+'</td>'
              +'<td>'+obj[key].letak_janin+'</td>'
              +'<td>'+obj[key].denyut_jantung_janin+'</td>'
              +'<td>'+obj[key].kaki_bengkak+'</td>'
              +'<td>'+obj[key].hasil_lab+'</td>'
              +'<td>TT '+obj[key].terapi_tt+', FE '+obj[key].terapi_fe+'</td>'
              +'<td>'+obj[key].saran+'</td>'
              +'<td>'+obj[key].tgl_kembali+'</td>'
              +'<td><a href="#'+obj[key].id_antenatal+'" rel="ubah">Ubah</a> <a href="#'+obj[key].id_antenatal+'" rel="hapus">Hapus</a></td>'
              +'</tr>');
          }
          if(no>0){
            $('#tblPemeriksaanAntenatal a[rel="ubah"]').click(function(){
              var id_antenatal=$(this).attr('href').replace('#','');
              for(var key in objAntenatal[id_antenatal]) {
                $('#frmPemeriksaanAntenatal *[name="'+key+'"]').val(objAntenatal[id_antenatal][key]);
              }
              return false;
            });
            $('#tblPemeriksaanAntenatal a[rel="hapus"]').click(function(){
              if(confirm('Yakin akan menghapus?')){
                var id_antenatal=$(this).attr('href').replace('#','');
                $.getJSON("<?php echo site_url('poli/'.'polibidan/hapusanantenatal')?>/"+id_antenatal,null,function(obj){
                  if(obj.success){
                    alert('data sudah terhapus');
                    updateTblPemeriksaanAntenatal();
                  }else if(obj.error!=''){
                    alert(obj.error);
                  }
                });
              }
              return false;
            })
          }
        });
      }
    }

    var objPersalinan;
    function updateTblPemantauanPersalinan(){
      $('#tblPemantauanPersalinan tbody').html('');
      $('#frmPemantauanPersalinan input').val('');
      objPersalinan={};
      if(sData.id){
        $.getJSON("<?php echo site_url('poli/'.'polibidan/getpersalinan')?>/"+sData.no_rm,null,function(obj){
          // console.log(obj);
          var no=0;
          for(var key in obj) {
            objPersalinan[obj[key].id_persalinan]=obj[key];
            no++;
            $('#tblPemantauanPersalinan tbody').append('<tr><td>'+no+'</td>'
              +'<td>'+obj[key].tgl_persalinan+'</td>'
              +'<td>'+obj[key].jam_persalinan+'</td>'
              +'<td>'+obj[key].tekanan_darah+'</td>'
              +'<td>'+obj[key].nadi+'</td>'
              +'<td>'+obj[key].nafas+'</td>'
              +'<td>'+obj[key].suhu+'</td>'
              +'<td>'+obj[key].his+'</td>'
              +'<td>'+obj[key].his_frek+'</td>'
              +'<td>'+obj[key].his_lama+'</td>'
              +'<td>'+obj[key].his_kuat+'</td>'
              +'<td>'+obj[key].djj_frek+'</td>'
              +'<td>'+obj[key].djj_teratur+'</td>'
              +'<td>'+obj[key].hasil_pemeriksaan+'</td>'
              +'<td><a href="#'+obj[key].id_persalinan+'" rel="ubah">Ubah</a> <a href="#'+obj[key].id_persalinan+'" rel="hapus">Hapus</a></td>'
              +'</tr>');
          }
          if(no>0){
            $('#tblPemantauanPersalinan a[rel="ubah"]').click(function(){
              var id_persalinan=$(this).attr('href').replace('#','');
              for(var key in objPersalinan[id_persalinan]) {
                $('#frmPemantauanPersalinan *[name="'+key+'"]').val(objPersalinan[id_persalinan][key]);
              }
              return false;
            });
            $('#tblPemantauanPersalinan a[rel="hapus"]').click(function(){
              if(confirm('Yakin akan menghapus?')){
                var id_persalinan=$(this).attr('href').replace('#','');
                $.getJSON("<?php echo site_url('poli/'.'polibidan/hapuspersalinan')?>/"+id_persalinan,null,function(obj){
                  if(obj.success){
                    alert('data sudah terhapus');
                    updateTblPemantauanPersalinan();
                  }else if(obj.error!=''){
                    alert(obj.error);
                  }
                });
              }
              return false;
            })
          }
        });
      }
    }

    var objNifas;
    function updateTblPengamatanNifas(){
      $('#tblPengamatanNifas tbody').html('');
      $('#frmPengamatanNifas input,#frmPengamatanNifas textarea').val('');
      objNifas={};
      if(sData.id){
        $.getJSON("<?php echo site_url('poli/'.'polibidan/getnifas')?>/"+sData.no_rm,null,function(obj){
          // console.log(obj);
          var no=0;
          for(var key in obj) {
            objNifas[obj[key].id_nifas]=obj[key];
            no++;
            $('#tblPengamatanNifas tbody').append('<tr><td>'+no+'</td>'
              +'<td>'+obj[key].tgl+'</td>'
              +'<td>'+obj[key].jam+'</td>'
              +'<td>'+obj[key].anamnesa+'</td>'
              +'<td>'+obj[key].tekanan_darah+'</td>'
              +'<td>'+obj[key].nadi+'</td>'
              +'<td>'+obj[key].nafas+'</td>'
              +'<td>'+obj[key].suhu+'</td>'
              +'<td>'+obj[key].kontraksi_rahim+'</td>'
              +'<td>'+obj[key].pendarahan+'</td>'
              +'<td>'+obj[key].lochia+'</td>'
              +'<td>'+obj[key].bab+'</td>'
              +'<td>'+obj[key].bak+'</td>'
              +'<td>'+obj[key].menyusui_dini+'</td>'
              +'<td>'+obj[key].tindakan+'</td>'
              +'<td>'+obj[key].vit_a+'</td>'
              +'<td><a href="#'+obj[key].id_nifas+'" rel="ubah">Ubah</a> <a href="#'+obj[key].id_nifas+'" rel="hapus">Hapus</a></td>'
              +'</tr>');
          }
          if(no>0){
            $('#tblPengamatanNifas a[rel="ubah"]').click(function(){
              var id_nifas=$(this).attr('href').replace('#','');
              for(var key in objNifas[id_nifas]) {
                $('#frmPengamatanNifas *[name="'+key+'"]').val(objNifas[id_nifas][key]);
              }
              return false;
            });
            $('#tblPengamatanNifas a[rel="hapus"]').click(function(){
              if(confirm('Yakin akan menghapus?')){
                var id_nifas=$(this).attr('href').replace('#','');
                $.getJSON("<?php echo site_url('poli/'.'polibidan/hapusnifas')?>/"+id_nifas,null,function(obj){
                  if(obj.success){
                    alert('data sudah terhapus');
                    updateTblPengamatanNifas();
                  }else if(obj.error!=''){
                    alert(obj.error);
                  }
                });
              }
              return false;
            })
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
      updateFrmKunjunganBaru();
      updateFrmPengamatanKehamilan()
      updateTblPemeriksaanAntenatal()
      updateTblPemantauanPersalinan()
      updateTblPengamatanNifas()
    };

    function resetlink(){
      resetNavTab();
      setformdisabled(true);
      resetAntrian();
      resetRiwayatPerawatan();
      resetRiwayatKesehatan();
      $('#frmKunjunganBaru input').val('');
      $('#frmPengamatanKehamilan input,#frmPengamatanKehamilan textarea').val('');
      $('#frmPemeriksaanAntenatal input').val('');
      $('#frmPemantauanPersalinan input').val('');
      $('#frmPengamatanNifas input,#frmPengamatanNifas textarea').val('');
    }

    function setformdisabled(stat){
      $('#frmKunjunganBaru input').prop('disabled',stat);
      $('#frmKunjunganBaru button').prop('disabled',stat);
      $('#frmPengamatanKehamilan input').prop('disabled',stat);
      $('#frmPengamatanKehamilan select').prop('disabled',stat);
      $('#frmPengamatanKehamilan textarea').prop('disabled',stat);
      $('#frmPengamatanKehamilan button').prop('disabled',stat);
      $('#frmPemeriksaanAntenatal input').prop('disabled',stat);
      $('#frmPemeriksaanAntenatal select').prop('disabled',stat);
      $('#frmPemeriksaanAntenatal button').prop('disabled',stat);
      $('#frmPemantauanPersalinan input').prop('disabled',stat);
      $('#frmPemantauanPersalinan button').prop('disabled',stat);
      $('#frmPengamatanNifas input').prop('disabled',stat);
      $('#frmPengamatanNifas textarea').prop('disabled',stat);
      $('#frmPengamatanNifas button').prop('disabled',stat);
      $('#btnSelesai').prop('disabled',stat);
    }
    </script>