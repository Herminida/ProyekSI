<?php
foreach($pengeluarans->result() as $keluar):
    $jumlah[$keluar->obat_id]=$keluar->jumlah;
endforeach;

foreach($stokawals->result() as $awal):
    $stokawal[$awal->obat_id]=$awal->stok_real;
endforeach;

foreach($penerimaans->result() as $terima):
    $jumlaht[$terima->obat_id]=$terima->jumlah;
endforeach;
?>
<div id="real">
    <div id="statusdonor">
        <?php echo form_open('laporans/farmasi_lplpo');?>
        <table class="table table-striped">
            <thead><tr><th colspan="3">::. Laporan LPLPO (LB2)</th></tr></thead>
            <tbody>
                <tr><td>Periode</td><td><?php echo $bulan_laporan.' '.$tahun_laporan;?> <input type="submit" value="Buat Laporan" class="btn btn-small"></td></tr>
            </tbody>
        </table>
        <?php echo form_close();?>
        
        <?php echo form_open('laporans/farmasi_lplpo/generateLplpo');?>
        <table class="table table-striped">
            <thead><tr><th>No</th><th>Kode Obat</th><th>Nama Obat</th><th>Stok Awal</th><th>Penerimaan</th><th>Pemakaian</th><th>Rusak</th><th>Sisa Stok</th><th>Sisa Real</th><th>Stok Optimal</th><th>Permintaan</th></tr></thead>
            <tbody>
            <input type="hidden" name="tanggal_generate" value="<?php echo $tanggalgenerate;?>"/>
            <?php
            $no=1;
            foreach($obats->result() as $obat):
                if(empty($jumlaht[$obat->id])){
                    $jmlterima[$obat->id]=0;
                }else{
                    $jmlterima[$obat->id]=$jumlaht[$obat->id];
                }
                
                if(empty($stokawal[$obat->id])){
                    $stokawalna[$obat->id]=0;
                }else{
                    $stokawalna[$obat->id]=$stokawal[$obat->id];
                }
                
                if(empty($jumlah[$obat->id])){
                    $pakai[$obat->id]=0;
                }else{
                    $pakai[$obat->id]=$jumlah[$obat->id];
                }
                                
                $sisastok[$obat->id]=$stokawalna[$obat->id]+$jmlterima[$obat->id]-$pakai[$obat->id];
                $optimal[$obat->id]=$pakai[$obat->id]+($pakai[$obat->id]*0.1);
                
                echo "<tr><td>$no</td><td><input type=hidden name='obat_id$no' value='$obat->id' /> $obat->id</td>
                          <td>$obat->nama_obat</td><td><input type=text readonly=readonly name='stok_awal$no'  style='width:60px;' value='".$stokawalna[$obat->id]."'></td>
                          <td><input type=text readonly=readonly name='terima$no'  style='width:60px;' value='".$jmlterima[$obat->id]."'></td>
                          <td><input type=text readonly=readonly name='pakai$no'  style='width:60px;' value='".$pakai[$obat->id]."'></td>
                          <td>0</td><td><input type=text readonly=readonly name='sisa_stok$no'  style='width:60px;' value='".$sisastok[$obat->id]."'></td>
                          <td><input type='text' name='stok_real$no'  style='width:60px;' value='".$sisastok[$obat->id]."'></td>
                          <td>".$optimal[$obat->id]."</td>
                          <td><input type='text' name='minta$no' style='width:60px;' value='".$optimal[$obat->id]."'/></td></tr>";
                $no++;
            endforeach;
            ?>
            </tbody>
        </table>
         <?php 
        if ($lasts->num_rows>0) {
        }
        else {


        ?>
        <input type="submit" value="Simpan" class="btn btn-small">
        <?php
        }
        ?>
        <?php echo form_close();?>

        <?php 
        if ($lasts->num_rows>0) {

        ?>
        
        <?php echo form_open('laporans/farmasi_lplpo/exportLplpoXls',array('target'=>'blank'));?>
            <input type="hidden" name="tanggal_generate" value="<?php echo $tanggalgenerate;?>"/>
             <input type="hidden" name="tanggallaporan1" value="<?php echo $tanggallaporan1;?>"/>
            <input type="hidden" name="tanggallaporan2" value="<?php echo $tanggallaporan2;?>"/>    
            <input type="submit" value="Print" class="btn btn-small">
            
        <?php echo form_close();?>
               <?php 
        }
       ?>
    </div>
</div>