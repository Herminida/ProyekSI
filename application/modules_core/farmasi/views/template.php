<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Halaman Farmasi Rumah Sakit Jember</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css" />
            <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->

       

            <link rel="stylesheet" href="<?php echo base_url();?>css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="<?php echo base_url();?>lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?php echo base_url();?>lib/qtip2/jquery.qtip.min.css" />
        <!-- colorbox -->
            <link rel="stylesheet" href="<?php echo base_url();?>lib/colorbox/colorbox.css" />    
            <link rel="stylesheet" href="<?php echo base_url();?>lib/facebox/facebox.css" />  
          
        <!-- code prettify -->
            <link rel="stylesheet" href="<?php echo base_url();?>lib/google-code-prettify/prettify.css" />    
        <!-- notifications -->
            <link rel="stylesheet" href="<?php echo base_url();?>lib/sticky/sticky.css" />   

        <!-- splashy icons -->
            <link rel="stylesheet" href="<?php echo base_url();?>img/splashy/splashy.css" />
    <!-- flags -->
             <link rel="stylesheet" href="<?php echo base_url();?>lib/uniform/Aristo/uniform.aristo.css" /> 
            <link rel="stylesheet" href="<?php echo base_url();?>img/flags/flags.css" />  
    <!-- calendar -->
            <link rel="stylesheet" href="<?php echo base_url();?>lib/fullcalendar/fullcalendar_gebo.css" />
            <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui-1.10.3.custom.css" />
            
        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" />
      
            

<link href="<?php echo base_url();?>resource/css/tabletools.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.datatables.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.jqplot.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>resource/css/jquery.datatables.rowgrouping.css" rel="stylesheet" type="text/css">

  
        <!-- Favicon -->
            <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" />

  


 <script src="<?php echo base_url();?>js/jquery-1.8.3.js"></script>
            
            
    
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
      <script src="js/ie/respond.min.js"></script>
      <script src="lib/flot/excanvas.min.js"></script>
        <![endif]-->

       <style type="text/css">
#loading {
  position:fixed;
  top:0;
  left:0;
  z-index:9999;
  text-align:center;
  width:100%;
  height:100%;
  padding-top:150px;
  font:bold 50px Calibri,Arial,Sans-Serif;
  color:#000;
  display:none;
  background-color: transparent;
}
</style>
 
<script type="text/javascript">
$(document).ajaxStart(function() {
$( "#loading").show();
});

$(document).ajaxStop(function() {
$( "#loading").hide();
});


</script>



    <!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>
    <body>
    <div id="loading" ><img src="<?php echo base_url();?>img/loadingbar.gif" alt="" /></div>
   
    
    <div id="maincontainer" class="clearfix">
      <!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="<?php echo base_url();?>farmasi"><i class="icon-home icon-white"></i> FARMASI JEMBER</a>
                            <ul class="nav user_menu pull-right">
                                <!-- <li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
                                        <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>
                                        <a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">10 <i class="splashy-calendar_week"></i></a>
                                    </div>
                                </li> -->
                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                   <!--  <li><a href="user_profile.html">My Profile</a></li>
                    <li><a href="javascrip:void(0)">Another action</a></li>
                    <li class="divider"></li> -->
                    <li><a href="<?php echo base_url();?>login/user_login/logout">Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
              <a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
                <span class="icon-align-justify icon-white"></span>
              </a>
                             
                        </div>
                    </div>
                </div>
               
               
            </header>
            
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                    
                    <?php echo $contents; ?>
         
                        
                </div>
            </div>
            
      <!-- sidebar -->
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <div class="sidebar">
        
        <div class="antiScroll">
          <div class="antiscroll-inner">
            <div class="antiscroll-content">
          
              <div class="sidebar_inner">
               <!--  <form action="index.php?uid=1&amp;page=search_page" class="input-append" method="post" >
                  <input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn"><i class="icon-search"></i></button>
                </form> -->
                <div id="side_accordion" class="accordion">
                  
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a href="#master" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                        <i class="icon-folder-close"></i> DATA MASTER
                      </a>
                    </div>
                    <div class="accordion-body collapse" id="master">
                      <div class="accordion-inner">
                        <ul class="nav nav-list">
                          <li><?php echo anchor('/farmasi/apt_supplier','Supplier',(($this->uri->segment(2)=='apt_supplier')?'class="text-error"':''));?></li>
             <!--  <li><?php echo anchor('/farmasi/apt_sumber','Sumber',(($this->uri->segment(2)=='apt_sumber')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/farmasi/apt_sales','Sales',(($this->uri->segment(2)=='apt_sales')?'class="text-error"':''));?></li>
              --> <li><?php echo anchor('/farmasi/apt_satuan','Satuan',(($this->uri->segment(2)=='apt_satuan')?'class="text-error"':''));?></li>
              <!-- <li><?php echo anchor('/farmasi/apt_gol','Golongan',(($this->uri->segment(2)=='apt_gol')?'class="text-error"':''));?></li>
               --><li><?php echo anchor('/farmasi/farmasi_obat_jenis', 'Jenis Obat',(($this->uri->segment(2)=='farmasi_obat_jenis')?'class="text-error"':''));?></li>
             <!--  <li><?php echo anchor('/farmasi/farmasi_obats','Obats',(($this->uri->segment(2)=='farmasi_obats')?'class="text-error"':''));?></li>
            -->
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a href="#acc2" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                        <i class="icon-folder-close"></i> Penerimaan
                      </a>
                    </div>
                    <div class="accordion-body collapse" id="acc2">
                      <div class="accordion-inner">
                        <ul class="nav nav-list">
                          <li><?php echo anchor('/farmasi/tunjangan_pegawai','Permintaan Supplier',(($this->uri->segment(2)=='apt_supplier')?'class="text-error"':''));?></li>
             
                        </ul>
                      </div>
                    </div>
                  </div>

                   <!-- <div class="accordion-group">
                    <div class="accordion-heading">
                      <a href="#farmasi" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                        <i class="icon-folder-close"></i> FARMASI
                      </a>
                    </div>
                    <div class="accordion-body collapse" id="farmasi">
                      <div class="accordion-inner">
                        <ul class="nav nav-list">
                         <li><?php echo anchor('/farmasi/farmasi_penerimaan','Farmasi Penerimaan',(($this->uri->segment(2)=='farmasi_penerimaan')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/farmasi/farmasi_penerimaan/view','List Penerimaan',(($this->uri->segment(2)=='farmasi_penerimaan/view')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/farmasi/farmasi_pengeluaran','Farmasi Pengeluaran',(($this->uri->segment(2)=='farmasi_pengeluaran/view')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/farmasi/farmasi_pengeluaran/view','List Pengeluaran',(($this->uri->segment(2)=='farmasi_pengeluaran/view')?'class="text-error"':''));?></li>
              </ul>
                      </div>
                    </div>
                  </div>

                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a href="#laporan" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                        <i class="icon-folder-close"></i> LAPORAN
                      </a>
                    </div>
                    <div class="accordion-body collapse" id="laporan">
                      <div class="accordion-inner">
                        <ul class="nav nav-list">
                          <li><?php echo anchor('/farmasi/laporan_farmasi_penerimaan','Ifk Penerimaan',(($this->uri->segment(2)=='laporan_farmasi_penerimaan')?'class="text-error"':''));?></li>
              <li><?php echo anchor('/farmasi/laporan_farmasi_pengeluaran','Ifk Pengeluaran',(($this->uri->segment(2)=='laporan_farmasi_pengeluaran')?'class="text-error"':''));?></li>
             
                        </ul>
                      </div>
                    </div>
                  </div> -->
                 <!--  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                        <i class="icon-th"></i> Modules
                      </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseTwo">
                      <div class="accordion-inner">
                        <ul class="nav nav-list">
                          <li><a href="javascript:void(0)">Content blocks</a></li>
                          <li><a href="javascript:void(0)">Tags</a></li>
                          <li><a href="javascript:void(0)">Blog</a></li>
                          <li><a href="javascript:void(0)">FAQ</a></li>
                          <li><a href="javascript:void(0)">Formbuilder</a></li>
                          <li><a href="javascript:void(0)">Location</a></li>
                          <li><a href="javascript:void(0)">Profiles</a></li>
                        </ul>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="accordion-group">
                    <div class="accordion-heading">
                      <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                        <i class="icon-user"></i> Account manager
                      </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseThree">
                      <div class="accordion-inner">
                        <ul class="nav nav-list">
                          <li><a href="javascript:void(0)">Members</a></li>
                          <li><a href="javascript:void(0)">Members groups</a></li>
                          <li><a href="javascript:void(0)">Users</a></li>
                          <li><a href="javascript:void(0)">Users groups</a></li>
                        </ul>
                        
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="accordion-group">
                    <div class="accordion-heading">
                      <a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                        <i class="icon-cog"></i> Configuration
                      </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseFour">
                      <div class="accordion-inner">
                        <ul class="nav nav-list">
                          <li class="nav-header">People</li>
                          <li class="active"><a href="javascript:void(0)">Account Settings</a></li>
                          <li><a href="javascript:void(0)">IP Adress Blocking</a></li>
                          <li class="nav-header">System</li>
                          <li><a href="javascript:void(0)">Site information</a></li>
                          <li><a href="javascript:void(0)">Actions</a></li>
                          <li><a href="javascript:void(0)">Cron</a></li>
                          <li class="divider"></li>
                          <li><a href="javascript:void(0)">Help</a></li>
                        </ul>
                      </div>
                    </div>
                  </div> -->
                 <!--  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a href="#collapseLong" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                        <i class="icon-leaf"></i> Long content (scrollbar)
                      </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseLong">
                      <div class="accordion-inner">
                        Some text to show sidebar scroll bar<br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rhoncus, orci ac fermentum imperdiet, purus sapien pharetra diam, at varius nibh tellus tristique sem. Nulla congue odio ut augue volutpat congue. Nullam id nisl ut augue posuere ullamcorper vitae eget nunc. Quisque justo turpis, tristique non fermentum ac, feugiat quis lorem. Ut pellentesque, turpis quis auctor laoreet, nibh erat volutpat est, id mattis mi elit non massa. Suspendisse diam dui, fringilla id pretium non, dapibus eget enim. Duis fermentum quam a leo luctus tincidunt euismod sit amet arcu. Duis bibendum ultricies libero sed feugiat. Duis ut sapien risus. Morbi non nulla sit amet eros fringilla blandit id vel augue. Nam placerat ligula lacinia tellus molestie molestie vestibulum leo tincidunt.
                        Duis auctor varius risus vitae commodo. Fusce nec odio massa, ut dapibus justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus, mauris sit amet feugiat tempor, nulla diam gravida magna, in facilisis sapien tellus non ligula. Mauris sapien turpis, sodales ac lacinia sit amet, porttitor in lacus. Pellentesque tincidunt malesuada magna, in egestas augue sodales vel. Praesent iaculis sapien at ante sodales facilisis.
                      </div>
                    </div>
                  </div> -->
                  <div class="accordion-group">
                    <!-- <div class="accordion-heading">
                      <a href="#collapse7" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                         <i class="icon-th"></i> Calculator
                      </a>
                    </div> -->
                    <!-- <div class="accordion-body collapse in" id="collapse7">
                      <div class="accordion-inner">
                        <form name="Calc" id="calc">
                          <div class="formSep control-group input-append">
                            <input type="text" style="width:142px" name="Input" /><button type="button" class="btn" name="clear" value="c" onclick="Calc.Input.value = ''"><i class="icon-remove"></i></button>
                          </div>
                          <div class="control-group">
                            <input type="button" class="btn btn-large" name="seven" value="7" onclick="Calc.Input.value += '7'" />
                            <input type="button" class="btn btn-large" name="eight" value="8" onclick="Calc.Input.value += '8'" />
                            <input type="button" class="btn btn-large" name="nine" value="9" onclick="Calc.Input.value += '9'" />
                            <input type="button" class="btn btn-large" name="div" value="/" onclick="Calc.Input.value += ' / '">
                          </div>
                          <div class="control-group">
                            <input type="button" class="btn btn-large" name="four" value="4" onclick="Calc.Input.value += '4'" />
                            <input type="button" class="btn btn-large" name="five" value="5" onclick="Calc.Input.value += '5'" />
                            <input type="button" class="btn btn-large" name="six" value="6" onclick="Calc.Input.value += '6'" />
                            <input type="button" class="btn btn-large" name="times" value="x" onclick="Calc.Input.value += ' * '" />
                          </div>
                          <div class="control-group">
                            <input type="button" class="btn btn-large" name="one" value="1" onclick="Calc.Input.value += '1'" />
                            <input type="button" class="btn btn-large" name="two" value="2" onclick="Calc.Input.value += '2'" />
                            <input type="button" class="btn btn-large" name="three" value="3" onclick="Calc.Input.value += '3'" />
                            <input type="button" class="btn btn-large" name="minus" value="-" onclick="Calc.Input.value += ' - '" />
                          </div>
                          <div class="formSep control-group">
                            <input type="button" class="btn btn-large" name="dot" value="." onclick="Calc.Input.value += '.'" />
                            <input type="button" class="btn btn-large" name="zero" value="0" onclick="Calc.Input.value += '0'" />
                            <input type="button" class="btn btn-large" name="DoIt" value="=" onclick="Calc.Input.value = Math.round( eval(Calc.Input.value) * 1000)/1000" />
                            <input type="button" class="btn btn-large" name="plus" value="+" onclick="Calc.Input.value += ' + '" />
                          </div>
                          Contributed by <a href="http://themeforest.net/user/maumao">maumao</a> 
                        </form>
                      </div>
                     </div> -->
                  </div>
                </div>
                
                <div class="push"></div>
              </div>
                 
              <!-- <div class="sidebar_info">
                <ul class="unstyled">
                  <li>
                    <span class="act act-warning">65</span>
                    <strong>New comments</strong>
                  </li>
                  <li>
                    <span class="act act-success">10</span>
                    <strong>New articles</strong>
                  </li>
                  <li>
                    <span class="act act-danger">85</span>
                    <strong>New registrations</strong>
                  </li>
                </ul>
              </div>  -->
            
            </div>
          </div>
        </div>
      
      </div>
            
           
     <script src ="<?php echo base_url();?>resource/js/datatablenightly.js"></script>
    <script src ="<?php echo base_url();?>resource/js/tabletools.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/jquery.datatables.rowgrouping.js"></script>
    <script src ="<?php echo base_url();?>resource/js/jquery.jqplot.min.js"></script>
    <script src ="<?php echo base_url();?>resource/js/plugins/jqplot.json2.min.js"></script>
           
      <!-- smart resize event -->
      <script src="<?php echo base_url();?>js/jquery.debouncedresize.min.js"></script>
      <script src="<?php echo base_url();?>js/jquery.PrintArea.js"></script>
      <!-- hidden elements width/height -->
      <script src="<?php echo base_url();?>js/jquery.actual.min.js"></script>
      <!-- js cookie plugin -->
      <script src="<?php echo base_url();?>js/jquery.cookie.min.js"></script>
      <!-- main bootstrap js -->
      <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
      <!-- tooltips -->
      <script src="<?php echo base_url();?>lib/qtip2/jquery.qtip.min.js"></script>
      <!-- jBreadcrumbs -->
      <script src="<?php echo base_url();?>lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
      <!-- lightbox -->
            <script src="<?php echo base_url();?>lib/colorbox/jquery.colorbox.min.js"></script>
            <script src="<?php echo base_url();?>lib/facebox/facebox.js"></script>

            
            <!-- fix for ios orientation change -->
      <script src="<?php echo base_url();?>js/ios-orientationchange-fix.js"></script>
      <!-- scrollbar -->
      <script src="<?php echo base_url();?>lib/antiscroll/antiscroll.js"></script>
      <script src="<?php echo base_url();?>lib/antiscroll/jquery-mousewheel.js"></script>
      <!-- common functions -->
      <script src="<?php echo base_url();?>js/gebo_common.js"></script>
      
      <script src="<?php echo base_url();?>lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
            <!-- touch events for jquery ui-->
            <script src="<?php echo base_url();?>js/forms/jquery.ui.touch-punch.min.js"></script>
            <!-- multi-column layout -->
            <script src="<?php echo base_url();?>js/jquery.imagesloaded.min.js"></script>
            <script src="<?php echo base_url();?>js/jquery.wookmark.js"></script>
            <!-- responsive table -->
            <script src="<?php echo base_url();?>js/jquery.mediaTable.min.js"></script>
            <!-- small charts -->
            <script src="<?php echo base_url();?>js/jquery.peity.min.js"></script>
            <!-- charts -->
            <script src="<?php echo base_url();?>lib/flot/jquery.flot.min.js"></script>
            <script src="<?php echo base_url();?>lib/flot/jquery.flot.resize.min.js"></script>
            <script src="<?php echo base_url();?>lib/flot/jquery.flot.pie.min.js"></script>
            <!-- calendar -->
            <script src="<?php echo base_url();?>lib/fullcalendar/fullcalendar.min.js"></script>
            <!-- sortable/filterable list -->
            <script src="<?php echo base_url();?>lib/list_js/list.min.js"></script>
            <script src="<?php echo base_url();?>lib/list_js/plugins/paging/list.paging.min.js"></script>
            <!-- dashboard functions -->
            <script src="<?php echo base_url();?>js/gebo_dashboard.js"></script>
 <script src ="<?php echo base_url();?>resource/js/bootstrap.min.js"></script>


    
      <script>
        $(document).ready(function() {
          //* show all elements & remove preloader
          setTimeout('$("html").removeClass("js")',1000);
           $(".medium-box").colorbox({rel:'group', iframe:true, width:"700px", height:"90%"});
        $(".small-box").colorbox({rel:'group', iframe:true, width:"750px", height:"90%"});
        $(".facebox").facebox({rel:'facebox', iframe:true, width:"550px", height:"90%"});
        });
      </script>

      
    </div>
  </body>
</html>