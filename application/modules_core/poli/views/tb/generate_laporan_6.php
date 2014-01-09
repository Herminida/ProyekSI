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
<table class="tbl" cellspacing="0" width="1100" style="border:#333333 solid 1px;background:#ffffff" border="<?php echo ($mode=='excel')?'1':'0';?>">
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td width="193" rowspan="2">Tipe Pasien</td>
        <td width="137" rowspan="2">Jumlah Pasien yang terdaftar dan diobati</td>
        <td colspan="3">Pemeriksaan dahak pada akhir tahap intensif</td>
        <td colspan="3">Jumlah Pasien dalam tahap intensif</td>
        <td width="114" rowspan="2">Jumlah Pasien yg dievaluasi (3 s/d 8)</td>
    </tr>
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td width="171">JML Pasien Yang Mengalami Konversi<br>(BTA Negatif)</td>
        <td width="93">JML Pasien Yang Tidak Mengalami Konversi </td>
        <td width="100">Jumlah Pasien Yang Tidak Ada Hasil Pemeriksaan Dahak </td>
        <td width="90">Default</td>
        <td width="103">Pindah</td>
        <td width="107">Meninggal</td>
    </tr>
    <tr align="center" class="brd">
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
        <td>9</td>
    </tr>
    <tr align="center" class="brd">
        <td>Pasien Baru </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr align="center" class="brd">
        <td align="left">BTA Positif</td>
        <td>3</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td> P A S I E N &nbsp; P E N G O B A T A N &nbsp; U L A N G</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr align="center" class="brd">
        <td align="left">Kambuh</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr align="center" class="brd">
        <td align="left">Defaulter</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr align="center" class="brd">
        <td align="left">Gagal</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr align="center" class="brd">
        <td align="left">Kronik</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr align="center" class="brd">
        <td align="left">Lain-lain</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr align="center" class="brd">
        <td>Sub Total </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>