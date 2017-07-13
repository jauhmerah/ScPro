<?php
                if (!isset($title)) {
                    $title = 'Statistics Overview';
                }
            ?>
<h1 class="page-title"> Dashboard
                        <small><?= $title; ?></small>
                    </h1>
                    <!-- END PAGE HEADER-->
                    <div class="row">                   
                        <div class="col-md-12">
                    <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-check"></i>  Success!</strong> <?= $this->session->flashdata('success'); ?>
                            </div>
                    <?php } if($this->session->flashdata('warning')){
                    ?>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-exclamation-triangle"></i> Warning!</strong> <?= $this->session->flashdata('warning'); ?>
                            </div>
                    <?php } if($this->session->flashdata('info')){ ?>
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-info-circle"></i> Info!</strong> <?= $this->session->flashdata('info'); ?>
                            </div>
                    <?php } if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-times-circle-o"></i> Error!</strong> <?= $this->session->flashdata('error'); ?> 
                            </div>
                    <?php } ?>
                        </div>
                    </div>