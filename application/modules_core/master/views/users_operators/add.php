<html>
<head>
    <title></title>
</head>

</body>
<div id="real">
    <div id="statusdonor">
      
		<?php echo form_open('master/users_operators/add'); ?>
			<table class="table table-striped">

				<thead>
            <tr>
                <th colspan="4">::. Input Operator</th>
            </tr>
            </thead>

            <tbody>

               

                <tr>
                <td>Group</td>
                <td>:</td>
                <td>
                	<select style="width:220px" name="users_groups_id" id="users_groups_id">
          				<option value="">-Pilih Group-</option>
        				<?php
          				foreach($users_groups_data->result_array() as $d)
          				{
            				
        				?>
          					<option value="<?php echo $d['id']; ?>"><?php echo $d['nama_users_groups']; ?></option>
        				<?php
            				
          				}
        				?>
        			</select>
                </td>
                <td style="width:55%; color:red;"><?php echo form_error('users_groups_id'); ?> </td>
                </tr>

                

                <tr>
                <td>Nama Operator</td>
                <td>:</td>
                <td><input type="text" name="nama_users_operators" placeholder="Masukkan Operator"></td>
                <td style="width:55%; color:red;"><?php echo form_error('nama_users_operators'); ?> </td>
                </tr>

                

            	<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>master/users_operators/index" class="btn btn-small">Batal</a>
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