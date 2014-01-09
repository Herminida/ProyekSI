<html>
<head>
	<title></title>
</head>
<body>
	<div id="real">
		<div id="statusdonor">
			<div><b>::. Hasil Cari Data Riwayat Pegawai</b></div>

			 <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>NIP</th>
            <th>Nama Pegawai</th>
            <th>Jabatan</th>
            
            
          </tr>
        </thead>
        <tbody>

         <?php
    $no=1;
  
                if($riwayat_pegawai->num_rows()>0)
                {
              foreach ($riwayat_pegawai->result_array() as $tampil) { ?>
              <tr>
                <td><?php echo $no ?></td>
                <td>
                  
                  <a class="btn small-box" rel="group" href="<?php echo base_url().'hrd/riwayat_pegawai/edit/'.$tampil['id_pegawai'];?>"><i class="icon-edit"></i> Tambah/Edit Riwayat</a>
                        <a class="btn small-box" rel="group" href="<?php echo base_url().'hrd/riwayat_pegawai/detail/'.$tampil['id_pegawai'];?>"><i class="icon-share"></i> Detail</a>
                  
                        
          </td>
                <td><?php echo $tampil['nip_pegawai'] ?></td>
                <td><?php echo $tampil['nama_pegawai'] ?></td>
                <td><?php echo $tampil['nama_jabatan'] ?></td>
               
                

              </tr>
                
              <?php
              $no++;
              
              }
            }
                 else
        {
          ?>
          
        <tr style="text-align:center;">
          <td colspan="9">Tidak Ada Data Yang Anda Cari</td>
        </tr>
          <?php
        }
      ?>
            
          
          
        </tbody>

      </table>

      <a href="<?php echo base_url();?>hrd/riwayat_pegawai" class="btn btn-small">kembali</a>
      

  <!-- <div class="w-box-footer">
                    <div class="pagination pagination-centered">
                      <ul>
                        
                        <li> 
                          <?php
                            echo $paginator;
                          ?>
                        </li>
                       
                      </ul>
                    </div>
                  </div> -->

    </div>
  </div>

  

</body>
</html>