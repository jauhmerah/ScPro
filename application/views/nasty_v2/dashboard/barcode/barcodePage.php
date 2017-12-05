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
                                <th> Manage By </th>
                                <th> Parcel Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <a href="#">#100000</a></td>
                                <td> 0 </td>
                                <td> N/A </td>
                                <td>
                                    <span class="label label-md label-danger circle"><i class="fa fa-times-circle" aria-hidden="true"></i> Un-listed </span>
                                    <span class="label label-md label-success circle"><i class="fa fa-book" aria-hidden="true"></i> Listing Done </span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-md">
                                        <button type="button" class="btn dark btn-circle-left" title="Manage Parcel">
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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