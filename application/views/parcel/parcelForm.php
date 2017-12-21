<p class='hidden-print'>
    &nbsp;
</p>
<div class="row">
    <div class="panel panel-default" style="border-color: #ddd;">
        <div class="panel-heading " style="color: #fff;background-color: #337ab7;border-color: #ddd; ">
            <?php $orderId = "#".(120000 + $parcel['parcel']->or_id); ?>
            <h2>Order <?= $orderId ?></h2>
        </div>
        <div class="panel-body ">
            <div class="row ">
                <div class="col-xs-6 ">
                    <span><img alt="asdf " src="<?php echo base_url($parcel['parcel']->pb_link); ?>" width="400" class="img-responsive center-block"></span>
                </div>
                <div class="col-xs-6 pull-right">
                    <strong>Shipped To:</strong><br>
                    <?= $parcel['parcel']->cl_name; ?>,<br>
                    <address>
                        <?= $parcel['parcel']->cl_address;?><br />
                        <?= $parcel['parcel']->cl_email; ?><br />
                        <?= $parcel['parcel']->cl_tel; ?><br />
                    </address>
                    <strong>Order Date:</strong><br>
                    <?= date('Y-M-d' ,strtotime($parcel['parcel']->or_date)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="border-top: dotted 3px;" />
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <img src="<?= base_url('assets\cover\formlogo.jpg'); ?>" class="img-rounded">
                </div>
                <div class="col-xs-6">
                    <span class="pull-right">
                        <h2 class="text-center">Order <?= $orderId; ?></h2><br />
                        <img alt="" src="<?php echo base_url($parcel['parcel']->pb_link); ?>" width="250" class="img-responsive">
                    </span>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6">
                    <strong>Shipped To:</strong><br>
                    <?= $parcel['parcel']->cl_name; ?>,<br>
                    <address>
                        <?= $parcel['parcel']->cl_address;?><br />
                        <?= $parcel['parcel']->cl_email; ?><br />
                        <?= $parcel['parcel']->cl_tel; ?><br />
                    </address>
                </div>
                <div class="col-xs-6">
                    <strong>Order ID : </strong><?= $orderId; ?><br>
                    <strong>Parcel Code : </strong><?= $parcel['parcel']->pb_code; ?><br>
                    <strong>Order Date :</strong> <?= date('Y-M-d' ,strtotime($parcel['parcel']->or_date));?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default" style="border-color: #ddd;">
                        <div class="panel-heading" style="color: #fff;background-color: #337ab7;border-color: #ddd; ">
                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Tester</th>
                                            <th>Sub-Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $subT = 0 ; $Total = 0;
                                            foreach ($parcel['item'] as $key) {
                                                $subT += $key->pa_qty;
                                                $subT += $key->pa_tester;
                                            ?>
                                        <tr>
                                            <td>
                                                <?= $key->ty2_desc; ?> |
                                                <span class="label" style="color: black;background-color: <?= $key->ca_color; ?>; font-size: 75%;"><strong><?= $key->ca_desc; ?></strong></span>&nbsp;
                                                <span class="label" style="color: black;font-size: 75%; background-color: <?= $key->ni_color; ?>;"><strong><?= $key->ni_mg; ?> mg</strong></span><br />
                                                Batch : <?= (empty($key->pa_batch)) ? 'n\a' : $key->pa_batch ; ?> | Hologram : <?= (empty($key->pa_hologram)) ? 'n\a' : $key->pa_hologram ; ?>
                                            </td>
                                            <td><?= $key->pa_qty; ?></td>
                                            <td><?= $key->pa_tester; ?></td>
                                            <td><?= $subT; ?></td>
                                        </tr>
                                        <?php $subT = 0; } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-right">Total : </th>
                                            <th>4</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="hidden-print" style="border-top: dotted 3px;">
<p style="page-break-before: always;"></p>
