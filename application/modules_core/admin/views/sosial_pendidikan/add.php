<html>
<head>
    <title></title>

</head>

</body>
<div id="real">
    <div id="statusdonor">
      
		<?php echo form_open('loket/sosial_pendidikan/add'); ?>
			<table class="table table-striped">

				<thead>
            <tr>
                <th colspan="4">::. Input Pendidikan</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Pendidikan</td>
                <td>:</td>
                <td><input type="text" name="nama_pendidikan" placeholder="Masukkan Pendidikan" ></td>
                <td style="width:70%; color:red;"><?php echo form_error('nama_pendidikan'); ?> </td>
                
               
                </tr>

            	<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>loket/sosial_pendidikan" class="btn btn-small  ">Batal</a>
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