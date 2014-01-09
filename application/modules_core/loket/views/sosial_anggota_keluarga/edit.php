<html>
<head>
    <title></title>
    <script type="text/javascript">
        $(document).ready(function() {
              $("#nik").keyup (function(){
                var nik = $("#nik").val();
                 $("#no_rm").val(nik);
              });

              $("#tgl").val(<?php echo $tgl ?>);
              $("#bln").val('<?php echo $bln?>');
              $("#thn").val(<?php echo $thn ?>);

        });

    </script>
</head>
<body>
    <div id="real">
        <div id="statusdonor">
            <?php echo form_open('loket/sosial_anggota_keluarga/edit');?>
            <table class="table table-stiped">

                                <?php
        echo "<input type=hidden value='$kk_id' name='kk_id'/>";
        echo "<input type=hidden value='$id' name='id'/>";
                     
        
        ?>

                <thead>
                    <tr>
                        <th colspan="6">::. Edit Anggota Kepala Keluarga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><input type="text" name="nik" id="nik" value="<?php echo $nik ?>" placeholder="Masukkan NIK" ></td>
                        <td style="width:30%; color:red;"><?php echo form_error('nik'); ?> </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>Nomer RM</td>
                        <td>:</td>
                        <td><input type="text" name="no_rm" id="no_rm" value="<?php echo $no_rm ?>" readonly="readonly" placeholder="Masukkan No RM"></td>
                        <td style="width:30%; color:red;"><?php echo form_error('no_rm'); ?> </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>Nama Anggota</td>
                        <td>:</td>
                        <td><input type="text" name="nama_anggota" value="<?php echo $nama_anggota ?>" placeholder="Masukkan Nama Anggota" ></td>
                        <td style="width:30%; color:red;"><?php echo form_error('nama_anggota'); ?> </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td><input type="text" name="tempat_lahir" value="<?php echo $tempat_lahir ?>" placeholder="Masukkan Tempat Lahir" ></td>
                        <td style="width:30%; color:red;"><?php echo form_error('tempat_lahir'); ?> </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>


                        <?php
                            echo "<select name='tgl' id=tgl style=width:60px;>";
                            for($i=1; $i<=31; $i++){
                            if(strlen($i)==1){
                            echo "<option value=$i>$i</option>";
                            }else{
                            echo "<option value=$i>$i</option>";
                            }
                            }
                            echo "</select>";
                        ?>

                        <?php
                            echo "<select name='bln' id=bln style=width:105px;>";
                            $bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",);
                            for($bln=1;$bln<=12; $bln++){
                            if(strlen($bln)==1){
                            echo "<option value=$bln>$bulan[$bln]</option>";
                            }
                            else{
                            echo "<option value=$bln>$bulan[$bln]</option>";
                            }
                            }
                            echo "</select>";
                        ?>
                      
                        <?php
                            echo "<select name='thn' id=thn style=width:83px;>";
                            for($thn=1900; $thn<=date("Y"); $thn++){
                            echo "<option value=$thn>$thn</option>";
                            }
                            echo "</select>"
                        ?>
                        </td>
                        <td style="width:30%; color:red;"><?php echo form_error('tanggal_lahir'); ?> </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <select name="sex" class="input-read-only" style="width: 205px">
                        <?php
                            if($sex=="Laki-laki")
                            {
                        ?>
                                <option value="Laki-laki" selected="selected">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <?php
                            }
                            else if($sex=="Perempuan")
                            {
                                ?>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan" selected="selected">Perempuan</option>
                                <?php
                            }
                            else
                            {
                                ?>
                                <option value="-" selected="selected">- Pilih -</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <?php
                            }
                                ?>
                        </select>
                        </td>
                        <td style="width:30%; color:red;"><?php echo form_error('sex'); ?> </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>Ayah</td>
                        <td>:</td>
                        <td><input type="text" name="nama_ayah" value="<?php echo $nama_ayah ?>" placeholder="Masukkan Nama Ayah" ></td>
                        <td style="width:30%; color:red;"><?php echo form_error('nama_ayah'); ?> </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>Ibu</td>
                        <td>:</td>
                        <td><input type="text" name="nama_ibu" value="<?php echo $nama_ibu ?>" placeholder="Masukkan Nama Ibu" ></td>
                        <td style="width:30%; color:red;"><?php echo form_error('nama_ibu'); ?> </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>
                        <select name="agama_id" class="input" style="width: 205px">

                            <?php 
                            foreach ($agama->result_array() as $d) {
                                if ($agama_id == $d['id']) {
                        ?>  
                            <option value="<?php echo $d['id']; ?>" selected="selected"><?php echo $d['nama_agama']; ?></option>
                        <?php 
                                }
                                else {
                        ?>
                            <option value="<?php echo $d['id'];?>"><?php echo $d['nama_agama'];?></option>  
                        <?php        
                                }
                            }
                        ?>

                    
                        </select>
                        </td>
                        <td style="width:30%; color:red;"><?php echo form_error('nama_agama'); ?> </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>Pendidikan</td>
                        <td>:</td>
                        <td>
                            <select name="pendidikan_id" class="input" style="width: 205px">
                        <?php 
                            foreach ($pendidikan->result_array() as $d) {
                                if ($pendidikan_id == $d['id']) {
                        ?>  
                            <option value="<?php echo $d['id']; ?>" selected="selected"><?php echo $d['nama_pendidikan']; ?></option>
                        <?php 
                                }
                                else {
                        ?>
                            <option value="<?php echo $d['id'];?>"><?php echo $d['nama_pendidikan'];?></option>  
                        <?php        
                                }
                            }
                        ?>
                            </select>
                        </td>
                        <td style="width:30%; color:red;"><?php echo form_error('nama_pendidikan'); ?> </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>
                            <select name="pekerjaan_id" class="input" style="width: 205px">
                        <?php 
                            foreach ($pekerjaan->result_array() as $d) {
                                if ($pekerjaan_id == $d['id']) {
                        ?>  
                            <option value="<?php echo $d['id']; ?>" selected="selected"><?php echo $d['nama_pekerjaan']; ?></option>
                        <?php 
                                }
                                else {
                        ?>
                            <option value="<?php echo $d['id'];?>"><?php echo $d['nama_pekerjaan'];?></option>  
                        <?php        
                                }
                            }
                        ?>
                            </select>
                        </td>
                        <td style="width:30%; color:red;"><?php echo form_error('nama_pekerjaan'); ?> </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>Status Anggota</td>
                        <td>:</td>
                        <td>
                            <select name="status_anggota_id" class="input" style="width: 205px">
                        <?php 
                            foreach ($status_anggota->result_array() as $d) {
                                if ($status_anggota_id == $d['id']) {
                        ?>  
                            <option value="<?php echo $d['id']; ?>" selected="selected"><?php echo $d['nama_status_anggota']; ?></option>
                        <?php 
                                }
                                else {
                        ?>
                            <option value="<?php echo $d['id'];?>"><?php echo $d['nama_status_anggota'];?></option>  
                        <?php        
                                }
                            }
                        ?>
                    
                            </select>
                        </td>
                        <td style="width:30%; color:red;"><?php echo form_error('nama_status_anggota'); ?> </td>
                        <td>&nbsp;</td>
                    </tr>

                <tr>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td><input type="text" name="kewarganegaran" value="<?php echo $kewarganegaran ?>" placeholder="Masukkan Kewarganegaraan" ></td>
                    <td style="width:30%; color:red;"><?php echo form_error('kewarganegaran'); ?> </td>
                    <td>&nbsp;</td>
                </tr>

               

                <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td><input type="text" name="telepon" value="<?php echo $telepon ?>" placeholder="Masukkan Telepon" ></td>
                    <td style="width:30%; color:red;"><?php echo form_error('telepon'); ?> </td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                        <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                        <a href="<?php echo base_url();?>loket/sosial_kepala_keluarga" class="btn btn-small  ">Kembali</a>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
            </tr>

                </tbody>    

            </table>

        </div>

    </div>
</body>
</html>