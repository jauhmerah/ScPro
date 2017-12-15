<style type="text/css">
    #g1div , #g2div{
    width   : 100%;
    height  : 500px;
}

.amcharts-export-menu-top-right {
  top: 10px;
  right: 0;
}

.thead-inverse th {
    color: #fff;
    background-color: #292b2c;                       
</style>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>  
<div class="row">
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
    <div class="col-md-12 col-sm-12">
          <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Total Flavored By Nicotine</span>
                  <span class="caption-helper">Nicotine Statistic</span>
                </div>
                <div class="actions">
                </div>
            </div>
            <div class="clear" style="height:40px;"></div>
            <div class="portlet-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    <div class="col-lg-10">
                        <select id="color" class="form-control">
                            <option value="-1">-- All Flavor --</option>
                            <?php 
                            for ($i=0; $i < sizeof($color); $i++) { ?>
                                <option value="<?= $color[$i]->ty2_id; ?>"><?= $color[$i]->ty2_desc; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" id="flavBtn" class="btn btn-circle purple">Generate</button>
                    </div>                                            
                    </div>
                </div>
                <div class="clearfix">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div align="center">
                    <h2><span id="mgL"></span> Flavor</h2>
                </div>
            </div>
                <div id="g2_loading" class="display-none">
                    <img src="<?= base_url(); ?>/asset2/global/img/loading.gif" alt="loading" /> </div>
                    <!-- #graph -->                                      
                <div id="site_statistics_content"  >
                    <div id="g2div" class="display-none"> </div>
                    <div id="g2code" ></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Inventory Table</span>
                  <span class="caption-helper"></span>
                </div>
                <div class="actions">
                </div>
            </div>
            <div class="clear" style="height:40px;"></div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                       <thead class="thead-inverse">
                           <tr>
                               <th rowspan="2">Flavor</th>
                               <th colspan="3">Quantity</th>
                               <th rowspan="2">Total</th>
                           </tr>
                           <tr>
                               <th>0 Mg</th>
                               <th>3 Mg</th>
                               <th>6 Mg</th>
                           </tr>
                       </thead>
                       <tbody>
                        <?php if (sizeof($arr) != 0) { 
                            foreach ($arr as $td) {
                            $sum = 0;                                
                            ?>
                            <tr>
                               <td><?= $td['color']; ?> - <span class="label" style="color: black;background-color: <?= $td['cseries']; ?>; font-size: 75%;" ><strong><?= $td['series']; ?></strong></span></td>
                               <td><?php if (isset($td[0])) {
                                   echo $td[0];
                                   $sum += $td[0];
                               }else{
                                    echo "<strong><span class = 'font-red'>n/a</span></strong>";
                                } ?>                                   
                               </td>
                               <td><?php if (isset($td[1])) {
                                   echo $td[1];
                                   $sum += $td[1];
                                }else{
                                    echo "<strong><span class = 'font-red'>n/a</span></strong>";
                                } ?>                                   
                               </td>
                               <td><?php if (isset($td[2])) {
                                   echo $td[2];
                                   $sum += $td[2];
                                }else{
                                    echo "<strong><span class = 'font-red'>n/a</span></strong>";
                                } ?></td>
                               <td><?= $sum; ?></td>
                           </tr> 
                        <?php  } }else{ ?>
                            <tr>
                                <td colspan="5" align="center"><strong>No Record Data</strong></td>
                            </tr>
                        <?php }
                        ?>                           
                       </tbody>
                    </table>
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
    $('#flavBtn').click(function() {
        id = $("#color").val();
        $.post('<?= site_url('graph/getAjaxGraph2') ?>', {id: id}, function(data) {
            $.when($('#g2code').html(data)).then(function(){
                $("#g2div").removeClass('display-none');
                $("#g2_loading").addClass('display-none');
            });
        });
    });
    $('#flavBtn').click();
</script>


