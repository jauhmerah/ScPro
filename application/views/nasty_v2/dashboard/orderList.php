<script>
	function onDel() {
		return confirm('Are You Sure ?');
	}
</script>
<div class="row">
	<div class="col-md-12">

	            	<pre>
	            		<?php print_r($arr); ?>
	            	</pre>
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
	            			<a href=""><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Order</button></a>
	            		</div>
	            		<div class="col-md-5">
	            			<div class="form-group">
	            				<label for="input" class="col-sm-2 control-label">Search :</label>
	            				<div class="col-sm-10">
	            					<input type="search" name="" id="search" placeholder="Search" class="form-control input-circle" value="" title="" disabled>
	            				</div>
	            			</div>
	            		</div>
	            		<div class="col-md-5">
	            			<div class="form-group">
	            				<label for="inputFilter" class="col-sm-2 control-label">Filter :</label>
	            				<div class="col-sm-10">
	            					<select name="filter" id="inputFilter" class="form-control input-circle">
	            						<option value="-1">-- Select One --</option>
	            						<option value="0">Client Name</option>
	            						<option value="1">Order Code</option>
	            						<option value="2">Order Date</option>
	            						<option value="3">Sales Person</option>
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
		                            <th>Action</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    <?php 
		                    	if (sizeof($arr) == 0) {
		                    		?>
	                    		<tr>
	                    			<td colspan = "6">
	                    				<div align = "center">No Data</div>
	                    			</td>
	                    		</tr>
		                    		<?php
		                    	}else{
		                    		$n = 0;
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
		                            <td>
                                    <?php 
                                        $usid = $this->my_func->scpro_encrypt($user->or_id);
                                    ?>
		                            	<a href="<?= site_url('nasty_v2/dashboard/page/c13?view=').$usid; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>&nbsp;-&nbsp;                            	
										<a href="<?= site_url('nasty_v2/dashboard/page/c11?edit=').$usid; ?>" name="c3" title="Edit Order"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>&nbsp;-&nbsp;										
										<a onclick = "return onDel();" href="<?= site_url('nasty_v2/dashboard/page/c12?delete=').$usid; ?>" name="c5" title="Delete Order"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></a>
		                            </td>		                            
		                        </tr>		
		                    			<?php
		                    		}
		                    	}
		                    ?>		                                               
		                    </tbody>
		                </table>
	            	</div>
	            </div>	                         
            </div>
        </div>
	</div>
</div>