<script>
	$(document).ready(
    function () {
        $('.Page').slimScroll({
            position: 'right',
            height: '600px',
            railVisible: true,
            alwaysVisible: true
        });
    });
</script>
<div class="row">
<pre><?php print_r($type); ?></pre>
	<div class="col-md-6">
		<div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cubes font-yellow-casablanca"></i>
                    <span class="caption-subject bold font-yellow-casablanca uppercase"> Product List </span>
                    <span class="caption-helper">more samples...</span>
                </div>
                <div class="inputs">
                    <div class="portlet-input input-inline input-medium">
                        <div class="input-group">
                            <input type="text" id="filter" class="form-control input-circle-left" placeholder="product ID...">
                            <span class="input-group-btn">
                                <button class="btn btn-circle-right btn-default" type="submit">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div> 
        <div class="portlet-body">
            <div class="row">
                <div class="col-xs-12">
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
	<div class="col-md-6">
		<div class="portlet light" style="height: 746px">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cart-arrow-down font-yellow-casablanca"></i>
                    <span class="caption-subject bold font-yellow-casablanca uppercase"> Order List </span>
                    <span class="caption-helper">Form</span>
                </div>
                <div class="inputs">
                    <div class="portlet-input input-inline input-medium">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-circle-left btn-success" type="submit">Proceed Order</button>
                                <button class="btn btn-default">Cancel</button>
                                <button class="btn btn-circle-right red">Reset</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body Page">
                <form action="" method="POST" role="form">
                	<table class="table table-hover table-striped">
                		<thead>
                			<tr>
                				<th>#</th>
                				<th>Product Detail</th>
                                <th>Nico</th>
                				<th>Quantity</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody id="ordlist">
                			
                		</tbody>
                	</table>
                	<!--<button type="submit" class="btn btn-primary">Submit</button>-->
                </form>
            </div>
        </div>		
	</div>
</div>
<div class="row">
<div class="input-group col-md-12" align="center">
    <span class="input-group-btn">
        <button class="btn btn-circle-left btn-success" type="submit">Proceed Order</button>
        <button class="btn btn-default">Cancel</button>
        <button class="btn btn-circle-right red">Reset</button>
    </span>
</div></div>
<div class="row">

	<div class="col-md-12" style="overflow: scroll;">
		<style>

header {
    padding: 1em;
   background-color: #F0F6F9;
    clear: left;
    text-align: center;
}
footer{
  text-align: center;
}
.verticalLine {
    border-left: thin solid #d6d9db;
}

.pdf-export #NextContemporary, .read-only-view #NextContemporary {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    width: 860px;
    margin: auto;
    background-color: #FFFFFF;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    padding: 16px 30px 20px 30px;
    position: relative;
    min-height: 1024px;
}
user agent stylesheet
div {
    display: block;
}

input, input:hover, input:focus, input:active {
  background: transparent;
  border: none;
  border-style: none;
  border-color: transparent;
  outline: none;
  outline-offset: 0;
  box-shadow: none;
}
.readonly-payment-information__nav-actions {
    margin: 0 auto;
    width: 820px;
    position: relative;
}
.readonly-payment-information__details {
    background: #FFF;
    border-top: 1px solid #D0DBE1;
    border-bottom: 1px solid #D0DBE1;
    line-height: 50px;
    text-align: center;
    margin-bottom: 30px;
}
.sc-heading--title, .sc-generated-content h1:not([class*="wv-"]) {
    font-size: 31px;
    line-height: 40px;
    font-weight: 200;
}
.sc-heading--title, .sc-generated-content h1:not([class*="wv-"]), .sc-heading--subtitle, .sc-heading--section-title, .sc-generated-content h2:not([class*="wv-"]), .sc-heading--subsection-title, .sc-generated-content h3:not([class*="wv-"]), .sc-form-legend {
    display: block;
    margin: 32px 0 16px;
    font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
    color: #4c5357;
    font-weight: 400;
}
.readonly-payment-information__title {
    background: #E9EEF1;
    padding: 50px 0;
    text-align: center;
    margin: 0!important;
}
.readonly-payment-information__details__items {
    font-size: 18px;
    color: #6C90A2;
    display: inline-block;
    vertical-align: middle;
}
.readonly-payment-information__title {
    background: #E9EEF1;
    padding: 50px 0;
    text-align: center;
    margin: 0!important;
}

#ReadOnlyMain.payments-disabled:not(.ghost-form) .ReadOnlyExtrasStatus {
    display: inline-block;
    right: 30px;
}

.readonly-payment-information__nav-actions .ReadOnlyExtrasStatus {
    right: 0!important;
}
.ReadOnlyExtrasStatus.paid {
    background: #74aa00;
}
body .ReadOnlyExtrasStatus {
    display: block;
    right: 30px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.ReadOnlyExtrasStatus {
    display: none;
    right: 0;
    top: 0;
    position: absolute;
    color: #fff;
    text-align: center;
    text-transform: uppercase;
    font-size: 2em;
    font-weight: 500;
    padding: 10px 20px;
}

#ReadOnlyMain {
    font-family: "Open Sans",sans-serif;
    margin-right: 400px;
}


@media print {
    .readonly-payment-information__nav-actions{
      display: none;



}
</style>

     <div class="row-fluid">
              <div id="ReadOnlyView" class="span12 read-only-view">
                


<!-- invoice start -->
<div class="clear" style="height: 40px;"></div>
<div id="NextContemporary" class="export-template">
 
   
          
        <img class="contemporary-template__business-logo" src="<?= base_url(); ?>assets/cover/nstylogo.png" width="314" height="161"/>
      
   
  	<div class="pull-right" style="text-align: right;">
      <h1><big>INVOICE</big></h1>
      <strong>NSTY WORLDWIDE SDN BHD</strong>
      
        <div class="contemporary-template__header__info__address">
          
		  Lot 139, 1st Floor, Jalan Besar Tampin,<br>
		  Tampin,
		  Negeri Sembilan  73000<br>
		  Malaysia<br>

		<br>

 		 Phone:  +6012 3437638<br>

 		 Mobile: +6013 6777791<br>
  			<span class="wrappable">www.nastyjuice.com<br></span>
        </div>
        </div>
      
    
    <div class="clear" style="height: 70px;"></div>
<hr>


  <div class="contemporary-template__divider contemporary-template__divider--full-width"></div>

  <section class="contemporary-template__metadata">
    <div class="pull-left">
      <div class="contemporary-template__metadata__customer--billing">
        <div class="contemporary-template__metadata__customer__address-header">BILL TO :</div>
        <strong>jauhmerah</strong>
        
          <div class="contemporary-template__metadata__customer__address">
  			<br>

				  <table style="width:200px;">
        <tr>
        <td>
         Jalan2 Cari makan
         </td>
         </tr>
         </table>
          <br>
          011111111111<br>
         jauhmerah@gmail.com<br>
				</div>
        
      </div>
      
    </div>

    <div class="pull-right">
      <table class="wv-table">
        <tr class="wv-table__row">
          <td class="wv-table__cell" style="text-align: right;">
            <strong class="wv-text--strong">Invoice Number : </strong>
          </td>
          <td></td>
          <td class="wv-table__cell" style="text-align: right;">
            <span> <?= "INV-" ?></span><br>
          </td>
        </tr>
        
        <tr class="wv-table__row">
          <td class="wv-table__cell" style="text-align: right;">
            <strong class="wv-text--strong">Invoice Date : </strong>
          </td>
          <td></td>
          <td class="wv-table__cell" style="text-align: right;">
          Order date
            <span><?php //  date_format($temp,"Y-m-d"); ?></span><br>
          </td>
        </tr>
        <tr class="wv-table__row">
          <td class="wv-table__cell" style="text-align: right;">
            <strong class="wv-text--strong">Sales Person : </strong>
          </td>
          <td></td>
          <td class="wv-table__cell" style="text-align: right;">          
            <span><?php // $arr['staff']->us_username; ?></span><br>
          </td>
        </tr>
     
      </table>
   </div>
  </section>
<div class="clear" style="height: 100px;"></div>
<div class="clear" style="height: 100px;"></div>
  <div class="contemporary-template__items">
    <table class="table">
      <thead style="background-color: #FFFFFF;">
        <tr>
          <th style="color: #000000;" align="center">Item Details</th>
          <th style="color: #000000;" align="center">Quantity</th>
          <th style="color: #000000;" align="center">Price</th>
          <th style="color: #000000;" align="center">Amount</th>
        </tr>
      </thead>
      <tbody>
        <div id="invList">
            
        </div>         
        <tr>
            <td style="color: #000000;text-align: right;" colspan="3"><strong>Total :</strong></td>
            <td style="color: #000000;">RM <?php// echo number_format((float)$total_all, 2, '.', ''); ?></td>
        </tr>
        <tr>
            <td style="color: #000000;text-align: right;" colspan="3">Shipping :</td>
            <td style="color: #000000;">RM <?php // number_format((float)$arr['order']->or_traking, 2, '.', '');?></td>
        </tr>
        <tr>
            <td style="color: #000000;text-align: right;" colspan="3"> <strong>Amount Due :</strong></td>
            <td style="color: #000000;"><strong>RM <?php //echo  number_format((float)$total_all, 2, '.', ''); ?></strong></td>
        </tr>      
      </tbody>
    </table>
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
 