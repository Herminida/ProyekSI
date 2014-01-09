<div class="preview-frame">
    <table class="preview" width="1194" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr>
            <td width="200" bgcolor="#CCCCCC"><div align="center"><strong>Kode Penyakit </strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Nama Penyakit </strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Jumlah</strong></div></td>
        </tr>
        <?php $jml=0; foreach($list as $record):?>
        <tr>
            <td align="left"><?php echo $record['kode_penyakit'];?>&nbsp;</td>
            <td><?php echo $record['nama_penyakit'];?>&nbsp;</td>
            <td align="center"><?php echo $record['jml'];$jml+=$record['jml'];?>&nbsp;</td>
        </tr>
        <?php endforeach;?>
       
        <tr>
            <td><div align="center"><strong>GRAND TOTAL </strong></div></td>
            <td>&nbsp;</td>
            <td><div align="center"><?php echo $jml;?></div></td>
        </tr>
    </table>
</div>