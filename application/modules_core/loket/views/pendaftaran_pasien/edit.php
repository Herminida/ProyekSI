        <script>
                $(document).ready(function(){
                    $("#coba").click(function(){
                        $("#tes").hide();
                    });

                    $("#no_identitas").keyup(function(){
                        var no_identitas=$("#no_identitas").val();
                        var identitas=$("#identitas").val();
                        $("#no_rm").val(no_identitas);
                        $.ajax({
                        	type:"POST",
                        	url:"<?php echo base_url();?>loket/pendaftaran_pasien/cek",
                        	data: "nik="+no_identitas,
                        	success: function(data){
                        		var hasil=data;
                        		if(hasil=='sudah'){
                        			alert('Nik Sudah digunakan');
                        			$("#no_identitas").val(identitas);
                        			$("#no_rm").val(identitas);
                        		}
                        	}
                        });
                    });

                    $("#simpan").click(function(){
                        var err=false;
                        var jenis_kelamin=formsimpan.jenis_kelamin[0].checked;
                        var jenis_kelamin2=formsimpan.jenis_kelamin[1].checked;
                        var status_perkawinan=formsimpan.status_perkawinan[0].checked;
                        var status_perkawinan2=formsimpan.status_perkawinan[1].checked;
                        var alamat=$("#alamat").val();
                        var pendidikan=$("#pendidikan").val();
                        var pekerjaan=$("#pekerjaan").val();
                        var agama=$("#agama").val();
                        $("#formsimpan input").each(function(){
                            if($(this).val()==""){
                                if(($(this).attr('id')=="email") ){
                                        err=false;
                                    
                                }else{
                                    err=true;
                                }
                    
                            } 
                        });

                        if(err){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }

                        else if(jenis_kelamin==false && jenis_kelamin2==false ){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }
                        else if(status_perkawinan==false && status_perkawinan2==false ){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }
                        else if(alamat==""){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }
                        else if(pendidikan==""){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }
                        else if(pekerjaan==""){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }
                        else if(agama==""){
                            alert('Masih Ada form yang kosong, Silahkan dilengkapi');
                        }
                        else{
                                $("#formsimpan").submit();
                        }
                    });
                });
    </script>
 
<?php
foreach ($data_pasien->result_array() as $tampil) {
?> 
<div id="real">
  <div id="statusdonor">
</pre>
<h3>Edit Data Pasien</h3>
    <?php
    $confirm=$this->session->flashdata('confirm');
        if(empty($confirm)){

        }
        else{
            ?>
               <div class="alert alert-success">
                    <?php echo $this->session->flashdata('confirm');?>
                </div>
            <?php
        }
    ?>
    <?php echo form_open('loket/pendaftaran_pasien/edit','id="formsimpan"','class="form-horizontal"'); ?>
    <table class="table table-striped">
      <thead></thead>
      <tbody>
       
        
        <tr>
                <td style="width:30%">Tanggal Registrasi</td>
                <td>:</td>
                <td style="width:50%">
                    <script>
                    $(function() {
                        $( "#tanggal_registrasi" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_registrasi" ).change(function() {
                            $( "#tanggal_registrasi" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                        });
                    });
                </script>
                <p><input type="text" name="tanggal_registrasi" id="tanggal_registrasi" class="span3" placeholder="Tanggal Registrasi..." value="<?php echo $tampil['tanggal_registrasi'];?>" /></p>
                </td>
                <td style="width:30%; color:red;"><?php echo form_error('tanggal_lahir'); ?> </td>
               
            </tr>
        <tr>
            <td>No Identitas</td>
            <td>:</td>
            <td><input type="text" name="no_identitas" id="no_identitas"  class="span3" size="30" placeholder="NIK..." value="<?php echo $tampil['nik'];?>">
            <input type="hidden" name="identitas" id="identitas"  class="span3" size="30" placeholder="NIK..." value="<?php echo $tampil['nik'];?>"> </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('nik'); ?></td> 
        </tr>
         <tr>
            <td>No RM</td>
            <td>:</td>
            <td><input type="text" name="no_rm" id="no_rm"  class="span3" size="30" placeholder="No RM..." readonly="readonly" value="<?php echo $tampil['no_rm'];?>"> </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('nik'); ?></td> 
        </tr>

        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_pasien" value="<?php echo $tampil['nama_anggota'];?>"  id="nama_pasien" class="span3" size="30" placeholder="Nama Pasien..." ></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('nama_anggota'); ?></td> 
        </tr>

        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" id="alamat" class="span5"  placeholde="Alamat"><?php echo $tampil['alamat'];?></textarea></td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('alamat'); ?></td> 
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                    <label class="radio">
                    	<?php
                    		if($tampil['sex']=="l"){
                    			?>
                    			    <input type="radio" name="jenis_kelamin" id="sex_laki" value="l" checked>
                    			<?php
                    		}
                    		else{
                    			?>
                    			    <input type="radio" name="jenis_kelamin" id="sex_laki" value="l">
                    			<?php
                    		}
                    	?>
                      Laki-Laki
                    </label>
                    <label class="radio">
                    	<?php
                    		if($tampil['sex']=="p"){
                    			?>
                    			    <input type="radio" name="jenis_kelamin" id="sex_perempuan" value="p" checked>
                    			<?php
                    		}
                    		else{
                    			?>
                    			    <input type="radio" name="jenis_kelamin" id="sex_perempuan" value="p">
                    			<?php
                    		}
                    	?>
                      Perempuan
                    </label>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>
                    <label class="radio">
                    	<?php
                    		if($tampil['status_pernikahan_id']==0){
                    			?>
                    			<input type="radio" name="status_perkawinan" id="status" value="0" checked>
                    			<?php
                    		}
                    		else{
                    			?>
                    			<input type="radio" name="status_perkawinan" id="status" value="0" >
                    			<?php
                    		}
                    	?>
                      Belum Menikah
                    </label>
                    <label class="radio">
                      <?php
                    		if($tampil['status_pernikahan_id']==1){
                    			?>
                    			<input type="radio" name="status_perkawinan" id="status" value="1" checked>
                    			<?php
                    		}
                    		else{
                    			?>
                    			<input type="radio" name="status_perkawinan" id="status" value="1" >
                    			<?php
                    		}
                    	?>
                      Sudah Menikah
                    </label>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>

        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td>:</td>
            <td>
                <script>
                    $(function() {
                        $( "#tanggal_lahir" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_lahir" ).change(function() {
                            $( "#tanggal_lahir" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                        });
                        var yearRange = $( "#tanggal_lahir"  ).datepicker( "option", "yearRange" );
                        $( "#tanggal_lahir"  ).datepicker( "option", "yearRange", "1945:<?php echo date('Y');?>" );
                    	$("#tanggal_lahir").val("<?php echo $tampil['tanggal_lahir'];?>");
                    });
                </script>
                <input id="tempat_lahir" class="input-medium" name="tempat_lahir" value="<?php echo $tampil['tempat_lahir'];?>" placeholder="Tempat Lahir..."> / <input id="tanggal_lahir" class="input-small" name="tanggal_lahir" value="<?php echo $tampil['tanggal_lahir'];?>" placeholder="Tempat Lahir..."> 
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('tgl_lahir'); ?></td> 
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>
                    <select name="agama" id="agama" style="width:270px;">
                        <option value="">==Agama==</option>
                        <?php
                            foreach ($agama->result_array() as $tampil1) {
                            	if($tampil['id_agama']==$tampil1['id']){
                            		?>
                            		<option value="<?php echo $tampil1['id'];?>" selected="selected"><?php echo $tampil1['nama_agama']?></option>
                            		<?php
                            	}
                            	else{
                            		?>
                            		<option value="<?php echo $tampil1['id'];?>"><?php echo $tampil1['nama_agama']?></option>
                            		<?php
                            	}
                            }
                        ?>
                        
                    </select>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td>
                    <select name="pendidikan" id="pendidikan" style="width:270px;">
                        <option value="">==Pendidikan==</option>
                        <?php
                            foreach ($pendidikan->result_array() as $tampil2) {
                        		if($tampil['id_pendidikan']==$tampil2['id']){
                            		?>
                            		<option value="<?php echo $tampil2['id'];?>" selected="selected"><?php echo $tampil2['nama_pendidikan']?></option>
                            		<?php
                            	}
                            	else{
                            		?>
                            		<option value="<?php echo $tampil2['id'];?>"><?php echo $tampil2['nama_pendidikan']?></option>
                            		<?php
                            	}
                            }
                        ?>
                        
                    </select>                
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>
                    <select name="pekerjaan" id="pekerjaan" style="width:270px;">
                        <option value="">==pekerjaan==</option>
                        <?php
                            foreach ($pekerjaan->result_array() as $tampil3) {
                       			if($tampil['id_pekerjaan']==$tampil3['id']){
                            		?>
                            		<option value="<?php echo $tampil3['id'];?>" selected="selected"><?php echo $tampil3['nama_pekerjaan']?></option>
                            		<?php
                            	}
                            	else{
                            		?>
                            		<option value="<?php echo $tampil3['id'];?>"><?php echo $tampil3['nama_pekerjaan']?></option>
                            		<?php
                            	}
                            }
                        ?>
                        
                    </select>
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>
        <tr>
            <td>Telepon</td>
            <td>:</td>
            <td>
                <input type="text" value="<?php echo $tampil['telepon'];?>" name="telepon" id="telepon" placeholder="Telepon" class="span3">
            </td>
            <td style="width:50%; color:red;"><?php echo $this->session->flashdata('sex'); ?></td> 
        </tr>
        <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> <?php echo form_button(array('type'=>'button','content'=>'Simpan','name'=>'simpan','id'=>'simpan','value'=>'Simpan','class'=>'btn btn-small  '));?>
                </td>
                <td>&nbsp;</td>
                
            </tr> 
      </tbody>

    </table>
    <input type="hidden" name="id_pasien" value="<?php echo $tampil['id_pasien'];?>">
    <?php echo form_close(); ?>


  </div>
</div>

<?php
}
?>