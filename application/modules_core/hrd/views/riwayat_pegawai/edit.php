<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title></title>
    

            <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css" />
            <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap-responsive.min.css" />
     
         
            <script src="<?php echo base_url();?>js/jquery-1.8.3.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script> <!-- Untuk Textarea -->
            <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/main.js"></script> <!-- Untuk Textarea -->
            <link href="<?php echo base_url(); ?>asset/redactor/redactor.css" rel="stylesheet" type="text/css" />  <!-- Untuk Textarea -->
            <script src="<?php echo base_url(); ?>asset/redactor/redactor.min.js" type="text/javascript"></script> <!-- Untuk Textarea -->
            
      

            
            <script type="text/javascript">

            $(document).ready(function(){

             
                 $('#riwayat').redactor();  /*Untuk Textarea*/


                
            
             

              

            });


            </script>
    

 




   </head>
    <body>

<div id="real">
    <div id="statusdonor">
        <table class="table">
       
            <tr>
                <td width="90%"><b>::. TAMBAH ATAU EDIT DATA RIWAYAT PEGAWAI RS KALIWATES JEMBER</b></td>
                
            </tr>
        
        </table>

        <table>
        	<tbody>
        		
        		<tr>
        			<td>NIP PEGAWAI</td>
        			<td>:</td>
        			<td><?php echo $nip_pegawai ?></td>
                    <td rowspan=11><img src="<?php echo base_url()?>images/pegawai/medium/<?php echo $gambar ?>" width="300" ></td>
        		</tr>
        		<tr>
        			<td>NAMA PEGAWAI</td>
        			<td>:</td>
        			<td><?php echo $nama_pegawai ?></td>
                     
        		</tr>
                <tr>
                    <td>JABATAN</td>
                    <td>:</td>
                    <td><?php echo $nama_jabatan ?></td>
                     
                </tr>
                <tr>
                    <td>STATUS</td>
                    <td>:</td>
                    <td><?php echo $status ?></td>
                     
                </tr>
                <tr>
                    <td>JENIS KELAMIN</td>
                    <td>:</td>
                    <td><?php echo $jenis_kelamin ?></td>
                     
                </tr>
                 <tr>
                    <td>TEMPAT LAHIR</td>
                    <td>:</td>
                    <td><?php echo $tempat_lahir ?></td>
                     
                </tr>
                <tr>
                    <td>TANGGAL LAHIR</td>
                    <td>:</td>
                    <td><?php echo $tgl_lahir ?></td>
                     
                </tr>
                 <tr>
                    <td>AGAMA</td>
                    <td>:</td>
                    <td><?php echo $nama_agama ?></td>
                    
                </tr>
                <tr>
                    <td>ALAMAT</td>
                    <td>:</td>
                    <td><?php echo $alamat ?></td>
                    
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td>:</td>
                    <td><?php echo $email ?></td>
                    
                </tr>
                <tr>
                    <td>No Hp/Telepon</td>
                    <td>:</td>
                    <td><?php echo $telepon ?></td>
                    
                </tr>
                

        		
        		
        	</tbody>
        </table>
    </br>
        <?php echo form_open('hrd/riwayat_pegawai/edit','class="form-horizontal"'); ?>
        <table>
            <tbody>
                <tr>
                    <td>Riwayat</td>
                    <td>:</td>
                    <td>
                         <textarea name="riwayat" id="riwayat" cols="50" rows="6" ><?php echo $riwayat; ?></textarea>
                    </td>
                    
                </tr>
                <input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $id_pegawai ?>">
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> 
                    <input type="submit" class="btn btn-small" id="simpan" value="Simpan">
                    <!-- <INPUT Type="button" class="btn btn-small" VALUE="Kembali" onClick="history.go(-1);return true;"> -->

                </td>
                <td>&nbsp;</td>
                
                </tr>
            </tbody>
        </table>
        <?php echo form_close();?>

        
        
        
    </div>
</div>
