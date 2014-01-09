<html>
<head>
    <title></title>
</head>

</body>
<div id="real">
    <div id="statusdonor">
      
		<?php echo form_open('master/jabatan/add'); ?>
			<table class="table table-striped">

				<thead>
            <tr>
                <th colspan="4">::. INPUT JABATAN</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><input type="text" name="nama_jabatan" placeholder="Masukkan Jabatan"></td>
                <td style="width:70%; color:red;"><?php echo form_error('nama_jabatan'); ?> </td>
                
               
                </tr>

                 
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>master/jabatan/index" class="btn btn-small">Batal</a>
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