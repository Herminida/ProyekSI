<html>
<head>
    <title></title>



</head>

</body>
<div id="real">
    <div id="statusdonor">
      
		<?php echo form_open('farmasi/farmasi_obat_jenis/add'); ?>
			<table class="table table-striped">

				<thead>
            <tr>
                <th colspan="4">::. Input Jenis Obat</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Jenis Obat</td>
                <td>:</td>
                <td><input type="text" name="nama_obat_jenis" placeholder="Masukkan Jenis Obat"></td>
                <td style="width:60%; color:red;"><?php echo form_error('nama_obat_jenis'); ?> </td>
                
               
                </tr>

            	<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>farmasi/farmasi_obat_jenis/index" class="btn btn-small">Batal</a>
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