
<div id="real">
    <div id="statusdonor">
      <center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
		<?php echo form_open('master/ruang_kamar/edit'); ?>
        <input name="id_ruang_kamar" value="<?php echo $id;?>" type="hidden">
			<table class="table table-striped">

				<thead>
            <tr>
                <th colspan="4">::. Input Kelas Kamar</th>
            </tr>
            </thead>

            <tbody>

                <tr>
                <td>Kelas Kamar</td>
                <td>:</td>
                <td>
                    <select name="kelas_kamar">
                        <option value="">==Silahkan Pilih==</option>
                        <?php
                            foreach ($data_kelas_kamar->result_array() as $hasil) {
                                if($hasil['id_kelas_kamar']==$id_kelas_kamar){
                                    ?>
                                    <option value="<?php echo $hasil['id_kelas_kamar'];?>" selected="selected"><?php echo $hasil['nama_kelas_kamar'];?></option>
                                    <?php
                                }
                                else{
                                     ?>
                                        <option value="<?php echo $hasil['id_kelas_kamar'];?>"><?php echo $hasil['nama_kelas_kamar'];?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </td>
                <td style="width:50%; color:red;"><?php echo form_error('kelas_kamar'); ?> </td>
                </tr>
                <tr>
                <td>Ruang Kamar</td>
                <td>:</td>
                <td><input type="text" name="ruang_kamar" placeholder="Masukkan Ruang Kamar" value="<?php echo $nama_ruang_kamar;?>"></td>
                <td style="width:50%; color:red;"><?php echo form_error('ruang_kamar'); ?> </td>
                </tr>

            	<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"> <?php echo form_button(array('type'=>'submit','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                    <?php echo form_button(array('type'=>'reset','content'=>'Reset','name'=>'batal','id'=>'batal','value'=>'Reset','class'=>'btn btn-small  '));?>
                    <a href="<?php echo base_url();?>master/ruang_kamar" class="btn btn-small  ">Batal</a>
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