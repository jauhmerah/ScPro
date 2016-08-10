    
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
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <?php if($admin){?>
                        <li class="nav-item <?php if (strpos($link, 'a1') !== false) { echo "active open";}else{echo "start";}?>  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-cog fa-spin"></i>
                                <span class="title">Production</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start">
                                    <a href="<?= site_url('nasty_v2/dashboard/page/a1') ?>" class="nav-link ">
                                        <i class="fa fa-desktop"></i>
                                        <span class="title">View Order</span>
                                    </a>
                                </li>
                                <li class="nav-item start">
                                    <a href="<?= site_url('nasty_v2/dashboard/page/a12') ?>" class="nav-link ">
                                        <i class="fa fa-plus-square-o"></i>
                                        <span class="title">Add Order</span>
                                        <!--<span class="badge badge-success">1</span>-->
                                    </a>
                                </li>
                                <li class="nav-item start">
                                    <a href="<?= site_url('nasty_v2/dashboard/page/a13') ?>" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">History</span>
                                        <!--<span class="badge badge-danger">5</span>-->
                                    </a>
                                </li>
                            </ul>
                        </li> <?php } ?>
                        <li class="nav-item <?php if (strpos($link, 'a2') !== false) { echo "active open";}else{echo "start";}?>   ">
                            <a href="<?= site_url('nasty_v2/dashboard/page/a2') ?>" class="nav-link ">
                                <i class="fa fa-outdent"></i>
                                <span class="title">Order List</span>
                            </a>
                        </li>      
                        <li class="nav-item <?php if (strpos($link, 'b') !== false) { echo "active open";}else{echo "start";}?>  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                               <i class="fa fa-th-large"></i>
                                <span class="title">Item List</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start">
                                    <a href="<?= site_url('nasty_v2/dashboard/page/b1') ?>" class="nav-link ">
                                        <i class="fa fa-th-list"></i>
                                        <span class="title">Item Detail</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?= site_url('nasty_v2/dashboard/page/b2') ?>" class="nav-link ">
                                        <i class="fa fa-flask"></i>
                                        <span class="title">Nicotin</span>
                                        <!--<span class="badge badge-success">1</span>-->
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if($admin){?>
                        <li class="nav-item start ">
                            <a href="<?= site_url('nasty_v2/dashboard/page/a4') ?>" class="nav-link ">
                                <i class="fa fa-group"></i>
                                <span class="title">Client List</span>
                            </a>
                        </li> 
                        <?php } ?>                        
                        <!--<li class="nav-item  active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Page Layouts</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  active open">
                                    <a href="layout_blank_page.html" class="nav-link ">
                                        <span class="title">Blank Page</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_ajax_page.html" class="nav-link ">
                                        <span class="title">Ajax Content Layout</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_language_bar.html" class="nav-link ">
                                        <span class="title">Header Language Bar</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_footer_fixed.html" class="nav-link ">
                                        <span class="title">Fixed Footer</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_boxed_page.html" class="nav-link ">
                                        <span class="title">Boxed Page</span>
                                    </a>
                                </li>
                            </ul>
                        </li>-->
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->