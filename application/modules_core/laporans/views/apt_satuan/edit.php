<div id="real">
    <div id="statusdonor">
		<?php echo form_open('farmasi/apt_satuan/edit'); ?>
			<table class="table table-striped">
                <thead>
            		<tr>
                		<th colspan="4">::. Edit Satuan Obat</th>
            		</tr>
            	</thead>

            	<tbody>
				
				<tr><?php echo form_input(array('name'=>'id_satuan','value'=>$id_satuan,'type'=>'hidden'));?>
                	<td>Satuan Obat</td>
                	<td>:</td>
                	<td> <?php echo form_input(array('name'=>'nama_satuan','id'=>'nama_satuan','value'=>$nama_satuan,'placeholder'=>'Masukkan Satuan Obat'));?></td>
                    <td style="width:60%; color:red;"><?php echo form_error('nama_satuan'); ?> </td>
            	</tr>
				
				
				<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td> <?php echo form_submit(array('name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small btn-success'));?>
                     <?php echo form_reset(array('name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small btn-success'));?>
                	 <a href="<?php echo base_url();?>farmasi/apt_satuan/index" class="btn btn-mini btn-success">Batal</a>
                
                </td>
                <td>&nbsp;</td>
            </tr>
				</tbody>
			</table>
			
		<?php echo form_close(); ?>
		</div>
	</div>
