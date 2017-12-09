<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-ebonyclay">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-th-large"></i>Parcel Detail
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                </div>
                <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <a><button type="button" onclick="window.location.href=''" class="btn green btn-circle btn-sm"><i class="fa fa-print"></i> Print All</button></a>
                    </div>
                    &nbsp;-&nbsp;
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th> Parcel Id </th>
                                <th> Manage By </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //foreach ($arr as $key) { ?>
                            <tr>
                                <td> <a href="#">#< ?= 120000+$key->or_id; ? ></a></td>
                                <td> N/A </td>
                                <td>
                                    <div class="btn-group btn-group-md">
                                        <button type="button" class="btn green-dark btn-circle-left">
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn red-mint btn-circle-right con" title="Reset Parcel">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <table class="table table-condensed table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($key['item'])) {
														$n2 = 0;
														foreach ($key['item'] as $key2) {
															$n2++; ?>
                                                    <tr>
                                                        <td>
                                                            <?= $n2; ?>
                                                        </td>
                                                        <td>
                                                            <?= $key2->ty2_desc; ?> |
                                                                <span class="label" style="color: black;background-color: <?= $key2->ca_color; ?>; font-size: 75%;"><strong><?= $key2->ca_desc; ?></strong></span>&nbsp;
                                                                <span class="label" style="color: black;font-size: 75%; background-color: <?= $key2->ni_color; ?>;"><strong><?= $key2->ni_mg; ?> mg</strong></span>
                                                        </td>
                                                        <td>
                                                            <?= $key2->oi_qty; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
														}
													?>
                                                    <?php }else{ ?>
                                                    <tr>
                                                        <td align='center' colspan="4">
                                                            --No Data--
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php// } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel border-red-mint">
            <div class="panel-heading bg-red-mint bg-font-red-mint">
                <h3 class="panel-title">Order Detail</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label"><h5> Order Id : <strong></strong></h5></label>
                </div>
                <div class="form-group">
                    <label class="control-label"><h5> Client Name : <strong></strong></h5></label>
                </div>
                <div class="form-group">
                    <label class="control-label"><h5> Shipping Address : <strong></strong></h5></label>
                </div>
                <table class="table table-striped table-condensed table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item Detail</th>
                            <th>Qty</th>
                            <th>Tester</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel border-yellow-soft">
            <div class="panel-heading bg-yellow-soft">
                <h3 class="panel-title">Parcel Control</h3>
            </div>
            <div class="panel-body">

            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.con').click(function() {
            bootbox.confirm({
                title: '<i class="fa fa-refresh" aria-hidden="true"></i> Reset',
                message: "Do you want to reset the parcel detail? This cannot be undone.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm'
                    }
                },
                callback: function(result) {
                    console.log('This was logged in the callback: ' + result);
                }
            });
        });
    });
</script>