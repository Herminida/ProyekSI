<style>
    td{
        border: 1px solid black;
    }
</style>
<body onload="javascript:window.print()">
<?php
foreach($lasts->result() as $awal):
    $stokawal[$awal->obat_id]=$awal->stok_awal;
    $jumlaht[$awal->obat_id]=$awal->penerimaan;
    $jumlah[$awal->obat_id]=$awal->pemakaian;
    $jumlahrusak[$awal->obat_id]=$awal->rusak;
    $jumlahsisa[$awal->obat_id]=$awal->sisa_stok;
    $jumlahreal[$awal->obat_id]=$awal->stok_real;
    $jumlahminta[$awal->obat_id]=$awal->permintaan;
endforeach;

?>
<div id="real">
    <div id="statusdonor">
        LAPORAN LB2 (LPLPO) APOTEK
        </br>
        <table style="border:1px solid black;">
            <thead><tr><th>No</th><th>Kode Obat</th><th>Nama Obat</th><th>Stok Awal</th><th>Penerimaan</th><th>Pemakaian</th><th>Rusak</th><th>Sisa Stok</th><th>Sisa Real</th><th>Permintaan</th></tr></thead>
            <tbody>
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
                
                if(empty($jumlahrusak[$obat->id])){
                    $rusak[$obat->id]=0;
                }else{
                    $rusak[$obat->id]=$jumlahrusak[$obat->id];
                }
                
                if(empty($jumlahsisa[$obat->id])){
                    $sisastok[$obat->id]=0;
                }else{
                    $sisastok[$obat->id]=$jumlahsisa[$obat->id];                    
                }
                
                if(empty($jumlahreal[$obat->id])){
                    $real[$obat->id]=0;
                }else{
                    $real[$obat->id]=$jumlahreal[$obat->id];
                }
                
                if(empty($jumlahminta[$obat->id])){
                    $minta[$obat->id]=0;
                }else{
                    $minta[$obat->id]=$jumlahminta[$obat->id];                    
                }
                                
                echo "<tr><td>$no</td><td>$obat->id</td>
                          <td>$obat->nama_obat</td><td style='width:60px;'>".$stokawalna[$obat->id]."</td>
                          <td style='width:60px;'>".$jmlterima[$obat->id]."</td>
                          <td style='width:60px;'>".$pakai[$obat->id]."</td>
                          <td>0</td><td style='width:60px;'>".$sisastok[$obat->id]."</td>
                          <td style='width:60px;'>".$sisastok[$obat->id]."</td>
                          <td style='width:60px;'>".$minta[$obat->id]."</td></tr>";
                $no++;
            endforeach;
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>