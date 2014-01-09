<html>
<head>
	<title></title>

<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
	  <?php foreach ($apotek_pengeluaran_header->result_array() as $h) { ?>
        
      <table class="table table-bordered" >
          
          <tbody>
            <tr>
                <td>No Resep</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['no_resep'];
                  ?>
                  
                </td>
                
            </tr>
            <tr>
                <td>Nama Dokter</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['nama_dokter'];
                  ?>
                  
                </td>
                
            </tr>

            <tr>
                <td>Nama Klinik</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['nama_klinik'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Tanggal Periksa</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['tanggal_registrasi'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['nama_anggota'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Nomer Rekam Medis</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['no_rm'];
                  ?>
                </td>
              
               
            </tr>
            
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['sex'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Umur</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['umur'];
                  ?>
                </td>
              
               
            </tr>
            
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['alamat'];
                  ?>
                </td>
              
               
            </tr>

            

           
        </tbody>
    </table>

    <table class="table table-striped">

            <thead>
              <th>No</th>
		      <th width="250px">Nama Obat</th>
          <th width="60px">Jumlah</th>
		      <th width="60px">Aturan Pakai</th>
          	  <th>Keterangan</th>
		      
        
        
            </thead>

            <tbody>
              <?php
        $no = 1;
        if($detail_apotek_pengeluaran->num_rows()>0)
        {
          foreach($detail_apotek_pengeluaran->result_array() as $data)
          {
        ?>
        
        <tr>
        	<td><?php echo $no ?></td>
        	<td><?php echo $data['nama_obat']; ?></td>
          <td><?php echo $data['jumlah']; ?></td>
        	<td><?php echo $data['segma']; ?></td>
        	<td><?php echo $data['ket_resep']; ?></td>

        </tr>

        


        <?php
        $no++;

          }

        }
        else
        {
          ?>
          
        <tr style="text-align:center;">
          <td colspan="6">Tidak Ada Obat</td>
        </tr>
          <?php
        }
      ?>

            </tbody>
        </table>
    
    <?php
	}
	?>


	<a class="btn btn-small" onclick="javascript:window.print()"><i class="icon icon-print"></i> Cetak</a>


</body>
</html>