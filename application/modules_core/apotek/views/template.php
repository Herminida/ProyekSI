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
          <li ><a href="<?php echo base_url().'gudang';?>">Gudang</a></li>
          <li class="active"><a href="<?php echo base_url().'apotek';?>">Apotek</a></li>
          <li ><a href="<?php echo base_url().'laporans';?>">Laporans</a></li>
          <li ><a href="<?php echo base_url().'master';?>">Data Master</a></li>
        <?php
        }else{
        ?>
          <li class="active"><a href="<?php echo base_url().'apotek';?>">Apotek</a></li>
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
            <li class="nav-header" data-target="#master" data-toggle="collapse">Data Apotek</li>
            <div class="collapse" id="master">
              <li><?php echo anchor('/apotek/apotek_penerimaan','Apotek Penerimaan',(($this->uri->segment(2)=='apotek_penerimaan')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/apotek/apotek_pengeluaran','Apotek Resep',(($this->uri->segment(2)=='apotek_pengeluaran')?'class="text-error"':''));?></li>
              <!-- <li><?php echo anchor('/apotek/apotek_penerimaan/view','List Penerimaan',(($this->uri->segment(3)=='apotek_penerimaan/view')?'class="text-error"':''));?></li>
                -->   
            </div>

            

               <li class="nav-header" data-target="#laporan" data-toggle="collapse">Laporan</li>
            <div class="collapse" id="laporan">
              <li><?php echo anchor('/apotek/laporan_apotek_penerimaan','Apotek Penerimaan',(($this->uri->segment(2)=='laporan_apotek_penerimaan')?'class="text-error"':''));?></li>
               </div>
           

            <!-- LAPORAN END -->
          </ul>
          <script type="text/javascript">
          $(function(){
            <?php if(in_array($this->uri->segment(2),array('apotek_pengeluaran','apotek_penerimaan'))){?>
              $('li[data-target="#master"]').click();
               <?php }elseif(in_array($this->uri->segment(2),array('laporan_apotek_penerimaan'))){?>
              $('li[data-target="#laporan"]').click();
              <?php }elseif(in_array($this->uri->segment(3),array('apotek_penerimaan/view'))){?>
              $('li[data-target="#master"]').click();
             
           
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