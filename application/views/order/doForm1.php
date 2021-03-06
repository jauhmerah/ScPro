<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<table class="table ">
			<tr>
				<td colspan="2">
					<img src="<?= base_url("assets/cover/formlogo.jpg"); ?>"  class="img-responsive" width = "400px" alt="Image">
				</td>
				<td colspan="5">
					<div align="center"><h4><label><strong>Delivery Order</strong></label></h4></div>
					<table class="table table-condensed" border="1">
						<tbody>
							<tr>
								<th>D.O No.</th>
								<td>DO-<?= $arr['order']->or_id; ?></td>
							</tr>
							<tr>
								<th>Order No.</th>
								<td><?= $or_code; ?></td>
							</tr>
							<tr>
								<th>Issue Date</th>
								<td><?php if($arr['order']->or_finishdate != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_finishdate) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></td>
							</tr>
							<tr><?php // TODO: Tukar to courier name ?>
								<th>Payment Status</th>
								<td><?php if($arr['order']->or_bank != null){echo $arr['order']->or_bank;}else{echo "--Not Set--";} ?></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<div><label><strong><u>Delivery To</u></strong></label></div>
					<strong>Client Name</strong> : <?= $arr['order']->cl_name; ?><br>
					<strong>Email</strong> : <?= $arr['order']->cl_email; ?><br>
					<strong>Contact</strong> : <?= $arr['order']->cl_tel; ?><br>
					<strong>Company</strong> : <?= $arr['order']->cl_company; ?><br>
					<strong>Country</strong> : <?= $arr['order']->cl_country; ?><br>
				</td>
				<td colspan="3"><div><label><strong><u>Delivery</u></strong></label></div>
					<strong>Address</strong> : <?= $arr['order']->cl_address; ?>
				</td>
			</tr>
			<tr>
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
            <table class="table table-condensed table-bordered">
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
                        <td align="right" colspan="4"><strong>Total All Qty : </strong> <?= $allT; ?>&nbsp;&nbsp;<strong>Total All Tester : </strong> <?= $allTV; ?></td>
                    </tr>
                </tbody>
				<tfoot>
					<tr>
						<td colspan="2">
							Date Of Delivery : <br>
							Time of Delivery : <br>
							Remarks : <br>
						</td>
						<td colspan = "4">
						Production Team : <br><br>
						Sales Staff : <br><br>
						</td>
					</tr>
				</tfoot>
			</table>
			</tr>
		</table>
		<strong>Note :</strong><p>
		I confirm that all goods received are in good order and condition.
		<div class="clearfix">
		<p>&nbsp;</p>
		</div>
		<div class="clearfix">
		<p>&nbsp;</p>
		</div>
		<table class = "table" border = "0">
		<tr>
			<td>
			<div align="Left">
			________________________________<br>
			Logistic<?= "'s"; ?> Signature / Company Stamp<p></p>
			Time of Receipt : __________________
		</div>
			</td>
			<td>
			<div align="right">
			________________________________<br>
			Receiver<?= "'s"; ?> Signature / Company Stamp<p></p>
			Time of Receipt : __________________
		</div>
			</td>
		</tr>
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
                    title : "Delivery Order Note",
                    message : '<?= $hasNote; ?>',
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
