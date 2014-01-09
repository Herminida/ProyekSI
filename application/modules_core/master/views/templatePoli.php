<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SIK Puskesmas Terpadu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Less use only-->
  <!-- <link href="<?php echo base_url();?>resource/css/default.less" rel="stylesheet/less" type="text/css"> -->
  <!-- Less  end-->

  <link href="<?php echo base_url();?>resource/css/bootstrap-formhelpers.css" rel="stylesheet" type="text/css">
  
  <link href="<?php echo base_url();?>resource/css/todc-bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/bootstrap-edit.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/bootstrap.min.css" rel="stylesheet" media="print" type="text/css">
  <link href="<?php echo base_url();?>resource/css/facebox.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/tabletools.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.datatables.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.jqplot.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.datatables.rowgrouping.css" rel="stylesheet" type="text/css">
    <!-- <link href="<?php echo base_url();?>resource/css/bootstrap-responsive.css" rel="stylesheet" type="text/css"> -->

  
  <style type="text/css"> 
  body {
    padding-top: 60px;
    padding-top: 41px;
  }
  .sidebar-nav {
    padding: 9px 0; 
  }
  </style>
  <script src ="<?php echo base_url();?>resource/js/jquery.js"></script>
    <script src ="<?php echo base_url();?>resource/js/datatablenightly.js"></script>
    <script src ="<?php echo base_url();?>resource/js/tabletools.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/jquery.datatables.rowgrouping.js"></script>
    <script src ="<?php echo base_url();?>resource/js/jquery.jqplot.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.json2.min.js"></script>

  <?php if($this->uri->segment(2)!='login'){?>
  <script type="text/javascript">
  /*
  function authomatic(){
    $.get('<?php echo site_url('poli/'.'login/auth')?>',function(data){
      // alert('Load was performed:'+data);
      if(data!='1'){
        alert('Session Habis, Silakan Login kembali');
        $(location).attr('href','<?php echo site_url('poli/'.'login')?>');
        window.location='<?php echo site_url('poli/'.'login')?>';
      }
    });
    setTimeout('authomatic()', 600000);
  }
  //$(function(){setTimeout('authomatic()', 10000);});
  */
  </script><?php }?>
</head>
<!-- body-start--><body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <div class="nav-collapse collapse">
        <div class="navbar-text pull-right">
          <?php if($this->session->userdata('username')){?>
          Logged in as <a href="<?php echo site_url('poli/'.'user/profil');?>" class="navbar-link" id="loginUsername"><b><?php echo $this->session->userdata('username')?></b></a> &nbsp;
          <a href="<?php echo site_url('login/'.'user_login/logout')?>" class="btn btn-danger btn-mini"><i class="icon-off icon-white"></i></a>
          <?php }else{?>
          <span class="text-warning">Not Login</span>
          <?php }?>
        </div>
        <ul class="nav">
          <?php 
        if($this->session->userdata('tipe_user')=='admin_dinkes'){
        ?>
          <li ><a href="<?php echo base_url().'loket';?>">Loket</a></li>
          <li ><a href="<?php echo base_url().'poli';?>">Poliklinik</a></li>
          <li><a href="<?php echo site_url('poli/home'.'tb');?>">TB</a></li>
          <li><a href="<?php echo site_url('poli/'.'labkesda_home');?>">Labkesda</a></li>
          <li ><a href="<?php echo base_url().'farmasi';?>">Farmasi</a></li>
          <li ><a href="<?php echo base_url().'gudang';?>">Gudang</a></li>
          <li ><a href="<?php echo base_url().'apotek';?>">Apotek</a></li>
          <li ><a href="<?php echo base_url().'laporans';?>">Laporans</a></li>
          <li class="active"><a href="<?php echo base_url().'master';?>">Data Master</a></li>
        <?php
        }else{
        ?>
          <li class="active"><a href="<?php echo base_url().'laporans';?>">Laporans</a></li>
        <?php } ?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div><!-- navbar-end-->
<div class="row"><!-- start main-->
  <div class="span12"><!--total spam-->
    <div class="row"><!-- main row -->
      <div class="span3" id="menuSidebar"><!--sidebar span-->
        <div class="sidebar-nav">
          <ul class="nav nav-list">
           <li class="nav-header" data-target="#master" data-toggle="collapse">USER MANAGEMENT</li>
            <div class="collapse" id="master">
               <li><?php echo anchor('/master/jabatan','Jabatan',(($this->uri->segment(2)=='jabatan')?'class="text-error"':''));?></li>
               <li><?php echo anchor('/master/pegawai','Pegawai',(($this->uri->segment(2)=='pegawai')?'class="text-error"':''));?></li>
               <li><?php echo anchor('/master/users_groups','Group',(($this->uri->segment(2)=='users_groups')?'class="text-error"':''));?></li>
               <li><?php echo anchor('/master/users_operators','Operator',(($this->uri->segment(2)=='users_operators')?'class="text-error"':''));?></li>
               <li><?php echo anchor('/master/users','User',(($this->uri->segment(2)=='users')?'class="text-error"':''));?></li>
               <li><?php echo anchor('/master/dokter','Dokter',(($this->uri->segment(2)=='dokter')?'class="text-error"':''));?></li>
                      
            </div>

            <li class="nav-header" data-target="#sosial" data-toggle="collapse">SOSIAL</li>
            <div class="collapse" id="sosial">
              <li><?php echo anchor('/master/sosial_agama','Agama',(($this->uri->segment(2)=='sosial_agama')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/master/sosial_pekerjaan','Pekerjaan',(($this->uri->segment(2)=='sosial_pekerjaan')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/master/sosial_pendidikan','Pendidikan',(($this->uri->segment(2)=='sosial_pendidikan')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/master/sosial_status_anggota','Status Anggota',(($this->uri->segment(2)=='sosial_status_anggota')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/master/admission_bayar','Admission Bayar',(($this->uri->segment(2)=='admission_bayar')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/master/sosial_kecamatan','Kecamatan',(($this->uri->segment(2)=='sosial_kecamatan')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/master/sosial_kelurahan','Kelurahan',(($this->uri->segment(2)=='sosial_kelurahan')?'class="text-error"':''));?></li>
              </div>
            <li class="nav-header" data-target="#icd" data-toggle="collapse">ICD X</li>
            <div class="collapse" id="icd">
              <li><?php echo anchor('/master/icdx/kelompok','ICD Kelompok',(($this->uri->segment(3)=='kelompok')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/master/icdx/subkelompok','ICD Sub Kelompok',(($this->uri->segment(3)=='subkelompok')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/master/icdx','ICD Penyakit',(($this->uri->segment(2)=='icdx'&&$this->uri->segment(3)=='')?'class="text-error"':''));?></li>
              </div>
            <li class="nav-header" data-target="#tindakan" data-toggle="collapse">TINDAKAN MEDIS</li>
            <div class="collapse" id="tindakan">
              <li><?php echo anchor('/master/tindakan/kelompok','Kelompok Tindakan',(($this->uri->segment(3)=='kelompok')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/master/tindakan','ICD Tindakan Medis',(($this->uri->segment(2)=='tindakan'&&$this->uri->segment(3)=='')?'class="text-error"':''));?></li>
              </div>

            <!-- LAPORAN END -->
          </ul>
          <script type="text/javascript">
          $(function(){
           <?php if(in_array($this->uri->segment(2),array('jabatan','pegawai','users_groups','users_operators','users','dokter'))){?>
              $('li[data-target="#master"]').click();
               <?php }elseif(in_array($this->uri->segment(2),array('sosial_agama','sosial_pekerjaan','sosial_pendidikan','sosial_status_anggota','admission_bayar','sosial_kecamatan','sosial_kelurahan'))){?>
              $('li[data-target="#sosial"]').click();
              <?php }elseif(in_array($this->uri->segment(2),array('icdx'))){?>
              $('li[data-target="#icd"]').click();
              <?php }elseif(in_array($this->uri->segment(2),array('tindakan'))){?>
              $('li[data-target="#tindakan"]').click();
              
             
           
            <?php }?>
          });
          </script>
        </div><!--/.well -->
      </div><!--/end sidebar span-->

      <?php echo $contents;?>

    </div><!--/main row-->
  </div><!--/total spam-->
</div><!--/end main-->

    <script src ="<?php echo base_url();?>resource/js/bootstrap.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/bootstrap.datepicker.js"></script>
    <script src ="<?php echo base_url();?>resource/js/bootstrap.timepicker.js"></script>
    <script src ="<?php echo base_url();?>resource/js/facebox.js"></script>
    <script src ="<?php echo base_url();?>resource/js/colreorderwithresize.js"></script>
    <script src ="<?php echo base_url();?>resource/js/printthis.js"></script>
    <script src ="<?php echo base_url();?>resource/js/printarea.js"></script>
    <script src ="<?php echo base_url();?>resource/js/fixedheader.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.barRenderer.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.dateAxisRenderer.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.enhancedLegendRenderer.min.js"></script>
        
    
    <!-- Less -->
    <!-- <script src ="<?php echo base_url();?>resource/js/less.min.js"></script> -->
</body>
</html>
