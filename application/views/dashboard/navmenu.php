<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= site_url('dashboard'); ?>">Ordering System v1.2</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Admin</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>-->
                <li >
                    <a href="<?= site_url('dashboard/logout') ?>" ><i class="fa fa-sign-out"></i> LogOut </a><!--<b class="caret"></b> class="dropdown-toggle" data-toggle="dropdown" -->
                    <!--<ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>-->
                </li>
            </ul>
            <?php
                $active = 'class = " active"';
            ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!--<li <?php if ($link == 'a') { echo $active;} ?>>
                        <a href="<?= site_url('dashboard'); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>                    -->
                    <!--<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#home" <?php if (strpos($link, 'b') !== false) { echo "aria-expanded=\"true\"";  } ?>><i class="fa fa-fw fa-home"></i> Home Page<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="home" <?php if (strpos($link, 'b') !== false) { echo "aria-expanded=\"true\" class=\"collapse in\"";  }else{ echo 'class="collapse"';} ?> >
                            <li <?php if ($link == 'b1') { echo $active;} ?>>
                                <a href="<?= site_url('dashboard/page/b1'); ?>"><i class="fa fa-fw fa-desktop"></i> Website Profile</a>
                            </li>
                            <li <?php if ($link == 'b2') { echo $active;} ?>>
                                <a href="<?= site_url('dashboard/page/b2'); ?>"><i class="fa fa-fw fa-bookmark-o"></i> Banner</a>
                            </li>
                            <li <?php if ($link == 'b3') { echo $active;} ?>>
                                <a href="<?= site_url('dashboard/page/b3'); ?>"><i class="fa fa-fw fa-list-alt"></i> Header</a>
                            </li>
                            <li <?php if ($link == 'b4') { echo $active;} ?>>
                                <a href="<?= site_url('dashboard/page/b4'); ?>"><i class="fa fa-fw fa-tags"></i> Tag Announcement</a><!-s- Announcement -s->
                            </li>
                        </ul>
                    </li>-->
                    <?php if($admin){?>
                    <li <?php if ($link == 'a1') { echo $active;} ?>>
                        <a href="<?= site_url('dashboard/page/a1'); ?>"><i class="fa fa-fw fa-edit"></i> Production</a>
                    </li> <?php } ?>
                    <li <?php if ($link == 'a2') { echo $active;} ?>>
                        <a href="<?= site_url('dashboard/page/a2'); ?>"><i class="fa fa-fw fa-picture-o"></i> Order List</a>
                    </li>                    
                    <!--<li <?php if ($link == 'a3') { echo $active;} ?>>
                        <a href="<?= site_url('dashboard/page/a3'); ?>"><i class="fa fa-fw fa-link"></i> Item List</a>
                    </li>-->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#home" <?php if (strpos($link, 'b') !== false) { echo "aria-expanded=\"true\"";  } ?>><i class="fa fa-fw fa-home"></i>  Item List<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="home" <?php if (strpos($link, 'b') !== false) { echo "aria-expanded=\"true\" class=\"collapse in\"";  }else{ echo 'class="collapse"';} ?> >
                            <li <?php if ($link == 'b1') { echo $active;} ?>>
                                <a href="<?= site_url('dashboard/page/b1'); ?>"><i class="fa fa-fw fa-desktop"></i> Item Detail</a>
                            </li>
                            <li <?php if ($link == 'b2') { echo $active;} ?>>
                                <a href="<?= site_url('dashboard/page/b2'); ?>"><i class="fa fa-fw fa-bookmark-o"></i> Nicotin</a>
                            </li>
                            <li <?php if ($link == 'b3') { echo $active;} ?>>
                                <a href="<?= site_url('dashboard/page/b3'); ?>"><i class="fa fa-fw fa-list-alt"></i> Header</a>
                            </li>
                            <li <?php if ($link == 'b4') { echo $active;} ?>>
                                <a href="<?= site_url('dashboard/page/b4'); ?>"><i class="fa fa-fw fa-tags"></i> Tag Announcement</a><!-s- Announcement -s->
                            </li>
                        </ul>
                    </li>
                    <li <?php if ($link == 'a4') { echo $active;} ?>>
                        <a href="<?= site_url('dashboard/page/a4'); ?>"><i class="fa fa-fw fa-wrench"></i> Client List</a>
                    </li>
                    <!--<li <?php if ($link == 'a5') { echo $active;} ?>>
                        <a href="<?= site_url('dashboard/page/a5'); ?>"><i class="fa fa-fw fa-bullhorn"></i> Feedback</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

         
