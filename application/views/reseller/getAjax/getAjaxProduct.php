<div class="col-md-4 col-xs-4">
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
            <h3 class="mt-card-name"><?= $arr->ty2_desc; ?></h3>
            <?php $price = number_format((float)$arr->ty2_price, 2, '.', ''); ?>
            <p class="mt-card-desc font-grey-mint">ID <?= $arr->ty2_code; ?><br>Price : RM <?= $price; ?></p>
            <div class="mt-card-social">
                <div class="btn-group btn-group-xs btn-group-solid">
                <?php $id = $this->my_func->en($arr->ty2_id , 1); ?>
                    <button type="button" class="btn red btn-circle-left mg" data-mg = '0' data-id = '<?= $id; ?>'><i class="fa fa-tint"> 0</i></button>
                    <button type="button" class="btn green mg" data-mg = '3' data-id = '<?= $id; ?>'><i class="fa fa-tint"> 3</i></button>
                    <button type="button" class="btn blue btn-circle-right mg" data-mg = '6' data-id = '<?= $id; ?>'><i class="fa fa-tint"> 6</i></button>
                </div>
               	<div class = "clearfix">&nbsp;</div>
            </div>
        </div>
    </div>
</div>