<html>
    <head>
        <title>
            Hasil Registrasi
        </title>
        
    </head>
    <body>
        <table>
            <?php echo form_open('loket/admission'); ?>
            <tr>
                <th colspan="3">
                    Detail Register
                </th>
            </tr>
            <tr>
                <td colspan="2"><div align="center">Nomer Registrasi</div></td>
                <td>:</td>
            </tr>
            <tr>
                <td>Nama Pasien</td><td>:</td>
                <td>
                    <?php 
                        foreach ($detail_registrasi as $d) {
                            echo $d['nama_anggota'];
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Alamat Pasien</td><td>:</td>
                <td>
                    <?php 
                        foreach ($detail_registrasi as $d) {
                            echo $d['alamat'];
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Klinik</td><td>:</td>
                <td>
                    <?php 
                        foreach ($detail_registrasi as $d) {
                            echo $d['nama_klinik'];
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Cara Bayar</td><td>:</td>
                <td>
                    <?php 
                        foreach ($detail_registrasi as $d) {
                            echo $d['cara_bayar'];
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Selesai"></td>
                
            </tr>
            <?php echo form_close(); ?>
        </table>
    </body>
</html>