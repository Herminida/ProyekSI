<html>
<head>
	<title></title>

<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
	  

<table class="table table-bordered" >

          <thead>
            <tr>
              <td>::. Registrasi Pasien .::</td>
            </tr>
          </thead>  
          <?php foreach ($cetakregistrasi->result_array() as $h) { ?>
          <tbody>

            <tr>
                <td>No Registrasi</td>
                <td><?php echo $h['id_reg'] ?></td>
            </tr>

            <tr>
                <td>Nama Pasien</td>
                <td><?php echo $h['nama_anggota']?></td> 
            </tr>

            <tr>
                <td>Alamat</td>
                <td><?php echo $h['alamat']?></td> 
            </tr>
           
            <tr>
                <td>Poly</td>
                <td><?php echo $h['nama_klinik']?></td> 
            </tr>

            <tr>
                <td>Cara Bayar</td>
                <td><?php echo $h['cara_bayar']?></td> 
            </tr>

            <tr>
                <td>Nomer Antrian</td>
                <td><?php echo $h['nomor_antrian']?></td> 
            </tr>


           

            

            
        </tbody>
    </table>
    <?php
  }
  ?>
	<a class="btn btn-small" onclick="javascript:window.print()"><i class="icon icon-print"></i> Cetak</a>


</body>
</html>