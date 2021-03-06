<style>
.thead-inverse th {
    color: #fff;
    background-color: #292b2c;
</style>
<div class="row">
	<div class="col-md-12">
           <div class="tab-pane active" id="tab_1">
                        <div class="portlet box purple ribbon mt-element-ribbon" >
                            <div class="portlet-title">
                                <div class="caption">
                                    <img src="<?= base_url(); ?>/assets/cover/favicon2.png"> Order Form 2017
                                </div>
                                <div class="tools">
                                	<button type="button" class="btn btn-large btn-block btn-success confirm btn-circle">Confirm</button>
                                </div>

                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <div style="display: none;" class="riben ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-round ribbon-border-dash-hor ribbon-color-warning uppercase">
                                    <div class="ribbon-sub ribbon-clip ribbon-right"></div><i class="fa fa-warning" ></i> Unconfirm Order </div>
                                <form action="<?= site_url('nasty_v2/dashboard/page/z11'); ?>" method = "post" class="horizontal-form">
                                <input type="hidden" name="pr_id" id="pr_id" class="form-control" value="1">
                                    <div class="form-body" >
                                    	<div class="row">
                                    		<div class="form-group">
		                                	<label for="input" class="col-sm-2 control-label">Existing Client :</label>
		                                	<div class="col-sm-2">
		                                		<select name="client" id="client" class="input-circle form-control input-sm select2-multiple select2-hidden-accessible" tabindex="-1" aria-hidden="true">
											    <option value="-1">--New Client--</option>
		                                			<?php
		                                			foreach ($client as $key) { ?>
		                                				<option value="<?= $key->cl_id; ?>"> <?= $key->cl_name; ?> </option>
		                                			<?php }
		                                			?>
    											</select>
		                                	</div>
		                                	<span class="pull-left" id="loadingText" style="display: none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;Loading</span>
		                                </div>
                                    	</div>
                                        <h3 class="form-section">Client Info</h3>
                                        <div class="row" id = "clientInfo">
                                        	<div class="col-md-8">
                                        		<div class="row">
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Name* :</label>
		                                                    <input type="text" id="name" name="name" class="form-control input-circle" placeholder="Client Name" required>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Company :</label>
		                                                    <input type="text" id="company" name="company" class="form-control input-circle" placeholder="Nasty">
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                        </div>
		                                        <!--/row-->
		                                        <div class="row">
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Contact Number* :</label>
		                                                    <input type="text" id="tel" name="tel" class="form-control input-circle" placeholder="Client Number" required>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Country* :</label>
		                                                    <input type="text" id="country" name="country" class="form-control input-circle" placeholder="Country" required>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                        </div>
		                                        <!--/row-->
		                                        <div class="row">
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Sales Person* :</label>
		                                                    <input type="text" id="salesPerson" readonly name="salesPerson" class="form-control input-circle" value="<?php echo $this->my_func->scpro_decrypt($this->session->userdata('us_username')); ?>" >
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Email* :</label>
		                                                    <input type="text" id="email" name="email" class="form-control input-circle" placeholder="jauhmerah@nastyjuice.com" required>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                        </div>
		                                        <div class="row">
													<div class="col-md-12">
													    <div class="form-group">
													        <label class="control-label">Address* :</label>
													        <input type="text" id="address" name="address" class="form-control input-circle" placeholder = "Address" required >
													    </div>
													</div>
													<!--/span-->
												</div>
                                        	</div>
                                        	<div class="col-md-4">
                                        		<div class="row">
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Date Line :</label>
	                                                    <input type="date" id="dateline" name="dateline" class="form-control input-circle">
	                                                </div>
		                                            <!--/span-->
	                                            </div>
	                                            <div class="row">
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Order Date :</label>
	                                                    <input type="date" readonly id="orderdate" name="orderdate" value = "<?= date('Y-m-d'); ?>" class="form-control input-circle">
	                                                </div>
		                                            <!--/span-->
		                                        </div>
		                                        <div class="row">
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Finish Date :</label>
	                                                    <input type="date" readonly id="finishdate" name="finishdate" class="form-control input-circle">
	                                                </div>
		                                            <!--/span-->
		                                        </div>
		                                        <div class="row">
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Currency :</label>
	                                                    <select class="form-control input-circle" name="currency">
	                                                        <!-- <option value="3">GBP</option> -->
											                <option value="2">USD</option>
											                <option value="1">MYR</option>
	                                                    </select>
	                                                </div>
		                                            <!--/span-->
		                                        </div>
                                        	</div>
                                        </div>
                                        <!--/row-->
                                        <div class="clearfix">
                                        &nbsp;
                                        </div>
                                        <!-- Order Note -->
                                        <div class="col-md-12">
                                        <div class="row">
                                        	<div class="portlet box" style="border: 1px solid #3246d2;">
				                                <div class="portlet-title"  style="background-color: #3246d2;">
				                                    <div class="caption">
				                                        <i class="fa fa-cogs"></i>Order Note </div>

				                                </div>
				                                <div class="portlet-body">
				                                    <table class="table table-hover table-condensed">
				                                    	<thead>
				                                    		<tr>
				                                    			<th>Item Detail</th>
				                                    			<th>Price</th>
				                                    			<th>Qty</th>
				                                    			<th>Tester</th>
				                                    			<th>Action</th>
				                                    		</tr>
				                                    	</thead>
				                                    	<tbody id="orderList">
				                                    	</tbody>

				                                    	<tfoot>
				                                    		<tr>
				                                    			<td colspan="5">
				                                    				<textarea name="note" id="input" class="form-control input-circle input-lg" rows="4" placeholder="#Note"></textarea>
				                                    			</td>
				                                    		</tr>
				                                    		<tr>
				                                    			<td colspan="5">
				                                    				<div class="row">
				                                    					<div class="col-md-6">
				                                    						<div class="form-group">
				                                    							<label for="input" class="col-sm-4 control-label">Category : </label>
				                                    							<div class="col-sm-8">
				                                    								<select id="cat" class="form-control input-circle">
				                                    									<option value="-1">-- Select Category --</option>
				                                    									<?php
											                                			foreach ($cat as $key) { ?>
											                                				<option style="background-color: <?= $key->ca_color; ?>" value="<?= $key->ca_id; ?>"> <?= $key->ca_desc; ?> </option>
											                                			<?php }
											                                			?>
				                                    								</select>
				                                    							</div>
				                                    						</div>
				                                    						<div class="clearfix">
				                                    						&nbsp;
				                                    						</div>
				                                    						<div class="form-group" id = "divType">
				                                    							<label for="input" class="col-sm-4 control-label">Item Type : </label>
				                                    							<div class="col-sm-8">
				                                    								<select id="itemType" class="form-control input-circle" disabled>
				                                    									<option value="-1">-- Select Type --</option>
				                                    								</select>
				                                    							</div>
				                                    						</div>
				                                    					</div>
				                                    					<div class="col-md-6">
				                                    						<div class="form-group">
				                                    							<label for="input" class="col-md-4 control-label">Nicotine : </label>
				                                    							<div class="col-sm-5">
				                                    								<select id="inputNico" class="form-control input-circle">
																						<option value="-1" selected>-- Select One --</option>
																						<?php
																							foreach ($nico as $mg) {
																								if ($mg->ni_mg == -1) { ?>
																								<option style = "background-color: <?= $mg->ni_color; ?> ;" value="<?= $mg->ni_id; ?>">-- No Mg --</option>
																							<?php	}else{
																							?>
																								<option style = "background-color: <?= $mg->ni_color; ?> ;" value="<?= $mg->ni_id; ?>"><?= $mg->ni_mg; ?> Mg</option>
																							<?php }}
																						?>
																					</select>
				                                    							</div>
				                                    						</div>
				                                    						<div class="clearfix">
				                                    						&nbsp;
				                                    						</div>
				                                    						<div class="clearfix">
				                                    						&nbsp;
				                                    						</div>
				                                    						<span class="pull-right"><span class="pull-left" id="loadingCat" style="display: none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;Be Patient</span><span class="pull-left" id="loadingItem" style="display: none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;Brewing</span>&nbsp;&nbsp;<button type="button" id="addBtn" class="btn btn-success" disabled><i class="fa fa-plus"></i>&nbsp;Add Item</button></span>
				                                    					</div>
				                                    					<div class="clearfix">
				                                    						&nbsp;
				                                    					</div>
				                                    					<div id="notification">

				                                    					</div>
				                                    				</div>
				                                    			</td>
				                                    		</tr>                                   		
				                                    	</tfoot>
				                                    </table>
				                                </div>
				                            </div>
                                        </div>
                                        </div>
                                        <!-- End Order Note -->
                                        <!-- Ship Form -->
                                        <div class="row">
						                <div class="col-md-12">
						                	<div class="portlet box purple">
						                        <div class="portlet-title">
						                            <div class="caption">
						                                <i class="fa fa-ship"></i>Shipping Note
						                            </div>
						                            <span class="pull-right">
						                            <div class="mt-radio-inline">
					                                    <label class="mt-radio">
					                                        <input type="radio" name="wide" checked value="0">
						                                		<strong>Worldwide</strong>
					                                        <span></span>
					                                    </label>
					                                    <label class="mt-radio">
					                                        <input type="radio" name="wide" value="1">
						                                		<strong>Nationwide</strong>
					                                        <span></span>
					                                    </label>
					                                </div>
						                            </span>

						                        </div>
						                        <div class="portlet-body">
						                            <div class="table-responsive">
						                                <table class="table table-striped table-condensed table-bordered">
						                                    <tbody>
						                                       	<tr>
					                                            	<th>
					                                            		Shipping Company
					                                            	</th>
					                                            	<td colspan="4" >
					                                     <!--       		<div class="mt-radio-inline">-->
										                                <!--    <label class="mt-radio">-->
										                                <!--        <input type="radio" name="sh_company" checked value="1">-->
											                               <!-- 		DHL-->
										                                <!--        <span></span>-->
										                                <!--    </label>-->
										                                <!--    <label class="mt-radio">-->
										                                <!--        <input type="radio" name="sh_company" value="2">-->
											                               <!-- 		ARAMEX-->
										                                <!--        <span></span>-->
										                                <!--    </label>-->
										                                <!--    <label class="mt-radio">-->
										                                <!--        <input type="radio" name="sh_company" value="3">-->
											                               <!-- 		EMS-->
										                                <!--        <span></span>-->
										                                <!--    </label>-->
										                                <!--    <input type="radio" name="sh_company" class="sh_com" value="4">-->
											                               <!-- 		 : <input type="text" class="inputText" id = "sh_com" >-->
										                                <!--        <span></span>-->
										                                <!--</div>-->
										                                <label class="mt-radio">
										                                        <input type="radio" name="sh_company" checked value="1">
											                                		DHL
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" value="2">
											                                		ARAMEX
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" value="3">
											                                		EMS
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" value="5">
											                                		GDex
										                                        <span></span>
										                                    </label>
										                                    <div class="clearfix" style="height: 20px"></div>

										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" value="6">
											                                		UPS
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" value="7">
											                                		POSLAJU
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" value="8">
											                                		FeDex
										                                        <span></span>
										                                    </label>

										                                    <input type="radio" name="sh_company" class="sh_com" value="4">
											                                		 : <input type="text" class="inputText" id = "sh_com" >
										                                        <span></span>
										                                </div>

					                                            	</td>
					                                            	<th>
					                                            		Shipping Price
					                                            	</th>
					                                            	<td>
					                                            		<input type = "number" class="form-control input-circle" min="0" step="any" name="traking" required>
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Shipping Optional
					                                            	</th>
					                                            	<td colspan="6" >
					                                            		<div class="mt-radio-inline">
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_opt" checked value="1">
											                                		Shop & Ship
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_opt" value="2">
											                                		Express
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_opt" value="3">
											                                		Buyer Account
										                                        <span></span>
										                                    </label>
										                                    <input type="radio" name="sh_opt" class="sh_opti" value="4">
											                                		 : <input type="text" class="inputText" id = "sh_opti">
										                                        <span></span>

										                                </div>
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Declare Item
					                                            	</th>
					                                            	<td colspan="6" >
					                                            		<div class="mt-radio-inline">
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_declare" checked value="1">
											                                		Aromatherapy
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_declare" value="2">
											                                		Beard Oil
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_declare" value="3">
											                                		Cake Flavoring
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_declare" value="4">
											                                		E-Juice
										                                        <span></span>
										                                    </label>
										                                    <input type="radio" name="sh_declare" class="sh_dec" value="4">
											                                		 : <input type="text" class="inputText" id = "sh_dec">
										                                        <span></span>
										                                </div>
					                                            	</td>
						                                        </tr>
						                                    </tbody>
						                                </table>
						                            </div>
						                        </div>
						                    </div>
						                </div>
					                </div>
                                    <div class="form-actions right">
                                    <div style="display: none;" class="riben ribbon ribbon-shadow ribbon-color-warning uppercase"><h2><i class="fa fa-warning" ></i> Unconfirm Order</h2></div>
                                        <button type="button" class="btn default">Cancel</button>
                                        <button type="submit" id="chckBtn" class="btn blue">
                                            <i class="fa fa-check"></i> Save</button>


                                    </div>
                                </form>
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
				$.post('<?= site_url("nasty_v2/dashboard/getAjaxItemList") ?>', {type : type , nico : nic , cat : cat , num : num}, function(data) {
					$.when($("#orderList").append(data)).then(function(){
						$('#loadingItem').hide();
					});
				});

				$.post('<?= site_url("nasty_v2/dashboard/getAjaxNoti") ?>', {type : type , nico : nic}, function(data) {

					$("#notification").append(data);


				});
			});
		});
		$(".inputText").keyup(function() {
			rad = $(this).prop('id');
			v = $(this).val();
			$("."+rad).val(v);
		});

		// $('#orderList').on('click', '#inputPrice', function() {
		// 	alert($(this).val());
		// });




	});

</script>
