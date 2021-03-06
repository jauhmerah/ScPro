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
                            <li class="nav-item start">
                                <a href="<?= site_url('nasty_v2/dashboard/page/g1') ?>" class="nav-link ">
                                    <i class="fa fa-ban"></i>
                                    <span class="title">Cancel Log</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(($us_lvl != 2) ||  ($us_lvl != 3)){?>
                    <li class="nav-item <?php if (strpos($link, 'a2') !== false) { echo " active open ";}else{echo "start ";}?>  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-cog fa-spin"></i>
                                <span class="title">Distribution Team</span>
                                <span class="arrow"></span>
                            </a>
                        <ul class="sub-menu">
                            <li class="nav-item start" title="Distributor Action">
                                <a href="<?= site_url('nasty_v2/dashboard/page/a2') ?>" class="nav-link ">
                                        <i class="fa fa-flag-checkered"></i>
                                        <span class="title">Distributor Action</span>
                                    </a>
                                </li>
                            <?php }?>
                            <li class="nav-item start" title="Ready To Shipping">
                                <a href="<?= site_url('nasty_v2/dashboard/page/e1') ?>" class="nav-link ">
                                    <i class="fa fa-archive" aria-hidden="true"></i>
                                    <span class="title">Parcel Management</span>
                                    <!--<span class="badge badge-success">1</span>-->
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="" class="nav-link ">
                            <i class="fa fa-qrcode" aria-hidden="true"></i>
                            <span class="title">Hologram Number</span>
                            <span class="badge badge-danger">New</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start">
                                <a href="<?= site_url('holoxordys/page/b1'); ?>" class="nav-link ">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <span class="title">Search Holo Num</span>
                                </a>
                            </li>
                            <li class="nav-item start">
                                <a href="<?= site_url('holoxordys/page/b2'); ?>" class="nav-link ">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    <span class="title">Add Holo Number</span>
                                </a>
                            </li>
                            <li class="nav-item start">
                                <a href="<?= site_url('holoxordys/page/b3'); ?>" class="nav-link ">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    <span class="title">Holo List</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                        <?php if($us_lvl != 3 && $us_lvl != 4){?>
                        <li class="nav-item <?php if (strpos($link, 'i1') !== false || strpos($link, 'i2') !== false) { echo "active open";}else{echo "start";}?>   ">
                            <a href="" class="nav-link ">
                                <i class="fa fa-cubes"></i>
                                <span class="title">Finishing</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start">
                                    <a href="<?= site_url('nasty_v2/dashboard/page/i1') ?>" class="nav-link ">
                                        <i class="fa fa-bar-chart"></i>
                                        <span class="title">Dashboard</span>
                                    </a>
                                </li>
                                <?php if($us_lvl != 7 && $us_lvl != 2){?>
                                 <li class="nav-item start">
                                    <a href="<?= site_url('nasty_v2/dashboard/page/i2') ?>" class="nav-link ">
                                        <i class="fa fa-plus-square-o"></i>
                                        <span class="title">Finish Item</span>
                                    </a>
                                </li>

                                <?php }?>
                                <li class="nav-item start">
                                    <a href="<?= site_url('nasty_v2/dashboard/page/i21') ?>" class="nav-link ">
                                        <i class="fa fa-th-list"></i>
                                        <span class="title">Logs</span>
                                    </a>
                                </li>
                                <li class="nav-item start">
                                    <a href="<?= site_url('nasty_v2/dashboard/page/i4') ?>" class="nav-link ">
                                        <i class="fa fa-wrench"></i>
                                        <span class="title">Barcode Setting</span>
                                    </a>
                                </li>
                            </ul>
                        </li><?php } ?>
                        <?php if($us_lvl != 2 && $us_lvl != 3 && $us_lvl != 5){?>
                        <li class="nav-item <?php if (strpos($link, 'k1') !== false) { echo "active open";}else{echo "start";}?>   ">
                            <a href="<?= site_url('nasty_v2/dashboard/page/k1') ?>" class="nav-link ">
                                <i class="fa fa-bank"></i>
                                <span class="title">Acounting</span>
                            </a>
                        </li><?php } ?>
                        <?php if($us_lvl != 6 && $us_lvl != 7 && $us_lvl != 3 && $us_lvl != 8 && $us_lvl != 10){?>
                        <li class="nav-item start <?php if (strpos($link, 'a4') !== false) { echo "active open";}else{echo "start";}?>">
                            <a href="<?= site_url('nasty_v2/dashboard/page/a4') ?>" class="nav-link ">
                                <i class="fa fa-group"></i>
                                <span class="title">Client List</span>
                            </a>
                        </li><?php } ?>
                        <?php if($us_lvl != 2 && $us_lvl != 3 && $us_lvl != 7 && $us_lvl != 8 && $us_lvl != 6 && $us_lvl != 10){?>
                        <li class="nav-item <?php if (strpos($link, 'c') !== false) { echo "active open";}else{echo "start";}?>  ">
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
