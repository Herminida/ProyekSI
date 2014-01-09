<div id="real">
    <div id="statusdonor">
		<?php echo form_open('farmasi/farmasi_obat_jenis/edit'); ?>
			<table class="table table-striped">
                <thead>
            		<tr>
                		<th colspan="4">::. Edit Jenis Obat</th>
            		</tr>
            	</thead>

            	<tbody>
				
				<tr><?php echo form_input(array('name'=>'id','value'=>$id,'type'=>'hidden'));?>
                	<td>Jenis Obat</td>
                	<td>:</td>
                	<td> <?php echo form_input(array('name'=>'nama_obat_jenis','id'=>'nama_obat_jenis','value'=>$nama_obat_jenis,'placeholder'=>'Masukkan Jenis Obat'));?></td>
                    <td style="width:60%; color:red;"><?php echo form_error('nama_obat_jenis'); ?> </td>
            	</tr>
				
				
				<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td> <?php echo form_submit(array('name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small btn-success'));?>
                     <?php echo form_reset(array('name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small btn-success'));?>
                	 <a href="<?php echo base_url();?>farmasi/farmasi_obat_jenis/index" class="btn btn-mini btn-success">Batal</a>
                
                </td>
                <td>&nbsp;</td>
            </tr>
				</tbody>
			</table>
			
		<?php echo form_close(); ?>
		</div>
	</div>
