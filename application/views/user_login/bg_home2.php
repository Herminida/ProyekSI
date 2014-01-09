
<html>
<head>
<title>RS JEMBER</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/todc-bootstrap.css" rel="stylesheet">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (sik tarakan.psd) -->
<table id="Table_01" width="1366" height="768" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="3">
			<img src="<?php echo base_url(); ?>asset/theme/images/sik-tarakan_01.jpg" width="1366" height="292" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="<?php echo base_url(); ?>asset/theme/images/sik-tarakan_02.jpg" width="496" height="476" alt=""></td>
		<td width="373" height="226">
			<table style="margin-left:30px;">
			<form name="form1" method="post" action="">
		  	<tr>
		  	<td>
			<p>username :</p>
			</td>		  
		    <td width="220px">
		      <input type="text" name="username" id="username" >
	        </td>
	    	</tr>
	    	<tr><td>
	        <p>password :</p>
	        </td>
	        <td>
	          <input type="password" name="password" id="password">
	          </td>
	      </tr>
	      <tr><td>
	        <p>sebagai :</p>
	        </td>
	        <td>
	          <select class="span3" name="log_as" id="as">
	<option value="">-- Pilih --</option>
	<option value="admin_dinkes">  Admin Dinkes  </option>
	<option value="admin_puskesmas">  Admin Puskesmas  </option>
	<option value="loket">  Loket  </option>
	<option value="farmasi">  Farmasi  </option>
	<option value="apotik">  Apotek  </option>
	<option value="laporans">  Laporan  </option>
	<option value="klinik">  Klinik  </option>
	<option value="gudang">  Gudang  </option>
</select>
	          </td>
	      </tr>
	      <tr><td></td><td>
		    <button type="submit" class="btn" name="enter" id="enter" value="Submit">Submit</button>
		</td>
	</tr>
	<tr>
		<br>
		<td colspan="2">
	    	<?php echo validation_errors(); ?>
<p><?php echo $this->session->flashdata("result_login"); ?></p>
</td>
</tr>
	    	</table>
		  </form>		  
		  
		<td rowspan="2">
			<img src="<?php echo base_url(); ?>asset/theme/images/sik-tarakan_04.jpg" width="497" height="476" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="<?php echo base_url(); ?>asset/theme/images/sik-tarakan_05.jpg" width="373" height="250" alt=""></td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</body>
</html>