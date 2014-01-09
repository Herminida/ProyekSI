<script type="text/javascript">
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

	    $("#tampilkan").click(function(){
	    	var bulan=$("#bln").val();
        	var tahun=$("#thn").val();
        	$.ajax({
            type:"POST",
            url:"<?php echo base_url();?>hrd/sinkronisasi_absensi/tampil",
            data:"bulan="+bulan+"&tahun="+tahun,
            success:function(data){
                $("#tampil").html(data);
            }
        });  
	    });
	});
</script>
<h2>Sinkronisasi Absensi</h2><hr>
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

<button class="btn" id="tampilkan" style="margin-bottom:5px;"> Tampilkan</button>

<div style="border: solid 1px #999fff; width: 300px; padding: 20px; margin-top:-10px; margin-bottom:10px; margin-left:550px;">
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