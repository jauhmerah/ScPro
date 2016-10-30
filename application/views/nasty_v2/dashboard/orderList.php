<script>
	function onDel() {
		return confirm('Are You Sure ?');
	}
</script>
<div class="row">
	<div class="col-md-12">	
		<div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list"></i>Order List 
                </div>                
            </div>
            <div class="portlet-body flip-scroll">
	            <div class="row">
	            	<div class="col-md-12">
	            		<div class="col-md-2">
	            			<a href="<?= site_url('nasty_v2/dashboard/page/z1'); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Order</button></a>
	            		</div>
	            		<div class="col-md-5">
	            			<div class="form-group">
	            				<label for="input" class="col-sm-2 control-label">Search</label>
	            				<div class="col-sm-10">
	            					<input type="search" name="" id="search" class="form-control input-circle" value="" title="" disabled placeholder="Next Ver 2.3 Alpha">
	            				</div>
	            			</div>
	            		</div>
	            		<div class="col-md-5">
	            			<div class="form-group">
	            				<label for="inputFilter" class="col-sm-2 control-label">Filter :</label>
	            				<div class="col-sm-10">
	            					<select name="filter" id="inputFilter" class="form-control input-circle" disabled>
	            						<option value="-1">-- Next Ver 2.3 Alpha --</option>
	            						<option value="0">Client Name</option>
	            						<option value="1">Order Code</option>
	            						<option value="2">Order Date</option>
	            						<option value="3">Sales Person</option>
	            						<option value="4">Order Status</option>
	            					</select>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
	            <div class="clearfix">
	            	&nbsp;
	            </div>
	            <div class="row">
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
                                    ?></td>
		                            <td><?php 
		                            if ($user->or_id) {
		                            	$id = '#'.(110000+$user->or_id);
		                            	echo '<span style = "color : blue;"><strong>'.$id.'</strong></span>';
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
                                    <td> <?php                                    	
                                    	switch ($user->pr_id) {
                                    		case 1:
                                    			?>
                                    			<span class="label label-info"><?= $user->pr_desc; ?></span>
                                    			<?php
                                    			break;
                                    		case 2:
                                    			?>
                                    			<span class="label label-warning"><?= $user->pr_desc; ?></span>
                                    			<?php
                                    			break;
                                    		case 3:
                                    			?>
                                    			<span class="label label-success"><?= $user->pr_desc; ?></span>
                                    			<?php
                                    			break;
                                    		default: ?>
                                    			<span class="label label-danger">Status Error</span>
                                    			<?php break;
                                    	}
                                    	?>
                                    </td>
		                            <td>
                                    <?php 
                                        $usid = $this->my_func->scpro_encrypt($user->or_id);
                                    ?>
		                            	<a href="<?= site_url('nasty_v2/dashboard/page/a111?view=').$usid; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>&nbsp;-&nbsp;                            	
										<a href="<?= site_url('nasty_v2/dashboard/page/a121?edit=').$usid; ?>" name="c3" title="Edit Order"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
										<?php if($user->pr_id == 3){ ?>
                                    			&nbsp;- &nbsp;<button title = "Print Order" onclick = "window.open('<?= site_url('order/printO1?id='.$this->my_func->scpro_encrypt($user->or_id)); ?>');" type="button" class="btn btn-default btn-info btn-xs"><i class="fa fa-print"></i></button>&nbsp;-&nbsp;
                                    			<button type="button" title = "D.O Form" onclick = "window.open('<?= site_url('order/printDO1?id='.$this->my_func->scpro_encrypt($user->or_id)); ?>');" class="btn btn-success btn-xs"><i class="fa fa-file-text"></i></button>
                                    		<?php } ?>
										&nbsp;-&nbsp;										
										<a onclick = "return onDel();" href="<?= site_url('nasty_v2/dashboard/page/a13?del=').$usid; ?>" name="c5" title="Delete Order"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></a>
		                            </td>		                            
		                        </tr>		
		                    			<?php
		                    		}
		                    	}
		                    ?>
		                    <!-- <<<<<<<<<<<<<<<<<<<New version 2.20 Alpha>>>>>>>>>>>>>>>>>>> -->
		                    <?php 
		                    if (isset($arr)) {		                    
		                    	if (sizeof($arr) != 0) { ?>
		                    	<tr>
	                    			<td colspan = "7">
	                    				<div align = "center">vvvvvvv Old Version 2.1 Alpha vvvvvvv</div>
	                    			</td>
	                    		</tr>
		                    	<?php		                    		
		                    		foreach ($arr as $user) {
		                    			$n++;
		                    			?>
		                    	<tr>
		                            <td><?= $n; ?></td>
		                            <td><?php 
                                    $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                    echo $view;
                                    ?></td>
		                            <td><?php 
		                            if ($user->or_id) {
		                            	$id = '#'.(100000+$user->or_id);
		                            	echo '<span style = "color : red;"><strong>'.$id.'</strong></span>';
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
                                    <td> <?php                                    	
                                    	switch ($user->pr_id) {
                                    		case 1:
                                    			?>
                                    			<span class="label label-info"><?= $user->pr_desc; ?></span>
                                    			<?php
                                    			break;
                                    		case 2:
                                    			?>
                                    			<span class="label label-warning"><?= $user->pr_desc; ?></span>
                                    			<?php
                                    			break;
                                    		case 3:
                                    			?>
                                    			<span class="label label-success"><?= $user->pr_desc; ?></span>
                                    			<?php
                                    			break;
                                    		default: ?>
                                    			<span class="label label-danger">Status Error</span>
                                    			<?php break;
                                    	}
                                    	?>
                                    </td>
		                            <td>
                                    <?php 
                                        $usid = $this->my_func->scpro_encrypt($user->or_id);
                                    ?>
		                            	<a href="<?= site_url('nasty_v2/dashboard/page/a11?view=').$usid; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>&nbsp;-&nbsp;                            	
										<a href="<?= site_url('nasty_v2/dashboard/page/a12?edit=').$usid; ?>" name="c3" title="Edit Order"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
										<?php if($user->pr_id == 3){ ?>
                                    			&nbsp;- &nbsp;<button title = "Print Order" onclick = "window.open('<?= site_url('order/printO?id='.$this->my_func->scpro_encrypt($user->or_id)); ?>');" type="button" class="btn btn-default btn-info btn-xs"><i class="fa fa-print"></i></button>&nbsp;-&nbsp;
                                    			<button type="button" title = "D.O Form" onclick = "window.open('<?= site_url('order/printDO?id='.$this->my_func->scpro_encrypt($user->or_id)); ?>');" class="btn btn-success btn-xs"><i class="fa fa-file-text"></i></button>
                                    		<?php } ?>
										&nbsp;-&nbsp;										
										<a onclick = "return onDel();" href="<?= site_url('nasty_v2/dashboard/page/a13?del=').$usid; ?>" name="c5" title="Delete Order"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></a>
		                            </td>		                            
		                        </tr>		
		                    			<?php
		                    		}
		                    	}
		                    }
		                    ?>		                                               
		                    </tbody>
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
			                				<li class="prev <?= $prev; ?>"><a href="<?php if($prev!="disabled"){ ?><?= site_url('nasty_v2/dashboard/page/a1?page='.($page-10)); ?><?php } ?>" title="Prev"><i class="fa fa-angle-left"></i></a></li>			                				
			                				<li class="next <?= $next; ?>"><a href="<?php if($next!="disabled"){ ?><?= site_url('nasty_v2/dashboard/page/a1?page='.($page+10)); ?><?php } ?>" title="Next"><i class="fa fa-angle-right"></i></a></li>
			                			</ul>
			                		</div>
			                	</div>
				                </td>
		                    </tfoot>
		                </table>		                
	            	</div>
	            </div>	                         
            </div>
        </div>
	</div>
</div>