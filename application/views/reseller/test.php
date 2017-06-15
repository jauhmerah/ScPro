<?php 
	include "./asset/maybank/m2upay_backend/M2UPay.php";
	use M2U\M2UPay;

	//Pass in required parameters 
	$m2u_json= array(
	  'amount'=> 100.00,
	  'accountNumber'=>"A12345", //This “accountNumber” field is for you to pass the purchase ref number / invoice number/ bill number. Maybank will pass the same purchase ref number / invoice number/ bill number back to you (under parameters 'AcctId') to match the transaction status when Maybank send you the  Realtime Payment Notification (RPN).  
	  'payeeCode'=>"123456"
	);

	$envType = 0; 
	$M2UPay = new M2UPay();
	$encrypt_json = $M2UPay->getEncryptionString($m2u_json, $envType);

?>

<div id="m2upay"></div>

<script type="text/javascript" src="<?= base_url('asset/maybank/m2upay_frontend'); ?>/m2upay_frontend.js"></script>

<script>
  //TO BE PASS FROM getEncryptionString function.
  var encrypt_json = <?php echo $encrypt_json; ?>

  m2upay.initPayment(encrypt_json.encryptedString,encrypt_json.actionUrl, 'OT');
</script>