<html>
<head>
    <title></title>

</head>

</body>
<div id="real">
    <div id="statusdonor">
      
		<?php echo form_open('sosial_status_anggota/add'); ?>
			<table class="table table-striped">

				<thead>
            <tr>
                <th colspan="4">::. Input Status Anggota</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Status Anggota</td>
                <td>:</td>
                <td><input type="text" name="nama_status_anggota" placeholder="Masukkan Status Anggota" > </td>
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
				
				
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				</tbody>
			</table>
			<?php echo form_close(); ?>
		
		</div>
	</div>
</body>
</html>