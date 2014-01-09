<html>
<head>
    <title></title>
    
</head>
<body>
    <div id="real">
        <div id="statusdonor">
            <?php echo form_open('farmasi/laporan_farmasi_penerimaan/tampil');?>
            <input type="hidden"  name="unit_kerja_id"  value="<?php echo $this->session->userdata("id_unit_kerja"); ?>">
           
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="6">::.Laporan Farmasi Penerimaan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dari:</td>
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
                                echo "<select name='thn' id=thn style=width:75px;>";
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

                        <td>Sampai:</td>
                        <td>
                        <?php
                            echo "<select name='tgl2' id=tgl2 style=width:60px;>";
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
                            echo "<select name='bln2' id=bln2 style=width:105px;>";
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
                                echo "<select name='thn2' id=thn2 style=width:75px;>";
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
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>

                        <td>Puskesmas :</td>
                        
                        <td><input type="text" style="width:250px;" name="" readonly="readonly" value="<?php echo $this->session->userdata("nama_unit_kerja"); ?>"></td>
                        

                        <td>Sumber :</td>
                        
                        <td>
                            <select style="width:250px; height:25px; font-size:12px;" name="sumber_id" id="sumber_id">
                                <option value="">== Pilih Sumber==</option>
                            <?php
                                foreach ($apt_sumber->result_array() as  $value) {
                            ?>
                                <option value="<?php echo $value['id_sumber']; ?>"><?php echo $value['nama_sumber']; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>

            </table>
            <input type="submit" name="submit" id="tampil" class="btn btn-small" value="Tampilkan"></p>
            
        <?php echo form_close();?>
            

        </table>
    
        </div>
    </div>

</body>
</html>