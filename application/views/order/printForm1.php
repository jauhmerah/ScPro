	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<span class="pull-left"><img src="<?= base_url("assets/cover/orderlistlogo.png"); ?>"  class="img-responsive" width = "250px" alt="Image"></span><span class="pull-right" style="color: purple;"><h2><?= $or_code; ?></h2></span>			
		</div>		
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<hr>
			<table class="table table-condensed table-hover table-bordered">			
				<tr>
					<td colspan="3">Order Status : <strong><?= $arr['order']->pr_desc; ?></strong></td>
				</tr>
				<tr>
					<td>Name : <strong><?= $arr['order']->cl_name; ?></strong></td>
					<td>Company : <strong><?= $arr['order']->cl_company; ?></strong></td>
					<td>Date Line : <strong><?php if($arr['order']->or_dateline != '0000-00-00 00:00:00'){ echo date_format(date_create($arr['order']->or_dateline) , 'd-M-Y' );}else{echo '--Not Set--';} ?></strong></td>
				</tr>
				<tr>
					<td>Contact Number :<strong><?= $arr['order']->cl_tel; ?></strong></td>
					<td>Country : <strong><?= $arr['order']->cl_country; ?></strong></td>
					<td>Order Date : <strong><?php if($arr['order']->or_date != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_date) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></strong></td>
				</tr>
				<tr>
					<td>Sales Person : <strong><?= $arr['staff']->us_username; ?></strong></td>
					<td>Email : <strong><?= $arr['order']->cl_email; ?></strong></td>
					<td>Finish Date : <strong><?php if($arr['order']->or_finishdate != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_finishdate) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></strong></td>
				</tr>
				<tr>
					<td colspan="2">
						Address : <strong><?= $arr['order']->cl_address; ?></strong>
					</td>
					<td><?php switch ($arr['order']->cu_id) {
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
                    <label class="control-label">Currency : <strong> <?= $cu; ?></strong></label></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="clearfix">
		&nbsp;
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">											
				<?php 
        		if (!isset($arr)) {
        			?>
                    <table class="table table-condensed table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>                        
                        <th>Quantity</th>
                        <th>Tester</th>
                    </tr>
                    </thead>
                    <tbody>
        				<tr>
        					<td colspan="6" align="center">-- No Data--</td>
        				</tr>
                    </tbody> 
                    </tbody>
                </table>
        			<?php
        		} else {
        			$n = 0;
                    $t = null;
        			$total = 0;
        			$totalTester = 0;
        			$allT = 0;
        			$allTV = 0;
        			$cat = $arr['item'][0]->ca_id;
        			foreach ($arr['item'] as $key) { 
                    if ($t == null || $t != $key->ca_id) {
                        if ($t != null) {
                            if ($cat != $key->ca_id) { 
                            $cat = $key->ca_id;
                                ?>
                                <tr>
                                    <td colspan="2"></td>
                                    <td><strong>Total Qty : </strong><?= $total; ?></td>
                                    <td><strong>Total Tester : </strong><?= $totalTester; ?></td>
                                </tr>
                            <?php 
                            $allT += $total;
                            $allTV += $totalTester;
                            $total = 0;
                            $totalTester = 0;
                            }
                            ?>
                            </tbody>
                            </table>
                            <div class="clearfix">
                            &nbsp;
                            </div>
                            <?php
                        }
                        $t = $key->ca_id;
                        ?>
                        <table class="table table-condensed table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><strong><?= $key->ca_desc; ?></strong></th>                        
                                <th>Quantity</th>
                                <th>Tester</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php      }   				        				
        				$n++;
        				$total += $key->oi_qty;
        				$totalTester += $key->oi_tester;
        				?>
        				<tr>
        					<td>
        						<?= $n; ?>
        					</td>
        					<td><?= $key->ty2_desc; ?>
								<span class="label" style="color: black;background-color: <?= $key->ca_color; ?>; font-size: 75%;" ><strong><?= $key->ca_desc; ?></strong></span>&nbsp;
								<span class="label" style="color: black;font-size: 75%; background-color: <?= $key->ni_color; ?>;" ><strong><?= $key->ni_mg; ?> mg</strong></span></td>
								<td><?= $key->oi_qty; ?></td>
								<td><?= $key->oi_tester; ?></td>
							</tr>
        				</tr>
        				<?php        				      				
        			}        		        		
        	?>        	
        	<tr>
        		<td colspan="2"></td>
        		<td><strong>Total Qty : </strong><?= $total; ?></td>
        		<td><strong>Total Tester : </strong><?= $totalTester; ?></td>
        	</tr>
        	<?php
            $allT += $total;
            $allTV += $totalTester;        	
        	?>  
				</tbody>
			</table> <?php } ?>
            <div class="clearfix">
            &nbsp;
            </div>
            <table class="table table-condensed">
                <tbody><?php
                if ($arr['order']->or_note != null || $arr['order']->or_note != "") {
                ?>
            <tr>
                <td colspan="4">
                    <div class="well well-sm">
                        <?= $arr['order']->or_note; ?>
                    </div>                 
                </td> <?php 
                    $hasNote = $arr['order']->or_note;
                ?>
            </tr>
            <?php
            }
            ?>  
                    <tr>
                        <td align="right"><strong>Total All Qty : </strong> <?= $allT; ?>&nbsp;&nbsp;<strong>Total All Tester : </strong> <?= $allTV; ?></td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>    
	<div class="clearfix">
		&nbsp;
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="table table-condensed table-hover table-bordered">	
				<tbody>
					<tr>
						<th>Shipping Company</th>
						<td>
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
                		</td>
						<th>Ship Date</th>
						<td><?php if($arr['order']->or_sendDate != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_sendDate) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></td>
					</tr>
					<tr>
						<th>Shipping Optional</th>
						<td colspan="3">
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
                        	?></td>
						</tr>
					<tr>
						<th>Declare Item</th>
						<td colspan="3"><?php 
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
                        	?>
                        </td>
					</tr>					
				</tbody>
			</table>
		</div>		
	</div>
	<script>
    $(document).ready(function() {        
        popUp();    
        function popUp() {
            <?php 
            if (isset($hasNote)) {
                $hasNote = preg_replace("~[\r\n]~", " ",$hasNote);
                ?>
                bootbox.alert({
                    title : "Order Note",
                    message : "<?= $hasNote; ?>",
                    callback : function(){
                    setTimeout(function() {window.print();}, 500);                    
                }
                });             
                <?php
            } else { ?>
                window.print();
                <?php
            }            
            ?>
        }
    });	
	</script>
	