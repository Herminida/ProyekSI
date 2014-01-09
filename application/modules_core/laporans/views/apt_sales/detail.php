<div id="real">
	<div id="statusdonor">
		<div><b>::.DATA SALES OBAT </b> 
			<b style="float:right; margin-right:130px; color:red;"><?php echo validation_errors(); ?></b>
		</div>
		
		</table>
		<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
		<table width="100%" class="table table-striped">
			<thead>
    			<tr> 
        			<th colspan="3"> Data detail sales obat</th>
      			</tr>
      		</thead>
      		<tr>
				<td width="30%">Nama Supplier</td>
				<td>:</td>
				<td><?php echo $supplier_id; ?></td>
			</tr>
			<tr>
				<td width="30%">Nama Sales</td>
				<td>:</td>
				<td><?php echo $nama_sales; ?></td>
			</tr>
			<tr>
				<td width="30%">Alamat Sales</td>
				<td>:</td>
				<td><?php echo $alamat_sales; ?></td>
			</tr>
			<tr>
				<td width="30%">Kota</td>
				<td>:</td>
				<td><?php echo $nama_kota; ?></td>
			</tr>
			<tr>
				<td width="30%">Telepon</td>
				<td>:</td>
				<td><?php echo $telepon; ?></td>
			</tr>
			<tr>
				<td width="30%">Opsi Nominal</td>
				<td>:</td>
				<td><?php echo $opsi_nominal; ?></td>
			</tr>
			<tr>
				<td width="30%">Opsi Komisi</td>
				<td>:</td>
				<td><?php echo $opsi_komisi; ?></td>
			</tr>
			<tr>
				<td width="30%">Jumlah</td>
				<td>:</td>
				<td><?php echo $jumlah;?></td>
			</tr>
		</table>
		<a href="<?php echo base_url(); ?>farmasi/apt_sales" class="btn btn-small btn-success">Kembali</a>			
</div>
</div>