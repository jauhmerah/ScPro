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


<body style="background-color:#EAEDED">


<div class="readonly-payment-information__nav-actions">
                  
  <?php
  if ($arr['order']->or_paid) { ?>
    <div class="ReadOnlyExtrasStatus paid">
    PAID
  </div>
  <?php }else{ ?>
    <div class="ReadOnlyExtrasStatus paid" style="background-color: orange;">
    UnPaid
  </div>
  <?php }
  ?>
  
</div> 
<div class="clear" style="height: 30px;"></div>


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
        <strong><?= $arr['order']->us_fname; ?> <?= $arr['order']->us_lname; ?></strong>        
          <div class="contemporary-template__metadata__customer__address">
  			<br>
				  <table style="width:200px;">
        <tr>
        <td>
         <?= $arr['order']->address; ?>
         </td>
         </tr>
         </table>
          <br>
          <?= $arr['order']->us_phone; ?><br>
         <?= $arr['order']->us_email; ?><br>
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
            <span> <?= "MY-".$or_code.'-INV'; ?></span><br>
          </td>
        </tr>
        
        <tr class="wv-table__row">
          <td class="wv-table__cell" style="text-align: right;">
            <strong class="wv-text--strong">Invoice Created Date : </strong>
          </td>
          <td></td>
          <td class="wv-table__cell" style="text-align: right;">
          <?php 
            $temp = date_create($arr['order']->or_date);
          ?>
            <span><?= date_format($temp,"Y-m-d"); ?></span><br>
          </td>
        </tr>        
      </table>
      <h3>Payment Details:</h3>
            <ul class="list-unstyled">
                <li>
                    <a href="http://www.maybank2u.com.my/" target="_blank"><img src="<?= base_url('asset/maybank/maybank2u_logo.png'); ?>" class="img-responsive" alt="Image"></a>
                <li>
                    <strong>Recipient Ref: </strong>MY-<?= $or_code; ?> </li>
                <li>
                    <strong>Recipient Bank: </strong>Maybank Bank Berhad </li>
                <li>
                    <strong>Account Number: </strong>45454DEMO545DEMO </li>
                <li>
                    <strong>Account Name: </strong>Nsty Worldwide </li>
            </ul>      
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
         <?php 
          if (!isset($arr)) {
          ?>
         <tr>
          <td align="center">-- No Data--</td>
          </tr>
          <?php
          } else {  
              $n = 0;
              $total_all=0.0;
              foreach ($arr['item'] as $key) {
              $n++;
            ?>

         <tr>
          <td style="color: #000000;">
          	<strong><?= $key->ty2_desc; ?></strong>
          	<br>
			     <?= $key->ca_desc; ?> | <?= $key->ni_mg; ?>mg
          </td>
          <td style="color: #000000;" style="width:60px;"><?= $key->oi_qty; ?></td>
          <td style="color: #000000;" style="width:60px;"><?= $arr['order']->or_price; ?></td>          
          <td style="color: #000000;" style="width:60px;">RM <?= number_format((float)$total=$key->oi_qty * $arr['order']->or_price, 2, '.', '');?></td>
        

        </tr>
      
        <?php 
           $total_all=$total_all+$total; 
          }
          $subTot = $total_all;
          $total_all += $arr['order']->or_shipping_price;           
        } ?>
         <tr>
        <td style="color: #000000;text-align: right;" colspan="3"><strong>Total :</strong></td>
          <td style="color: #000000;">RM <?php echo number_format((float)$subTot, 2, '.', ''); ?></td>
        </tr>
         <tr>
        	  <tr>
        <td style="color: #000000;text-align: right;" colspan="3">Shipping :</td>
          <td style="color: #000000;">RM <?= number_format((float)$arr['order']->or_shipping_price, 2, '.', '');?></td>
        </tr>
          <td style="color: #000000;text-align: right;" colspan="3"> <strong>Amount Due :</strong></td>
          <td style="color: #000000;"><strong>RM <?php echo  number_format((float)$total_all, 2, '.', ''); ?></strong></td>
        </tr>      
      </tbody>
    </table>
  </div>
</div>
<!-- invoice end -->
<footer>
<div class="clear" style="height: 100px;"></div>
	</body>
</html>
<script>    
	 	window.print();	
</script>