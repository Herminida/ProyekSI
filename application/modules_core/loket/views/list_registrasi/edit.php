<script type="text/javascript" src="<?php echo base_url();?>js/date/datetimepicker_css.js"></script>
<div id="real">
    <div id="statusdonor">
    <?php foreach($registrasi->result() as $anggota):?>
        <?php echo form_open('loket/list_registrasi/edit'); ?>
        <table  class="table table-striped">
            <thead>
                <tr><th colspan="3">::. UPADATE REGISTRASI PASIEN</th></tr>
            </thead>
            <?php
                echo "<input type='hidden' value='$anggota->id' name='anggota_id'/>";
                echo "<input type='hidden' value='$anggota->idpemeriksaan' name='id_pemeriksaan'/>";
            ?>
            <tbody>
        <tr>
                <td>Tanggal Registrasi</td>
                <td>:</td>
                <td>
                    <?php
                      echo "<select name='tgl' id=tgl style=width:60px;>";
                        for($i=1; $i<=31; $i++){
                        if($i==date('d')){
                            if(strlen($i)==1){
                            echo "<option selected=selected value=0$i>0$i</option>";
                            }else{
                            echo "<option selected=selected value=$i>$i</option>";
                            }

                        }else {
                            if(strlen($i)==1){
                            echo "<option value=0$i>0$i</option>";
                            }else{
                            echo "<option value=$i>$i</option>";
                            }

                        }
                      }
                        echo "</select>";
                    ?>

                    <?php
                        echo "<select name='bln' id=bln style=width:105px;>";
                        $bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",);
                    for($bln=1;$bln<=12; $bln++){

                        if($bln==date('m')){
                            if(strlen($bln)==1){
                            echo "<option selected=selected value=0$bln>$bulan[$bln]</option>";
                            }else{
                            echo "<option selected=selected value=$bln>$bulan[$bln]</option>";
                            }

                        }else {
                            if(strlen($bln)==1){
                            echo "<option value=0$bln>$bulan[$bln]</option>";
                            }else{
                            echo "<option value=$bln>$bulan[$bln]</option>";
                            }
                              
                        }
                    }

                        echo "</select>";
                    ?>
                      
                    <?php
                        echo "<select name='thn' id=thn style=width:83px;>";
                    for($thn=1900; $thn<=date("Y"); $thn++){

                        if($thn==date('Y')){
                            
                            echo "<option selected=selected value=$thn>$thn</option>";

                        }else {
                            echo "<option value=$thn>$thn</option>";
                        
                        }
                    }
                        echo "</select>"
                    ?>
                </td>
        </tr>
                <tr><td>NIK/NAMA PASIEN</td><td>:</td><td><?php echo $anggota->nik."/".$anggota->nama_anggota;?></td></tr>
                <tr><td>ALAMAT PASIEN </td><td>:</td><td><?php echo $anggota->alamat;?></td></tr>
                <tr>
                        <td> KLINIK </td><td>:</td>
                        <td>
                            <select name="klinik_id" class="input-read-only" style="width:120px">
                            <?php
                            foreach($kliniks->result() as $klinik):
                                if($klinik->id == $anggota->klinik_id){
                                    echo "<option value='$klinik->id' selected='selected'> $klinik->nama_klinik</option>";                                    
                                }else{
                                    echo "<option value='$klinik->id'> $klinik->nama_klinik</option>";                                    
                                }
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
                                foreach ($bayars->result() as $bayar ){
                                    if($bayar->id == $anggota->bayar_id){
                                        echo "<option value='".$bayar->id."' selected='selected'>".$bayar->cara_bayar."</option>";                                        
                                    }else{
                                        echo "<option value='".$bayar->id."'>".$bayar->cara_bayar."</option>";                                        
                                    }
                                }
                                ?>

                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" value="Update" class="btn btn-small"> 
                            <a href="<?php echo base_url();?>loket/list_registrasi"><button type="button" class="btn btn-small">Batal</button></a></td>
                    </tr>
            </tbody>
	</table>
    <?php echo form_close();?>
    <?php endforeach;?>
    </div>
    
</div>