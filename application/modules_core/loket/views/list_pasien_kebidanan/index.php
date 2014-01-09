<script type="text/javascript">
$(document).ready(function(){
    $("#cari").click(function(){
        var kata_kunci=$("#kata_kunci").val();
        if(kata_kunci==""){
            alert("Kata kunci masih kosong!");
            $("#kata_kunci").focus();
        }
        else{
            $("#frm_cari").submit();
        }
    });
});
</script>

<div id="real">
    <div id="statusdonor">
        <table class="table">
       
            <tr>
                <td width="90%"><b>::. DATA LIST PASIEN KEBIDANAN</b></td>
                
            </tr>
        
        </table>
            <form class="form-inline" id="frm_cari" style="float:right;" action="<?php echo base_url()?>loket/list_pasien_kebidanan/search" method="post">
                    <input type="text" name="kata_kunci" id="kata_kunci" class="input-medium" placeholder="Kata kunci...">
                    <button type="button" class="btn" id="cari"><i class="icon icon-search"></i> Cari</button>
            </form>
        <table class="table table-striped">
            <thead>
                <tr>
                   <th>No</th> <th>Aksi</th><th>No RM</th><th>Nama Pasien</th><th>Umur</th><th>Jenis Kelamin</th><th>Alamat</th>
                </tr>
            </thead>
            <tbody>
            	<?php
            	$no=1;
            	if($data_pasien_kebidanan->num_rows()>0)
        		{
            	foreach ($data_pasien_kebidanan->result_array() as $tampil) { ?>
            	<tr>
            		<td><?php echo $no ?></td>
            		<td>
            			<a class="btn small-box" rel="group" href="<?php echo base_url().'loket/list_pasien_kebidanan/edit/'.$tampil['id_pasien_kebidanan'];?>"><i class="icon-edit"></i> Edit</a>
                        <a class="btn btn-small" href="<?php echo base_url().'loket/list_pasien_kebidanan/delete/'.$tampil['id_pasien_kebidanan'];?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $tampil['nama_lengkap'] ?> ?');"><i class="icon-trash"></i> Delete</a>
                        <a class="btn small-box" rel="group" href="<?php echo base_url().'loket/list_pasien_kebidanan/detail/'.$tampil['id_pasien_kebidanan'];?>"><i class="icon-share"></i> Detail</a>
                    </td>
            		<td><?php echo $tampil['no_rm'] ?></td>
            		<td><?php echo $tampil['nama_lengkap'] ?></td>
            		<td><?php echo $tampil['umur'] ?></td>
            		<td><?php echo $tampil['jenis_kelamin'] ?></td>
            		<td><?php echo $tampil['alamat'] ?></td>
            		
            		

            	</tr>
            		
            	<?php
            	$no++;	
            	}
            }
            	 else
        {
          ?>
          
        <tr style="text-align:center;">
          <td colspan="9">Tidak Ada Data Pasien Untuk Hari Ini</td>
        </tr>
          <?php
        }
      ?>
            
            	
            </tbody>
        </table>

        <div class="pagination pagination-centered">
            <ul>
           
            </ul>
        </div>
    </div>
</div>
