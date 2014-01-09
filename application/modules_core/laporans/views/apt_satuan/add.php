<html>
<head>
    <title></title>
</head>

</body>
<div id="real">
    <div id="statusdonor">
      
		<?php echo form_open('farmasi/apt_satuan/add'); ?>
			<table class="table table-striped">

				<thead>
            <tr>
                <th colspan="4">::. Input Satuan Obat</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Satuan Obat</td>
                <td>:</td>
                <td><input type="text" name="nama_satuan" placeholder="Masukkan Satuan Obat"></td>
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
				
				
				<input type="hidden" name="id_satuan" value="<?php echo $id_satuan; ?>" />
				</tbody>
			</table>
			<?php echo form_close(); ?>
		
		</div>
	</div>
</body>
</html>