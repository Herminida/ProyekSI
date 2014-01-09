<div class="preview-frame">
    <table class="preview" width="1194" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr  bgcolor="#CCCCCC">
            <td width="75" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>No</strong></div></td>
            <td width="104" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>TGL</strong></div></td>
            <td width="204" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Kelurahan</strong></div></td>
            <td colspan="5" bgcolor="#CCCCCC"><div align="center"><strong>JUMLAH SASARAN</strong></div></td>
            <td colspan="3" bgcolor="#999999"><div align="center"><strong>Dapat Vit A </strong></div></td>
            <td colspan="2" bgcolor="#999999"><div align="center"><strong>BUMIL Dapat FE</strong></div></td>
            <td colspan="2" bgcolor="#999999"><div align="center"><strong>PENGUKURAN LILA</strong></div></td>
            <td colspan="2" bgcolor="#999999"><div align="center"><strong>LILA &lt;23.5 cm</strong></div></td>
        </tr>
        <tr  bgcolor="#CCCCCC">
            <td width="119" bgcolor="#CCCCCC"><div align="center"><strong>BY (6-11bl)</strong></div></td>
            <td width="119" bgcolor="#CCCCCC"><div align="center"><strong>BLT (12-60bl)</strong></div></td>
            <td width="119" bgcolor="#CCCCCC"><div align="center"><strong>BUFAS</strong></div></td>
            <td width="119" bgcolor="#CCCCCC"><div align="center"><strong>BUMIL</strong></div></td>
            <td width="119" bgcolor="#CCCCCC"><div align="center"><strong>WUS</strong></div></td>
            <td width="119" bgcolor="#999999"><div align="center"><strong>BY (6-11bl)</strong></div></td>
            <td width="119" bgcolor="#999999"><div align="center"><strong>BLT (12-60bl)</strong></div></td>
            <td width="119" bgcolor="#999999"><div align="center"><strong>BUFAS</strong></div></td>
            <td width="178" bgcolor="#999999"><div align="center"><strong>FE I</strong></div></td>
            <td width="178" bgcolor="#999999"><div align="center"><strong>Fe III</strong></div></td>
            <td width="178" bgcolor="#999999"><div align="center"><strong>BUMIL</strong></div></td>
            <td width="178" bgcolor="#999999"><div align="center"><strong>WUS</strong></div></td>
            <td width="178" bgcolor="#999999"><div align="center"><strong>BUMIL</strong></div></td>
            <td width="178" bgcolor="#999999"><div align="center"><strong>WUS</strong></div></td>
        </tr>
        <?php
        $jml = 0;
        $i = 1;
        foreach ($list as $record):
            ?>
            <tr  >
                <td align="center"><?php echo $i; ?>&nbsp;</td>
                <td align="center"><?php echo $record['tgl']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['nama_kelurahan']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['sasaran_by']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['sasaran_blt']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['sasaran_bufas']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['sasaran_bumil']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['sasaran_wus']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['vit_by']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['vit_blt']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['vit_bufas']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['fe1_bumil']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['fe3_bumil']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['ukur_lila_bumil']; ?>&nbsp;</td>
                <td >&nbsp;</td>
                <td align="center"><?php echo $record['kurang_lila_bumil']; ?>&nbsp;</td>
                <td >&nbsp;</td>
            </tr>
            <?php $i++;
        endforeach; ?>
    </table>
</div>