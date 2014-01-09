<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title></title>
    

            

             </head>
    <body>

<div id="real">
    <div id="statusdonor">
        <table class="table">
       
            <tr>
                <td width="90%"><b>::. DETAIL TUNJANGAN PEGAWAI RS KALIWATES JEMBER</b></td>
                
            </tr>
        
        </table>

        <table>
        	<tbody>
                 <?php foreach ($detail_pegawai->result_array() as $h) { ?>
        		
        		<tr>
        			<td>NIP PEGAWAI</td>
        			<td>:</td>
        			<td><?php echo $h['nip_pegawai']; ?>
                    </td>
                   
        		</tr>
        		<tr>
        			<td>NAMA PEGAWAI</td>
        			<td>:</td>
        			<td><?php echo $h['nama_pegawai']; ?></td>
                     
        		</tr>
                <tr>
                    <td>JABATAN</td>
                    <td>:</td>
                    <td><?php echo $h['nama_jabatan']; ?></td>
                     
                </tr>
                 <!-- <tr>
                    <td>Nama Tunjangan</td>
                    <td>:</td>
                    <td><?php echo $nama_tunjangan ?></td>
                    <td>:</td>
                    <td><?php echo $nilai_tunjangan ?></td>
                     
                </tr>
               -->

        		 <?php
      }
      ?>
        		
        	</tbody>
        </table>
    </br>

    <table class="table table-striped">
         <tbody>
              <?php
        $no = 1;
        if($detail_tunjangan_pegawai->num_rows()>0)
        {
          foreach($detail_tunjangan_pegawai->result_array() as $data)
          {
        ?>
        
        <tr>
          
          <td><?php echo $no ; ?> </td>
          <td><?php echo $data['nama_tunjangan']; ?></td>
          <td>
            <label id="nilai_tunjangan<?php echo $no ; ?>"><?php echo $data['nilai_tunjangan']; ?></label>
            
          </td>
         
           
         


          
        </tr>

        


        <?php
        $no++;

          }

        }
        else
        {
          ?>
          
        <tr style="text-align:center;">
          <td colspan="6">Tidak Ada Tunjangan</td>
        </tr>
          <?php
        }
      ?>

            </tbody>
        </table>
    </table>

        

        
        
        
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap-responsive.min.css" />
</body>
</html>
