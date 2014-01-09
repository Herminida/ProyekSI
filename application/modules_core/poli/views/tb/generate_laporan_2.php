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
<table class="tbl" cellspacing="0" width="100%" style="border:#333333 solid 1px;background:#ffffff" border="<?php echo ($mode=='excel')?'1':'0';?>">
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td rowspan="2">No Reg Lab </td>
        <td rowspan="2">No Identitas Sediaan </td>
        <td rowspan="2">Tanggal Sediaan diterima</td>
        <td rowspan="2">Tanggal Pemeriksaan</td>
        <td rowspan="2">Nama Lengkap Pasien</td>
        <td colspan="2">Umur</td>
        <td rowspan="2">Alamat Lengkap</td>
        <td rowspan="2">Nama Unit Pelayanan Kesehatan</td>
        <td colspan="2">Alasan Pemeriksaan </td>
        <td colspan="3">Hasil Pemeriksaan </td>
        <td>Tanda Tangan</td>
        <td>Ket</td>
    </tr>
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td>L</td>
        <td>P</td>
        <td>Untuk Diagnosis</td>
        <td>Untuk Tindak Lanjut</td>
        <td>S1</td>
        <td>P</td>
        <td>S2</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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
        <td>12</div></td>
        <td>13</div></td>
        <td>14</div></td>
        <td>15</div></td>
        <td>16</div></td>
    </tr>
    <?php foreach ($data as $key => $val) {?>
    <tr valign="top" class="brd">
            <td><?php echo $val->register?></td>
            <td><?php echo $val->no_identitas_sedian?></td>
            <td><?php echo $val->tgl_pemeriksaan?></td>
            <td><?php echo $val->tgl_pemeriksaan?></td>
            <td><?php echo $val->nama_anggota?></td>
            <td><?php echo ($val->sex=='Laki-laki')?$val->umur:''?></td>
            <td><?php echo ($val->sex!='Laki-laki')?$val->umur:''?></td>
            <td><?php echo $val->alamat?></td>
            <td><?php echo $val->nama_unit_kerja?></td>
            <td align="center"><?php echo ($val->tipe_diagnosa=='abc')?$val->diagnosa:''?></td>
            <td align="center"><?php echo ($val->tipe_diagnosa!='abc')?$val->diagnosa:''?></td>
            <td align="center"><?php echo $val->hasil_s1?></td>
            <td align="center"><?php echo $val->hasil_p?></td>
            <td align="center"><?php echo $val->hasil_s2?></td>
            <td>&nbsp;</td>
            <td><?php echo $val->ket_hasil_lab?></td>
        </tr>
    <?php }?>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>