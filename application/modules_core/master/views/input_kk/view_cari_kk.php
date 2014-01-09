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
    <?php echo form_open('cari_kk/get_kk'); ?>
    <table>
        <tr>
            <th colspan="2">Silahkan cari no atau nama dari Kartu Keluarga</th>
        </tr>
        <tr>
            <td>Nomor KK</td><td><input name="no_kk" id="no_kk" size="30"> Atau </td>
        </tr>
        <tr>
            <td>Nama KK</td><td><input name="nama_kk" id="nama_kk" size="30"> <input type="submit" value="Cari"></td>
        </tr>
            <?php echo form_close(); ?>
        <tr>
            <td colspan="2">
                <?php echo form_open('input_kk'); ?>
                <input type="submit" value="Tambah Data Baru">
                <?php echo form_close(); ?>
            </td>
        </tr>
    </table>
</div>
</body>
</html>