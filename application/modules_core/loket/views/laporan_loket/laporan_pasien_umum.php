<script type="text/javascript">
$(document).ready(function(){
    function pengaturan_awal(){
        $("#tgl").attr('disabled',true);
        $("#bln").attr('disabled',true);
        $("#thn").attr('disabled',true);
        $("#tampilkan").attr('disabled',true);
        $("#perhari").attr('checked',false);
        $("#perbulan").attr('checked',false);
    }
    pengaturan_awal();
    $("#perhari").click(function(){
        $("#tgl").attr('disabled',false);
        $("#bln").attr('disabled',false);
        $("#thn").attr('disabled',false);
        $("#tampilkan").attr('disabled',false);
    });
    $("#perbulan").click(function(){
        $("#tgl").attr('disabled',true);
        $("#bln").attr('disabled',false);
        $("#thn").attr('disabled',false);
        $("#tampilkan").attr('disabled',false);
    });
    $("#tampilkan").click(function(){
        var tanggal=$("#tgl").val();
        var bulan=$("#bln").val();
        var tahun=$("#thn").val();
        if($("#perhari").is(":checked")){
          var pilihan=$("#perhari").attr('value');
        }
        else if($("#perbulan").is(":checked")){
          var pilihan=$("#perbulan").attr('value');
        }
        $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>loket/laporan_loket/laporan_pasien_umum",
            data:"tanggal="+tanggal+"&bulan="+bulan+"&tahun="+tahun+"&pilihan="+pilihan,
            success:function(data){
                $("#tampil").html(data);
                pengaturan_awal();
            }
        });  
    });

    $(document).ready(function(){
    $("#btn-print").live("click",function(){
        var mode = $("input[name='mode']:checked").val();
        var close = mode == "popup" && $("input#closePop").is(":checked")
        var options = { mode : mode, popClose : close, popHt:600,popWd:1000,popX:0,popY:0};
        $("#tampil").printArea(options);
    });
    $("input[name='mode']").click(function(){
            if ( $(this).val() == "iframe" ) $("#closePop").attr( "checked", false );
        });
});
});
</script>
<h2>Laporan Pasien Umum</h2>
<hr>
<label class="radio inline">
    <input type="radio" name="pilihan" id="perhari" value="perhari"> Per Hari
</label>
<label class="radio inline">
    <input type="radio" id="perbulan" name="pilihan" value="perbulan"> Per Bulan
</label><br><br>
<?php
    echo "<select name='tgl' id='tgl' style=width:60px;>";
       for($i=1; $i<=31; $i++){
            if($i==date('d')){
                if(strlen($i)==1){
                    echo "<option selected=selected value=0$i>0$i</option>";
                }else{
                    echo "<option selected=selected value=$i>$i</option>";
                }

            }else {
                if(strlen($i)==1){
                    echo "<option value=0$i>0$i</option>";
                }else{
                    echo "<option value=$i>$i</option>";
                }
            }
        }
    echo "</select>";
?>

<?php
    echo "<select name='bln' id='bln' style=width:105px;>";
    $bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",);
        for($bln=1;$bln<=12; $bln++){
            if($bln==date('m')){
                if(strlen($bln)==1){
                    echo "<option selected=selected value=0$bln>$bulan[$bln]</option>";
                }else{
                    echo "<option selected=selected value=$bln>$bulan[$bln]</option>";
                }
            }else {
                if(strlen($bln)==1){
                    echo "<option value=0$bln>$bulan[$bln]</option>";
                }else{
                    echo "<option value=$bln>$bulan[$bln]</option>";
                }
            }
        }
    echo "</select>";
?>
                      
<?php
    echo "<select name='thn' id='thn' style=width:83px;>";
        for($thn=1900; $thn<=date("Y"); $thn++){
            if($thn==date('Y')){
                echo "<option selected=selected value=$thn>$thn</option>";
            }else {
                echo "<option value=$thn>$thn</option>";
            }
        }
    echo "</select>"
?>

<button id="tampilkan" class="btn" style="margin-bottom:5px;">Tampilkan</button> 
<div style="border: solid 1px #999fff; width: 300px; padding: 20px; margin-top:-50px; float:right;">
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
<div id="tampil"></div>
                 