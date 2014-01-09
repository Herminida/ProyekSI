<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SIK Puskesmas Terpadu TB</title>
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
          <li class="active"><a href="<?php echo site_url('poli/home'.'tb');?>">TB</a></li>
          <li><a href="<?php echo site_url('poli/'.'labkesda_home');?>">Labkesda</a></li>
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
          <li class="active"><a href="<?php echo site_url('poli/home'.'tb');?>">TB</a></li>
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
            <li class="nav-header" data-target="#master" data-toggle="collapse">Master</li>
            <div class="collapse" id="master">
              <li><?php echo anchor('poli/tb/master_kpp','Master KPP',(($this->uri->segment(3)=='master_kpp')?'class="text-error"':''));?></li>
            </div>

            <li class="nav-header" data-target="#transaksi" data-toggle="collapse">Transaksi</li>
            <div class="collapse" id="transaksi">
              <li><?php echo anchor('poli/tb/transaksi_kpp','Kartu Pengobatan Pasien',(($this->uri->segment(3)=='transaksi_kpp')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/transaksi_kip','Kartu Identitas Pasien',(($this->uri->segment(3)=='transaksi_kip')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/transaksi_permohonan','Permohonan Lab',(($this->uri->segment(3)=='transaksi_permohonan')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/transaksi_dahak','Hasil Pemeriksaan Dahak',(($this->uri->segment(3)=='transaksi_dahak')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/transaksi_lab','Hasil Pemeriksaan Lab',(($this->uri->segment(3)=='transaksi_lab')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/transaksi_skoring','Skoring Gejala dan Pemeriksaan Penunjang',(($this->uri->segment(3)=='transaksi_skoring')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/transaksi_kroscek','Form Pengiriman Sedian Untuk Cross Check',(($this->uri->segment(3)=='transaksi_kroscek')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/transaksi_rujukan','Form Rujukan/ Pindah Pasien',(($this->uri->segment(3)=='transaksi_rujukan')?'class="text-error"':''));?></li>
            </div>

            <li class="nav-header" data-target="#laporan" data-toggle="collapse">Laporan</li>
            <div class="collapse" id="laporan">
              <li><?php echo anchor('poli/tb/laporan_kpp','Cetak Kartu Pengobatan Pasien TB',(($this->uri->segment(3)=='laporan_kpp')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_kip','Cetak Kartu Identitas Pasien TB',(($this->uri->segment(3)=='laporan_kip')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_permohonan','Cetak Formulir Permohonan Laboratorium Untuk Pemeriksaan Dahak',(($this->uri->segment(3)=='laporan_permohonan')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_rujukan','Cetak Formulir Rujukan/ Pindah Pasien',(($this->uri->segment(3)=='laporan_rujukan')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_hasil','Cetak Formulir Hasil Akhir Pengobatan Pasien Pindahan',(($this->uri->segment(3)=='laporan_hasil')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_sedian','Cetak Formulir Pengiriman Sedian Untuk Cross Check',(($this->uri->segment(3)=='laporan_sedian')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_1','1. Laporan Register TB Kabupaten Kota',(($this->uri->segment(3)=='laporan_1')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_2','2. Register Laboratorium TB',(($this->uri->segment(3)=='laporan_2')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_3','3. Daftar Tersangka Pasien (Suspek) TB yang Diperiksa Dahak SPS',(($this->uri->segment(3)=='laporan_3')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_4','4. Laporan Triwulan Penemuan dan Pengobatan Pasien TB',(($this->uri->segment(3)=='laporan_4')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_5','5. Laporan Triwulan Hasil Pengobatan Pasien TB',(($this->uri->segment(3)=='laporan_5')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_6','6. Laporan Triwulan Hasil Pemeriksaan Dahak Mikroskopis Akhir Tahap Intensif',(($this->uri->segment(3)=='laporan_6')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_ulang','Hasil Pemeriksaan Ulang Sputum BTA',(($this->uri->segment(3)=='laporan_ulang')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_grafik/penemuan','Grafik Penemuan dan Pengobatan Pasien TB',(($this->uri->segment(3)=='laporan_grafik' and $this->uri->segment(4)=='penemuan')?'class="text-error"':''));?></li>
              <li><?php echo anchor('poli/tb/laporan_grafik/hasil','Grafik Hasil Pengobatan Pasien TB',(($this->uri->segment(3)=='laporan_grafik' and $this->uri->segment(4)=='hasil')?'class="text-error"':''));?></li>
            </div>
          </ul>
          <script type="text/javascript">
          <?php $target=explode('_', $this->uri->segment(3))?>
          $(function(){
            <?php if($target[0]=='master'){?>
              $('li[data-target="#master"]').click();
            <?php }elseif($target[0]=='transaksi'){?>
              $('li[data-target="#transaksi"]').click();
            <?php }elseif($target[0]=='laporan'){?>
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

    <script src ="<?php echo base_url();?>resource/js/datatablenightly.js"></script>
    <script src ="<?php echo base_url();?>resource/js/tabletools.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/colreorderwithresize.js"></script>
    <!-- Less -->
    <!-- <script src ="<?php echo base_url();?>resource/js/less.min.js"></script> -->
</body>
</html>
