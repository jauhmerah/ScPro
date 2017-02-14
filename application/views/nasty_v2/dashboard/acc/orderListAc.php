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
		<div class="portlet box yellow-casablanca">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bank"></i>Order List 2017
                </div>                      
            </div>
            <div class="portlet-body flip-scroll">
	            <div class="row tableL">
	            <form id="formSearch" action="<?= site_url('nasty_v2/dashboard/page/a1new'); ?>" method="POST" role="form">
	            	<div class="col-md-12">
	            		<div class="col-md-2">
	            			
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
		                    			$green = ($user->or_acc == 0) ? "" : "bg-green-meadow bg-font-green-meadow" ;
		                    			?>
		                    	<tr class="<?= $green; ?>">
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
		                            	$id = '#'.(120000+$user->or_id);
		                            	echo '<span style = "color : #b706d6;"><strong>'.$id.'</strong></span>';
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
                            			<span class="label" style="background-color: <?= $user->pr_color; ?>"><?= $user->pr_desc; ?></span>
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
		                            	<a href="<?= site_url('nasty_v2/dashboard/page/a111?v=2&view=').$orid."&mode=acc"; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-eye"></i></button></a>&nbsp;-&nbsp;                            											
										<input type="hidden" class="form-control <?= $n.'check' ?>" value="<?= $orid; ?>">
										
										<button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/Invoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');"  class="btn blue-dark btn-circle btn-xs" title="Invoice">Inv</button></a>&nbsp;-&nbsp;    
										<button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/dummyInvoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn c-btn-border-1x c-btn-blue-dark btn-circle btn-xs" title="Dummy Invoice">DInv</button></a>&nbsp;-&nbsp;										
										<?php 
										if ($user->or_acc == 0) {
											?>
											<button type="button" class="btn green-jungle btn-circle btn-xs doneC" title="Checked" id="<?= $n.'check' ?>"><i class="fa fa-check"></i></button></a> 
											<?php
										} else {
											?>
											<button type="button" class="btn red-pink btn-circle btn-xs cancelC" title="Unchecked" id="<?= $n.'check' ?>"><i class="fa fa-close"></i></button></a> 
											<?php
										}										
										?>										
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

<script>
	$(document).ready(function() {		
		$(".doneC").click(function() {
			key = $(this).prop('id');
			or_id = $('.'+key).val();
			$.post('<?= site_url()."nasty_v2/dashboard/getAjaxDone" ?>', {or_id: or_id}, function(data, textStatus, xhr) {
				window.location = "<?= current_url(); ?>";
			});
		});
		$(".cancelC").click(function() {
			key = $(this).prop('id');
			or_id = $('.'+key).val();
			$.post('<?= site_url()."nasty_v2/dashboard/getAjaxCancel" ?>', {or_id: or_id}, function(data, textStatus, xhr) {
				window.location = "<?= current_url(); ?>";
			});
		});
		$(".bayar").click(function() {
			gbr = $(this).prop("id");
			or_id = $("."+gbr).val();
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxImg'); ?>', {or_id: or_id}, function(data) {
				bootbox.dialog({message : data});
			});			
		});
	});

</script>
