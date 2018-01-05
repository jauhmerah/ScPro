<?php $orderId = '#'.(120000+$order['order']->or_id); ?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green-haze">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cog fa-spin"></i> Parcel Controller
                </div>
                <div class="tools">
                    <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body" style="display: none;">
                <form method="post" action="<?= site_url('nasty_v2/dashboard/page/e3?key='.$this->my_func->scpro_encrypt('parcelprocess')); ?>">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>Item Detail</th>
                                <th>Qty</th>
                                <th>Tester</th>
                                <th>Batch Code</th>
                                <th>Hologram Series</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <input type="hidden" name="or_id" value="<?= $this->my_func->scpro_encrypt($order['order']->or_id); ?>">
                        <input type="hidden" name="us_id" value="<?= $this->session->userdata('us_id'); ?>">
                        <tbody id="orderList">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input" class="col-sm-4 control-label">Category : </label>
                                                <div class="col-sm-8">
                                                    <select id="cat" class="form-control input-circle">
                                                        <option value="-1">-- Select Category --</option>
                                                        <?php
                                                        foreach ($cat as $key) { ?>
                                                            <option style="background-color: <?= $key->ca_color; ?>" value="<?= $key->ca_id; ?>"> <?= $key->ca_desc; ?> </option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                            &nbsp;
                                            </div>
                                            <div class="form-group" id = "divType">
                                                <label for="input" class="col-sm-4 control-label">Item Type : </label>
                                                <div class="col-sm-8">
                                                    <select id="itemType" class="form-control input-circle" disabled>
                                                        <option value="-1">-- Select Type --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input" class="col-md-4 control-label">Nicotine : </label>
                                                <div class="col-sm-5">
                                                    <select id="inputNico" class="form-control input-circle">
                                                        <option value="-1" selected>-- Select One --</option>
                                                        <?php
                                                            foreach ($nico as $mg) {
                                                                if ($mg->ni_mg == -1) { ?>
                                                                <option style = "background-color: <?= $mg->ni_color; ?> ;" value="<?= $mg->ni_id; ?>">-- No Mg --</option>
                                                            <?php	}else{
                                                            ?>
                                                                <option style = "background-color: <?= $mg->ni_color; ?> ;" value="<?= $mg->ni_id; ?>"><?= $mg->ni_mg; ?> Mg</option>
                                                            <?php }}
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                            &nbsp;
                                            </div>
                                            <div class="clearfix">
                                            &nbsp;
                                            </div>
                                            <span class="pull-right">
                                                <div class="btn-group btn-group-md">
                                                  <button type="button" id="addBtn" class="btn btn-success btn-circle-left" disabled><i class="fa fa-plus"></i>&nbsp;Add Item</button>
                                                  <button type="submit" class="btn red-mint btn-circle-right"><i class="fa fa-arrow-right"></i>&nbsp;Add Parcel</button>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
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
                    <label class="control-label"><h5> Order Id : <strong><?= $orderId; ?></strong></h5></label>
                    <span class="pull-right">Sales Person : <strong><?= $order['staff']->us_username; ?></strong></span><br>
                    <label class="control-label"><h5> Client Name : <strong><?= $order['order']->cl_name; ?></strong></h5></label><br>
                    <label class="control-label"><h5> Shipping Address : <strong><?= $order['order']->cl_address; ?></strong></h5></label>
                </div>
                <div class="form-group">
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
                        <?php
                            $n = 0;$tot = 0; $totTester = 0;
                            foreach ($order['item'] as $key) {
                                $n++;
                                $tot += $key->oi_qty;
                                $totTester += $key->oi_tester;
                        ?>
                        <tr>
                            <td><?= $n; ?></td>
                            <td>
                                <?= $key->ty2_desc; ?><br>
                                <span class="label label-rounded" style="color: black;background-color: <?= $key->ca_color; ?>; font-size: 75%;"><strong><?= $key->ca_desc; ?></strong></span>&nbsp;
                                <span class="label" style="color: black;font-size: 75%; background-color: <?= $key->ni_color; ?>;"><strong><?= $key->ni_mg; ?> mg</strong></span>
                            </td>
                            <td><?= $key->oi_qty; ?></td>
                            <td><?= $key->oi_tester; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <span class="pull-right">Sub Total :</span>
                            </td>
                            <td><?= $tot; ?></td>
                            <td><?= $totTester; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <span class="pull-right">Total :</span>
                            </td>
                            <td>
                                <strong><?= $tot+$totTester; ?></strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="portlet box blue-ebonyclay">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-th-large"></i>Parcel Detail
                </div>
                <?php if (is_array($parcel)) { ?>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a><button type="button" onclick="window.open('<?= site_url('parcel/printParcel?id='.$this->my_func->scpro_encrypt($order['order']->or_id."|printParcel|2"));?>');" class="btn green btn-circle btn-sm"><i class="fa fa-print"></i> Print All</button></a>
                        </div>
                        &nbsp;-&nbsp;
                    </div>
                <?php } ?>
            </div>
            <div class="portlet-body">
                <div class="">
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th> Parcel Id </th>
                                <th> Date </th>
                                <th> Manage By </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($parcel)) {
                                $n = 0;
                                foreach ($parcel as $key) {
                                    $n++;
                                ?>
                                    <tr>
                                        <td><?= $orderId.'-'.dechex($key['parcel']->pa_id);?></td>
                                        <td><?= $key['parcel']->pa_date; ?></td>
                                        <td><?= $key['parcel']->us_username; ?> </td>
                                        <td>
                                            <div class="btn-group btn-group-md">
                                                <button type="button" class="btn btn-primary btn-circle-left btnV" title="view" data-view = 'tr<?= $n; ?>'>
                                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btn green-dark" title="print" onclick="window.open('<?= site_url('parcel/printParcel?id='.$this->my_func->scpro_encrypt($key['parcel']->pa_id."|printParcel|1"));?>');">
                                                    <i class="fa fa-print" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btn red-mint btn-circle-right con" title="Delete Parcel" data-del = "<?= $this->my_func->scpro_encrypt($key['parcel']->pa_id.'|parcelDel|2'); ?>">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="tr<?= $n; ?>" style="background-color : #9f9f9f; display : none;">
                                        <td colspan="4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-condensed table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Quantity</th>
                                                                <th>Tester</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (isset($key['item'])) {
                                                                $n2 = 0;
                                                                foreach ($key['item'] as $key2) {
                                                                    $n2++; ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?= $key2->ty2_desc; ?> |
                                                                            <span class="label" style="color: black;background-color: <?= $key2->ca_color; ?>; font-size: 75%;"><strong><?= $key2->ca_desc; ?></strong></span>&nbsp;
                                                                            <span class="label" style="color: black;font-size: 75%; background-color: <?= $key2->ni_color; ?>;"><strong><?= $key2->ni_mg; ?> mg</strong></span>
                                                                        </td>
                                                                        <td>
                                                                            <?= $key2->pa_qty; ?>
                                                                        </td>
                                                                        <td><?= $key2->pa_tester; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3">Batch : <?= $key2->pa_batch; ?><br />
                                                                            Hologram : <?= $key2->pa_hologram; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            <?php }else{ ?>
                                                                <tr>
                                                                    <td align='center' colspan="3">
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
                            <?php   }
                            }else{ ?>
                                <tr>
                                    <td colspan="4" align = 'center'>
                                        -- No Data --
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var num = 1;
        $('.con').click(function() {
            var k = $(this).data('del');
            bootbox.confirm({
                title: '<i class="fa fa-refresh" aria-hidden="true"></i> Reset',
                message: "Do you want to delete the parcel detail? This cannot be undone.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm'
                    }
                },
                callback: function(result) {
                    if (result) {
                        window.location = '<?= site_url('nasty_v2/dashboard/page/e4?key='); ?>'+k;
                    }
                }
            });
        });
        $('#cat').change(function() {
			temp = $(this).val();
			if (temp == -1) {
				$("#addBtn").prop('disabled' , 'disabled');
			}
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxItem'); ?>', {ca_id : temp}, function(data) {
				$("#divType").html(data);
			});
		});
		$("#addBtn").click(function() {
			type = $("#itemType").val();
			nic = $("#inputNico").val();
			cat = $("#cat").val();
			//alert(type + " " + nic + " " + cat);
			num ++;
			$.post('<?= site_url("nasty_v2/dashboard/getAjaxItemList/parcel") ?>', {type : type , nico : nic , cat : cat , num : num}, function(data) {
				$("#orderList").append(data);
			});
		});
        $('.btnV').click(function() {
            row = $(this).data('view');
            if ($('#'+row).is(':visible')) {
                $('#'+row).slideUp('slow');
            }else{
                $('#'+row).slideDown('slow');
            }
        });
    });
</script>
