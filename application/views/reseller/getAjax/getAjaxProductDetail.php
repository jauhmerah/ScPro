<div>
    <div class="row">
        <div><pre><?php print_r($data); ?></pre>
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