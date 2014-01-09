<html>
<head>
    <title></title>
</head>

</body>
<div id="real">
    <div id="statusdonor">
      
		<?php echo form_open('farmasi/farmasi_obats/add'); ?>
			<table class="table table-striped">

				<thead>
            <tr>
                <th colspan="4">::. Input Obat</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Nama Obat</td>
                <td>:</td>
                <td><input type="text" name="nama_obat" placeholder="Masukkan Nama Obat"></td>
                <td style="width:55%; color:red;"><?php echo form_error('nama_obat'); ?> </td>
                </tr>

                <tr>
                <td>Jenis Obat</td>
                <td>:</td>
                <td>
                	<select style="width:220px" name="obat_jenis_id" id="obat_jenis_id">
          				<option value="">--Pilih Jenis Obat--</option>
        				<?php
          				foreach($farmasi_obat_jenis->result_array() as $d)
          				{
            				if($obat_jenis_id==$d['id'])
            				{
        				?>
          					<option value="<?php echo $d['id']; ?>" selected="selected"><?php echo $d['nama_obat_jenis']; ?></option>
        				<?php
            				}
            				else
            				{
        				?>
          					<option value="<?php echo $d['id']; ?>"><?php echo $d['nama_obat_jenis']; ?></option>
        				<?php
            				}
          				}
        				?>
        			</select>
                </td>
                <td style="width:55%; color:red;"><?php echo form_error('obat_jenis_id'); ?> </td>
                </tr>

                <tr>
                <td>Satuan</td>
                <td>:</td>
                <td>
                	<select style="width:220px" name="satuan_obat_id" id="satuan_obat_id">
          				<option value="">--Pilih Satuan--</option>
        				<?php
          				foreach($apt_satuan->result_array() as $d)
          				{
            				if($satuan_obat_id==$d['id_satuan'])
            				{
        				?>
          					<option value="<?php echo $d['id_satuan']; ?>" selected="selected"><?php echo $d['nama_satuan']; ?></option>
        				<?php
            				}
            				else
            				{
        				?>
          					<option value="<?php echo $d['id_satuan']; ?>"><?php echo $d['nama_satuan']; ?></option>
        				<?php
            				}
          				}
        				?>
        			</select>
                </td>
                <td style="width:55%; color:red;"><?php echo form_error('satuan_obat_id'); ?> </td>
                </tr>

                <tr>
                <td>Golongan</td>
                <td>:</td>
                <td>
                	<select style="width:220px" name="golongan_id" id="golongan_id">
          				<option value="">--Pilih Golongan--</option>
        				<?php
          				foreach($apt_gol->result_array() as $d)
          				{
            				if($golongan_id==$d['id_golongan'])
            				{
        				?>
          					<option value="<?php echo $d['id_golongan']; ?>" selected="selected"><?php echo $d['nama_golongan']; ?></option>
        				<?php
            				}
            				else
            				{
        				?>
          					<option value="<?php echo $d['id_golongan']; ?>"><?php echo $d['nama_golongan']; ?></option>
        				<?php
            				}
          				}
        				?>
        			</select>
                </td>
                <td style="width:55%; color:red;"><?php echo form_error('golongan_id'); ?> </td>
                </tr>

                <tr>
                <td>Dosis</td>
                <td>:</td>
                <td><input type="text" name="dosis" placeholder="Masukkan Dosis"></td>
                <td style="width:55%; color:red;"><?php echo form_error('dosis'); ?> </td>
                </tr>

                <tr>
                <td>Stok Gudang</td>
                <td>:</td>
                <td><input type="text" name="qtt" placeholder="Masukkan Stok"></td>
                <td style="width:55%; color:red;"><?php echo form_error('qtt'); ?> </td>
                </tr>

                <tr>
                <td>Harga Beli</td>
                <td>:</td>
                <td><input type="text" name="harga_beli" placeholder="Masukkan Harga Beli"></td>
                <td style="width:55%; color:red;"><?php echo form_error('harga_beli'); ?> </td>
                </tr>

                <tr>
                <td>Harga Jual</td>
                <td>:</td>
                <td><input type="text" name="harga_jual" placeholder="Masukkan Harga Jual"></td>
                <td style="width:55%; color:red;"><?php echo form_error('harga_jual'); ?> </td>
                </tr>

            	<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>farmasi/farmasi_obats/index" class="btn btn-small">Batal</a>
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