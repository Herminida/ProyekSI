<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Rumah Sakit Kaliwaru Jember Admin Panel</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
        <!-- colorbox -->
            <link rel="stylesheet" href="lib/colorbox/colorbox.css" />    
        <!-- code prettify -->
            <link rel="stylesheet" href="lib/google-code-prettify/prettify.css" />    
        <!-- notifications -->
            <link rel="stylesheet" href="lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="img/splashy/splashy.css" />
        <!-- flags -->
            <link rel="stylesheet" href="img/flags/flags.css" />    
        <!-- calendar -->
            <link rel="stylesheet" href="lib/fullcalendar/fullcalendar_gebo.css" />
            
        <!-- main styles -->
            <link rel="stylesheet" href="css/style2.css" />
            
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
    
        <!-- Favicon -->
            <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
        
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
            <script src="js/ie/respond.min.js"></script>
            <script src="lib/flot/excanvas.min.js"></script>
        <![endif]-->
        

    <!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>
    <body>
       <!--  <div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div> -->
        <!-- <div class="style_switcher">
            <div class="sepH_c">
                <p>Colors:</p>
                <div class="clearfix">
                    <a href="javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
                    <a href="javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
                    <a href="javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
                    <a href="javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
                    <a href="javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
                    <a href="javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
                </div>
            </div>
            <div class="sepH_c">
                <p>Backgrounds:</p>
                <div class="clearfix">
                    <span class="style_item jQptrn style_active ptrn_def" title=""></span>
                    <span class="ssw_ptrn_a style_item jQptrn" title="ptrn_a"></span>
                    <span class="ssw_ptrn_b style_item jQptrn" title="ptrn_b"></span>
                    <span class="ssw_ptrn_c style_item jQptrn" title="ptrn_c"></span>
                    <span class="ssw_ptrn_d style_item jQptrn" title="ptrn_d"></span>
                    <span class="ssw_ptrn_e style_item jQptrn" title="ptrn_e"></span>
                </div>
            </div>
            <div class="sepH_c">
                <p>Layout:</p>
                <div class="clearfix">
                    <label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fluid" value="" checked /> Fluid</label>
                    <label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fixed" value="gebo-fixed" /> Fixed</label>
                </div>
            </div>
            <div class="sepH_c">
                <p>Sidebar position:</p>
                <div class="clearfix">
                    <label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_left" value="" checked /> Left</label>
                    <label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_right" value="sidebar_right" /> Right</label>
                </div>
            </div>
            <div class="sepH_c">
                <p>Show top menu on:</p>
                <div class="clearfix">
                    <label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_click" value="" checked /> Click</label>
                    <label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_hover" value="menu_hover" /> Hover</label>
                </div>
            </div>
            
            <div class="gh_button-group">
                <a href="#" id="showCss" class="btn btn-primary btn-mini">Show CSS</a>
                <a href="#" id="resetDefault" class="btn btn-mini">Reset</a>
            </div>
            <div class="hide">
                <ul id="ssw_styles">
                    <li class="small ssw_mbColor sepH_a" style="display:none">body {<span class="ssw_mColor sepH_a" style="display:none"> color: #<span></span>;</span> <span class="ssw_bColor" style="display:none">background-color: #<span></span> </span>}</li>
                    <li class="small ssw_lColor sepH_a" style="display:none">a { color: #<span></span> }</li>
                </ul>
            </div>
        </div> -->
        

            <!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="logo"></div>
                    <div class="navbar-inner" style="color:#ffffff; padding: 20px 0px 0px 50px;">
                       <h2>SISTEM INFORMASI RUMAH SAKIT KALIWARU JEMBER</h2>
                    </div>
                </div>
            </header>
            
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                    
                   <!--  <div class="row-fluid">
                        <div class="span12 tac">
                            <ul class="ov_boxes">
                                <li>
                                    <div class="p_bar_up p_canvas">2,4,9,7,12,8,16</div>
                                    <div class="ov_text">
                                        <strong>$3 458,00</strong>
                                        Weekly Sale
                                    </div>
                                </li>
                                <li>
                                    <div class="p_bar_down p_canvas">20,15,18,14,10,13,9,7</div>
                                    <div class="ov_text">
                                        <strong>$43 567,43</strong>
                                        Monthly Sale
                                    </div>
                                </li>
                                <li>
                                    <div class="p_line_up p_canvas">3,5,9,7,12,8,16</div>
                                    <div class="ov_text">
                                        <strong>2304</strong>
                                        Unique visitors (last 24h)
                                    </div>
                                </li>
                                <li>
                                    <div class="p_line_down p_canvas">20,16,14,18,15,14,14,13,12,10,10,8</div>
                                    <div class="ov_text">
                                        <strong>30240</strong>
                                        Unique visitors (last week)
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="row-fluid">
                        <div class="span12">
                            <ul class="dshb_icoNav tac">
                                <li><a href="<?php echo base_url();?>loket" style="background-image: url(img/gCons/multi-agents.png)"> Loket</a></li>
                                <li><a href="javascript:void(0)" style="background-image: url(img/gCons/world.png)">Map</a></li>
                                <li><a href="javascript:void(0)" style="background-image: url(img/gCons/configuration.png)">Settings</a></li>
                                <li><a href="javascript:void(0)" style="background-image: url(img/gCons/lab.png)">Lab</a>
                                <li><a href="javascript:void(0)" style="background-image: url(img/gCons/van.png)"><span class="label label-success">$2851</span> Delivery</a></li>
                                <li><a href="javascript:void(0)" style="background-image: url(img/gCons/pie-chart.png)">Charts</a></li>
                                <li><a href="javascript:void(0)" style="background-image: url(img/gCons/edit.png)">Add New Article</a></li>
                                <li><a href="javascript:void(0)" style="background-image: url(img/gCons/add-item.png)"> Add New Page</a></li>
                                <li><a href="javascript:void(0)" style="background-image: url(img/gCons/chat-.png)"><span class="label label-important">26</span> Comments</a></li>
                            </ul>
                        </div>
                    </div>
   
                    <!-- <div class="row-fluid">
                        <div class="span6">
                            <div class="heading clearfix">
                                <h3 class="pull-left">Latest Orders</h3>
                                <span class="pull-right label label-important">5 Orders</span>
                            </div>
                            <table class="table table-striped table-bordered mediaTable">
                                <thead>
                                    <tr>
                                        <th class="optional">id</th>
                                        <th class="essential persist">Customer</th>
                                        <th class="optional">Status</th>
                                        <th class="optional">Date Added</th>
                                        <th class="essential">Total</th>
                                        <th class="essential">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>134</td>
                                        <td>Summer Throssell</td>
                                        <td>Pending</td>
                                        <td>24/04/2012</td>
                                        <td>$120.23</td>
                                        <td>
                                            <a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
                                            <a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
                                            <a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>133</td>
                                        <td>Declan Pamphlett</td>
                                        <td>Pending</td>
                                        <td>23/04/2012</td>
                                        <td>$320.00</td>
                                        <td>
                                            <a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
                                            <a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
                                            <a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>132</td>
                                        <td>Erin Church</td>
                                        <td>Pending</td>
                                        <td>23/04/2012</td>
                                        <td>$44.00</td>
                                        <td>
                                            <a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
                                            <a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
                                            <a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>131</td>
                                        <td>Koby Auld</td>
                                        <td>Pending</td>
                                        <td>22/04/2012</td>
                                        <td>$180.20</td>
                                        <td>
                                            <a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
                                            <a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
                                            <a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>130</td>
                                        <td>Anthony Pound</td>
                                        <td>Pending</td>
                                        <td>20/04/2012</td>
                                        <td>$610.42</td>
                                        <td>
                                            <a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
                                            <a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
                                            <a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="span6">
                            <div class="heading clearfix">
                                <h3 class="pull-left">Latest Images <small>(gallery grid)</small></h3>
                                <span class="pull-right label label-success">10</span>
                            </div>
                            <div id="small_grid" class="wmk_grid">
                                <ul>
                                    <li class="thumbnail">
                                        <a title="Image_4 title long title long title long" href="gallery/Image04.jpg">
                                            <img alt="" src="gallery/Image04_tn.jpg">
                                        </a>
                                        <p>
                                            <span>302KB<br>15/05/2012</span>
                                        </p>
                                    </li>
                                    <li class="thumbnail">
                                        <a title="Image_5 title long title long title long" href="gallery/Image05.jpg">
                                            <img alt="" src="gallery/Image05_tn.jpg">
                                        </a>
                                        <p>
                                            <span>336KB<br>24/05/2012</span>
                                        </p>
                                    </li>
                                    <li class="thumbnail">
                                        <a title="Image_6 title long title long title long" href="gallery/Image06.jpg">
                                            <img alt="" src="gallery/Image06_tn.jpg">
                                        </a>
                                        <p>
                                            <span>258KB<br>27/06/2012</span>
                                        </p>
                                    </li>
                                    <li class="thumbnail">
                                        <a title="Image_7 title long title long title long" href="gallery/Image07.jpg">
                                            <img alt="" src="gallery/Image07_tn.jpg">
                                        </a>
                                        <p>
                                            <span>338KB<br>22/06/2012</span>
                                        </p>
                                    </li>
                                    <li class="thumbnail">
                                        <a title="Image_8 title long title long title long" href="gallery/Image08.jpg">
                                            <img alt="" src="gallery/Image08_tn.jpg">
                                        </a>
                                        <p>
                                            <span>381KB<br>25/06/2012</span>
                                        </p>
                                    </li>
                                    <li class="thumbnail">
                                        <a title="Image_9 title long title long title long" href="gallery/Image09.jpg">
                                            <img alt="" src="gallery/Image09_tn.jpg">
                                        </a>
                                        <p>
                                            <span>176KB<br>11/06/2012</span>
                                        </p>
                                    </li>
                                    <li class="thumbnail">
                                        <a title="Image_10 title long title long title long" href="gallery/Image10.jpg">
                                            <img alt="" src="gallery/Image10_tn.jpg">
                                        </a>
                                        <p>
                                            <span>380KB<br>20/06/2012</span>
                                        </p>
                                    </li>
                                    <li class="thumbnail">
                                        <a title="Image_11 title long title long title long" href="gallery/Image11.jpg">
                                            <img alt="" src="gallery/Image11_tn.jpg">
                                        </a>
                                        <p>
                                            <span>340KB<br>17/06/2012</span>
                                        </p>
                                    </li>
                                    <li class="thumbnail">
                                        <a title="Image_12 title long title long title long" href="gallery/Image12.jpg">
                                            <img alt="" src="gallery/Image12_tn.jpg">
                                        </a>
                                        <p>
                                            <span>191KB<br>27/05/2012</span>
                                        </p>
                                    </li>
                                    <li class="thumbnail">
                                        <a title="Image_13 title long title long title long" href="gallery/Image13.jpg">
                                            <img alt="" src="gallery/Image13_tn.jpg">
                                        </a>
                                        <p>
                                            <span>314KB<br>24/05/2012</span>
                                        </p>
                                    </li>
                                    <li class="thumbnail">
                                        <a title="Image_14 title long title long title long" href="gallery/Image14.jpg">
                                            <img alt="" src="gallery/Image14_tn.jpg">
                                        </a>
                                        <p>
                                            <span>141KB<br>17/06/2012</span>
                                        </p>
                                    </li>
                                    <li class="thumbnail">
                                        <a title="Image_15 title long title long title long" href="gallery/Image15.jpg">
                                            <img alt="" src="gallery/Image15_tn.jpg">
                                        </a>
                                        <p>
                                            <span>183KB<br>13/05/2012</span>
                                        </p>
                                    </li>
                                     
                                </ul>
                            </div>
                        </div>
                    </div> -->
                  <!--   <div class="row-fluid">
                        <div class="span8">
                            <h3 class="heading">Calendar</h3>
                            <div id="calendar"></div>
                        </div>
                        <div class="span4" id="user-list">
                            <h3 class="heading">Users <small>last 24 hours</small></h3>
                            <div class="row-fluid">
                                <div class="input-prepend">
                                    <span class="add-on ad-on-icon"><i class="icon-user"></i></span><input type="text" class="user-list-search search" placeholder="Search user" />
                                </div>
                                <ul class="nav nav-pills line_sep">
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sort by <b class="caret"></b></a>
                                        <ul class="dropdown-menu sort-by">
                                            <li><a href="javascript:void(0)" class="sort" data-sort="sl_name">by name</a></li>
                                            <li><a href="javascript:void(0)" class="sort" data-sort="sl_status">by status</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Show <b class="caret"></b></a>
                                        <ul class="dropdown-menu filter">
                                            <li class="active"><a href="javascript:void(0)" id="filter-none">All</a></li>
                                            <li><a href="javascript:void(0)" id="filter-online">Online</a></li>
                                            <li><a href="javascript:void(0)" id="filter-offline">Offline</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <ul class="list user_list">
                                <li>
                                    <span class="label label-success pull-right sl_status">online</span>
                                    <a href="#" class="sl_name">John Doe</a><br />
                                    <small class="s_color sl_email">johnd@example1.com</small>
                                </li>
                                <li>
                                    <span class="label label-success pull-right sl_status">online</span>
                                    <a href="#" class="sl_name">Kate Miller</a><br />
                                    <small class="s_color sl_email">kmiller@example1.com</small>
                                </li>
                                <li>
                                    <span class="label label-important pull-right sl_status">offline</span>
                                    <a href="#" class="sl_name">James Vandenberg</a><br />
                                    <small class="s_color sl_email">jamesv@example2.com</small>
                                </li>
                                <li>
                                    <span class="label label-important pull-right sl_status">offline</span>
                                    <a href="#" class="sl_name">Donna Doerr</a><br />
                                    <small class="s_color sl_email">donnad@example3.com</small>
                                </li>
                                <li>
                                    <span class="label label-important pull-right sl_status">offline</span>
                                    <a href="#" class="sl_name">Perry Weitzel</a><br />
                                    <small class="s_color sl_email">perryw@example2.com</small>
                                </li>
                                <li>
                                    <span class="label label-success pull-right sl_status">online</span>
                                    <a href="#" class="sl_name">Charles Bledsoe</a><br />
                                    <small class="s_color sl_email">charlesb@example3.com</small>
                                </li>
                                <li>
                                    <span class="label label-important pull-right sl_status">offline</span>
                                    <a href="#" class="sl_name">Wendy Proto</a><br />
                                    <small class="s_color sl_email">wnedyp@example1.com</small>
                                </li>
                                <li>
                                    <span class="label label-success pull-right sl_status">online</span>
                                    <a href="#" class="sl_name">Nancy Ibrahim</a><br />
                                    <small class="s_color sl_email">nancyi@example2.com</small>
                                </li>
                                <li>
                                    <span class="label label-important pull-right sl_status">offline</span>
                                    <a href="#" class="sl_name">Eric Cantrell</a><br />
                                    <small class="s_color sl_email">ericc@example4.com</small>
                                </li>
                                <li>
                                    <span class="label label-success pull-right sl_status">online</span>
                                    <a href="#" class="sl_name">Andre Hill</a><br />
                                    <small class="s_color sl_email">andreh@example2.com</small>
                                </li>
                                <li>
                                    <span class="label label-success pull-right sl_status">online</span>
                                    <a href="#" class="sl_name">Laura Taggart</a><br />
                                    <small class="s_color sl_email">laurat@example3.com</small>
                                </li>
                                <li>
                                    <span class="label label-important pull-right sl_status">offline</span>
                                    <a href="#" class="sl_name">Doug Singer</a><br />
                                    <small class="s_color sl_email">dougs@example2.com</small>
                                </li>
                                <li>
                                    <span class="label label-success pull-right sl_status">online</span>
                                    <a href="#" class="sl_name">Douglas Arnott</a><br />
                                    <small class="s_color sl_email">douglasa@example1.com</small>
                                </li>
                                <li>
                                    <span class="label label-important pull-right sl_status">offline</span>
                                    <a href="#" class="sl_name">Lauren Henley</a><br />
                                    <small class="s_color sl_email">laurenh@example3.com</small>
                                </li>
                                <li>
                                    <span class="label label-important pull-right sl_status">offline</span>
                                    <a href="#" class="sl_name">William Jardine</a><br />
                                    <small class="s_color sl_email">williamj@example4.com</small>
                                </li>
                                <li>
                                    <span class="label label-success pull-right sl_status">online</span>
                                    <a href="#" class="sl_name">Yves Ouellet</a><br />
                                    <small class="s_color sl_email">yveso@example2.com</small>
                                </li>
                            </ul>
                            <div class="pagination"><ul class="paging bottomPaging"></ul></div>
                        </div>
                    </div> -->
                        
                </div>
            </div>
            
            <!-- sidebar -->
            <!-- <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <div class="sidebar">
                
                <div class="antiScroll">
                    <div class="antiscroll-inner">
                        <div class="antiscroll-content">
                    
                            <div class="sidebar_inner">
                                <form action="index.php?uid=1&amp;page=search_page" class="input-append" method="post" >
                                    <input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn"><i class="icon-search"></i></button>
                                </form>
                                <div id="side_accordion" class="accordion">
                                    
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="icon-folder-close"></i> Content
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse" id="collapseOne">
                                            <div class="accordion-inner">
                                                <ul class="nav nav-list">
                                                    <li><a href="javascript:void(0)">Articles</a></li>
                                                    <li><a href="javascript:void(0)">News</a></li>
                                                    <li><a href="javascript:void(0)">Newsletters</a></li>
                                                    <li><a href="javascript:void(0)">Comments</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-group">
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
                                    </div>
                                    <div class="accordion-group">
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
                                    </div>
                                    <div class="accordion-group">
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
                                    </div>
                                    <div class="accordion-group">
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
                                    </div>
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#collapse7" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                               <i class="icon-th"></i> Calculator
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse in" id="collapse7">
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
                                         </div>
                                    </div>
                                </div>
                                
                                <div class="push"></div>
                            </div>
                               
                            <div class="sidebar_info">
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
                            </div> 
                        
                        </div>
                    </div>
                </div>
            
            </div> -->
            
           
        

    </body>
</html>