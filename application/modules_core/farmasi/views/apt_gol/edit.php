
	<div id="real">
		<div id="statusdonor">
			<?php echo form_open('farmasi/apt_gol/edit');?>
			<table class="table table-striped">
				<thead>
					<tr><th colspan="4">::.Edit Golongan Obat</th></tr>
				</thead>
				<tbody>
					<tr>
						<td>Golongan Obat</td>
						<td>:</td>
						<td>
							<input type="text" name="nama_golongan" value="<?php echo $nama_golongan;?>" placeholder="Masukkan Gol Obat">
						</td>
						<td style="width:60%; color:red"><?php echo form_error('nama_golongan'); ?></td>
					</tr>

					<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                     <a href="<?php echo base_url();?>farmasi/apt_gol/index" class="btn btn-small  ">Batal</a>
                
                </td>
                <td>&nbsp;</td>
            </tr>
					
				</tbody>
				<input type="hidden" name="id_golongan" value="<?php echo $id_golongan ?>">
			</table>
			<?php echo form_close();?>
		</div>
	</div>

