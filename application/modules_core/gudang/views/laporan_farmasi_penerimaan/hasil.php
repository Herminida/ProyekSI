<div class="preview-frame">
    <a href="<?php echo base_url();?>farmasi/laporan_farmasi_penerimaan/excel" ><img src="<?php echo base_url();?>images/export-icon.gif"></a>
    <table class="preview" width="<?php echo $width; ?>" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr>
            <td width="20" bgcolor="#CCCCCC"><div align="center"><strong>No</strong></div></td>
<!--            <td width="200" bgcolor="#CCCCCC"><div align="center"><strong>Tgl</strong></div></td>-->
            <td bgcolor="#CCCCCC"><div align="center"><strong>Nama Obat </strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Jumlah Obat</strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Sumber</strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Supplier</strong></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><strong>Sales</strong></div></td>

            </tr>
        

        <?php 
        $i=1; 
        if($list_farmasi_penerimaan->num_rows()>0) {
        foreach ($list_farmasi_penerimaan->result_array() as $tampil) { ?>

        	 <tr>
                <td align="center"><div align="center"><?php echo $i;?></div></td>
               
              
                <td><?php echo $tampil['nama_obat'];?></td>
                <td><?php echo $tampil['jumlah2'];?></td>
                <td><?php echo $tampil['nama_sumber'];?></td>
                <td><?php echo $tampil['nama_supplier'];?></td>
                <td><?php echo $tampil['nama_sales'];?></td>
                
                
                
            </tr>
        <?php
        $i++;	
        }

        }
                else
                {
                    ?>
                    
                <tr style="text-align:center;">
                    <td colspan="6">Tidak Ada Data Yang ditemukan</td>
                </tr>
                    <?php
                }
            ?>
       
        
    </table>
</div>
<a href="<?php echo base_url();?>farmasi/laporan_farmasi_penerimaan/excel" ><img src="<?php echo base_url();?>images/export-icon.gif"></a>

