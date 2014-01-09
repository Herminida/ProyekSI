<script type="text/javascript">
$(document).ready(function(){
	document.getElementById("btn_proses").disabled = true;
	$("#cari_pegawai").click(function(){
		$("#kata_kunci").val("");
		$("#tampil_cari").hide();
	});
	$("#btn_cari").click(function(){
		var kata_kunci=$("#kata_kunci").val();
		if(kata_kunci==""){
			alert("Kata kunci masih kosong!!!");
		}
		else{
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>hrd/surat_ijin/cari_pegawai",
				data:"kata_kunci="+kata_kunci,
				success:function(data){
					$("#tampil_cari").show();
					$("#tampil_cari").html(data);
				}
			});

		}
	});
	$("#btn_pilih").live("click",function(){
		var nama=$(this).attr("nama_pegawai");
		var jabatan=$(this).attr("jabatan");
		var id_pegawai=$(this).attr("id_pegawai");
		$("#nama").val(nama);
		$("#jabatan").val(jabatan);
		$("#id_pegawai").val(id_pegawai);
		document.getElementById("btn_proses").disabled = false;
	});
	$("#btn_proses").click(function(){
		var tanggal_dari=$("#tanggal_dari").val();
		var tanggal_sampai=$("#tanggal_sampai").val();
		var keperluan=$("#keperluan").val();
		var id_pegawai=$("#id_pegawai").val();
		if(tanggal_dari==""){
			alert("Tanggal awal ijin tidak boleh kosong");
			$("#tanggal_dari").focus();
		}
		else if(keperluan==" "){
			alert("Keperluan tidak boleh kosong");
			$("#keperluan").focus();
		}
		else{
			$("#frm_proses").submit();
		}
	});
});
</script>
<h2>Surat Ijin Pegawai</h2>
<hr>
<div style="float:right;">
    <a href="#myModal" role="button" class="btn btn-primary" id="cari_pegawai" data-toggle="modal"><i class="icon icon-search icon-white"></i>  Cari Pegawai</a>
</div>

    <div id="myModal" class="modal_lebar hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">Data Pegawai</h3>
	    </div>
	    <div class="modal-body">
	    	    <div class="form-inline">
				    <input type="text" class="span3" id="kata_kunci" placeholder="Kata Kunci...">
				    <button type="button" class="btn" id="btn_cari">Cari</button>
			    </div><hr>
			    <div id="tampil_cari"></div>
	    </div>
	    <div class="modal-footer">
		    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
	    </div>
    </div>
    <form id="frm_proses"  action="<?php echo base_url()?>hrd/surat_ijin/proses" method="post">
    <input type="hidden" id="id_pegawai" name="id_pegawai">
    <table>
    	<tr>
    		<td width="200px">
    			Nama
    		</td>
    		<td width="10px">:</td>
    		<td width="200px">
    			<input type="text" id="nama" name="nama" class="span3" placeholder="Nama...." readonly>
    		</td>
    	</tr>
    	<tr>
    		<td width="200px">
    			Jabatam
    		</td>
    		<td width="10px">:</td>
    		<td width="200px">
    			<input type="text" id="jabatan" class="span3" name="jabatan" placeholder="Jabatan...." readonly>
    		</td>
    	</tr>
    	<tr>
    		<td width="200px">
    			Tanggal Ijin
    		</td>
    		<td width="10px">:</td>
    		<td width="200px">
    			 <script>
					$(function() {
                        $( "#tanggal_dari" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_dari" ).change(function() {
                        $( "#tanggal_dari" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                        });
                        $( "#tanggal_sampai" ).datepicker({
                        changeMonth: true,
                        changeYear: true
                        });
                        $( "#tanggal_sampai" ).change(function() {
                        $( "#tanggal_sampai" ).datepicker( "option", "dateFormat","yy-mm-dd" );
                        });
                    });
				</script>
				    <div class="form-inline">
					    Dari <input type="text" name="tanggal_dari" class="input-small" id="tanggal_dari" placeholder="Dari"> Sampai
					    <input type="text" name="tanggal_sampai" class="input-small" id="tanggal_sampai" placeholder="Sampai">
				    </div>
    		</td>
    	</tr>
    	<tr>
    		<td width="200px">
    			Keperluan
    		</td>
    		<td width="10px">:</td>
    		<td width="200px">
    			<textarea id="keperluan" name="keperluan" placeholder="Keperluan" rows="5" class="span4"> </textarea>
    		</td>
    	</tr>
    	<tr>
    		<td></td>
    		<td></td>
    		<td>
    			
    		</td>
    	</tr>
    </table>
</form>
<button type="button" class="btn" id="btn_proses">Proses</button>