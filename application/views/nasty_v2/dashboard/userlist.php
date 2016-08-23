<pre><?php print_r($arr); ?></pre>
<div class="row">
	<div class="col-md-12">
		<div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>User List 
                </div>                
            </div>
            <div class="portlet-body flip-scroll">
	            <div class="row">
	            	<div class="col-md-12">
	            		<div class="col-md-6">
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
	            						<option value="0">Name</option>
	            						<option value="1">Username</option>
	            						<option value="2">Email</option>
	            						<option value="3">Role</option>
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
		                            <th>Name</th>
		                            <th>Username</th>
		                            <th>Email</th>
		                            <th>Role</th>
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
		                            <td><?= $user->us_fname; ?></td>
		                            <td><?= $user->us_username; ?></td>
		                            <td><?= $user->us_email; ?></td>
		                            <td><?= $user->ul_desc; ?></td>
		                            <td>
		                            	<a href="" name="c4" title="User Detail"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>&nbsp;-&nbsp;                            	
										<a href="" name="c3" title="Edit User"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>&nbsp;-&nbsp;										
										<a href="" name="c5" title="Delete User"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></a>
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
	            <div class="row">
	            	<div class="col-md-12">
	            		<!-- Start Here -->
	            		<div class="col-md-6 col-sm-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit portlet-datatable ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Sample Datatable</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="sample_2_wrapper" class="dataTables_wrapper no-footer"><div class="row"><div class="col-md-6 col-sm-6"><div class="dataTables_length" id="sample_2_length"><label>Show <select name="sample_2_length" aria-controls="sample_2" class="form-control input-sm input-xsmall input-inline"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select></label></div></div><div class="col-md-6 col-sm-6"><div id="sample_2_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm input-small input-inline" placeholder="" aria-controls="sample_2"></label></div></div></div><div class="table-scrollable"><table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_2" role="grid" aria-describedby="sample_2_info">
                                        <thead>
                                            <tr role="row"><th class="table-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label="
                                                    
                                                        
                                                        
                                                    
                                                " style="width: 42px;">
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes">
                                                        <span></span>
                                                    </label>
                                                </th><th class="sorting_asc" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Username : activate to sort column descending" style="width: 80px;"> Username </th><th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label=" Email : activate to sort column ascending" style="width: 127px;"> Email </th><th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label=" Status : activate to sort column ascending" style="width: 61px;"> Status </th></tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        <tr class="gradeX odd" role="row">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td class="sorting_1"> coop </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td>
                                                    <span class="label label-sm label-success"> Approved </span>
                                                </td>
                                            </tr><tr class="gradeX even" role="row">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td class="sorting_1"> foopl </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td>
                                                    <span class="label label-sm label-success"> Approved </span>
                                                </td>
                                            </tr><tr class="gradeX odd" role="row">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td class="sorting_1"> looper </td>
                                                <td>
                                                    <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                                                </td>
                                                <td>
                                                    <span class="label label-sm label-warning"> Suspended </span>
                                                </td>
                                            </tr><tr class="gradeX even" role="row">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td class="sorting_1"> pppol </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td>
                                                    <span class="label label-sm label-success"> Approved </span>
                                                </td>
                                            </tr><tr class="gradeX odd" role="row">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td class="sorting_1"> test </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td>
                                                    <span class="label label-sm label-success"> Approved </span>
                                                </td>
                                            </tr><tr class="gradeX even" role="row">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td class="sorting_1"> userwow </td>
                                                <td>
                                                    <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                                                </td>
                                                <td>
                                                    <span class="label label-sm label-success"> Approved </span>
                                                </td>
                                            </tr><tr class="gradeX odd" role="row">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td class="sorting_1"> weep </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td>
                                                    <span class="label label-sm label-success"> Approved </span>
                                                </td>
                                            </tr></tbody>
                                    </table></div><div class="row"><div class="col-md-5 col-sm-5"><div class="dataTables_info" id="sample_2_info" role="status" aria-live="polite">Showing 1 to 7 of 7 records (filtered1 from 12 total records)</div></div><div class="col-md-7 col-sm-7"><div class="dataTables_paginate paging_bootstrap_extended" id="sample_2_paginate" style="display: block;"><div class="pagination-panel"> Page <a href="#" class="btn btn-sm default prev disabled"><i class="fa fa-angle-left"></i></a><input type="text" class="pagination-panel-input form-control input-sm input-inline input-mini" maxlenght="5" style="text-align:center; margin: 0 5px;"><a href="#" class="btn btn-sm default next disabled"><i class="fa fa-angle-right"></i></a> of <span class="pagination-panel-total">1</span></div></div></div></div></div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
	            		<!-- End Here -->
	            	</div>
	            </div>              
            </div>
        </div>
	</div>
</div>