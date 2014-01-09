<script>
$(document).ready(function(){
	$("#btn-cari").click(function(){
                        var kata_kunci=$("#kata_kunci").val();
                        if(kata_kunci==""){
                            alert("Kata kunci tidak boleh kosong!!!");
                        }
                        else{
                            $.ajax({
                            type:"POST",
                            url:"<?php echo base_url();?>hrd/jam_kerja_pegawai/cari_pegawai",
                            data:"kata_kunci="+kata_kunci,
                            success:function(data){
                                $("#tampil_cari").show();
                                $("#tampil_cari").html(data);
                            }
                        });
                        }
                    });
            $("#btn-cari-data").click(function(){
                var kata_kunci=$("#cari_data").val();
                    if(kata_kunci==""){
                    alert("Kata kunci tidak boleh kosong!!!");
                    }
                    else{
                     $("#cari_data_pegawai").submit();       
                    }
            });
            $("#cari_pegawai").click(function(){
                        $("#tampil_cari").hide();
                        $("#kata_kunci").val("");
                        $("#id_pegawai").val("");
                        $("#nama_pegawai").val("");
            })
            $("#pilih").live("click",function(){
            	var id_pegawai=$(this).attr("id_pegawai");
            	var nama_pegawai=$(this).attr("nama");
            	$("#id_pegawai").val(id_pegawai);
            	$("#nama_pegawai").val(nama_pegawai);
            	$("#tampil_cari").hide();
            });

            $("#simpan").click(function(){
            	$("#formId").submit();
            	
            	/*var nama_pegawai=$("#nama_pegawai").val();
            	var shift=$("#shift").val();
            	if(nama_pegawai==""){
            		alert("Nama Pegawai tidak boleh kosong!!!");
            		$("#nama_pegawai").focus();
            	}
            	else if(shift==""){
            		alert("Shift tidak boleh kosong!!!");
            		$("#shift").focus();
            	}
            	else{
            		
            	}*/
            });
});
</script>
 <script>
                $(document).ready(function(){
                   $("#simpan_umum").click(function(){
                      	var nama_pegawai=$("#nama_pegawai").val();
            			var shift=$("#shift").val();
            			if(nama_pegawai==""){
            				alert("Nama Pegawai tidak boleh kosong!!!");
            				$("#nama_pegawai").focus();
            			}
            			else if(shift==""){
            				alert("Shift tidak boleh kosong!!!");
            				$("#shift").focus();
            			}
            			else{  
                            $("#formsimpan_umum").submit();
                        }
                   });
                });
    </script>

<h2>Jam Kerja Pegawai</h2><hr>
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
        <div id="myModal" class="modal_lebar hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Tambah Pegawai</h3>
            </div>
            <div class="modal-body">
                    <div class="input-append">
                        <input class="span2" id="kata_kunci" type="text">
                        <button class="btn" id="btn-cari" type="button"><i class="icon icon-search"></i> Cari</button>
                    </div>
                    <hr>
                    <div id="tampil_cari"></div><br>
                      <?php echo form_open('hrd/jam_kerja_pegawai/add','id="formsimpan_umum"','class="form-horizontal"'); ?>
                    	<input type="hidden" name="id_pegawai" id="id_pegawai">
                    	<table>
                    		<tr>
                    			<td width="150px">Nama Pegawai</td><td>:</td><td><input type="text" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" readonly></td>
                    		</tr>
                    		<tr>
                    			<td width="150px">Shift</td><td>:</td>
                    			<td>
                    				<select id="shift" name="shift">
                    					<option value="">==Silahkan Pilih==</option>
                    					<?php
                    						foreach ($data_shift->result_array() as $hasil) {
                    						?>
                    						<option value="<?php echo $hasil['id_shift'];?>"><?php echo $hasil['nama_shift'];?></option>
                    						<?php
                    						}
                    					?>
                    				</select>
                    			</td>
                    		</tr>
                    		<tr>
                    			<td width="150px"></td><td></td><td><?php echo form_button(array('type'=>'button','content'=>'Simpan','name'=>'simpan','id'=>'simpan_umum','value'=>'Simpan','class'=>'btn btn-small  '));?></td>
                    		</tr>
                    	</table>
                    </form>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Batal</button>
            </div>
          </div>
          <div class="bs-docs-example" style="padding-bottom: 24px;">
            <a data-toggle="modal" href="#myModal" id="cari_pegawai" class="btn btn-primary" style="float:left; margin-right:20px;"><i class="icon icon-search icon-white"></i> Tambah Jam Kerja Pegawai</a>
                <form class="form-search" style="float:right;" id="cari_data_pegawai" action="<?php echo base_url();?>hrd/jam_kerja_pegawai/search" method="POST">
                    <input type="text" id="cari_data" name="cari_data" class="input-medium">
                    <button type="button" id="btn-cari-data" class="btn"><i Class="icon icon-search"></i> Cari Data Pegawai</button>
                </form>
          </div>
<br><br>
<table class="table table-striped">
	<thead>
		<tr bgcolor="#D0D0D0">
			<td width="5%">No</td>
			<td width="15%">Nama</td>
			<td width="10%">Jabatan</td>
			<td width="10%">Jam Masuk</td>
			<td width="10%">Jam Keluar Istirahat</td>
			<td width="10%">Jam Masuk Istirahat</td>
			<td width="10%">Jam Masuk </td>
			<td width="30%"><div align="center">Aksi</div></td>
		</tr>
	</thead>
	<tbody>
<?php
$no=0;
foreach ($data_pegawai->result_array() as $tampil) {
	$no++;
	?>
	<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $tampil['nama_pegawai'];?></td>
		<td><?php echo $tampil['nama_jabatan'];?></td>
		<td><?php echo $tampil['jam_masuk'];?></td>
		<td><?php echo $tampil['jam_keluar_istirahat'];?></td>
		<td><?php echo $tampil['jam_masuk_istirahat'];?></td>
		<td><?php echo $tampil['jam_masuk'];?></td>
		<td><div align="center"><a href="<?php echo base_url();?>hrd/jam_kerja_pegawai/edit/<?php echo $tampil['id_jam_kerja_pegawai'];?>" class="btn small-box" rel="group"><i class="icon icon-pencil"></i> Edit</a> || 
			<a href="<?php echo base_url();?>hrd/jam_kerja_pegawai/delete/<?php echo $tampil['id_jam_kerja_pegawai'];?>"><button class="btn"><i class="icon icon-remove"></i> Hapus</button></a></div></td>	
	</tr>
	<?php
}
?>
	</tbody>
</table>
<?php
echo $paginator;
?>

