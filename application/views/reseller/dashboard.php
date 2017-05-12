


             <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?= base_url(); ?>/asset2/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>/asset2/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>/asset2/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <!--<link href="<?= base_url(); ?>/asset2/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
         END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- <link href="<?= base_url(); ?>asset2/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>asset2/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css"> -->
        <!-- END THEME LAYOUT STYLES 
     
        <link rel="shortcut icon" href="favicon.ico" />-->
    
    <!-- END HEAD -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?= base_url(); ?>/asset/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?= base_url(); ?>/asset/Carousel Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>/asset/css/carousel.css" rel="stylesheet">

    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<style type="text/css">
    #chartdiv, #flavdiv , #orderdiv , #paiddiv , #usddiv , #gbpdiv{
    width   : 100%;
    height  : 500px;
}

.amcharts-export-menu-top-right {
  top: 10px;
  right: 0;
}                          
</style>



<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
      <?php
            $n = 0; 
            if (sizeof($arr) != 0) { 
                 foreach ($arr as $news) {
               
            ?>
        <li data-target="#myCarousel" data-slide-to="<?= $n ?>" class="<?php if($n==0){ echo 'active'; } ?>"></li>
        <?php 
             $n++;
            }
        }
        ?>
        <!-- <li data-target="#myCarousel" data-slide-to="2" class=""></li> -->
      </ol>
      <div class="carousel-inner" role="listbox">
        <?php
            $n = 0; 
            if (sizeof($arr) != 0) { 
                 foreach ($arr as $news) {
                
            ?>

        <div class="item <?php if($n==0){ echo 'active'; } ?>">
          <img class="second-slide" src="<?= base_url(); ?><?= $news->img_background; ?>" alt="Second slide" style="width: 100%;height: auto;">
          <div class="container">
            <div class="carousel-caption">
            <img class="second-slide" src="<?= base_url(); ?><?= $news->img_icon; ?>" alt="Second slide">
              <h1><?= $news->ne_title; ?>.</h1>
              <p><?= $news->ne_msg; ?>.</p>
              <p><a class="btn btn-lg btn-primary" href="https://getbootstrap.com/examples/carousel/#" role="button">More</a></p>
            </div>
          </div>
        </div>

        <?php 
            $n++;
            }
        }
        ?>
      
      </div>
      <a class="left carousel-control" href="https://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="https://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
<div class="row">
  <div class="col-md-12">
                                    <div class="portlet box yellow-gold">
                                         <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-user"></i>Top 5 Order 
                                            </div>                
                                        </div>

                                        <div class="portlet-body flip-scroll">
                                                <div class="row">
                                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Order Code</th>
                                                <th>Order Date</th>
                                                <th>Sales Person</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            

                                        </tbody>



                            </table>
                                
                            </div>
                                                
                                                </div>
                                        </div>

                                    </div>
                                </div>
        </div>

    <div class="row">
                       

                             <div class="col-md-12">
                                    <div class="portlet box yellow-gold" style="color:#ffffff">
                                         <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-user"></i>User Information 
                                            </div>                
                                        </div>

                                        <div class="portlet-body flip-scroll yellow-gold">
                                                <div class="row">
                                                <?php  if($arr1!=null){  ?>
                                                <div class="col-md-2">
                                                   <img src="<?= base_url(); ?><?= $arr1->logo; ?>" width="169" height="169"> 
                                                </div>
                                                <div class="col-md-4">
                                                <h2> <?php $text = ($arr1->sh_name == null) ? "Not Set" : $arr1->sh_name ; echo $text; ?></h2>
                                                 <?php  if($arr2!=null){  ?>
                                                <?= $arr2->address; ?>
                                                <br>
                                                <?= $arr2->town; ?>,<?= $arr2->poscode; ?>
                                                <br>
                                                <?= $arr2->state_name; ?>
                                                <?php } ?>
                                                <br>
                                                <?= $arr1->phone_no; ?>
                                                <br>
                                                <?= $arr1->email; ?>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                <div class="pull-right">
                                                <h1>Rank 1</h1>
                                                <a href="<?= site_url('reseller/page/r1') ?>" name="c4" title="Order Detail">
                                                <button type="button" title = "Shipping" class="SHButton btn purple-medium btn-circle">Ranking List</button></a>
                                                </div>
                                                </div>
                                                <?php } ?>
                                        </div>

                                    </div>
                                </div>

                          
                        </div>
    </div>


    <div class="row">
                            <div class="col-md-4 col-md-4 col-sm-4">
                            <a class="dashboard-stat dashboard-stat-v2 yellow-casablanca" id="newO">
                                <div class="visual pull-right">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <div class="details pull-left">
                                    <div class="number">
                   
                                    </div>
                                    <div class="desc">New </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 col-md-4 col-sm-4">
                            <a class="dashboard-stat dashboard-stat-v2 red" id="proO">
                                <div class="visual pull-right">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <div class="details pull-left">
                                    <div class="number">

                                    </div>
                                    <div class="desc">In-progress </div>
                                </div>
                            </a>
                        </div>
                         <div class="col-md-4 col-md-4 col-sm-4">
                            <a class="dashboard-stat dashboard-stat-v2 green" id="proO">
                                <div class="visual pull-right">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <div class="details pull-left">
                                    <div class="number">

                                    </div>
                                    <div class="desc">Completed </div>
                                </div>
                            </a>
                        </div>
    </div>
     <div class="row">
                       

                           

                          
                        </div>
    </div>
                    <!-- <div class="row">
                        <div class="col-xs-6 ">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="<?= site_url(); ?>nasty_v2/dashboard/page/a1new">
                                <div class="visual">
                                    <i>2017</i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $vernew ?>">0</span>
                                    </div>
                                    <div class="desc"> Total Order 2017 </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 ">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="<?= site_url(); ?>nasty_v2/dashboard/page/a1old">
                                <div class="visual">
                                    <i>2016</i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $verold ?>">0</span>
                                    </div>
                                    <div class="desc"> Total Order 2016</div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    <!-- <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue-dark" href="<?= site_url(); ?>nasty_v2/dashboard/page/a1new?search=new%20order&filter=3">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                        <span data-counter="counterup" data-value="<?php echo $neworder ?>">0</span>
                                    </div>
                                    <div class="desc"> New Orders </div>
                                </div>
                            </a>
                        </div>
                      
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple-plum" href="<?= site_url(); ?>nasty_v2/dashboard/page/a1new?search=in%20progress&filter=3">
                                <div class="visual">
                                    <i class="fa fa-spinner fa-spin"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                    
                    <span data-counter="counterup" data-value="<?php echo $inprogress ?>">0</span>
                                    </div>
                                    <div class="desc"> Inprogress </div>
                                </div>
                            </a>
                        </div>
                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green-seagreen" href="<?= site_url(); ?>nasty_v2/dashboard/page/a1new?search=complete&filter=3">
                                <div class="visual">
                                    <i class="fa fa-check-square-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                    
                                        <span data-counter="counterup" data-value="<?php echo $complete ?>">0</span>
                                    </div>
                                    <div class="desc"> Complete </div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    <!-- <div class="row">                       
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 yellow-haze" href="<?= site_url(); ?>nasty_v2/dashboard/page/a1new?search=unconfirm&filter=3">
                                <div class="visual">
                                    <i class="fa fa-exclamation-circle fa-spin"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?= $unconfirm; ?>">0</span></div>
                                    <div class="desc"> Unconfirm Order </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 grey-salt" href="<?= site_url(); ?>nasty_v2/dashboard/page/a1new?search=hold&filter=3">
                                <div class="visual">
                                    <i class="fa fa-hand-stop-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?= $onhold; ?>">0</span></div>
                                    <div class="desc"> On Hold In Progress Order </div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->
                    <!-- <div class="row">
                    <div align="center">
                              <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Total Statistic</span>
                                      <span class="caption-helper">Income Status</span>
                                    </div>
                                    <div class="actions">
                                    </div>
                                </div>
                                <div class="clear" style="height:40px;"></div>
                                <div class="portlet-body">
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div align="center">
                                                <h2>Income Status (MYR)</h2>
                                            </div>
                                        </div>
                                        <div id="sales1" align="center">
                                            <h1><i class="fa fa-repeat fa-spin"></i></h1>
                                        </div>
                                                               
                                        <div id="site_statistics_content"  >
                                            <div id="paiddiv" class="display-none"> </div>
                                            <div id="paidcode" ></div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                       <!--  <div class="col-md-12 col-sm-12">
                           
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Total Order By Month</span>
                                      <span class="caption-helper">Total Statistic</span>
                                    </div>
                                    <div class="actions">
                                    </div>
                                </div>
                                <div class="clear" style="height:40px;"></div>
                                <div class="portlet-body">
                                    <div id="site_statistics_loading" >
                                        <img src="<?= base_url(); ?>/asset2/global/img/loading.gif" alt="loading" /> </div>
                                                                             
                                    <div id="site_statistics_content" >
                                        <div id="chartdiv" class="display-none"></div>
                                        <div id="gcode" ></div>
                                    </div>                                    
                                </div>                                
                            </div>
                            
                        </div> -->
                           
                        <!-- <div class="col-lg-12">
                            <div class="row">
                                <div align="center">
                                    <h2>Total Order Status</h2>
                                </div>
                            </div>
                            <div id="site_statistics_loading4">
                                <img src="<?= base_url(); ?>/asset2/global/img/loading.gif" alt="loading" /> </div>
                                                                     
                            <div id="site_statistics_content"  >
                                <div id="orderdiv" class="display-none"> </div>
                                <div id="ordercode" ></div>
                            </div>
                        </div> -->
                        <!-- <div class="col-md-12 col-sm-12">
                              <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Total Flavored By Month</span>
                                      <span class="caption-helper">Total Statistic</span>
                                    </div>
                                    <div class="actions">
                                    </div>
                                </div>
                                <div class="clear" style="height:40px;"></div>
                                <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <div class="col-lg-5">
                                            <input type="number" name="year" id="flavYear" class="form-control" min="2016" placeholder="Year">
                                        </div>
                                        <div class="col-lg-5">
                                            <select id="flavMonth" class="form-control">
                                                <option value="-1">-- All Month --</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" id="flavBtn" class="btn btn-circle purple">Generate</button>
                                        </div>                                            
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        &nbsp;
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class= "col-lg-4 col-lg-offset-1">
                                                <div class="form-group">
                                                    <select name="client" id="client" class="input-circle form-control input-sm select2-multiple select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                    <option value="-1">--All Client--</option>
                                                        <?php 
                                                        foreach ($client as $key) { ?>
                                                            <option value="<?= $key->cl_id; ?>"> <?= $key->cl_name; ?> </option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select name="mg" id="nicomg" class="input-circle form-control input-sm select2-multiple select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                    <option value="-1">--All MG--</option>
                                                        <?php 
                                                        foreach ($mg as $key) { ?>
                                                            <option value="<?= $key->ni_mg; ?>" style = "background-color: <?= $key->ni_color; ?>;"> <?= $key->ni_mg; ?> MG</option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div align="center">
                                        <h2>Flavor Statistic <span id="mgL"></span></h2>
                                    </div>
                                </div>
                                    <div id="site_statistics_loading2" class="display-none">
                                        <img src="<?= base_url(); ?>/asset2/global/img/loading.gif" alt="loading" /> </div>
                                        <!-- #graph -->                                      
                                   <!--  <div id="site_statistics_content"  >
                                        <div id="flavdiv" class="display-none"> </div>
                                        <div id="flavcode" ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   -->
                    <!--<div class="col-md-6 col-sm-6">
                            <!- - BEGIN PORTLET- ->
                            <!-- #feed - ->
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-globe font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Order</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_1" class="active" data-toggle="tab"> System </a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_2" data-toggle="tab"> Activities </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="portlet-body">
                                    <!- -BEGIN TABS- ->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1_1">
                                            <div class="scroller" style="height: 339px;" data-always-visible="1" data-rail-visible="0">
                                                <ul class="feeds">
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-success">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> You have 4 pending tasks.
                                                                        <span class="label label-sm label-info"> Take action
                                                                            <i class="fa fa-share"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> Just now </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New version v1.4 just lunched! </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 20 mins </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-danger">
                                                                        <i class="fa fa-bolt"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> Database server #12 overloaded. Please fix the issue. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 24 mins </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 30 mins </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-success">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 40 mins </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-warning">
                                                                        <i class="fa fa-plus"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New user registered. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 1.5 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-success">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                                        <span class="label label-sm label-default "> Overdue </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 2 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 3 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-warning">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 5 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 18 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 21 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 22 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 21 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 22 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 21 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 22 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 21 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 22 hours </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_1_2">
                                            <div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
                                                <ul class="feeds">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 10 mins </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-danger">
                                                                        <i class="fa fa-bolt"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> Order #24DOP4 has been rejected.
                                                                        <span class="label label-sm label-danger "> Take action
                                                                            <i class="fa fa-share"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 24 mins </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!- -END TABS- ->
                                </div>
                            </div>
                    -->      
                    <!-- </div>
                         <div class="col-md-6 col-sm-6">
                            <!- - BEGIN PORTLET- ->
                            <div class="portlet light calendar ">
                                <div class="portlet-title ">
                                    <div class="caption">
                                        <i class="icon-calendar font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Feeds</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="calendar"> </div>
                                </div>
                            </div>
                            <!- - END PORTLET- ->
                        </div> -->
                    </div>
                 
                    </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->            
        </div>
        <!-- END CONTAINER -->





        <!-- Modal -->
<script>
/*
// Get the modal
var modal = document.getElementById('myModal');
var close= document.getElementById('close');
var cross= document.getElementById('cross');
window.onload=function(){

    modal.style.display = "block";
    
    
}
cross.onclick = function() {
    modal.style.display = "none";
}
close.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}*/
//#graph
$(document).ready(function() {
    $.post('<?= site_url('nasty_v2/dashboard/getAjaxGraph4') ?>', {new: '<?= $neworder; ?>',inprogress: '<?= $inprogress; ?>',complete: '<?= $complete; ?>',unconfirm: '<?= $unconfirm; ?>',onhold: '<?= $onhold; ?>'}, function(data) {
        //alert("jadi");
        $.when($('#ordercode').html(data)).then(function(){
            $("#orderdiv").removeClass('display-none');
            $("#site_statistics_loading4").addClass('display-none');
        });
    });
    $.post('<?= site_url('nasty_v2/dashboard/getAjaxGraph') ?>', {}, function(data) {
        $.when($('#gcode').html(data)).then(function(){
            $("#chartdiv").removeClass('display-none');
            $("#site_statistics_loading").addClass('display-none');
        });
    });
    $.post('<?= site_url('nasty_v2/dashboard/getAjaxGraph5/paiddiv/1') ?>', {}, function(data) {
        $.when($('#paidcode').html(data)).then(function(){
            $("#paiddiv").removeClass('display-none');
            $("#sales1").addClass('display-none');
        });
    });
    kelik();   
    $("#flavBtn").click(function() {
        year1 = $('#flavYear').val();
        month1 = $('#flavMonth').val();
        client = $('#client').val();
        mg = $('#nicomg').val();
        if (mg != -1) {
            $('#mgL').html("("+mg+" MG)");
        }else{
            $('#mgL').html("");
        }
        if (year1 == "" && month1 != -1) {
            bootbox.alert("Year is empty");
            $('#flavYear').focus();
        }else{
            //alert(month1);
            $.when($("#site_statistics_loading2").removeClass('display-none')).then(function(){        
                $.post('<?= site_url('nasty_v2/dashboard/getAjaxGraph2') ?>', {year1 : year1 , month1 : month1 , client : client , mg : mg}, function(data) {
                    $.when($('#flavcode').html(data)).then(function(){
                        $("#flavdiv").removeClass('display-none');
                        $("#site_statistics_loading2").addClass('display-none');
                    });
                });
            });
        }        
    });
});
function kelik() {
    year1 = $('#flavYear').val();
    month1 = $('#flavMonth').val();
    client = $('#client').val();
    mg = $('#nicomg').val();
    $.when($("#site_statistics_loading2").removeClass('display-none')).then(function(){        
        $.post('<?= site_url('nasty_v2/dashboard/getAjaxGraph2') ?>', {year1 : year1 , month1 : month1 , client : client , mg : mg}, function(data) {
            $.when($('#flavcode').html(data)).then(function(){
                $("#flavdiv").removeClass('display-none');
                $("#site_statistics_loading2").addClass('display-none');
            });
        });
    });
}

</script>

            <!--[if lt IE 9]>
<script src="<?= base_url(); ?>/asset2/global/plugins/respond.min.js"></script>
<script src="<?= base_url(); ?>/asset2/global/plugins/excanvas.min.js"></script> 
<![endif]-->
          
             <!-- BEGIN PAGE LEVEL PLUGINS -->
             <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?= base_url(); ?>/asset/Carousel Template for Bootstrap_files/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?= base_url(); ?>/asset/Carousel Template for Bootstrap_files/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?= base_url(); ?>/asset/Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>


            <script src="<?= base_url(); ?>/asset2/global/plugins/moment.min.js" type="text/javascript"></script>
            <script src="<?= base_url(); ?>/asset2/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
            <script src="<?= base_url(); ?>/asset2/global/plugins/morris/morris.min.js" type="text/javascript"></script>
            <script src="<?= base_url(); ?>/asset2/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
            <script src="<?= base_url(); ?>/asset2/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
            <script src="<?= base_url(); ?>/asset2/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
            <!---->
            <script src="<?= base_url(); ?>/asset2/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
           <!--
             END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="<?= base_url(); ?>/asset2/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="<?= base_url(); ?>/asset2/pages/scripts/dashboard.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="<?= base_url(); ?>/asset2/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
            <script src="<?= base_url(); ?>/asset2/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
            <script src="<?= base_url(); ?>/asset2/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->
            <!-- graph -->          
 
                                 
            <!-- end graph -->

