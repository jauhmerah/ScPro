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
                                <th> Parcel Qty </th>
                                <th> Manage By </th>
                                <th> Parcel Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //foreach ($arr as $key) { ?>
                            <tr>
                                <td> <a href="#">#< ?= 120000+$key->or_id; ? ></a></td>
                                <td> 0 </td>
                                <td> N/A </td>
                                <td>
                                    <span class="label label-md label-danger circle"><i class="fa fa-times-circle" aria-hidden="true"></i> Un-listed </span>
                                    <span class="label label-md label-success circle"><i class="fa fa-book" aria-hidden="true"></i> Listing Done </span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-md">
                                        <button type="button" class="btn dark btn-circle-left" title="Manage Parcel" onclick="location.href='<?= site_url('nasty_v2/dashboard/page/e2');?>';">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-info" title="View Parcel List">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn green-dark">
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn red-mint btn-circle-right con" title="Reset Parcel">
                                            <i class="fa fa-rebel" aria-hidden="true"></i>
                                        </button>
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
