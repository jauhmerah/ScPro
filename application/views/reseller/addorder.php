<script>
	$(document).ready(
    function () {
        $('.Page').slimScroll({
            position: 'right',
            height: '600px',
            railVisible: true,
            alwaysVisible: true
        });
        // $('.invoice').slimScroll({
        //     position: 'bottom',
        //     height: '600px',
        //     railVisible: true,
        //     alwaysVisible: true
        // });
    });
</script>
<div class="row">
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
                            <input type="text" class="form-control input-circle-left" placeholder="search...">
                            <span class="input-group-btn">
                                <button class="btn btn-circle-right btn-default" type="submit">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>            
        
        <div class="portlet-body">
        <div class="row mt-element-card mt-element-overlay Page">
	    	<div class="col-md-4 col-xs-4">
                <div class="mt-card-item">
                    <div class="mt-card-avatar mt-overlay-1">
                        <img src="<?= base_url(); ?>assets/uploads/product/img1.png">
                        <div class="mt-overlay">
                            <ul class="mt-info">
                                <li>
                                    <a class="btn default btn-outline" href="javascript:;">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn default btn-outline" href="javascript:;">
                                        <i class="icon-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-card-content">
                        <h3 class="mt-card-name">Bad Blood</h3>
                        <p class="mt-card-desc font-grey-mint">ID #bb1<br>Price : RM 20</p>
                        <div class="mt-card-social">
                            <div class="btn-group btn-group-xs btn-group-solid">
                                <button type="button" class="btn red btn-circle-left"><i class="fa fa-tint"> 0</i></button>
                                <button type="button" class="btn green"><i class="fa fa-tint"> 3</i></button>
                                <button type="button" class="btn blue btn-circle-right"><i class="fa fa-tint"> 6</i></button>
                            </div>
                           	<div class = "clearfix">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-4">
                <div class="mt-card-item">
                    <div class="mt-card-avatar mt-overlay-1">
                        <img src="<?= base_url(); ?>assets/uploads/product/img2.png">
                        <div class="mt-overlay">
                            <ul class="mt-info">
                                <li>
                                    <a class="btn default btn-outline" href="javascript:;">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn default btn-outline" href="javascript:;">
                                        <i class="icon-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-card-content">
                        <h3 class="mt-card-name">Devil Teeth</h3>
                        <p class="mt-card-desc font-grey-mint">ID #dt1<br>Price : RM 20</p>
                        <div class="mt-card-social">
                            <div class="btn-group btn-group-xs btn-group-solid">
                                <button type="button" class="btn red btn-circle-left"><i class="fa fa-tint"> 0</i></button>
                                <button type="button" class="btn green"><i class="fa fa-tint"> 3</i></button>
                                <button type="button" class="btn blue btn-circle-right"><i class="fa fa-tint"> 6</i></button>
                            </div>
                           	<div class = "clearfix">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-4">
                <div class="mt-card-item">
                    <div class="mt-card-avatar mt-overlay-1">
                        <img src="<?= base_url(); ?>assets/uploads/product/img3.png">
                        <div class="mt-overlay">
                            <ul class="mt-info">
                                <li>
                                    <a class="btn default btn-outline" href="javascript:;">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn default btn-outline" href="javascript:;">
                                        <i class="icon-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-card-content">
                        <h3 class="mt-card-name">Fat Boy</h3>
                        <p class="mt-card-desc font-grey-mint">ID #fb1<br>Price : RM 20</p>
                        <div class="mt-card-social">
                            <div class="btn-group btn-group-xs btn-group-solid">
                                <button type="button" class="btn red btn-circle-left"><i class="fa fa-tint"> 0</i></button>
                                <button type="button" class="btn green"><i class="fa fa-tint"> 3</i></button>
                                <button type="button" class="btn blue btn-circle-right"><i class="fa fa-tint"> 6</i></button>
                            </div>
                           	<div class = "clearfix">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-4">
                <div class="mt-card-item">
                    <div class="mt-card-avatar mt-overlay-1">
                        <img src="<?= base_url(); ?>assets/uploads/product/img4.jpg">
                        <div class="mt-overlay">
                            <ul class="mt-info">
                                <li>
                                    <a class="btn default btn-outline" href="javascript:;">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn default btn-outline" href="javascript:;">
                                        <i class="icon-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-card-content">
                        <h3 class="mt-card-name">Slow Blow</h3>
                        <p class="mt-card-desc font-grey-mint">ID #sb1<br>Price : RM 20</p>
                        <div class="mt-card-social">
                            <div class="btn-group btn-group-xs btn-group-solid">
                                <button type="button" class="btn red btn-circle-left"><i class="fa fa-tint"> 0</i></button>
                                <button type="button" class="btn green"><i class="fa fa-tint"> 3</i></button>
                                <button type="button" class="btn blue btn-circle-right"><i class="fa fa-tint"> 6</i></button>
                            </div>
                           	<div class = "clearfix">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-4">
                <div class="mt-card-item">
                    <div class="mt-card-avatar mt-overlay-1">
                        <img src="<?= base_url(); ?>assets/uploads/product/img5.jpg">
                        <div class="mt-overlay">
                            <ul class="mt-info">
                                <li>
                                    <a class="btn default btn-outline" href="javascript:;">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn default btn-outline" href="javascript:;">
                                        <i class="icon-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-card-content">
                        <h3 class="mt-card-name">Wicked Haze</h3>
                        <p class="mt-card-desc font-grey-mint">ID #wh1<br>Price : RM 20</p>
                        <div class="mt-card-social">
                            <div class="btn-group btn-group-xs btn-group-solid">
                                <button type="button" class="btn red btn-circle-left"><i class="fa fa-tint"> 0</i></button>
                                <button type="button" class="btn green"><i class="fa fa-tint"> 3</i></button>
                                <button type="button" class="btn blue btn-circle-right"><i class="fa fa-tint"> 6</i></button>
                            </div>
                           	<div class = "clearfix">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-4">
                <div class="mt-card-item">
                    <div class="mt-card-avatar mt-overlay-1">
                        <img src="<?= base_url(); ?>assets/uploads/product/img6.jpg">
                        <div class="mt-overlay">
                            <ul class="mt-info">
                                <li>
                                    <a class="btn default btn-outline" href="javascript:;">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn default btn-outline" href="javascript:;">
                                        <i class="icon-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-card-content">
                        <h3 class="mt-card-name">A$ap Grape</h3>
                        <p class="mt-card-desc font-grey-mint">ID #ag1<br>Price : RM 20</p>
                        <div class="mt-card-social">
                            <div class="btn-group btn-group-xs btn-group-solid">
                                <button type="button" class="btn red btn-circle-left"><i class="fa fa-tint"> 0</i></button>
                                <button type="button" class="btn green"><i class="fa fa-tint"> 3</i></button>
                                <button type="button" class="btn blue btn-circle-right"><i class="fa fa-tint"> 6</i></button>
                            </div>
                           	<div class = "clearfix">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
	</div>
	<div class="col-md-6">
		<div class="portlet light" style="height: 693px">
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
                				<th>Product ID</th>
                				<th>Quantity</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			<tr>
                				<td></td>
                				<td></td>
                				<td></td>
                				<td></td>
                			</tr>
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
          <th colspan="8" style="color: #000000;" align="center">Item Details</th>
          <th style="color: #000000;" align="center">Quantity</th>
          <th style="color: #000000;" align="center">Price</th>
          <th style="color: #000000;">Tester</th> 
          <th style="color: #000000;" align="center">Amount</th>
        </tr>
      </thead>
      <tbody>
         <?php 
          if (!isset($arr)) {
          ?>
         <tr>
          <td colspan="11" align="center">-- No Data--</td>
          </tr>
          <?php
          } else {  
              $n = 0;
              $total_all=0.0;
              foreach ($arr['item'] as $key) {
                
              
              $n++;
             
            ?>

         <tr>
          <td colspan="8" style="color: #000000;">
          	<strong><?= $key->ty2_desc; ?></strong>
          	<br>
			     <?= $key->ca_desc; ?> | <?= $key->ni_mg; ?>mg
          </td>
          <td colspan="1" style="color: #000000;" style="width:60px;"><?= $key->oi_qty; ?></td>
          <td colspan="1" style="color: #000000;" style="width:60px;"><?= $key->oi_price; ?></td>
          <td colspan="1" style="color: #000000;" style="width:60px;"><?= $key->oi_tester; ?></td>
          <td colspan="1" style="color: #000000;" style="width:60px;"><?= $duit; ?> <?= number_format((float)$total=$key->oi_qty * $key->oi_price, 2, '.', '');?></td>
        

        </tr>
      
        <?php 
           $total_all=$total_all+$total; 
          }
          if ($arr['order']->or_traking == null || $arr['order']->or_traking == '0000-00-00 00:00:00') {
            $arr['order']->or_traking = 0;
          }
          $total_all += $arr['order']->or_traking;           
        } ?>
         <tr>
        <td style="color: #000000;text-align: right;" colspan="11"><strong>Total :</strong></td>
          <td style="color: #000000;"><?php $duit; ?> <?php// echo number_format((float)$total_all, 2, '.', ''); ?></td>
        </tr>
         <tr>
        	  <tr>
        <td style="color: #000000;text-align: right;" colspan="11">Shipping :</td>
          <td style="color: #000000;"><?php $duit; ?> <?php // number_format((float)$arr['order']->or_traking, 2, '.', '');?></td>
        </tr>
          <td style="color: #000000;text-align: right;" colspan="11"> <strong>Amount Due :</strong></td>
          <td style="color: #000000;"><strong><?php $duit; ?> <?php //echo  number_format((float)$total_all, 2, '.', ''); ?></strong></td>
        </tr>      
      </tbody>
    </table>
  </div>
</div>
<!-- invoice end -->
<script>
	 	//window.print();	
	</script>
	</div>
</div>
