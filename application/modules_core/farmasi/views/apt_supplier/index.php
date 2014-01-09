<div id="real">
  <div id="statusdonor">
    <div><b>::. DATA SATUAN OBAT </b> 
      <b style="float:right; margin-right:130px; color:red;"><?php echo validation_errors(); ?></b>
    </div>
    <table class="table">
      <?php echo form_open('farmasi/apt_supplier/search','class="navbar-form pull-right" ');?>
      <tr>
          <td width="70%"><a class="btn small-box" rel="group" href="<?php echo base_url();?>farmasi/apt_supplier/add">Tambah Satuan Obat</a></td>
        
        <td><input name="keysearch" placeholder="Masukkan Kata Kunci.."></td>
        <td><button type="submit" class="btn btn-small"><i class="icon-search"></i> Cari</button></td>        
      
      </tr>
      <?php echo form_close(); ?>
    </table>
    <center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Aksi</th>
        <th>Nama Supplier</th>
        <th>Alamat</th>
        <th>No Telp/ Hp</th>
        <th>Rekening</th>

      </thead>

      <tbody>

        
         <?php
    $no=$tot+1;
    $no2=1;
                if($data_get->num_rows()>0)
                {
              foreach ($data_get->result_array() as $db) { ?>
              <tr>
                <td><?php echo $no ?></td>
          <td>
            
          <a class="btn small-box" rel="group" href="<?php echo base_url().'farmasi/apt_supplier/edit/'.$db['id_supplier'];?>"><i class="icon-edit"></i> Edit</a>
          <a class="btn btn-small" href="<?php echo base_url().'farmasi/apt_supplier/delete/'.$db['id_supplier'];?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $db['nama_supplier'] ?> ?');"><i class="icon-trash"></i> Delete</a>
          <a class="btn small-box" rel="group" href="<?php echo base_url().'farmasi/apt_supplier/detail/'.$db['id_supplier'];?>"><i class="icon-share"></i> Detail</a>
                     </td>
          <td><?php echo $db['nama_supplier']; ?></td>
          <td><?php echo $db['alamat_supplier']; ?></td>
          <td><?php echo $db['cp']; ?></td>
          <td><?php echo $db['bank_no']; ?></td>
          
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
          <td colspan="9">Tidak Ada Data Supplier Obat</td>
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
