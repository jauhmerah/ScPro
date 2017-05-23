<div>
    
</div>
<div class="row">
	<div class="col-md-12">        
		<div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cubes font-yellow-casablanca"></i>
                    <span class="caption-subject bold font-yellow-casablanca uppercase"> Product List </span>
                    <span class="caption-helper">more samples...</span>
                </div>                
            </div> 
        <div class="portlet-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-8">
                    <div class="row">
                        <div class="progress progress-striped active" style="height: 40px;">
                            <div class="progress-bar" role="progressbar" style="width: 19%">
                                <span class="sr-only"> 40% Complete (success) </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" style="width: 19%">
                                <span class="sr-only"> Deny </span>
                            </div>
                            <div class="progress-bar purple-plum" style="width: 22%">
                                <span class="sr-only"> 20 - 40 pcs </span>
                            </div>
                            <div class="progress-bar progress-bar-warning" style="width: 19%">
                                <span class="sr-only"> 41 - 60 pcs</span>
                            </div>
                            <div class="progress-bar progress-bar-success" style="width: 40%">
                                <span class="sr-only"> 61 - 100 pcs </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span class="label label-danger">Deny</span> <= 19 pcs <span class="label bg-purple-plum bg-font-purple-plum">RM 17.50</span> : 20-40 pcs <span class="label label-warning">RM 17.00</span> : 41-60 pcs <span class="label label-success">RM 16.50</span> : 61-100 pcs
                    </div>                    
                    </div>
                    <div class="col-xs-4">
                        <a class="dashboard-stat dashboard-stat-v2" style=" border: 2px solid #337ab7;">
                            <div class="visual">
                                <i>RM</i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="17.50">0</span>
                                </div>
                                <div class="desc">Price Rate</div>
                            </div>
                        </a>
                    </div>
                </div>                
            </div>      
        </div>
        </div>
	</div>
</div>
<div class="row">
    <dir class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group">
                            <label for="input" class="col-sm-2 control-label">Series :</label>
                            <div class="col-sm-10">
                                <select name="" id="input" class="form-control input-circle">
                                    <option value="">-- Select One --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                    <br>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="input" class="col-sm-2 control-label">Flavor :</label>
                            <div class="col-sm-10">
                                <select name="" id="input" class="form-control input-circle">
                                    <option value="">-- Select One --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group">
                            <label for="input" class="col-sm-2 control-label">Nico :</label>
                            <div class="col-sm-10">
                                <label>6 mg</label>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <br>
                    </div>
                    <div class="row">
                        <span class="pull-left" style="padding-top: 15px;"><i class="fa fa-spinner fa-spin"></i> <i class="fa fa-flask"></i> Brewing In Progress</span><span class="pull-right"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i> Add</button></span>
                    </div>
                </div>
                <div class="clearfix">
                    <br>
                    <hr>
                </div>
                <div class="clearfix">
                    <br>
                </div>
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Flavor Detail</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bad Blood</td>
                            <td><input type="number" name="qty" id="inputQty" class="form-control input-circle" min="1" max="100" step="1" required="required" title="Quantity"></td>
                            <td><span class="pull-right"><button type="button" class="btn btn-danger btn-circle "><i class="fa fa-trash"></i></button></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </dir>    
</div>

<!-- invoice end -->
<script>
    var c = null;
    var num = 0;
    $(document).ready(function() {
        onStartPage(null , -1 );
        $('#siri').change(function() {
            var siri = $(this).val();
            var tapis = $('#filter').val();
            $.when($('#pro').html($('#loading1').html())).then(function(){
                onPageLoad(tapis , siri);
            });            
        });
        $('#filter').keyup(function() {
            var siri = $('#siri').val();
            var tapis = $(this).vsal();
            $.when($('#pro').html($('#loading1').html())).then(function(){
                onPageLoad(tapis , siri);
            });    
        });
        $('#pro').on('click', '.kanta', function() {
            var id = $(this).data('item');
            var ty = $(this).data('type');
            $.post('<?= site_url('reseller/getAjaxProductDetail') ?>', {id: id , ty : ty}, function(data) {
                var detail = bootbox.dialog({
                    message : data
                });
            });
        });
        $('#ordlist').on('click', '.cancelList', function() {
            var li = $(this).data('row');
            var inv = $(this).data('inv');
            alert(li+inv);
            $('#ordlist').find('#'+li).remove();
        });
    });
    function onStartPage(f , s) {
        $.post('<?= site_url('reseller/getAjaxProduct') ?>', {filter : f , series : s , type : 1}, function(data) {
            $("#pro").html(data);
            showProduct();
        });
    }
    function productList(t) {
        var s = $('#siri').val();
        var f = $('#filter').val();
        $.when(hideProduct()).then(
            function(){
                $("#listTitle").html(listTitle(t));
                $.post('<?= site_url('reseller/getAjaxProduct') ?>', {filter : f , series : s , type : t}, function(data) {
                    $("#pro").html(data);
                    showProduct();
                });
            }
        );     
    }    
    function listTitle(x) {
        switch (x){
            case 1 : return '<i class="fa fa-cube"></i> À la carte';break;
            case 2 : return '<i class="fa fa-cubes"></i> Bundle Package';break;
            case 3 : return 'Merchandise';break;
            default : return 'Error : #b1v1';
        }
    }
    function showProduct() {
        var x = $("#pro").children('.product:hidden');
        if (x.length) {
            x.first().show('fast');
            setTimeout(showProduct,50);
        }     
    }
    function hideProduct() {
        var x = $("#pro").children('.product:visible');
        if (x.length) {
            $.when(x.hide('fast')).then(function(){
                $(this).remove();
            });            
        }        
    }
</script>
	</div>
</div>
 
