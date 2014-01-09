<div class="preview-frame">
    <a href="<?php echo base_url();?>farmasi/laporan_obat/excel" ><img src="<?php echo base_url();?>images/export-icon.gif"></a>
    <table class="preview" width="<?php echo $width; ?>" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr>
            <td width="20" bgcolor="#CCCCCC"><div align="center"><strong>No</strong></div></td>
<!--            <td width="200" bgcolor="#CCCCCC"><div align="center"><strong>Tgl</strong></div></td>-->
            <td bgcolor="#CCCCCC"><div align="center"><strong>Nama Obat </strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Jenis Obat</strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Satuan</strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Sisa Stok</strong></div></td>

            </tr>
        <?php $i=1;$total=0; foreach ($list_obat as $record): ?>
            <tr>
                <td align="center"><div align="center"><?php echo $i;?></div></td>
               
              
                <td><?php echo $record->nama_obat;?></td>
                <td><?php echo $record->nama_obat_jenis;?></td>
                <td><?php echo $record->nama_satuan;?></td>
                <td><?php echo $record->qtt;?></td>
                
            </tr>
        <?php $i++;$total+=$record->qtt; endforeach; ?>
       
        
    </table>
</div>
<a href="<?php echo base_url();?>farmasi/laporan_obat/excel" ><img src="<?php echo base_url();?>images/export-icon.gif"></a>

