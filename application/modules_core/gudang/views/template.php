<html lang="en">
<head>
<title>SIK</title>
<!-- <link href="<?php echo base_url(); ?>loket/asset/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <link href="<?php echo base_url(); ?>loket/asset/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
<link href="<?php echo base_url(); ?>asset/bootstrap/css/todc-bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap-edit.css" rel="stylesheet">
<!-- <link href="<?php echo base_url(); ?>loket/asset/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"> -->

<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap/js/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap/js/ui.theme.css" type="text/  css" media="all" />


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/layout1.css">

<script src="<?php echo base_url(); ?>asset/js/jquery-1.8.3.js"></script>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
</head>
<body>
<!-- If you'd like some sort of menu to
show up on all of your views, include it here -->
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <!-- <a class="brand" href="<?php echo base_url();?>">SIK</a> -->
      <div class="nav-collapse collapse">
        <div class="navbar-text pull-right">
          <?php if($this->session->userdata('username')){?>
          Logged in sebagai <a href="<?php echo site_url('user/profil');?>" class="navbar-link" id="loginUsername"><b><?php echo $this->session->userdata('username')?></b></a> &nbsp;
          <a href="<?php echo site_url('login/user_login/logout')?>" class="btn btn-danger btn-small"><i class="icon-off "></i></a>
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
          <li  class="active"><a href="<?php echo base_url().'gudang';?>">Gudang</a></li>
          <li ><a href="<?php echo base_url().'apotek';?>">Apotek</a></li>
          <li ><a href="<?php echo base_url().'laporans';?>">Laporans</a></li>
          <li ><a href="<?php echo base_url().'master';?>">Data Master</a></li>
        <?php
        }else{
        ?>
          <li class="active"><a href="<?php echo base_url().'gudang';?>">Gudang</a></li>
        <?php } ?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>  
<div id="hilaltechno">
    <div id="headholder">
        <div id="headhold">
            <div id="logos">
                
            </div>
        </div>
    </div>
</div>

<div id="menudock">
    <div id="clearer"></div>
    <div id="dock">
        <div class="dock-container">

        </div>
    </div>
</div>

<!-- Here's where I want my views to be displayed -->
<div id="content">

    <div id="leftcontent">
        <div class="sidebar-nav">
          <ul class="nav nav-list">
            

           

            <li class="nav-header" data-target="#gudang" data-toggle="collapse">Gudang Apotek</li>
            <div class="collapse" id="gudang">
              <li><?php echo anchor('/gudang/gudang_penerimaan/view_penerimaan','Gudang Apotek Penerimaan',(($this->uri->segment(2)=='gudang_penerimaan/view_penerimaan')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/gudang/gudang_pengeluaran','Gudang Pengeluaran',(($this->uri->segment(2)=='gudang_pengeluaran')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/gudang/gudang_pengeluaran/view','List Pengeluaran',(($this->uri->segment(2)=='gudang_pengeluaran/view')?'class="text-error"':''));?></li>
              <!-- <li><?php echo anchor('/gudang/mutasi_pengeluaran','Mutasi Pengeluaran',(($this->uri->segment(2)=='mutasi_pengeluaran')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/gudang/mutasi_pengeluaran/view','List Mutasi Obat',(($this->uri->segment(2)=='mutasi_pengeluaran/view')?'class="text-error"':''));?></li>
              --> </div>

              <li class="nav-header" data-target="#laporan" data-toggle="collapse">Laporan</li>
            <div class="collapse" id="laporan">
              <li><?php echo anchor('/gudang/laporan_gudang_apotek_penerimaan','Gudang Apotek Penerimaan',(($this->uri->segment(2)=='laporan_gudang_apotek_penerimaan')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/gudang/laporan_gudang_apotek_pengeluaran','Gudang Apotek Pengeluaran',(($this->uri->segment(2)=='laporan_gudang_apotek_pengeluaran')?'class="text-error"':''));?></li>
              <!-- <li><?php echo anchor('/gudang/laporan_mutasi_pengeluaran','Mutasi Pengeluaran',(($this->uri->segment(2)=='laporan_mutasi_pengeluaran')?'class="text-error"':''));?></li>
               --></div>

               

            <!-- LAPORAN END -->
          </ul>
          <script type="text/javascript">
          $(function(){
            <?php if(in_array($this->uri->segment(2),array('apt_supplier','apt_sumber','apt_sales','apt_satuan','apt_gol','farmasi_obat_jenis','farmasi_obats'))){?>
              $('li[data-target="#master"]').click();
            <?php }elseif(in_array($this->uri->segment(2),array('farmasi_penerimaan','farmasi_penerimaan/view','farmasi_pengeluaran','farmasi_pengeluaran/view'))){?>
              $('li[data-target="#farmasi"]').click();
              <?php }elseif(in_array($this->uri->segment(2),array('gudang_penerimaan/view_penerimaan','gudang_pengeluaran','gudang_pengeluaran/view','mutasi_pengeluaran','mutasi_pengeluaran/view'))){?>
              $('li[data-target="#gudang"]').click();
              <?php }elseif(in_array($this->uri->segment(2),array('laporan_farmasi_penerimaan','laporan_obat','laporan_farmasi_pengeluaran','laporan_gudang_apotek_penerimaan','laporan_gudang_apotek_pengeluaran','laporan_mutasi_pengeluaran'))){?>
              $('li[data-target="#laporan"]').click();
              
            <?php }?>
          });
          </script>
        </div>
    </div>
    <div id="midcontent">
    <?php echo $contents; ?>
        
    </div>
</div>
<!-- Add a footer to each displayed page -->
<div id="footer">Copyright &copy; 2013</div>

<!-- java script untuk bootstrap -->



    <script src="<?php echo base_url(); ?>asset/bootstrap/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url(); ?>asset/bootstrap/js/bootstrap-collapse.js"></script>
 
    <script src="<?php echo base_url(); ?>asset/bootstrap/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/bootstrap/js/duplicate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/bootstrap/js/jquery-ui.min.js" type="text/javascript"></script>

    
    

</body>
</html>