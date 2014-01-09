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
        <td rowspan="2" width="210">Tipe Pasien</td>
        <td colspan="3">Jumlah pasien TB yang terdaftar dalam triwulan tersebut untuk diobati</td>
        <td rowspan="2">Sembuh (BTA negatif)</td>
        <td rowspan="2">Pengobatan Lengkap (tidak ada hasil BTA)</td>
        <td rowspan="2">Default</td>
        <td rowspan="2">Gagal</td>
        <td rowspan="2">Pindah</td>
        <td rowspan="2">Meninggal</td>
        <td rowspan="2">Jumlah pasien yang dievaluasi    (5 /d 10)</td>
    </tr>
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td>L</td>
        <td>P</td>
        <td>Total</td>
    </tr>
    <tr align="center" class="brd">
        <td>1</div></td>
        <td>2</div></td>
        <td>3</div></td>
        <td>4</div></td>
        <td>5</div></td>
        <td>6</div></td>
        <td>7</div></td>
        <td>8</div></td>
        <td>9</div></td>
        <td>10</div></td>
        <td>11</div></td>
    </tr>
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td>Pasien Baru</td>
        <td></td>
        <td></td>
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
        <td>BTA Positif</td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>3</td>
    </tr>
    <tr align="center" class="brd">
        <td>BTA Neg/ Ro. Pos</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
    </tr>
    <tr align="center" class="brd">
        <td>Extra Paru</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
    </tr>
    <tr align="center" class="brd">
        <td>Sub Total</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td>P A S I E N &nbsp; P E N G O B A T A N &nbsp; U L A N G</td>
        <td></td>
        <td></td>
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
        <td>Kambuh</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
    </tr>
    <tr align="center" class="brd">
        <td>Default</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
    </tr>
    <tr align="center" class="brd">
        <td>Gagal</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
    </tr>
    <tr align="center" class="brd">
        <td>Kronik</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
    </tr>
    <tr align="center" class="brd">
        <td>Lain-lain</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
    </tr>
    <tr align="center" class="brd">
        <td>Sub Total</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
    </tr>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>