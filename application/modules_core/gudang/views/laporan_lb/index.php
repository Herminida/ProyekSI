<?php
foreach($laporans->result_array() as $laporan):
    $jumlah[$laporan['dtd_id'].$laporan['kasus'].$laporan['id']]=$laporan['jumlah'];
endforeach;
?>
<div id="real">
    <div id="statusdonor">
        <?php echo form_open('laporans/laporan_lb1');?>
        <table class="table table-striped">
            <thead>
                <tr><th colspan="4">::. Laporan LB1</th></tr>
            </thead>
            <tbody>
                <tr><td>Periode</td><td><?php echo $tanggal_laporan1.$bulan_laporan1.$tahun_laporan1;?></td>
                <td> s/d </td><td><?php echo $tanggal_laporan2.$bulan_laporan2.$tahun_laporan2;?></td></tr>
                <tr><td><input type="submit" value="Buat Laporan" class="btn-small btn-success"/></td></tr>
            </tbody>
        </table>
        <?php echo form_close();?>
    </div>
    <div style="overflow-x: scroll;">
        <table class="table table-striped">
            <thead>
                <tr><th rowspan="2">No</th><th rowspan="2">Kode Dtd </th><th rowspan="2">Nama Penyakit</th>
                    <?php 
                    foreach ($umurs->result_array() as $judulumur):
                        echo "<th colspan='3'>".$judulumur['nama_umur']."</th>";
                    endforeach;
                    ?>
                    <th colspan="3">Total</th>
                </tr>

                <tr>
                <?php foreach ($umurs->result_array() as $judulkasus):
                    echo "<th>B</th><th>L</th><th>JKK</th>";
                endforeach;
                ?><th>B</th><th>L</th><th>JKK</th>
                </tr>
            </thead>
            
            <tbody>
            <?php
            $i=1;
            foreach ($dtds->result_array() as $dtd):
            ?>
            <tr>
                <td><?php echo $i;?></td><td><?php echo $dtd['id'];?></td><td><?php echo $dtd['nama_dtd'];?></td>
                <?php 
                $total[$dtd['id']."L"]=0;
                $total[$dtd['id']."B"]=0;
                foreach ($umurs->result_array() as $umur):
                    if(!empty($jumlah[$dtd['id']."B".$umur['id']])){
                        echo "<td>".$jumlah[$dtd['id']."B".$umur['id']]."</td>";
                        $total[$dtd['id'].'B'] += $jumlah[$dtd['id']."B".$umur['id']];
                        $totalB[$dtd['id'].'B'.$umur['id']]=$jumlah[$dtd['id']."B".$umur['id']];
                    }else{
                        $totalB[$dtd['id'].'B'.$umur['id']]=0;
                        echo "<td>0</td>";
                    }
                    if(!empty($jumlah[$dtd['id']."L".$umur['id']])){
                        echo "<td>".$jumlah[$dtd['id']."L".$umur['id']]."</td>";                
                        $total[$dtd['id'].'L'] += $jumlah[$dtd['id']."L".$umur['id']];
                        $totalL[$dtd['id'].'L'.$umur['id']]=$jumlah[$dtd['id']."L".$umur['id']];                    

                    }else{
                        $totalL[$dtd['id'].'L'.$umur['id']]=0;
                        echo "<td>0</td>";
                    }
                    $totalprint=$totalB[$dtd['id'].'B'.$umur['id']]+$totalL[$dtd['id'].'L'.$umur['id']];
                    //echo "<td>BL".$totalB[$dtd['id'].'B'.$umur['id']]+$totalL[$dtd['id'].'L'.$umur['id']]."</td>";
                    echo "<td>$totalprint</td>";
                endforeach;
                ?>
                <td><?php echo $total[$dtd['id']."B"];?></td>
                <td><?php echo $total[$dtd['id']."L"];?></td>
                <td><?php echo $total[$dtd['id']."B"]+$total[$dtd['id']."L"];?></td>
            </tr>
            <?php 
            $i++;
            endforeach;
            ?>
            </tbody>
        </table>
        <?php echo form_open('laporans/laporan_lb1/exportLb1Print',array('target'=>'blank'));?>
            <input type="hidden" name="tanggallaporan1" value="<?php echo $tanggallaporan1;?>"/>
            <input type="hidden" name="tanggallaporan1" value="<?php echo $tanggallaporan2;?>"/>
            <input type="submit" value="Print" class="btn-small btn-success">
            
        <?php echo form_close();?>
    </div>
</div>