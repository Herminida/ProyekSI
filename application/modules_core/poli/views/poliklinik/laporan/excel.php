<?php
//$data['poli']=$poli;
$files = $judul.".xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=" . $files);
?>
<?php $this->load->view($file); ?>