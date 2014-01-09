<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SIK Puskesmas Terpadu Labkesda</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Less use only-->
  <!-- <link href="<?php echo base_url();?>resource/css/default.less" rel="stylesheet/less" type="text/css"> -->
  <!-- Less  end-->

  <link href="<?php echo base_url();?>resource/css/bootstrap-formhelpers.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/todc-bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/bootstrap-edit.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/facebox.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/tabletools.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.datatables.css" rel="stylesheet" type="text/css">
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

  <?php if($this->uri->segment(2)!='login'){?>
  <script type="text/javascript">
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
          <li><a href="<?php echo site_url('poli/'.'home');?>">Poliklinik</a></li>
          <li><a href="<?php echo site_url('poli/'.'tb/home');?>">TB</a></li>
          <li class="active"><a href="<?php echo site_url('poli/'.'labkesda_home');?>">Labkesda</a></li>
          <!-- <li><a href="<?php echo site_url('poli/sanitasi');?>">Sanitasi</a></li> -->
          <li ><a href="<?php echo base_url().'farmasi';?>">Farmasi</a></li>
          <li ><a href="<?php echo base_url().'gudang';?>">Gudang</a></li>
          <li><a href="<?php echo base_url().'apotek';?>">Apotek</a></li>
          <li ><a href="<?php echo base_url().'laporans';?>">Laporans</a></li>
          <li ><a href="<?php echo base_url().'master';?>">Data Master</a></li>
        <?php
        }else{
        ?>
<li><a href="<?php echo site_url('poli/'.'home');?>">Poliklinik</a></li>
          <li><a href="<?php echo site_url('poli/'.'tb/home');?>">TB</a></li>
          <li class="active"><a href="<?php echo site_url('poli/'.'labkesda_home');?>">Labkesda</a></li>
          <!-- <li><a href="<?php echo site_url('poli/sanitasi');?>">Sanitasi</a></li> -->
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
          <!-- LABKESDA START -->
            <li class="nav-header" data-target="#labkesda" data-toggle="collapse">Labkesda</li>
            <div class="collapse" id="labkesda">
              <li><?php echo anchor('poli/labkesda','Form Pendaftaran Labkesda',(($this->uri->segment(2)=='labkesda')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/polisampellabkesda','Form Pengambilan Sampel Labkesda',(($this->uri->segment(2)=='polisampellabkesda')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/poliperiksalabkesda','Form Pemeriksaan Laboratorium Labkesda',(($this->uri->segment(2)=='poliperiksalabkesda')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/policetaklabkesda','Cetak Hasil Labkesda',(($this->uri->segment(2)=='policetaklabkesda')?'class="text-error"':''));?></li>
            </div>
            <!-- LABKESDA END -->
             <!-- LAPORAN START -->
            <li class="nav-header" data-target="#laporan" data-toggle="collapse">Laporan Rekam Medis</li>
            <div class="collapse" id="laporan">
              <li><?php echo anchor('poli/laporan/lap_labkesda','Labkesda',(($this->uri->segment(3)=='lap_labkesda')?'class="text-error"':''));?></li>
            </div>
            <!-- LAPORAN END -->

          </ul>
          <script type="text/javascript">
          $(function(){
            <?php if(in_array($this->uri->segment(2),array('labkesda','polisampellabkesda','poliperiksalabkesda','policetaklabkesda'))){?>
              $('li[data-target="#labkesda"]').click();
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

    <script src ="<?php echo base_url();?>resource/js/datatablenightly.js"></script>
    <script src ="<?php echo base_url();?>resource/js/tabletools.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/colreorderwithresize.js"></script>
    <!-- Less -->
    <!-- <script src ="<?php echo base_url();?>resource/js/less.min.js"></script> -->
</body>
</html>
