   <script type="text/javascript">
$(document).ready(function() {
// Create two variable with the names of the months and days in an array
var monthNames = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ]; 
var dayNames= ["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"]

// Create a newDate() object
var newDate = new Date();
// Extract the current date from Date object
newDate.setDate(newDate.getDate());
// Output the day, date, month and year   
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

setInterval( function() {
 // Create a newDate() object and extract the seconds of the current time on the visitor's
 var seconds = new Date().getSeconds();
 // Add a leading zero to seconds value
 $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
 },1000);
 
setInterval( function() {
 // Create a newDate() object and extract the minutes of the current time on the visitor's
 var minutes = new Date().getMinutes();
 // Add a leading zero to the minutes value
 $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
 
setInterval( function() {
 // Create a newDate() object and extract the hours of the current time on the visitor's
 var hours = new Date().getHours();
 // Add a leading zero to the hours value
 $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000); 
});
</script>

<style type='text/css'>
.clock {
    width: 230px;
    margin: 0 auto;
    padding: 30px;
    color: #000;
    background:#fff;
    float: right;
/*    box-shadow: inset 0 0 10px 12px #222;
   -moz-box-shadow: inset 0 0 10px 12px #222;
   -webkit-box-shadow: inset 0 0 10px 12px #222;
   overflow: hidden;*/
    }
.clock ul {
    width:230px;
    margin: 0 auto;
    padding: 0;
    list-style: none;
    text-align: center
    }

.clock ul li {
    display: inline;
    font-size: 30px;
    text-align: center;
    font-family: "Arial", Helvetica, sans-serif;
    text-shadow: 0 1px 1px #333, 0 1px 1px #333, 0 1px 1px #333
    }
#Date { 
font-family: 'Arial', Helvetica, sans-serif;
font-size: 25px;
text-align: center;
text-shadow: 0 1px 1px #333, 0 1px 1px #333;
padding-bottom: 20px;
}

#point {
    position: relative;
    -moz-animation: mymove 1s ease infinite;
    -webkit-animation: mymove 1s ease infinite;
    padding-left: 10px;
    padding-right: 10px
    }

/* Simple Animation */
@-webkit-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; } 
}

@-moz-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; } 
}
#main-wrapper, #outer-wrapper, .post h3 {
background: transparent;
border: none
}
</style>
<table style="width:100%;">
<tr>
<td><h2>Absensi Pegawai</h2></td>
	<td>
			<div class="clock">
			<div id="Date"></div>
     <ul>
          <li id="hours"></li>
          <li id="point">:</li>
          <li id="min"></li>
          <li id="point">:</li>
          <li id="sec"></li>
      </ul>
</div>
	</td>
</tr>
</table>



<hr>
<SCRIPT TYPE="text/javascript">

$(document).ready(function(){
	$("#nip_pegawai").focus();
});

function tampil(){
        $.ajax({
                url :"<?php echo base_url();?>hrd/absensi/tampil",
                success : function (data) {
                   $("#tampil_absensi").html(data);
                }
            });
    }

    tampil();
function submitenter(myfield,e)
    {
        var keycode;
        if (window.event) keycode = window.event.keyCode;
        else if (e) keycode = e.which;
        else return true;

        if (keycode == 13)
        {	var nip_pegawai=$("#nip_pegawai").val();
            $("#nip_pegawai").val("");
            $.ajax({
            	type:"POST",
                url :"<?php echo base_url();?>hrd/absensi/add",
                data:"nip_pegawai="+nip_pegawai,
                success : function (data) {
                    alert(data);
                    tampil();
                }
            });
            return false;
        }
        else
            return true;
    }
//-->
</SCRIPT>
    NIP Pegawai : <INPUT NAME="nip_pegawai" id="nip_pegawai" TYPE="Text" onKeyPress="return submitenter(this,event)"><BR>
    * Tekan Enter untuk memproses
    <br><br>
    <h3>20 Data terakhir yang absen.</h3><br><br>
    <div id="tampil_absensi"></div>
