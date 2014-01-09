<div id="real">
  <div id="statusdonor">
    <div><b>::. DATA SUMBER OBAT </b> 
    </div>
    <table class="table">
      <?php echo form_open("farmasi/apt_sumber/search",'class="navbar-form pull-right"'); ?>
      <tr>
        <td width="50%"><a href="<?php echo base_url();?>farmasi/apt_sumber/add" class="btn btn-small btn-success">Tambah sumber</a></td>
        <td><input type="text" class="span3" placeholder="Masukkan kata kunci..." name="cari"></td>
        <td><button type="submit" class="btn btn-small btn-success"><i class="icon-search icon-white"></i> Cari Data</button></td>
      </tr>
    </table>
    <center><b style=" margin-right:130px; color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
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
              <a href="<?php echo base_url(); ?>farmasi/apt_sumber/edit/<?php echo $dp['id_sumber']; ?>" class="btn btn-small btn-success"><i class="icon-wrench icon-white"></i></a>
              <a href="<?php echo base_url(); ?>farmasi/apt_sumber/delete/<?php echo $dp['id_sumber']; ?>" class="btn btn-small btn-warning" onClick="return confirm('Anda yakin menghapus data <?php echo $dp['nama_sumber'];?>???');"><i class="icon-remove"></i></a>
              </td>
              <td><?php echo $dp['nama_sumber']; ?></td>
          </tr>
        <?php
      }
      ?>
      </tbody>
  </table>
  <div class="pagination pagination-centered">
    <ul>
    <?php
      echo $paginator;
    ?>
    </ul>
  </div>

    
</div>
</div>
<?php 
$pesan = $this->session->flashdata('message');
        if ($this->session->flashdata('message')){
echo "<script>alert('$pesan')</script>";
        }
      
      ?>