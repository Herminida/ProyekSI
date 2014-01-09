<div class="preview-frame">
    <a href="<?php echo base_url();?>farmasi/laporan_gudang_apotek_pengeluaran/excel" ><img src="<?php echo base_url();?>images/export-icon.gif"></a>
    <table class="preview" width="<?php echo $width; ?>" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr>
            <td width="20" bgcolor="#CCCCCC"><div align="center"><strong>No</strong></div></td>
<!--            <td width="200" bgcolor="#CCCCCC"><div align="center"><strong>Tgl</strong></div></td>-->
            <td  bgcolor="#CCCCCC"><div align="center"><strong>Obat</strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Qtt</strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Jenis Keluar</strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Keterangan</strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Tanggal Keluar</strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Dari</strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Tujuan</strong></div></td>
            

            </tr>
        

        <?php 
        $i=1; 
        if($list_gudang_apotek_pengeluaran->num_rows()>0) {
        foreach ($list_gudang_apotek_pengeluaran->result_array() as $tampil) { ?>

        	 <tr>
                <td><div align="center"><?php echo $i;?></div></td>
               
              
                <td style="width:150px;"><?php echo $tampil['nama_obat'];?></td>
                <td style="width:50px;"><?php echo $tampil['jumlah2'];?></td>
                <td style="width:50px;"><?php echo $tampil['jenis_keluar'];?></td>
                <td style="width:50px;"><?php echo $tampil['keterangan'];?></td>
                <td style="width:50px;"><?php echo $tampil['tanggal_keluar'];?></td>
                <td style="width:120px;"><?php echo $tampil['nama_unit_kerja'];?></td>
                <td style="width:120px;"><?php echo $tampil['tujuan'];?></td>
                
                
                
            </tr>
        <?php
        $i++;	
        }

        }
                else
                {
                    ?>
                    
                <tr style="text-align:center;">
                    <td colspan="8">Tidak Ada Data Yang ditemukan</td>
                </tr>
                    <?php
                }
            ?>
       
        
    </table>
</div>
<a href="<?php echo base_url();?>farmasi/laporan_gudang_apotek_pengeluaran/excel" ><img src="<?php echo base_url();?>images/export-icon.gif"></a>

