<div id="real">
  <div id="statusdonor">
    <div><b>::. DATA CARI SUMBER OBAT </b> 
    </div>
    
    <center><b style=" margin-right:130px; color:red;"><?php echo $this->session->flashdata('confirm'); ?></b></center>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Aksi</th>
          <th>Sumber</th>
        </tr>
      </thead>
      <tbody>
          <?php
          $no=0;
         
          foreach($data_get->result_array() as $dp)
          { $no++;
          ?>
          <tr>
              <td><?php echo $no; ?></td> 
              <td>
              <a href="<?php echo base_url(); ?>farmasi/apt_sumber/edit/<?php echo $dp['id_sumber']; ?>" class="btn btn-small"><i class="icon-wrench"></i></a>
              <a href="<?php echo base_url(); ?>farmasi/apt_sumber/delete/<?php echo $dp['id_sumber']; ?>" class="btn btn-small" onClick="return confirm('Anda yakin menghapus data <?php echo $dp['nama_sumber'];?>???');"><i class="icon-remove"></i></a>
              </td>
              <td><?php echo $dp['nama_sumber']; ?></td>
          </tr>
        <?php
         $nama=$dp['nama_sumber'];
      }
      ?>
      </tbody>
  </table>
  <?php
      if (empty($nama)){
          echo "Data tidak ada";
        }
  ?><br>
  <a href="<?php echo base_url();?>farmasi/apt_sumber" class="btn btn-small">Kembali</a>
  <div class="pagination pagination-centered">
    <ul>
    <?php
      echo $paginator;
    ?>
    </ul>
  </div>

    
</div>
</div>