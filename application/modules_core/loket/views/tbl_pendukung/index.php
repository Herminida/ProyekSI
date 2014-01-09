<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. DATA MASTER PENDUKUNG</b></div>
			<table class="table">
				
				<tr>
					<td width="80%"><a class="btn small-box" rel="group" href="<?php echo base_url();?>loket/tbl_pendukung/add">Tambah Pendukung</a></td>
					

				</tr>

				

			</table>
			<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Aksi</th>
						<th>Nama Pendukung</th>
						
					</tr>
				</thead>
				<tbody>

					<?php
            	$no=1;
                if($tbl_pendukung->num_rows()>0)
                {
            	foreach ($tbl_pendukung->result_array() as $tampil) { ?>
            	<tr>
            		<td><?php echo $no ?></td>
            		<td>
            			
            			<a class="btn small-box" rel="group" href="<?php echo base_url().'loket/tbl_pendukung/edit/'.$tampil['id_pendukung'];?>"><i class="icon-edit"></i> Edit</a>
                        <a class="btn btn-small" href="<?php echo base_url().'loket/tbl_pendukung/delete/'.$tampil['id_pendukung'];?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $tampil['nama_pendukung'] ?> ?');"><i class="icon-trash"></i> Delete</a>
                       	
					</td>
            		<td><?php echo $tampil['nama_pendukung'] ?></td>
            		

            	</tr>
            		
            	<?php
            	$no++;	
            	}
            }
                 else
        {
          ?>
          
        <tr style="text-align:center;">
          <td colspan="9">Tidak Ada Data Pendukung</td>
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