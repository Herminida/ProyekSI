<html>
<head>
	<title></title>

<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
	  <?php foreach ($farmasi_penerimaan_header->result_array() as $h) { ?>
        
      <table class="table table-bordered" >
          
          <tbody>
            <tr>
                <td>No Nota</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['no_nota'];
                  ?>
                  
                </td>
                
            </tr>
            <tr>
                <td>Tanggal Terima</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['tanggal'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Sumber</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['nama_sumber'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Supplier</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['nama_supplier'];
                  ?>
                </td>
              
               
            </tr>

            <tr>
                <td>Sales</td>
                <td>:</td>
                <td>
                  <?php
                    echo $h['nama_sales'];
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
          	  <th>Keterangan</th>
		      
        
        
            </thead>

            <tbody>
              <?php
        $no = 1;
        if($detail_farmasi_penerimaan->num_rows()>0)
        {
          foreach($detail_farmasi_penerimaan->result_array() as $data)
          {
        ?>
        
        <tr>
        	<td><?php echo $no ?></td>
        	<td><?php echo $data['nama_obat']; ?></td>
        	<td><?php echo $data['jumlah']; ?></td>
        	<td><?php echo $data['keterangan']; ?></td>

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