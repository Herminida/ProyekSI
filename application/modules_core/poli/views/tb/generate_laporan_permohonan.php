<?php if($mode=='excel'){
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=laporan-kib-a.xls");
}
elseif($mode=='print'){?>
<html><head>
<?php }?>
<style>
.tbl td{
    font-size: 12px;
    font-family: verdana,arial,sans-serif,tahoma;
    padding: 1px 3px;
    color: #000000;
}
.tbl td h4{
    font-size: 16px;
    margin:5px 2px;
}
.brd td{
    border-right:#333333 solid 1px;
    border-bottom:#333333 solid 1px;
}
.brt{
    border-top:#333333 solid 1px;
}
.brl{
    border-left:#333333 solid 1px;
}
</style>
<?php if($mode=='print'){?>
</head><body onLoad="self.print();self.close();">
<?php }?>
<table class="tbl" cellspacing="0" width="800" style="border:#333333 solid 1px;background:#ffffff">
    <tr>
        <td colspan="6" align="left"><h4 style="font-size: 14px;">PENANGGULANGAN TB NASIONAL</h4></td>
        <td align="center" bgcolor="#CCCCCC"><h4 style="font-size: 14px;"><?php echo $data['no_rm_tb']?></h4></td>
    </tr>
    <tr>
        <td colspan="7" align="center"><h4>FORMULIR PERMOHONAN LABORATORIUM TB UNTUK PEMERIKSAAN DAHAK</h4></td>
    </tr>
    <tr>
        <td>Nama Unit Yankes</td>
        <td colspan="3">: <?php echo $data['nama_unit_kerja']?></td>
        <td colspan="3">No. Telp. : </td>
    </tr>
    <tr>
        <td>Nama tersangka/ pasien</td>
        <td colspan="3">: <?php echo $data['nama_anggota']?></td>
        <td colspan="3">Umur : <?php echo $kpp['umur']?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td colspan="3">: <?php echo $kpp['jenis_kelamin']?></td>
    </tr>
    <tr>
        <td>Alamat Lengkap</td>
        <td colspan="6">: <?php echo $kpp['alamat'].', '.$kpp['nama_kelurahan'].', '.$kpp['nama_kecamatan']?></td>
    </tr>
    <tr>
        <td>Kabupaten/Kota</td>
        <td colspan="3">: TARAKAN</td>
        <td colspan="3">Propinsi : KALIMANTAN TIMUR</td>
    </tr>
    <tr><td colspan="7">&nbsp;</td></tr>
    <tr>
        <td colspan="2" valign="top">
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td colspan="2" class="brt brl">Klasifikasi Pasien</td>
                </tr>
                <tr align="left" class="brd">
                    <td width="50%" class="brl"><?php echo $kpp['klasifikasi']?></td>
                    <td width="50%"><?php echo $kpp['tipe_pasien']?></td>
                </tr>
            </table>
            <br>
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td colspan="2" class="brt brl">No Identitas Sediaan (sesuai dengan TB.06)</td>
                </tr>
                <tr align="left" class="brd">
                    <td colspan="2" class="brl"><?php echo $hasil['no_identitas_sedian']?></td>
                </tr>
            </table>
        </td>
        <td>&nbsp;</td>
        <td colspan="4" valign="top">
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td colspan="4" class="brt brl">Alasan Pemeriksaan</td>
                </tr>
                <tr align="left" class="brd">
                    <td colspan="2" class="brl">Diagnosa</td>
                    <td colspan="2"><?php echo $data['diagnosa']?></td>
                </tr>
                <tr align="left" class="brd">
                    <td colspan="2" class="brl">Follow up pengobatan :</td>
                    <td colspan="2"></td>
                </tr>
                <tr align="left" class="brd">
                    <td colspan="2" class="brl">&nbsp;1. Akhir intensif</td>
                    <td colspan="2"><?php echo (isset($de['diagnosa'])?$de['diagnosa']:'')?></td>
                </tr>
                <tr align="left" class="brd">
                    <td colspan="2" class="brl">&nbsp;2. Akhir sisipan</td>
                    <td colspan="2"><?php echo (isset($jk['diagnosa'])?$jk['diagnosa']:'')?></td>
                </tr>
                <tr align="left" class="brd">
                    <td colspan="2" class="brl">&nbsp;3. 1 bulan sebelum </td>
                    <td colspan="2"><?php echo (isset($fg['diagnosa'])?$fg['diagnosa']:'')?></td>
                </tr>
                <tr align="left" class="brd">
                    <td colspan="2" class="brl">&nbsp;4. Akhir pengobatan (AP)</td>
                    <td colspan="2"><?php echo (isset($hi['diagnosa'])?$hi['diagnosa']:'')?></td>
                </tr>
                <tr align="left" class="brd">
                    <td colspan="2" class="brl">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr align="left" class="brd">
                    <td colspan="2" class="brl">No.Reg.TB Kab/ Kota</td>
                    <td colspan="2"><?php echo $kpp['reg_kab']?></td>
                </tr>
                <?php if ($mode!='excel'){?>
                <tr align="left">
                    <td colspan="2" width="50%"></td>
                    <td colspan="2" width="50%"></td>
                </tr>
                <?php }?>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="7">Tgl. Pengambilan dahak terakhir : <?php echo $data['tgl_ambil_terakhir']?>
            <br>Tanggal pengiriman sediaan : <?php echo $data['tgl_kirim_sediaan']?>
            <br>Tanda tangan pengambil sediaan :
            <br><br>Secara Visual Dahak Tampak 
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td class="brt brl"></td>
                    <td colspan="2" class="brt">S1</td>
                    <td colspan="2" class="brt">P</td>
                    <td colspan="2" class="brt">S2</td>
                </tr>
                <tr align="center" class="brd">
                    <td class="brl">Nanah Lendir</td>
                    <td colspan="2"><?php echo ($data['nanah_lendir_s1']?'&#x2713;':'')?></td>
                    <td colspan="2"><?php echo ($data['nanah_lendir_p']?'&#x2713;':'')?></td>
                    <td colspan="2"><?php echo ($data['nanah_lendir_s2']?'&#x2713;':'')?></td>
                </tr>
                <tr align="center" class="brd">
                    <td class="brl">Bercak Darah</td>
                    <td colspan="2"><?php echo ($data['bercak_darah_s1']?'&#x2713;':'')?></td>
                    <td colspan="2"><?php echo ($data['bercak_darah_p']?'&#x2713;':'')?></td>
                    <td colspan="2"><?php echo ($data['bercak_darah_s2']?'&#x2713;':'')?></td>
                </tr>
                <tr align="center" class="brd">
                    <td class="brl">Air Liur</td>
                    <td colspan="2"><?php echo ($data['air_liur_s1']?'&#x2713;':'')?></td>
                    <td colspan="2"><?php echo ($data['air_liur_p']?'&#x2713;':'')?></td>
                    <td colspan="2"><?php echo ($data['air_liur_s2']?'&#x2713;':'')?></td>
                </tr>
                <?php if ($mode!='excel'){?>
                <tr>
                    <td></td>
                    <td colspan="2" width="20%"></td>
                    <td colspan="2" width="20%"></td>
                    <td colspan="2" width="20%"></td>
                </tr>
                <?php }?>
            </table>
        </td>
    </tr>
    <tr><td colspan="7">&nbsp;</td></tr>
    <tr><td colspan="7" align="center" class="brt">HASIL PEMERIKSAAN LABORATORIUM</td></tr>
    <tr>
        <td colspan="7" align="left">
            No. Register Lab. (sesuai dengan Form di TB.04)
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td class="brt brl">Tanggal Pemeriksaan</td>
                    <td colspan="3" class="brt">Sedimen dahak *)</td>
                    <td colspan="3" class="brt">Hasil **)</td>
                </tr>
                <tr align="center" class="brd">
                    <td class="brl"><?php echo $hasil['tgl_pemeriksaan']?></td>
                    <td colspan="3">(Sewaktu)</td>
                    <td colspan="3"><?php echo $hasil['hasil_s1']?></td>
                </tr>
                <tr align="center" class="brd">
                    <td class="brl"><?php echo $hasil['tgl_pemeriksaan']?></td>
                    <td colspan="3">(Pagi)</td>
                    <td colspan="3"><?php echo $hasil['hasil_p']?></td>
                </tr>
                <tr align="center" class="brd">
                    <td class="brl"><?php echo $hasil['tgl_pemeriksaan']?></td>
                    <td colspan="3">(Sewaktu)</td>
                    <td colspan="3"><?php echo $hasil['hasil_s2']?></td>
                </tr>
                <?php if ($mode!='excel'){?>
                <tr>
                    <td colspan="1" width="40%"></td>
                    <td colspan="3" width="30%"></td>
                    <td colspan="3" width="30%"></td>
                </tr>
                <?php }?>
            </table>
        </td>
    </tr>
    <tr><td colspan="7">&nbsp;</td></tr>
    <tr>
        <td colspan="4">* Diisi sesuai dengan kode huruf sesuai identitas sediaan/ waktu pengambilan dahak.
            <br>* Beri tanda rumput pada hasil pemeriksaan/ tingkat positif yang sesuai.
            <br>* Isi dengan jumlah BTA yang ditemukan
        </td>
        <td colspan="3">Diperiksa oleh : 
            <br>Tanda tangan pemeriksa : 
        </td>
    </tr>
    <tr>
        <td colspan="7"><br>Keterangan :
            <br>Nomor identitas sediaan terdiri dari 3 kelompok angka dan 1 huruf, sebagai berikut :
            <br>* Kelompok angka pertama terdiri dari 2 angka, misalnya 02 yang merupakan nomor urut kab/ kota
            <br>* Kelompok angka kedua juga terdiri dari 2 angka, misalnya 15 yang merupakan nomor urut UPK.
            <br>* Kelompok angka kedua terdiri dari 3 angka, misalnya 237 yang merupakan nomor urut sediaan yang dimulai dengan nomor 001 setiap tahun.
            <br>* Kode huruf :
            <br>&nbsp;- Penegakan diagnosis A = dahak sewaktu pertama, B = dahak pagi dan C = dahak sewaktu kedua.
            <br>&nbsp;- Follow up bulan ke 2, D & E
            <br>&nbsp;- Follow up 1 bulan sebelum AP, F & G
            <br>&nbsp;- Follow up AP, H & I
            <br>&nbsp;- Setelah sisipan, J & K
            <br>Contoh nomor identitas sediaan : 02/15/237 A, 02/15/237 B dan 02/15/237 C
        </td>
    </tr>
    <tr>
        <td width="170"></td>
        <td width=""></td>
        <td width="20"></td>
        <td width="100"></td>
        <td width="100"></td>
        <td width="100"></td>
        <td width="100"></td>
    </tr>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>