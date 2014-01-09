<div class="preview-frame">
    <table class="preview" width="1194" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
        <tr bgcolor="#CCCCCC">
            <td width="49" rowspan="2"><div align="center"><strong>No</strong></div></td>
            <td width="84" rowspan="2"><div align="center"><strong>Kode</strong></div></td>
            <td width="200" rowspan="2"><div align="center"><strong>Penyakit</strong></div></td>
            <td colspan="2"><div align="center"><strong>Sex</strong></div></td>
            <td colspan="2"><div align="center"><strong>0-7 Hr </strong></div></td>
            <td colspan="2"><div align="center"><strong>8-28 Hr </strong></div></td>
            <td colspan="2"><div align="center"><strong>1Bln-1Thn </strong></div></td>
            <td colspan="2"><div align="center"><strong>1-4Thn</strong></div></td>
            <td colspan="2"><div align="center"><strong>5-19Thn</strong></div></td>
            <td colspan="2"><div align="center"><strong>10-14Thn</strong></div></td>
            <td colspan="2"><div align="center"><strong>15-19Thn</strong></div></td>
            <td colspan="2"><div align="center"><strong>20-44Thn</strong></div></td>
            <td colspan="2"><div align="center"><strong>45-54Thn</strong></div></td>
            <td colspan="2"><div align="center"><strong>55-59Thn</strong></div></td>
            <td colspan="2"><div align="center"><strong>60-69Thn</strong></div></td>
            <td colspan="2"><div align="center"><strong>&gt; 70Thn </strong></div></td>
            <td colspan="2"><div align="center"><strong>Total</strong></div></td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>P</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
            <td width="40"><div align="center"><strong>B</strong></div></td>
            <td width="40"><div align="center"><strong>L</strong></div></td>
        </tr>
        <?php $i = 1;
        foreach ($list as $record): ?>
            <tr>
                <td align="center"><?php echo $i; ?>&nbsp;</td>
                <td><?php echo $record['icd']; ?>&nbsp;</td>
                <td><?php echo $record['nama_penyakit']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['jml_pria']; ?>&nbsp;</td>
                <td align="center"><?php echo $record['jml_wanita']; ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_7days($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_7days($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_8_28($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_8_28($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_1bln_1thn($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_1bln_1thn($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_1thn_4thn($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_1thn_4thn($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_5thn_9thn($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_5thn_9thn($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_10thn_14thn($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_10thn_14thn($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_15thn_19thn($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_15thn_19thn($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_20thn_44thn($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_20thn_44thn($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_45thn_54thn($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_45thn_54thn($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_55thn_59thn($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_55thn_59thn($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_60thn_69thn($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_less_60thn_69thn($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_more_70($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_more_70($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_total($record['tanggal_registrasi'], '2', $record['icd']); ?>&nbsp;</td>
                <td align="center"><?php echo jml_total($record['tanggal_registrasi'], '1', $record['icd']); ?>&nbsp;</td>
            </tr>
            <?php $i++;
        endforeach; ?>
    </table>
</div>