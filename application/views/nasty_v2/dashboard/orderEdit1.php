<?php 
	if ($arr['order']->pr_id == 3) {
		$mode = "readonly";
		$radio = "disabled";
	} else {
		$mode = "";
		$radio = "";
		$us_id = $this->my_func->scpro_decrypt($this->session->userdata('us_id')) ;
	}

	
?>
<div class="row">
	<div class="col-md-12">
           <div class="tab-pane active" id="tab_1">
                        <div class="portlet box purple ribbon mt-element-ribbon">
                            <div class="portlet-title" >
                                <div class="caption">
                                    <h2><i class="fa fa-pencil"></i>
                                    &nbsp;Edit Order                                     </h2>
                                </div>
                                <div class="tools">
                                    <span class="pull-right" style="color:white;"><h3><?php $code =  (10000*$arr['order']->or_ver) + 100000 + $arr['order']->or_id; echo "#".$code; ?></h3></span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <?php if($arr['order']->or_ver >= 2){?>
                                <div style="<?php if($arr['order']->pr_id != 4){?>display: none;<?php } ?>" class="riben ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-round ribbon-border-dash-hor ribbon-color-warning uppercase">
                                    <div class="ribbon-sub ribbon-clip ribbon-right"></div><i class="fa fa-warning" ></i> Unconfirm Order </div>
                                <?php } ?>
                                <form action="<?= site_url('nasty_v2/dashboard/page/z121?key=').$this->my_func->scpro_encrypt($arr['order']->or_id); ?>" method = "post" class="horizontal-form">
                                    <div class="form-body">    
                                    <?php if($arr['order']->or_ver >= 2){?><input type="hidden" name="pr_id" id="pr_id" class="form-control" value="<?= $arr['order']->pr_id; ?>">
                                        <?php } ?><h3 class="form-section">Client Info</h3>
                                        <div class="row" id = "clientInfo">
                                        	<div class="col-md-8">
                                        		<div class="row">
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Name* :</label>
		                                                    <input type="text" id="name" class="form-control input-circle" placeholder="Client Name" readonly value="<?= $arr['order']->cl_name; ?>">
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Company :</label>
		                                                    <input type="text" id="company" class="form-control input-circle" placeholder="Nasty" readonly value="<?= $arr['order']->cl_company; ?>">
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                        </div>
		                                        <!--/row-->
		                                        <div class="row">
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Contact Number* :</label>
		                                                    <input type="text" id="tel"  class="form-control input-circle" placeholder="Client Number" readonly value="<?= $arr['order']->cl_tel; ?>">
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Country* :</label>
		                                                    <input type="text" id="country"  class="form-control input-circle" placeholder="Country" readonly value="<?= $arr['order']->cl_country; ?>">
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                        </div>
		                                        <!--/row-->
		                                        <div class="row">
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Sales Person* :</label>
		                                                    <input type="text" id="salesPerson" readonly class="form-control input-circle" value="<?= $arr['staff']->us_username; ?>" >
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Email :</label>
		                                                    <input type="text" id="email"  class="form-control input-circle" placeholder="jauhmerah@nastyjuice.com" readonly value="<?= $arr['order']->cl_email; ?>">
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                        </div>
		                                        <div class="row">
													<div class="col-md-12">
													    <div class="form-group">
													        <label class="control-label">Address :</label>
													        <textarea id="input" readonly class="form-control input-circle" rows="3"><?= $arr['order']->cl_address; ?></textarea>
													    </div>
													</div> 
													<!--/span-->
												</div>
                                        	</div>
                                        	<div class="col-md-4">
                                        		<div class="row">		                                            
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Date Line :</label>
	                                                    <?php if($arr['order']->or_dateline != '0000-00-00 00:00:00'){ 
	                                                    	$date = date_format(date_create($arr['order']->or_dateline) , 'Y-m-d' );
	                                                    	}else{
	                                                    		$date = '';
	                                                    	}
	                                                    ?>
	                                                    <input type="date" id="dateline" <?= $mode ?> name="dateline" value="<?= $date; ?>" class="form-control input-circle">
	                                                </div>
		                                            <!--/span-->
	                                            </div>
	                                            <div class="row">	
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Order Date :</label>
	                                                    <?php if($arr['order']->or_date != '0000-00-00 00:00:00'){ 
	                                                    	$date = date_format(date_create($arr['order']->or_date) , 'Y-m-d' );
	                                                    	}else{
	                                                    		$date = '';
	                                                    	}
	                                                    ?>
	                                                    <input type="date" readonly id="orderdate" name="orderdate" value = "<?= $date; ?>" class="form-control input-circle">
	                                                </div>		                                            
		                                            <!--/span-->
		                                        </div>
		                                        <div class="row">	
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Finish Date :</label>
	                                                    <?php if($arr['order']->or_finishdate != '0000-00-00 00:00:00'){ 
	                                                    	$date = date_format(date_create($arr['order']->or_finishdate) , 'Y-m-d' );
	                                                    	}else{
	                                                    		$date = '';
	                                                    	}
	                                                    ?>
	                                                    <input type="date" id="finishdate" name="finishdate" <?= $mode ?> value = "<?= $date; ?>" class="form-control input-circle">
	                                                </div>		                                            
		                                            <!--/span-->
		                                        </div>
		                                        <div class="row">	
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Currency :</label>
	                                                    <select <?php if($arr['order']->pr_id == 3){echo "disabled";} ?> class="form-control input-circle" name="currency">
	                                                        <option value="1" <?php if($arr['order']->cu_id == 1){echo "selected";} ?>>MYR</option>
	                                                        <option value="2" <?php if($arr['order']->cu_id == 2){echo "selected";} ?>>USD</option>
	                                                        <option value="3" <?php if($arr['order']->cu_id == 3){echo "selected";} ?>>GBP</option>
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
                                        	<div class="portlet box"  style="border: 1px solid #3246d2;">
				                                <div class="portlet-title"  style="background-color: #3246d2;">
				                                    <div class="caption">
				                                        <i class="fa fa-cogs"></i>Order Note </div>
				                                    
				                                </div>
				                                <div class="portlet-body">
				                                    <div class="table-responsive">
				                                        <table class="table table-striped table-bordered table-hover">
						                                    <thead>
						                                        <tr>
					                                    			<th>Item Detail</th>
					                                    			<th>Price</th>
					                                    			<th>Qty</th>
					                                    			<th>Tester</th>
					                                    			<?php if($arr['order']->pr_id != 3){?>
					                                    			<th>Action</th><?php } ?>
					                                    		</tr>
						                                    </thead>
						                                    <tbody id="orderList">
						                                    	<?php 
						                                    		if (!isset($arr)) {
						                                    			?>
						                                    				<tr>
						                                    					<td colspan="6" align="center">-- No Data--</td>
						                                    				</tr>
						                                    			<?php
						                                    		} else {
						                                    			foreach ($arr['item'] as $key) {
						                                    				?>
						                                    				<tr id="delEdit_<?= $key->oi_id;?>">						                                    					
						                                    					<td><?= $key->ty2_desc; ?><br>
																					<span class="label" style="color: black;background-color: <?= $key->ca_color; ?>; font-size: 75%;" ><strong><?= $key->ca_desc; ?></strong></span>&nbsp;
																					<span class="label" style="color: black;font-size: 75%; background-color: <?= $key->ni_color; ?>;" ><strong><?= $key->ni_mg; ?> mg</strong></span></td>
																				<td><input type="number" name="priceE[]" id="inputPrice" min="0" step="any" class="form-control" value="<?= $key->oi_price; ?>" required="required" <?= $mode; ?>></td>
																				<td><input type="number" name="qtyE[]" id="inputQty" min="0" class="form-control" value="<?= $key->oi_qty; ?>" required="required" <?= $mode; ?>></td>
																				<td>
																					<input type="number" name="testerE[]" id="inputTester" min="0" value="<?= $key->oi_tester; ?>" class="form-control" <?= $mode; ?>>
																					<input type="hidden" name="idE[]" id="inputIdE" class="form-control" value="<?= $key->oi_id;?>">
																				</td>	
																				<?php if($arr['order']->pr_id != 3){?>
																				<td>																					
																					<span><button type="button" id="<?= $key->oi_id;?>" class="btn btn-danger btn-xs delEdit"><i class="fa fa-trash" ></i></button></span>
																				</td><?php } ?>
						                                    				</tr>
						                                    				<?php
						                                    			}
						                                    		}						                                    		
						                                    	?>						                                    	                                        
						                                    </tbody>
						                                    <tfoot>
						                                    <tr>
						                                    	<td colspan="5">
						                                    		<input type="hidden" name="orex_id" id="inputOrex_id" class="form-control" value="<?= $arr['order']->orex_id; ?>">
					                                            	<textarea name="note" id="input" class="form-control input-circle input-lg" rows="2" placeholder="#Note" <?= $mode; ?>><?= $arr['order']->or_note; ?></textarea>                                            		
					                                            </td>
					                                        </tr>
					                                        <?php if($arr['order']->pr_id != 3){?>
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
																							foreach ($nico as $mg) {?>
																								<option style = "background-color: <?= $mg->ni_color; ?> ;" value="<?= $mg->ni_id; ?>"><?= $mg->ni_mg; ?> Mg</option>
																							<?php }
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
				                                    						<span class="pull-right"><button type="button" id="addBtn" class="btn btn-success" disabled><i class="fa fa-plus"></i>&nbsp;Add Item</button></span>
				                                    					</div>
				                                    				</div>				                                    				
				                                    			</td>				     
				                                    		</tr>
				                                    		<?php } ?>
						                                    </tfoot>
						                                </table>
				                                    </div>
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
					                                        <input type="radio" name="wide" <?php if($arr['order']->or_wide == 0){echo "checked";} ?> value="0" <?= $radio; ?>>
						                                		<strong>Worldwide</strong>
					                                        <span></span>
					                                    </label>
					                                    <label class="mt-radio">
					                                        <input type="radio" name="wide" <?php if($arr['order']->or_wide == 1){echo "checked";} ?> value="1" <?= $radio; ?>>
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
					                                            		<div class="mt-radio-inline">
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" <?php if($arr['order']->or_shipcom == 1){echo "checked";} ?> value="1" <?= $radio; ?>>
											                                		DHL
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" <?php if($arr['order']->or_shipcom == 2){echo "checked";} ?> value="2" <?= $radio; ?>>
											                                		ARAMEX
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" <?php if($arr['order']->or_shipcom == 3){echo "checked";} ?> value="3" <?= $radio; ?>>
											                                		EMS
										                                        <span></span>
										                                    </label>
										                                    <input type="radio" name="sh_company" class="sh_com" <?php $temp = $arr['order']->or_shipcom; $temp2 =""; if($temp != 3 && $temp != 1 && $temp != 2){echo "checked";$temp2 = $temp;} ?> value="<?= $temp; ?>" <?= $radio; ?>>
											                                		 : <input type="text" class="inputText " id = "sh_com" value="<?= $temp2; ?>" <?= $mode ?> >
										                                        <span></span>
										                                </div>
					                                            	</td> 
					                                            	<th>
					                                            		Ship Date
					                                            	</th>
					                                            	<td>
					                                            		<input <?= $mode; ?> type = "date" name="sendDate" class="form-control input-circle" value="<?php if($arr['order']->or_sendDate != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_sendDate) , 'Y-m-d' ); }else{echo '';} ?>">
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Shipping Optional
					                                            	</th>
					                                            	<td colspan="6" >
					                                            		<div class="mt-radio-inline">
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_opt" <?php if($arr['order']->or_shipopt == 1){ echo "checked";} ?> value="1" <?= $radio; ?>>
											                                		Shop & Ship
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_opt" <?php if($arr['order']->or_shipopt == 2){ echo "checked";} ?> value="2" <?= $radio; ?>>
											                                		Express
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_opt" <?php if($arr['order']->or_shipopt == 3){ echo "checked";} ?> value="3" <?= $radio; ?>>
											                                		Buyer Account
										                                        <span></span>
										                                    </label>
										                                    <input type="radio" name="sh_opt" class="sh_opti" <?php $temp = $arr['order']->or_shipopt; $temp2 = ""; if($temp != 3 && $temp != 1 && $temp != 2){echo "checked"; $temp2 = $temp;} ?> value="<?= $temp; ?>" <?= $radio; ?>>
											                                		 : <input type="text" class="inputText" id = "sh_opti" value="<?= $temp2; ?>" <?= $mode ?>>
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
										                                        <input type="radio" name="sh_declare" <?php if($arr['order']->dec_id == 1){echo "checked";} ?> value="1" <?= $radio; ?>>
											                                		Aromatherapy
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_declare" <?php if($arr['order']->dec_id == 2){echo "checked";} ?> value="2" <?= $radio; ?>>
											                                		Beard Oil
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_declare" <?php if($arr['order']->dec_id == 3){echo "checked";} ?> value="3" <?= $radio; ?>>
											                                		Cake Flavoring
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_declare" <?php if($arr['order']->dec_id == 4){echo "checked";} ?> value="4" <?= $radio; ?>>
											                                		E-Juice
										                                        <span></span>
										                                    </label>
										                                    <input type="radio" name="sh_declare" class="sh_dec" <?php $temp = $arr['order']->dec_id; $temp2 = ""; if($temp != 3 && $temp != 1 && $temp != 2 && $temp != 4){echo "checked";$temp2 = $temp;} ?> value="<?= $temp; ?>" <?= $radio; ?>>
											                                		 : <input type="text" class="inputText" id = "sh_dec" value="<?= $temp2; ?>" <?= $mode ?>>
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
                                    <?php if($arr['order']->or_ver >= 2){?>
                                     <div style="<?php if($arr['order']->pr_id != 4){?>display: none;<?php } ?>" class="riben ribbon ribbon-shadow ribbon-color-warning uppercase"><h2><i class="fa fa-warning" ></i> Unconfirm Order</h2></div>
                                        <?php } if($arr['order']->pr_id != 4){ ?><button type="button" class="btn btn-success confirm btn-circle">Confirm</button> <?php }else{ ?> <button type="button" class="btn btn-warning confirm btn-circle">Unconfirm</button> <?php } ?>
                                        <a href="<?= site_url('nasty_v2/dashboard/page/a1'); ?>"><button type="button" class="btn default"><?php if($arr['order']->pr_id != 3){?>Cancel<?php }else{echo "Back";}?></button></a>
                                        <?php if($arr['order']->pr_id != 3){?>
                                        <button type="submit" class="btn blue">
                                            <i class="fa fa-save"></i> Update
                                        </button>
                                        <?php } ?>
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
			type = $("#itemType").val();
			nic = $("#inputNico").val();
			cat = $("#cat").val();
			//alert(type + " " + nic + " " + cat);				
			num ++;
			$.post('<?= site_url("nasty_v2/dashboard/getAjaxItemList") ?>', {type : type , nico : nic , cat : cat , num : num}, function(data) {
				$("#orderList").append(data);
			});
		});
		$('.delEdit').click(function() {
			oi_id = $(this).prop('id');
			if(confirm("Are you sure? This will auto delete permanently in the database!!!")){
				$.post('<?= site_url("nasty_v2/dashboard/getAjaxDelItem") ?>', {oi_id: oi_id}, function(data) {
					if (data == '0') {
						alert("Ops!! Something Wrong... Contact JM.");
					} else {
						$("#delEdit_"+oi_id).remove();
					}
				});				
			}			
		});
		$(".inputText").keyup(function() {
			rad = $(this).prop('id');
			v = $(this).val();
			$("."+rad).val(v);
		});

		<?php
		if ($us_id == $arr['order']->us_id) { ?>
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
		}); <?php
		}else{ ?>
			$('.confirm').click(function() {
			alert("Warning !!!, Only the salesPerson able to change the order confirmation status. Tq.");
			});
		<?php } ?>		
	});
</script>