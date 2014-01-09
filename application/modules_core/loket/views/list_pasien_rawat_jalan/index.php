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
                <td width="90%"><b>::. DATA LIST PASIEN RAWAT JALAN</b></td>
                
            </tr>
        
        </table>
            <form class="form-inline" id="frm_cari" style="float:right;" action="<?php echo base_url()?>loket/list_pasien_rawat_jalan/search" method="post">
                    <input type="text" name="kata_kunci" id="kata_kunci" class="input-medium" placeholder="Kata kunci...">
                    <button type="button" class="btn" id="cari"><i class="icon icon-search"></i> Cari</button>
            </form>        
        <table class="table table-striped">
            <thead>
                <tr>
                   <th>No</th> <th>Aksi</th><th>No RM</th><th>Nama Pasien</th><th>Umur</th><th>Jenis Kelamin</th><th>Alamat</th><th>Unit Layanan</th>
                </tr>
            </thead>
            <tbody>
            	<?php
            	$no=1;
                if($data_pasien_rawat_jalan->num_rows()>0)
                {
            	foreach ($data_pasien_rawat_jalan->result_array() as $tampil) { ?>
            	<tr>
            		<td><?php echo $no ?></td>
            		<td>
            			
            			<a class="btn small-box" rel="group" href="<?php echo base_url().'loket/list_pasien_rawat_jalan/edit/'.$tampil['id_pasien_rawat_jalan'];?>"><i class="icon-edit"></i> Edit</a>
                        <a class="btn btn-small" href="<?php echo base_url().'loket/list_pasien_rawat_jalan/delete/'.$tampil['id_pasien_rawat_jalan'];?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $tampil['nama_lengkap'] ?> ?');"><i class="icon-trash"></i> Delete</a>
                        <a class="btn small-box" rel="group" href="<?php echo base_url().'loket/list_pasien_rawat_jalan/detail/'.$tampil['id_pasien_rawat_jalan'];?>"><i class="icon-share"></i> Detail</a>
            			
					</td>
            		<td><?php echo $tampil['no_rm'] ?></td>
            		<td><?php echo $tampil['nama_lengkap'] ?></td>
            		<td><?php echo $tampil['umur'] ?></td>
            		<td><?php echo $tampil['jenis_kelamin'] ?></td>
            		<td><?php echo $tampil['alamat'] ?></td>
            		<td><?php echo $tampil['nama_klinik'] ?></td>

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
