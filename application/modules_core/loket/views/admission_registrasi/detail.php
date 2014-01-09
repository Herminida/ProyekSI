<html>
<head>
    <title></title>
</head>
<body>
<div id="real">
    <div id="statusdonor">
        <div><b>::. Detail Admission Registrasi</b></div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Aksi</th>
                    <th>No Registrasi</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>Poly</th>
                    <th>Cara Bayar</th>
                    <th>No Antrian</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php 
                        foreach ($detail_registrasi as $d) {?>
                        <a class="btn btn-small  " href="<?php echo base_url().'loket/admission_registrasi/edit/'.$d['idpemeriksaan'];?>">Edit</a>
                        <a class="btn btn-small" onclick="javascript:window.open('<?php echo base_url()?>loket/admission_registrasi/cetak/<?php echo $d['idpemeriksaan']; ?>','mywin','left=20,top=10,width=590,height=600,toolbar=0,resizable=0')"><i class="icon icon-print"></i>Cetak</a>


                        <?php }
                    ?>

                    </td>
                    <td>
                        <?php 
                        foreach ($detail_registrasi as $d) {
                            echo $d['id_reg'];
                        }
                    ?>
                    </td>
                    <td>
                        <?php 
                        foreach ($detail_registrasi as $d) {
                            echo $d['nama_anggota'];
                        }
                    ?>
                    </td>
                    <td>
                        <?php 
                        foreach ($detail_registrasi as $d) {
                            echo $d['alamat'];
                        }
                    ?>
                    </td>
                    <td>
                       <?php 
                        foreach ($detail_registrasi as $d) {
                            echo $d['nama_klinik'];
                        }
                    ?>
                    </td>
                    <td>
                       <?php 
                        foreach ($detail_registrasi as $d) {
                            echo $d['cara_bayar'];
                        }
                    ?>
                    </td>
                    <td>
                       <?php 
                        foreach ($detail_registrasi as $d) {
                            echo $d['nomor_antrian'];
                        }
                    ?>
                    </td>
                </tr>

                <tr>
              
                <td><a href="<?php echo base_url();?>loket/admission_registrasi" class="btn btn-small  ">Kembali</a>
                </td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 
            </tr>

            </tbody>
        </table>

    </div>
</div>

</body>
</html>



      



