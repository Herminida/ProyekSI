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
<table class="tbl" cellspacing="0" width="1800" style="border:#333333 solid 1px;background:#ffffff" border="<?php echo ($mode=='excel')?'1':'0';?>">
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td rowspan="2">No</td>
        <td rowspan="2">Tanggal Didaftar</td>
        <td rowspan="2">No. Identitas Sediaan Dahak</td>
        <td rowspan="2">Nama Lengkap Suspek</td>
        <td colspan="2">Umur (tahun)</td>
        <td rowspan="2">Alamat Lengkap</td>
        <td colspan="3">Tanggal Pengambilan Dahak</td>
        <td rowspan="2">Tanggal Pengiriman Sediaan Dahak  ke Lab</td>
        <td rowspan="2">Tanggal Hasil Diperoleh</td>
        <td colspan="3">Hasil Pemeriksaan</td>
        <td rowspan="2">No. Reg Lab</td>
        <td rowspan="2">Bila di-diagnosis TB, Tulis Tanggal Pembuatan Kartu TB01 </td>
        <td rowspan="2">No. Reg ART</td>
        <td rowspan="2">Status HIV </td>
        <td rowspan="2">Keterangan</td>
    </tr>
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td>L</td>
        <td>P</td>
        <td>A</td>
        <td>B</td>
        <td>C</td>
        <td>A</td>
        <td>B</td>
        <td>C</td>
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
        <td>10</td>
        <td>11</td>
        <td>12</td>
        <td>13</td>
        <td>14</td>
        <td>15</td>
        <td>16</td>
        <td>17</td>
        <td>18</td>
        <td>19</td>
        <td>20</td>
    </tr>
    <?php $i=0;
    foreach ($data as $key => $val) {?>
    <tr valign="top" class="brd">
            <td><?php echo (++$i)?></td>
            <td><?php echo $val->tgl_pemeriksaan?></td>
            <td><?php echo $val->no_identitas_sedian?></td>
            <td><?php echo $val->nama_anggota?></td>
            <td><?php echo ($val->sex=='Laki-laki')?$val->umur:''?></td>
            <td><?php echo ($val->sex!='Laki-laki')?$val->umur:''?></td>
            <td><?php echo $val->alamat?></td>
            <td><?php echo $val->tgl_pemeriksaan?></td>
            <td><?php echo $val->tgl_pemeriksaan?></td>
            <td><?php echo $val->tgl_pemeriksaan?></td>
            <td><?php echo $val->tgl_pemeriksaan?></td>
            <td align="center"><?php echo $val->hasil_s1?></td>
            <td align="center"><?php echo $val->hasil_p?></td>
            <td align="center"><?php echo $val->hasil_s2?></td>
            <td><?php echo $val->register?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><?php echo $val->ket_hasil_lab?></td>
        </tr>
    <?php }?>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>