<html>
<head>
    <title></title>
</head>

</body>
<div id="real">
    <div id="statusdonor">
      
		<?php echo form_open('farmasi/apt_gol/add'); ?>
			<table class="table table-striped">

				<thead>
            <tr>
                <th colspan="4">::. Input Golongan Obat</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Golongan Obat</td>
                <td>:</td>
                <td><input type="text" name="nama_golongan" placeholder="Masukkan Golongan Obat"></td>
                <td style="width:60%; color:red;"><?php echo form_error('nama_golongan'); ?> </td>
                
               
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
				
				
				<input type="hidden" name="id_golongan" value="<?php echo $id_golongan; ?>" />
				</tbody>
			</table>
			<?php echo form_close(); ?>
		
		</div>
	</div>
</body>
</html>