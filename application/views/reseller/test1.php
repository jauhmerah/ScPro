<div id="m2upay"></div>

<script type="text/javascript" src="<?= base_url('asset/maybank/m2upay_frontend'); ?>/m2upay_frontend.js"></script>

<script>
  //TO BE PASS FROM getEncryptionString function.
  var encrypt_json = <?php echo $encrypt_json; ?>

  m2upay.initPayment(encrypt_json.encryptedString,encrypt_json.actionUrl, 'OT');
</script>