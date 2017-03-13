<script>
	function onDel() {
		return false;
		//confirm('Are You Sure ?');
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
	$us_name = $this->my_func->scpro_decrypt($this->session->userdata('us_username'));
	?>
<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
					<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">	
		<div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list"></i>Order List EU_17
                </div>                        
            </div>
            <div class="portlet-body flip-scroll">
	            <div class="row tableL">
	            <form id="formSearch" action="<?= site_url('nasty_v2/dashboard/page/a1new'); ?>" method="POST" role="form">
	            	<div class="col-md-12">
	            		<div class="col-md-2">
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
	            		<div class="col-md-2">
	            			<button type="button" class="btn btn-default " id="sub"><i class="fa fa-search"></i> Search</button><!--  -->
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
		                            <th>Order Code</th>
		                            <th>Order Date</th>
		                            <th>Sales Person</th>
		                            <th>Status</th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    <?php
		                    	$n = 0; 
		                    	if (sizeof($arr1) != 0) { 
		                    		foreach ($arr1 as $user) {
		                    			$n++;
		                    			?>
		                    	<tr>
		                            <td><?= $n; ?></td>
		                            <td><?php 
                                    $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                    echo $view;
                                    ?><span class="pull-right">
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
		                            	$id = $user->or_id."-EU2";
		                            	echo '<span style = "color : #ff3399;"><strong>'.$id.'</strong></span>';
		                            } else {
		                            	echo "--Not Set--";
		                            }
                                    ?></td>
		                            <td><?php 
                                    $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                    echo $view ;
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
		                            <td align="center">
                                    <?php 
                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                        
                                        if ($us_id == $user->us_id) {
                                        	$conf = "jari";
                                        }else{
                                        	$conf = "xleh";
                                        }
                                    ?>
		                            	<a href="<?= site_url('nasty_v2/dashboard/page/a111?v=2&view=').$orid; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-eye"></i></button></a>&nbsp;-&nbsp;                            	
										<a href="<?= site_url('nasty_v2/dashboard/page/a121?v=2&edit=').$orid; ?>" name="c3" title="Edit Order"><button type="button" class="btn btn-warning btn-circle btn-xs"><i class="fa fa-pencil"></i></button></a>
										<!--&nbsp;-&nbsp; <button type="button" class="btn btn-circle purple-seance btn-xs upPic" id="up<?= $n; ?>"><i class="fa fa-upload"></i></button></a> -->
										<input type="hidden" class="form-control up<?= $n; ?>" value="<?= $orid; ?>">
										<?php if($user->pr_id == 3){ ?>
                                    			&nbsp;- &nbsp;<button title = "Print Order" onclick = "window.open('<?= site_url('order/printO1?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" type="button" class="btn btn-default btn-circle btn-info btn-xs"><i class="fa fa-print"></i></button>&nbsp;-&nbsp;
                                    			<button type="button" title = "D.O Form" onclick = "window.open('<?= site_url('order/printDO1?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn btn-success btn-circle btn-xs"><i class="fa fa-truck"></i></button>
                                    		<?php } ?>
                                    		


                                    		<?php if($user->pr_id == 3){ 

                                    			$orid = $this->my_func->scpro_encrypt($user->or_id);
                                    			if($user->pr_id != 8){
                                    			?>
                                    			&nbsp;-&nbsp;
                                    			<button type="button" title = "ROS" class="ROSButton btn btn-primary btn-circle btn-xs" id="ros<?= $n; ?>" name="ros<?= $n; ?>"><i class="fa fa-flag-checkered"></i></button>
                                    			<input type="hidden" class="or_id" name="or_id" id="or_id" value="<?= $user->or_id ?>">
	
                                    		 <?php }} ?>


                                    		<div class="clearfix">
                                    		&nbsp;
                                    		</div>
										<button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/Invoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');"  class="btn blue-dark btn-circle btn-xs" title="Invoice">Inv</button></a>&nbsp;-&nbsp;    
										<button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/dummyInvoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn c-btn-border-1x c-btn-blue-dark btn-circle btn-xs" title="Dummy Invoice">DInv</button></a>&nbsp;-&nbsp;    
										<?php if($user->pr_id == 4 || $user->pr_id == 8 ){ ?><button type="button" class="btn bg-green-jungle btn-circle btn-xs <?= $conf ?>" id="<?= $n.'con' ?>" title="Confirm"><i class="fa fa-thumbs-up"></i></button> <?php }else{  ?>
										<!--<button type="button" class="btn bg-red-pink btn-circle btn-xs <?= $conf ?>" title="Un Confirm" id="<?= $n.'con' ?>"><i class="fa fa-thumbs-down"></i></button></a><?php } ?> &nbsp;-&nbsp; -->
										<input type="hidden" class="form-control <?= $n.'con' ?>" value ="<?= $orid ?>">
										<input type="hidden" class="form-control <?= $n.'con1' ?>" value ="<?= $user->pr_id ?>">
										<input type="hidden" class="form-control <?= $n.'cocode' ?>" value ="<?= $id; ?>">     										
										<?php if($user->pr_id != 5 && $user->pr_id != 7 && $user->pr_id != 3 ){ ?><button type="button" class="btn btn-default btn-circle btn-xs cancelOrd" id="<?= $n.'co' ?>" title="Cancel Order"><i class="fa fa-close"></i></button><?php }else{  ?><button type="button" class="btn btn-danger btn-circle btn-xs cancelOrd" id="<?= $n.'co' ?>"><i class="fa fa-trash"></i></button><?php } ?>
		                            </td>	                            
		                        </tr>		
		                    			<?php
		                    		}
		                    	}		                    ?>		                                               
		                    </tbody>
		                    <?php if (isset($page)) {?>
		                    <tfoot>
		                    	<td colspan="7">
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
<script>
	$(document).ready(function() {
		$(".ROSButton").click(function() {
		       		
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
					    		var elements = document.getElementsByClassName("or_id");
					    		var orid = elements[0].value;
					    		//alert(orid);
					    		$.post('<?= site_url('nasty_v2/dashboard/change_pr_id3'); ?>', {or_id: orid,pr_id: 8}, function(data) {
					            	alert("Success!!!.");
					            	$(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/a1new'); ?>");
					            	
					            });

					    	}
					    	
					        
					    }
					});


		    	});
		$(".cancelOrd").click(function() {
			$('#myModal').show('slow');
			key = $(this).prop('id');
			codeOr = $("."+key+"code").val();
			//alert(key);
			codeOrId = $("."+key+"n").val();
			$("#inputOrid").val(codeOrId);
			$("#inputUs_id").val(<?= $us_id; ?>);
		});
		$('.jari').click(function() {
			id = $(this).prop('id');pr_id = $("."+id+"1").val();
			id = $("."+id).val();			
			$.post('<?= site_url('nasty_v2/dashboard/change_pr_id'); ?>', {id: id , pr_id : pr_id}, function(data) {
				$(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/a1new'); ?>");
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
	});

</script>
