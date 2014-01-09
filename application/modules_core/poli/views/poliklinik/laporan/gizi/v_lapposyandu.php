<div class="preview-frame">
    <table class="preview" width="1194" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr  bgcolor="#CCCCCC">
            <td width="50" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>No</strong></div></td>
            <td width="70" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>TGL</strong></div></td>
            <td width="70" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Kelurahan</strong></div></td>
            <td width="150" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>JML PDDK </strong></div></td>
            <td width="100" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>JML BY (0-11bl)&nbsp;</strong></div></td>
            <td width="100" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>JML BLT (12-59bl)</strong></div></td>
            <td width="150" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Jml Posy yg ada </strong></div></td>
          <td width="200" colspan="5" bgcolor="#999999"><div align="center"><strong>Posy dilapor</strong></div></td>
        </tr>
        <tr  bgcolor="#CCCCCC">
          <td width="50" bgcolor="#999999"><div align="center"><strong>JML</strong></div></td>
          <td width="50" bgcolor="#999999"><div align="center"><strong>BY</strong></div></td>
          <td width="50" bgcolor="#999999"><div align="center"><strong>BLT</strong></div></td>
          <td width="50" bgcolor="#999999"><div align="center"><strong>Status</strong></div></td>
          <td width="50" bgcolor="#999999"><div align="center"><strong>TL</strong></div></td>
        </tr>
        <?php
        $jml = 0;
        $i = 1;
        foreach ($list as $record):
            ?>
            <tr valign="top">
                <td align="center"><?php echo $i; ?>&nbsp;</td>
                <td align="center"><?php echo $record['tgl']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['nama_kelurahan']; ?>&nbsp;</td>
                <td align="left"><?php echo $record['jml_pend']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['jml_by']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['jml_blt']; ?></td>
                <td align="center"><?php echo $record['jml_posy'];?>&nbsp;</td>
                <td align="center"><?php echo $record['posy_jml'];?>&nbsp;</td>
                <td align="center"><?php echo $record['posy_by'];?>&nbsp;</td>
                <td align="center"><?php echo $record['posy_blt'];?>&nbsp;</td>
                <td align="center"><?php echo $record['status'];?>&nbsp;</td>
                <td align="center"><?php echo $record['tindak_lanjut'];?>&nbsp;</td>
            </tr>
            <?php $i++;
        endforeach; ?>
  </table>
</div>