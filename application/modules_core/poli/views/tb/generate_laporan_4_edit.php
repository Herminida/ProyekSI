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
        <td width="300" rowspan="3">Tipe Pasien</td>
        <td colspan="4">Anak</td>
        <td colspan="12"></td>
        <td colspan="3">TOTAL</td>
    </tr>
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td colspan="2">0 - 4</td>
        <td colspan="2">5 - 14</td>
        <td colspan="2">15 - 24</td>
        <td colspan="2">25 - 34</td>
        <td colspan="2">35 - 44</td>
        <td colspan="2">45 - 54</td>
        <td colspan="2">55 - 65</td>
        <td colspan="2">&gt; 65</td>
        <td rowspan="2">L</td>
        <td rowspan="2">P</td>
        <td rowspan="2">T</td>
    </tr>
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td>L</td>
        <td>P</td>
        <td>L</td>
        <td>P</td>
        <td>L</td>
        <td>P</td>
        <td>L</td>
        <td>P</td>
        <td>L</td>
        <td>P</td>
        <td>L</td>
        <td>P</td>
        <td>L</td>
        <td>P</td>
        <td>L</td>
        <td>P</td>
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
    <tr bgcolor="#CCCCCC" align="center" class="brd">
        <td>Pasien Baru </td>
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
        <td align="left">BTA Positif</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(0, 4, 'l',$dari,$sampai); ?></td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(0, 4, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(5, 14, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(5, 14, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(15, 24, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(15, 24, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(25, 34, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(25, 34, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(35, 44, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(35, 44, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(45, 54, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(45, 54, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(55, 65, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(55, 65, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(66, 1000, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(66, 1000, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(66, 1000, 'l',$dari,$sampai,1); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(66, 1000, 'p',$dari,$sampai, 1); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_positif(66, 1000, 'p',$dari,$sampai, 1) + jml_pasien_baru_triwulan_positif(66, 1000, 'l',$dari,$sampai, 1); ?></td>
    </tr>
    <tr align="center" class="brd">
        <td align="left">BTA Neg/ Ro. Pos</td>
        <td><?php echo jml_pasien_baru_triwulan_negatif(0, 4, 'l',$dari,$sampai); ?></td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(0, 4, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(5, 14, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(5, 14, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(15, 24, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(15, 24, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(25, 34, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(25, 34, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(35, 44, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(35, 44, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(45, 54, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(45, 54, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(55, 65, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(55, 65, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(66, 1000, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(66, 1000, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(66, 1000, 'l',$dari,$sampai,1); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(66, 1000, 'p',$dari,$sampai, 1); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_negatif(66, 1000, 'p',$dari,$sampai, 1) + jml_pasien_baru_triwulan_negatif(66, 1000, 'l',$dari,$sampai, 1); ?></td>
    </tr>
    <tr align="center" class="brd">
        <td align="left">Extra Paru</td>
       <td><?php echo jml_pasien_baru_triwulan_extra(0, 4, 'l',$dari,$sampai); ?></td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(0, 4, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(5, 14, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(5, 14, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(15, 24, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(15, 24, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(25, 34, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(25, 34, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(35, 44, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(35, 44, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(45, 54, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(45, 54, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(55, 65, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(55, 65, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(66, 1000, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(66, 1000, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(66, 1000, 'l',$dari,$sampai,1); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(66, 1000, 'p',$dari,$sampai, 1); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan_extra(66, 1000, 'p',$dari,$sampai, 1) + jml_pasien_baru_triwulan_extra(66, 1000, 'l',$dari,$sampai, 1); ?></td>
    </tr>
    <tr align="center" class="brd">
        <td>Sub Total </td>
        <td><?php echo jml_pasien_baru_triwulan(0, 4, 'l',$dari,$sampai); ?></td>
        <td ><?php echo jml_pasien_baru_triwulan(0, 4, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(5, 14, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(5, 14, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(15, 24, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(15, 24, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(25, 34, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(25, 34, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(35, 44, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(35, 44, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(45, 54, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(45, 54, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(55, 65, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(55, 65, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(66, 1000, 'l',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(66, 1000, 'p',$dari,$sampai); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(66, 1000, 'l',$dari,$sampai,1); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(66, 1000, 'p',$dari,$sampai, 1); ?>&nbsp;</td>
        <td ><?php echo jml_pasien_baru_triwulan(66, 1000, 'p',$dari,$sampai, 1) + jml_pasien_baru_triwulan(66, 1000, 'l',$dari,$sampai, 1); ?></td>
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
        <td></td>
    </tr>
     <?php
            $sub_total = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
            $tipe_pasien = array('Kambuh', 'Default', 'Gagal', 'Kronik', 'Lain-lain');
            for ($i = 0; $i < count($tipe_pasien); $i++) {
                ?>
                <tr>
                    <td><?= $tipe_pasien[$i] ?></td>
                    <td align="center">
                        <?php
                        $sub_total[0]+=jml_pasien_ulang($tipe_pasien[$i], 0, 4, 'l',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 0, 4, 'l',$dari,$sampai);
                        ?>&nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[1]+=jml_pasien_ulang($tipe_pasien[$i], 0, 4, 'p',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 0, 4, 'p',$dari,$sampai);
                        ?>&nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[2]+=jml_pasien_ulang($tipe_pasien[$i], 5, 14, 'l',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 5, 14, 'l',$dari,$sampai);
                        ?>&nbsp;</td>
                    <td align="center">
                        <?php $sub_total[3]+=jml_pasien_ulang($tipe_pasien[$i], 5, 14, 'p',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 5, 14, 'p',$dari,$sampai); ?>
                        &nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[4]+=jml_pasien_ulang($tipe_pasien[$i], 15, 24, 'l',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 15, 24, 'l',$dari,$sampai);
                        ?>
                        &nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[5]+=jml_pasien_ulang($tipe_pasien[$i], 15, 24, 'p',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 15, 24, 'p',$dari,$sampai);
                        ?>
                        &nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[6]+=jml_pasien_ulang($tipe_pasien[$i], 25, 34, 'l',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 25, 34, 'l',$dari,$sampai);
                        ?>
                        &nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[7]+=jml_pasien_ulang($tipe_pasien[$i], 25, 34, 'p',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 25, 34, 'p',$dari,$sampai);
                        ?>
                        &nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[8]+=jml_pasien_ulang($tipe_pasien[$i], 35, 44, 'l',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 35, 44, 'l',$dari,$sampai);
                        ?>&nbsp;</td>
                    <td align="center"><?php
                $sub_total[9]+=jml_pasien_ulang($tipe_pasien[$i], 35, 44, 'p',$dari,$sampai);
                echo jml_pasien_ulang($tipe_pasien[$i], 35, 44, 'p',$dari,$sampai);
                        ?>&nbsp;</td>
                    <td align="center"><?php $sub_total[10]+=jml_pasien_ulang($tipe_pasien[$i], 45, 54, 'l',$dari,$sampai);
                echo jml_pasien_ulang($tipe_pasien[$i], 45, 54, 'l',$dari,$sampai); ?>&nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[11]+=jml_pasien_ulang($tipe_pasien[$i], 45, 54, 'p',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 45, 54, 'p',$dari,$sampai);
                        ?>&nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[12]+=jml_pasien_ulang($tipe_pasien[$i], 55, 65, 'l',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 55, 65, 'l',$dari,$sampai);
                        ?>&nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[13]+=jml_pasien_ulang($tipe_pasien[$i], 55, 65, 'p',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 55, 65, 'p',$dari,$sampai);
                        ?>&nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[14]+=jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'l',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'l',$dari,$sampai);
                        ?>&nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[15]+=jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'p',$dari,$sampai);
                        echo jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'p',$dari,$sampai);
                        ?>&nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[16]+=jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'l',$dari,$sampai, 1);
                        echo jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'l',$dari,$sampai, 1);
                        ?>&nbsp;</td>
                    <td align="center">
                        <?php
                        $sub_total[17]+=jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'p',$dari,$sampai, 1);
                        echo jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'p',$dari,$sampai, 1);
                        ?>&nbsp;</td>
                    <td align="center"><?php
                $sub_total[18]+=jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'p',$dari,$sampai, 1) + jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'l',$dari,$sampai, 1);
                echo jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'p',$dari,$sampai, 1) + jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'l',$dari,$sampai, 1);
                        ?></td>
                </tr>
                <?
            }
            ?>

            <tr>
                <td><div align="center">Sub Total </div></td>
                <td align="center"><?php echo $sub_total[0]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[1]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[2]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[3]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[4]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[5]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[6]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[7]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[8]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[9]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[10]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[11]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[12]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[13]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[14]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[15]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[16]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[17]; ?>&nbsp;</td>
                <td align="center"><?php echo $sub_total[18]; ?>&nbsp;</td>
            </tr>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>