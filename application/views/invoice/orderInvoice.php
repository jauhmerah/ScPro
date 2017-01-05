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

#ReadOnlyMain {
    font-family: "Open Sans",sans-serif;
    margin-right: 400px;
}
</style>




<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>OrdYs v2.2.4 Alpha</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	</head>
	<body style="background-color:#EAEDED">



<!-- <div class="readonly-payment-information__details">
    <div class="readonly-payment-information__details__items">
      
      Invoice <?php $code = 100000 + $arr['order']->or_id; echo "#".$code; ?>
    &nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="readonly-payment-information__details__items">
    <div class="verticalLine">
    &nbsp;&nbsp;&nbsp;&nbsp;
      Amount due:
      $0.00
      &nbsp;&nbsp;&nbsp;&nbsp;
      </div>
    </div>
 
    <div class="readonly-payment-information__details__items">
    <div class="verticalLine">
    &nbsp;&nbsp;&nbsp;&nbsp;
      Due on:
      <?php if($arr['order']->or_dateline != '0000-00-00 00:00:00'){ echo date_format(date_create($arr['order']->or_dateline) , 'd-M-Y' );}else{echo '--Not Set--';} ?>
      </div>
    </div>
  </div> -->

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
        <strong><?= $arr['order']->cl_name; ?></strong>
        
          <div class="contemporary-template__metadata__customer__address">
 			 Bader Alsager
  			<br>

				  <table style="width:200px;">
        <tr>
        <td>
         <?= $arr['order']->cl_address; ?>
         </td>
         </tr>
         </table>
          <br>
          <?= $arr['order']->cl_tel; ?><br>
         <?= $arr['order']->cl_email; ?><br>
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
            <span> <?php $code = 100000 + $arr['order']->or_id; echo "#".$code; ?></span><br>
          </td>
        </tr>
        
        <tr class="wv-table__row">
          <td class="wv-table__cell" style="text-align: right;">
            <strong class="wv-text--strong">Invoice Date : </strong>
          </td>
          <td></td>
          <td class="wv-table__cell" style="text-align: right;">
            <span><?php echo date("Y-m-d") ; ?></span><br>
          </td>
        </tr>
        <tr class="wv-table__row">
          <td class="wv-table__cell" style="text-align: right;">
            <strong class="wv-text--strong">Payment Due : </strong>
          </td>
          <td></td>
          <td class="wv-table__cell" style="text-align: right;">
            <span><?php echo date("Y-m-d") ; ?></span><br>
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
          <td colspan="1" style="color: #000000;" style="width:60px;"><?= number_format((float)$total=$key->oi_qty * $key->oi_price, 2, '.', '');?></td>
        

        </tr>
      
        <?php 
           $total_all=$total_all+$total; 
          }
           
        } ?>

         <tr>
        <td style="color: #000000;text-align: right;" colspan="11"><strong>Total :</strong></td>
          <td style="color: #000000;">$<?php echo number_format((float)$total_all, 2, '.', ''); ?></td>
        </tr>
         <tr>
        	
          <td style="color: #000000;text-align: right;" colspan="11"> <strong>Amount Due (USD) :</strong></td>
          <td style="color: #000000;"><strong>$<?php echo  number_format((float)$total_all, 2, '.', ''); ?></strong></td>
        </tr>      
      </tbody>
    </table>
  </div>
</div>
<!-- invoice end -->
<footer>
<div class="clear" style="height: 100px;"></div>
		<!-- jQuery 
		<script src="//code.jquery.com/jquery.js"></script>-->
		<!-- Bootstrap JavaScript 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
	</body>
</html>
<script>

    
	 	window.print();

	
	</script>