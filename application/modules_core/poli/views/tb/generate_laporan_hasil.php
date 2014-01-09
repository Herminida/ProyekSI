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
        <td colspan="5" align="left"><h4 style="font-size: 14px;">PENANGGULANGAN TB NASIONAL</h4></td>
        <td align="center" bgcolor="#CCCCCC"><h4 style="font-size: 14px;"><?php echo $data['no_rm_tb']?></h4></td>
    </tr>
    <tr>
        <td colspan="7" align="center"><h4>FORMULIR HASIL AKHIR PENGOBATAN PASIEN TB PINDAHAN</h4></td>
    </tr>
    <tr>
        <td>Nama Pasien</td>
        <td colspan="3">: <?php echo $kpp['nama_anggota']?></td>
    </tr>
    <tr>
        <td>Jenis KElamin</td>
        <td colspan="3">: <?php echo $kpp['jenis_kelamin']?></td>
        <td colspan="2">Umur : <?php echo $kpp['umur']?></td>
    </tr>
    <tr>
        <td>Alamat Lengkap</td>
        <td colspan="5">: <?php echo $kpp['alamat'].', '.$kpp['nama_kelurahan'].', '.$kpp['nama_kecamatan']?></td>
    </tr>
    <tr>
        <td colspan="6">No. Reg. TB. Kab/ Kota asal pasien : <?php echo $kpp['reg_kab']?>
            <br>Tanggal mulai berobat di tempat asal : <?php echo $kpp['tgl']?>
        </td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td colspan="2" valign="top">
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td colspan="2" class="brt brl">Jenis paduan OAT</td>
                </tr>
                <tr align="center" class="brd">
                    <td class="brl">Kategori 2</td>
                </tr>
            </table>
        </td>
        <td>&nbsp;</td>
        <td colspan="3" valign="top">
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td colspan="2" class="brt brl">Hasil Akhir Pengobatan</td>
                </tr>
                <tr align="center" class="brd">
                    <td class="brl"><?php echo $data['hasil_s1'].'(s1), '.$data['hasil_p'].' (p), '.$data['hasil_s2'].' (S2)'?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td colspan="6"><br><strong>Keterangan :</strong> <?php echo $data['ket_hasil_lab']?></td></tr>
    <tr>
        <td colspan="4"></td>
        <td colspan="2" align="center"><br>TARAKAN, <?php echo $data['tgl_pemeriksaan']?>
            <br><br><br>(....................)<br><br>&nbsp;
        </td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="4">
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr align="left" class="brd">
                    <td colspan="4" class="brl brt">
                        Kepada YTH
                        <br><br>di
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="170"></td>
        <td width=""></td>
        <td width="20"></td>
        <td width="110"></td>
        <td width="160"></td>
        <td width="100"></td>
    </tr>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>