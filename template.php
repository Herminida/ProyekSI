<html lang="en">
<head>
<title>SIK</title>
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/layout1.css">

<script src="<?php echo base_url(); ?>asset/js/jquery-1.8.3.js"></script>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
</head>
<body>
<!-- If you'd like some sort of menu to
show up on all of your views, include it here -->
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
        
            <div class="bs-docs-example">
              <div class="accordion" id="accordion2">
                <h3><a href="<?php echo base_url();?>loket">Home</a></h3>
               
                
               

                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2">
                      Data Master Sosial
                    </a>
                  </div>
                  <div id="collapseTwo2" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <?php echo anchor('loket/sosial_agama','Agama');?>
                <?php echo anchor('loket/sosial_pekerjaan','Pekerjaan');?>
                <?php echo anchor('loket/sosial_pendidikan','Pendidikan');?>
                <?php echo anchor('loket/sosial_status_anggota','Satus Anggota Keluarga');?>
                <?php echo anchor('loket/admission_bayar','Admission Bayar');?>
                 <?php echo anchor('loket/sosial_kecamatan','Kecamatan');?>
                <?php echo anchor('loket/sosial_kelurahan','Kelurahan');?>
                     </div>
                  </div>
                </div>

                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree2">
                      Loket
                    </a>
                  </div>
                  <div id="collapseThree2" class="accordion-body collapse">
                    <div class="accordion-inner">
                       <?php echo anchor('loket/sosial_kepala_keluarga','Kepala Keluarga'); ?>
                      <?php echo anchor('loket/admission_registrasi','Admission Registrasi');?>
                  </div>
                  </div>
                </div>
                
               
              </div>
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
 

    

</body>
</html>