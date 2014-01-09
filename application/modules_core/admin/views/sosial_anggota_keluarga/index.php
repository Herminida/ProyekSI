<script type="text/javascript" src="<?php echo base_url();?>js/date/datetimepicker_css.js"></script>
<div id="real">
    <div id="statusdonor">
    <?php foreach($kk->result() as $kaka):?>
        <table  class="table table-striped">
            <?php
                echo "<input type='hidden' value='$kaka->id' name='kk_id'/>";
                echo "<input type='hidden' value='$kaka->no_kk' name=no_kk />";
                echo "<input type='hidden' value='$kaka->nama_kk' name=nama_kk />";
            ?>
            <tbody>
            <tr><td>NO/NAMA KK</td><td><?php echo $kaka->no_kk."/".$kaka->nama_kk;?></td></tr>
            <tr><td>ALAMAT KK </td><td><?php echo $kaka->alamat." RT ".$kaka->rt." RW ".$kaka->rw." ".$kaka->nama_kelurahan." ".$kaka->nama_kecamatan;?></td></tr>
            </tbody>
        </table>
        <div><a class="btn btn-small  " href="<?php echo base_url().'loket/sosial_anggota_keluarga/add/'.$kaka->id.'/'.$kaka->no_kk;?>" >Add Anggota Baru</a></div>
        <table class="table table-striped">
            <thead>
                <tr><th colspan="3">Aksi</th><th>NIK</th><th>NAMA ANGGOTA</th><th>TANGGAL LAHIR</th><th>JK</th><th>STATUS</th><th>AYAH</th><th>IBU</th></tr>
            </thead>
            <tbody>
            <?php foreach ($anggotas->result() as $anggota):
                echo "<tr><td><a class='btn btn-small  ' href='".base_url()."admission_registrasi/add/$anggota->id'>Add</a></td>";
                echo "<td><a href='".base_url()."loket/sosial_anggota_keluarga/edit/$anggota->id'>Edit</a></td>";
                echo "<td><a href='".base_url()."loket/sosial_anggota_keluarga/delete/$anggota->id'>Delete</a></td>";
                echo "<td>$anggota->nik</td><td>$anggota->nama_anggota</td><td>$anggota->tanggal_lahir</td><td>$anggota->sex</td><td>$anggota->nama_status_anggota</td><td>$anggota->nama_ayah</td><td>$anggota->nama_ibu</td></tr>";
            endforeach;?>
            </tbody>
        </table>
    <?php endforeach;?>
    </div>
    
</div>