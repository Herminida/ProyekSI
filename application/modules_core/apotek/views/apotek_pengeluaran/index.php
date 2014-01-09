  <div id="real">
    <div id="statusdonor">
       <div><b>::. LIST APOTEK RESEP </b> 
      <b style="float:right; margin-right:130px; color:red;"><?php echo validation_errors(); ?></b>
    </div>
    <table class="table">
      <?php echo form_open("apotek/apotek_pengeluaran/search",'class="navbar-form pull-right"'); ?>
      <tr>
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
                    <button type="submit" class="btn btn-small"><i class="icon icon-search"></i> Cari</button>
        </td>
        
      </tr>
      <?php echo form_close(); ?>
    </table>
         
      <table class="table">

          <thead>
            <tr>
              <th colspan="2">Aksi</th><th>No Resep</th><th>Klinik</th><th>Tanggal Periksa</th><th>Nama Pasien</th><th>Jenis Kelamin</th><th>Umur</th><th>Alamat</th>
            </tr>
          </thead>
          
          <?php foreach ($id_pengeluaran_header->result_array() as $data) { ?>
   
          <tbody>
            <tr>
                <td colspan="2"><a class="btn btn-small" href="<?php echo base_url()?>apotek/apotek_pengeluaran/detail/<?php echo $data['pemeriksaan_id']?>">detail</a></td>
                <td>
                  <?php
                    echo $data['no_resep'];
                  ?>
                  
                </td>
                <td>
                  <?php
                    echo $data['nama_klinik'];
                  ?>
                </td>
                <td>
                  <?php
                    echo $data['tanggal_registrasi'];
                  ?>
                </td>
                <td>
                  <?php
                    echo $data['nama_anggota'];
                  ?>
                </td>
                <td>
                  <?php
                    echo $data['sex'];
                  ?>
                </td>
                <td>
                  <?php
                    echo $data['umur'];
                  ?>
                </td>
                <td>
                  <?php
                    echo $data['alamat'];
                  ?>
                </td>
                
          </tr>
          </tbody>
        <?php }?>

         </table>


    </div>

  </div>