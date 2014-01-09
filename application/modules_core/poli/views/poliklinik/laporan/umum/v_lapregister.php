<div class="preview-frame">
    <table class="preview" width="1944" border="1" cellpadding="4" cellspacing="0" bordercolor="#000000">
        <tr  bgcolor="#CCCCCC">
            <td width="50" bgcolor="#CCCCCC"><div align="center"><strong>No</strong></div></td>
            <td width="70" bgcolor="#CCCCCC"><div align="center"><strong>Register</strong></div></td>
            <td width="70" bgcolor="#CCCCCC"><div align="center"><strong>NIK  </strong></div></td>
            <td width="150" bgcolor="#CCCCCC"><div align="center"><strong>Nama</strong></div></td>
            <td width="150" bgcolor="#CCCCCC"><div align="center"><strong>Nama KK </strong></div></td>
            <td width="100" bgcolor="#CCCCCC"><div align="center"><strong>Umur&nbsp;</strong></div></td>
            <td width="200" bgcolor="#CCCCCC"><div align="center"><strong>Alamat&nbsp;</strong></div></td>
            <td width="200" bgcolor="#CCCCCC"><div align="center"><strong>Wilayah</strong></div></td>
            <td width="100" bgcolor="#CCCCCC"><div align="center"><strong>Kunjungan</strong></div></td>
            <td width="100" bgcolor="#CCCCCC"><div align="center"><strong>Layanan</strong></div></td>
            <?php if($poli==9){
            echo '<td width="100" bgcolor="#CCCCCC"><div align="center"><strong>Poli</strong></div></td>';
            }?>
            <td width="70" bgcolor="#CCCCCC"><div align="center"><strong>Tgl Register &nbsp;</strong></div></td>
            <td width="70" bgcolor="#CCCCCC"><div align="center"><strong>User Saved </strong></div></td>
        </tr>
        <?php
        $jml = 0;
        $i = 1;
        foreach ($data as $value):
            ?>
            <tr valign="top">
                <td align="center"><?php echo $i; ?>&nbsp;</td>
                <td align="center"><?php echo $value->id; ?>&nbsp;</td>
                <td align="center"><?php echo $value->no_rm; ?>&nbsp;</td>
                <td align="left"><?php echo $value->nama_anggota; ?>&nbsp;</td>
                <td align="left"><?php echo $value->nama_kk; ?>&nbsp;</td>
                <td align="left"><?php echo $value->umur; ?>&nbsp;</td>
                <td align="left"><?php echo $value->alamat; ?>&nbsp;</td>
                <td align="left"><?php echo $value->nama_kelurahan.', '.$value->nama_kecamatan; ?>&nbsp;</td>
                <td align="center"><?php echo $value->kunjungan_jenis; ?>&nbsp;</td>
                
                <? if($poli==9){
                    echo '<td align="center">'.$value->nama_klinik.'&nbsp;</td>';
                    echo '<td align="center">'.$value->time_lab.'&nbsp;</td>';
                    echo '<td align="center">'.$value->nama_pegawai.'&nbsp;</td>';
                }elseif($poli=99){
                    echo '<td align="center">'.$value->time_lab.'&nbsp;</td>';
                }else{
                    echo '<td align="center">'.$value->nama_klinik.'&nbsp;</td>';
                    echo '<td align="center">'.$value->nama_bayar.'&nbsp;</td>';
                    echo '<td align="center">'.$value->tanggal_registrasi.'&nbsp;</td>';
                    echo '<td align="center">'.$value->nama_pegawai.'&nbsp;</td>';
                }
                ?>
            </tr>
            <?php $i++;
        endforeach; ?>
    </table>
</div>