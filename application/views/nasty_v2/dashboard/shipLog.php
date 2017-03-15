<div class="row">
	<div class="col-md-12">
           <div class="tab-pane active" id="tab_1">
                        <div class="portlet box red-soft ribbon mt-element-ribbon" >
                            <div class="portlet-title">
                                <div class="caption">
                                    <img src="<?= base_url(); ?>/assets/cover/favicon2.png"> Shipping Log                                   
                                </div>
                            
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <div style="display: none;" class="riben ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-round ribbon-border-dash-hor ribbon-color-warning uppercase">
                                    <div class="ribbon-sub ribbon-clip ribbon-right"></div><i class="fa fa-warning" ></i> Unconfirm Order </div>
                                
                                <!-- END FORM-->
                            </div>
                        </div>                       
                    </div>
        </div>
</div>
<script>
	var num = 1;
	$(document).ready(function() {		
		$('#client').change(function() {
			temp = $(this).val();
			$.when($('#loadingText').show()).then(function(){
				$.post('<?= site_url('nasty_v2/dashboard/getAjaxClient'); ?>', {key : temp}, function(data) {
					$.when($('#clientInfo').html(data)).then(function(){
						$('#loadingText').hide();
					});
				});
			});
		});
		$('#cat').change(function() {
			temp = $(this).val();
			if (temp == -1) {
				$("#addBtn").prop('disabled' , 'disabled');
			}
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxItem'); ?>', {ca_id : temp}, function(data) {
				$("#divType").html(data);
			});
		});
		$("#addBtn").click(function() {
			$.when($('#loadingItem').show()).then(function(){
				type = $("#itemType").val();
				nic = $("#inputNico").val();
				cat = $("#cat").val();			
				num ++;
				$.post('<?= site_url("nasty_v2/dashboard/getAjaxInvItemList") ?>', {type : type , nico : nic , cat : cat , num : num}, function(data) {
					$.when($("#orderList").append(data)).then(function(){
						$('#loadingItem').hide();
					});					
				});
			});		
		});
		$(".inputText").keyup(function() {
			rad = $(this).prop('id');
			v = $(this).val();
			$("."+rad).val(v);
		});
		$('.confirm').click(function() {
			pr_id = $('#pr_id').val();
			if (pr_id == 1) {
				$(this).removeClass('btn-success').addClass('btn-warning');
				$(this).text("Unconfirm");
				$('.riben').show('slow');
				$('#pr_id').val('4');
			}else{
				$(this).removeClass('btn-warning').addClass('btn-success');
				$(this).text("Confirm");
				$('.riben').hide('slow');
				$('#pr_id').val('1');
			}
		});
	});

</script>