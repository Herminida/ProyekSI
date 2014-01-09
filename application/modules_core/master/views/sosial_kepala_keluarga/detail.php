<html>
<head>
  <title></title>
</head>
<body>
  <div id="real">
    <div id="statusdonor">
      <?php foreach ($kepala_keluarga->result_array() as $kk) { ?>
         
      <table class="table">
          
          <tbody>
            <tr>
                <td>Nomer KK</td>
                <td>:</td>
                <td>
                  <?php
                    echo $kk['no_kk'];
                  ?>
                </td>
                
            </tr>

            <tr>
                <td>Nama Kepala Keluarga</td>
                <td>:</td>
                <td>
                  <?php
                    echo $kk['nama_kk'];
                  ?>
                </td>
              
               
            </tr>

          </tbody>

         </table>
     <a href="<?php echo base_url();?>loket/sosial_anggota_keluarga/add/<?php echo $kk['id'];?>/<?php echo $kk['nama_kk'];?>" class="btn btn-small  ">Tambah Anggota</a>
<br><br>

        <table class="table table-striped">

            <thead>
              <th>No</th>
        <th style="width:20%">Aksi</th>
        <th>Nik</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Ayah</th>
        <th>Ibu</th>
        
            </thead>

            <tbody>
              <?php
        $no = 1;
        if($anggota_keluarga->num_rows()>0)
        {
          foreach($anggota_keluarga->result_array() as $data)
          {
        ?>
        
        <tr>
          <td><?php echo $no ; ?> </td>
          <td>
            <a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/admission_registrasi/index/<?php echo $data['id']; ?>">Reg</a>
            <a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_anggota_keluarga/edit/<?php echo $data['id']; ?>"><i class="icon-wrench  "></i></a>
            <a class='btn btn-small  ' href="<?php echo base_url(); ?>loket/sosial_anggota_keluarga/delete/<?php echo $kk['id']; ?>/<?php echo $kk['no_kk']; ?>/<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin ingin mengahapus <?php echo $data['nama_anggota'] ?> ?');"><i class="icon-remove"></i></a>
          </td>

          <td><?php echo $data['nik']; ?></td>
          <td><?php echo $data['nama_anggota']; ?></td>
          <td><?php echo $data['tempat_lahir']; ?></td>
          <td><?php echo $data['tanggal']; ?></td>
          <td><?php echo $data['sex']; ?></td>
          <td><?php echo $data['nama_ayah']; ?></td>
          <td><?php echo $data['nama_ibu']; ?></td>
        </tr>

        


        <?php
        $no++;

          }

        }
        else
        {
          ?>
          
        <tr style="text-align:center;">
          <td colspan="9">Tidak Ada Data Anggota Keluarga</td>
        </tr>
          <?php
        }
      ?>

            </tbody>
        </table>

      <a href="<?php echo base_url();?>loket/sosial_kepala_keluarga" class="btn btn-small  ">Kembali</a>


      <?php
      }
      ?>

    </div>

  </div>

</body>
</html>