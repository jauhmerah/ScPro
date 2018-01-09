<script>
    $(document).ready(function(){
        bootbox.prompt({
                        title: "Barcode Number",

						value: "<?= $arr->bi_code; ?>",
						buttons: {
							confirm: {
								label: 'Update',
								className: 'btn-success'
							},
							cancel: {
								label: 'Close',
								className: 'btn-danger'
							}
						},
                        callback: function (result) {

                            if(result){

                                $.post('<?= site_url('nasty_v2/dashboard/updateBarcode'); ?>', {id: <?= $arr->bi_id; ?>, barcode: result }, function(data) {

                                    $(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/i4').'/'.$page; ?>");

                                });

                            }
                        }
                    });

    });
</script>