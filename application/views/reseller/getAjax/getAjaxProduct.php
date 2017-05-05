<div class="col-md-3 col-xs-3">
    <div class="mt-card-item">
        <div class="mt-card-avatar mt-overlay-1">
            <img src="<?= base_url(); ?>assets/uploads/product/<?php if($arr->ty2_img != null){echo $arr->ty2_img ;}else{ echo "400x400.png";} ?>">
            <div class="mt-overlay">
                <ul class="mt-info">
                    <li>
                        <a class="btn default btn-outline" href="javascript:;">
                            <i class="icon-magnifier"></i>
                        </a>
                    </li>
                    <li>
                        <a class="btn default btn-outline" href="javascript:;">
                            <i class="icon-link"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-card-content">
            <h4 class="mt-card-name"><?= $arr->ty2_desc; ?></h4>
            <?php $price = number_format((float)$arr->ty2_price, 2, '.', ''); ?>
            <p class="mt-card-desc font-grey-mint">ID <?= $arr->ty2_code; ?><br>Price : RM <?= $price; ?></p>
            <div class="mt-card-social">                
                    <button type="button" class="btn btn-block yellow-gold">SELECT</button>
               	<div class = "clearfix">&nbsp;</div>
            </div>
        </div>
    </div>
</div>