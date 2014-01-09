<div class="span9">
  <div class="row">
    <div class="span8" style="padding-top:10px;padding-bottom:10px">
      <div class="alert alert-success">
        <a href="<?php echo site_url('poli/'.'home/out')?>" class="btn btn-danger pull-right"><i class="icon-off icon-white"></i> Logout</a>
        <strong>Selamat Datang </strong> <?php echo $this->session->userdata('username')?> !
      </div>
      <div class="well well-large" align="center">
       <img src="<?php echo base_url();?>resource/img/login.jpg" alt="">
      </div>
    </div>
  </div>
</div>
