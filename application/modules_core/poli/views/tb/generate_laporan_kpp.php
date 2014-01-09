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
<table class="tbl" cellspacing="0" width="1100" style="border:#333333 solid 1px;background:#ffffff">
    <tr>
        <td colspan="13" align="left"><h4>PENANGGULANGAN TB NASIONAL</h4></td>
        <td colspan="18" align="left"><h4>KARTU PENGOBATAN PASIEN TB</h4></td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><h4><?php echo $data['no_rm_tb']?></h4></td>
    </tr>
    <tr>
        <td colspan="16" valign="top">
            <table class="tbl" cellspacing="0" width="100%">
                <tr>
                    <td colspan="4">Nama Pasien</td>
                    <td colspan="6">: <?php echo $data['nama_anggota']?></td>
                    <td colspan="6">telp. <?php echo $data['telepon']?></td>
                </tr>
                <tr>
                    <td colspan="4">Alamat Lengkap</td>
                    <td colspan="12">: <?php echo $data['alamat'].', '.$data['nama_kelurahan'].', '.$data['nama_kecamatan']?></td>
                </tr>
                <tr>
                    <td colspan="4">Nama PMO</td>
                    <td colspan="6">: <?php echo $data['nama_pmo']?></td>
                    <!-- <td colspan="6">telp. </td> -->
                </tr>
                <tr>
                    <td colspan="4">Status PMO</td>
                    <td colspan="12">: <?php echo $data['status_pmo']?></td>
                </tr>
                <tr>
                    <td colspan="4">Alamat Lengkap PMO</td>
                    <td colspan="12">: <?php echo $data['alamat_pmo']?></td>
                </tr>
                <tr>
                    <td colspan="4">Jenis Kelamin</td>
                    <td colspan="4">: <?php echo $data['jenis_kelamin']?></td>
                    <td colspan="8">Umur : <?php echo $data['umur']?></td>
                </tr>
                <tr>
                    <td colspan="4">Parut BCG</td>
                    <td colspan="12">: <?php echo $data['parut_bcg']?></td>
                </tr>
                <tr>
                    <td colspan="6">Riwayat pengobatan sebelumnya </td>
                    <td colspan="10">: <?php echo $data['riwayat_pengobatan']?></td>
                </tr>
                <tr>
                    <td colspan="4">Catatan</td>
                    <td colspan="12">: <?php echo $data['catatan']?></td>
                </tr>
            </table>
        </td>
        <td>&nbsp;</td>
        <td colspan="16" valign="top">
            <table class="tbl" cellspacing="0" width="100%">
                <tr>
                    <td colspan="7">Nama Unit Pelayanan Kesehatan </td>
                    <td colspan="9">: <?php echo $data['nama_unit_kerja']?></td>
                </tr>
                <tr>
                    <td colspan="4">Bulan</td>
                    <td colspan="3">: May</td>
                    <td colspan="6">No. Reg. TB.03 UPK </td>
                    <td colspan="3">: <?php echo $data['reg_upk']?></td>
                </tr>
                <tr>
                    <td colspan="4">Tahun</td>
                    <td colspan="3">: 2013</td>
                    <td colspan="6">No. Reg. TB.03 Kab </td>
                    <td colspan="3">: <?php echo $data['reg_kab']?></td>
                </tr>
                <tr>
                    <td colspan="4">Tanggal Registrasi</td>
                    <td colspan="3">: <?php echo $data['tgl']?></td>
                    <td colspan="9"></td>
                </tr>
            </table>
            <br>
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td colspan="6" class="brt brl">Dirujuk oleh</td>
                    <td colspan="5" class="brt">Klasifikasi Pasien</td>
                    <td colspan="5" class="brt">Tipe Pasien</td>
                </tr>
                <tr align="left" class="brd">
                    <td colspan="6" class="brl"><?php echo $data['perujuk']?></td>
                    <td colspan="5"><?php echo $data['klasifikasi']?></td>
                    <td colspan="5"><?php echo $data['tipe_pasien']?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="16" valign="bottom">
            Pemeriksaan Kontak Serumah
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td class="brt brl">No.</td>
                    <td colspan="4" class="brt">Nama</td>
                    <td class="brt">L/P</td>
                    <td colspan="5" class="brt">Umur</td>
                    <td colspan="3" class="brt">Tanggal Pemeriksaan</td>
                    <td colspan="2" class="brt">Hasil</td>
                </tr>
                <?php $no=0;
                foreach ($data['kontak'] as $key => $val) {?>
                <tr align="center" class="brd">
                    <td class="brl"><?php echo (++$no)?></td>
                    <td colspan="4" align="left"><?php echo $val->nama?></td>
                    <td><?php echo $val->kelamin?></td>
                    <td colspan="5" align="left"><?php echo $val->tgl_lahir?></td>
                    <td colspan="3"><?php echo $val->tgl_periksa?></td>
                    <td colspan="2"><?php echo $val->hasil?></td>
                </tr>
                <?php }?>
            </table>
        </td>
        <td>&nbsp;</td>
        <td colspan="16" valign="bottom">
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td colspan="2" rowspan="2" class="brt brl">Bulan Ke</td>
                    <td colspan="12" class="brt">Hasil Pemeriksaan Dahak</td>
                    <td rowspan="2" class="brt">BB (kg)</td>
                </tr>
                <tr bgcolor="#999999" align="center" class="brd">
                    <td colspan="4">Tanggal</td>
                    <td colspan="4">No. Reg. Lab</td>
                    <td colspan="4">BTA*)</td>
                </tr>
                <?php foreach ($data['dahak'] as $key => $val) {?>
                <tr align="center" class="brd">
                    <td colspan="2" class="brl"><?php echo $val->bulan?></td>
                    <td colspan="4"><?php echo $val->tgl_pemeriksaan?></td>
                    <td colspan="4"><?php echo $val->no_reg?></td>
                    <td colspan="4" align="left"><?php echo $val->hasil_s1?> (S1)<br><?php echo $val->hasil_p?> (p)<br><?php echo $val->hasil_s2?> (S2)</td>
                    <td colspan="2"><?php echo $val->bb?></td>
                </tr>
                <?php }?>
            </table>
        </td>
    </tr>
    <tr><td colspan="33">&nbsp;</td></tr>
    <tr><td colspan="33">
        Jenis Obat : <?php echo $data['jenis_obat']?>
        <br>I. TAHAP INTENSIF : <?php echo $data['tahap_intensif']?>
        <table class="tbl" cellspacing="0" border="<?php echo ($mode=='excel')?'1':'0';?>">
            <tr bgcolor="#999999" align="center" class="brd">
                <td colspan="4" class="brt brl">4 KDT (FDC)</td>
                <td colspan="5" class="brt">Streptomicin</td>
                <td colspan="5" class="brt">Kotrimoksasol</td>
                <td colspan="3" class="brt">ARV</td>
            </tr>
            <?php foreach ($data['dosis'] as $key => $val) {?>
            <tr align="center" class="brd">
                <td colspan="4" class="brl"><?php echo $val->kdt?></td>
                <td colspan="5"><?php echo $val->streptomichin?></td>
                <td colspan="5"><?php echo $val->katriokmosasol?></td>
                <td colspan="3"><?php echo $val->arv?></td>
            </tr>
            <?php }?>
        </table>
    </td></tr>
    <tr><td colspan="33">&nbsp;</td></tr>
    <tr><td colspan="33">
        <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
            <tr bgcolor="#999999" align="center" class="brd">
                <td class="brt brl">Bulan</td>
                <?php for($i=1;$i<=31;$i++){echo '<td class="brt">'.$i.'</td>';}?>
                <td class="brt">Ket</td>
            </tr>
            <?php $bln=array('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des');
            $jadwal=array();
            foreach ($data['jadwal'] as $key => $val) {
                $ex=explode('-', $val->tgl);
                $jadwal[(int)$ex[1]][(int)$ex[0]]=true;
            }
            foreach ($bln as $key => $val) {?>
            <tr class="brd" align="center">
                <td class="brl" align="left"><?php echo $val?></td>
                <?php for($i=1;$i<=31;$i++){
                    echo '<td>'.(isset($jadwal[($key+1)][$i])?'&#x2713;':'&nbsp;').'</td>';
                }?>
                <td align="left">&nbsp;</td>
            </tr>
            <?php }?>
            <tr class="brd"><td colspan="33" class="brl">
                Berilah tanda "&#x2713;" jika pasien datang mengambil obat atau pengobatan dibawah pengawasan petugas kesehatan.
                <br>Berilah tanda "garis lurus menyambung" jika obat dibawa pulang dan ditelan sendiri dirumah
            </td></tr>
            <?php if($mode!='excel'){?><tr>
                <td width="50"></td>
                <?php for($i=1;$i<=31;$i++){echo '<td width="25"></td>';}?>
                <td width=""></td>
            </tr><?php }?>
        </table>
    </td></tr>
    <tr>
        <td width="70"></td>
        <?php for($i=1;$i<=31;$i++){echo '<td width="25"></td>';}?>
        <td width="55"></td>
    </tr>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>