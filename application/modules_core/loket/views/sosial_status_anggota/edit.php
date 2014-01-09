<div id="real">
    <div id="statusdonor">
		<?php echo form_open('sosial_status_anggota/edit'); ?>
			<table class="table table-striped">
                <thead>
            		<tr>
                		<th colspan="4">::. Edit Status Anggota</th>
            		</tr>
            	</thead>

            	<tbody>
				
				<tr><?php echo form_input(array('name'=>'id','value'=>$id,'type'=>'hidden'));?>
                	<td>Status Anggota</td>
                	<td>:</td>
                	<td> <?php echo form_input(array('name'=>'nama_status_anggota','id'=>'nama_status_anggota','value'=>$nama_status_anggota,'placeholder'=>'Masukkan Status Anggota'));?></td>
                    <td style="width:55%; color:red;"><?php echo form_error('nama_status_anggota'); ?> </td>
            	</tr>
				
				
				<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                     <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                	 <a href="<?php echo base_url();?>sosial_status_anggota" class="btn btn-small  ">Batal</a>
                
                </td>
                <td>&nbsp;</td>
            </tr>
				</tbody>
			</table>
			
		<?php echo form_close(); ?>
		</div>
	</div>
