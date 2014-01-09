<div class="preview-frame">
    <table class="preview" width="1944" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr  bgcolor="#CCCCCC">
            <td width="50" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>No</strong></div></td>
            <td width="70" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Register</strong></div></td>
            <td width="70" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>NIK  </strong></div></td>
            <td width="150" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Nama</strong></div></td>
            <td width="100" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Umur&nbsp;</strong></div></td>
            <td width="200" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Alamat&nbsp;</strong></div></td>
            <td width="100" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Kunjungan</strong></div></td>
            <td width="100" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Layanan</strong></div></td>
            <td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Anamnesa</strong></div></td>
            <td colspan="5" bgcolor="#A1A1A1"><div align="center"><strong>Vital Sign </strong></div></td>
            <td width="150" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Diagnosa</strong></div></td>
            <td width="70" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Obat</strong></div></td>
            <td width="70" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Pemeriksaan<br style="mso-data-placement:same-cell;" /> Lab</strong></div></td>
            <td width="70" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Hasil</strong></div></td>
            <td width="70" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Tindakan Medis </strong></div></td>
            <td width="70" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Tgl Register &nbsp;</strong></div></td>
            <td width="70" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>User Saved </strong></div></td>
        </tr>
        <tr  bgcolor="#CCCCCC">
            <td width="70" bgcolor="#CCCCCC"><div align="center"><strong>Utama</strong></div></td>
            <td width="70" bgcolor="#CCCCCC"><div align="center"><strong>Sekunder</strong></div></td>
            <td width="120" bgcolor="#A1A1A1"><div align="center"><strong>Respirasi </strong></div></td>
            <td width="120" bgcolor="#A1A1A1"><div align="center"><strong>Suhu Badan (c) </strong></div></td>
            <td width="120" bgcolor="#A1A1A1"><div align="center"><strong>Denyut Nadi </strong></div></td>
            <td width="70" bgcolor="#A1A1A1"> <div align="center"><strong>BB </strong></div></td>
            <td width="70" bgcolor="#A1A1A1"><div align="center"><strong>Tb</strong></div></td>
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
                <td align="left"><?php echo $value->umur; ?>&nbsp;</td>
                <td align="left"><?php echo $value->alamat; ?>&nbsp;</td>
                <td align="center"><?php echo $value->kunjungan_jenis; ?>&nbsp;</td>
                <td align="center"><?php echo $value->nama_bayar; ?>&nbsp;</td>
                <td align="left"><?php echo $value->keluhan_utama; ?>&nbsp;</td>
                <td align="left"><?php echo $value->keluhan_sekunder; ?>&nbsp;</td>
                <td align="center"><?php echo $value->respirasi; ?>&nbsp;</td>
                <td align="center"><?php echo $value->suhu_badan; ?>&nbsp;</td>
                <td align="center"><?php echo $value->denyut_nadi; ?>&nbsp;</td>
                <td align="center"><?php echo $value->bb; ?>&nbsp;</td>
                <td align="center"><?php echo $value->tb; ?>&nbsp;</td>
                <td align="left"><?php echo get_diagnosa($value->idpemeriksaan); ?>&nbsp;</td>
                <td align="left"><?php
        /*foreach (get_obat($value->register)->result() as $r_obat):
            echo $r_obat->nama_item . ', ';
        endforeach;*/
            ?>&nbsp;</td>
                <td align="left"><?php echo get_lab($value->idpemeriksaan); ?>&nbsp;</td>
                <td align="left"><?php echo $value->fisik; ?>&nbsp;</td>
                <td align="center"><?php
                foreach (get_tindakan($value->idpemeriksaan)->result() as $r_tindakan):
                    echo $r_tindakan->namatindakan . ', ';
                endforeach;
            ?>&nbsp;</td>
                <td align="center"><?php echo $value->tanggal_registrasi; ?>&nbsp;</td>
                <td align="center"><?php echo $value->nama_pegawai;?>&nbsp;</td>
            </tr>
            <?php $i++;
        endforeach; ?>
    </table>
</div>