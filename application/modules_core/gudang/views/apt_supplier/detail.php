<div id="real">
	<div id="statusdonor">
		<div><b>::.DATA SUPPLIER OBAT </b> 
			<b style="float:right; margin-right:130px; color:red;"><?php echo validation_errors(); ?></b>
		</div>
		
		</table>
		<center><b style="float:center;  color:red;"><?php echo $this->session->flashdata('message'); ?></b></center>
		<table width="100%" class="table table-striped">
			<thead>
    			<tr> 
        			<th colspan="3"> Data detail supplier obat</th>
      			</tr>
      		</thead>
			<tr>
				<td width="30%">Nama Supplier</td>
				<td>:</td>
				<td><?php echo $nama_supplier ?></td>
			</tr>
			<tr>
				<td width="30%">Alamat Supplier</td>
				<td>:</td>
				<td><?php echo $alamat_supplier ?></td>
			</tr>
			<tr>
				<td width="30%">Kota</td>
				<td>:</td>
				<td><?php echo $nama_kota ?></td>
			</tr>
			<tr>
				<td width="30%">Kode Pos</td>
				<td>:</td>
				<td><?php echo $kodepos ?></td>
			</tr>
			<tr>
				<td width="30%">Telepon</td>
				<td>:</td>
				<td><?php echo $telp ?></td>
			</tr>
			<tr>
				<td width="30%">Bank</td>
				<td>:</td>
				<td><?php echo $bank ?></td>
			</tr>
			<tr>
				<td width="30%">Bank No</td>
				<td>:</td>
				<td><?php echo $bank_no?></td>
			</tr>
			<tr>
				<td width="30%">Bank An</td>
				<td>:</td>
				<td><?php echo $bank_an?></td>
			</tr>
			<tr>
				<td width="30%">Contact</td>
				<td>:</td>
				<td><?php echo $cp ?></td>
			</tr>
			<tr>
				<td width="30%">Email</td>
				<td>:</td>
				<td><?php echo $email ?></td>
			</tr>
			
		</table>
		<a href="<?php echo base_url(); ?>farmasi/apt_supplier" class="btn btn-small">Kembali</a>			
</div>
</div>