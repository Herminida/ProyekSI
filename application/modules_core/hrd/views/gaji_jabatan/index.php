<html>
<head>
  <title></title>
</head>
<body>
  <div id="real">
    <div id="statusdonor">
      <div><b>::. DATA GAJI PER JABATAN</b></div>
      
      <table >
        <tr>
          <td width="66%"><a class="btn small-box" rel="group" href="<?php echo base_url();?>hrd/gaji_jabatan/add">Tambah Master Gaji</a></td>
          

        </tr>

        <?php echo form_open('hrd/gaji_jabatan/search','class="navbar-form pull-right"');?>
        <tr>
          <td width="60%"></td>
          <td><input type"text" name="keysearch" placeholder="Masukkan Jabatan.."></td>
          <td><button type="submit" class="btn btn-small"  ><i class="icon icon-search"></i> Cari Pegawai</button></td>
        </tr>
        <?php echo form_close(); ?>
      </table>
      <center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Nama Gaji</th>
            <th>Jabatan</th>
            <th>Nilai Gaji</th>
           
            
          </tr>
        </thead>
        <tbody>

         <?php
    $no=$tot+1;
    $no2=1;
                if($gaji_jabatan->num_rows()>0)
                {
              foreach ($gaji_jabatan->result_array() as $tampil) { ?>
              <tr>
                <td><?php echo $no ?></td>
                <td>
                  
                  <a class="btn small-box" rel="group" href="<?php echo base_url().'hrd/gaji_jabatan/edit/'.$tampil['id_gaji_jabatan'];?>"><i class="icon-edit"></i> Tambah/Edit Gaji</a>
                        <a class="btn small-box" rel="group" href="<?php echo base_url().'hrd/gaji_jabatan/detail/'.$tampil['id_gaji_jabatan'];?>"><i class="icon-share"></i> Detail</a>
                  
                        
          </td>
                <td><?php echo $tampil['nama_gaji'] ?></td>
                <td><?php echo $tampil['nama_jabatan'] ?></td>
                <td><?php echo $tampil['nilai_gaji_jabatan'] ?></td>
                
                

              </tr>
                
              <?php
              $no++;
              $no2++; 
              }
            }
                 else
        {
          ?>
          
        <tr style="text-align:center;">
          <td colspan="9">Tidak Ada Data Pegawai</td>
        </tr>
          <?php
        }
      ?>
            
          
          
        </tbody>

      </table>
      

  <div class="w-box-footer">
                    <div class="pagination pagination-centered">
                      <ul>
                        
                        <li> 
                          <?php
                            echo $paginator;
                          ?>
                        </li>
                       
                      </ul>
                    </div>
                  </div>

    </div>
  </div>

  

</body>
</html>