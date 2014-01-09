<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Less use only-->
     <!-- <link href="<?php echo base_url();?>resource/css/default.less" rel="stylesheet/less" type="text/css"> -->
    <!-- Less  end-->
    <link href="<?php echo base_url();?>resource/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>resource/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
    
  
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<div class="row">
    <div class="span12">
      <div class="row">
        <div class="span3">
          <div class="sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header" data-target="#hero" data-toggle="collapse">Sidebar</li>
              <li class="collapse" id="hero">
               kalo dikasi li jadi ga jalan, tadi padahal mlaku
           </li>
           <li><a href="#">Link</a></li>
            
              <li class="nav-header" data-target="#hero2" data-toggle="collapse">Sidebar</li>
              <div class="collapse" id="hero2">
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              </div>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>

            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
            <div class="span4">
                  <form class="form-horizontal">
    <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
    <input type="text" id="inputEmail" placeholder="Email">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
    <input type="password" id="inputPassword" placeholder="Password">
    </div>
    </div>
    </form>
            </div>
            <div class="span4">
                                <form class="form-horizontal">
    <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
    <input type="text" id="inputEmail" placeholder="Email">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
    <input type="password" id="inputPassword" placeholder="Password">
    </div>
    </div>
    </form>
            </div>
            <div class="span3">
           tempat antrian
        </form>
            </div>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

    </div><!--/.fluid-container-->
</div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

   

<script src ="<?php echo base_url();?>resource/js/jquery.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/bootstrap.min.js"></script>
    <!-- Less -->
   <!-- <script src ="<?php echo base_url();?>resource/js/less.min.js"></script> -->
    
  </body>
</html>
