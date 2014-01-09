<html>
<head>
    <title></title>
</head>

</body>
<div id="real">
    <div id="statusdonor">
      
		<?php echo form_open('master/users_groups/add'); ?>
			<table class="table table-striped">

				<thead>
            <tr>
                <th colspan="4">::. INPUT GROUP</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Group</td>
                <td>:</td>
                <td><input type="text" name="nama_users_groups" placeholder="Masukkan Group"></td>
                <td style="width:50%; color:red;"><?php echo form_error('nama_users_groups'); ?> </td>
                
               
                </tr>

                 
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>master/users_groups/index" class="btn btn-small">Batal</a>
                </td>
                <td>&nbsp;</td>
            </tr>

            	
				
				
				
				</tbody>
			</table>
			<?php echo form_close(); ?>
		
		</div>
	</div>
</body>
</html>