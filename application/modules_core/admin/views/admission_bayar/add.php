<html>
<head>
    <title></title>

</head>

</body>
<div id="real">
    <div id="statusdonor">
      
		<?php echo form_open('loket/admission_bayar/add'); ?>
			<table class="table table-striped">

				<thead>
            <tr>
                <th colspan="4">::. Input Admission Bayar</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Admission</td>
                <td>:</td>
                <td><input type="text" name="cara_bayar" placeholder="Masukkan Admission Bayar" > </td>
                <td style="width:70%; color:red;"><?php echo form_error('cara_bayar'); ?> </td>
                
               
                </tr>

            	<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>loket/admission_bayar" class="btn btn-small  ">Batal</a>
                </td>
                <td>&nbsp;</td>
            </tr>
				
				
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				</tbody>
			</table>
			<?php echo form_close(); ?>
		
		</div>
	</div>
</body>
</html>