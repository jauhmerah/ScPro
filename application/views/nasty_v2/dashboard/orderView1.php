<div class="row">
	<div class="col-md-12">
           <div class="tab-pane active" id="tab_1">
                        <div class="portlet box blue-steel ribbon mt-element-ribbon">
                            <div class="portlet-title">
                                <div class="caption">
                                    <img src="<?= base_url(); ?>/assets/cover/favicon2.png"> Order Detail
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
                                <form method = "post" class="horizontal-form">
                                    <div class="form-body">
                                        <h3 class="form-section">Client Info</h3>
                                        <div class="row" id = "clientInfo">
                                        	<div class="col-md-8">
                                        		<div class="row">
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label"> Name : <strong><?= $arr['order']->cl_name; ?></strong></label>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label"> Company : <strong><?= $arr['order']->cl_company; ?></strong></label>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                        </div>
		                                        <!--/row-->
		                                        <div class="row">
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label"> Contact Number : <strong><?= $arr['order']->cl_tel; ?></strong></label>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Country : <strong> <?= $arr['order']->cl_country; ?></strong></label>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                        </div>
		                                        <!--/row-->
		                                        <div class="row">
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Sales Person : <strong> <?= $arr['staff']->us_username; ?></strong></label>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Email : <strong> <?= $arr['order']->cl_email; ?></strong></label>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                        </div>
		                                        <div class="row">
													<div class="col-md-12">
													    <div class="form-group">
													        <label class="control-label">Address : <strong> <?= $arr['order']->cl_address; ?></strong></label>
													    </div>
													</div>
													<!--/span-->
												</div>
                                        	</div>
                                        	<div class="col-md-4">
                                        		<div class="row">
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Date Line : <strong> <?php if($arr['order']->or_dateline != '0000-00-00 00:00:00'){ echo date_format(date_create($arr['order']->or_dateline) , 'd-M-Y' );}else{echo '--Not Set--';} ?></strong></label>
	                                                </div>
		                                            <!--/span-->
	                                            </div>
	                                            <div class="row">
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Order Date : <strong> <?php if($arr['order']->or_date != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_date) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></strong></label>
	                                                </div>
		                                            <!--/span-->
		                                        </div>
		                                        <div class="row">
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Finish Date : <strong> <?php if($arr['order']->or_finishdate != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_finishdate) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></strong></label>
	                                                </div>
		                                            <!--/span-->
		                                        </div>
		                                        <div class="row">
	                                                <div class="form-group col-md-12">
	                                                <?php switch ($arr['order']->cu_id) {
	                                                	case 1:
	                                                		$cu = "MYR";
	                                                		break;
	                                                	case 2:
	                                                		$cu = "USD";
	                                                		break;
	                                                	case 3:
	                                                		$cu = "GBP";
	                                                		break;
	                                                	default :
	                                                		$cu = "Currency Error!!!";
	                                                } ?>
	                                                    <label class="control-label">Currency : <strong> <?= $cu; ?></strong></label>
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
				                                <div class="portlet-title bg-blue-ebonyclay">
				                                    <div class="caption">
				                                        <i class="fa fa-cogs"></i>Order Note
				                                    </div>
				                                </div>
				                                <div class="portlet-body">
				                                    <div class="table-responsive">
				                                        <table class="table table-striped table-condensed table-bordered table-hover">
						                                    <thead>
						                                        <tr>
						                                        	<th>#</th>
					                                    			<th>Item Detail</th>
					                                    			<th>Price</th>
					                                    			<th>Qty</th>
					                                    			<th>Tester</th>
					                                    		</tr>
						                                    </thead>
						                                    <tbody>
						                                    	<?php
						                                    		if (!isset($arr)) {
						                                    			?>
						                                    				<tr>
						                                    					<td colspan="6" align="center">-- No Data--</td>
						                                    				</tr>
						                                    			<?php
						                                    		} else {
						                                    			$n = 0;
						                                    			foreach ($arr['item'] as $key) {
						                                    				$n++;
						                                    				?>
						                                    				<tr>
						                                    					<td>
						                                    						<?= $n; ?>
						                                    					</td>
						                                    					<td><?= $key->ty2_desc; ?><br>
																					<span class="label" style="color: black;background-color: <?= $key->ca_color; ?>; font-size: 75%;" ><strong><?= $key->ca_desc; ?></strong></span>&nbsp;
																					<span class="label" style="color: black;font-size: 75%; background-color: <?= $key->ni_color; ?>;" ><strong><?= $key->ni_mg; ?> mg</strong></span></td>
																					<td><?= $key->oi_price; ?></td>
																					<td><?= $key->oi_qty; ?></td>
																					<td><?= $key->oi_tester; ?></td>

																					</td>
																				</tr>
						                                    				</tr>
						                                    				<?php
						                                    			}
						                                    		}

						                                    	?>
						                                    	<td colspan="5">
					                                            		<textarea name="note" id="input" class="form-control input-circle input-lg" rows="2" placeholder="#Note" readonly><?= $arr['order']->or_note; ?></textarea>
					                                            </td>
						                                    </tbody>
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
					                                    <strong><?php
						                            	if ($arr['order']->or_wide == 0) {
						                            		echo "Worldwide";
						                            	} else {
						                            		echo "Nationwide";
						                            	}

						                            	?></strong>
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
					                                            	<td  >
					                                            		<strong>
					                                            			<?php
					                                            			switch ($arr['order']->or_shipcom) {
					                                            				case 1:
					                                            					echo "DHL";
					                                            					break;
					                                            				case 2:
					                                            					echo "ARAMEX";
					                                            					break;
					                                            				case 3:
					                                            					echo "EMS";
					                                            					break;
					                                            				default:
					                                            					echo $arr['order']->or_shipcom;
					                                            					break;
					                                            			}
					                                            			?>
					                                            		</strong>
					                                            	</td>
					                                            	<th>
					                                            		Shipping Price
					                                            	</th>
					                                            	<td>
					                                            		<strong><?php if($arr['order']->or_traking != null) { echo $arr['order']->or_traking; }else{echo '--Not Set--';} ?></strong>
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Shipping Optional
					                                            	</th>
					                                            	<td  >
					                                            	<strong>
					                                            	<?php
					                                            		switch ($arr['order']->or_shipopt) {
					                                            			case 1:
					                                            				echo "Shop & Ship";
					                                            				break;
					                                            			case 2:
					                                            				echo "Express";
					                                            				break;
					                                            			case 3:
					                                            				echo "Buyer Account";
					                                            				break;
					                                            			default:
					                                            				echo $arr['order']->or_shipopt;
					                                            				break;
					                                            		}
					                                            	?></strong>
					                                            	</td>
					                                            	<td colspan="2" align="right"><?php if($arr['order']->or_ver >= 2){?>
					                 <a href="<?= site_url('nasty_v2/invoice/Invoice?id='.$this->my_func->scpro_encrypt($arr['order']->or_id).'&ver=2'); ?>" target="_blank"> <button type="button" class="btn green" ><i class="fa fa-print"></i>&nbsp;&nbsp;Invoice</button></a><?php } ?>
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Declare Item
					                                            	</th>
					                                            	<td ><strong>
					                                            	<?php
					                                            	switch ($arr['order']->dec_id) {
					                                            		case 1:
					                                            			echo "Aromatherapy";
					                                            			break;
					                                            		case 2:
					                                            			echo "Beard Oil";
					                                            			break;
					                                            		case 3:
					                                            			echo "Cake Flavoring";
					                                            			break;
					                                            		case 4:
					                                            			echo "E-Juice";
					                                            			break;

					                                            		default:
					                                            			echo $arr['order']->dec_id;
					                                            			break;
					                                            	}
					                                            	?>	</strong>
					                                            	</td>
					                                            	<td colspan="2" align="right"><?php if($arr['order']->or_ver >= 2){?>
					       <a href="<?= site_url('nasty_v2/invoice/dummyInvoice?id='.$this->my_func->scpro_encrypt($arr['order']->or_id).'&ver=2'); ?>" target="_blank"> <button type="button" class="btn blue" ><i class="fa fa-print"></i>&nbsp;&nbsp;Dummy Invoice</button></a> <?php } ?>

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
                                        <?php } ?>
                                        <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : site_url('nasty_v2/dashboard/page/a1'); ?>"><button type="button" class="btn default">Back</button></a>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>
                    </div>
        </div>
</div>
