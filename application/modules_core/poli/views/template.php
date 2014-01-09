<html lang="en">
<head>
<title>tes</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/layout1.css">
<link href="<?php echo base_url();?>resource/css/facebox.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>resource/css/tabletools.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>resource/css/jquery.datatables.css" rel="stylesheet" type="text/css">
<script src ="<?php echo base_url();?>resource/js/jquery.js"></script>

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
            <div id="accordion">
                <h3>Pendaftaran</h3>
                               <h3>Pemeriksaan</h3>
                
                <h3>Laporan</h3>
                            
            </div>
       
    </div>
    <div id="midcontent">
    <?php echo $contents; ?>
    </div>
</div>
<!-- Add a footer to each displayed page -->
<div id="footer">Copyright &copy; </div>
<script src ="<?php echo base_url();?>resource/js/facebox.js"></script>
    <script src ="<?php echo base_url();?>resource/js/jquery.datatables.js"></script>
    <script src ="<?php echo base_url();?>resource/js/tabletools.min.js"></script>
</body>
</html>