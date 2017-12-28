<script>
    $(document).ready(function(){
        bootbox.prompt({
                        title: "Danger Zone",

						value: "<?= $arr->fi_danger; ?>",
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

                                $.post('<?= site_url('nasty_v2/dashboard/updateDanger'); ?>', {id: <?= $arr->bi_id; ?>, danger: result }, function(data) {

                                    $(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/i2').'/'.$page; ?>");

                                });

                            }
                        }
                    });

    });
</script>