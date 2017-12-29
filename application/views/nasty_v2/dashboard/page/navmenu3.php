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
                <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="nav-item <?php if (strpos($link, 'x') !== false) { echo " active open ";}else{echo "start ";}?>   ">
                        <a href="<?= site_url('nasty_v2/dashboard/page/x1') ?>" class="nav-link ">
                            <i class="fa fa-tachometer"></i>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <?php $us_lvl = $this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
                     $us_email = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));?>
                    <?php if($us_lvl != 2 && $us_lvl != 3 && $us_lvl != 5 ){?>
                    <li class="nav-item <?php if (strpos($link, 'a1') !== false) { echo " active open ";}else{echo "start ";}?>  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-cart-plus"></i>
                                <span class="title"><i class="fa fa-money"></i> Sales Section</span>
                                <span class="arrow"></span>
                            </a>
                        <ul class="sub-menu">
                            <li class="nav-item start">
                                <a href="<?= site_url('nasty_v2/dashboard/page/a1') ?>" class="nav-link ">
                                        <i class="fa fa-outdent"></i>
                                        <span class="title">View Order</span>
                                    </a>
                            </li>
                            <li class="nav-item start">
                                <a href="<?= site_url('nasty_v2/dashboard/page/z1') ?>" class="nav-link ">
                                        <i class="fa fa-plus-square-o"></i>
                                        <span class="title">Add Order</span>
                                        <!--<span class="badge badge-success">1</span>-->
                                    </a>
                            </li>
                            <!--<li class="nav-item start">
                                    <a href="<?= site_url('nasty_v2/dashboard/page/a13') ?>" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">History</span>
                                        <span class="badge badge-danger">5</span>
                                    </a>
                                </li>-->
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(($us_lvl != 2) ||  ($us_lvl != 3)){?>
                    <li class="nav-item <?php if (strpos($link, 'a2') !== false) { echo " active open ";}else{echo "start ";}?>  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-cog fa-spin"></i>
                                <span class="title">Distribution Team</span>
                                <span class="arrow"></span>
                                <span class="badge badge-danger"><i class="fa fa-arrow-circle-o-up"></i></span>
                            </a>
                        <ul class="sub-menu">
                            <li class="nav-item start" title="Distributor Action">
                                <a href="<?= site_url('nasty_v2/dashboard/page/a2') ?>" class="nav-link ">
                                        <i class="fa fa-flag-checkered"></i>
                                        <span class="title">Distributor Action</span>
                                        <span class="badge badge-danger"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></span>
                                </a>
                            </li>
                            <li class="nav-item start" title="Parcel Manangement">
                                <a href="<?= site_url('nasty_v2/dashboard/page/e1') ?>" class="nav-link ">
                                    <i class="fa fa-archive" aria-hidden="true"></i>
                                    <span class="title">Parcel Management</span>
                                </a>
                            </li>
                            <li class="nav-item start" title="Dashboard">
                                <a href="<?= site_url('nasty_v2/dashboard/page/a6') ?>" class="nav-link ">
                                        <i class="fa fa-flag"></i>
                                        <span class="title">Dashboard</span>
                                        <!--<span class="badge badge-success">1</span>-->
                                    </a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>                    
                    <?php if($us_lvl != 2 && $us_lvl != 3 && $us_lvl != 5){?>
                    <li class="nav-item <?php if (strpos($link, 'k1') !== false) { echo " active open ";}else{echo "start ";}?>   ">
                        <a href="<?= site_url('nasty_v2/dashboard/page/k1') ?>" class="nav-link ">
                                <i class="fa fa-bank"></i>
                                <span class="title">Acounting</span>
                            </a>
                    </li>
                    <?php } ?>
                    <?php if($us_lvl != 2 && $us_lvl != 5){?>
                    <li class="nav-item start ">
                        <a href="<?= site_url('nasty_v2/dashboard/page/a4') ?>" class="nav-link ">
                                <i class="fa fa-group"></i>
                                <span class="title">Client List</span>
                            </a>
                    </li>
                    <?php } ?>
                    <?php if($us_lvl == 1){?>
                    <li class="nav-item <?php if (strpos($link, 'c') !== false) { echo " active open ";}else{echo "start ";}?>  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                               <i class="fa fa-wrench"></i>
                                <span class="title">Setting</span>
                                <span class="arrow"></span>
                            </a>
                        <ul class="sub-menu">
                            <li class="nav-item start">
                                <a href="<?= site_url('nasty_v2/dashboard/page/c1') ?>" class="nav-link ">
                                        <i class="fa fa-users"></i>
                                        <span class="title">User</span>
                                    </a>
                            </li>
                            <li class="nav-item start">
                                <a href="<?= site_url('nasty_v2/dashboard/page/c4') ?>" class="nav-link ">
                                        <i class="fa fa-fw fa fa-tag"></i>
                                        <span class="title">Category</span>
                                    </a>
                            </li>
                            <li class="nav-item start">
                                <a href="<?= site_url('nasty_v2/dashboard/page/c2') ?>" class="nav-link ">
                                        <i class="fa fa-fw fa-suitcase"></i>
                                        <span class="title">Item Detail</span>
                                    </a>
                            </li>
                            <li class="nav-item start">
                                <a href="<?= site_url('nasty_v2/dashboard/page/c3') ?>" class="nav-link ">
                                        <i class="fa fa-fw fa-tint"></i>
                                        <span class="title">Nicotine</span>
                                    </a>
                            </li>
                        </ul>
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
