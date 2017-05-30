

<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-switch/css/bootstrap-switch.css" rel="stylesheet" type="text/css">
<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-switch/js/bootstrap-switch.js" type="text/javascript"></script>

<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-switch/js/bootstrap-switc.min.js" type="text/javascript"></script>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-home"></i>Delivery Address List 
                </div>                
            </div>
            <div class="portlet-body flip-scroll">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <a href="<?= site_url('reseller/page/s14') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-home"></i> Add Address</button></a>
                        </div>                        
                    </div>
                </div>
                <div class="clearfix">
                    &nbsp;
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped flip-content">
                            <thead class="flip-content">
                                <tr>
                                    <th>Address</th>                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php 
                                if ($arr == null) {
                                    ?>
                                <tr>
                                    <td colspan = "6">
                                        <div align = "center">No Data</div>
                                    </td>
                                </tr>
                                    <?php
                                }else{
                                    $n = 0;
                                    foreach ($arr as $key) {
                                        $n++;
                                        ?>
                                <tr>                                    
                                    <td>
                                    <strong><?= $key->company_name ?></strong><br>
                                    <?= $key->address ?><br>
                                    <?= $key->poscode ?>, <?= $key->town ?><br>
                                    <?= $key->state_name ?><br>
                                    <?= '+60'.$key->add_mnum; ?>

                                    </td>
                                    <td>
                                    <?php 
                                        $add_id = $this->my_func->scpro_encrypt($key->add_id);
                                    ?>                                                
                                        <a href="<?= site_url('reseller/page/s17?delete=').$add_id; ?>" name="c5" title="Delete User"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></a>
                                    </td>                                   
                                </tr>       
                                        <?php
                                    }
                                }
                            ?>                                                   
                            </tbody>
                        </table>
                    </div>
                </div>                           
            </div>
        </div>
    </div>
</div>
  