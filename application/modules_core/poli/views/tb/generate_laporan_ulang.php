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
        <td rowspan="2">No.</td>
        <td rowspan="2">No. Reg. Lab.</td>
        <td rowspan="2">No. Identitas Sediaan</td>
        <td rowspan="2">Nama Penderita </td>
        <td colspan="2">Hasil Pemeriksaan Lab. Pertama</td>
        <td colspan="2">Hasil Pemeriksaan Lab. yang melakukan Cross Check</td>
        <td>Kualitas Sediaan*)</td>
        <td>Kualitas Pewarnaan*)</td>
        <td rowspan="2">Keterangan</td>
    </tr>
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td>Tgl.</td>
        <td>Hasil</td>
        <td>Tgl.</td>
        <td>Hasil</td>
        <td>B/J</td>
        <td>B/J</td>
    </tr>
    <?php $i=0;
    foreach ($data as $key => $val) {?>
    <tr align="center" class="brd">
        <td><?php echo (++$i)?></td>
        <td><?php echo $val->register?></td>
        <td><?php echo $val->no_identitas_sedian?></td>
        <td><?php echo $val->nama_anggota?></td>
        <td><?php echo $val->tgl_pemeriksaan?></td>
        <td><?php echo $val->hasil_s1.' '.$val->hasil_p.' '.$val->hasil_s2?></td>
        <td><?php echo $val->tgl_kroscek?></td>
        <td><?php echo $val->kroscek_hasil_s1.' '.$val->kroscek_hasil_p.' '.$val->kroscek_hasil_s2?></td>
        <td><?php echo $val->kualitas_sediaan?></td>
        <td><?php echo $val->kualitas_pewarnaan?></td>
        <td></td>
    </tr>
    <?php }?>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>