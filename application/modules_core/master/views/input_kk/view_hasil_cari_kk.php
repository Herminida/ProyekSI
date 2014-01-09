<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Kecamatan</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/layout1.css" type="text/css" />
</head>
<body>
<div id="container">
    <table>
        <tr>
            <td>Aksi</td>
            <td>No KK</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td>RT/RW</td>
        </tr>
    <?php
foreach ($tampil as $row):
    echo form_open('input_kk/addanggotakklama');
          echo " <input type=hidden name=id value=$row[id]>";
          echo " <input type=hidden name=no_kk value=$row[no_kk]>";
          echo " <input type=hidden name=nama_kk value=$row[nama_kk]>";
    ?>
        <tr>
            <td><input type="submit" value="Tambah Anggota"></td>
            <td><?php echo $row['no_kk']; ?></td>
            <td><?php echo $row['nama_kk']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['rt']; ?>/<?php echo $row['rw']; ?></td>
        </tr>
    <?php
    echo form_close();
endforeach;
    ?>
    </table>
</div>
</body>
</html>


