<?php if (isset($data->ty2_id)) { ?>
<div>
    <div class="row">
        <div>
            <div align="center">
                <img src="<?= base_url(); ?>assets/uploads/product/<?= $data->ty2_img; ?>" alt="No Data" style="width: 400px; height: auto; display: block;">
                <div >
                    <h3><strong><?= $data->ty2_desc; ?></h3></strong>
                    <p><i class="fa fa-flask"></i> Nico : 0 | 3 | 6</p>
                    <p>Price : <strong>MYR </strong><?php echo number_format($data->ty2_price , 2 , '.' , ''); ?></p>
                    <p> <?= $data->ty2_detail; ?> </p>
                    <p>
                        <a href="javascript:;" class="btn yellow-gold"> Select </a>
                        <a href="javascript:;" class="btn default bootbox-close-button"> Close </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php if(isset($data->oip_id)){ ?>
<div>
    <div class="row">
        <div>
            <div>
                <div align="center">
                <img src="<?= base_url(); ?>assets/uploads/product/<?= $data->oip_img; ?>" alt="No Data" style="width: 400px; height: auto; display: block;">
                    <h3><strong><?= $data->oip_desc; ?></h3></strong>
                    <p><i class="fa fa-flask"></i> Nico : 0 | 3 | 6</p>
                    <p>Price : <strong>MYR </strong><?php echo number_format($data->oip_price , 2 , '.' , ''); ?></p>
                    </div>
                    <div>
                    <div class="well well-sm">
                        <?= $data->oip_detail; ?>
                    </div>                    
                    <p align="center">
                        <a href="javascript:;" class="btn yellow-gold"> Select </a>
                        <a href="javascript:;" class="btn default bootbox-close-button"> Close </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>