    
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
            <?php
                $active = 'active open';
            ?>
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="nav-item <?php if (strpos($link, 'a') !== false) { echo "active open";}else{echo "start";}?>   ">
                        <a href="<?= site_url('reseller/page/a1') ?>" class="nav-link ">
                            <i class="fa fa-tachometer"></i>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <?php $us_lvl = $this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));?>                        
                    <?php if($us_lvl != 4){?>                     
                    <li class="nav-item <?php if (strpos($link, 'b') !== false) { echo "active open";}else{echo "start";}?>   ">
                        <a href="<?= site_url('reseller/page/b1') ?>" class="nav-link ">
                            <i class="fa fa-cart-plus"></i>
                            <span class="title">Add Order</span>
                        </a>
                    </li><?php } ?> 
                    <?php if($us_lvl != 4){?>                     
                    <li class="nav-item <?php if (strpos($link, 'c') !== false) { echo "active open";}else{echo "start";}?>   ">
                        <a href="" class="nav-link ">
                            <i class="fa fa-outdent"></i>
                            <span class="title">Order List</span>
                        </a>
                    </li><?php } ?>                          

                    <?php if($us_lvl != 4){?>                     
                    <li class="nav-item <?php if (strpos($link, 't') !== false) { echo "active open";}else{echo "start";}?>   ">
                        <a href="<?= site_url('reseller/page/t1') ?>" class="nav-link ">
                            <i class="fa fa-search"></i>
                            <span class="title">Tracking</span>
                        </a>
                    </li><?php } ?>
                    <?php if($us_lvl != 2 && $us_lvl != 3 ){?>
                    <li class="nav-item <?php if (strpos($link, 'e') !== false) { echo "active open";}else{echo "start";}?>   ">
                        <a href="<?= site_url('nasty_v2/dashboard/page/e1') ?>" class="nav-link ">
                            <i class="fa fa-bank"></i>
                            <span class="title">Bank Payment</span>
                        </a>
                    </li><?php } ?>
                    <?php if($us_lvl == 1){?>
                    <li class="nav-item <?php if (strpos($link, 'f') !== false) { echo "active open";}else{echo "start";}?>  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                           <i class="fa fa-wrench"></i>
                            <span class="title">Setting</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start">
                                <a href="<?= site_url('nasty_v2/dashboard/page/f1') ?>" class="nav-link ">
                                    <i class="fa fa-user"></i>
                                    <span class="title">User Profile</span>
                                </a>
                            </li>
                            <li class="nav-item start">
                                <a href="<?= site_url('nasty_v2/dashboard/page/f2') ?>" class="nav-link ">
                                    <i class="fa fa-map-marker"></i>
                                    <span class="title">Delivery Address</span>
                                </a>
                            </li> 
                            <li class="nav-item start">
                                <a href="<?= site_url('nasty_v2/dashboard/page/f3') ?>" class="nav-link ">
                                    <i class="fa fa-fw fa-building"></i>
                                    <span class="title">Shop Detail</span>
                                </a>
                            </li>
                            <li class="nav-item start">
                                <a href="<?= site_url('nasty_v2/dashboard/page/f4') ?>" class="nav-link ">
                                    <i class="fa fa-fw fa-bullhorn"></i>
                                    <span class="title">Feedback Form</span>
                                </a>
                            </li>                                                               
                        </ul>
                    </li> 
                        <?php } ?>   
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->