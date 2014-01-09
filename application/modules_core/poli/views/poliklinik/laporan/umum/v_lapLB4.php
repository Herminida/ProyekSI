<div class="preview-frame">
    <table class="preview" width="1194" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr>
            <td colspan="3" valign="center"><div align="center"><h1>Laporan LB4 (Rev.1)</h1></div>              </td>
        </tr>
        <?php $i = 1;
        foreach ($list as $record): ?>
            <?php $i++;
        endforeach; ?>
    </table>
    <table class="preview" width="1194" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr bgcolor="#999999">
            <td width="55" ><div align="center">No</div></td>
            <td width="264"><div align="center">Nama Kegiatan </div></td>
            <td width="274"><div align="center">Pencapaian</div></td>
        </tr>
        <?php
        $kategori = '';
        $i = 1;
        foreach ($list as $record):
            if ($record['nama_kategori'] != $kategori):
                $kategori = $record['nama_kategori'];
                ?> 
                <tr bgcolor="#EEEEEE">
                    <td colspan="3" align="left"><h4><?php echo $record['nama_kategori'];?></h4>&nbsp;</td>
                </tr>
            <?php endif; ?>
            <tr>
                <td align="center"><?php echo $i; ?>&nbsp;</td>
                <td align="left"><?php echo $record['nama_kegiatan']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['jml'];?>&nbsp;</td>
            </tr>
            <?php $i++;
        endforeach; ?>

    </table>
</div>