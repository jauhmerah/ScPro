<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>  
<div class="row">
<code><?php print_r($arr); ?></code>
	<div class="col-md-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Total By Flavor</span>
                  <span class="caption-helper">Total Statistic</span>
                </div>
                <div class="actions">
                </div>
            </div>
            <div class="clear" style="height:40px;"></div>
            <div class="portlet-body">
                <div id="g1_loading" align="center">
                    <img src="<?= base_url(); ?>/asset2/global/img/loading.gif" alt="loading" /> </div>
                    <!-- #graph -->                                      
                <div id="site_statistics_content" >
                    <div id="g1div" class="display-none"></div>
                    <div id="g1code"></div>
                </div>                                    
            </div>                                
        </div>
        <!-- END PORTLET-->
    </div>
</div>

<script>
    $.post('<?= site_url('graph/getAjaxGraph1') ?>', {}, function(data) {
        $.when($('#g1code').html(data)).then(function(){
            $("#g1div").removeClass('display-none');
            $("#g1_loading").addClass('display-none');
        });
    });

</script>


