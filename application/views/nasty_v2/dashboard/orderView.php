<div class="row">
	<div class="col-md-12">
           <div class="tab-pane active" id="tab_1">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <img src="<?= base_url(); ?>/assets/cover/favicon2.png"> Order Detail                                     
                                </div>
                                <div class="tools">
                                    <span class="pull-right" style="color:red;"><h3><?php $code = 100000 + $arr['order']->or_id; echo "#".$code; ?></h3></span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                            <pre><?php print_r($arr); ?></pre>
                                <!-- BEGIN FORM-->
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
	                                                		$cu = "EURO";
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
                                        	<div class="portlet box green">
				                                <div class="portlet-title">
				                                    <div class="caption">
				                                        <i class="fa fa-cogs"></i>Order Note </div>
				                                    
				                                </div>
				                                <div class="portlet-body">
				                                    <div class="table-responsive">
				                                        <table class="table table-striped table-bordered table-hover">
						                                    <thead>
						                                        <tr>
						                                            <th>#</th>
						                                            <th>Type</th>
						                                            <th colspan="2"><div align="center">O Mg</div></th>
						                                            <th colspan="2"><div align="center">3 Mg</div></th>
						                                            <th colspan="2"><div align="center">6 Mg</div></th>
						                                            <th><div align="center">QTY</div></th>
						                                            <th><div align="center">UNIT $</div></th>
						                                            <th><div align="center">AMOUNT $</div></th>
						                                        </tr>
						                                    </thead>
						                                    <tbody>
						                                       	<tr>
						                                            <td class="col-md-1">1</td>
						                                            <td class="col-md-4">Blackurrant | <strong>Bad Blood</strong> | Red</td>
						                                            <div class="col-md-4">
						                                            <td class="numeric"><?= $arr['item'][0]->orn_0mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][0]->orn_0mgp; ?></td>
						                                            <td class="numeric"><?= $arr['item'][0]->orn_3mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][0]->orn_3mgp; ?></td>
						                                            <td class="numeric"><?= $arr['item'][0]->orn_6mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][0]->orn_6mgp; ?></td>
						                                            <?php  
						                                            	$qty = $arr['item'][0]->orn_0mg + $arr['item'][0]->orn_3mg +  $arr['item'][0]->orn_6mg;
						                                            	$qty2 = $arr['item'][0]->orn_0mgp + $arr['item'][0]->orn_3mgp +  $arr['item'][0]->orn_6mgp;
						                                            	$price = $qty * $arr['item'][0]->orn_price;	
						                                            	$totPrice = $price;					                                            	
						                                            ?>
						                                            </div><div class="col-md-3">
						                                            <td class="numeric"><?= $qty . ' + ' . $qty2; ?></td>
						                                            <td class="numeric"><?= $arr['item'][0]->orn_price; ?></td>
						                                            <td class="numeric"><?= $price; ?></td>
						                                            </div>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">2</td>
						                                            <td class="col-md-4">Manggo | <strong>Fat Boy</strong> | Yellow</td>
						                                            <div class="col-md-4">
						                                            <td class="numeric"><?= $arr['item'][1]->orn_0mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][1]->orn_0mgp; ?></td>
						                                            <td class="numeric"><?= $arr['item'][1]->orn_3mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][1]->orn_3mgp; ?></td>
						                                            <td class="numeric"><?= $arr['item'][1]->orn_6mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][1]->orn_6mgp; ?></td>
						                                            <?php  
						                                            	$qty = $arr['item'][1]->orn_0mg + $arr['item'][1]->orn_3mg +  $arr['item'][1]->orn_6mg;
						                                            	$qty2 = $arr['item'][1]->orn_0mgp + $arr['item'][1]->orn_3mgp +  $arr['item'][1]->orn_6mgp;
						                                            	$price = $qty * $arr['item'][1]->orn_price;	
						                                            	$totPrice = $totPrice + $price;					                                            	
						                                            ?>
						                                            </div><div class="col-md-3">
						                                            <td class="numeric"><?= $qty . ' + ' . $qty2; ?></td>
						                                            <td class="numeric"><?= $arr['item'][1]->orn_price; ?></td>
						                                            <td class="numeric"><?= $price; ?></td>
						                                            </div>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">3</td>
						                                            <td class="col-md-4">Honey Dew | <strong>Devil Teeth</strong> | Orange</td>
						                                            <td class="numeric"><?= $arr['item'][2]->orn_0mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][2]->orn_0mgp; ?></td>
						                                            <td class="numeric"><?= $arr['item'][2]->orn_3mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][2]->orn_3mgp; ?></td>
						                                            <td class="numeric"><?= $arr['item'][2]->orn_6mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][2]->orn_6mgp; ?></td>
						                                            <?php  
						                                            	$qty = $arr['item'][2]->orn_0mg + $arr['item'][2]->orn_3mg +  $arr['item'][2]->orn_6mg;
						                                            	$qty2 = $arr['item'][2]->orn_0mgp + $arr['item'][2]->orn_3mgp +  $arr['item'][2]->orn_6mgp;
						                                            	$price = $qty * $arr['item'][2]->orn_price;	
						                                            	$totPrice = $totPrice + $price;					                                            	
						                                            ?>
						                                            <td class="numeric"><?= $qty . ' + ' . $qty2; ?></td>
						                                            <td class="numeric"><?= $arr['item'][2]->orn_price; ?></td>
						                                            <td class="numeric"><?= $price; ?></td>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">4</td>
						                                            <td class="col-md-4">Grape | <strong>Asap Grape</strong> | Purple</td>
						                                            <td class="numeric"><?= $arr['item'][3]->orn_0mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][3]->orn_0mgp; ?></td>
						                                            <td class="numeric"><?= $arr['item'][3]->orn_3mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][3]->orn_3mgp; ?></td>
						                                            <td class="numeric"><?= $arr['item'][3]->orn_6mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][3]->orn_6mgp; ?></td>
						                                            <?php  
						                                            	$qty = $arr['item'][3]->orn_0mg + $arr['item'][3]->orn_3mg +  $arr['item'][3]->orn_6mg;
						                                            	$qty2 = $arr['item'][3]->orn_0mgp + $arr['item'][3]->orn_3mgp +  $arr['item'][3]->orn_6mgp;
						                                            	$price = $qty * $arr['item'][3]->orn_price;	
						                                            	$totPrice = $totPrice + $price;					                                            	
						                                            ?>
						                                            <td class="numeric"><?= $qty . ' + ' . $qty2; ?></td>
						                                            <td class="numeric"><?= $arr['item'][3]->orn_price; ?></td>
						                                            <td class="numeric"><?= $price; ?></td>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">5</td>
						                                            <td class="col-md-4">Blackurrant + L | <strong>Wicked Haze</strong> | Pink</td>
						                                            <td class="numeric"><?= $arr['item'][4]->orn_0mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][4]->orn_0mgp; ?></td>
						                                            <td class="numeric"><?= $arr['item'][4]->orn_3mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][4]->orn_3mgp; ?></td>
						                                            <td class="numeric"><?= $arr['item'][4]->orn_6mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][4]->orn_6mgp; ?></td>
						                                            <?php  
						                                            	$qty = $arr['item'][4]->orn_0mg + $arr['item'][4]->orn_3mg +  $arr['item'][4]->orn_6mg;
						                                            	$qty2 = $arr['item'][4]->orn_0mgp + $arr['item'][4]->orn_3mgp +  $arr['item'][4]->orn_6mgp;
						                                            	$price = $qty * $arr['item'][4]->orn_price;	
						                                            	$totPrice = $totPrice + $price;					                                            	
						                                            ?>
						                                            <td class="numeric"><?= $qty . ' + ' . $qty2; ?></td>
						                                            <td class="numeric"><?= $arr['item'][4]->orn_price; ?></td>
						                                            <td class="numeric"><?= $price; ?></td>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">6</td>
						                                            <td class="col-md-4">Pineapple | <strong>Slow Blow</strong> | Cyan</td>
						                                            <td class="numeric"><?= $arr['item'][5]->orn_0mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][5]->orn_0mgp; ?></td>
						                                            <td class="numeric"><?= $arr['item'][5]->orn_3mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][5]->orn_3mgp; ?></td>
						                                            <td class="numeric"><?= $arr['item'][5]->orn_6mg; ?></td>
						                                            <td class="numeric"><?= $arr['item'][5]->orn_6mgp; ?></td>
						                                            <?php  
						                                            	$qty = $arr['item'][5]->orn_0mg + $arr['item'][5]->orn_3mg +  $arr['item'][5]->orn_6mg;
						                                            	$qty2 = $arr['item'][5]->orn_0mgp + $arr['item'][5]->orn_3mgp +  $arr['item'][5]->orn_6mgp;
						                                            	$price = $qty * $arr['item'][5]->orn_price;	
						                                            	$totPrice = $totPrice + $price;					                                            	
						                                            ?>
						                                            <td class="numeric"><?= $qty . ' + ' . $qty2; ?></td>
						                                            <td class="numeric"><?= $arr['item'][5]->orn_price; ?></td>
						                                            <td class="numeric"><?= $price; ?></td>
						                                        </tr>
						                                        <tr>
						                                        	<td colspan="8"></td>
						                                        	<td></td>
						                                        	<td colspan="2" align = "center"><?= $totPrice; ?></td>
						                                        </tr>					                                        
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
					                                            	<td colspan="4" >
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
					                                            					echo "Other";
					                                            					break;
					                                            			}
					                                            			?>
					                                            		</strong>					                                            		
					                                            	</td>                                            	
					                                            	<th>
					                                            		Tracking No
					                                            	</th>
					                                            	<td>
					                                            		<strong><?= $arr['order']->or_traking; ?></strong>
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Shipping Optional
					                                            	</th>
					                                            	<td colspan="4" >
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
					                                            				echo "error";
					                                            				break;
					                                            		}
					                                            	?></strong>					                                            		
					                                            	</td>
					                                            	<th>
					                                            		Ship Date
					                                            	</th>
					                                            	<td>
					                                            		<strong><?php if($arr['order']->or_sendDate != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_sendDate) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></strong>
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Declare Item
					                                            	</th>
					                                            	<td colspan="4" ><strong>
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
					                                            			echo "error";
					                                            			break;
					                                            	}
					                                            	?>	</strong>				                                            		
					                                            	</td>
					                                            	<th>
					                                            		Inv Attach
					                                            	</th>
					                                            	<td>
					                                            		<strong><?= $arr['order']->or_invAtt; ?></strong>
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Declare Price
					                                            	</th>
					                                            	<td colspan="4">
					                                            		<strong><?= $arr['order']->or_declarePrice ;?></strong>
					                                            	</td>
					                                            	<th>
					                                            		MSDS
					                                            	</th>
					                                            	<td>
					                                            		<strong><?= $arr['order']->or_msds; ?></strong>
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Batch No Start
					                                            	</th>
					                                            	<td colspan="4" rowspan="3">
					                                            		<textarea name="note" id="input" class="form-control input-circle input-lg" rows="4" placeholder="#Note" readonly><?= $arr['order']->or_note; ?></textarea>                                            		
					                                            	</td>					                                            	
					                                            	<th>
					                                            		C.O.O
					                                            	</th>
					                                            	<td>
					                                            		<strong><?= $arr['order']->or_coo;?></strong>
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Batch No END
					                                            	</th>
					                                            						                                            	
					                                            	<th>
					                                            		Small C Box
					                                            	</th>
					                                            	<td>
					                                            		<strong><?= $arr['order']->or_smallcb; ?></strong>
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Batch
					                                            	</th>
					                                            	
					                                            	
					                                            	<th>
					                                            		Big C Box
					                                            	</th>
					                                            	<td>
					                                            		<strong><?= $arr['order']->or_bigcb; ?></strong>
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
                                        <a href="<?= site_url('nasty_v2/dashboard/page/a1'); ?>"><button type="button" class="btn default">Back</button></a>
                                        <a href="#"><button type="button" class="btn blue"><i class="fa fa-print"></i> Print View</button></a>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>                       
                    </div>
        </div>
</div>
