<div class="row addform"><!--style="display: none;-->
	<div class="col-md-12">
	<div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Add Order Form </div>
            <!--<div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
            </div>-->
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <div class="row">
            <div class = "col-md-12">           	
           	<form id = "add_form" class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= site_url('nasty_v2/dashboard/page/a11'); ?>">
           
                <div class="form-body">
                	<h3 class="form-section">Client Info</h3>
                	<div class="row">
                	<div class="col-md-6">
                		<div class="form-group">
	                        <label class="col-md-3 control-label">Client Name</label>
	                        <div class="col-md-9">
	                            <select name="name" id="inputName" class="form-control input-circle" required>
											<option value="-1" selected>-- Select One --</option>
											<?php
											foreach ($client as $cl) { ?>
												<option value="<?= $cl->cl_id; ?>" ><?= $cl->cl_name; ?></option>
											<?php }
											?>										
									</select><br/>
									<a href="<?= site_url('nasty_v2/dashboard/page/a4/add'); ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add Client</button></a>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-md-3 control-label">Send Date</label>
	                        <div class="col-md-9 ">
	                        <div class="input-icon right">
	                        	<i class="fa fa-calendar"></i>
	                            <input type="date" name="sendDate" id="inputSendDate" class="form-control input-circle">
	                        </div>
	                        </div>                        
	                    </div>                    
	                    <div class="form-group">
	                        <label class="col-md-3 control-label">Bank</label>
	                        <div class="col-md-9">
	                        <div class="input-icon right">
	                        	<i class="fa fa-institution"></i>
	                            <input type="text" name="bank" id="inputBank" class="form-control input-circle" >
	                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Deposit</label>
                        <div class="col-md-9">
                        	<div class="input-icon right">
                        		<i class="fa fa-money"></i>
                            <input type="text" name="deposit" id="inputDeposit" class="form-control input-circle" >
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Note</label>
                        <div class="col-md-9">
                            <textarea name="note" id="inputNote" class="form-control input-circle" rows="3"></textarea>
                        </div>
                    </div>
                	</div>
                	<div class="col-md-6">
                		<div id="clientDetail" >
                			<div align = "center"><img src="<?= base_url("assets/nasty/nastylogo.png"); ?>" class="img-responsive" alt="Image"></div>
                		</div>
                	</div>
                	</div>
                    <h3 class="form-section">Order List</h3> 
                    <div class="form-group">
                        <div class="row">
							<div class="col-md-4 col-md-offset-1" align="center">
								<img id="imgDetail" class="img-thumbnail" src="<?= base_url('assets/nasty/400x400.png'); ?>" alt="">
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-md-4">
										<span class="pull-left">Flavored</span><span class="pull-right">:</span>
									</div>
									<div class="col-md-8">
										<select name="perasa" id="inputPerasa" class="form-control input-circle">
											<option value="-1" selected>-- Select One --</option>
											<?php
											foreach ($type as $item) { ?>
												<option value="<?= $item->ty_id; ?>" ><?= $item->ty_desc; ?></option>
											<?php }
											?>										
										</select>
									</div>
								</div>
								<div class="clearfix">
								&nbsp;
								</div>
								<div class="row">
									<div class="col-md-4">
										<span class="pull-left">Nicotine</span><span class="pull-right">:</span>
									</div>
									<div class="col-md-8">
										<select name="nico" id="inputNico" class="form-control input-circle">
											<option value="-1" selected>-- Select One --</option>
											<?php 
												foreach ($nico as $mg) {?>
													<option style = "background-color: <?= $mg->ni_color; ?> ;" value="<?= $mg->ni_mg; ?>"><?= $mg->ni_mg; ?> Mg</option>
												<?php }
											?>											
										</select>
									</div>
								</div>
								<div class="clearfix">
								&nbsp;
								</div>
								<div class="row">
									<div class="col-md-4">
										<span class="pull-left">Quantity</span><span class="pull-right">:</span>
									</div>
									<div class="col-md-8">
										<input type="number" value="0" name="qty" id="inputQty" class="form-control input-circle">
									</div>
								</div>
								<div class="clearfix">
									&nbsp;
								</div>
								<div class="row">
									<div class="col-md-4">
										<span class="pull-left">Tester</span><span class="pull-right">:</span>
									</div>
									<div class="col-md-8">
										<input type="number" name="promo" id="inputPromo" class="form-control input-circle" value="0">
									</div>
								</div>
								<div class="clearfix">
									&nbsp;
								</div>								
								<div class="row">
									<span class="pull-left col-md-5 col-md-offset-1" id="loadingText" style="display: none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;Loading</span><span class="pull-right col-md-5"><button type="button" id="addBtn" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</button></span>
								</div>
								<div class="clearfix">
									&nbsp;
								</div>								
							</div>
						</div>
						<div class="clearfix">
							&nbsp;
						</div>
						
						<div class="clearfix">
							&nbsp;
						</div>
						<!-- Order Box -->
						<div class="row">
							<div class="col-xs-10 col-xs-offset-1">
								<div class="well">
									<ul class="media-list" id="orderBox">
									  	
									</ul>
								</div>
							</div>
						</div>
						<!--End of Order Box -->
						<input type="submit" id = "submitform" style="display: none;"></input>
                    </div>                                     
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="button" id="submit_btn" class="btn btn-circle green">Submit</button>
                            <a href="<?= site_url('nasty_v2/dashboard/page/a1') ?>"><button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button></a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
            </div>            	
            </div>
        </div>
    </div>	

	</div>
</div>

<script>
	$(document).ready(function() {		
		var num = 0;		
		$("#addBtn").click(function() {				
			if(checkInput()){
				flavcode = $("#inputPerasa").val();
				niccode = $("#inputNico").val();
				promo = $("#inputPromo").val();
				qty = $("#inputQty").val();
				flavname = $("#inputPerasa option:selected").text();
				imgIcon = icon(flavcode);
				num ++;
				lColor = lColorFunc(niccode);
				$.when($('#loadingText').show()).then(function(){
					$.post('<?= site_url("nasty_v2/dashboard/getAjaxOrderBox");?>', {
						flavname : flavname , 
						qty : qty , 
						promo : promo ,
						flavcode : flavcode , 
						niccode : niccode,
						num :num,
						imgIcon : imgIcon, 
						lColor : lColor
					}, function(data) {
						$("#orderBox").append(data);
						$('#loadingText').hide();
					});
				});
								
			}
		});

		//alert("jd lah");
		$("#submit_btn").click(function() {
			if(checkForm()){
				$("#add_form").submit();
			}
			
		});
		$('#inputName').change(function() {
			if ($(this).val()!= -1) {
 				//$('#clientDetail').html('jadi');
 				key = $(this).val();
 				$.post('<?= site_url("nasty_v2/dashboard/getAjaxClient");?>', {
 					key: key
 				}, function(data) {
 					$('#clientDetail').html(data);
 				});
			}else{
				$('#clientDetail').html('<div align = "center"><img src="<?= base_url("assets/nasty/nastylogo.png"); ?>" class="img-responsive" alt="Image"></div>');
			}
		});
		function checkForm(){
			if ($('#inputName').val() == -1) {
				$('#inputName').focus();
				alert("Please Select Client");				
				return false;
			}
			if ($('#inputSendDate').val() == '') {
				$('#inputSendDate').focus();
				alert("Please Select Send Date");				
				return false;
			}
			if ($("#orderBox li").size() == 0) {				
				$('#inputPerasa').focus();
				alert("Please Insert Order");
				return false;
			}
			//alert($("#orderBox li").size());
			return true;
		}
		function checkInput() {
			//return true;
			if ($("#inputPerasa").val() == -1) {
				$("#inputPerasa").focus();
				alert("Please Select Flavored!");				
				return false;
			}
			if ($("#inputNico").val() == -1) {
				$("#inputNico").focus();
				alert("Please Select Nicotine!");				
				return false;
			}
			if ($("#inputPromo").val() == "") {
				$("#inputPromo").val(0);
			}
			if ($("#inputQty").val() == '' || $("#inputQty").val() == 0) {
				$("#inputQty").focus();
				alert("Please Enter Quantity!");				
				return false;
			}
			return true;
		}

		$("#inputPerasa").change(function() {
			var i = $(this).val();
			$.when($('#loadingText').show()).then(function(){				
				$.when(changeImg(i)).then(function(){
					$('#loadingText').hide();
				});	
			});			
		});

		function changeImg(i) {
			
			<?php 
				foreach ($type as $item) { ?>
			if (i == <?= $item->ty_id; ?>) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/uploads/item/<?= $item->ty_img; ?>');
			}		
				<?php }
			?>
			if (i == -1) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/400x400.png');
			}
			return true;
		}

		function icon(code) {
				<?php 
					foreach ($type as $key) { ?>
				if (code == <?= $key->ty_id; ?>) {
						return "<?= $key->ty_icon; ?>";
					}	
				<?php	}
				?>
		}

		function lColorFunc(code) {
			<?php 
				foreach ($nico as $key) { ?>
				if (code == <?= $key->ni_mg; ?>) {
						return "<?= $key->ni_color; ?>";
					}	
				<?php	}
			?>
		}
	});
</script>