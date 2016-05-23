<div id="page-wrapper">
            <?php
                if (!isset($title)) {
                    $title = 'Statistics Overview';
                }
            ?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small><?= $title; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <?= $title; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php                 
                    if ($this->session->flashdata('success')) { ?>                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <?= $this->session->flashdata('success'); ?>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <?php } ?>
                <?php 
                    if ($this->session->flashdata('warning')) { ?>                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-exclamation-triangle"></i>  <?= $this->session->flashdata('warning'); ?>
                            </div>
                        </div>
                    </div>
                <!-- /.row -->
                <?php } ?>
                <?php 
                    if ($this->session->flashdata('error')) { ?>                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-times-circle-o"></i>  <?= $this->session->flashdata('error'); ?>
                            </div>
                        </div>
                    </div>
                <!-- /.row -->
                <?php } ?>
                <?php 
                    if ($this->session->flashdata('info')) { ?>                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  <?= $this->session->flashdata('info'); ?>
                            </div>
                        </div>
                    </div>
                <!-- /.row -->
                <?php } ?>
                