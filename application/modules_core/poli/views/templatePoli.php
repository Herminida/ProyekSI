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
          <li class="active"><a href="<?php echo site_url('poli/'.'home');?>">Poliklinik</a></li>
          <li><a href="<?php echo site_url('poli/'.'tb/home');?>">TB</a></li>
          <li><a href="<?php echo site_url('poli/'.'labkesda_home');?>">Labkesda</a></li>
          <!-- <li><a href="<?php echo site_url('poli/sanitasi');?>">Sanitasi</a></li> -->
          <li ><a href="<?php echo base_url().'farmasi';?>">Farmasi</a></li>
          <li ><a href="<?php echo base_url().'gudang';?>">Gudang</a></li>
          <li><a href="<?php echo base_url().'apotek';?>">Apotek</a></li>
          <li ><a href="<?php echo base_url().'laporans';?>">Laporans</a></li>
          <li ><a href="<?php echo base_url().'master';?>">Data Master</a></li>
        <?php
        }else{
        ?>  <li class="active"><a href="<?php echo site_url('poli/'.'home');?>">Poliklinik</a></li>
          <li><a href="<?php echo site_url('poli/'.'tb/home');?>">TB</a></li>
          <li><a href="<?php echo site_url('poli/'.'labkesda_home');?>">Labkesda</a></li>
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
            <li class="nav-header" data-target="#anak" data-toggle="collapse">Klinik Anak</li>
            <div class="collapse" id="anak">
              <li><?php echo anchor('poli/polianak','Form Klinik Anak',(($this->uri->segment(2)=='polianak')?'class="text-error"':''));?></li>
            </div>

            <li class="nav-header" data-target="#igd" data-toggle="collapse">IGD</li>
            <div class="collapse" id="igd">
              <li><?php echo anchor('poli/poliigd','Form Klinik IGD',(($this->uri->segment(2)=='poliigd')?'class="text-error"':''));?></li>
            </div>

            <li class="nav-header" data-target="#dewasa" data-toggle="collapse">Klinik Dewasa</li>
            <div class="collapse" id="dewasa">
              <li><?php echo anchor('poli/polidewasa','Form Klinik Dewasa',(($this->uri->segment(2)=='polidewasa' and $this->uri->segment(3)=='')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/polidewasa/kir','Form SKD',(($this->uri->segment(2)=='polidewasa' and $this->uri->segment(3)=='kir')?'class="text-error"':''));?></li>
            </div>
            <li class="nav-header" data-target="#lansia" data-toggle="collapse">Klinik Lansia</li>
            <div class="collapse" id="lansia">
              <li><?php echo anchor('poli/polilansia','Form Klinik Lansia',(($this->uri->segment(2)=='polilansia')?'class="text-error"':''));?></li>
            </div>
            <li class="nav-header" data-target="#gizi" data-toggle="collapse">Klinik Gizi</li>
            <div class="collapse" id="gizi">
              <li><?php echo anchor('poli/poligizi','Form Klinik Gizi',(($this->uri->segment(2)=='poligizi')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/poligiziburuk','Form Gizi Buruk',(($this->uri->segment(2)=='poligiziburuk')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/poliposyandu','Form Posyandu',(($this->uri->segment(2)=='poliposyandu')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/polivita','Form Vitamin A',(($this->uri->segment(2)=='polivita')?'class="text-error"':''));?></li>
            </div>
            <li class="nav-header" data-target="#gigi" data-toggle="collapse">Klinik Gigi</li>
            <div class="collapse" id="gigi">
              <li><?php echo anchor('poli/poligigi','Form Klinik Gigi',(($this->uri->segment(2)=='poligigi')?'class="text-error"':''));?></li>
            </div>
            <li class="nav-header" data-target="#imunisasi" data-toggle="collapse">Klinik Imunisasi</li>
            <div class="collapse" id="imunisasi">
              <li><?php echo anchor('poli/poliimun','Form Klinik Imunisasi',(($this->uri->segment(2)=='poliimun')?'class="text-error"':''));?></li>
            </div>
            <li class="nav-header" data-target="#kebidanan" data-toggle="collapse">Klinik Kebidanan</li>
            <div class="collapse" id="kebidanan">
              <li><?php echo anchor('poli/polibidan','Form Klinik Kebidanan',(($this->uri->segment(2)=='polibidan')?'class="text-error"':''));?></li>
            </div>
            <li class="nav-header" data-target="#kb" data-toggle="collapse">Klinik KB</li>
            <div class="collapse" id="kb">
              <li><?php echo anchor('poli/polikb','Form Klinik KB',(($this->uri->segment(2)=='polikb')?'class="text-error"':''));?></li>
            </div>
            <li class="nav-header" data-target="#laboratorium" data-toggle="collapse">Laboratorium</li>
            <div class="collapse" id="laboratorium">
              <li><?php echo anchor('poli/polisampel','Form Pengambilan Sampel',(($this->uri->segment(2)=='polisampel')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/polilab','Form Pemeriksaan Laboratorium',(($this->uri->segment(2)=='polilab' and $this->uri->segment(3)=='')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/polilab/cetak','Cetak Hasil',(($this->uri->segment(2)=='polilab' and $this->uri->segment(3)=='cetak')?'class="text-error"':''));?></li>
            </div>
            <!-- LAPORAN START -->
            <li class="nav-header" data-target="#laporan" data-toggle="collapse">Laporan</li>
            <div class="collapse" id="laporan">
              <li><?php echo anchor('poli/laporan/lap_penyakit','Laporan 10 Besar Penyakit Puskesma',(($this->uri->segment(3)=='lap_penyakit')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/laporan/lap_chart','Laporan Grafik 10 Besar Penyakit Puskesma',(($this->uri->segment(3)=='lap_chart')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/laporan/lap_igd','IGD',(($this->uri->segment(3)=='lap_igd')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/laporan/lap_dewasa','Dewasa',(($this->uri->segment(3)=='lap_dewasa')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/laporan/lap_lansia','Lansia',(($this->uri->segment(3)=='lap_lansia')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/laporan/lap_anak','Anak',(($this->uri->segment(3)=='lap_anak')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/laporan/lap_gizi','Gizi',(($this->uri->segment(3)=='lap_gizi')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/laporan/lap_gigi','Gigi',(($this->uri->segment(3)=='lap_gigi')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/laporan/lap_imunisasi','Imunisasi',(($this->uri->segment(3)=='lap_imunisasi')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/laporan/lap_kb','KB',(($this->uri->segment(3)=='lap_kb')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/laporan/lap_kia','Kebidanan',(($this->uri->segment(3)=='lap_kia')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/laporan/lap_laboratorium','Laboratorium',(($this->uri->segment(3)=='lap_laboratorium')?'class="text-error"':''));?></li>
              <!-- <li><?php echo anchor('poli/laporan/lap_lb','Laporan LB1',(($this->uri->segment(3)=='lap_lb')?'class="text-error"':''));?></li> -->
              <li><?php echo anchor('poli/laporan/lap_lb3','Laporan LB3',(($this->uri->segment(3)=='lap_lb3')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/laporan/lap_lb4','Laporan LB4',(($this->uri->segment(3)=='lap_lb4')?'class="text-error"':''));?></li>
              
            </div>
            <!-- LAPORAN END -->
          </ul>
          <script type="text/javascript">
          $(function(){
            <?php if($this->uri->segment(2)=='polianak'){?>
              $('li[data-target="#anak"]').click();
            <?php }elseif($this->uri->segment(2)=='poliigd'){?>
              $('li[data-target="#igd"]').click();
            <?php }elseif($this->uri->segment(2)=='polidewasa'){?>
              $('li[data-target="#dewasa"]').click();
            <?php }elseif($this->uri->segment(2)=='polilansia'){?>
              $('li[data-target="#lansia"]').click();
            <?php }elseif(in_array($this->uri->segment(2),array('poligizi','poligiziburuk','poliposyandu','polivita'))){?>
              $('li[data-target="#gizi"]').click();
            <?php }elseif($this->uri->segment(2)=='poligigi'){?>
              $('li[data-target="#gigi"]').click();
            <?php }elseif($this->uri->segment(2)=='poliimun'){?>
              $('li[data-target="#imunisasi"]').click();
            <?php }elseif($this->uri->segment(2)=='polibidan'){?>
              $('li[data-target="#kebidanan"]').click();
            <?php }elseif($this->uri->segment(2)=='polikb'){?>
              $('li[data-target="#kb"]').click();
            <?php }elseif(in_array($this->uri->segment(2),array('polisampel','polilab'))){?>
              $('li[data-target="#laboratorium"]').click();
              <?php }elseif(in_array($this->uri->segment(2),array('labkesda','polisampellabkesda,poliperiksalabkesda,policetaklabkesda'))){?>
              $('li[data-target="#labkesda"]').click();
            <?php }elseif(in_array($this->uri->segment(3),array('lap_igd','lap_dewasa','lap_anak','lap_gizi','lap_gigi','lap_penyakit','lap_lb','lap_lansia','lap_laboratorium','lap_kb','lap_kia','lap_imunisasi','lap_lb','lap_lb3','lap_lb4','lap_chart'))){?>
              $('li[data-target="#laporan"]').click();
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
