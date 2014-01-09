<div id="real">
    <div id="statusdonor">
		<?php echo form_open('master/admission_bayar/edit'); ?>
			<table class="table table-striped">
                <thead>
            		<tr>
                		<th colspan="5">::. Edit Admission</th>
            		</tr>
            	</thead>

            	<tbody>
				
				<tr><?php echo form_input(array('name'=>'id','value'=>$id,'type'=>'hidden'));?>
                	<td>Admission</td>
                	<td>:</td>
                	<td> <?php echo form_input(array('name'=>'cara_bayar','id'=>'cara_bayar','value'=>$cara_bayar,'placeholder'=>'Masukkan Admission Bayar'));?></td>
                    <td style="width:70%; color:red;"><?php echo form_error('cara_bayar'); ?> </td>
            	</tr>
				
				
				<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                     <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                	 <a href="<?php echo base_url();?>master/admission_bayar" class="btn btn-small  ">Batal</a>
                
                </td>
                <td>&nbsp;</td>
            </tr>
				</tbody>
			</table>
			
		<?php echo form_close(); ?>
		</div>
	</div>
