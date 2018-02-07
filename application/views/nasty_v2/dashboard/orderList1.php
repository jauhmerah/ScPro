<script>
	function onDel() {
		return false;
		//confirm('Are You Sure ?');
	}
	function underMain(){
		bootbox.alert("Sorry :This Function Is under development! <br>Any inquiry <a href=\"mailto:jauhmerah@nastyjuice.com\">email us</a> ");
	}
	$(document).ready(function() {
		$("#sub").click(function() {
			if (searchFun()) {
				$("#formSearch").submit();
			} else {
				$("#inputFilter").focus();
			}
		});
		function searchFun() {
			filter = $("#inputFilter").val();
			if (filter == -1) {
				bootbox.alert("Please select Filter");
				return false;} else {return true;}
		}
	});
</script>
<?php
	$us_id = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
	$us_lvl = $this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
	$us_name = $this->my_func->scpro_decrypt($this->session->userdata('us_username'));
	?>
<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
					<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">
		<div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list"></i>Order List 2018
                </div>
				<div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <a ><button type="button" onclick="window.location.href='<?= site_url('nasty_v2/dashboard/page/a1old'); ?>'" class="btn green btn-circle btn-sm">Old Order List</button></a>
                    </div>
                </div>
            </div>
            <div class="portlet-body flip-scroll">
	            <div class="row tableL">
	            <form id="formSearch" action="<?= site_url('nasty_v2/dashboard/page/a1new'); ?>" method="get" role="form">
	            	<div class="col-md-12">
	            		<div class="col-md-1">
	            			<a href="<?= site_url('nasty_v2/dashboard/page/z1'); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Order</button></a>
	            		</div>
	            		<div class="col-md-4">
	            			<div class="form-group">
	            				<label for="input" class="col-sm-2 control-label">Search</label>
	            				<div class="col-sm-10">
	            					<input type="search" name="search" id="search" class="form-control input-circle" placeholder="Search" required>
	            				</div>
	            			</div>
	            		</div>
	            		<div class="col-md-4">
	            			<div class="form-group">
	            				<label for="inputFilter" class="col-sm-2 control-label">Filter</label>
	            				<div class="col-sm-10">
	            					<select name="filter" id="inputFilter" class="form-control input-circle">
	            						<option value="-1">-- Select Filter --</option>
	            						<option value="10">Client Name</option>
	            						<option value="1">Order Code</option>
	            						<option value="2">Sales Person</option>
	            						<option value="3">Order Status</option>
	            					</select>
	            				</div>
	            			</div>
	            		</div>
	            		<div class="col-md-3">
	            			<button type="button" class="btn btn-info " id="sub"><i class="fa fa-search"></i> Search</button>
							<button type="button" class="btn btn-warning " onclick="window.location.href='<?= site_url('nasty_v2/dashboard/page/a1'); ?>'"><i class="fa fa-eraser"></i> Clear Filter</button><!--  -->
	            		</div>
	            	</div>
	            </form>
	            </div>
	            <div class="clearfix">
	            	&nbsp;
	            </div>
	            <div class="row tableL">
	            	<div class="col-md-12">
	            		<table class="table table-bordered table-striped flip-content">
		                    <thead class="flip-content">
		                        <tr>
		                            <th>#</th>
		                            <th>Client Name</th>
		                            <th>Order Code - <span class="font font-red">LOG</span></th>
		                            <th>Order Date</th>
		                            <th>Sales Person</th>
		                            <th>Status</th>
		                            <th>Tracking No.</th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    <?php
		                    	$n = 0;
		                    	if (sizeof($arr1) != 0) {
		                    		foreach ($arr1 as $user) {
		                    			$n++;$orid = $this->my_func->scpro_encrypt($user->or_id);
		                    			?>
		                    	<tr>
		                            <td><?= $n; ?></td>
		                            <td><span class="pull-left">
		                            <?php
                                    $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                    echo $view;

                                    	?>
                                    <br>
                                    <?php
                                    $client = "";
                                    if($user->cl_id != null)
                                    {
                                    	$client = 'CL'.(1000+$user->cl_id);
                                    }
                                    ?>
                                    <strong><?= $client; ?></strong>

                                    </span>

                                    <span class="pull-right">
                                    <?= ucwords($user->cl_country); ?>
                                    <?php
                                    $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                    if ($fc != "") {
                                    	?>
                                    	<img class="flag flag-<?= $fc; ?>"/>
                                    	<?php
                                    }
                                    ?></span></td>
		                            <td><?php
		                            if ($user->or_id) {
		                            	$id = '#'.(120000+$user->or_id);
		                            	echo '<span style = "color : #ff3399;"><strong>'.$id.'</strong></span> - ';
		                            } else {
		                            	echo "--Not Set--";
		                            }
                                    ?>
									<button type="button" onclick="window.open('<?= site_url('nasty_v2/dashboard/page/f1?time='.$orid); ?>');" class="btn btn-default btn-sm blue-ebonyclay" title="TimeLine Log"><i class="fa fa-clock-o"></i></button>
									</td>
		                            <td><?php
                                    $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                    echo $view."<br/><br />" ;
									$view = "ETS :<br />";
									$view .= ($user->or_sendDate == NULL) ? '' : date_format(date_create($user->or_sendDate) , 'd-M-Y' ) ;
									echo $view;
                                    ?></td>
		                            <td><?php
                                    $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                    echo $view;
                                    ?></td>
                                    <td class="mt-element-ribbon">

                                    	<div class="pull-left">
                                    		<?php if(($user->pr_id==8)||($user->pr_id==9)||($user->pr_id==10)||($user->pr_id==11)||($user->pr_id==12)||($user->pr_id==13)){ ?>

                                    		<span class="label" style="background-color:#36c6d3;">Complete</span>
                                    		<div class="clearfix" style="height: 10px;"></div>

                                    	<?php }?>


                                    	<span class="label" style="background-color: <?= $user->pr_color; ?>"><?= $user->pr_desc; ?></span>
                                    	</div>


                            			<?php if ($user->or_paid) { ?>
                            				<div title="Paid" id="gmbr<?= $n ?>" class="bayar ribbon ribbon-right ribbon-vertical-right ribbon-shadow ribbon-border-dash-vert ribbon-color-success uppercase" >
                            				<div class="ribbon-sub ribbon-bookmark" title="Paid"><i class="fa fa-money"></i></div>
                            				</div>
                            				<input type="hidden" class="form-control gmbr<?= $n ?>" value="<?= $this->my_func->scpro_encrypt($user->or_id); ?>">
                            			<?php } ?>




                                    </td>
                             <?php
									if($user->or_shipcom == 1){
										$comp="dhl";
									}
									elseif($user->or_shipcom == 2){
										$comp="aramex";
									}
									elseif($user->or_shipcom == 3){
										$comp="malaysia-post";
									}
									elseif($user->or_shipcom == 5){
										$comp="gdex";
									}
									elseif($user->or_shipcom == 6){
										$comp="ups";
									}
									elseif($user->or_shipcom == 7){
										$comp="malaysia-post";
									}
									elseif($user->or_shipcom == 8){
										$comp="fedex";
									}
									else{

										if(strtolower($user->or_shipcom) == "gdex")
										{
											$comp="gdex";
										}
										elseif (strtolower($user->or_shipcom) == "ups") {
											$comp="ups";
										}
										elseif (strtolower($user->or_shipcom) == "poslaju") {
											$comp="malaysia-post";
										}
										elseif (strtolower($user->or_shipcom) == "fedex") {
											$comp="fedex";
										}
										else{
											$comp=NULL;
										}
									}
									$tracking = $user->or_trackno;
									$tracking = preg_replace('/\s+/', '', $tracking);
							        $trackingArr = explode(',' , $tracking);

                                  ?>
                                    <td>
                                        <?php if($comp!=null){
											foreach ($trackingArr as $tr) { ?>
												<span style = "color : #0671D6;"><strong><big><a target="_blank" href="https://track.aftership.com/<?= $comp; ?>/<?= $tr; ?>" title="click here to know about order shipment status."><?= $tr; ?></a></big></strong></span><br />
										<?php	}
										?>
                                    <?php }else{ ?>
                                    	<span style = "color : #0671D6;"><strong><big><?= $user->or_trackno ?></big></strong></span>

                                    <?php } ?></td>
		                            <td align="center">
                                    <?php
                                        if ($us_id == $user->us_id) {
                                        	$conf = "jari";
                                        }else{
                                        	$conf = "xleh";
                                        }
                                    ?>
									<div class="btn-xs">
		                            	<a type="button" class="btn btn-xs btn-info" href="<?= site_url('nasty_v2/dashboard/page/a111?v=2&view=').$orid; ?>" name="c4" title="Order Detail"><i class="fa fa-eye"></i></a>
										<a type="button" class="btn btn-xs btn-warning" href="<?= site_url('nasty_v2/dashboard/page/a121?v=2&edit=').$orid; ?>" name="c3" title="Edit Order"><i class="fa fa-pencil"></i></a>
										<button type="button" class="btn btn-xs purple-seance upPic" id="up<?= $n; ?>"><i class="fa fa-upload"></i></button>
										<button type="button" class="btn btn-xs purple-sharp viewFile" data-id = "<?= $orid; ?>"><i class="fa fa-paperclip"></i></button>
										<input type="hidden" class="form-control up<?= $n; ?>" value="<?= $orid; ?>">
										<?php if($user->pr_id == 3 || $user->pr_id >= 8 || $user->pr_id == 2){ ?>
                                    			<button title = "Print Order" onclick = "window.open('<?= site_url('order/printO1?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" type="button" class="btn btn-xs btn-default btn-info"><i class="fa fa-print"></i></button> <?php } if($user->pr_id == 3 || $user->pr_id >= 8){ ?>
                                    			<button type="button" title = "D.O Form" onclick = "window.open('<?= site_url('order/printDO1?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn btn-xs btn-success"><i class="fa fa-truck"></i></button>
                                    		<?php } ?>
                                    		<?php if($user->pr_id == 3){
                                    			$orid = $this->my_func->scpro_encrypt($user->or_id);
                                    			if($user->pr_id != 8){
                                    			?>
                                    			<button type="button" title = "ROS" class="ROSButton btn btn-xs btn-primary " id="<?= $n.'ros' ?>" name="<?= $n.'ros' ?>"><i class="fa fa-flag-checkered"></i></button>
                                    			<input type="hidden" class="form-control <?= $n.'ros' ?>" value="<?= $user->or_id ?>">

                                    		 <?php }} ?>
										</div>
                                    		<div class="clearfix">
                                    		&nbsp;
                                    		</div>
										<div class="btn btn-group-xs">
										<button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/Invoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');"  class="btn btn-xs blue-dark" title="Purchase Order">P.O</button></a>
										<button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/dummyInvoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn btn-xs c-btn-border-1x c-btn-blue-dark " title="Dummy Invoice">DInv</button></a>
										<?php if($user->pr_id == 4 || $user->pr_id == 8 ){ ?><button type="button" class="btn btn-xs bg-green-jungle  <?= $conf ?>" id="<?= $n.'con' ?>" title="Confirm"><i class="fa fa-thumbs-up"></i></button> <?php }else{  ?>
										<!-- <button type="button" class="btn bg-red-pink btn-circle btn-xs <?= $conf ?>" title="Un Confirm" id="<?= $n.'con' ?>"><i class="fa fa-thumbs-down"></i></button></a>--><?php } ?>
										<input type="hidden" class="form-control <?= $n.'con' ?>" value ="<?= $orid ?>">
										<input type="hidden" class="form-control <?= $n.'con1' ?>" value ="<?= $user->pr_id ?>">
										<input type="hidden" class="form-control <?= $n.'cocode' ?>" value ="<?= $id; ?>">
										<button type="button" class="btn btn-xs btn-danger cancelOrd" id="<?= $n.'co' ?>" title="Cancel Order"><i class="fa fa-close"></i></button>
									</div>
		                            </td>
		                        </tr>
		                    			<?php
		                    		}
		                    	}		                    ?>
		                    </tbody>
		                    <?php if (isset($page)) {?>
		                    <tfoot>
		                    	<td colspan="8">
			                	<div class="col-md-5 col-sm-5">
			                		<div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing <?= ($page+1); ?> to <?= ($page+$row); ?> of <?= $total; ?> records</div>
			                	</div>
			                	<div class="col-md-7 col-sm-7" align="right">
			                		<div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
			                			<ul class="pagination" style="visibility: visible;">
			                			<?php
			                			$prev = "";
			                			$next = "";
			                				if ($page == 0) {
			                					$prev = "disabled";
			                				}
			                				if ($total <= ($page + 10)) {
			                					$next = "disabled";
			                				}
			                			?>
			                				<li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/a1new?page='.($page-10)); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>
			                				<li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/a1new?page='.($page+10)); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
			                			</ul>
			                		</div>
			                	</div>
				                </td>
		                    </tfoot> <?php
		                    } ?>
		                </table>

	            	</div>
	            </div>
	            <div id="fileUp" style="display:none;">

	            </div>
            </div>
        </div>
	</div>
</div>
<pre><?= print_r($arr1); ?></pre>
<div class="modal" id="myModal" role="dialog">
	<form id="formcancel" action="<?= site_url('nasty_v2/dashboard/cancelConfirm').'?cancel='.$this->my_func->scpro_encrypt('cancel'); ?>" method="POST" role="form">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="cross">&times;</button>
          <h4 class="modal-title">Cancel The Order <span id = "ordercode"></span></h4>
        </div>
        <div class="modal-body">
        <div class="row" align="center">
        	<h2><span class="label label-warning">Requested By : <?= $us_name; ?></span></h2>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="row">
        	<div class="form-group">
        	<form action="" method="POST" role="form">
        		<div class="form-group">
        			<label for="textarea" class="col-sm-2 control-label">Reason :</label>
          		<div class="col-sm-10">
          			<textarea name="msg" id="textarea" class="form-control input-circle" rows="5" required="required"></textarea>
          		</div>
          		</div>
        	</form>
          	</div>
        </div>
        <input type="hidden" name="or_id" id="inputOrid" class="form-control" value="">
        <input type="hidden" name="us_id" id="inputUs_id" class="form-control" value="">
        <input type="hidden" name="ver" id="inputUs_id" class="form-control" value="2">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="close">Close</button>
          <button type="submit" class="btn btn-danger"  id="send"><i class="fa fa-send"></i> Send</button>
        </div>
      </div>
    </div></form>
  </div>
  <input type="hidden" id="usKey" value="<?= $this->session->userdata('us_id'); ?>">
<script>
<?php
$url = current_url();
$url = $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
?>
	$(document).ready(function() {
		var usid = $('#usKey').val();
		$(".ROSButton").click(function() {
			id = $(this).prop('id');
			orid = $("."+id).val();

			bootbox.confirm({
			    message: "Are You Sure?",
			    buttons: {
			        confirm: {
			            label: 'Yes',
			            className: 'btn-success'

			        },
			        cancel: {
			            label: 'No',
			            className: 'btn-danger'
			        }
			    },
			    callback: function (result) {
			    	if(result == true){
			    		$.post('<?= site_url('nasty_v2/dashboard/change_pr_id3'); ?>', {us_id : usid , or_id: orid,pr_id: 8}, function(data) {
							$(window).attr("location", "<?= $url; ?>");
			            });
			    	}
			    }
			});
    	});
		$(".cancelOrd").click(function() {
			$('#myModal').show('slow');
			key = $(this).prop('id');
			codeOr = $("."+key+"code").val();
			codeOrId = $("."+key+"n").val();
			$("#inputOrid").val(codeOrId);
			$("#inputUs_id").val(<?= $us_id; ?>);
		});
		$('.jari').click(function() {
			id = $(this).prop('id');pr_id = $("."+id+"1").val();
			id = $("."+id).val();
			$.post('<?= site_url('nasty_v2/dashboard/change_pr_id'); ?>', {id: id , pr_id : pr_id}, function(data) {
				$(window).attr("location", "<?= $url; ?>");
			});
		});
		$('.xleh').click(function() {
			alert("Warning!!!. Only order's Salesman can change the order status.");
		});
		$(".upPic").click(function() {
			hid = $(this).prop('id');
			orid = $('.'+hid).val();
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxUpload'); ?>', {or_id : orid}, function(data) {
				$.when($(".tableL").fadeOut("slow")).then(function(){
					$.when($("#fileUp").html(data)).then(function(){$("#fileUp").fadeIn("fast");});
				});
			});
			/*bootbox.alert("Hello world!", function() {
                //console.log("Alert Callback");
            });*/
		});
		$(".bayar").click(function() {
			gbr = $(this).prop("id");
			or_id = $("."+gbr).val();
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxImg'); ?>', {or_id: or_id}, function(data) {
				bootbox.dialog({message : data});
			});
		});
		$('#close').click(function() {
		    $('#myModal').hide('slow');
		});
		$('.close').click(function() {
		    $('#myModal').hide('slow');
		});
		$('.cancelOrd').click(function() {
			id = $(this).prop('id');
			or_id = $('.'+id+'n').val();
			us_id = $('.'+id+'n1').val();
		});
		$('.viewFile').click(function(event) {
			var id = $(this).data('id');
			$.post('<?= site_url('nasty_v2/upload/getAjaxUploadFile'); ?>', {id: id}, function(data) {
				bootbox.dialog({
				message : data
				});
			});
		});
	});

</script>
