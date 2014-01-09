<html>
<head>
    <title></title>
</head>

</body>
<div id="real">
    <div id="statusdonor">
      
		<?php echo form_open('master/pegawai/add'); ?>
			<table class="table table-striped">

				<thead>
            <tr>
                <th colspan="4">::. Input Pegawai</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Nama Pegawai</td>
                <td>:</td>
                <td><input type="text" name="nama_pegawai" placeholder="Masukkan Nama Pegawai"></td>
                <td style="width:50%; color:red;"><?php echo form_error('nama_pegawai'); ?> </td>
                
               
                </tr>

                 <tr>
                <td>NIP</td>
                <td>:</td>
                <td><input type="text" name="nip_pegawai" placeholder="Masukkan NIP"></td>
                <td style="width:50%; color:red;"><?php echo form_error('nip_pegawai'); ?> </td>
                
               
                </tr>

                <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>
                	<select name="fk_jabatan">
                	<option value="">-Pilih Jabatan-</option>
                	<?php foreach ($jabatan_data->result_array() as $tampil) { ?>
                		<option value="<?php echo $tampil['id_jabatan'];?>"><?php echo $tampil['nama_jabatan'];?></option>
                	
                	<?php
                	}

                	?>
                	</select>
                </td>
                <td style="width:50%; color:red;"><?php echo form_error('fk_jabatan'); ?> </td>
                
               
                </tr>

                <tr>
                <td>Unit Kerja</td>
                <td>:</td>
                <td>
                	<select name="fk_unit_kerja" >
                	<option value="">-Pilih Unit Kerja-</option>
                	<?php foreach ($unit_kerja->result_array() as $tampil) { ?>
                		<option value="<?php echo $tampil['id_unit_kerja'];?>"><?php echo $tampil['nama_unit_kerja'];?></option>
                	
                	<?php
                	}

                	?>
                	</select>
                </td>
                <td style="width:50%; color:red;"><?php echo form_error('fk_unit_kerja'); ?> </td>
                
               
                </tr>

                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small'));?>
                    <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>master/pegawai/index" class="btn btn-small">Batal</a>
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