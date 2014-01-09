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
<table class="tbl" cellspacing="0" width="2000" style="border:#333333 solid 1px;background:#ffffff" border="<?php echo ($mode=='excel')?'1':'0';?>">
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td rowspan="3">Tgl<br>Registrasi</td>
        <td rowspan="3">No.<br>Registrasi TB<br>Kab/Kota</td>
        <td rowspan="3">Nama Lengkap Pasien</strong></div></td>
        <td rowspan="3">Jenis<br>Kelamin<br>(L/P)</td>
        <td rowspan="3">Umur<br>(Thn)</td>
        <td rowspan="3">Alamat Lengkap (desa)</td>
        <td rowspan="3">Nama Unit Pelayanan Kesehatan (UPK)</td>
        <td rowspan="3">Dirujuk oleh</td>
        <td rowspan="3">Tgl<br>mulai<br>Pengobatan</td>
        <td rowspan="3">PMO</td>
        <td rowspan="3">Paduan<br>OAT yg<br>diberikan</td>
        <td rowspan="3">Klasifikasi (Paru/<br>Ekstra<br>Paru)</td>
        <td rowspan="3">Tipe Pasien</td>
        <td colspan="11">Pemeriksaan Laboratorium</td>
        <td colspan="6">Layanan Konseling dan Test Sukarela</td>
        <td colspan="4">Layanan PDP</td>
        <td rowspan="3">Ket</td>
    </tr>
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td colspan="3">Sebelum Pengobatan</td>
        <td colspan="2">Akhir bln ke 2</td>
        <td colspan="2">Akhir Sisipan</td>
        <td colspan="2">Akhir bln ke 5/7</td>
        <td colspan="2">Akhir Pengobatan</td>
        <td rowspan="2">Tanggal dianjurkan VCT</td>
        <td rowspan="2">Tanggal Pre Test Konseling</td>
        <td rowspan="2">Tempat Tes</td>
        <td rowspan="2">Tanggal Tes</td>
        <td rowspan="2">Hasil Tes</td>
        <td rowspan="2">Tanggal Post Test Konseling</td>
        <td rowspan="2">No. Reg Pra ART</td>
        <td rowspan="2">Tanggal Rujukan ke Layanan PDP</td>
        <td rowspan="2">Tanggal Mulai Layanan ART</td>
        <td rowspan="2">PPK</td>
    </tr>
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td>Tgl/No<br>Reg Lab</td>
        <td>Hasil<br>Dahak</td>
        <td>Hasil/Tgl<br>Foto thoraks</td>
        <td>Tgl/No<br>Reg Lab</td>
        <td>Hasil<br>Dahak</td>
        <td>Tgl/No<br>Reg Lab</td>
        <td>Hasil<br>Dahak</td>
        <td>Tgl/No<br>Reg Lab</td>
        <td>Hasil<br>Dahak</td>
        <td>Tgl/No<br>Reg Lab</td>
        <td>Hasil<br>Dahak</td>
    </tr>
    <?php foreach ($data as $key => $val) {?>
    <tr valign="top" class="brd">
        <td align="center"><?php echo $val->tgl?></td>
        <td align="center"><?php echo $val->reg_kab?></td>
        <td align="left"><?php echo $val->nama_anggota?></td>
        <td align="center"><?php echo $val->sex?></td>
        <td align="center"><?php echo $val->umur?></td>
        <td align="left"><?php echo $val->alamat.', '.$val->nama_kelurahan.', '.$val->nama_kecamatan?></td>
        <td align="left"><?php echo $val->nama_unit_kerja?></td>
        <td><?php echo $val->perujuk?></td>
        <td align="center"><?php echo $val->tgl?></td>
        <td align="left"><?php echo $val->nama_pmo?></td>
        <td align="center"><?php echo $val->jenis_obat?></td>
        <td align="center"><?php echo $val->klasifikasi?></td>
        <td align="center"><?php echo $val->tipe_pasien?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <?php }?>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>