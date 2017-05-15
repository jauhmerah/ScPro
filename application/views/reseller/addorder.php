
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
                    <div class="col-xs-4">
                        <a class="dashboard-stat dashboard-stat-v2" style=" border: 2px solid #337ab7;" href="javascript:productList(1);">
                            <div class="visual">
                                <i class="fa fa-cube"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="<?= $itemNum ?>">0</span>
                                </div>
                                <div class="desc">À la carte</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a class="dashboard-stat dashboard-stat-v2" style=" border: 2px solid #337ab7;" href="javascript:productList(2);">
                            <div class="visual">
                                <i class="fa fa-cubes"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="<?= $packNum; ?>">0</span>
                                </div>
                                <div class="desc">Package</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a class="dashboard-stat dashboard-stat-v2" style=" border: 2px solid #337ab7;" href="javascript:;">
                            <div class="visual">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="0">0</span>
                                </div>
                                <div class="desc">Merchandise</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <br>
            </div>
            <div class="row">
                    <div class="col-xs-6">
                        <h2><strong><span id="listTitle"><i class="fa fa-cube"></i> À la carte</span></strong></h2>
                    </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label">Search :</label>
                        <div class="col-sm-10">
                            <input type="text" name="" id="input" class="form-control input-circle input-sm" value="" placeholder="# Item Code">
                        </div>
                    </div>
                    <div class="clearfix">
                        &nbsp;
                    </div>
                     <div class="form-group">                 
                        <label for="input" class="col-sm-2 control-label">Series :</label>
                        <div class="col-sm-10">                            
                            <select name="siri" id="siri" class="form-control input-circle input-sm">
                                <option value="-1">-- Select All --</option>
                                <?php 
                                    foreach ($cat as $key) {
                                        ?>
                                        <option value="<?= $this->my_func->en($key->ca_id); ?>"><?= $key->ca_desc; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="clearfix">
                &nbsp;
            </div>
            <div class="row mt-element-card mt-element-overlay Page" id="pro">	    	
                <div align="center">
                    <h1><i class="fa fa-spinner fa-spin"></i></h1><br>
                    <h3><strong>Brewing In Progress</strong></h3>
                </div>
            </div>
            <div style="display: none;" id="loading1">
                <div align="center">
                    <h1><i class="fa fa-spinner fa-spin"></i></h1><br>
                    <h3><strong>Brewing In Progress</strong></h3>
                </div>
            </div>
        </div>
        </div>
	</div>
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
            $.post('<?= site_url('reseller/getAjaxProductDetail') ?>', {id: id}, function(data) {
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
 
