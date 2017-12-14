<div class="row">
    <div class="col-xs-12">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture"></i>DOC List </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th> Order Code </th>
                                <th> Parcel Qty </th>
                                <th> Sales Person </th>
                                <th> Parcel Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($arr as $key) {
                                $parcelNum = parcelCount($key->or_id);
                            ?>
                            <tr>
                                <td> <a href="#">#<?= 120000+$key->or_id; ?></a></td>
                                <td> <?= $parcelNum; ?> </td>
                                <td><?= $key->us_username; ?></td>
                                <td>
                                    <?php
                                    $parcelCount = parcelCount($key->or_id);
                                if ($parcelCount) {
                                    ?>
                                    <span class="label label-md label-success circle"><i class="fa fa-book" aria-hidden="true"></i> Listing Done </span>
                                    <?php
                                }else{ ?>
                                    <span class="label label-md label-danger circle"><i class="fa fa-times-circle" aria-hidden="true"></i> Un-listed </span>
                                <?php }
                                ?>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-md">
                                        <button type="button" class="btn dark btn-circle-left" title="Manage Parcel" onclick="location.href='<?= site_url('nasty_v2/dashboard/page/e2?id='.$this->my_func->scpro_encrypt($key->or_id."|parcel"));?>';">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-info" title="View Parcel List" onclick="window.open('<?= site_url('nasty_v2/dashboard/page/a111?v=2&view=').$this->my_func->scpro_encrypt($key->or_id); ?>');">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn green-dark" <?php if(!$parcelCount){ echo "disabled"; }?>>
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn red-mint btn-circle-right <?php if($parcelCount){ ?> con<?php } ?>" title="Reset Parcel" <?php if($parcelCount){ ?> data-del = "<?= $this->my_func->scpro_encrypt($key->or_id.'|parcelDel|1'); ?>" <?php }else{ echo "disabled"; } ?> >
                                            <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </button>
                                    </div>
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
<script>
    jQuery(document).ready(function() {
        $('.con').click(function() {
            var k = $(this).data('del');
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
                    if (result) {
                        window.location = '<?= site_url('nasty_v2/dashboard/page/e4?key=') ?>'+k;
                    }
                }
            });
        });
    });
</script>
