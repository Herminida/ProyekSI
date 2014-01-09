
<table border="0" cellpadding="0" cellspacing="0" width="800">
    <tbody>
        <tr>
        <td><strong>Rujuk Luar : <?php echo $source['kerujuk'] ?></strong></td>
        </tr>
        <tr>
            <td><strong>Dokter Perujuk : <?php echo $source['perujuk'] ?></strong></td>
        </tr>
        <tr>
            <td><strong>Rumah Sakit Rujukan : <?php echo $source['rujukan'] ?></strong></td>
        </tr>
</tbody></table>
<br>
<table class="preview" border="1" bordercolor="#000000" cellpadding="5" cellspacing="1" width="600">
    <tbody><tr>
        <td>Puskesmas</td>
        <td><?php echo $source['nama_unit_kerja']; ?>&nbsp;</td>
    </tr>
    <tr>
        <td width="195">Tanggal</td>
        <td width="576"><?php echo date('j-M-Y h:m');?>&nbsp;</td>
    </tr>
    <tr>
        <td>NIK</td>
        <td><?php echo $source['nik']; ?>&nbsp;</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><?php echo $source['nama_anggota'];?>&nbsp;</td>
    </tr>
    <tr>
        <td>Umur</td>
        <td><?php echo $source['umur']; ?>  &nbsp;</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?php echo $source['alamat'].','.$source['nama_kecamatan'].','.$source['nama_kelurahan'] ?>&nbsp;</td>
    </tr>
    <tr>
        <td>Status Bayar </td>
        <td><?php echo $source['status']; ?>&nbsp;&nbsp;</td>
    </tr>

    <tr>
        <td>Anamnesa (Utama &amp; Sekunder) </td>
        <td><?php echo((!empty($pemeriksaan->keluhan_utama)?$pemeriksaan->keluhan_utama:'').','.(!empty($pemeriksaan->keluhan_sekunder)?$pemeriksaan->keluhan_sekunder:'')); ?></td>
    </tr>
    <tr>
        <td>Diagnosa</td>
        <td><?php echo (!empty($diagnosa['nama_penyakit'])?$diagnosa['nama_penyakit']:'') ?></td>
    </tr>
    
    <tr>
        <td>Tindakan Medis </td>
        <td><?php 
        if(!empty($tindakan)){
        foreach ($tindakan as $key){
                echo($key['namatindakan']).'<br>';
        } 
        }else{
            echo '';
        }

        ?></td>
    </tr>

    <tr>
        <td>Obat</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
        <td>Pemeriksa</td>
        <td><?php echo $source['nama_pegawai'] ?></td>
    </tr>
   
   
<!--    <tr>
        <td>Keterangan</td>
        <td>&nbsp;</td>
    </tr>-->
</tbody></table>
