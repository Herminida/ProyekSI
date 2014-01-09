<?php if($mode=='excel'){
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=laporan-kib-a.xls");
}
elseif($mode=='print'){?>
<html><head>
<?php }?>
<style>
.tbl td{
    font-size: 12px;
    font-family: verdana,arial,sans-serif,tahoma;
    padding: 1px 3px;
    color: #000000;
}
.tbl td h4{
    font-size: 16px;
    margin:5px 2px;
}
.brd td{
    border-right:#333333 solid 1px;
    border-bottom:#333333 solid 1px;
}
.brt{
    border-top:#333333 solid 1px;
}
.brl{
    border-left:#333333 solid 1px;
}
</style>
<?php if($mode=='print'){?>
</head><body onLoad="self.print();self.close();">
<?php }?>
<table class="tbl" cellspacing="0" width="800" style="border:#333333 solid 1px;background:#ffffff">
    <tr>
        <td colspan="4" align="left"><h4 style="font-size: 14px;">PENANGGULANGAN TB NASIONAL</h4></td>
        <td align="center" bgcolor="#CCCCCC"><h4 style="font-size: 14px;"><?php echo $data['no_rm_tb']?></h4></td>
    </tr>
    <tr>
        <td colspan="5" align="center"><h4>KARTU IDENTITAS PASIEN TB</h4></td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td colspan="4">: <?php echo $data['nama_anggota']?></td>
    </tr>
    <tr>
        <td>Alamat Lengkap</td>
        <td colspan="4">: <?php echo $data['alamat'].', '.$data['nama_kelurahan'].', '.$data['nama_kecamatan']?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td colspan="2">: <?php echo $data['jenis_kelamin']?></td>
        <td colspan="2">Umur : <?php echo $data['umur']?></td>
    </tr>
    <tr>
        <td>Nama UPK</td>
        <td colspan="2">: <?php echo $data['nama_unit_kerja']?></td>
        <td colspan="2">Telp. <?php echo $kpp['telepon']?></td>
    </tr>
    <tr>
        <td>No. Reg. TB.03 UPK </td>
        <td colspan="2">: <?php echo $kpp['reg_upk']?></td>
    </tr>
    <tr>
        <td>No. Reg. TB.03 Kab/Kota </td>
        <td colspan="2">: <?php echo $kpp['reg_kab']?></td>
        <td colspan="2">Propinsi : </td>
    </tr>
    <tr><td colspan="5">&nbsp;</td></tr>
    <tr class="brd">
        <td colspan="2" class="brt brl">Klasifikasi Pasien : <?php echo $kpp['klasifikasi']?></td>
        <td colspan="3" class="brt">Tgl Mulai Berobat : <?php echo $kpp['tgl']?></td>
    </tr>
    <tr><td colspan="5">&nbsp;</td></tr>
    <tr class="brd">
        <td colspan="2" class="brt brl">Tipe Pasien  : <?php echo $kpp['tipe_pasien']?></td>
        <td colspan="3" class="brt">Jenis Panduan Obat Yang Diberikan : </td>
    </tr>
    <tr>
        <td colspan="5">Catatan
            <br>1. Simpanlah kartu anda dan bawa selalu bila datang ke unit pelayanan kesehatan
            <br>2. Anda dapat sembuh jika mengikuti aturan pengobatan dengan menelan obat
            <br>3. Penyakit TB dapat menyebar ke orang lain bila tidak diobati teratur.
        </td>
    </tr>
    <tr>
        <td width="160"></td>
        <td width="220"></td>
        <td width=""></td>
        <td width="150"></td>
        <td width="100"></td>
    </tr>
</table>
<?php if($mode=='print'){?>
</body></html>
<?php }?>