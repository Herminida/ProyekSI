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
       <td align="center"><?php echo jml_pasien_baru_triwulan_positif(66, 1000, 'l',$tgl_awal,$tgl_akhir, 1); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_triwulan_positif(66, 1000, 'p',$tgl_awal,$tgl_akhir, 1); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_triwulan_positif(66, 1000, 'p',$tgl_awal,$tgl_akhir, 1) + jml_pasien_baru_triwulan_positif(66, 1000, 'l',$tgl_awal,$tgl_akhir, 1); ?></td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,'Sembuh'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,'Pengobatan Lengkap'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,'Putus Berobat'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,'Gagal'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,'Pindah'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,'Meninggal'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir); ?>&nbsp;</td>
    </tr>
    <tr align="center" class="brd">
        <td>BTA Neg/ Ro. Pos</td>
        <td align="center"><?php echo jml_pasien_baru_triwulan_negatif(66, 1000, 'l',$tgl_awal,$tgl_akhir, 1); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_triwulan_negatif(66, 1000, 'p',$tgl_awal,$tgl_akhir, 1); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_triwulan_negatif(66, 1000, 'l',$tgl_awal,$tgl_akhir, 1) + jml_pasien_baru_triwulan_negatif(66, 1000, 'p',$tgl_awal,$tgl_akhir, 1); ?></td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,'Sembuh'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,'Pengobatan Lengkap'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,'Putus Berobat'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,'Gagal'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,'Pindah'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,'Meninggal'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir); ?>&nbsp;</td>
    </tr>
    <tr align="center" class="brd">
        <td>Extra Paru</td>
       <td align="center"><?php echo jml_pasien_baru_triwulan_extra(66, 1000, 'l',$tgl_awal,$tgl_akhir, 1); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_triwulan_extra(66, 1000, 'p',$tgl_awal,$tgl_akhir, 1); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_triwulan_extra(66, 1000, 'p',$tgl_awal,$tgl_akhir, 1) + jml_pasien_baru_triwulan_extra(66, 1000, 'l',$tgl_awal,$tgl_akhir, 1); ?></td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,'Sembuh'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,'Pengobatan Lengkap'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,'Putus Berobat'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,'Gagal'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,'Pindah'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,'Meninggal'); ?>&nbsp;</td>
                <td align="center"><?php echo jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir); ?>&nbsp;</td>
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
    <?php
            $sub_total = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
            $tipe_pasien = array('Kambuh', 'Default', 'Gagal', 'Kronik', 'Lain-lain');
            for ($i = 0; $i < count($tipe_pasien); $i++) {
                ?>
                <tr>
                    <td><?php echo $tipe_pasien[$i]; ?></td>
                    <td align="center"><?php $sub_total[0]+=jml_pasien_ulang_hasil_pengobatan($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'l');
        echo jml_pasien_ulang_hasil_pengobatan($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'l'); ?>&nbsp;</td>
                    <td align="center"><?php $sub_total[1]+=jml_pasien_ulang_hasil_pengobatan($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'p');
                echo jml_pasien_ulang_hasil_pengobatan($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'p'); ?>&nbsp;</td>
                    <td align="center"><?php $sub_total[2]+=jml_pasien_ulang_hasil_pengobatan($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'l') + jml_pasien_ulang_hasil_pengobatan($tgl_awal,$tgl_akhir,'Kambuh', 'p');
                echo jml_pasien_ulang_hasil_pengobatan($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'l') + jml_pasien_ulang_hasil_pengobatan($tgl_awal,$tgl_akhir,'Kambuh', 'p'); ?>&nbsp;</td>
                    <td align="center"><?php $sub_total[3]+=jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'Sembuh');
                echo jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'Sembuh'); ?>&nbsp;</td>
                    <td align="center"><?php $sub_total[4]+=jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'Pengobatan Lengkap');
                echo jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'Pengobatan Lengkap'); ?>&nbsp;</td>

                    <td align="center"><?php $sub_total[5]+=jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'Putus Berobat');
                echo jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'Putus Berobat'); ?>&nbsp;</td>
                    <td align="center"><?php $sub_total[6]+=jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'Gagal');
                echo jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'Gagal'); ?>&nbsp;</td>
                    <td align="center"><?php $sub_total[7]+=jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'Pindah');
                echo jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'Pindah'); ?>&nbsp;</td>
                    <td align="center"><?php $sub_total[8]+=jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'Meninggal');
                echo jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i], 'Meninggal'); ?>&nbsp;</td>
                    <td align="center"><?php $sub_total[9]+=jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i]);
                echo jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe_pasien[$i]); ?>&nbsp;</td>
                </tr>
                <?
            }
            ?>
            <tr class="bold">
                <td><div align="center">Sub Total </div></td>
                <td align="center"><?= $sub_total[0] ?>&nbsp;</td>
                <td align="center"><?= $sub_total[1] ?>&nbsp;</td>
                <td align="center"><?= $sub_total[2] ?>&nbsp;</td>
                <td align="center"><?= $sub_total[3] ?>&nbsp;</td>
                <td align="center"><?= $sub_total[4] ?>&nbsp;</td>
                <td align="center"><?= $sub_total[5] ?>&nbsp;</td>
                <td align="center"><?= $sub_total[6] ?>&nbsp;</td>
                <td align="center"><?= $sub_total[7] ?>&nbsp;</td>
                <td align="center"><?= $sub_total[8] ?>&nbsp;</td>
                <td align="center"><?= $sub_total[9] ?>&nbsp;</td>
            </tr>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>