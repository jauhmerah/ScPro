
<div class="row">
	<div class="col-md-12">
        <pre></pre>
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
                <div class="form-group">
                    <div class="col-md-6">
                    <div class="form-group form-inline">
                        <input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
                        <input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">  
                    </div>
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
        onPageLoad(null , -1);
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
        $('#pro').on('click', '.mg', function() {
            var mg = $(this).data('mg');
            var id = $(this).data('id');
            num ++;
            $.post('<?= site_url('reseller/getAjaxCart') ?>', {mg : mg , id : id , num : num}, function(data) {
                $('#ordlist').append(data);
            });
            $.post('<?= site_url('reseller/getAjaxCartInv') ?>', {mg : mg , id : id , num : num}, function(data) {
                $('#ordlist').append(data);
            });
        });
        $('#ordlist').on('click', '.cancelList', function() {
            var li = $(this).data('row');
            var inv = $(this).data('inv');
            alert(li+inv);
            $('#ordlist').find('#'+li).remove();
        });
    });
    function onPageLoad(f , s) {
        $.post('<?= site_url('reseller/getAjaxProduct') ?>', {filter : f , series : s}, function(data) {
            $("#pro").html(data);
        });
    }
</script>
	</div>
</div>
 