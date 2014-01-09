<script type="text/javascript" src="<?php echo base_url();?>js/date/datetimepicker_css.js"></script>
<div id="real">
    <div id="statusdonor">
    <?php foreach($anggotas->result() as $anggota):?>
        <?php echo form_open('loket/admission_registrasi/add'); ?>
        <table  class="table table-striped">
            <thead>
                <tr><th colspan="3">::. REGISTRASI PASIEN</th></tr>
            </thead>
            <?php
                echo "<input type='hidden' value='$anggota->id' name='anggota_id'/>";
            ?>
            <tbody>
                <tr><td>NIK/NAMA PASIEN</td><td>:</td><td><?php echo $anggota->nik."/".$anggota->nama_anggota;?></td></tr>
                <tr><td>NO KK/NAMA KK</td><td>:</td><td><?php echo $anggota->no_kk."/".$anggota->nama_kk;?></td></tr>
                <tr><td>ALAMAT PASIEN </td><td>:</td><td><?php echo $anggota->alamat." RT ".$anggota->rt." RW ".$anggota->rw." ".$anggota->nama_kelurahan." ".$anggota->nama_kecamatan;?></td></tr>
                <tr>
                        <td> POLY </td><td>:</td>
                        <td>
                            <select name="klinik_id" class="input-read-only" style="width:120px">
                            <?php
                            echo "<option value=''> Pilih Klinik </option>";
                            foreach($kliniks->result() as $klinik):
                                echo "<option value='$klinik->id'> $klinik->nama_klinik</option>";
                            endforeach;
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> CARA BAYAR </td>
                        <td>:</td>
                        <td>
                            <select name="bayar_id" class="input">
                                <?php
                                echo "<option value=''> Pilih Cara Bayar </option>";
                                foreach ($bayars->result() as $bayar ){
                                    echo "<option value='".$bayar->id."'>".$bayar->cara_bayar."</option>";
                                }
                                ?>

                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" value="Simpan" class="btn btn-large  "> <input type="submit"  value="Reset Data"  class="btn btn-small  "></td>
                    </tr>
            </tbody>
	</table>
    <?php echo form_close();?>
    <?php endforeach;?>
    </div>
    
</div>