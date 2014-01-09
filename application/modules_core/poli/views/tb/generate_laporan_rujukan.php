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
        <td colspan="7" align="center"><h4>FORMULIR RUJUKAN / PINDAH PASIEN TB</h4></td>
    </tr>
    <tr>
        <td>Nama Instansi pengirim</td>
        <td colspan="3">: <?php echo $data['nama_unit_kerja']?></td>
        <td colspan="2">Telp. : </td>
    </tr>
    <tr>
        <td>Nama Instansi yang dituju</td>
        <td colspan="3">: <?php echo $data['nama_instansi']?></td>
        <td colspan="2">Umur : <?php echo $data['telp_instansi']?></td>
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
        <td>No. Reg. TB. Kab/ Kota</td>
        <td colspan="3">: <?php echo $kpp['reg_kab']?></td>
    </tr>
    <tr>
        <td>Tanggal mulai berobat</td>
        <td colspan="3">: <?php echo $kpp['tgl']?></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td colspan="2" valign="top">
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td colspan="2" class="brt brl">Jenis paduan OAT</td>
                </tr>
                <tr align="center" class="brd">
                    <td class="brl">Kategori 1</td>
                </tr>
            </table>
        </td>
        <td>&nbsp;</td>
        <td colspan="3" valign="top">
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td colspan="2" class="brt brl">Klasifikasi/Tipe pasien</td>
                </tr>
                <tr align="center" class="brd">
                    <td class="brl"><?php echo $kpp['klasifikasi'].'/'.$kpp['tipe_pasien'];?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td colspan="6"><br><strong>Jumlah dosis (obat) yang sudah diterima: <?php echo count($dosis)?></strong></td></tr>
    <tr>
        <td colspan="3">Tahap Intensif : <?php echo count($dosis)?> (dosis)</td>
        <td colspan="3">Tahap Lanjutan : 0 (dosis) </td>
    </tr>
    <tr><td colspan="6"><strong>Pemeriksaan ulang dahak terakhir</strong></td></tr>
    <tr>
        <td>Tanggal : <?php echo $hasil['tgl_pemeriksaan']?></td>
        <td colspan="2">Diagnosa : <?php echo $permohonan['diagnosa']?></td>
        <td colspan="3">Hasil : <?php echo $hasil['hasil_s1'].'(s1), '.$hasil['hasil_p'].' (p), '.$hasil['hasil_s2'].' (S2)'?></td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td colspan="2" align="center"><br>TARAKAN, <?php echo $data['tgl_rujukan']?>
            <br><br><br>(....................)<br>&nbsp;
        </td>
    </tr>
    <tr><td colspan="6" class="brt" align="center">UNTUK DIISI DAN DIKEMBALIKAN KE UNIT PENGIRIM<br>&nbsp;</td></tr>
    <tr>
        <td>Nama Pasien</td>
        <td colspan="3">: <?php echo $data['nama_anggota']?></td>
        <td colspan="2">No. Reg. TB. Kab/ Kota: <?php echo $kpp['reg_kab']?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td colspan="3">: <?php echo $kpp['jenis_kelamin']?></td>
        <td colspan="2">Umur: <?php echo $kpp['umur']?></td>
    </tr>
    <tr>
        <td>Tanggal Pasien Melapor</td>
        <td>: <?php echo $data['tgl_rujukan']?></td>
    </tr>
    <tr>
        <td colspan="4">Nama unit pelayanan kesehatan (tempat berobat baru) : <?php echo $data['nama_instansi']?></td>
        <td colspan="2">Telp: <?php echo $data['telp_instansi']?></td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td colspan="2" align="center"><br>TARAKAN, <?php echo $data['tgl_rujukan']?>
            <br><br><br>(....................)<br>&nbsp;
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