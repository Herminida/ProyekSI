<div id="real">
    <div id="statusdonor">
		<?php echo form_open('loket/sosial_pekerjaan/edit'); ?>
			<table class="table table-striped">
                <thead>
            		<tr>
                		<th colspan="4">::. Edit Pekerjaan</th>
            		</tr>
            	</thead>

            	<tbody>
				
				<tr><?php echo form_input(array('name'=>'id','value'=>$id,'type'=>'hidden'));?>
                	<td>Pekerjaan</td>
                	<td>:</td>
                	<td> <?php echo form_input(array('name'=>'nama_pekerjaan','id'=>'nama_pekerjaan','value'=>$nama_pekerjaan,'placeholder'=>'Masukkan Pekerjaan'));?></td>
                    <td style="width:70%; color:red;"><?php echo form_error('nama_pekerjaan'); ?> </td>
            	</tr>
				
				
				<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                     <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                	 <a href="<?php echo base_url();?>loket/sosial_pekerjaan" class="btn btn-small  ">Batal</a>
                
                </td>
                <td>&nbsp;</td>
            </tr>
				</tbody>
			</table>
			
		<?php echo form_close(); ?>
		</div>
	</div>
