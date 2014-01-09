<html>
<head>
  <title></title>
</head>
<body>
  <div id="real">
    <div id="statusdonor">
      <div><b>::.Data Operators</b></div>
      <table class="table">
        <?php echo form_open('master/users_operators/search','class="navbar-form pull-right"');?>
        <tr>
          <td width="80%"><a href="<?php echo base_url();?>master/users_operators/add" class="btn btn-small">Tambah Operator</a></td>
          <td><input type"text" name="keysearch" placeholder="Masukkan Kata Kunci.."></td>
          <td><button type="submit" class="btn btn-small"><i class="icon icon-search"></i> Cari</button></td>
        </tr>
        <?php echo form_close(); ?>
      </table>
      <center><b style="color:red"><?php echo $this->session->flashdata('message') ?></b></center>
       <ul>
            <?php
              echo $paginator;
            ?>
            </ul>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th colspan="2" width="12%">Aksi</th>
            <th>Group</th>
            <th>Nama Operator</th>
            
            

          </tr>
        </thead>
        <tbody>
          <?php
          $no=1; 
            foreach ($users_operators_data->result_array() as $data) { ?>
            <tr>
              <td><?php echo $no ?></td>
              <td colspan="2">
                <a href="<?php echo base_url();?>master/users_operators/edit/<?php echo $data['id']; ?>" class="btn btn-small" ><i class="icon-wrench"></i></a>
                <a href="<?php echo base_url();?>master/users_operators/delete/<?php echo $data['id']; ?>" class="btn btn-small" onclick="return confirm('Apakah Anda Yakin Ingin Mengahapus <?php echo $data['nama_users_operators']; ?> ?')" ><i class="icon-remove"></i></a>

              </td>
              
              <td><?php echo $data['nama_users_groups']; ?></td>
              <td><?php echo $data['nama_users_operators'] ?></td>
              
            </tr>

            <?php
            $no++;  
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="pagination pagination-centered">
            <ul>
            <?php
              echo $paginator;
            ?>
            </ul>
        </div>
  <?php 
$pesan = $this->session->flashdata('message');
        if ($this->session->flashdata('message')){
echo "<script>alert('$pesan')</script>";
        }
      
      ?>

</body>
</html>