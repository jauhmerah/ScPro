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
		<div class="portlet box green-haze">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list"></i>Logs
                </div>
                <!-- <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <a ><button type="button" onclick="window.location.href='<?= site_url('nasty_v2/dashboard/page/a1old'); ?>'" class="btn green btn-circle btn-sm">Old Order List</button></a>
                    </div>
                </div> -->           
            </div>
             <?php $us_lvl = $this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));?>
            <div class="portlet-body flip-scroll">
	            <div class="row tableL">
	            <form id="formSearch" action="<?= site_url('nasty_v2/dashboard/page/i21'); ?>" method="POST" role="form">
	            	<div class="col-md-12">
	            		 <div class="col-md-2">
	            			<!--<a href="<?= site_url('nasty_v2/dashboard/page/z1'); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Order</button></a>-->
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
	            						<option value="1">Item Name</option>
	            						<option value="2">Username</option>
	            						<option value="3">Date</option>
	            						<option value="4">Status</option>
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
		                            <th>Item</th>
		                            <th>Strength</th>
		                            <th>From</th>
		                            <th>To</th>
		                            <!-- <th>Arrived Date</th> -->
		                            <th>Diff</th>
		                            <th>User</th>
		                            <th>Date</th>
		                            <th>Status</th>
		                            
		                        </tr>
		                    </thead>
		                    <tbody>
		                    <?php
		                    	$n = 0; 
		                    	if (sizeof($arr1) != 0) { 
		                    		foreach ($arr1 as $user) {
		                    			$n++;
		                    			?>
		                    	
		                    		<tr class="Lorder" id="L<?= $n; ?>">
		                            <td><?= $n; ?></td>
		                            <td><?php 
                                    $view = ($user->ty2_desc == null) ? "--Not Set--" : $user->ty2_desc ;
                                    echo $view;
                                    ?>
                                 </td>
		                            <td><?php 
                                    $view = ($user->ni_mg == null) ? "--Not Set--" : $user->ni_mg ;
                                    echo $view;
                                    ?> mg</td>
                                    <td><?php 
                                    $view = ($user->fromqty == null) ? "--Not Set--" : $user->fromqty ;
                                    echo $view;
                                    ?></td>
		                             <td><?php 
                                    $view = ($user->toqty == null) ? "--Not Set--" : $user->toqty ;
                                    echo $view;
                                    ?></td>
                                    <!--<td><?php 
                                    if($user->sh_arrivedate == "0000-00-00 00:00:00"){
										echo "--Not Set--";

                                    }
                                    else
                                    {
                                    	$view =date_format(date_create($user->sh_arrivedate) , 'd-M-Y' ) ;
                                    echo $view ;	
                                    }

                                    // $view = ( $user->sh_arrivedate == null) ? "--Not Set--" :  date_format(date_create($user->sh_arrivedate) , 'd-M-Y' ) ;
                                    // echo $view ;

                                    ?></td> -->
		                            <td><?php 
                                    $view = ($user->diff == null) ? "--Not Set--" : $user->diff ;
                                    echo $view;
                                    ?></td>
                                     <td>
                                     <?php 
                                    $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                    echo $view;
                                    ?>

                                 	<!-- <?php $shid=$this->my_func->scpro_encrypt($user->sh_id); ?>
		                            	<a href="<?= site_url('nasty_v2/dashboard/page/i111?v=2&view=').$shid; ?>" name="c4" title="Shipment Detail"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-eye"></i></button></a>&nbsp;-&nbsp;	
										<a href="<?= site_url('nasty_v2/dashboard/page/a121?v=2&edit=').$shid; ?>" name="c3" title="Edit Shipment">
										<button type="button" class="btn btn-warning btn-circle btn-xs"><i class="fa fa-pencil"></i></button></a>
										
										<?php if($user->pr_id==15){?>
										&nbsp;-&nbsp;
										<button type="button" class="shipCheck btn btn-primary btn-circle btn-xs" id="<?= $n.'ship' ?>" name="<?= $n.'ship' ?>" title="check Item"><i class="fa fa-clipboard"></i></button>
                                    	<input type="hidden" class="form-control <?= $n.'ship' ?>" value="<?= $user->sh_id ?>">
										<?php }?>
										<?php if($user->pr_id!=15){
											if($us_lvl != 9 && $us_lvl != 7){?>
                                    	&nbsp;-&nbsp;
                                    	
                                    	<button type="button" class="shipBtn btn btn-success btn-circle btn-xs" id="<?= $n.'ship' ?>" name="<?= $n.'ship' ?>"><i class="fa fa-check"></i></button>
                                    	<button type="button" onclick = "window.open('<?= site_url('qr/qrcode?id='.$this->my_func->scpro_encrypt($user->sh_id).'&ver=2'); ?>');" class="btn btn-circle purple-sharp btn-xs" id="<?= $n.'ship' ?>" name="<?= $n.'ship' ?>" title = "Print Qrcode List"><i class="fa fa-qrcode"></i></button>
                                    	<input type="hidden" class="form-control <?= $n.'ship' ?>" value="<?= $user->sh_id ?>">
                                    	<?php }}?>
                                    	<?php  if($us_lvl != 9 && $us_lvl != 7){?>   
                                    	&nbsp;-&nbsp;
                                    	
										<button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/shipInvoice?id='.$this->my_func->scpro_encrypt($user->sh_id).'&ver=2'); ?>');"  class="btn blue-dark btn-circle btn-xs" title="Invoice">Inv</button>&nbsp;-&nbsp;    
										
										<button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/ShipdummyInvoice?id='.$this->my_func->scpro_encrypt($user->sh_id).'&ver=2'); ?>');" class="btn c-btn-border-1x c-btn-blue-dark btn-circle btn-xs" title="Dummy Invoice">DInv</button>  
										<?php } ?>  -->
										
		                            </td>
		                            <td><?php 
                                    $view = ($user->date_added == null) ? "--Not Set--" : $user->date_added ;
                                    echo $view;
                                    ?></td>	           
                                    <td class="mt-element-ribbon">                                    
                                    	<div class="pull-left"> 
                                    	<?php if($user->log_status==0){?>
                                    	<span class="label" style="background-color: #50A3A2 ">Check In</span>
                                    	<?php }else if($user->log_status==1){ ?>
                                    	<span class="label" style="background-color: #4BD621 ">Check Out</span>
                                    	<?php }?>
                                    	</div>
                                    </td>
		                                            
		                        </tr>
		                    	<?php
		                    		}
		                    	}
		                    	?>
		                    </tbody>
		                    <?php if (isset($page)) {?>
		                    <tfoot>
		                    	<td colspan="9">
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
			                				<li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/i21?page='.($page-10)); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>			                				
			                				<li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/i21?page='.($page+10)); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
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
        <input type="hidden" name="sh_id" id="inputOrid" class="form-control" value="">
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


		$(".Lorder").click(function() {
			temp = $(this).prop('id');
			if ($("."+temp).is(':visible')) {
				$("."+temp).hide('slow');
			}else{
				$("."+temp).show('slow');
			}			
			//alert("jadi");
		});
			$(".shipCheck").click(function() {

							bootbox.dialog({
    							message: $('#userForm')
								});
				});
		$(".shipBtn").click(function() {
		       		id = $(this).prop('id');
					shid = $("."+id).val();
					arrDate=new Date();
					dd=arrDate.getDate();
					mm=arrDate.getMonth()+1;
					yyyy=arrDate.getFullYear();

					hours = arrDate.getHours()
    				minutes = arrDate.getMinutes()
    				seconds = arrDate.getSeconds()

					arrDate =yyyy+"-"+mm+"-"+dd+" "+hours+":"+minutes+":"+seconds;
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
					    		
					    		
					    		
					    		$.post('<?= site_url('nasty_v2/dashboard/changeShip_pr_id'); ?>', {sh_id: shid,pr_id: 15,arr_date:arrDate}, function(data) {
					            	
					            	$(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/i21'); ?>");
					            	
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
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxUpload'); ?>', {sh_id : orid}, function(data) {
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
			sh_id = $("."+gbr).val();
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxImg'); ?>', {sh_id: sh_id}, function(data) {
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
			sh_id = $('.'+id+'n').val();
			us_id = $('.'+id+'n1').val();
		});
	});

</script>
