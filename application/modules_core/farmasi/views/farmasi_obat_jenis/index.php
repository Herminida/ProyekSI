<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. DATA MASTER UNIT KERJA</b></div>
			<table class="table">
				
				<tr>
					<td width="80%"><a class="btn small-box" rel="group" href="<?php echo base_url();?>farmasi/farmasi_obat_jenis/add">Tambah Jenis Obat</a></td>
					

				</tr>

				

			</table>
			<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Aksi</th>
						<th>Unit Kerja</th>
						
					</tr>
				</thead>
				<tbody>

					<?php
            	$no=1;
                if($farmasi_obat_jenis->num_rows()>0)
                {
            	foreach ($farmasi_obat_jenis->result_array() as $tampil) { ?>
            	<tr>
            		<td><?php echo $no ?></td>
            		<td>
            			
            			<a class="btn small-box" rel="group" href="<?php echo base_url().'farmasi/farmasi_obat_jenis/edit/'.$tampil['id'];?>"><i class="icon-edit"></i> Edit</a>
                        <a class="btn btn-small" href="<?php echo base_url().'farmasi/farmasi_obat_jenis/delete/'.$tampil['id'];?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $tampil['nama_obat_jenis'] ?> ?');"><i class="icon-trash"></i> Delete</a>
                       	
					</td>
            		<td><?php echo $tampil['nama_obat_jenis'] ?></td>
            		

            	</tr>
            		
            	<?php
            	$no++;	
            	}
            }
                 else
        {
          ?>
          
        <tr style="text-align:center;">
          <td colspan="9">Tidak Ada Data Jenis Obat</td>
        </tr>
          <?php
        }
      ?>
            
					
					
				</tbody>

			</table>

		</div>
	</div>

	

</body>
</html>