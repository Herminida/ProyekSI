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
        <td colspan="8" align="left"><h4 style="font-size: 14px;">PENANGGULANGAN TB NASIONAL</h4></td>
        <td align="center" bgcolor="#CCCCCC"><h4 style="font-size: 14px;"><?php echo $data[0]['no_rm_tb']?></h4></td>
    </tr>
    <tr>
        <td colspan="9" align="center"><h4>FORMULIR PENGIRIMAN SEDIAAN UNTUK CROSS CHECK</h4></td>
    </tr>
    <tr>
        <td colspan="3">Nama Lab. pemeriksa pertama</td>
        <td colspan="2">: <?php echo $data[0]['yankes_nama']?></td>
        <td colspan="4">Nama Lab. yg melakukan cross check</td>
    </tr>
    <tr>
        <td colspan="3">Nama petugas Lab. pemeriksa pertama</td>
        <td colspan="2">: <?php echo $data[0]['petugas_kab_nama']?></td>
        <td colspan="4">Tgl. Sediaan cross check diterima : <?php echo $data[0]['tgl_terima']?></td>
    </tr>
    <tr>
        <td colspan="3">Tgl. sediaan diambil</td>
        <td colspan="2">: <?php echo $data[0]['tgl_pemeriksaan']?></td>
        <td colspan="4">Tgl. Sediaan cross check dikirim : <?php echo $data[0]['tgl_kirim']?></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td colspan="9" valign="top">
            <table class="tbl" cellspacing="0" width="100%" border="<?php echo ($mode=='excel')?'1':'0';?>">
                <tr bgcolor="#999999" align="center" class="brd">
                    <td rowspan="2" class="brt brl">No.</td>
                    <td rowspan="2" class="brt">No. Reg. Lab.</td>
                    <td rowspan="2" class="brt">No. Identitas Sediaan</td>
                    <td colspan="2" class="brt">Hasil Pemeriksaan Lab. Pertama</td>
                    <td colspan="2" class="brt">Hasil Pemeriksaan Lab. yang melakukan Cross Check</td>
                    <td class="brt">Kualitas Sediaan*)</td>
                    <td class="brt">Kualitas Pewarnaan*)</td>
                </tr>
                <tr bgcolor="#999999" align="center" class="brd">
                    <td class="brl">Tgl.</td><td>Hasil</td>
                    <td>Tgl.</td><td>Hasil</td>
                    <td>B/J</td><td>B/J</td>
                </tr>
                <?php foreach ($data as $key => $val) {?>
                <tr align="center" class="brd">
                    <td class="brl"><?php echo ($key+1)?></td>
                    <td><?php echo $val['register']?></td>
                    <td><?php echo $val['reg_upk'].'/'.$val['register'].' '.$val['diagnosa']?></td>
                    <td><?php echo $val['tgl_pemeriksaan']?></td>
                    <td><?php echo $val['hasil_s1'].'(s1), '.$val['hasil_p'].' (p), '.$val['hasil_s2'].' (S2)'?></td>
                    <td><?php echo $val['tgl_kroscek']?></td>
                    <td><?php echo $val['kroscek_hasil_s1'].'(s1), '.$val['kroscek_hasil_p'].' (p), '.$val['kroscek_hasil_s2'].' (S2)'?></td>
                    <td><?php echo $val['kualitas_sediaan']?></td>
                    <td><?php echo $val['kualitas_pewarnaan']?></td>
                </tr>
                <?php }?>
            </table>
        </td>
    </tr>
    <tr><td colspan="9">&nbsp;</td></tr>
    <tr>
        <td colspan="3" align="center"><br>Petugas Kab/Kota yg mengambil sediaan: 
            <br><br><br>(<?php echo $data[0]['petugas_kab_nama']?>)
            <br>Nip. <?php echo $data[0]['petugas_kab_nip']?><br><br>&nbsp;
        </td>
        <td colspan="3">&nbsp;</td>
        <td colspan="3" align="center"><br> Petugas yg melakukan cross check: 
            <br><br><br>(<?php echo $data[0]['petugas_kroscek_nama']?>)
            <br>Nip. <?php echo $data[0]['petugas_kroscek_nip']?><br><br>&nbsp;
        </td>
    </tr>
    <tr>
        <td width="50"></td>
        <td width="100"></td>
        <td width="200"></td>
        <td width="100"></td>
        <td width="200"></td>
        <td width="100"></td>
        <td width="200"></td>
        <td width="100"></td>
        <td width="100"></td>
    </tr>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>