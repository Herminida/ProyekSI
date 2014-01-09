<div class="preview-frame">
    <table class="preview" width="1194" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr>
            <td width="55" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>No</strong></div></td>
            <td width="264" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Nama Kegiatan </strong></div></td>
            <td width="597" colspan="12" bgcolor="#CCCCCC"><div align="center"><strong>Bulan</strong></div></td>
            <td width="274" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Jumlah</strong></div></td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td width="30"><div align="center"><strong>Jan</strong></div></td>
            <td width="30"><div align="center"><strong>Feb</strong></div></td>
            <td width="30"><div align="center"><strong>Mar</strong></div></td>
            <td width="30"><div align="center"><strong>Apr</strong></div></td>
            <td width="30"><div align="center"><strong>Mei</strong></div></td>
            <td width="30"><div align="center"><strong>Jun</strong></div></td>
            <td width="30"><div align="center"><strong>Jul</strong></div></td>
            <td width="30"><div align="center"><strong>Agu</strong></div></td>
            <td width="30"><div align="center"><strong>Sep</strong></div></td>
            <td width="30"><div align="center"><strong>Okt</strong></div></td>
            <td width="30"><div align="center"><strong>Nop</strong></div></td>
            <td width="30"><div align="center"><strong>Des</strong></div></td>
        </tr>
        <?php $i = 1;
        foreach ($list as $record): ?>
            <tr>
                <td align="center"><?php echo $i; ?>&nbsp;</td>
                <td align="left"><?php echo $record['nama_kegiatan']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['jan']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['feb']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['mar']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['apr']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['mei']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['jun']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['jul']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['agu']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['sep']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['okt']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['nov']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['des']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['jml']; ?>&nbsp;</td>
            </tr>
    <?php $i++;
endforeach; ?>
        
    </table>
</div>
