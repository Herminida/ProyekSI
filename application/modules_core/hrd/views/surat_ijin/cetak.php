<script type="text/javascript">
    $(document).ready(function(){
    $("#btn-print").click(function(){
        var mode = $("input[name='mode']:checked").val();
        var close = mode == "popup" && $("input#closePop").is(":checked")
        var options = { mode : mode, popClose : close, popHt:800,popWd:1000,popX:0,popY:0};
        $("#tampil").printArea(options);
    });
    $("input[name='mode']").click(function(){
            if ( $(this).val() == "iframe" ) $("#closePop").attr( "checked", false );
    });
});
</script>
<?php
    foreach ($pegawai->result_array() as $tampil) {
?>
<div id="tampil" style="border: solid 1px #999fff; width: 900px; padding: 20px;">
    <div align="center">
        <table border="0" width="850px;">
            <tr>
                <td rowspan="2"><img src="<?echo base_url();?>images/logo_rs.jpg"></td>
                <td width="800px;"><div align="center" > <h2><b>Rumah Sakit Kaliwates</h2></b></div></td>
                <td rowspan="2"></td>
            </tr>
            <tr>
                <td><div align="center">Jl. Diah Pitaloka no.4A, Jember</div></td>
            </tr>
        </table>
    </div>
    <hr><br>
    Perihal : Permohonan Ijin Tidak Masuk Kerja<br><br>
    Kepada Yth :<br><br><br><br>
    Dengan hormat,<br>
    Saya yang bertanda tangan di bawah ini:<br>
    <table>
        <tr>
            <td width="100px;">Nama</td><td width="10px">:</td><td><?php echo $tampil['nama_pegawai'];?></td>
        </tr>
        <tr>
            <td width="100px;">Alamat</td><td width="10px">:</td><td><?php echo $tampil['alamat'];?></td>
        </tr>
        <tr>
            <td width="100px;">NIP Pegawai</td><td width="10px">:</td><td><?php echo $tampil['nip_pegawai'];?></td>
        </tr>
        <tr>
            <td width="100px;">Jabatan</td><td width="10px">:</td><td><?php echo $tampil['nama_jabatan'];?></td>
        </tr>
    </table><br>
    <p style="text-align: justify;">
        Bersama surat ini bermaksud mengajukan permohonan izin untuk tidak masuk kerja selama <?php echo $hari;?> hari,
        <?php
            if($tanggal_sampai==$tanggal_dari){
                ?>
                pada tanggal <?php echo formatTanggal($tanggal_dari);?> 
                <?php
            }
            else{
                ?>
                dimulai dari tanggal <?php echo formatTanggal($tanggal_dari);?> sampai tanggal <?php echo formatTanggal($tanggal_sampai);?> 
                <?php
            }
        ?>  
         dikarenakan <?php echo $keperluan?>. 
        <br>
        Demikian Surat izin ini saya sampaikan, mohon untuk dapat dimaklumi.<br>
         Atas perhatiaan serta izin yang diberikan, saya ucapkan terima kasih.
    </p><br>
     <div style="margin-left:700px; text-align:center;"> 
        Jember, <?php echo formatTanggal(date('Y-m-d'));?><br>
        Hormat saya,
        <br><br><br><br>
        <?php echo $tampil['nama_pegawai'];?>
    </div> 
</div>
<?php
}
?>
<br>
<button id="btn-print" class="btn" style="margin-bottom:5px;"><i class="icon icon-print"></i>Cetak</button><br> 
<div style="border: solid 1px #999fff; width: 300px; padding: 20px; float:left;">
            <div style="font-weight: bold;">Pengaturan Cetak</div>
            <table>
              <tbody><tr>
                <td><input value="popup" name="mode" id="popup" checked="" type="radio"> Dengan Popup</td>
              </tr>
              <tr>
                <td><input value="iframe" name="mode" id="iFrame" type="radio"> Dengan IFrame</td>
              </tr>
            </tbody></table>
        </div>
<br><br>
                 